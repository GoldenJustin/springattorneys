@extends('welcome')
@section('title', 'Team - Springattorneys')
@section('content')


    {{-- <div class="container pages">
        <div class="lipsum elements">
    
            <h1>Janeth J. Edson</h1>
    
            <h2>Senior Managing Partner</h2>
    
            
                <img id="fullScreenImage" alt="" src="{{ asset('assets/image/JJE_potrait_576x720.jpg') }}" />
                <p class="text-justify">Janeth is a senior
                Advocate of the High Court of Tanzania with an LLB, PDLP and MBA in Governance & Leadership. She
                is a vibrant legal mind with about seven (7) years of experience. She is a certified Governance
                Practitioner with extensive practice in Corporate & Commercial Aspects, 
                
                Estate & wealth
                management, Procurement & contract management and Consultancy. She is Experienced in the Legal
                and regulatory frameworks both national and international level and therefore ensures clients
                are well advised on compliance issues. She is also a Governance and Leadership expert who has
                worked with different national and international organizations and provides governance and
                leadership trainings to different Boards and Management personnel in Tanzania.</p>
    
    
    
            <p>Contact the us at our office on&nbsp;0000 0000 000 or <a href="mailto:info@springattorneys.co.tz?subject=Law%Assistance%20Enquiry">email</a><a href="mailto:info@springattorneys.co.tz?subject=Law%Assistance%20Enquiry">&nbsp;</a>our&nbsp;Email
                Relations Manager.</p>
        </div>
    </div> --}}

    <div class="container pages">
        <div class="lipsum elements">
            <div class="team-member-card">
                <div class="team-member-image">
                    <img src="{{ asset('assets/image/JJE_potrait_576x720.jpg') }}" alt="Janeth J. Edson">
                </div>
                <div class="team-member-details">
                    <h2>Janeth J. Edson</h2>
                    <p><b>Senior Managing Partner</b></p>
                    <p class="team-member-description">
                        Janeth is a senior Advocate of the High Court of Tanzania with an LLB, 
                        PDLP and MBA in Governance & Leadership. 
                        <p class="team-member-description">She is a vibrant legal mind with about seven (7) years of experience. She is a certified Governance
                            Practitioner with extensive practice in Corporate & Commercial Aspects,</p>
                        <p class="team-member-description">Estate & wealth
                            management, Procurement & contract management and Consultancy.</p>
                        <p class="team-member-description">She is Experienced in the Legal
                            and regulatory frameworks both national and international level and</p>
                        <p class="team-member-description">therefore ensures clients
                            are well advised on compliance issues. She is also a Governance and Leadership expert who has
                            worked</p>
                        <p class="team-member-description">with different national and international organizations and provides governance and
                            leadership </p>
                        <p class="team-member-description">trainings to different Boards and Management personnel in Tanzania.</p>
                        
                         
                        
                           
                     </p>
                </div>
            </div>
        </div>
    </div>
    

@endsection