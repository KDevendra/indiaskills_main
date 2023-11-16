<?php include_once __DIR__ . '/../common/admin-header.php'; ?>
<style>
   @media only screen and (max-width: 570px){
      .ad-footer{
         display:flex;
         flex-direction:column;
         align-items:center;
         gap:1rem;

      }
   }
</style>
<div class="page">
   <!-- Main Header-->
   <?php include_once __DIR__ . '/../common/top-navbar.php'; ?>
   <!-- Sidemenu -->
   <?php include_once __DIR__ . '/../common/leftside-bar.php'; ?>
   <!-- End Sidemenu -->
   <!-- Main Content-->
   <div class="main-content side-content pt-0">
      <?php include_once __DIR__ . '/../' . $page_name . '.php'; ?>
      <!-- Main Footer-->
      
   </div>
   <div class="main-content side-content main-footer text-center ">
         <div class="container p-3">
            <div class="row row-sm">
               <div class="col-md-12 ad-footer d-flex justify-content-between align-items-center">
                  <span class="fw-bold">Copyright © <?php echo date('Y');?> <a href="javascript:void(0)"><b>Vimarsh 2023</b></a>. All rights reserved.</span>
                  <span class="fw-bold"><a href="https://icbappliedscience.com/" target="_blank">Designed and Developed by <span><img src="<?php echo base_url('');?>include/custom/img/icb_logo.png" style="height: 40px; border-radius: 30%; margin-left: 10px;" alt=""></span></a></span>
               </div>
            </div>
         </div>
      </div>
   <!-- End Main Content-->
   <div class="sidebar-right1"></div>
   <div id="global-loader"></div>
   <!--End Footer-->
</div>
<?php include_once __DIR__ . '/../common/admin-footer.php'; ?>