<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="icon" href="<?php echo base_url('')?>include/custom/vimarsh_favicon.png" type="image/x-icon" />
      <title>Vimarsh 5G Hackathon 2023</title>
      <link id="style" href="<?php echo base_url('')?>include/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
      <link href="<?php echo base_url('');?>include/custom/_css/bootstrap-icons.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/plugins/web-fonts/icons.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/plugins/web-fonts/plugin.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/css/style.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/css/admin-custom.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/switcher/css/switcher.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/switcher/demo.css" rel="stylesheet" />
      <link href="<?php echo base_url('')?>include/css/new-custom.css" rel="stylesheet" />
      <script src="<?php echo base_url('')?>include/plugins/jquery/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <meta http-equiv="imagetoolbar" content="no" />
   </head>
   <style>
      .signpages .details:before {
      background: #16191a;
      }
      #countdown {
      background-color: #2d2f2f;
      border-radius: 5px;
      padding: 25px;
      }
         #sign-in .form-group {border: none !important;}
   #sign-up .form-group {border: none !important;}
   #userDetail .form-group {border: none !important;}
   </style>
   <body class="ltr main-body leftmenu error-1">
      <span class="sidebar-right1"></span>
      <div id="global-loader" style="display: none;"><img src="<?php echo base_url('')?>include/img/loader.png" class="loader-img" alt="Loader" /></div>
      <div class="page main-signin-wrapper">
         <?php
            date_default_timezone_set('Asia/Kolkata');
            $end_date = strtotime('2023-12-09  00:00:00');
            $current_date = time();
            $developmentMode = false;
            if (!$developmentMode) {
               if ($current_date < strtotime('2023-10-30 15:15:00')) {
            ?>
         <div class="container">
            <div class="row d-flex justify-content-center">
               <div class="col-md-8">
                  <div class="card">
                     <div id="countdown">
                        <div class="container">
                           <div class="construction1 text-center details text-white">
                              <a href="<?php echo base_url('')?>">
                              <img src="<?php echo base_url('');?>include/custom/img/logo.png" height="110px" ; class="mb-5" alt="logo" />
                              </a>
                              <a href="<?php echo base_url('')?>">
                                 <p class="d-flex align-items-center justify-content-center gap-2 text-white" style="font-size: 20px;"><i class="bi-arrow-left-circle" style="font-size: 20px;"></i> Go Back</p>
                              </a>
                              <h4 class="text-center text-white tx-30 font-weight-bold">Registration for Vimarsh 2023 will Start on 1st of November 2023</h4>
                              <p class="text-white-50 tx-15">Registration for Vimarsh 2023</p>
                              <div id="launch_date" class="is-countdown">
                                 <ul class="countdown">
                                    <li>
                                       <span class="number">0</span><br />
                                       <span class="time">Days</span>
                                    </li>
                                    <li>
                                       <span class="number">0</span><br />
                                       <span class="time">Hours</span>
                                    </li>
                                    <li>
                                       <span class="number">0</span><br />
                                       <span class="time">Minutes</span>
                                    </li>
                                    <li>
                                       <span class="number">0</span><br />
                                       <span class="time">Seconds</span>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
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
         <div class="row signpages text-center d-flex justify-content-center">
            <div class="col-md-12">
               <div class="card">
                  <div class="row row-sm">
                     <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                        <div class="mt-5 pt-5 p-2 pos-relative">
                           <a href="<?php echo base_url('')?>">
                           <img src="<?php echo base_url('')?>include/custom/img/logo.png" class="header-brand-img mb-4" alt="logo" style="height: 100px; margin-top: 2rem;" />
                           </a>
                           <div class="clearfix"></div>
                           <!-- <img src="<?php echo base_url('')?>include/img/svgs/user.svg" class="ht-100 mb-0" alt="user" /> -->
                           <h5 class="mt-4 text-white">Sign In Your Account</h5>
                           <!--<span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signin to create, access, manage Vimarsh 5G Hackathon</span>-->
                        </div>
                     </div>
                     <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form">
                        <div class="main-container container-fluid">
                           <div class="row row-sm">
                              <div class="card-body mt-2 mb-2">
                                 <h4 class="text-center mb-4" style="line-height: 30px;"><b>New User Registration</b></h4>
                                 <div id="serverSideValidation"></div>
                                 <form id="sign-up">
                                    <div class="form-group text-start"><label>Full Name</label> <input class="form-control" placeholder="Enter full name" name="fullName" type="text" /></div>
                                    <div class="form-group text-start"><label>Contact No</label> <input class="form-control" placeholder="Enter your contact no." name="contactNo" type="text" /></div>
                                    <div class="form-group text-start"><label>Email</label> <input class="form-control" placeholder="Enter your email" name="email" type="text" /></div>
                                    <div class="form-group text-start"><label>Password</label> <input class="form-control" placeholder="Enter your password" name="password" type="password" /></div>
                                    <button type="submit" class="btn ripple btn-main-primary btn-block"><span class="loader"></span> Sign Up</button>
                                 </form>
                                 <div class="text-start mt-3 ms-0">
                                    <p class="mb-0">Already have an account? <a href="<?php echo base_url('sign-in');?>" class="text-dark fw-bold">Sign In</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php
            }
            }
            else
            {
            ?>
         <div class="row signpages text-center d-flex justify-content-center">
            <div class="col-md-12">
               <div class="card">
                  <div class="row row-sm">
                     <div class="col-lg-6 col-xl-5 d-none d-lg-block text-center bg-primary details">
                        <div class="mt-5 pt-5 p-2 pos-absolute">
                           <a href="<?php echo base_url('')?>">
                           <img src="<?php echo base_url('')?>include/custom/img/logo.png" class="header-brand-img mb-4" alt="logo" style="height: 100px; margin-top: 2rem;" />
                           </a>
                           <div class="clearfix"></div>
                           <!-- <img src="<?php echo base_url('')?>include/img/svgs/user.svg" class="ht-100 mb-0" alt="user" /> -->
                           <h5 class="mt-4 text-white">Sign In Your Account</h5>
                           <span class="tx-white-6 tx-13 mb-5 mt-xl-0">Signin to create, access, manage Vimarsh 5G Hackathon</span>
                        </div>
                     </div>
                     <div class="col-lg-6 col-xl-7 col-xs-12 col-sm-12 login_form">
                        <div class="main-container container-fluid">
                           <div class="row row-sm">
                              <div class="card-body mt-2 mb-2">
                                 <h4 class="text-center mb-4" style="line-height: 30px;"><b>New User Registration</b></h4>
                                 <div id="serverSideValidation"></div>
                                 <form id="sign-up">
                                    <div class="form-group text-start"><label>Full Name</label> <input class="form-control" placeholder="Enter full name" name="fullName" type="text" /></div>
                                    <div class="form-group text-start"><label>Contact No</label> <input class="form-control" placeholder="Enter your contact no." name="contactNo" type="text" /></div>
                                    <div class="form-group text-start"><label>Email</label> <input class="form-control" placeholder="Enter your email" name="email" type="text" /></div>
                                    <div class="form-group text-start"><label>Password</label> <input class="form-control" placeholder="Enter your password" name="password" type="password" /></div>
                                    <button type="submit" class="btn ripple btn-main-primary btn-block"><span class="loader"></span> Sign Up</button>
                                 </form>
                                 <div class="text-start mt-3 ms-0">
                                    <p class="mb-0">Already have an account? <a href="<?php echo base_url('sign-in');?>" class="text-dark fw-bold">Sign In</a></p>
                                 </div>
                              </div>
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
      <script src="<?php echo base_url('')?>include/plugins/bootstrap/js/popper.min.js"></script>
      <script src="<?php echo base_url('')?>include/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url('')?>include/plugins/select2/js/select2.min.js"></script>
      <script src="<?php echo base_url('')?>include/js/select2.js"></script>
      <script src="<?php echo base_url('')?>include/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <script src="<?php echo base_url('')?>include/js/themeColors.js"></script>
      <script src="<?php echo base_url('')?>include/js/custom.js"></script>
      <script src="<?php echo base_url('')?>include/switcher/js/switcher.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <div class="main-navbar-backdrop"></div>
      <div id="serpworx-message-modal-wrapper"></div>
      <script>
         $(document).ready(function () {
             $("#serverSideValidation").hide();
             $(".loader").hide();
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
             $.validator.addMethod(
                 "customPattern",
                 function (value, element, pattern) {
                     return this.optional(element) || pattern.test(value);
                 },
                 "Invalid format"
             );
             $.validator.addMethod(
                 "checkCaptcha",
                 function (value, element) {
                     return checkCaptcha();
                 },
                 "Captcha code is invalid."
             );
             function showLoader() {
                 $(".loader").show();
                 $('button[type="submit"]').prop("disabled", true).html('<span class="loader"></span>');
             }

             function hideLoader() {
                 $(".loader").hide();
                 $('button[type="submit"]').prop("disabled", false).html("Sign Up");
             }
             function submitForm(formData) {
                 $.ajax({
                     url: "<?php echo base_url('post-sign-up');?>",
                     type: "post",
                     data: formData,
                     beforeSend: showLoader,
                     success: function (response) {
                         hideLoader();
                          response = JSON.parse(response);
                         if (response.status === 'error') {
                             Swal.fire({
                                 icon: "error",
                                //  title: "Error",
                                 text: response.message
                             });
                         } else if (response.status === "success") {
                             // console.log(response.data);
                             window.location.href = "<?php echo base_url('verify-account/')?>" + response.data;
                         } else {
                             Swal.fire({
                                 icon: "error",
                                //  title: "Error",
                                 text: 'Something went wrong'
                             });
                         }
                     },
                     error: function () {
                         hideLoader();
                         Swal.fire({
                             icon: "error",
                            //  title: "Error",
                             text: "Something went wrong",
                         });
                     },
                 });
             }
             $("#sign-up").validate({
                 rules: {
                     fullName: {
                         required: true,
                         minlength: 3,
                         maxlength: 50,
                         customPattern: /^[A-Za-z\s]+$/,
                     },
                     contactNo: {
                         required: true,
                         minlength: 10,
                         maxlength: 10,
                     },
                     email: {
                         required: true,
                         email: true,
                         maxlength: 100,
                     },
                     password: {
                         required: true,
                         minlength: 8,
                         maxlength: 16,
                     },
                 },
                 messages: {
                     fullName: {
                         required: "Please enter full name",
                         minlength: "Full name must be at least 3 characters long",
                         maxlength: "Full name must not exceed 50 characters",
                         customPattern: "Only letters and spaces are allowed in full name",
                     },
                     contactNo: {
                         required: "Please enter contact no.",
                         minlength: "Contact no. must be at least 10 characters long",
                         maxlength: "Contact no. must not exceed 10 characters",
                     },
                     email: {
                         required: "Please enter email",
                         email: "Please enter a valid email",
                         maxlength: "Email must not exceed 100 characters",
                     },
                     password: {
                         required: "Please enter password",
                         minlength: "Password must be at least 8 characters long",
                         maxlength: "Password must not exceed 16 characters",
                     },
                 },
                 submitHandler: function (form) {
                     var $signUp = $(form);
                     var formData = $signUp.serialize();
                     submitForm(formData);
                 },
             });
         });
      </script>
   </body>
</html>
