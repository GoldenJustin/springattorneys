@extends('welcome')
@section('content')


<div class="container pages">
    <div class="lipsum elements">
        <div class="text-center">
            <img src="{{ asset ('assets/image/new-logo-black.png') }}" alt="Board Advisory Icon" style="max-width: 20%; border-radius: 10%;">

        </div>
        <h1 class="text-center">About Us</h1>
        <hr>

            
                        <p class="text-justify">
                            Spring Attorneys is a full service highly accredited Tanzanian based East African Law firm providing topnotch legal services. Spring attorneys is your destination to esteemed legal services. We are dedicated to the legal health of individuals, organisations and enterprises; we attend and offer legal consult to private and institutional engagements.<br><br>

                                We Work with local and international companies as well as international NGOs and Local NGOs in providing legal advisory services and governance advisory services that is suitable to the business environment. We focus on staying current and incorporating best practices in the field to guide our clients in making the best decisions for the interest of their organisations.<br><br>
                                
                                We are approachable and understand that listening to our clients’ needs allows us to introduce innovative and creative solutions. We are quick and practical at resolving matters and will keep our client updated in every step of the process.  We understand that dealing with a legal matter can be frustrating and stressful, so we aim to always provide incomparable service.</p>
    

  <br>
        <h2>Our Services</h2>
        <p class="text-justify">
            At Spring Attorneys, we believe that compliance is a license for engagement.
             We therefore provide high standard legal advisory services in the following areas of practice</p>
        
             
                <div class="row text-center">
                    <div class="col-md-4 mb-4" style="border: 1px solid black; padding: 20px;">
                        <img src="{{ asset('assets/image/icons/8.png') }}" alt="Board Advisory Icon" style="max-width: 10%; border-radius: 10%;">
                        <h5 style="font-size: 18px; font-weight: bold;">Board Advisory</h5>
                        <p style="font-size: 14px;">We assess the Board effectiveness through acceptable international standards...</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
            
                    <div class="col-md-4 mb-4" style="border: 1px solid black; padding: 20px;">
                        <img src="{{ asset('assets/image/icons/10.png') }}" alt="Board Advisory Icon" style="max-width: 10%; border-radius: 10%;">
                        <h5 style="font-size: 18px; font-weight: bold;">Labour Law & Industrial</h5>
                        <p style="font-size: 14px;">We provide advisory services on Employment benefits and matters....</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
            
                    <div class="col-md-4 mb-4" style="border: 1px solid black; padding: 20px;">
                        <img src="{{ asset('assets/image/icons/14.png') }}" alt="Board Advisory Icon" style="max-width: 10%; border-radius: 10%;">
                        <h5 style="font-size: 18px; font-weight: bold;">Litigation and Arbitration</h5>
                        <p style="font-size: 14px;">We handle high-stakes, complex cases for some of the world’s...</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
            
                    <div class="col-md-4 mb-4" style="border: 1px solid black; padding: 20px;">
                        <img src="{{ asset('assets/image/icons/15.png') }}" alt="Board Advisory Icon" style="max-width: 10%; border-radius: 10%;">
                        <h5 style="font-size: 18px; font-weight: bold;">Corporate Governance</h5>
                        <p style="font-size: 14px;">Corporate governance and compliance is an ever-changing area and we help...</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
            
                    <div class="col-md-4 mb-4" style="border: 1px solid black; padding: 20px;">
                        <img src="{{ asset('assets/image/icons/6.png') }}" alt="Board Advisory Icon" style="max-width: 10%; border-radius: 10%;">
                        <h5 style="font-size: 18px; font-weight: bold;">Legal & Governance Audit</h5>
                        <p style="font-size: 14px;">We conduct legal Audit that covers Legal and regulatory compliance...</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
            
                    <div class="col-md-4 mb-4" style="border: 1px solid black; padding: 20px;">
                        <img src="{{ asset('assets/image/icons/4.png') }}" alt="Board Advisory Icon" style="max-width: 10%; border-radius: 10%;">
                        <h5 style="font-size: 18px; font-weight: bold;">Tax Advisory</h5>
                        <p style="font-size: 14px;">As legal practitioners, we are duty bound to serve the community.......</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
            
                    <!-- Add similar blocks for other services -->
            
                <br>
            </div>


    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection