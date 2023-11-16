<style>
   .main-body .main-sidebar-body .nav {
    flex-direction: column;
    /* padding: 0 0 0 15px; */
    padding: 15px;
    margin: 0 auto;
    justify-content: center;
    margin-top: 0;
}
</style>
<div class="sticky">
   <div class="main-menu main-sidebar main-sidebar-sticky side-menu is-expanded ps ps--active-y">
      <div class="main-sidebar-header main-container-1 active">
         <div class="sidemenu-logo">
            <a class="main-logo" style="padding:0.3rem;">
            <img src="<?php echo base_url('');?>include/custom/img/logo.png" height="63px" class="header-brand-img desktop-logo" alt="logo" />
            <img src="<?php echo base_url('');?>include/custom/img/logo.png" height="63px" class="header-brand-img icon-logo" alt="logo" />
            <img src="<?php echo base_url('');?>include/custom/img/logo.png" height="63px" class="header-brand-img desktop-logo theme-logo" alt="logo" />
            <img src="<?php echo base_url('');?>include/custom/img/logo.png" height="63px" class="header-brand-img icon-logo theme-logo" alt="logo" />
            </a>
         </div>
         <div class="main-sidebar-body main-body-1">
            <ul class="menu-nav nav" style="margin-left: 0px; margin-right: 0px;">
               <?php
                  $userType = $this->session->login['UserLevel'];        
                  if ($userType == '1') {
                  ?>
               <li class="nav-item">
                  <a class="nav-link <?php if ($this->uri->segment(1) === 'admin-dashboard'): ?>custom-active<?php endif; ?>" href="<?php echo base_url('admin-dashboard') ?>">
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <i class="ti-home sidemenu-icon menu-icon "></i>
                  <span class="sidemenu-label">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link with-sub <?php if ($this->uri->segment(1) === 'application-list'|| $this->uri->segment(1) === 'approve-application' || $this->uri->segment(1) === 'application-preview' || $this->uri->segment(1) === 'reject-application' || $this->uri->segment(1) === 'pending-application'): ?>custom-active<?php endif; ?>" href="javascript:void(0)"> <span class="shape1"></span> <span class="shape2"></span> <i class="ti-layout sidemenu-icon menu-icon"></i> <span class="sidemenu-label">Application</span> <i class="angle fe fe-chevron-right"></i> </a> 
                  <ul class="nav-sub <?php if ($this->uri->segment(1) === 'application-list'|| $this->uri->segment(1) === 'approve-application' || $this->uri->segment(1) === 'reject-application' || $this->uri->segment(1) === 'application-preview' || $this->uri->segment(1) === 'pending-application'): ?>open<?php endif; ?>">
                     <li class="nav-sub-item"><a class="nav-sub-link" href="<?php echo base_url('application-list');?>">Application List</a></li>
                     <li class="nav-sub-item"><a class="nav-sub-link" href="<?php echo base_url('pending-application');?>">Pending Application</a></li>
                     <li class="nav-sub-item"><a class="nav-sub-link" href="<?php echo base_url('approve-application');?>">Approved Application</a></li>
                     <li class="nav-sub-item"><a class="nav-sub-link" href="<?php echo base_url('reject-application');?>">Rejected Application</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if ($this->uri->segment(1) === 'registered-users' || $this->uri->segment(1) === 'user-detail'): ?>custom-active<?php endif; ?>" href="<?php echo base_url('registered-users') ?>">
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <i class="ti-user sidemenu-icon menu-icon "></i>
                  <span class="sidemenu-label">Registered Users</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link <?php if ($this->uri->segment(1) === 'reports'): ?>custom-active<?php endif; ?>" href="<?php echo base_url('reports') ?>">
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <i class="ti-bar-chart-alt sidemenu-icon menu-icon "></i>
                  <span class="sidemenu-label">Reports</span>
                  </a>
               </li>

               <?php 
                  }
                  else
                  {
                      ?>
               <li class="nav-item">
                  <a class="nav-link <?php if ($this->uri->segment(1) === 'user-dashboard'): ?>custom-active<?php endif; ?>" href="<?php echo base_url('user-dashboard') ?>">
                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <i class="ti-home sidemenu-icon menu-icon "></i>
                  <span class="sidemenu-label">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                 <a class="nav-link <?php if ($this->uri->segment(1) === 'registration' || $this->uri->segment(1) === 'application-preview'):  ?>custom-active<?php endif; ?>" href="<?php echo base_url('registration') ?>">

                  <span class="shape1"></span>
                  <span class="shape2"></span>
                  <i class="ti-layout sidemenu-icon menu-icon "></i>
                  <span class="sidemenu-label">Registration</span>
                  </a>
               </li>
               <?php }
                  ?>
            </ul>
            <div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
         </div>
      </div>
      <div class="ps__rail-x" style="left: 0px; top: 0px;">
         <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
      </div>
      <div class="ps__rail-y" style="top: 0px; height: 643px; right: 0px;">
         <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 440px;"></div>
      </div>
   </div>
</div>