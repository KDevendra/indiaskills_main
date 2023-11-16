   <div class="main-header side-header sticky" >
      <div class="main-container container-fluid">
         <div class="main-header-left">
            <a class="main-header-menu-icon" href="javascript:void(0)" id="mainSidebarToggle"><span></span></a>
            <div class="hor-logo">
               <a class="main-logo" href="<?php echo base_url('');?>">
                  <!-- <img src="<?php echo base_url('');?>include/img/brand/logo.png" class="header-brand-img desktop-logo" alt="logo" /> 
                  <img src="<?php echo base_url('');?>include/img/tcoe_logo.png" class="header-brand-img desktop-logo-dark" alt="logo" /> -->
               </a>
            </div>
         </div>
         <div class="main-header-center">
            <div class="responsive-logo">
               <!-- <a href="<?php echo base_url('');?>"><img src="<?php echo base_url('');?>include/img/brand/logo.png" class="mobile-logo" alt="logo" /></a> 
               <a href="<?php echo base_url('');?>"><img src="<?php echo base_url('');?>include/img/tcoe_logo.png" class="mobile-logo-dark" alt="logo" /></a> -->
            </div>
         </div>
         <span class="slide-left"></span>
         <div class="main-header-right">
            <button
               class="navbar-toggler navresponsive-toggler"
               type="button"
               data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent-4"
               aria-controls="navbarSupportedContent-4"
               aria-expanded="false"
               aria-label="Toggle navigation"
               >
            <i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
            </button>
            <!-- Navresponsive closed -->
            <div class="navbar navbar-expand-lg nav nav-item navbar-nav-right responsive-navbar navbar-dark">
               <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                  <div class="d-flex order-lg-2 ms-auto">
                     <!-- Full screen -->
                     <div class="dropdown">
                        <a class="nav-link icon full-screen-link">
                        <i class="fe fe-maximize fullscreen-button fullscreen header-icons"></i> <i class="fe fe-minimize fullscreen-button exit-fullscreen header-icons"></i>
                        </a>
                     </div>
                     <!-- Full screen -->
                     <!-- Notification -->
                     <!-- <div class="dropdown main-header-notification">
                        <a class="nav-link icon" href=""> <i class="fe fe-bell header-icons"></i> <span class="badge bg-danger nav-link-badge">4</span> </a>
                        <div class="dropdown-menu">
                           <div class="header-navheading">
                              <p class="main-notification-text">You have 1 unread notification<span class="badge bg-pill bg-primary ms-3">View all</span></p>
                           </div>
                           <div class="main-notification-list">
                              <div class="media new">
                                 <div class="main-img-user online"><img alt="avatar" src="<?php echo base_url('');?>include/img/users/5.jpg" /></div>
                                 <div class="media-body">
                                    <p>Congratulate <strong>Olivia James</strong> for New template start</p>
                                    <span>Oct 15 12:32pm</span>
                                 </div>
                              </div>
                              <div class="media">
                                 <div class="main-img-user"><img alt="avatar" src="<?php echo base_url('');?>include/img/users/2.jpg" /></div>
                                 <div class="media-body">
                                    <p><strong>Joshua Gray</strong> New Message Received</p>
                                    <span>Oct 13 02:56am</span>
                                 </div>
                              </div>
                              <div class="media">
                                 <div class="main-img-user online"><img alt="avatar" src="<?php echo base_url('');?>include/img/users/3.jpg" /></div>
                                 <div class="media-body">
                                    <p><strong>Elizabeth Lewis</strong> added new schedule realease</p>
                                    <span>Oct 12 10:40pm</span>
                                 </div>
                              </div>
                           </div>
                           <div class="dropdown-footer"><a href="javascript:void(0)">View All Notifications</a></div>
                        </div>
                     </div> -->
                     <!-- Notification -->
                     <!-- Messages -->
                     <!-- Profile -->
                     <div class="dropdown main-profile-menu">
                        <a class="d-flex" href="javascript:void(0)">
                        <span class="main-img-user"><img alt="avatar" src="<?php echo base_url('');?>include/custom/dummy.jpg" /></span>
                        </a>
                        <div class="dropdown-menu">
                           <div class="header-navheading">
                              <h6 class="main-notification-title text-capitalize"><?= $this->session->login['UserName']; ?></h6>
                              <?php
                              $userLevels = [
                                 1 => 'Admin',
                                 2 => 'User',
                              ];
                              $userLevel = $this->session->login['UserLevel'];
                              $defaultUserLevel = 'User';

                              echo '<p class="main-notification-text">' . ($userLevels[$userLevel] ?? $defaultUserLevel) . '</p>';
                              ?>
                           </div>
                           <!-- <a class="dropdown-item border-top" href="<?php echo base_url('profile')?>"> <i class="fe fe-user"></i> My Profile </a>  -->
                           <!-- <a class="dropdown-item" href="<?php echo base_url('profile')?>"> <i class="fe fe-settings"></i> Account Settings </a>  -->
                           <a class="dropdown-item" href="<?php echo base_url('change-password')?>"> <i class="fe fe-compass"></i> Change Password </a> 
                           <a class="dropdown-item" href="<?php echo base_url('logout')?>"> <i class="fe fe-power"></i> Sign Out </a>
                        </div>
                     </div>
                     <!-- Profile -->

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>