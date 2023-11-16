<div class="main-container container-fluid">
   <div class="inner-body">
      <div class="page-header">
         <div>
            <h2 class="main-content-title tx-24 mg-b-5">
               <?php
                  $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
            </h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard');?>">Dashboard</a></li>
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
            <div class="card custom-card main-content-body-profile" id="userDetail">
               <div class="card-body">
                  <div class="mb-4 main-content-label">Account</div>
                  <div class="form-group ">
                     <div class="row row-sm">
                        <div class="col-md-3"> <label class="form-label">User Name</label> </div>
                        <div class="col-md-9"> <?php
                           if (isset($userDetail->UserName) && !is_null($userDetail->UserName) && $userDetail->UserName !== '') {
                           echo $userDetail->UserName;
                           } else {
                           echo "Username is either empty or null";
                           }
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="row row-sm">
                        <div class="col-md-3"> <label class="form-label">Email (User Id)</label> </div>
                        <div class="col-md-9"> <?php
                           if (isset($userDetail->UserId) && !is_null($userDetail->UserId) && $userDetail->UserId !== '') {
                               echo $userDetail->UserId;
                           } else {
                               echo "Email (User Id) is either empty or null";
                           }
                           ?></div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="row">
                        <div class="col-md-3"> <label class="form-label">Contact No.</label> </div>
                        <div class="col-md-9"> <?php
                           if (isset($userDetail->ContactNo) && !is_null($userDetail->ContactNo) && $userDetail->ContactNo !== '') {
                               echo $userDetail->ContactNo;
                           } else {
                               echo "Contact No. is either empty or null";
                           }
                           ?></div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="row row-sm">
                        <div class="col-md-3 col"> <label class="form-label">Verification</label> </div>
                        <div class="col-md-9 col"> <?php
                           if (isset($userDetail->IsActive)) {
                           if (empty($userDetail->IsActive)) {
                           echo '<span class="badge bg-pill bg-warning">Not Verified</span>';
                           } elseif ($userDetail->IsActive === '1') {
                           echo '<span class="badge bg-pill bg-success">Verified</span>';
                           } else {
                           echo '<span class="badge bg-pill bg-info">Unknown</span>';
                           }
                           } else {
                           echo '<span class="badge bg-pill bg-info">Unknown</span>';
                           }
                           ?>
                        </div>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="row row-sm">
                        <div class="col-md-3 col"> <label class="form-label">Created Date</label> </div>
                        <div class="col-md-9 col"> <?php
                           if (isset($userDetail->CreatedAt) && !is_null($userDetail->CreatedAt) && $userDetail->CreatedAt !== '') {
                               echo $userDetail->CreatedAt;
                           } else {
                               echo "Created is either empty or null";
                           }
                           ?></div>
                     </div>
                  </div>
                  <button type="button" class="btn ripple btn-primary mr-3" data-bs-target="#modelCreateMenu" data-bs-toggle="modal">Send Email</button>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- add model -->
<div class="modal fade" id="modelCreateMenu">
   <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content modal-content-demo">
         <div class="modal-header">
            <h6 class="modal-title">Add Your Email Content</h6>
            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"></button>
         </div>
         <div class="modal-body">
            <div class="row row-sm">
               <div class="col-lg-4">
                  <label class="form-label mb-3">To: </label> 
               </div>
               <div class="col-lg-8">
                  <input type="text" readonly class="form-control mb-3" name="to" value="<?php echo $userDetail->UserId;?>" id="to">
               </div>
               <div class="col-lg-4">
                  <label class="form-label mb-3">CC: </label> 
               </div>
               <div class="col-lg-8">
                  <input type="text"  class="form-control mb-3" name="cc" id="cc">
               </div>
               <div class="col-lg-4">
                  <label class="form-label mb-3">Subject:</label> 
               </div>
               <div class="col-lg-8">
                  <input type="text" name="subject" class="form-control mb-3"  id="subject">
               </div>
               <div class="col-lg-12">
                  <label class="form-label">Message:</label> 
                  <input type="hidden" name="user_id" value="<?php echo $userDetail->LoginId;?>" id="user_id">
                  <textarea id="message" class="form-control mb-3" name="Message"></textarea>
                  <span id="error_message" class="text-danger"></span>
               </div>
            </div>
            <div class="modal-footer"><button class="btn ripple btn-success" type="button" id="savechanges">Send</button> <button class="btn ripple btn-danger" data-bs-dismiss="modal" type="button">Close</button></div>
         </div>
      </div>
   </div>
</div>
<script>
   $('#reloadButton').click(function() {
     location.reload();
   });
   CKEDITOR.replace('message');
   $(document).on("click", "#savechanges", function() {
       var isValid = true;
       var message = CKEDITOR.instances.message.getData();
       var to = $("#to").val();
       var cc = $("#cc").val();
       var subject = $("#subject").val();
       var user_id = $("#user_id").val();
       if (!message) {
           $("#error_message").text("Message is required.");
           isValid = false;
       } else {
           $("#error_message").text("");
       }
       if (isValid) {
           var postData = {
               to: to || null,
               message: message || null,
               user_id: user_id || null,
               cc: cc || null,
               subject: subject || null,
           };
           $.ajax({
               url: "<?php echo base_url('post-send-message')?>",
               type: 'post', 
               data: postData,
               success: function(response) {

                   if (response.status === 'success') {
                                     $("#remark").val("");
              $("#user_id").val("");
              $("#cc").val("");
              $("#subject").val("");
              $("#user_id").val("");
              $("#modelCreateMenu").modal('hide');
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
</script>