<div class="main-container container-fluid">
   <div class="inner-body">
      <div class="page-header">
         <div>
            <h2 class="main-content-title tx-24 mg-b-5">
               <?php
                  $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
            </h2>
            <ol class="breadcrumb">
            <?php
               $userType = $this->session->login['UserLevel'];
               switch ($userType) {
                  case '1':
                     $link = base_url('admin-dashboard');
                     $text = 'Dashboard';
                     break;
                  case '2':
                     $link = base_url('user-dashboard');
                     $text = 'Dashboard';
                     break;
                  default:
                     $link = base_url('sign-in');
                     $text = 'Unknown';
                     break;
               }
               ?>
               <li class="breadcrumb-item"><a href="<?php echo $link; ?>"><?php echo $text; ?></a></li>
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
      <div class="row row-sm">
         <div class="col-lg-12">
            <div class="card custom-card overflow-hidden">
               <div class="card-body" id="printableArea">
                  <div class="">
                     <?php 
                        $UserId = $this->session->login['UserId'];
                        $checkRegistrationStatus = checkRegistrationStatus($UserId)
                        ?>                    
                     <div class="step active">
                        <div id="serverSideValidation"></div>
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
                        <form class="custom-wizard" method="post" action="<?php echo base_url('post-company-profile')?>" enctype="multipart/form-data">
                           <h4 class="preview-header"><b>Company Profile</b></h4>
                           <div class="">
                              <div class="row row-sm" style="padding:0 15px;">
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Application Id: </label> 
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->application_id)) {echo $getApplicationPreview->application_id;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Application Status: </label> 
                                    <?php
                                       switch ($getApplicationPreview->application_status) {
                                       case '1':
                                       echo '<span class="badge bg-pill bg-warning">Pending</span>';
                                       break;
                                       case '2':
                                       echo '<span class="badge bg-pill bg-success">Approved</span>';
                                       break;
                                       case '3':
                                       echo '<span class="badge bg-pill bg-danger">Rejected</span>';
                                       break;
                                       case '4':
                                       echo '<span class="badge bg-pill bg-info">Winner</span>';
                                       break;
                                       default:
                                       echo 'Unknown';
                                       }
                                       ?>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Name: </label> 
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->name)) {echo $getApplicationPreview->name;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Company / Entity Name:</label>   
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->company_name)) {echo $getApplicationPreview->company_name;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Contact No: </label>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->contact_no)) {echo $getApplicationPreview->contact_no;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Email ID: </label>
                                    <p>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->email)) {echo $getApplicationPreview->email;}?></p>
                                    </p> 
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">City: </label>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->city)) {echo $getApplicationPreview->city;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">State: </label>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->state)) {echo $getApplicationPreview->state;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Phone: </label>
                                    <p>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->phone)) {echo $getApplicationPreview->phone;}?></p>
                                    </p> 
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Postal Address: </label>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->postal_address)) {echo $getApplicationPreview->postal_address;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Applying as an: </label>   
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->applying_as_an)) {echo $getApplicationPreview->applying_as_an;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Applying as an (Attachment): </label>
                                    <p>
                                       <?php
                                          if (!empty($getApplicationPreview->upload_certificate) && isset($getApplicationPreview->upload_certificate)) {
                                             $upload_certificatetUrl = base_url('uploads/Applying_as_an/') . $getApplicationPreview->upload_certificate;
                                             echo '<a target="_blank" href="' . htmlspecialchars($upload_certificatetUrl) . '">View Attachment</a>';
                                          } else {
                                             echo 'No attachment available.';
                                          }
                                          ?>
                                    </p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Problem Statements : </label>
                                    <p>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->problem_statements)) {echo $getApplicationPreview->problem_statements;}?></p>
                                    </p> 
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Website/URL: </label>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->website_url)) {echo $getApplicationPreview->website_url;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Company Turnover: </label>
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->company_turnover)) {echo $getApplicationPreview->company_turnover;}?></p>
                                 </div>
                              </div>
                           </div>
                           <h4 class="preview-header mt-3"><b>Technical</b></h4>
                           <div class="">
                              <div class="row row-sm" style="padding:0 15px;">
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Domain/Thrust Area: </label> 
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->domain)) {echo $getApplicationPreview->domain;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">About your product/solution:</label>      
                                    <p><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->brief_solution)) {echo $getApplicationPreview->brief_solution;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Technical Details or Work/Process flow of Product/Solution: </label>
                                    <p> <a target="_blank" href="<?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->technical_details_link)) {echo $getApplicationPreview->technical_details_link;}?>"><?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->technical_details_link)) {echo $getApplicationPreview->technical_details_link;}?></a> </p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Product Video: </label>
                                    <p> 
                                    <?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->point_presentation)): ?>
                                       <?php if ($getApplicationPreview->point_presentation === 'link'): ?>
                                          <a target="_blank" href="<?php echo $getApplicationPreview->point_presentationlink; ?>">View Attachment</a>
                                       <?php elseif ($getApplicationPreview->point_presentation === 'file'): ?>
                                          <a href="<?php echo base_url('uploads/Power_Point_Presentation/').$getApplicationPreview->point_presentationfile; ?>" target="_blank" >View Attachment</a>
                                       <?php endif; ?>
                                       
                                    <?php endif; ?>

                                    </p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Stage of Product based on (TRL): </label>
                                    <p> <?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->stag_of_product)) {echo $getApplicationPreview->stag_of_product;}?></p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Proof for POC (Video, Picture, etc.): </label>
                                    <p> 
                                    <?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->proof_for_poC)): ?>
                                       <?php if ($getApplicationPreview->proof_for_poC === 'link'): ?>
                                          <a target="_blank" href="<?php echo $getApplicationPreview->proof_for_poCLink; ?>">View Attachment</a>
                                       <?php elseif ($getApplicationPreview->proof_for_poC === 'file'): ?>
                                          <a href="<?php echo base_url('uploads/Proof_for_poC/').$getApplicationPreview->proof_for_poCFile; ?>"target="_blank" >View Attachment</a>
                                          <?php elseif ($getApplicationPreview->proof_for_poC === 'none'): ?>
                                             None
                                       <?php endif; ?>
                                       
                                       
                                    <?php endif; ?>

                                    </p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Patent of Prouct/Solution: </label>
                                    <?php    if (isset($getApplicationPreview->patent_product) && $getApplicationPreview->patent_product === 'yes') 
                                       {
                                          echo "<p class='mb-1'>Application Number: $getApplicationPreview->application_number</p>";
                                          echo "<p class='mb-1'>Date of Filing: $getApplicationPreview->date_of_filing</p>";
                                          echo "<p class='mb-1'>Country: $getApplicationPreview->country</p>";
                                       }
                                       else
                                       {
                                          echo "<p>No</p>";
                                       }
                                       
                                       ?>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Validates/Tested Product: </label>
                                    <p> 
                                    <?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->validated)): ?>
                                       <?php if ($getApplicationPreview->validated === 'link'): ?>
                                          <a target="_blank" href="<?php echo $getApplicationPreview->validatedLink; ?>">View Attachment</a>
                                       <?php elseif ($getApplicationPreview->validated === 'file'): ?>
                                          <a href="<?php echo base_url('uploads/Validated/').$getApplicationPreview->validatedFile; ?>" target="_blank">View Attachment</a>
                                          <?php elseif ($getApplicationPreview->validated === 'none'): ?>
                                             None
                                       <?php endif; ?>
                                       
                                    <?php endif; ?>

                                    </p>
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Similar Product/Solution available in the market: </label>      
                                    <?php    if (isset($getApplicationPreview->similar_product) && $getApplicationPreview->similar_product === 'yes') 
                                       {
                                          ?>
                                    <p>
                                       <?php
                                          if (!empty($getApplicationPreview->attachment) && isset($getApplicationPreview->attachment)) {
                                             $attachmentUrl = base_url('uploads/') . $getApplicationPreview->attachment;
                                             echo '<a target="_blank" href="' . htmlspecialchars($attachmentUrl) . '">View Attachment</a>';
                                          } else {
                                             echo 'No attachment available.';
                                          }
                                          ?>
                                    </p>
                                    <?php 
                                       }
                                       else
                                       {
                                          echo "<p>No</p>";
                                       }
                                       
                                       ?>                              
                                 </div>
                                 <div class="col-lg-4 form-group">
                                    <label class="form-label">Describe how your solution or products classifies as a 5G/6G use case : </label>
                                    <p> <?php if (!empty($getApplicationPreview) && isset($getApplicationPreview->products_lassifies_as_a_5G)) {echo $getApplicationPreview->products_lassifies_as_a_5G;}?> </p>
                                 </div>
                              </div>
                           </div>
                           <h4 class="preview-header mt-3"><b>Document</b></h4>
                           <div class="">
                              <div class="row row-sm" style="padding:0 15px;">
                                 <div class="col-lg-6 form-group">
                                    <label class="form-label">51% shareholding by Indian Citizen or Indian Entity: </label> 
                                    <p> <?php
                                       if (!empty($getApplicationPreview) && isset($getApplicationPreview->indian_citizen)) {
                                          $attachmentUrl = base_url('uploads/') . $getApplicationPreview->indian_citizen;
                                          echo '<a target="_blank" href="' . htmlspecialchars($attachmentUrl) . '">View Attachment</a>';
                                       } else {
                                          echo 'No attachment available.';
                                       }
                                       ?></p>
                                 </div>
                                 <div class="col-lg-6 form-group">
                                    <label class="form-label">Id Proof/Passport of Applicant:</label>
                                    <?php
                                       if (!empty($getApplicationPreview) && isset($getApplicationPreview->id_proof)) {
                                          $attachmentUrl = base_url('uploads/') . $getApplicationPreview->id_proof;
                                          echo '<a target="_blank" href="' . htmlspecialchars($attachmentUrl) . '">View Attachment</a>';
                                       } else {
                                          echo 'No attachment available.';
                                       }
                                       ?>                                    
                                 </div>
                                 <div class="col-lg-12 form-group border-0">
                                    <div class="form-check form-check-inline">
                                       <label class="rdiobox"><input name="declare" checked required="" type="radio" value="yes"> <span>I declare that all the information given by me in this application and documents attached
                                       hereto are true to the best of my knowledge and that I have not willfully suppressed any material
                                       fact. I accept that if any of the information given by me in this application is in any way false or
                                       incorrect, my application may be rejected, any offer of the grant may be withdrawn or my
                                       candidature may be rejected at any time.</span></label>
                                    </div>
                                 </div>
                                 <div class="col-lg-12 form-group border-0">
                                    <?php
                                       $userLevel = $this->session->login['UserLevel'];
                                       $remark = $getApplicationPreview->remark ?? null;
                                       
                                       if ($userLevel === '1' && $remark !== null && $remark !== '') {
                                       ?>
                                    <div class="alert alert-primary" role="alert">
                                       <?php echo "<b>Comment:</b> ".$remark; ?>
                                    </div>
                                    <?php
                                       }
                                       ?>
                                    <div class="d-flex justify-content-center btn______">
                                       <?php
                                          $userLevel = $this->session->login['UserLevel'];
                                          $applicationStatus = $getApplicationPreview->application_status ?? null;
                                          
                                          if ($userLevel === '1') {
                                             if ($applicationStatus === '1') {
                                                ?>
                                       <button type="button" class="btn ripple btn-success mr-3 approveBtn">Approve</button>
                                       <button type="button" class="btn ripple btn-danger mr-3 rejectBtn">Reject</button>
                                       <?php
                                          }
                                          ?>
                                       <button type="button" class="btn ripple btn-info mr-3 commentBtn" data-bs-target="#modelCreateMenu" data-bs-toggle="modal">Comment</button>
                                       <button type="button" class="btn ripple btn-primary mr-3" id="downloadPreviewButton">Download</button>
                                       <?php
                                          } else {
                                             ?>
                                       <button type="button" class="btn ripple btn-primary mr-3" id="downloadPreviewButton">Download</button>
                                       <?php
                                          }
                                          ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- add model -->
<div class="modal fade" id="modelCreateMenu">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content-demo">
         <div class="modal-header">
            <h6 class="modal-title">Add Your Comment</h6>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
         </div>
         <div class="modal-body">
            <form action="#" data-parsley-validate="" novalidate="">
               <div class="">
                  <div class="row row-sm">
                     <div class="col-lg-12">
                        <label class="form-label">Comment: <span class="tx-danger">*</span></label> 
                        <input type="hidden" name="user_id" value="<?php echo $getApplicationPreview->user_id;?>" id="user_id">
                        <textarea name="remark" class="form-control" id="remark" ></textarea>
                        <span id="error_remark" class="text-danger"></span>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer"><button class="btn ripple btn-primary" type="button" id="savechanges">Save changes</button> <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button></div>
      </div>
   </div>
</div>
<script type="text/javascript">
   function showLoader() {
                  $(".loader").show();
                  $('#downloadPreviewButton').prop("disabled", true).html('<span class="loader"></span>');
              }
   
   function hideLoader() {
                  $(".loader").hide();
                  $('#downloadPreviewButton').prop("disabled", false).html("Download");
              }
   $(document).ready(function() {
   $('#reloadButton').click(function() {
       location.reload();
   });
   $(document).on("click", ".approveBtn", function() {
       var user_id = "<?php echo  $getApplicationPreview->user_id;?>";
       Swal.fire({
           title: 'Approve this application?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, Approve it!'
       }).then((result) => {
           if (result.isConfirmed) {
               $.ajax({
                   url: "<?php echo base_url('post-approve-application') ?>",
                   type: "POST",
                   data: {
                       user_id: user_id
                   },
                   success: function(response) {
                       if (response.status === 'success') {
                           Swal.fire({
                               icon: "success",
                               title: "Success",
                               text: response.message,
                           }).then((result) => {
                               if (result.isConfirmed) {
                                   window.location.href = "<?php echo base_url('application-list');?>";
   
                               }
                           });
                       } else {
                           Swal.fire({
                               icon: "error",
                               title: "Error",
                               text: response.message,
                           });
                       }
   
                   },
                   error: function(xhr, textStatus, errorThrown) {
                       Swal.fire({
                           icon: "error",
                           title: "Error",
                           text: 'Somethibg want to wrong',
                       });
                   }
               });
           }
       });
   });
   $(document).on("click", ".rejectBtn", function() {
       var user_id = "<?php echo  $getApplicationPreview->user_id;?>";
       Swal.fire({
           title: 'Reject this application?',
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, Reject it!'
       }).then((result) => {
           if (result.isConfirmed) {
               $.ajax({
                   url: "<?php echo base_url('post-reject-application') ?>",
                   type: "POST",
                   data: {
                       user_id: user_id
                   },
                   success: function(response) {
                       if (response.status === 'success') {
                           Swal.fire({
                               icon: "success",
                               title: "Success",
                               text: response.message,
                           }).then((result) => {
                               if (result.isConfirmed) {
                                   window.location.href = "<?php echo base_url('application-list');?>";
   
                               }
                           });
                       } else {
                           Swal.fire({
                               icon: "error",
                               title: "Error",
                               text: response.message,
                           });
                       }
   
                   },
                   error: function(xhr, textStatus, errorThrown) {
                       Swal.fire({
                           icon: "error",
                           title: "Error",
                           text: 'Somethibg want to wrong',
                       });
                   }
               });
           }
       });
   });
   $(document).on("click", ".commentBtn", function() {
       var user_id = "<?php echo  $getApplicationPreview->user_id;?>";
       $.ajax({
           url: "<?php echo base_url('get-comment-data')?>",
           type: 'post',
           dataType: 'json',
           data: {
               user_id: user_id
           },
           success: function(response) {
               if (response.data && response.data.length > 0) {
                   var data = response.data[0];
                   $('#menu_id').val(data.id);
                   $("#remark").val(data.remark);
               }
           },
           error: function(xhr, textStatus, errorThrown) {
               console.error(xhr.statusText);
           }
       });
   });
   $(document).on("click", "#savechanges", function() {
       var isValid = true;
       var remark = $("#remark").val();
       var user_id = $("#user_id").val();
       if (!remark) {
           $("#error_remark").text("Comment is required.");
           isValid = false;
       } else {
           $("#error_remark").text("");
       }
       if (isValid) {
           var postData = {
               remark: remark || null,
               user_id: user_id || null,
           };
           $.ajax({
               url: "<?php echo base_url('update-comment')?>",
               type: 'post',
               data: postData,
               success: function(response) {
                   $("#remark").val("");
                   $("#user_id").val("");
                   $("#modelCreateMenu").modal('hide');
                   if (response.status === 'success') {
                       Swal.fire({
                           icon: "success",
                           title: "Success",
                           text: response.message,
                       }).then((result) => {
                           if (result.isConfirmed) {
                            location.reload();
   
                           }
                       });
                   } else {
                       Swal.fire({
                           icon: "error",
                           title: "Error",
                           text: response.message,
                       });
                   }
               },
               error: function(xhr, textStatus, errorThrown) {
                   Swal.fire({
                       icon: "error",
                       title: "Error",
                       text: response.message,
                   });
               }
           });
       }
   });
   $(document).on('click', "#downloadPreviewButton", function () {
    var user_id = "<?php echo  $getApplicationPreview->login_id;?>";
      $.ajax({
                   url: "<?php echo base_url('download-application-preview/') ?>"+user_id,
                   beforeSend : showLoader(),
                   success: function(response) {
                      hideLoader();
                       if (response.status === 'success') {
                          window.location.href = "<?php echo base_url('generatePDF/');?>"+response.data;
                       } else {
                         hideLoader();
                           Swal.fire({
                               icon: "error",
                               title: "Error",
                               text: response.message,
                           });
                       }
   
                   },
                   error: function(xhr, textStatus, errorThrown) {
                      hideLoader();
                       Swal.fire({
                           icon: "error",
                           title: "Error",
                           text: 'Somethibg want to wrong',
                       });
                   }
               });
   });
   });
</script>