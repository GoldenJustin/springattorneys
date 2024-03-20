var lnkForgotPasswordClick = 0;
var lnkForgotUsernameClick = 0;
var checkoutpagepath = "";
var currentCulture = "";
var productDetailsInput = "";
window.jQuery = window.$ = jQuery;

$(document).ready(function () {
    initTopLevelNavigation();
    initAutoCompleteCompany();
    initShowMenteePopUp();
    initShowMentorPopUp();
    initGenericFunction();
    initMenuProfile();
    showHideForgotPassword();
    initImport();
    initTextAreaResize();
    initMainMenu();
    footerBottom();
    slideUserListing();
    communicationPreferenceRules();
    tableResponsive();
    searchAutoFocus();
});

function showHideForgotPassword() {
    $("#lnkForgotPassword").click(function () {
        if (lnkForgotPasswordClick == 0) {
            lnkForgotPasswordClick = 1;
            $("#plcForgotPassword").show();
            $("#plcLoginMember").hide();
            $("#LblLogin").text("Forgot Password");
        } else {
            lnkForgotPasswordClick = 0;
            $("#plcForgotPassword").hide();
            $("#plcLoginMember").show();
            $("#LblLogin").text("Login");
        }
    });

    $("#lnkForgotUsername").click(function () {
        if (lnkForgotUsernameClick == 0) {
            lnkForgotUsernameClick = 1;
            $("#plcForgotUsername").show();
            $("#plcLoginMember").hide();
            $("#LblLogin").text("Forgot Username");
        } else {
            lnkForgotUsernameClick = 0;
            $("#plcForgotUsername").hide();
            $("#plcLoginMember").show();
            $("#LblLogin").text("Login");
        }
    });

    $("#lnkCancelForgotPasswprd").click(function () {
        lnkForgotPasswordClick = 0;
        $("#plcForgotPassword").hide();
        $("#plcLoginMember").show();
        $("#LblLogin").text("Login");
    });

    $("#lnkCancelForgotUsername").click(function () {
        lnkForgotUsernameClick = 0;
        $("#plcForgotUsername").hide();
        $("#plcLoginMember").show();
        $("#LblLogin").text("Login");
    });
}

function initMenuProfile() {    
    var onClickMenuProfile = false;    
    $(document).ready(function () {
        $("#menuProfile").hide();
        $("#menuProfileName").click(function () {
            showHideMenuProfile();
        });
        /*$("#menuProfileName").blur(function(){
			showHideMenuProfile();
		});*/
    });

    function showHideMenuProfile() {
        if (onClickMenuProfile == false) {
            $("#menuProfile").show();
            onClickMenuProfile = true;            
        } else {
            $("#menuProfile").hide();
            onClickMenuProfile = false;
        }
    }
}

function visibleMenuByDefault() {
    var url = window.location.pathname.toLowerCase();
    if (url.indexOf('/en-au/dashboard') != -1 || url.indexOf('/en-gb/dashboard') != -1 || url.indexOf('/dashboard') != -1) {        
        $('li#globalnavmenu').addClass("dropdown open");
        //$("#menuProfile").removeClass();
        //$("#menuProfile").addClass("dropdown-menu nav-displaymenu");
        $('.dropdown.keep-open').on({
            "shown.bs.dropdown": function () { this.closable = false; },
            "click": function () { this.closable = true; },
            "hide.bs.dropdown": function () {
                if (typeof this.closable === "undefined") { return false; }
                else { return this.closable; }                
            }
        });
    }
}

function initTopLevelNavigation() {
    $('#menuElem').addClass('nav nav-tabs');
}

function initAutoCompleteCompany() {
    if ($('.autocomplete').length) {
        $('.autocomplete').autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "/CMSPages/WoB/GetCustomData.asmx/GetCompanyName",
                    data: "{ 'wording':'" + request.term + "'}",
                    dataType: "json",
                    type: "POST",
                    contentType: "application/json; charset=utf-8",
                    success: function (data) {
                        response($.map(data.d, function (item) {
                            return { value: item }
                        }));
                    },
                    error: function (xmlHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
            }
        });
    }
}

function initShowMenteePopUp() {
    $(document).on("click", ".open-mentee", function (e) {
        e.preventDefault();
        var self = $(this);
        var mentorId = self.data('mentorid');
        $("#mentorId").val(mentorId);

        $.ajax({
            url: "/CMSPages/WoB/GetMentoringData.asmx/GetMenteeList?key=" + Math.random(),
            data: "{ 'mentorId':'" + mentorId + "'}",
            dataType: "json",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                $(".mentee-list-pop").text("");

                if (data.d != null && data.d.length > 0) {

                    for (var i = 0; i < data.d.length; i++) {
                        var ischecked = data.d[i].IsSelected ? "checked" : "";

                        var displayFormat = "<tr>";
                        displayFormat += "<td><input type='checkbox' value='" + data.d[i].UserId + "' " + ischecked + "></td>";
                        displayFormat += "<td>" + data.d[i].FullName + "</td>";
                        displayFormat += "<td>" + data.d[i].City + ", " + data.d[i].State + "</td>";
                        displayFormat += "<td>" + data.d[i].Position + "</td>";
                        displayFormat += "</tr>";

                        $(".mentee-list-pop").append(displayFormat);
                    }
                } else {
                    $(".mentee-list-pop").append("<div class='alert alert-success'>There are no mentees awaiting assignment to a mentor</div>");
                }

                $(self.data('target')).modal('show');

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

    $(document).on("click", ".update-mentee", function (e) {
        e.preventDefault();

        var mentorId = $("#mentorId").val();

        var dataSend = {};
        dataSend.mentees = [];
        dataSend.mentorId = mentorId;

        $(".mentee-list-pop input:checkbox:checked").each(function () {
            dataSend.mentees.push($(this).val());
        });

        $.ajax({
            url: "/CMSPages/WoB/GetMentoringData.asmx/UpdateMenteeList",
            data: JSON.stringify(dataSend),
            dataType: "json",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function () {
                location.reload();
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });

    });
}

function initShowMentorPopUp() {
    $(document).on("click", ".open-mentor", function (e) {
        e.preventDefault();
        var self = $(this);
        var menteeid = self.data('menteeid');
        $("#menteeid").val(menteeid);

        $.ajax({
            url: "/CMSPages/WoB/GetMentoringData.asmx/GetMentorList?key=" + Math.random(),
            data: "{ 'menteeid':'" + menteeid + "'}",
            dataType: "json",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                $(".mentor-list-pop").text("");

                if (data.d != null && data.d.length > 0) {
                    for (var i = 0; i < data.d.length; i++) {
                        var displayFormat = "<tr>";
                        displayFormat += "<td><input type='radio' name='optionMentor' value='" + data.d[i].UserId + "'></td>";
                        displayFormat += "<td>" + data.d[i].FullName + "</td>";
                        displayFormat += "<td>" + data.d[i].City + ", " + data.d[i].State + "</td>";
                        displayFormat += "<td>" + data.d[i].Position + "</td>";
                        displayFormat += "</tr>";

                        $(".mentor-list-pop").append(displayFormat);
                    }
                } else {
                    $(".mentor-list-pop").append("<div class='alert alert-success'>Mentor Not found</div>");
                }

                $(self.data('target')).modal('show');

            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    });

    $(document).on("click", ".update-mentor", function (e) {
        e.preventDefault();

        var menteeid = $("#menteeid").val();

        var dataSend = {};
        dataSend.menteeId = menteeid;
        dataSend.mentorId = $(".mentor-list-pop input:radio:checked").val();

        $.ajax({
            url: "/CMSPages/WoB/GetMentoringData.asmx/UpdateMentorList",
            data: JSON.stringify(dataSend),
            dataType: "json",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function () {
                location.reload();
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });

    });
}


function initGenericFunction() {

    var isloginShow = getParameterByName('showlogin');

    if (isloginShow == '1') {
        lnkForgotPasswordClick = 0;
        $("#plcForgotPassword").hide();
        $("#plcForgotUsername").hide();
        $("#plcLoginMember").show();
        $("#LblLogin").text("Login");
        $('#myModal').modal('show');
    }

    $('#myModal').on('shown.bs.modal', function () {
        $('.login-username').focus();
    });

    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

}

function initImport() {

    $(document).on("click", ".ShowImportStatus", function (e) {
        e.preventDefault();
        getStatuses();

        function getStatuses() {
            $.ajax({
                url: "/CMSPages/WoB/ImportStatus.asmx/GetStatuses?key=" + Math.random(),
                dataType: "json",
                type: "POST",
                contentType: "application/json; charset=utf-8",
                success: function (data) {
                    if (data.d != null && data.d.length > 0) {
                        $(".status-list").text("");
                        for (var i = 0; i < data.d.length; i++) {
                            var status = '<tr><td>' + data.d[i] + '</td></tr>';
                            $(".status-list").prepend(status);
                        }
                    }
                },
                error: function (xmlHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus);
                },
                complete: function () {
                    setTimeout(function () { getStatuses(); }, 2000);
                },
            });
        }
    });

}

function initTextAreaResize() {
    $('textarea:not(.no-autoresize)').autoResize();
}


function initMainMenu() {
    var $menu = $('#menu');
    var $menulink = $('.menu-link');
    var $menuTrigger = $('.has-submenu > a');

    $menulink.click(function (e) {
        e.preventDefault();
        $menulink.toggleClass('active');
        $menu.toggleClass('active');
    });

    $menuTrigger.click(function (e) {
        e.preventDefault();
        var $this = $(this);
        $this.toggleClass('active').next('ul').toggleClass('active');
    });

    // login link
    var $loginLink = $('.login-link');
    $loginLink.click(function (e) {
        var path = window.location.pathname;
        if (path == "/" || path == "/home" || path == "/home.aspx" || path == "/default.aspx" || path == "/default") {
            lnkForgotPasswordClick = 0;
            $("#LblLogin").text("Login");
            $("#plcForgotUsername").hide();
            $("#plcForgotPassword").hide();
            $("#plcLoginMember").show();
            $('#myModal').modal('show');
        }
        else {
            window.location.href = "/?showlogin=1";
        }
    });

}

function footerBottom() {
    // Window load event used just in case window height is dependant upon images
    $(window).bind("load", function () {

        var footerHeight = 0,
            footerTop = 0,
            $footer = $("footer");

        positionFooter();

        function positionFooter() {

            footerHeight = $footer.height();
            footerTop = ($(window).scrollTop() + $(window).height() - footerHeight) + "px";

            if (($(document.body).height() + footerHeight) < $(window).height() + 160) {
                $footer.css({
                    position: "absolute"
                }).stop().
                     animate({
                         top: footerTop
                     }, 0);
            } else {
                $footer.css({
                    position: "static"
                });
            }
        }

        $(window)
            .scroll(positionFooter)
            .resize(positionFooter);

    });
}

function slideUserListing() {
    $(document).on("click", ".showEventDetail", function (e) {
        e.preventDefault();
        var trElement;
        if ($(this).hasClass('panel-collapsed')) {
            // expand the panel
            $(this).parent().parent().next().find(".eventDetailList").slideDown();
            $(this).removeClass('panel-collapsed');
        }
        else {
            // collapse the panel
            $(this).parent().parent().next().find(".eventDetailList").slideUp();
            $(this).addClass('panel-collapsed');
        }

    });
}

function communicationPreferenceRules() {

    var cbVacancy = $('.checkboxUnsubscribe_vacancy');
    var cbMarket = $('.checkboxUnsubscribe_marketing');
    var cbAll = $('.checkboxUnsubscribe_all');

    cbAll.change(function (e) {
        e.preventDefault();
        if ($(this).children()[0].checked) {
            cbVacancy.children()[0].checked = true;
            cbMarket.children()[0].checked = true;
        } else {
            cbVacancy.children()[0].checked = false;
            cbMarket.children()[0].checked = false;
        }
    });

    cbVacancy.change(function (e) {
        e.preventDefault();
        if ($(this).children()[0].checked) {
            if (cbMarket.children()[0].checked) {
                cbAll.children()[0].checked = true;
            }
        } else {
            cbAll.children()[0].checked = false;
        }
    });

    cbMarket.change(function (e) {
        e.preventDefault();
        if ($(this).children()[0].checked) {
            if (cbVacancy.children()[0].checked) {
                cbAll.children()[0].checked = true;
            }
        } else {
            cbAll.children()[0].checked = false;
        }
    });

}

function tableResponsive() {
    var richTextContainer = jQuery('.elements');
    if (richTextContainer.length > 0) {
        //has table 
        var tableContents = richTextContainer.find('table');
        if (tableContents.length > 0) {
            tableContents.each(function (index, element) {
                //check if parent already has div responsive
                var parentContainer = $(this).closest('div.table-responsive');
                if (parentContainer.length == 0) {
                    jQuery(this).wrap("<div class='table-responsive'>");
                }
            });
        }
    }
}

function searchAutoFocus() {
    var searchContainer = $('.top-bar-search');
    if (searchContainer.length > 0) {
        $('.top-bar-search ul.dropdown-menu').on('click', function (event) {
            //The event won't be propagated to the document NODE and
            // therefore events delegated to document won't be fired
            event.stopPropagation();
        });

        $(".top-bar-search .dropdown-toggle").on('click', function () {
            var x = setTimeout('$("#search-input").focus()', 500);
        });
    }
}

function addIntoShoppingCart(prodcutDetails, forceAddEvent, forceAddMembership) {
    forceAddEvent = forceAddEvent || false;
    forceAddMembership = forceAddMembership || false;
    addIntoShoppingCartNew(prodcutDetails, forceAddEvent, forceAddMembership);
    //productDetailsInput = prodcutDetails;
    //if (isMobile.any() && checkWidthHeight()) {
    //    addIntoShoppingCartNew(prodcutDetails);
    //    return;
    //}
    //$('#myShoppingModal').modal('show');
    //$('#shoppingCartLoader').show();
    //var parentNode = document.getElementById("dynamicCartItems");
    //var productInfo = prodcutDetails.split(";");

    //if (productInfo.length === 5 || productInfo.length > 5) {
    //    var skuId = productInfo[0];
    //    var nodeId = productInfo[1];
    //    var type = productInfo[2];
    //    var membershipType = productInfo[3];
    //    var memberShipGuid = productInfo[4];
    //    var callingPath = window.location.pathname;
        
    //    $.ajax({
    //        url: "/CMSPages/WoB/ShoppingCartService.asmx/AddProductIntoShoppingCart",
    //        data: JSON.stringify({ "skuId": skuId, "nodeId": nodeId, "productType": type, "membershipType": membershipType, "memberShipGuid": memberShipGuid, "callingPath": callingPath, "forceEventAdd": forceAddEvent, "forceAddMembership": forceAddMembership }),
    //        dataType: "json",
    //        type: "POST",
    //        contentType: "application/json; charset=utf-8",
    //        success: function (data) {
    //            if (data) {
    //                var result = data.d;
    //                var disableCheckoutButton = false;
    //                if (result !== null && result.ShoppingCartCategoryInfo !== null) {
    //                    if (result.IsNonWobProduct) {
    //                        window.location.href = result.NonWobProductExternalUrl;
    //                    }
    //                    if (result.ShoppingCartCategoryInfo.length > 0) {

    //                        var addtoCartCategoryText = "What is in the cart: ";
    //                        for (var i = 0; i < result.ShoppingCartCategoryInfo.length; i++) {
    //                            addtoCartCategoryText += result.ShoppingCartCategoryInfo[i].ShoppingCartCategoryCount;
    //                            addtoCartCategoryText += " ";
    //                            addtoCartCategoryText += result.ShoppingCartCategoryInfo[i].ShoppingCartCategoryName;
    //                            addtoCartCategoryText += " ";
    //                        }
    //                        if (result.IsCoTermMemberShip === true) {
    //                            addtoCartCategoryText = "Subscribe For*";
    //                        }
    //                        if (addtoCartCategoryText !== "") {
    //                            $("#addtocartgroupinfo").text(addtoCartCategoryText);
    //                        }
                            
    //                        $("#dynamicCartItems").empty();
    //                        parentNode.innerHTML = "";
    //                        if (result.CartItems.length > 0 && result.Errors === null && result.IsCoTermMemberShip === false) {
    //                            $("#ShoppingCartCountDesk").text(result.CartItems.length);
    //                            $("#cartFooterDesk").show();
    //                            for (var j = 0; j < result.CartItems.length; j++) {

    //                                var resultItem = result.CartItems[j];
    //                                var childDiv = document.createElement("div");
    //                                var itemId = 'item_' + result.CartItems[j].SkuId + '';
    //                                var strHTML = "";
    //                                childDiv.id = itemId;
    //                                childDiv.className = "card-item-details";
    //                                strHTML += '<p class="icon icon-close" title="Delete Item">';
    //                                strHTML += '<a href = "#" onclick ="RemoveShoppingCartItems(' + resultItem.SkuId + ');return false;">';
    //                                strHTML += '<i class="fa fa-times" aria - hidden="true">';
    //                                strHTML += '</i></a></p> ';
    //                                strHTML += '<div class="item-name"> <p> ' + resultItem.SkuName;
    //                                strHTML += '</p> <small>' + resultItem.Description + '</small>';
    //                                if (result.CartItems[j].MembershipErrorWarning !== "") {
    //                                    strHTML += '<p class="shoppingCart-popup-membership-error-text">';          
    //                                    strHTML += '<label class="shoppingcart-popup-membership-error-outline-label"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i > ' + result.CartItems[j].MembershipErrorWarning + '</label></p></div>';
    //                                }
    //                                else if (result.CartItems[j].EventErrorWarning !== "") {
    //                                    strHTML += '<p class="shoppingCart-popup-membership-error-text">'; 
    //                                    strHTML += '<label class="shoppingcart-popup-membership-error-outline-label"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i > ' + result.CartItems[j].EventErrorWarning;
    //                                    strHTML += '<a href="/services/upgrade">Click here</a> to upgrade</label></p></div>';
    //                                }
    //                                else if (result.CartItems[j].ProductErrorWarning) {
    //                                    strHTML += '<p class="shoppingCart-popup-membership-error-text">';
    //                                    strHTML += '<label class="shoppingcart-popup-membership-error-outline-label"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i > ' + result.CartItems[j].ProductErrorWarning;
    //                                    strHTML += '<a href="/services/upgrade">Click here</a> to upgrade</label></p></div>';
    //                                }
    //                                else { strHTML += '</div>'; }
    //                                strHTML += '<div class="item-rate"><p>' + result.CurrentCurrency + '' + result.CartItems[j].ProductUnitPrice + '</p></div>';
    //                                childDiv.innerHTML = strHTML;
    //                                parentNode.appendChild(childDiv);
    //                                if (result.CartItems[j].MembershipErrorWarning !== "" || result.CartItems[j].EventErrorWarning !== "" || result.CartItems[j].ProductErrorWarning) {
    //                                    disableCheckoutButton = true;
    //                                }
    //                            }
    //                        }
    //                        checkoutpagepath = result.CheckoutPagePath;
    //                        $("#cartAreadyRegisterDiv").hide();  
    //                    }
    //                    else {
    //                        parentNode.innerHTML = "<p>Shopping cart is empty</p>";
    //                        $("#addtocartgroupinfo").text("What is in the cart: 0");
    //                        $("#ShoppingCartCountDesk").text("0");
    //                    }
    //                    if (result.Errors !== null && result.Errors.length > 0) {
    //                        var innerError = "";
    //                        for (var shpError = 0; shpError < result.Errors.length; shpError++) {
    //                            innerError += '<p><label class="shoppingcart-popup-membership-error-outline-label"><span class="fa fa-warning" style="margin-right:5px;"></span>' + result.Errors[shpError] + '</label></p>';
    //                        }
                            
    //                        var errorDivDesktop = document.getElementById("desktopAlreadyRegisteredErrorMsg");
    //                        errorDivDesktop.innerHTML = innerError;
    //                        $("#desktopAlreadyRegisteredErrorMsg").show();
    //                        $("#addtocartgroupinfo").text("Error Details:");
    //                        $("#cartFooterDesk").hide();
    //                        parentNode.innerHTML = "";
    //                    }
    //                    else {
    //                        $("#desktopAlreadyRegisteredErrorMsg").hide();
    //                    }
    //                    if (result.AllowEvents) {
    //                        $("#cartAreadyRegisterDiv").show();                            
    //                    }
    //                    else {
    //                        $("#cartAreadyRegisterDiv").hide();                            
    //                        disableForceEvent();
    //                    }
    //                    if (result.Errors !== null && result.Errors.length > 0) {
    //                        if (result.UpgradeMemberShip) {
    //                            $("#cartSubscriptionUpgrade").show();
    //                        }
    //                        else {
    //                            $("#cartSubscriptionUpgrade").hide();
    //                        }
    //                    }
    //                    else{
    //                        $("#cartSubscriptionUpgrade").hide();
    //                    }
    //                    if (result.ShoppingCartCategoryInfo !== null && result.ShoppingCartCategoryInfo.length > 0 && result.IsCoTermMemberShip) {
    //                        $("#cartFooterDesk").hide();
    //                        $("#cartSelectSubscribeForDiv").show();
    //                        for (var subVal = 0; subVal < result.CartItems.length; subVal++){
    //                            if (result.CartItems[subVal].ShoppingCartCotermItemsRadio !== null) {
    //                                var radioList = result.CartItems[subVal].ShoppingCartCotermItemsRadio;
    //                                if (radioList.length > 0) {
    //                                    var radioString = "<table style='width:100%;'>";
    //                                    for (var radioCount = 0; radioCount < radioList.length; radioCount++) {
    //                                        radioString += "<tr><td>";
    //                                        radioString += "<input type='radio' id='cartSubscribeFor" + radioCount+"' name='cartMembershipType' value='" + radioList[radioCount].MembershipValueText + "' " + radioList[radioCount].DefaultSelected + "/>";
    //                                        radioString += "<label class='shoppingCart-popup-subscribefor-label' for='cartSubscribeFor" + radioCount + "'>" + radioList[radioCount].MembershipDisplayText + "</label>";
    //                                        radioString += "</td><td>";
    //                                        radioString += "<label>"+ radioList[radioCount].CurrencySymbol+radioList[radioCount].Price + "</label></td></tr>";
    //                                    }
    //                                    radioString += "</table>";
    //                                    parentNode.innerHTML = radioString;
    //                                }
    //                            }
    //                        }                            
    //                    }
    //                    else {
    //                        $("#cartSelectSubscribeForDiv").hide();
    //                    }
    //                }
    //                else {
    //                    parentNode.innerHTML = "<p>Shopping cart is empty</p>";
    //                    $("#addtocartgroupinfo").text("What is in the cart: 0");
    //                    $("#ShoppingCartCountDesk").text("0");
    //                }
    //                if (result !== null) {
    //                    currentCulture = result.CurrentCulture;
    //                }
    //                if (disableCheckoutButton) {
    //                    $("#dynamicPopupContinueShoppingCart").prop('disabled', true);
    //                    $("#dynamicPoputCheckout").prop('disabled', true);
    //                }
    //                else {
    //                    $("#dynamicPopupContinueShoppingCart").prop('disabled', false);
    //                    $("#dynamicPoputCheckout").prop('disabled', false);
    //                }
    //            }
    //        },
    //        error: function (xmlHttpRequest, textStatus, errorThrown) {
    //            console.log(textStatus);
    //            $('#shoppingCartLoader').hide();
    //        },
    //        complete: function () {
    //            $('#shoppingCartLoader').hide();
    //        }
    //    });
    //}
}
function addIntoShoppingCartNew(prodcutDetails, forceAddEvent, forceAddMembership) {

    forceAddEvent = forceAddEvent || false;
    forceAddMembership = forceAddMembership || false;
    var productInfo = prodcutDetails.split(";");
    if (productInfo.length === 5 || productInfo.length > 5) {
        var skuId = productInfo[0];
        var nodeId = productInfo[1];
        var type = productInfo[2];
        var membershipType = productInfo[3];
        var memberShipGuid = productInfo[4];
        var callingPath = window.location.pathname;
        $.ajax({
            url: "/CMSPages/WoB/ShoppingCartService.asmx/AddProductIntoShoppingCart",
            data: JSON.stringify({ "skuId": skuId, "nodeId": nodeId, "productType": type, "membershipType": membershipType, "memberShipGuid": memberShipGuid, "callingPath": callingPath, "forceEventAdd": forceAddEvent, "forceAddMembership": forceAddMembership }),
            dataType: "json",
            type: "POST",
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                if (data.d.IsNonWobProduct) {
                    window.location.href = data.d.NonWobProductExternalUrl;
                    return;
                }
                var redirectBackUrl = window.location.pathname;
                var hrefLink = "/" + data.d.CurrentCulture + "/shop/addtocart?addtocart=" + redirectBackUrl;

                if ($.urlParam('returnurl') != null) {
                    if ($.urlParam('inputdata') != null) {
                        hrefLink = "/" + data.d.CurrentCulture + "/shop/addtocart?redirectBackUrl=" + redirectBackUrl + "&returnurl=" + $.urlParam('returnurl') + '&inputdata=' + $.urlParam('inputdata');
                        //hrefLink = checkoutpagepath + "?returnurl=" + urlParams.get('returnurl') + '&inputdata=' + urlParams.get('inputdata');
                    }
                    else {
                        hrefLink = "/" + data.d.CurrentCulture + "/shop/addtocart?redirectBackUrl=" + redirectBackUrl + "&returnurl=" + $.urlParam('returnurl') + '&inputdata=';
                    }
                }
                window.location.href = hrefLink;
            },
            error: function (xmlHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
    }
}
$("#dynamicPoputCheckout").click(function (e) {
    e.preventDefault();
    
    if ($.urlParam('returnurl')) {
        if ($.urlParam('inputdata')) {
            window.location.href = checkoutpagepath + "?returnurl=" + $.urlParam('returnurl') + '&inputdata=' + $.urlParam('inputdata');
        }
        else {
            window.location.href = checkoutpagepath + "?returnurl=" + $.urlParam('returnurl');
        }
    }
    else {
        window.location.href = checkoutpagepath;
    }
});
$("#btnECancel").click(function (e) {
    $("#cartAreadyRegisterDiv").hide(); 
    e.preventDefault();
    $('#shoppingCartLoader').hide();
});
$("#btnEContinue").click(function (e) {
    $("#cartAreadyRegisterDiv").hide();
    e.preventDefault();
    addIntoShoppingCart(productDetailsInput, true);    
});

$("#dynamicPopupContinueShoppingCart").click(function (e) {
    e.preventDefault();
    $('#myShoppingModal').modal('hide');
    //window.location.href = "/" + currentCulture + "/shop/productlist";
    $('#myModalProductCategoryPopup1').modal('show');
    showProductCategory();
});
$("#membershipLoginId").click(function () {
    var redirectUrlPath = getParameterByNameQ("redirecturl");
    if (redirectUrlPath.length > 0) {
        window.location.href = "/?showlogin=1&ReturnURL=" + redirectUrlPath;
    }
    else {
        window.location.href = "/?showlogin=1";
    }
});

$("#membershipupgradementor").click(function () {
    var redirectUrlPath = getParameterByNameQ("redirecturl");
    if (redirectUrlPath.length > 0) {
        window.location.href = "/Services/Membership-Benefits?ReturnURL=" + redirectUrlPath;
    }
    else {
        window.location.href = "/Services/Membership-Benefits";
    }
});

$("#membershipjoinLoginId").click(function () {
    var redirectUrlPath = getParameterByNameQ("redirecturl");
    if (redirectUrlPath.length > 0) {
        window.location.href = "/Services/Membership-Benefits?ReturnURL=" + redirectUrlPath;
    }
    else {
        window.location.href = "/Services/Membership-Benefits";
    }
});

$("#btnEContinueSubscribe").click(function (e) {
    $("#cartSelectSubscribeForDiv").hide();
    e.preventDefault();    
    var radioValue = $("input[name='cartMembershipType']:checked").val();
    addIntoShoppingCart(radioValue, false, true);    
});
$("#btnSubscribeUpgrade").click(function (e) {
    e.preventDefault();
    window.location.href = "/" + currentCulture + "/services/upgrade";
});

function getParameterByNameQ(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results.input.replace("?redirecturl=",""));
}
function RemoveShoppingCartItems(skuId) {
    var childElementId = "item_" + skuId;
    var parentNode = document.getElementById("dynamicCartItems");
    var childNode = document.getElementById(childElementId);

    $.ajax({
        url: "/CMSPages/WoB/ShoppingCartService.asmx/RemoveShoppingCartItem",
        data: JSON.stringify({ "skuId": skuId }),
        dataType: "json",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            if (data) {
                var result = data.d;
                $("#dynamicCartItems").empty();
                parentNode.innerHTML = "";
                var disableCheckoutButton = false;
                if (result !== null && result.ShoppingCartCategoryInfo !== null) {
                    if (result.ShoppingCartCategoryInfo.length > 0) {
                        
                        var addtoCartCategoryText = "What is in the cart: ";
                        for (var i = 0; i < result.ShoppingCartCategoryInfo.length; i++) {
                            addtoCartCategoryText += result.ShoppingCartCategoryInfo[i].ShoppingCartCategoryCount;
                            addtoCartCategoryText += " ";
                            addtoCartCategoryText += result.ShoppingCartCategoryInfo[i].ShoppingCartCategoryName;
                            addtoCartCategoryText += " ";
                        }
                        if (addtoCartCategoryText !== "") {
                            $("#addtocartgroupinfo").text(addtoCartCategoryText);
                        }

                        if (result.CartItems.length > 0) {
                            
                            $("#ShoppingCartCountDesk").text(result.CartItems.length);
                            for (var j = 0; j < result.CartItems.length; j++) {
                                var resultItem = result.CartItems[j];
                                var childDiv = document.createElement("div");
                                var itemId = 'item_' + result.CartItems[j].SkuId + '';
                                var strHTML = "";
                                childDiv.id = itemId;
                                childDiv.className = "card-item-details";
                                strHTML += '<p class="icon icon-close" title="Delete Item">';
                                strHTML += '<a href = "#" onclick ="RemoveShoppingCartItems(' + resultItem.SkuId + ');return false;">';
                                strHTML += '<i class="fa fa-times" aria - hidden="true">';
                                strHTML += '</i></a></p> ';
                                strHTML += '<div class="item-name"> <p> ' + resultItem.SkuName;
                                strHTML += '</p> <small>' + resultItem.Description + '</small>';
                                if (result.CartItems[j].MembershipErrorWarning !== "") {
                                    strHTML += '<p class="shoppingCart-popup-membership-error-text">';              
                                    strHTML += '<label class="shoppingcart-popup-membership-error-outline-label"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i > '+ result.CartItems[j].MembershipErrorWarning + '</label></p></div>';
                                }
                                else if (result.CartItems[j].EventErrorWarning !== "") {
                                    strHTML += '<p class="shoppingCart-popup-membership-error-text">';               
                                    strHTML += '<label class="shoppingcart-popup-membership-error-outline-label"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i > '+ result.CartItems[j].EventErrorWarning;
                                    strHTML += '<a href="/services/upgrade">Click here</a> to upgrade</label></p></div>';
                                }
                                else if (result.CartItems[j].ProductErrorWarning !== "") {
                                    strHTML += '<p class="shoppingCart-popup-membership-error-text">';
                                    strHTML += '<label class="shoppingcart-popup-membership-error-outline-label"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i > ' + result.CartItems[j].ProductErrorWarning;
                                    strHTML += '<a href="/services/upgrade">Click here</a> to upgrade</label></p></div>';
                                }
                                else { strHTML += '</div>'; }
                                strHTML += '<div class="item-rate"><p>' + result.CurrentCurrency + '' + resultItem.ProductUnitPrice + '</p></div>';
                                childDiv.innerHTML = strHTML;
                                parentNode.appendChild(childDiv);   
                                if (result.CartItems[j].MembershipErrorWarning !== "" || result.CartItems[j].EventErrorWarning !== "" || result.CartItems[j].ProductErrorWarning !== "") {
                                    disableCheckoutButton = true;
                                }
                            }                            
                        }
                        //if (childNode !== null && childNode !== typeof (undefined)) {
                        //    parentNode.removeChild(childNode);
                        //}                        
                        checkoutpagepath = result.CheckoutPagePath;
                        
                    }
                    if (parentNode.childNodes.length === 0) {
                        parentNode.innerHTML = "<p>Shopping cart is empty</p>";
                        $("#addtocartgroupinfo").text("What is in the cart: 0");
                        $("#ShoppingCartCountDesk").text("0");                
                    }
                }
                if (disableCheckoutButton) {
                    $("#dynamicPopupContinueShoppingCart").prop('disabled', true);
                    $("#dynamicPoputCheckout").prop('disabled', true);
                }
                else {
                    $("#dynamicPopupContinueShoppingCart").prop('disabled', false);
                    $("#dynamicPoputCheckout").prop('disabled', false);
                }
            }
        },
        error: function (xmlHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
            $('#shoppingCartLoader').hide();
        },
        complete: function () {
            $('#shoppingCartLoader').hide();
        }
    });    
}


function initiateProductCategoryPopup() {
    $('#myModalProductCategoryPopup1').modal('show');
    showProductCategory();
}
function showProductCategory() {
    $("#shoppingCartProductCategoryLoader").show();
    $.ajax({
        url: "/CMSPages/WoB/ShoppingCartService.asmx/GetProductsCategories",
        dataType: "json",
        type: "POST",
        contentType: "application/json; charset=utf-8",
        success: function (data) {
            var result = data.d;
            if (result) {
                var shoppingCartProductCategoryDiv = document.getElementById("productCategoryPopupContent");
                var strHtml = '<ul class="list-inline">';
                for (var i = 0; i < result.length; i++) {
                    strHtml += '<li><a href="' + result[i].Url + '">' + result[i].PageName+'</a></li>';
                }
                strHtml += '</ul>';
                shoppingCartProductCategoryDiv.innerHTML = strHtml;
            }

            $("#shoppingCartProductCategoryLoader").hide();
        },
        error: function (xmlHttpRequest, textStatus, ErrorThrown) {
            console.log(textStatus);
            $("#shoppingCartProductCategoryLoader").hide();
        }
    });
}
// Shopping cart modal popup close event
//$('#myShoppingModal').on('hidden.bs.modal', function (e) {
    
//});
var isMobile = {
    Android: function () {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
        return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
    },    
    any: function () {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

function checkWidthHeight() {
    var screenWidth = screen.width;
    var screenHeight = screen.height;
    if ((screenWidth === 2560 && screenHeight === 698) || (screenWidth === 1440 && screenHeight === 419) ||
        (screenWidth === 1024 && screenHeight === 419) || (screenWidth === 1024 && screenHeight === 1366) || (screenWidth === 1366 && screenHeight === 1024) || (screenWidth > 1024)) {
        return false;
    }
    else {
        return true;
    }
}
function enableForceEvent(){
    forceAddEvent = true;
}
function disableForceEvent(){
    forceAddEvent = false;
}
$.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
        return null;
    }
    else {
        return decodeURI(results[1]) || 0;
    }
}
