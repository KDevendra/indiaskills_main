<?php $base = realpath(__DIR__);
include $base . '/common/header.php'; ?>


<style>
    .collapse p.heading{
    font-weight: 700;
    font-size: 18px;
    color: #000000bf;
}

.bi-caret-right-fill::before {
    content: "\f231";
    color: black;
    font-size: 18px;
}

.bi-check::before {
    content: "\f26e";
    font-size: 22px;
    color: #1fa310;
}

.subject-heading{
    color: darkblue;
    font-size:18px;
    
}

.card-header{
    cursor:pointer;
}

.video-gallery p{
    display:flex;
    justify-content:center;
    margin-left:0px !important;
}

.bi-check::before {
   content: "\f26e";
   font-size: 22px;
   color: #1fa310;
   }
   .collapse p.heading {
   font-weight: 700;
   font-size: 18px;
   color: #000000bf;
   }
   .bi-caret-right-fill::before {
   content: "\f231";
   color: black;
   font-size: 18px;
   }
   .video-gallery img {
   height: 316px;
   }
   img.newGIFImg1 {
   width: 4%;
   position: relative;
   top: -2px;
   }
   p.marPara {
   margin: 0;
   color: #fff;
   font-family: "Open Sans", sans-serif;
   padding: 5px 0;
   }
   .marPara a {
   color: white;
   }
   .owl-carousel .owl-item img {
   display: block;
   width: 100%;
   border: 1px solid lightgrey;
   border-radius: 0.7rem;
   }
   .owl-carousel .owl-stage-outer {
   position: relative;
   overflow: hidden;
   -webkit-transform: translate3d(0px, 0px, 0px);
   height: 413px;
   }
   .card-header {
   cursor: pointer;
   }
   @media only screen and (min-width: 320px) and (max-width: 767px) {
   .headingSR {
   margin-top: -75px;
   height: auto;
   }
   }
   details {
   /* max-width: 960px; */
   margin: 1rem auto;
   background-color: #fff;
   border-radius: 0.4rem;
   box-shadow: 0 .25rem 1rem rgba(0, 0, 0, 0.1);
   }
   details:not([open]) {
   animation-name: fold-in;
   animation-duration: .2s;
   }
   details summary {
    display: flex;
  align-items: center;
  justify-content: space-between;
  font-weight: bold;
  padding: 1.5rem;
  color: #343a40;
  font-size: 18px;
  border-bottom:1px solid lightgrey;
  user-select:none;
  outline:none;
  transition: 0.3s;
   }
   /* Disable browser default marker */
   details summary::-webkit-details-marker,
   details summary::marker {
   content: "";
   display: none;
   }
   /* Custom marker */
   details summary::after {
    content: "+";
    font-size: 1.5rem;
    font-weight: 400;
    line-height: 1;
    margin-right: 1rem;
    cursor: pointer;
    background: #5d73d1;
    color: white;
    border-radius: 50%;
    padding: 3px 8px;
    font-size: 24px;
}
   
   details .content {
   padding: 0 1.5rem 1.5rem;
   margin-top:1rem;
   }
   details[open] summary::after {
   content: "−";
   }
   details[open] .content {
   animation-name: fold-out;
   animation-duration: .2s;
   }
   /* Fake it 'til you make it animations */
   @keyframes fold-out {
   0% {
   opacity: 0;
   margin-top: -1rem;
   }
   100% {
   opacity: 1;
   margin-top: 0;
   }
   }
   @keyframes fold-in {
   0% {
   padding-bottom: 1rem;
   }
   100% {
   padding-bottom: 0;
   }
   }
   .content ul{
      list-style: none;
      padding-left: 0rem;
      margin-top:-7px;
   }

   .content ul li{
      display: flex;
    gap: 16px;
    margin-bottom: 8px;
    align-items: center;
      }

      .content p{
    margin-bottom: 0;
    padding: 10px 0 0 0;
    font-family: "Open Sans", sans-serif;
    font-weight: 600;
    display: flex;
    gap: 10px;
    align-items: start;
   }

   .content p b{
    display: flex;
    gap: 18px;
    align-items: center;
    font-size:18px;
   }

   .content .subject-heading{
    display: flex;
    gap:0px !important;
   }

   .content .heading{
    font-weight:bold !important; 
    display: flex;
    align-items:center;
   }

   .header-heading{
    margin-left:32px;
   }

   .faq .faq-list p {
    margin-bottom: 7px;
   }

   details{
    border:1px solid lightgrey;
   }

   

</style>
<section id="heroInner">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4 order-1 order-lg-1 hero-img aos-init aos-animate" data-aos="zoom-out" data-aos-delay="300"></div>

            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-2 d-flex align-items-center">
                <div data-aos="zoom-out" class="aos-init aos-animate">
                    <h1><span>Problem Statement</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<main id="main">
    <section id="faq" class="faq section-bg">
        <div class="container">
            <div class="section-title aos-init aos-animate" data-aos="fade-up">
                <h2>PROBLEM STATEMENT</h2>

                <p>PROBLEM STATEMENT</p>
            </div>

            <div class="faq-list">
                <div id="accordion" role="tablist">

                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS01.</span> Develop a robust framework to get Real time location of mobile users with Internal authentication App ( permissions )
                    </div>
                    </summary>
                    <div class="content">
                    <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                                        <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> Instant Location Search</span></p>
                                        <p><i class="bi-check"></i> Authentication feature to enable ground officers to access permission from seniors for data accessibility like kavach security solution from NIC, biometric and face recognition.</p>
                                        <p><i class="bi-check"></i> The APP gathers other relevant information also such as time, date, speed and direction of the target</p>
                                        <p><i class="bi-check"></i> The APP also shares landmarks & provides geofenceing feature too</p>
                                        <p><i class="bi-check"></i> Mobile user’s real time location helps in controlling planned crime, chasing of victim and controlling of crowd etc. and in other effective remediation of potential threats</p>
                                        <p><i class="bi-check"></i> Rescue teams can use this App for identifying the effective place of operations</p>
                                        <p><i class="bi-check"></i> A LBS-based solution may be created that searches the pertinent 5G network registers and databases and provides a list of the gadgets latched on to the network</p>                                           
                                    </div>                                    

                                    <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <div class="item">
                                            <div class="video-gallery">                                                
                                                <iframe width="100%" height="222px" src="https://www.youtube.com/embed/ACwo__ACgAo?si=TJrGyj7wQZcn-A4J" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                <p>Instant Location Search</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                    
                    </div>
                </details>

                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS02.</span> 3D Capturing ( AR / VR / XR ) of crime scenes using 5G enabled devices also used for capacity building & operations.
                    </div>
                    </summary>
                    <div class="content">
                    <div class="card-body">                              
                                 
                                <div class="row">
                                    <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                                    <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> 3D capturing in 5G Era</span></p>
                                    <p><i class="bi-check"></i> 3D Capturing(AR/VR/XR) of crime scenes using 5G enabled devices also used for capacity building & operations.</p>
                                    <p><i class="bi-check"></i> APP should be usable for Training of officers related to new tools, technology and methodologies.</p>
                                    <p><i class="bi-check"></i> It should felicitate crime scenes & for collection of crime scene insights for effective investigation etc.</p>
                                    <p><i class="bi-check"></i> It should facilitate timely, remote and efficient learning.</p>
                                  
                                        
                                    </div>

                                    

                                    <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <div class="item">
                                            <div class="video-gallery">
                                                <iframe width="100%" height="222px" src="https://www.youtube.com/embed/ejlYAi9FsSo?si=A7jV_QiEfk9xMpsr" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                <p>3D Capturing of Crime Scenes</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>                           
                            </div>
                </details>


                
                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS03. </span> App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML
                    </div>
                    </summary>
                    <div class="content">
                    <div class="card-body">                              

                                <div class="row">
                                    <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                                    <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> Surveillance 360°</span></p>
                                    <p><i class="bi-check"></i> App/framework for integration of various wearable and digital gadgets used for daily use by beat officers for surveillance. Video analysis & analytics support for daily surveillance videos generated by
                                    various gadgets
                                    </p>
                                    <p><i class="bi-check"></i> App should be able to add 3D scanners support to capture crime scenes and integrate drone , spy cameras, wearable cameras and other attachments also App should able to withstand the data and communication
                                    load of 9-10 wearables or attachments and transfer of that data to the nodal office in a real time scenario.
                                    </p>                                 
                                    </div>

                                    <!-- <div class="col-md-3 col-lg-3 d-flex justify-content-center align-items-center">
                                        <div class="item">
                                            <div class="video-gallery d-flex flex-column justify-content-center align-items-center" >                                            
                                                <img src="<?php echo base_url('');?>include/custom/ate-4.jpg" alt="" class="img-fluid" style="height: 229px; width: 100%;">
                                                <p>bprd@gmail.com</p>
                                            </div>
                                        </div>                                      
                                    </div> -->

                                    

                                    <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <div class="item">
                                            <div class="video-gallery">
                                                <iframe width="100%" height="222px" src="https://www.youtube.com/embed/XX-oCTQA5p8?si=ppMIREKOOu1LzMCB" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                <p>Surveillance 360°</p>
                                            </div>
                                        </div>
                                    </div>


                                </div> 

                                
                            </div>                     
                    </div>

                </details>


                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS04. </span> Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D ( AR / VR )
                    </div>
                    </summary>
                    <div class="content">
                    <div class="card-body">
                                

                                <div class="row">
                                    <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                                    <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> 5G Enabled Traffic Management</span></p>
                                    <p><i class="bi-check"></i> Intelligent Traffic Management</p>
                                    <p><i class="bi-check"></i> 5G-enabled AI cameras Advanced analytics capabilities should be integrated into CCTV systems suspects alerts relay to nearest police station</p>
                                    <p><i class="bi-check"></i> Two-way Communication should be possible</p>                                   
                               </div>                                   

                                    <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                        <div class="item">
                                            <div class="video-gallery">
                                                <iframe width="100%" height="222px" src="https://www.youtube.com/embed/5bh0V0UrOJ0?si=7oc8B_yza7aMPl-l" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                                <p>5G Enabled Traffic Management</p>
                                            </div>
                                        </div>
                                    </div>


                                </div> 

                            </div>
                    </div>

                </details>


                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS05. </span> Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing
                    </div>
                    </summary>
                    <div class="content">
                    <div class="card-body">                               

                    <div class="row">
                        <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                        <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> Predictive policing</span></p>
                        <p><i class="bi-check"></i> Develop a Data analytics &amp; data processing App for predictive policing.- A.I based tool including OSINT for predictive policing</p>
                        <p><i class="bi-check"></i> Cyber crime analytics using real time data, which involves storing and analyzing huge volume and variety of data in real time, generating patterns / trends</p>
                        <p><i class="bi-check"></i> Location Data: GPS coordinates and timestamps can be embedded in photos or other  media. This can provide context about where and when an artifact was created</p>
                        <p><i class="bi-check"></i> Time Stamps: Metadata includes timestamps that can indicate when a file was created, modified, or accessed.</p>
                        <p><i class="bi-check"></i> Communication Logs: Metadata from messaging apps or call logs can provide information about who communicated with whom, when, and for how long. This can be crucial in investigations or when reconstructing events</p>                                    
                    </div>

                        

                        <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                            <div class="item">
                                <div class="video-gallery">
                                    <iframe width="100%" height="222px" src="https://www.youtube.com/embed/MeUqDQxWIzY?si=6eMj-BxAdXElKa5J" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <p>Predictive policing</p>
                                </div>
                            </div>
                        </div>


                    </div> 

                    </div>
                                        </div>

                </details>

                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS06. </span> APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications.
                    </div>
                    </summary>
                    <div class="content">

                    <div class="card-body">                               

                    <div class="row">
                        <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                        <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> Instant Reponse App / Smart Response App</span></p>
                        <p><i class="bi-check"></i> The app analyses the location, prioritizes the severity, and communicates with the nodal centers for further action. ( with A.I & M.L support )</p>
                        <p><i class="bi-check"></i> The app shares live location of ERV to the user</p>
                        <p><i class="bi-check"></i> Access to Critical Data</p>
                        <p><i class="bi-check"></i> With respect to emergency to nodal centre</p>
                        <p><i class="bi-check"></i> For instance, firefighters can use floor plans to locate exits of a burning building, EMS might view a reference of possible drug interactions during an overdose, and police often utilize data from criminal databases</p>                                    
                    </div>

                        

                        <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                            <div class="item">
                                <div class="video-gallery">
                                    <iframe width="100%" height="222px" src="https://www.youtube.com/embed/aoyHCbJnirI?si=ADMfY-1SbzuHvVuU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <p>Instant Reponse App / Smart Response App</p>
                                </div>
                            </div>
                        </div>


                    </div> 

                    </div>

                                        </div>

                </details>


                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS07. </span> APP for 5G enabled Drones ( control and data ) for surveillance,security and safety
                    </div>
                    </summary>
                    <div class="content">

                    <div class="card-body"> 
                        
                    <div class="card-body">
                               

                               <div class="row">
                                   <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                                   <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading">Subject : </span> 5G in Drones</span></p>
                                   <p><i class="bi-check"></i> Live streaming, edge processing, smart incident management, etc</p>
                                   <p><i class="bi-check"></i> Send alerts or notifications in case of suspicious activities, emergencies</p>
                                   <p><i class="bi-check"></i> cloud storage options for recorded footage</p>
                                   <p><i class="bi-check"></i> Analysis & Analytics for data processing</p>
                                   <p><i class="bi-check"></i> Data Encryption and Security</p>
                                   </div>                                   

                                   <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                       <div class="item">
                                           <div class="video-gallery">
                                                <iframe width="100%" height="222px" src="https://www.youtube.com/embed/Vi-6flHrohU?si=GHoiZm1qe5EQJqQt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                               <p>5G in Drones</p>
                                           </div>
                                       </div>
                                   </div>


                               </div> 

                               
                           </div>


                    </div>

                </details>


                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS08. </span> Create Software routing security framework for private network for 5G communication network
                    </div>
                    </summary>
                    <div class="content">
                    <div class="card-body">                               

                                                    
                    <div class="row">
                        <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                        <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading"><span class="subject-heading">Subject : </span> </span> Security for 5G</span></p>
                        <p><i class="bi-check"></i> Keeps the networks secure by tracking and evaluating network traffic</p>
                        <p><i class="bi-check"></i> It prohibits network abusers from obtaining unwanted access</p>
                        <p><i class="bi-check"></i> It prevents spyware and keeps the privacy of the network intact</p>
                        <p><i class="bi-check"></i> Acts as a single stumbling block for protection and real-time analysis</p>
                        <p><i class="bi-check"></i> The routing mechanism must be secure</p>                                 
                    </div>

                        

                        <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                            <div class="item">
                                <div class="video-gallery">
                                    <iframe width="100%" height="222px" src="https://www.youtube.com/embed/U8B4zjp6DaM?si=mWsjAS5-GjAGFtie" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    <p>Security for 5G</p>
                                </div>
                            </div>
                        </div>


                    </div> 

                    </div>
                                        </div>
 

                </details>

                <details>
                    <summary >
                    <div class="header-heading">
                        <span class="text-primary">PS09. </span> Develop an App A.I / M.L based to give assistance to LEAs in investigation, evidence collection, drafting of charge sheets.</div>
                    </summary>
                    <div class="content">
                    <div class="card-body">
                               

                               <div class="row">
                                   <div class="col-md-9 col-lg-9" style="border-right: 1px solid lightgrey;">
                                       <p class="heading"><i class="bi-caret-right-fill"></i><span class="subject-heading"><span class="subject-heading">Subject : </span> </span> A.I / M.L based app to guide IO's</span></p>
                                   <!--<p class="heading" style="margin-left:71px;">App (A.I / M.L based) is to be developed which can help the IO.</p>-->
                                   <h6 style="margin-left:71px;"></h6>
                                   <p><i class="bi-check"></i> 1. Suggest the kind of evidence to be collected</p>  
                                   <p><i class="bi-check"></i> 2. Procedure to be followed - Seizure, Arrest, Chemical, Examination etc.</p>  
                                   <p><i class="bi-check"></i> 3. To suggest Sections of law that would be applicable in an FIR</p>  
                                   <p><i class="bi-check"></i> 4. Suggest chargesheet and auto check</p>  
                                   <p>                                    
                               </div>

                                   

                                   <div class="col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                                       <div class="item">
                                           <div class="video-gallery">
                                               <iframe width="100%" height="222px" src="https://www.youtube.com/embed/IlbEESupE34?si=UT2xhfioBafDgmX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                               <p>AI/ML in Criminal Investigation</p>
                                           </div>
                                       </div>
                                   </div>


                               </div> 
                           </div>

                    </div>
 

                </details>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Contact Section ======= -->

    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
            <div class="row">
            <div class="col-lg-6">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="email">
                            <i class="bi-envelope-fill"></i>
                            <h4>Address:</h4>
                            <p><a href="#"> TCoE - C-DoT Campus Mandi Road, Mehrauli New Delhi-110030, India </a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p>
                                <a href="#"> <span class="__cf_email__" data-cfemail="dbb2b5bdb49bafb8b4bef5b2b5">[email&#160;protected]</span> </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p><a href="#">Ph. 011-26598627, Mobile: 9839457197 </a></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
            <div class="col-lg-12" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="email">
                        <i class="bi-telephone"></i>
                            <h4 class="mb-3">For Technical Queries</h4>
                            <p><a href="">Name : Dr P.S. Singh</a></p>
                            <p><a href="">Designation : Cyber Crime Threat Analyst, NCR&IC, BPR&D</a></p>
                            <p><a href="">Email : dr.p.s.singh.bprd@gmail.com</a></p>

                            <p class="mt-4"><a href="#">Name : Farhan Sumbul</a></p>
                            <p><a href="#">Designation : Solution Architect, NCR&IC, BPR&D</a></p>
                            <p><a href="#">Email : ncric-contdev@bprd.nic.in</a></p>
                        </div>
                    </div>
                </div>

            </div>
                
            
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
    <?php $base = realpath(__DIR__);
    include $base . '/common/footer.php'; ?>
    <script>
        $(document).ready(function () {
    $("details").on("click", function () {
        if ($(this).attr("open")) {
            $("details").not(this).removeAttr("open");
        } else {
            $("details").removeAttr("open");
        }
    });
});
    </script>
</main>