<style>
   .disabledNextButton{float: right;}
</style>
<div class="main-container container-fluid">
   <div class="inner-body">
      <div class="page-header">
         <div>
            <h2 class="main-content-title tx-24 mg-b-5">
               <?php
                  $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
            </h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('user-dashboard');?>">Dashboard</a></li>
               <li class="breadcrumb-item active" aria-current="page">
                  <?php
                     $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
               </li>
            </ol>
         </div>
         <div class="d-flex">
            <div class="justify-content-center">
               <button type="button" class="btn btn-white btn-icon-text my-2 me-2" id="backButton"><i class="ti-arrow-left me-2"></i> Back</button>
               <button type="button" class="btn btn-white btn-icon-text my-2 me-2" id="reloadButton"><i class="ti-reload me-2"></i> Reload</button>
            </div>
         </div>
      </div>
      <?php 
         $checkFormStatus = checkFormStep($this->session->login['UserId'], 'form_status');
         if (
          isset($checkFormStatus->form_status) &&
          $checkFormStatus->form_status === '2'
         
         ) {
          ?>
      <div class="row row-sm">
         <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
               <div class="card-body text-center" style="padding:60px">
                  <h3> <b>Your application has been submitted successfully</b> </h3>
                  <img class="mt-5" src="<?php echo base_url('include/custom/check.png')?>" alt="">
                  <div class="text-center">
                     <?php
                        $UserId = $this->session->login['UserId'];
                        $LoginId = $this->session->login['LoginId'];
                        $formDetail = checkFormStep($UserId, 'form_status');
                        if (!empty($formDetail) && $formDetail->form_status === '2') {
                           ?>
                     <a class="btn btn-primary mt-5" href="<?php echo base_url('application-preview/').$LoginId ?>">View Application</a>
                     <?php
                        } 
                        ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php 
         }
           else{
           ?>
      <div class="row row-sm">
         <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
               <div class="card-body">
                  <?php
                     $end_date = strtotime('2023-12-09');
                     $current_date = time();
                     $developmentMode = true;
                     if (!$developmentMode) {
                        if ($current_date < strtotime('2023-10-30 15:15:00')) {
                     ?>
                  <div id="countdown">
                     <div class="container">
                        <div class="construction1 text-center details text-white">
                           <div class="">
                              <img src="<?php echo base_url('');?>include/custom/registration-open.png" class="mb-5" alt="logo"> 
                              <h4 class="text-center text-white tx-30 font-weight-bold ">Registration Page Will Start on 1st of November 2023</h4>
                              <p class="text-white-50 tx-15">Get ready! Registration for Vimarsh opens on November 1, 2023.</p>
                              <div id="launch_date" class="is-countdown">
                                 <ul class="countdown">
                                    <li><span class="number">0</span><br><span class="time">Days</span></li>
                                    <li><span class="number">0</span><br><span class="time">Hours</span></li>
                                    <li><span class="number">0</span><br><span class="time">Minutes</span></li>
                                    <li><span class="number">0</span><br><span class="time">Seconds</span></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     else
                     {
                       ?>
                  <?php 
                     }
                     }
                     ?>
                  <div id="registration-form">
                     <div class="wizard">
                        <?php 
                           $UserId = $this->session->login['UserId'];
                           $checkRegistrationStatus = checkRegistrationStatus($UserId);
                           $formDetail1 = checkFormStep($UserId, 'form1');
                           $formDetail2 = checkFormStep($UserId, 'form2');
                           $formDetail3 = checkFormStep($UserId, 'form3');
                           ?>
                        <div class="step-indicators">
                           <span class="step-indicator active">Profile</span>
                           <span class="step-indicator">Technical</span>
                           <span class="step-indicator">Upload Documents</span>
                        </div>
                        <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger mt-2" role="alert">
                           <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success mt-2" role="alert">
                           <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php endif; ?>
                        <div class="step active">
                           <div id="serverSideValidation"></div>
                           <form class="custom-wizard" method="post" action="<?php echo base_url('post-company-profile')?>" enctype="multipart/form-data">
                              <h4 class="mt-2"><b>Company Profile</b></h4>
                              <div class="">
                                 <div class="row row-sm">
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Name: <span class="text-danger">*</span> </label>
                                       <input type="hidden" name="user_id" value="<?php echo $UserId; ?>">
                                       <input class="form-control" name="name" id="name" placeholder="Enter name" type="text" value="<?php echo !empty($formDetail1) && !empty($formDetail1->name) ? $formDetail1->name : set_value('name'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Company / Entity Name:  <span class="text-danger">*</span></label>
                                       <input class="form-control" name="company_name" id="company_name" placeholder="Enter Company / Entity Name" type="text" value="<?php echo isset($formDetail1->company_name) ? $formDetail1->company_name :  set_value('company_name'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Contact No: <span class="text-danger">*</span></label>
                                       <input class="form-control" name="contact_no" pattern="[6-9]{1}[0-9]{9}" maxlength="10" id="contact_no" placeholder="Enter Contact No" type="text" value="<?php echo isset($formDetail1->contact_no) ? $formDetail1->contact_no :  set_value('contact_no'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Email ID: <span class="text-danger">*</span> </label>
                                       <input class="form-control" name="email" placeholder="Enter email" type="email" value="<?php echo isset($formDetail1->email) ? $formDetail1->email :  set_value('email'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">City: <span class="text-danger">*</span> </label>
                                       <input class="form-control" name="city" id="city" placeholder="Enter city" type="text" value="<?php echo isset($formDetail1->city) ? $formDetail1->city :  set_value('city'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">State: <span class="text-danger">*</span> </label>
                                       <input class="form-control" name="state" id="state" placeholder="Enter state" type="text" value="<?php echo isset($formDetail1->state) ? $formDetail1->state :  set_value('state'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Phone: </label>
                                       <input class="form-control" name="phone" id="phone" maxlength="12"  placeholder="Enter phone" type="text" value="<?php echo isset($formDetail1->phone) ? $formDetail1->phone :  set_value('phone'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Postal Address: </label>
                                       <input class="form-control" name="postal_address" id="postal_address" placeholder="Enter postal address" type="text" value="<?php echo isset($formDetail1->postal_address) ? $formDetail1->postal_address :  set_value('postal_address'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Problem Statements : <span class="text-danger">*</span> </label>
                                       <select class="form-control select select2" id="problem_statements" name="problem_statements" aria-label="Problem Statements">
                                          <option value="" <?php echo set_select('problem_statements', '', isset($formDetail1) && $formDetail1->problem_statements === '' ? true : false); ?>>Problem Statements</option>
                                          <option value="Develop a robust framework to get Real time location of mobile users with Internal authentication App (permissions)" <?php echo set_select('problem_statements', 'Develop a robust framework to get Real time location of mobile users with Internal authentication App (permissions)', isset($formDetail1) && $formDetail1->problem_statements === 'Develop a robust framework to get Real time location of mobile users with Internal authentication App (permissions)' ? true : false); ?>>i. Develop a robust framework to get Real time location of mobile users with Internal authentication App (permissions)</option>
                                          <option value="3D Capturing (AR / VR / XR) of crime scenes using 5G enabled devices also used for capacity building & operations" <?php echo set_select('problem_statements', '3D Capturing (AR / VR / XR) of crime scenes using 5G enabled devices also used for capacity building & operations', isset($formDetail1) && $formDetail1->problem_statements === '3D Capturing (AR / VR / XR) of crime scenes using 5G enabled devices also used for capacity building & operations' ? true : false); ?>>ii. 3D Capturing (AR / VR / XR) of crime scenes using 5G enabled devices also used for capacity building & operations</option>
                                          <option value="App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML" <?php echo set_select('problem_statements', 'App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML', isset($formDetail1) && $formDetail1->problem_statements === 'App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML' ? true : false); ?>>iii. App / framework for integration of surveillance wearables gadgets using IoTs and subsequent analysis & analytics using AI / ML</option>
                                          <option value="Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D (AR / VR)" <?php echo set_select('problem_statements', 'Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D (AR / VR)', isset($formDetail1) && $formDetail1->problem_statements === 'Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D (AR / VR)' ? true : false); ?>>iv. Intelligent Traffic management- 5G enabled AI cameras crime scene management including 3D (AR / VR)</option>
                                          <option value="Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing" <?php echo set_select('problem_statements', 'Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing', isset($formDetail1) && $formDetail1->problem_statements === 'Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing' ? true : false); ?>>v. Develop a Data analytic using 5G Metadata for predictive policing, HoT spot detection, crime mapping, geo fencing</option>
                                          <option value="APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications" <?php echo set_select('problem_statements', 'APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications', isset($formDetail1) && $formDetail1->problem_statements === 'APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications' ? true : false); ?>>vi. APP for Emergency response vehicle ( incl. fire dept vehicles ) embedded with 5G CPEs for Critical Voice / Video / Data communications</option>
                                          <option value="APP for 5G enabled Drones ( control and data ) for surveillance, security and safety" <?php echo set_select('problem_statements', 'APP for 5G enabled Drones ( control and data ) for surveillance, security and safety', isset($formDetail1) && $formDetail1->problem_statements === 'APP for 5G enabled Drones ( control and data ) for surveillance, security and safety' ? true : false); ?>>vii. APP for 5G enabled Drones ( control and data ) for surveillance, security and safety</option>
                                          <option value="Create Software routing security framework for private network for 5G communication network" <?php echo set_select('problem_statements', 'Create Software routing security framework for private network for 5G communication network', isset($formDetail1) && $formDetail1->problem_statements === 'Create Software routing security framework for private network for 5G communication network' ? true : false); ?>>viii. Create Software routing security framework for private network for 5G communication network</option>
                                          <option value="Develop an App A.I / M.L based to give assistance to LEAs in investigation, evidence collection, drafting of charge sheets" <?php echo set_select('problem_statements', 'Develop an App A.I / M.L based to give assistance to LEAs in investigation, evidence collection, drafting of charge sheets', isset($formDetail1) && $formDetail1->problem_statements === 'Develop an App A.I / M.L based to give assistance to LEAs in investigation, evidence collection, drafting of charge sheets' ? true : false); ?>>ix. Develop an App A.I / M.L based to give assistance to LEAs in investigation, evidence collection, drafting of charge sheets</option>
                                       </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Website/URL: </label>
                                       <input class="form-control" name="website_url" id="website_url" placeholder="Enter Website URL" type="text" value="<?php echo isset($formDetail1->website_url) ? $formDetail1->website_url :  set_value('website_url'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Company Turnover: <small class="text-danger"> (Last Financial Year in Lakh's)</small> </label>
                                       <input class="form-control" name="company_turnover" id="company_urnover" placeholder="Enter Company Turnover" type="text" value="<?php echo isset($formDetail1->company_turnover) ? $formDetail1->company_turnover :  set_value('company_turnover'); ?>">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <label class="form-label">Applying as an: <span class="text-danger">*</span> </label>
                                       <select class="form-control select select2" id="applying_as_an" name="applying_as_an" aria-label="Applying as an">
                                          <option value="" >Applying as an</option>
                                          <option value="Startup/MSME" <?php echo set_select('applying_as_an', 'Startup/MSME', ($formDetail1 && $formDetail1->applying_as_an === 'Startup/MSME')); ?>>Startup/MSME</option>
                                          <option value="Academic Institutions" <?php echo set_select('applying_as_an', 'Academic Institutions', ($formDetail1 && $formDetail1->applying_as_an === 'Academic Institutions')); ?>>Academic Institutions</option>
                                          <option value="R&D Institutions" <?php echo set_select('applying_as_an', 'R&D Institutions', ($formDetail1 && $formDetail1->applying_as_an === 'R&D Institutions')); ?>>R&D Institutions</option>
                                          <option value="PSUs" <?php echo set_select('applying_as_an', 'PSUs', ($formDetail1 && $formDetail1->applying_as_an === 'PSUs')); ?>>PSUs</option>
                                          <option value="Collaboration (attach mou)" <?php echo set_select('applying_as_an', 'Collaboration (attach mou)', ($formDetail1 && $formDetail1->applying_as_an === 'Collaboration (attach mou)')); ?>>Collaboration (attach mou)</option>
                                       </select>
                                       <div id="UploadApplyingAsAn" >
                                       </div>
                                       <?php
                                          if (isset($formDetail1->upload_certificate) && $formDetail1->upload_certificate) { ?>
                                       <input type="hidden" value="1" name="hidden_upload_certificate">
                                       <p class="mt-1"> <a target="_blank" href="<?php echo base_url('uploads/Applying_as_an/').$formDetail1->upload_certificate; ?>">View Attachment</a></p>
                                       <?php } ?>
                                    </div>
                                 </div>
                              </div>
                              <div class="button-container">
                                 <?php
                                    $checkFormStep = checkFormStep($UserId, 'form1');
                                    if ($checkFormStep === null) {
                                       echo '<button type="submit" class="btn ripple btn-primary saveDraft">Save Draft</button>';
                                    } else {
                                    if($this->session->flashdata('error'))
                                      {
                                         echo '<button type="button" class="more btn ripple btn-primary disabledNextButton" disabled >Next</button>';
                                         echo '<button type="submit" class="more btn ripple btn-success updateButton" >Update</button>';
                                      }
                                      else
                                      {
                                         echo '<button type="button" class="more btn ripple btn-primary nextButton">Next</button>';
                                         echo '<button type="submit" class="more btn ripple btn-success updateButton" >Update</button>';
                                      }
                                    }
                                    ?>
                              </div>
                           </form>
                        </div>
                        <div class="step">
                           <form class="custom-wizard" method="post" action="<?php echo base_url('post-technical')?>" enctype="multipart/form-data">
                              <h4 class="mt-2"><b>Technical</b></h4>
                              <div class="">
                                 <div class="row row-sm">
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Domain/Thrust Area: <span class="text-danger">*</span> </label>
                                       <input type="hidden" value="<?php echo $UserId; ?>" name="user_id">
                                       <textarea name="domain" id="domain" class="form-control" placeholder="Text 300 words"><?php echo !empty($formDetail2) && !empty($formDetail2->domain) ? $formDetail2->domain : set_value('domain'); ?></textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Brief about your product/solution: <span class="text-danger">*</span></label>
                                       <textarea name="brief_solution" id="brief_solution" class="form-control" placeholder="Text 300 words"><?php echo !empty($formDetail2) && !empty($formDetail2->brief_solution) ? $formDetail2->brief_solution : set_value('brief_solution'); ?></textarea>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Upload the link of Technical Details or Work/Process flow of Product/Solution: <span class="text-danger">*</span> </label>
                                       <input class="form-control" name="technical_details_link" id="technical_details_link" placeholder="Enter Technical Details (link)" type="url" value="<?php echo !empty($formDetail2) && !empty($formDetail2->technical_details_link) ? $formDetail2->technical_details_link : set_value('technical_details_link'); ?>">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Please provide the PowerPoint Presentation / two-minute product video: <span class="text-danger">*</span> </label>
                                       <div class="form-check form-check-inline">
                                          <label class="rdiobox">
                                          <input name="point_presentation" type="radio" value="link" <?php echo !empty($formDetail2) && !empty($formDetail2->point_presentation) && $formDetail2->point_presentation === 'link' ? 'checked' : ''; ?> /> 
                                          <span>Link</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="point_presentation" type="radio" value="file" <?php echo !empty($formDetail2) && !empty($formDetail2->point_presentation) && $formDetail2->point_presentation === 'file' ? 'checked' : ''; ?> /> 
                                          <span>Document</span>
                                          </label>
                                       </div>
                                       <div class="point_presentationlink">
                                          <input type="url" name="point_presentationlink" value="<?php if (isset($formDetail2->point_presentationlink) && !empty($formDetail2->point_presentationlink)) { echo $formDetail2->point_presentationlink;}?>" placeholder="Enter URL (Youtube Link)" class="form-control w-100 mt-1">
                                       </div>
                                       <div class="point_presentationfile">
                                         <p class="mb-0">Upload Document<small class="text-danger">* (Max Size  200kb)</small></p>
                                          <input type="file" accept="application/pdf" name="point_presentationfile" class="form-control w-100 mt-1">
                                       </div>
                                       <?php if (isset($formDetail2->point_presentationfile) && !empty($formDetail2->point_presentationfile)) { ?>
                                       <p> <a target="_blank" href="<?php echo base_url('uploads/Power_Point_Presentation/').$formDetail2->point_presentationfile; ?>">View Attachment</a></p>
                                       <?php } ?>
                                       <?php if (isset($formDetail2->point_presentationlink) && !empty($formDetail2->point_presentationlink)) { ?>
                                       <p> <a target="_blank" href="<?php echo $formDetail2->point_presentationlink; ?>">View Link</a></p>
                                       <?php } ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Stage of Product based on Technology Readiness Level (TRL): <span class="text-danger">*</span> </label>
                                       <select name="stag_of_product" id="stag_of_product" class="form-control select select2 w-100 mt-3">
                                          <option value="" >Stage of Product</option>
                                          <option value="TRL3 Proof of Concept" <?php echo set_select('stag_of_product', 'TRL3 Proof of Concept', ($formDetail2 && $formDetail2->stag_of_product === 'TRL3 Proof of Concept')); ?>>TRL3 Proof of Concept</option>
                                          <option value="TRL4 Bench Scale Research" <?php echo set_select('stag_of_product', 'TRL4 Bench Scale Research', ($formDetail2 && $formDetail2->stag_of_product === 'TRL4 Bench Scale Research')); ?>>TRL4 Bench Scale Research</option>
                                          <option value="TRL5 Pilot Scale" <?php echo set_select('stag_of_product', 'TRL5 Pilot Scale', ($formDetail2 && $formDetail2->stag_of_product === 'TRL5 Pilot Scale')); ?>>TRL5 Pilot Scale</option>
                                          <option value="TRL6 Large Scale" <?php echo set_select('stag_of_product', 'TRL6 Large Scale', ($formDetail2 && $formDetail2->stag_of_product === 'TRL6 Large Scale')); ?>>TRL6 Large Scale</option>
                                          <option value="TRL7 Inactive Commissioning" <?php echo set_select('stag_of_product', 'TRL7 Inactive Commissioning', ($formDetail2 && $formDetail2->stag_of_product === 'TRL7 Inactive Commissioning')); ?>>TRL7 Inactive Commissioning</option>
                                          <option value="TRL8 Active Commissioning" <?php echo set_select('stag_of_product', 'TRL8 Active Commissioning', ($formDetail2 && $formDetail2->stag_of_product === 'TRL8 Active Commissioning')); ?>>TRL8 Active Commissioning</option>
                                          <option value="TRL9 Operations" <?php echo set_select('stag_of_product', 'TRL9 Operations', ($formDetail2 && $formDetail2->stag_of_product === 'TRL9 Operations')); ?>>TRL9 Operations</option>
                                          <option value="Other" <?php echo set_select('stag_of_product', 'Other', ($formDetail2 && $formDetail2->stag_of_product === 'Other')); ?>>Other</option>
                                       </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Proof for PoC (Video, Picture, etc.): </label>
                                       <div class="form-check form-check-inline">
                                          <label class="rdiobox">
                                          <input name="proof_for_poC" type="radio" value="link" <?php echo !empty($formDetail2) && !empty($formDetail2->proof_for_poC) && $formDetail2->proof_for_poC === 'link' ? 'checked' : ''; ?> /> 
                                          <span>Link</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="proof_for_poC" type="radio" value="file" <?php echo !empty($formDetail2) && !empty($formDetail2->proof_for_poC) && $formDetail2->proof_for_poC === 'file' ? 'checked' : ''; ?> /> 
                                          <span>Document</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="proof_for_poC" type="radio" value="none" <?php echo !empty($formDetail2) && !empty($formDetail2->proof_for_poC) && $formDetail2->proof_for_poC === 'none' ? 'checked' : ''; ?>  /> 
                                          <span>None</span>
                                          </label>
                                       </div>
                                       <div class="proof_for_poCLink">
                                          <input type="url" name="proof_for_poCLink"  value="<?php if (isset($formDetail2->proof_for_poCLink) && !empty($formDetail2->proof_for_poCLink)) { echo $formDetail2->proof_for_poCLink;}?>"  placeholder="Enter URL (Youtube Link)" class="form-control w-100 mt-1">
                                       </div>
                                       <div class="proof_for_poCFile">
                                       <p class="mb-0">Upload Document<small class="text-danger">* (Max Size  200kb)</small></p>
                                          <input type="file"  accept="application/pdf" name="proof_for_poCFile" class="form-control w-100 mt-1">
                                       </div>
                                       <?php if (isset($formDetail2->proof_for_poCFile) && !empty($formDetail2->proof_for_poCFile)) { ?>
                                       <p> <a target="_blank" href="<?php echo base_url('uploads/Proof_for_poC/').$formDetail2->proof_for_poCFile; ?>">View Attachment</a></p>
                                       <?php } ?>
                                       <?php if (isset($formDetail2->proof_for_poCLink) && !empty($formDetail2->proof_for_poCLink)) { ?>
                                       <p> <a target="_blank" href="<?php echo $formDetail2->proof_for_poCLink; ?>">View Link</a></p>
                                       <?php } ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Have you filed a patent for your product/solution? <span class="text-danger">*</span></label>
                                       <div class="form-check form-check-inline">
                                          <label class="rdiobox">
                                          <input name="patent_product" type="radio" value="yes" <?php echo !empty($formDetail2) && !empty($formDetail2->patent_product) && $formDetail2->patent_product === 'yes' ? 'checked' : set_radio('patent_product', 'yes'); ?> /> 
                                          <span>Yes</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="patent_product" type="radio" value="no" <?php echo !empty($formDetail2) && !empty($formDetail2->patent_product) && $formDetail2->patent_product === 'no' ? 'checked' : set_radio('patent_product', 'no'); ?> /> 
                                          <span>No</span>
                                          </label>
                                          
                                       
                                       </div>
                                       <?php 
                                          if (isset($formDetail2->patent_product) && $formDetail2->patent_product === 'yes') {
                                          ?>
                                       <div class="patent_product_feild1" <?php if (!empty($formDetail2) && empty($formDetail2->patent_product) && $formDetail2->patent_product !== 'yes') { } ?>>
                                          <label for="If yes, please provide details" class="form-label">If yes, please provide details</label>
                                          <div class="row">
                                             <div class="col-md-4">
                                                <label for="" class="form-label">Application Number <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="application_number" id="application_number" value="<?php echo !empty($formDetail2) && !empty($formDetail2->application_number) ? $formDetail2->application_number : set_value('application_number'); ?>">
                                             </div>
                                             <div class="col-md-4">
                                                <label for="" class="form-label">Date of filing <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="date_of_filing" id="date_of_filing" value="<?php echo !empty($formDetail2) && !empty($formDetail2->date_of_filing) ? $formDetail2->date_of_filing : set_value('date_of_filing'); ?>">
                                             </div>
                                             <div class="col-md-4">
                                                <label for="" class="form-label">Country <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="country" id="country" value="<?php echo !empty($formDetail2) && !empty($formDetail2->country) ? $formDetail2->country : set_value('country'); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <?php 
                                          } else {
                                          ?>
                                       <div class="patent_product_feild" <?php if (!empty($formDetail2) && empty($formDetail2->patent_product) && $formDetail2->patent_product !== 'yes') { echo 'style="display: none;"'; } ?>>
                                          <label for="If yes, please provide details" class="form-label">If yes, please provide details</label>
                                          <div class="row">
                                             <div class="col-md-4">
                                                <label for="" class="form-label">Application Number</label>
                                                <input type="text" class="form-control" name="application_number" id="application_number" value="<?php echo set_value('application_number'); ?>">
                                             </div>
                                             <div class="col-md-4">
                                                <label for="" class="form-label">Date of filing</label>
                                                <input type="date" class="form-control" name="date_of_filing" id="date_of_filing" value="<?php echo set_value('date_of_filing'); ?>">
                                             </div>
                                             <div class="col-md-4">
                                                <label for="" class="form-label">Country</label>
                                                <input type="text" class="form-control" name="country" id="country" value="<?php echo set_value('country'); ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <?php
                                          }
                                          ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Have you validated / Tested your product: </label>
                                       <div class="form-check form-check-inline">
                                          <label class="rdiobox">
                                          <input name="validated" type="radio" value="link" <?php echo !empty($formDetail2) && !empty($formDetail2->validated) && $formDetail2->validated === 'link' ? 'checked' : ''; ?> /> 
                                          <span>Link</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="validated" type="radio" value="file" <?php echo !empty($formDetail2) && !empty($formDetail2->validated) && $formDetail2->validated === 'file' ? 'checked' : ''; ?> /> 
                                          <span>Document</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="validated" type="radio" value="none" <?php echo !empty($formDetail2) && !empty($formDetail2->validated) && $formDetail2->validated === 'none' ? 'checked' : ''; ?>  /> 
                                          <span>None</span>
                                          </label>
                                       </div>
                                       <div class="validatedLink">
                                          <input type="url" name="validatedLink"  value="<?php if (isset($formDetail2->validatedLink) && !empty($formDetail2->validatedLink)) { echo $formDetail2->validatedLink;}?>"   placeholder="Enter URL (Youtube Link)" class="form-control w-100 mt-1">
                                       </div>
                                       <div class="validatedFile">
                                       <p class="mb-0">Upload Document<small class="text-danger">* (Max Size  200kb)</small></p>
                                          <input type="file"  accept="application/pdf" name="validatedFile" class="form-control w-100 mt-1">
                                       </div>
                                       <?php if (isset($formDetail2->validatedFile) && !empty($formDetail2->validatedFile)) { ?>
                                       <p> <a target="_blank" href="<?php echo base_url('uploads/Validated/').$formDetail2->validatedFile; ?>">View Attachment</a></p>
                                       <?php } ?>
                                       <?php if (isset($formDetail2->validatedLink) && !empty($formDetail2->validatedLink)) { ?>
                                       <p> <a target="_blank" href="<?php echo $formDetail2->validatedLink; ?>">View Link</a></p>
                                       <?php } ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Is there any similar product/solution available in the market? Write your solution: <span class="text-danger">*</span></label>
                                       <div class="form-check form-check-inline">
                                          <label class="rdiobox">
                                          <input name="similar_product" type="radio" value="yes" <?php echo !empty($formDetail2) && !empty($formDetail2->similar_product) && $formDetail2->similar_product === 'yes' ? 'checked' : set_radio('similar_product', 'yes'); ?> /> 
                                          <span>Yes</span>
                                          </label>
                                          <label class="rdiobox">
                                          <input name="similar_product" type="radio" value="no" <?php echo !empty($formDetail2) && !empty($formDetail2->similar_product) && $formDetail2->similar_product === 'no' ? 'checked' : set_radio('similar_product', 'no'); ?> /> 
                                          <span>No</span>
                                          </label>
                                       </div>
                                       <?php  
                                          if (isset($formDetail2->similar_product) && $formDetail2->similar_product === 'yes') 
                                             {
                                                ?>
                                       <div class="similar_product_feild1" <?php if (!empty($formDetail2) && empty($formDetail2->similar_product) && $formDetail2->similar_product !== 'yes') {  } ?>>
                                          <p>If yes, does your proposed product have an advantage over other existing solutions</p>
                                          <ul>
                                             <li>List the competition</li>
                                             <li>List out possible advantages of your product/solution over your competitors. Please compare the uniqueness and cost of your product</li>
                                          </ul>
                                          <p class="mb-0"><small class="text-danger">Max Size  200kb</small></p>
                                          <input type="file"  accept="application/pdf" id="attachment" name="attachment">
                                          <?php if (isset($formDetail2->attachment) && !empty($formDetail2->attachment)) { ?>
                                          <p> <a target="_blank" href="<?php echo base_url('uploads/').$formDetail2->attachment; ?>">View Attachment</a></p>
                                          <?php } ?>
                                       </div>
                                       <?php
                                          }
                                          else
                                          {
                                             ?>
                                       <div class="similar_product_feild" <?php if (!empty($formDetail2) && empty($formDetail2->similar_product) && $formDetail2->similar_product !== 'yes') { echo 'style="display: none;"'; } ?>>
                                          <p>If yes, does your proposed product have an advantage over other existing solutions</p>
                                          <ul>
                                             <li>List the competition</li>
                                             <li>List out possible advantages of your product/solution over your competitors. Please compare the uniqueness and cost of your product</li>
                                          </ul>
                                          <p class="mb-0"><small class="text-danger">Max Size  200kb</small></p>
                                          <input type="file" accept="application/pdf" id="attachment" name="attachment">
                                       </div>
                                       <?php 
                                          }
                                             ?>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                       <label class="form-label">Describe how your solution or products classifies as a 5G/6G use case. What are the challenges faced from other network connectivity solutions (3G/4G):</label>
                                       <textarea name="products_lassifies_as_a_5G" id="products_lassifies_as_a_5G" placeholder="Text 300 words" class="form-control"><?php echo !empty($formDetail2) && !empty($formDetail2->products_lassifies_as_a_5G) ? $formDetail2->products_lassifies_as_a_5G : set_value('products_lassifies_as_a_5G'); ?></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="button-container">
                                 <button type="button" class="more btn ripple prevButton">Previous</button>
                                 <?php
                                    $checkFormStep = checkFormStep($UserId, 'form2');
                                    if ($checkFormStep === null) {
                                       echo '<button type="submit" class="btn ripple btn-primary saveDraft">Save Draft</button>';
                                    } else {
                                    if($this->session->flashdata('error'))
                                      {
                                         echo '<button type="button" class="more btn ripple btn-primary disabledNextButton" disabled >Next</button>';
                                         echo '<button type="submit" class="more btn ripple btn-success updateButton" >Update</button>';
                                      }
                                      else
                                      {
                                         echo '<button type="button" class="more btn ripple btn-primary nextButton">Next</button>';
                                         echo '<button type="submit" class="more btn ripple btn-success updateButton" >Update</button>';
                                      }
                                    }
                                    ?>
                              </div>
                           </form>
                        </div>
                        <div class="step">
                           <form class="custom-wizard" method="post" action="<?php echo base_url('post-upload-document')?>" enctype="multipart/form-data">
                              <h4 class="mt-2"><b>Upload the following document</b></h4>
                              <div class="">
                                 <div class="row row-sm">
                                    <div class="col-lg-8 form-group">
                                       <label class="form-label">Minimum 51% shareholding by Indian citizen or Indian Entity <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <input type="hidden" name="user_id" value="<?php echo $UserId ?>">
                                       <p class="mb-0"><small class="text-danger">Max Size  200kb</small></p>
                                       <input class="form-control"  accept="application/pdf" required name="indian_citizen" id="indian_citizen" type="file" />
                                       <?php if (isset($formDetail3->indian_citizen) && !empty($formDetail3->indian_citizen)) { ?>
                                       <a target="_blank" href="<?php echo base_url('uploads/') . $formDetail3->indian_citizen; ?>">View Attachment</a>
                                       <?php } ?>
                                    </div>
                                    <div class="col-lg-8 form-group">
                                       <label class="form-label">ID Proof/ Passport of Indian citizen shareholders: <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                       <p class="mb-0"><small class="text-danger">Max Size  200kb</small></p>
                                       <input class="form-control"  accept="application/pdf" required name="id_proof" id="id_proof" type="file" />
                                       <?php if (isset($formDetail3->id_proof) && !empty($formDetail3->id_proof)) { ?>
                                       <a target="_blank" href="<?php echo base_url('uploads/') . $formDetail3->id_proof; ?>">View Attachment</a>
                                       <?php } ?>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                       <div class="form-check form-check-inline">
                                          <label class="rdiobox"><input name="declare" required type="radio"  value="yes" <?php echo !empty($formDetail3) && !empty($formDetail3->declare) && $formDetail3->declare === 'yes' ? 'checked' : ''; ?> /> <span>I declare that all the information given by me in this application and documents attached
                                          hereto are true to the best of my knowledge and that I have not willfully suppressed any material
                                          fact. I accept that if any of the information given by me in this application is in any way false or
                                          incorrect, my application may be rejected, any offer of the grant may be withdrawn or my
                                          candidature may be rejected at any time.</span></label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="button-container">
                                 <button type="button" class="more btn ripple prevButton">Previous</button>
                                 <?php
                                    $checkFormStep = checkFormStep($UserId, 'form3');
                                    if ($checkFormStep === null) {
                                       echo '<button type="submit" class="btn ripple btn-primary saveDraft">Save Draft</button>';
                                    } else {
                                    if($this->session->flashdata('error'))
                                      {
                                         echo '<button type="button" class="more btn ripple btn-primary" disabledNextButton id="final_submit">Final Submit</button>';
                                         echo '<button type="submit" class="more btn ripple btn-success updateButton" >Update</button>';
                                      }
                                      else
                                      {
                                       echo '<button type="button" class="more btn ripple btn-primary" id="final_submit">Final Submit</button>';
                                       echo '<button type="submit" class="more btn ripple btn-success updateButton" >Update</button>';
                                      }
                                    }
                                    ?>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php 
         }
         ?>
   </div>
</div>
<script>
   const storedStep = localStorage.getItem("currentStep");
   let currentStep = storedStep ? parseInt(storedStep) : 0;
   const $steps = $(".step");
   const $stepIndicators = $(".step-indicator");
   function showStep(stepIndex) {
      $steps.removeClass("active");
      $steps.eq(stepIndex).addClass("active");
      $stepIndicators.removeClass("active");
      $stepIndicators.eq(stepIndex).addClass("active");
   }
   showStep(currentStep);
   
   // $(".step-indicator").on("click", function () {
   //    const clickedStep = $(this).index();
   //    showStep(clickedStep);
   //    currentStep = clickedStep;
   //    localStorage.setItem("currentStep", currentStep.toString());
   // });
   
   $(".nextButton").on("click", function () {
      if (currentStep < $steps.length - 1) {
         currentStep++;
         showStep(currentStep);
         localStorage.setItem("currentStep", currentStep.toString());
      }
   });
   
   $(".prevButton").on("click", function () {
      if (currentStep > 0) {
         currentStep--;
         showStep(currentStep);
         localStorage.setItem("currentStep", currentStep.toString());
      }
   });
   
   $('#reloadButton').click(function () {
      location.reload();
   });
   
   function showLoader() {
      $(".loader").show();
      $('#savechanges, ').prop("disabled", true).html('<span class="loader"></span>');
   }
   
   function hideLoader() {
      $(".loader").hide();
      $('#savechanges,').prop("disabled", false).html('<span>Save changes</span>');
   }
   $.validator.addMethod(
      "applyingAsAn",
      function (value, element) {
         return value !== "Applying as an";
      },
      "Please select an option for Applying as an."
   );
   
   function submitForm(formData) {
      $.ajax({
         url: "<?php echo base_url('post-company-profile');?>",
         type: "post",
         data: formData,
         beforeSend: showLoader,
         success: function (response) {
            hideLoader();
            if (response.status === 'error') {
               if (response.validation_errors) {
                  $("#serverSideValidation").show().html(response.validation_errors);
               } else if (response.message) {
                  Swal.fire({
                     icon: "error",
                     // title: "Error",
                     text: response.message,
                  });
               } else {
                  Swal.fire({
                     icon: "error",
                     // title: "Error",
                     text: "Something went wrong",
                  });
               }
            } else if (response.status === 'success') {
               Swal.fire({
                  icon: "success",
                  // title: "Success",
                  text: response.message,
               }).then(function () {
                  alert("success");
               });
   
            }
         },
         error: function () {
            hideLoader();
            Swal.fire({
               icon: "error",
               // title: "Error",
               text: "Something went wrong",
            });
         },
      });
   }
   
   function printPageArea(areaID) {
      var printContent = document.getElementById(areaID).innerHTML;
      var originalContent = document.body.innerHTML;
      document.body.innerHTML = printContent;
      window.print();
      document.body.innerHTML = originalContent;
   }
   
   function submitTechnicalForm(form) {
      var $technicalForm = $(form);
      var formData = $technicalForm.serialize();
   
      $.ajax({
         url: "<?php echo base_url('post-technical')?>",
         type: "post",
         data: formData,
         contentType: false,
         processData: false,
         beforeSend: showLoader,
         success: function (response) {
            hideLoader();
            handleSubmissionResponse(response);
         },
         error: function () {
            hideLoader();
            Swal.fire({
               icon: "error",
               // title: "Error",
               text: "Something went wrong",
            });
         },
      });
   }
   
   function handleSubmissionResponse(response) {
      if (response.status === 'error') {
         if (response.validation_errors) {
            $("#serverSideValidation").show().html(response.validation_errors);
         } else if (response.message) {
            Swal.fire({
               icon: "error",
               // title: "Error",
               text: response.message,
            });
         } else {
            Swal.fire({
               icon: "error",
               // title: "Error",
               text: "Something went wrong",
            });
         }
      } else if (response.status === 'success') {
         Swal.fire({
            icon: "success",
            // title: "Success",
            text: response.message,
         }).then(function () {
            alert("success");
         });
      }
   }
   
   $(document).ready(function () {
      $('.patent_product_feild').hide();
      var developmentMode = <?php echo ($developmentMode ? 'true' : 'false'); ?>;
                var countdownInterval;
   
                function updateCountdown() {
                    var startDate = new Date('2023-10-30 15:15:00');
                    var currentDate = new Date();
                    var timeRemaining = startDate - currentDate;
   
                    if (timeRemaining <= 0) {
                        $("#countdown").hide();
                        clearInterval(countdownInterval); // Stop the interval when timeRemaining is 0
                        return;
                    }
   
                    var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
   
                    $("#countdown").find(".number").eq(0).text(days);
                    $("#countdown").find(".number").eq(1).text(hours);
                    $("#countdown").find(".number").eq(2).text(minutes);
                    $("#countdown").find(".number").eq(3).text(seconds);
                }
   
                // Update the countdown every second, and clear the interval if timeRemaining is 0
                countdownInterval = setInterval(function () {
                    updateCountdown();
                    if ($("#countdown").is(':hidden')) {
                        clearInterval(countdownInterval);
                        window.location.reload();
                    }
                }, 1000);
      $('input[name="patent_product"]').change(function () {
         if ($(this).val() === 'yes') {
            $('.patent_product_feild').show();
            $('.patent_product_feild1').show();
         } else {
            $('.patent_product_feild').hide();
            $('.patent_product_feild1').hide();
            $("#application_number").val();
            $("#date_of_filing").val();
            $("#country").val();
         }
      });
      $('.validated_feild').hide();
      $('input[name="validated"]').change(function () {
         if ($(this).val() === 'yes') {
            $('.validated_feild').show();
            $('.validated_feild1').show();
         } else {
            $('.validated_feild').hide();
            $('.validated_feild1').hide();
         }
      });
      $('.point_presentationfile').hide();
      $('.point_presentationlink').hide();
      $('input[name="point_presentation"]').change(function () {
         if ($(this).val() === 'link') {
            $('.point_presentationlink').show();
            $('.point_presentationfile').hide();
         }
      else 
         {
            $('input[name="point_presentationlink"]').val('');
            $('.point_presentationfile').show();
            $('.point_presentationlink').hide();
         }
      });
      $('.proof_for_poCFile').hide();
      $('.proof_for_poCLink').hide();
      $('input[name="proof_for_poC"]').change(function () {
         if ($(this).val() === 'link') {
            $('.proof_for_poCLink').show();
            $('.proof_for_poCFile').hide();
         } else if ($(this).val() === 'none') {
            $('input[name="proof_for_poCLink"]').val('');
            $('input[name="proof_for_poC"][value="none"]').prop("checked", true);
            $('.proof_for_poCFile').hide();
            $('.proof_for_poCLink').hide();
         } else {
            $('input[name="proof_for_poCLink"]').val('');
            $('.proof_for_poCFile').show();
            $('.proof_for_poCLink').hide();
         }
      });


      $('.validatedFile').hide();
      $('.validatedLink').hide();
      $('input[name="validated"]').change(function () {
         if ($(this).val() === 'link') {
            $('.validatedLink').show();
            $('.validatedFile').hide();
         }
         else if ($(this).val() === 'none') {
         
            $('.validatedFile').hide();
            $('.validatedLink').hide();
         }
      else 
         {
            $('input[name="validatedLink"]').val('');
            $('.validatedFile').show();
            $('.validatedLink').hide();
         }
      });
      $('.similar_product_feild').hide();
      $('input[name="similar_product"]').change(function () {
         if ($(this).val() === 'yes') {
            $('.similar_product_feild').show();
            $('.similar_product_feild1').show();
         } else {
            $('.similar_product_feild').hide();
            $('.similar_product_feild1').hide();
         }
      });
      $(document).on("change", "#applying_as_an", function () {
         var checkValue = $(this).val();
         var showUploadCertificate = checkValue === 'Startup/MSME' || checkValue === 'Collaboration (attach mou)';

         if (showUploadCertificate) {
            var html = '<p class="mb-1 mt-2"><small><b>Upload Certificate</b><span class="text-danger">* Max PDF size 200kb</span></small></p><input class="mt-0" accept="application/pdf" name="upload_certificate" type="file">';
            $('#UploadApplyingAsAn').html(html);
         } else {
            $('#UploadApplyingAsAn').html('');
         }
      });

      $(document).on("click", "#final_submit", function () {
         var user_id = "<?php echo $this->session->login['UserId'];?>";
         Swal.fire({
            title: "Please note that once you submit the registration form, you won't be able to make any changes.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Submit it!",
         }).then((result) => {
            if (result.isConfirmed) {
               $.ajax({
                  url: "<?php echo base_url('post-final-submit'); ?>",
                  type: "POST",
                  data: {
                     user_id: user_id,
                  },
                  success: function (response) {
                     Swal.fire({
                        icon: "success",
                        // title: "Success",
                        text: response.message,
                     }).then((result) => {
                        if (result.isConfirmed) {
                           localStorage.removeItem("currentStep");
                           window.location.href = "<?php echo base_url('registration')?>";
                        }
                     });
                  },
   
                  error: function (xhr, textStatus, errorThrown) {
                     Swal.fire({
                        icon: "error",
                        // title: "Error",
                        text: "Somethibg want to wrong",
                     });
                  },
               });
            }
         });
      });
      $("#company-profile").validate({
         rules: {
            name: {
               required: true,
               minlength: 3,
               maxlength: 50,
            },
            company_name: {
               required: true,
               minlength: 3,
               maxlength: 255,
            },
            contact_no: {
               required: true,
               minlength: 10,
               maxlength: 20,
            },
            email: {
               required: true,
               email: true,
               maxlength: 255,
            },
            city: {
               required: true,
               maxlength: 255,
            },
            state: {
               required: true,
               maxlength: 255,
            },
            phone: {
               required: true,
               minlength: 10,
               maxlength: 20,
            },
            postal_address: {
               required: true,
               maxlength: 255,
            },
            applying_as_an: {
               applyingAsAn: true,
            },
            problem_statements: {
               required: true,
            },
            website_url: {
               url: true,
               maxlength: 255,
            },
         },
         messages: {
            name: {
               required: "Please enter your name.",
               minlength: "Name must be at least 3 characters.",
               maxlength: "Name can't exceed 50 characters.",
            },
            company_name: {
               required: "Please enter the company/entity name.",
               minlength: "Company name must be at least 3 characters.",
               maxlength: "Company name is too long.",
            },
            contact_no: {
               required: "Please enter a contact number.",
               minlength: "Contact number must have at least 10 digits.",
               maxlength: "Contact number is too long.",
            },
            email: {
               required: "Please enter your email address.",
               email: "Invalid email format.",
               maxlength: "Email address is too long.",
            },
            city: {
               required: "Please enter your city.",
               maxlength: "City address is too long.",
            },
            state: {
               required: "Please enter your state.",
               maxlength: "State is too long.",
            },
            phone: {
               required: "Please enter your phone.",
               maxlength: "Phone is too long.",
            },
            applying_as_an: {
               applyingAsAn: "Please select applying as an.",
   
            },
            problem_statements: {
               required: "Please select problem statements.",
   
            },
            website_url: {
               url: "Please enter correct URL.",
               maxlength: "Website URL is too long.",
            },
         },
         errorPlacement: function (error, element) {
            if (element.attr("name") === "applying_as_an") {
               error.insertAfter(element.next(".select2"));
            } else {
               error.insertAfter(element);
            }
         },
         submitHandler: function (form) {
            var $signUp = $(form);
            var formData = $signUp.serialize();
            submitForm(formData);
         },
      });
      $("#technical").validate({
         rules: {
            domain: {
               required: true,
               maxlength: 500
            },
            brief_solution: {
               required: true,
               maxlength: 1000
            },
            technical_details_link: {
               required: true,
               url: true
            },
            point_presentation: {
               url: true
            },
            stag_of_product: {
               required: true,
               maxlength: 1000
            },
            proof_for_poC: {
               url: true
            },
            patent_product: {
               required: true
            },
            application_number: {
               required: function (element) {
                  return $("input[name='patent_product']:checked").val() === "yes";
               }
            },
            date_of_filing: {
               required: function (element) {
                  return $("input[name='patent_product']:checked").val() === "yes";
               }
            },
            country: {
               required: function (element) {
                  return $("input[name='patent_product']:checked").val() === "yes";
               }
            },
            validated: {
               required: true
            },
            validation_details: {
               url: true
            },
            similar_product: {
               required: true
            },
            advantage_details: {
               required: function (element) {
                  return $("input[name='similar_product']:checked").val() === "yes";
               }
            },
            products_lassifies_as_a_5G: {
               required: true
            }
         },
         messages: {
            domain: {
               required: "Please enter the domain/thrust area.",
               maxlength: "Domain/thrust area must be at most 500 words."
            },
            brief_solution: {
               required: "Please provide a brief about your product/solution.",
               maxlength: "Brief about your product/solution must be at most 1000 words."
            },
            technical_details_link: {
               required: "Please provide a link to technical details.",
               url: "Please enter a valid URL."
            },
            point_presentation: {
               url: "Please enter a valid URL."
            },
            stag_of_product: {
               required: "Please provide the stage of the product based on Technology Readiness Level (TRL).",
               maxlength: "Stage of the product TRL must be at most 1000 words."
            },
            proof_for_poC: {
               url: "Please enter a valid URL."
            },
            patent_product: {
               required: "Please select whether you've filed a patent for your product/solution."
            },
            application_number: {
               required: "Please enter the application number."
            },
            date_of_filing: {
               required: "Please enter the date of filing."
            },
            country: {
               required: "Please enter the country."
            },
            validated: {
               required: "Please select whether you've validated/tested your product."
            },
            validation_details: {
               url: "Please enter a valid URL for validation details."
            },
            similar_product: {
               required: "Please select whether there's a similar product/solution available in the market."
            },
            advantage_details: {
               required: "Please provide details if your product has an advantage over existing solutions."
            },
            products_lassifies_as_a_5G: {
               required: "Please describe how your solution or product classifies as a 5G/6G use case and the challenges faced from other network connectivity solutions (3G/4G)."
            }
         },
         submitHandler: function (form) {
            form.submit();
         }
      });
   })
</script>
