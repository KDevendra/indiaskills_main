
<style>
               .alert p{margin-bottom: 2px;}
</style><div class="main-container container-fluid">
   <div class="inner-body">
      <div class="page-header">
         <div>
            <h2 class="main-content-title tx-24 mg-b-5">
               <?php
                  $segment = $this->uri->segment(1); $segmentWithSpaces = str_replace('-', ' ', $segment); echo ucwords($segmentWithSpaces); ?>
            </h2>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard');?>">Dashboard</a></li>
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
               <div class="card-body">
              
                  <form class="custom-wizard" method="post" action="<?php echo base_url('post-change-password')?>" enctype="multipart/form-data">
                     <h4 class="mt-2"><b>Enter Your Detail</b></h4>
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
                     <div class="">
                        <div class="row row-sm">
                           <div class="col-lg-4 form-group">
                              <label class="form-label">Old Passsword: </label>
                              <input class="form-control" name="CurrentPassword" id="CurrentPassword" value="<?php echo set_value('CurrentPassword');?>" placeholder="Enter Old Passsword" type="password"  >
                           </div>
                           <div class="col-lg-4 form-group">
                              <label class="form-label">New Password: </label>
                              <input class="form-control" name="NewPassword" id="NewPassword" value="<?php echo set_value('NewPassword');?>" placeholder="Enter New Password" type="password" minlength="6" maxlength="16"  >
                           </div>
                           <div class="col-lg-4 form-group">
                              <label class="form-label">Confirm Password: </label>
                              <input class="form-control" name="ConfirmPassword" id="ConfirmPassword" value="<?php echo set_value('ConfirmPassword');?>" placeholder="Enter Confirm Password" type="password"  minlength="6" maxlength="16" >
                           </div>
                        </div>
                     </div>
                     <div class="button-container">
                                    <button type="submit" class="next more btn ripple btn-success" >Change</button>
                           </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $('#reloadButton').click(function () {
     location.reload();
   });
</script>