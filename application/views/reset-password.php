<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="<?php echo base_url('')?>include/img/brand/tcoe_favicon.ico" type="image/x-icon" />
        <title><?php echo isset($title) ? $title : "TCOE India"; ?></title>
        <link id="style" href="<?php echo base_url('')?>include/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/plugins/web-fonts/icons.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/plugins/web-fonts/plugin.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/switcher/css/switcher.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/switcher/demo.css" rel="stylesheet" />
        <link href="<?php echo base_url('')?>include/css/new-custom.css" rel="stylesheet" />
        <script src="<?php echo base_url('')?>include/plugins/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <meta http-equiv="imagetoolbar" content="no" />
    </head>
    <body class="ltr main-body leftmenu error-1" style="background-image: url('<?php echo base_url('')?>include/custom/bg3.png');">
        <span class="sidebar-right1"></span>
        <div id="global-loader" style="display: none;"><img src="<?php echo base_url('')?>include/img/loader.png" class="loader-img" alt="Loader" /></div>
        <div class="page main-signin-wrapper">
            <div class="row signpages text-center d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="row row-sm">
                            <div class="col-lg-12 col-xl-12 col-xs-12 col-sm-12 login_form">
                                <div class="main-container container">
                                    <div class="row row-sm">
                                        <div class="card-body mt-2 mb-2">
                                            <h4 class="text-center mb-4" style="line-height: 30px;"><b>Forgot Account Details </b> </h4>
                                            <div id="serverSideValidation"></div>
                                            <form id="forgot-password">
                                                <div class="form-group text-start">
                                                    <label>Email</label>
                                                     <input class="form-control" placeholder="Enter your email" name="email" type="text" />
                                                </div>
                                                <div class="form-group text-start">
                                                <label>Captcha </label>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">                                                       
                                                            <input type="text" class="form-control" id="valiIpt" placeholder="Enter CAPTCHA" name="captcha_code" maxlength="4" autocomplete="off" pattern="[0-9 .]+" required
                                                            />
                                                        </div>
                                                        <div class="col-md-6 col-sm-12 input-group">
                                                            <canvas id="valicode"></canvas>
                                                            <label id="toggle" style="cursor: pointer;" class="mt-3 small"> <span class="fas fa-sync-alt" style="font-size: 16px;"></span> Refresh</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="<?php echo base_url('sign-in')?>" class="btn ripple btn-main-primary">Back</a>
                                                <button type="submit" class="btn ripple btn-main-primary"><span class="loader"></span> Next</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('')?>include/plugins/bootstrap/js/popper.min.js"></script>
        <script src="<?php echo base_url('')?>include/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('')?>include/plugins/select2/js/select2.min.js"></script>
        <script src="<?php echo base_url('')?>include/js/select2.js"></script>
        <script src="<?php echo base_url('')?>include/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="<?php echo base_url('')?>include/js/themeColors.js"></script>
        <script src="<?php echo base_url('')?>include/js/custom.js"></script>
        <script src="<?php echo base_url('')?>include/switcher/js/switcher.js"></script>
        <div class="main-navbar-backdrop"></div>
        <div id="serpworx-message-modal-wrapper"></div>
        <script>
              function randomColor() {
                let r = Math.floor(Math.random() * 256);
                let g = Math.floor(Math.random() * 256);
                let b = Math.floor(Math.random() * 256);
                return "rgb(" + r + "," + g + "," + b + ")";
            }
            function getImgValiCode() {
                let showNum = [];
                let canvasWinth = 120;
                let canvasHeight = 38;
                let canvas = document.getElementById("valicode");
                let context = canvas.getContext("2d");
                canvas.width = canvasWinth;
                canvas.height = canvasHeight;
                let sCode = "0,1,2,3,4,5,6,7,8,9";
                let saCode = sCode.split(",");
                let saCodeLen = saCode.length;
                for (let i = 0; i <= 3; i++) {
                    let sIndex = Math.floor(Math.random() * saCodeLen);
                    let sDeg = (Math.random() * 30 * Math.PI) / 180;
                    let cTxt = saCode[sIndex];
                    showNum[i] = cTxt.toLowerCase();
                    let x = 10 + i * 20;
                    let y = 20 + Math.random() * 8;
                    context.font = "bold 25px Arial";
                    context.translate(x, y);
                    context.rotate(sDeg);
                    context.fillStyle = randomColor();
                    context.fillText(cTxt, 0, 0);
                    context.rotate(-sDeg);
                    context.translate(-x, -y);
                }
                for (let i = 0; i <= 5; i++) {
                    context.strokeStyle = randomColor();
                    context.beginPath();
                    context.moveTo(Math.random() * canvasWinth, Math.random() * canvasHeight);
                    context.lineTo(Math.random() * canvasWinth, Math.random() * canvasHeight);
                    context.stroke();
                }
                for (let i = 0; i < 30; i++) {
                    context.strokeStyle = randomColor();
                    context.beginPath();
                    let x = Math.random() * canvasWinth;
                    let y = Math.random() * canvasHeight;
                    context.moveTo(x, y);
                    context.lineTo(x + 1, y + 1);
                    context.stroke();
                }
                rightCode = showNum.join("");
            }
            function createCaptcha() {
                let valiIpt = document.querySelector("#valiIpt");
                let toggleBtn = document.querySelector("#toggle");
                toggleBtn.addEventListener(
                    "click",
                    function () {
                        getImgValiCode();
                        valiIpt.value = "";
                    },
                    false
                );
                getImgValiCode();
                valiIpt.value = "";
            }
            $(document).ready(function () {
                createCaptcha();
                const captcha_code = $("input[name='captcha_code']");
                const isZero = (value) => (value === "0" ? false : true);
                const isRequired = (value) => (value === "" ? false : true);
                const isBetween = (length, min, max) => (length < min || length > max ? false : true);
                const isPasswordSecure = (password) => {
                    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                    return re.test(password);
                };
                const checkCaptcha = () => {
                const min = 4;
                const max = 4;
                const captcha = captcha_code.val().trim();
                if (!isRequired(captcha)) {

                    return false;
                } else if (captcha != rightCode) {
                    return false;
                } else if (!isBetween(captcha.length, min, max)) {
                    return false;
                }
                return true;
            };
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
            $("#resetBtn").click(function (event) {
                    createCaptcha();
                });
                $("#serverSideValidation").hide();
                $(".loader").hide();
                $.validator.addMethod(
                    "customPattern",
                    function (value, element, pattern) {
                        return this.optional(element) || pattern.test(value);
                    },
                    "Invalid format"
                );
                function showLoader() {
                    $(".loader").show();
                    $('button[type="submit"]').prop("disabled", true).html('<span class="loader"></span>');
                }

                function hideLoader() {
                    $(".loader").hide();
                    $('button[type="submit"]').prop("disabled", false).html("Next");
                }
                function submitForm(formData) {
                    $.ajax({
                        url: "<?php echo base_url('post-forgot-password');?>",
                        type: "post",
                        data: formData,
                        beforeSend: showLoader,
                        success: function (response) {
                            hideLoader();
                            if (response.status === "error") {
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
                            } else if (response.status === "success") {
                                $("#forgot-password")[0].reset();
                                window.location.href = "<?php echo base_url('verify-reset-password/')?>"+response.data;
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
                $("#forgot-password").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true,
                            maxlength: 100,
                        },
                        captcha_code: {
                            required: true,
                            checkCaptcha: true, 
                        },
                      
                    },
                    messages: {
                        email: {
                            required: "Please enter email",
                            email: "Please enter a valid email",
                            maxlength: "Email must not exceed 100 characters",
                        },
                        captcha_code: {
                            required: "Captcha cannot be blank.",
                            checkCaptcha: "Captcha code is invalid.",
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