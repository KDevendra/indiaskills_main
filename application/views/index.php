<?php $base = realpath(__DIR__);
   include $base . '/common/header.php'; ?>
<head>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" rel="stylesheet" />
   <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" rel="stylesheet" />
</head>
<style>
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

      .content ul p{
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

   details{
    border:1px solid lightgrey;
   }


</style>
<!-- End Header -->
<section id="hero">
   <div class="swiper" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">
         <div class="swiper-slide"><a href="<?php echo base_url('sign-up') ?>"><img src="<?php echo base_url(''); ?>include/custom/banner-15.png" class="img-fluid d-block w-100" alt="" /></a></div>
         <div class="swiper-slide"><a href="include/custom/vimarsh_Application_Format.pdf" target="_blank"><img src="<?php echo base_url(''); ?>include/custom/banner-3.png" class="img-fluid d-block w-100" alt="" /></a></div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-pagination"></div>
      <div id="js-prev1" class="swiper-button-prev"></div>
      <div id="js-next1" class="swiper-button-next"></div>
   </div>
</section>
<main id="main">
   <!-- <section style="padding:0;">
      <div id="promo-notifications" style="">
          <ul>
      <li><i class="bi-check"></i><a href="<?php echo base_url('sign-up') ?>">Registration will start from 1st of November 2023- Click here to Apply </a></li>
      <li><i class="bi-check"></i></li>
      <li><i class="bi-check"></i></li>
      <li><i class="bi-check"></i></li>
      <li><i class="bi-check"></i><a href="<?php echo base_url('sign-up') ?>">Registration will close on 9th of December 2023 00:00 Hours</a></li>
          </ul>
      </div>
      </section> -->
   <section class="marBox" style="padding:0;">
      <marquee scrolldelay="50" id="scroll_news" style="font-family:Book Antiqua; font-weight: bold; color: #FFFFFF; padding: 10px 0 5px 0; background: #161616;" bgcolor="#394787">
         <div onmouseover="document.getElementById('scroll_news').stop();" onmouseout="document.getElementById('scroll_news').start();">
            <p class="marPara">
               <img src="https://kavach.mic.gov.in/img1/new.gif" class="newGIFImg1"> <a href="<?php echo base_url('sign-up') ?>" target="_blank"> &gt;&gt; Registration will start from 1st of November 2023- Click here to Apply </a><!--<a href="https://bit.ly/KAVACH2023CSHACK" target="_blank"> >> Click here to apply for Kavach 2023 </a>--> &nbsp;&nbsp;&gt;&gt; <a href="<?php echo base_url('sign-up') ?>" target="_blank">Registration will close on 9th of December 2023 11:59 PM </a>
            </p>
         </div>
      </marquee>
   </section>
   <!-- <section class="topCollapseDiv">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-primary alertLanding" role="alert">
                  <div class="row">
                     <div class="col-md-9">
                        <p class="psKavachHeading">BPRD 5G HACKATHON 2023</p>
                     </div>
                     <div class="col-md-3">
                        <a href="<?php echo base_url('sign-in'); ?>"><button class="psButtonIndex">Apply Here </button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </section> -->
   <!-- ======= About Section ======= -->
   <section id="about" class="about">
      <div class="container">
         <div class="row">
            <div class="col-xl-7 col-lg-12 icon-boxes d-flex flex-column align-items-stretch justify-content-center" data-aos="fade-left">
               <div class="section-title abtSection" data-aos="fade-up">
                  <h2>About</h2>
                  <p>Vimarsh 2023</p>
               </div>
               <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                  <p class="description">
                     In a relentless pursuit of identifying and promoting products / prototypes / applications tailored to meet the requirement of Law Enforcement Agencies in the realm of 5G technology, the Bureau of Police Research & Development (BPR&D), Ministry of Home Affairs, Department of Telecom (DoT) and TCoE-India proudly introduces a National Level Hackathon on 5G, ‘Vimarsh 2023'.
                  </p>
                  <p class="description">
                     5G technology represents a significant advancement compared to 4G, offering substantial improvements in terms of speed, peak data rates, reduced latency, enhanced spectrum efficiency, and increased connection
                     density. One of its most notable features lies in its diverse applications across various economic sectors. Vimarsh 2023 aims and developing India-specific use cases of Law Enforcement Agencies harnessing the capabilities of 5G & beyond technology.
                  </p>
                  <p class="description">
                     Vimarsh 2023, Hackathon on 5G is a critical endeavor aimed at developing potential solutions, ideas and prototypes in the form of Minimum Viable Products, designed to empower Law Enforcement Agencies in their ongoing
                     efforts against cybercrime and cybersecurity threats within the dynamic landscape of 5G communication technology.
                  </p>
               </div>
            </div>
            <div class="col-xl-5 col-lg-12 d-flex justify-content-center align-items-center py-New aos-init aos-animate" data-aos="fade-right">
               <!--<img src="<?php echo base_url(''); ?>include/custom/img/about-us1.jpg" class="img-fluid animated aboutImg" alt="" />-->
               <iframe class="animated aboutImg" width="560" height="315" src="https://www.youtube.com/embed/0Z6CPyksH3Q?rel=0" title="Vimarsh 5G Hackathon 2023" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
         </div>
      </div>
   </section>
   <!-- End About Section -->
   <section class="trackBox mt-5" id="eligibility">
      <div class="container">
         <div class="section-title" data-aos="fade-up">
            <h2>Vimarsh 2023</h2>
            <p>Who can participate for Vimarsh 2023</p>
         </div>
         <div class="row">
            <div class="col-md-12 col-lg-6 mb-3 mb-md-3 mb-lg-0">
               <div class="responsive-video">
                  <img class="elig-img" src="<?php echo base_url(''); ?>include/custom/img/participants1.jpg" />
               </div>
            </div>
            <div class="col-md-12 col-lg-6">
               <div class="row">
                  <div class="col-md-12">
                     <div class="headingSR">
                        <!-- <h6>WHO CAN PARTICIPATE</h6> -->
                        <img src="<?php echo base_url(''); ?>include/custom/img/team.png" alt="" />
                        <!--<h2><span>Track 1:</span> Students from HEIs</h2>-->
                        <p><i class="bi-dot"></i> The event is open to the following who may participate as teams, startups, etc. and may work as a team on solutions and present use cases for the 5G products / solutions</p>
                        <p></p>
                        <p style="margin-top: -13px;"><i class="bi-dot"></i> Technological hubs - R&D institutions, MSMEs, startups, and Academia (Professors, Research scholars with students from IITs, IIITs, NITs and other premier institutes & on being shortlisted either collaborate with existing
                           start-up / MSME or open a Pvt Ltd company to take product to market)
                        </p>
                        <p><i class="bi-dot"></i> Startups, R&D Institutions & Academia owned and controlled by Resident Indian Citizens, academic institutions in India</p>
                        <p><i class="bi-dot"></i> Employees of the Bureau of Police Research & Development (BPR&D) & TCoE India / DoT are not eligible</p>
                     </div>
                  </div>
                  <!-- <div class="col-md-6">
                     <div class="headingSR">                             
                        <img src="<?php echo base_url(''); ?>include/custom/img/rocket.png" alt="">                              
                        <p>To be eligible, participants must be a DIPP / Start-up india registered  start-up/MSME or establish a private limited company or develop a startup to bring their product to the market</p>
                     </div>
                     </div> -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="timeline" class="features">
      <div class="container">
         <div class="section-title" data-aos="fade-up">
            <h2>Vimarsh 2023</h2>
            <p>TIMELINE FOR Vimarsh 2023</p>
         </div>
      </div>
      <div class="testimonials">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="table-responsive">
                     <table id="" class="testimonialTable table table-striped table-bordered display nowrap" style="width: 100%;">
                        <thead>
                           <tr class="probStateTableHeading">
                              <th>S.No.</th>
                              <th>Tasks and Activities</th>
                              <th>Tentative Timeline</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Curtain Raiser - Vimarsh 2023</td>
                              <td>25th Oct, 2023</td>
                           </tr>
                           <tr>
                              <td>2</td>
                              <td>Registration And Ideas Submission</td>
                              <td>1st Nov - 9th Dec, 2023</td>
                           </tr>
                           <tr>
                              <td>3</td>
                              <td>Screening Phase I and Screening Phase II for Submitted Products / Solutions</td>
                              <td>10th Dec - 9th Jan, 2024</td>
                           </tr>
                           <tr>
                              <td>4</td>
                              <td>Screening Phase III (Physical demo at prescribed 5G site)</td>
                              <td>10th Jan - 9th Feb, 2024</td>
                           </tr>
                           <tr>
                              <td>5</td>
                              <td>Grand Finale of Vimarsh 2023</td>
                              <td>28th Feb, 2024</td>
                           </tr>
                           <tr>
                              <td>6</td>
                              <td>Envisaged outcome - Field pilots opportunities for the productised use cases (Adaption of best use cases into LEAs network)</td>
                              <td>1st Mar - 28th May, 2024</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="team">
      <div class="container">
         <div class="section-title aos-init aos-animate" data-aos="fade-up">
            <!-- <h2>Team</h2> -->
            <p>Management Committee</p>
         </div>
         <div class="owl-carousel owl-theme">
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/subodh.png" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Subodh Saxena</h4>
                        <span>DDG (IC) DoT & Director TCOE India</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/v.k.roy.jpg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. V.K Roy</h4>
                        <span>DDG (SRI) DoT</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Mr_Brajesh_Mishra.png" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Brajesh Mishra</h4>
                        <span>Director Finance, TCOE India </span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Rajashekhara.jpg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Sh. Rajashekhara N</h4>
                        <span>IPS DD (Mod), BPR&D </span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/joshi_sir.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Brig Navrattan Joshi (Retd)</h4>
                        <span>Consultant, NCR&IC, BPR&D </span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="team">
      <div class="container">
         <div class="section-title aos-init aos-animate" data-aos="fade-up">
            <!-- <h2>Team</h2> -->
            <p>Organizing Committee</p>
         </div>
         <div class="owl-carousel owl-theme">
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/anurag.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Anurag Vibhuti</h4>
                        <span>Deputy Director, TCOE India</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Alex.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Alex Vikas </h4>
                        <span>ADG(SRI) DoT</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Dr.ps.singh.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Dr. P.S. Singh</h4>
                        <span>CCTIA, NCR&IC, BPR&D</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/farhan.png" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Sh. Farhan Sumbul </h4>
                        <span>Solution Architect, NCR&IC, BPR&D </span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/dheeraj.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Sh. Dheeraj Sharma </h4>
                        <span>Content Developer, NCR&IC, BPR&D</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/manisha_meena.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Smt. Manisha Meena </h4>
                        <span>Digital Forensic, NCR&IC, BPR&D</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/ravi.jpg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Sh. Ravi Pratap </h4>
                        <span>Software Developer, NCR&IC, BPR&D </span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Sarat Sahoo.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Sarat Sahoo </h4>
                        <span>Sr. Manager (Finance and Admin), TCOE India </span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Pankaj.jpg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Pankaj Yadav </h4>
                        <span>Asst Program Manager, TCOE India</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Neetu.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Ms. Neetu Singh</h4>
                        <span>Asst Program Manager, TCOE India</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item">
               <div class="video-gallery">
                  <div class="member aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                     <div class="pic"><img src="<?php echo base_url(''); ?>include/custom/committee/Gyanendra.jpeg" alt="" class="img-fluid" /></div>
                     <div class="member-info">
                        <h4>Mr. Gyanendra Singh</h4>
                        <span>Asst Program Manager, TCOE India</span>
                        <span>&nbsp;</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   

   <section id="faq" class="faq section-bg">
      <div class="container">
         <div class="section-title aos-init aos-animate" data-aos="fade-up">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
         </div>
         <details>
            <summary >
               <div>
                  <span class="text-primary">Q1.</span> Who can participate for Vimarsh 2023?
               </div>
            </summary>
            <div class="content">
               <ul>
                  <li><p><i class="bi-check"></i> The event is open to the following who may participate as teams, startups, etc. and may work as a team on solutions and present use cases for the 5G products / solutions</p></li>
                  <li><p><i class="bi-check"></i> Technological hubs - R&D institutions, MSMEs, startups, and Academia (Professors, Research scholars with students from IITs, IIITs, NITs and other premier institutes & on being shortlisted either collaborate with existing start-up / MSME or open a Pvt Ltd company to take product to market)</p></li>
                  <li><p><i class="bi-check"></i> Startups, R&D Institutions & Academia owned and controlled by Resident Indian Citizens, academic institutions in India</p></li>
                  <li><p><i class="bi-check"></i> Employees of the Bureau of Police Research & Development (BPR&D) & TCoE India / DoT are not eligible</p></li>
               </ul>
            </div>
         </details>
         <details>
            <summary>
               <div>
                  <span class="text-primary">Q2.</span> How do I register for Vimarsh 2023?
               </div>
            </summary>
            <div class="content">
               <!-- <h6 class="mb-3">To register for the Vimarsh 2023, please follow the steps below :</h6> -->
               <ul>
                  <li><p><i class="bi-check"></i> Click on Register tab</p></li>
                  <li><p><i class="bi-check"></i> Fill the required details and click on Sign Up button</p></li>
                  <li><p><i class="bi-check"></i> You will receive OTP in your email, enter that OTP in OTP section and verify your account</p></li>
                  <li><p><i class="bi-check"></i> Your account will be verified immediately after entering the OTP</p></li>
               </ul>
            </div>
         </details>
         <details>
            <summary>
               <div><span class="text-primary">Q3.</span> How do we submit our Application?</div></summary>
            <div class="content">
               <ul>
               <li><p><i class="bi-check"></i>  Only online</p></li>
               </ul>
            </div>
         </details>
         <details>
            <summary>
               <div><span class="text-primary">Q4.</span> When and where will the physical product / solution demonstrations take place?</div> </summary>
            <div class="content">
               <ul>
               <li><p><i class="bi-check"></i>  Physical product / solution demonstrations are tentatively scheduled to take place at IIT Madras, Chennai, in the month of Jan / Feb 2024</p></li>
               </ul>
            </div>
         </details>
         <details>
            <summary>
               <div><span class="text-primary">Q5.</span> General Information Regarding Grand Finale?</div></summary>
            <div class="content">
               <ul>
               <li> <p<i class="bi-check"></i> The event is tentatively scheduled for February 28, 2024, and the venue will be updated to the winners</p></li>
               </ul>
            </div>
         </details>
         <details>
            <summary>
               <div><span class="text-primary">Q6.</span> What are Prizes to be won?</div></summary>
            <div class="content">
               <ul>
                  <li><p><i class="bi-check"></i> Winners will be awarded INR. 1,50,000 - each</p></li>
                  <li><p><i class="bi-check"></i> Support of INR 2,50,000 provided to the winners for productization</p></li>
               </ul>
            </div>
         </details>
         <details>
            <summary>
               <div>
                  <span class="text-primary">Q7.</span> What is the Screening process ?</div></summary>
            <div class="content">
               <p><b><i class="bi-caret-right-fill"></i> Screening I (Timeline: 1 month) : 10th Dec 2023 - 9th Jan 2024</b></p>
               <ul>
                  <li><p><i class="bi-check"></i> This stage involves the initial screening process, conducted virtually by the TCOE India (Telecom Center of Excellence). The aim is to evaluate the submissions and select the top 100 participants, with each problem statement being assigned to 10 teams</p></li>
                  <li><p><i class="bi-check"></i> Screening Committee (Combined Team of DoT, TCoE India, BPR&D, and I4C as Jury) : The Screening Committee consist of members from the Department of Telecommunications (DoT), Telecom Centres of Excellence (TCoE India), the Bureau of Police Research & Development (BPR&D), and the Indian Cyber Crime Coordination Centre (I4C) serving as the jury</p></li>
               </ul>
               <p class="mt-5"><b><i class="bi-caret-right-fill"></i> Screening II : 10th Dec 2023 - 9th Jan 2024</b></p>
               <ul>
                  <li><p><i class="bi-check"></i> Subsequently, a second screening process will take place, involving evaluation by a jury of around 5 members and 2 back-up members, also conducted virtually. The goal here is to further narrow down the selection to 50 participants, with each problem statement being represented by 5 teams</p></li>
                  <li><p><i class="bi-check"></i>  The evaluation will be carried out by Jury (DoT, TCoE India, BPR&D, I4C & Industry Experts)</p></li>
               </ul>
               <p class="mt-5"><b><i class="bi-caret-right-fill"></i> Screening III (Timeline : 2 months) – 10th Jan - 9th Feb 2024</b></p>
               <ul>
                  <li><p><i class="bi-check"></i> This stage signifies a more in-depth evaluation phase. It involves physical demonstrations at specific 5G sites and the assessment of proof of concepts (PoC). Out of the participants, 20 teams are selected, with each problem statement being represented by 2 teams</p></li>
                  <li><p><i class="bi-check"></i>  The evaluation will be carried out by a jury consisting of representatives from various organizations, including the Department of Telecommunications (DoT), TCoE India, BPR&D, I4C, and industry experts in physical setting</p></li>
               </ul>
            </div>
         </details>
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
</main>
<!-- End #main -->
<!-- ======= Footer ======= -->
<?php $base = realpath(__DIR__);
   include $base . '/common/footer.php'; ?>
<script src="<?php echo base_url(''); ?>include/js/owl.carousel.min.js"></script>
<script>
   $(".owl-carousel").owlCarousel({
       items: 4,
       loop: true,
       margin: 10,
       nav: false,
       autoplay: true,
       autoplayTimeout: 4000,
       autoplayHoverPause: true,
       responsive: {
           0: {
               items: 1,
           },
           600: {
               items: 3,
           },
           1000: {
               items: 4,
           },
       },
   });
   $('.play').on('click', function() {
       owl.trigger('play.owl.autoplay', [5000])
   })
   $('.stop').on('click', function() {
       owl.trigger('stop.owl.autoplay')
   })
</script>


<script>
// $('[data-click="accordion"]').click(function(){
//   if(!$(this).is('.open')){
//     $('[data-click="accordion"].open').each((i, item)=>{
//       item.click();
//     });
//     $(this).addClass('open');    
//   }
//   else{
//     $(this).removeClass('open');
//   }
// });


var accordions = document.querySelectorAll("button.accordion");

for (var i = 0; i < accordions.length; i++) {
  accordions[i].onclick = function() {
    this.classList.toggle("active");
    this.nextElementSibling.classList.toggle("show");
    hideAll(this);
  };
}

function hideAll(exceptThis) {
  for (var i = 0; i < accordions.length; i++) {
    if (accordions[i] !== exceptThis) {
      accordions[i].classList.remove("active");
      accordions[i].nextElementSibling.classList.remove("show");
    }
  }
}

var accordionsInner = document.querySelectorAll("button.accordion-inner");

for (var n = 0; n < accordionsInner.length; n++) {
  accordionsInner[n].onclick = function() {
    this.classList.toggle("active");
    this.nextElementSibling.classList.toggle("show");
    hideAllinner(this);
  };
}

function hideAllinner(exceptThis) {
  for (var n = 0; n < accordionsInner.length; n++) {
    if (accordionsInner[n] !== exceptThis) {
     accordionsInner[n].classList.remove("active");
     accordionsInner[n].nextElementSibling.classList.remove("show");
    }
  }
}
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

