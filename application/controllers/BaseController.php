<?php
defined("BASEPATH") or exit("No direct script access allowed");
class BaseController extends CI_Controller {
    var $projectTitle = "Vimarsh 5G Hackathon 2023";
    public function mainEmailConfig($to, $subject, $message, $cc = "", $attach = "") {
        try {
            $this->load->library("email");
          
            //  $config = array('protocol' => 'smtp', 'smtp_host' => 'mail.icbappliedscience.com', 'smtp_port' => 465, 'smtp_user' => 'admin@icbappliedscience.com', 'smtp_pass' => 'Y5?4pO0cOX#x', 'smtp_crypto' => 'ssl', 'mailtype' => 'html', 'crlf' => "\r\n", 'newline' => "\r\n", 'charset' => 'utf-8', 'wordwrap' => true);
           
        //   $config = [
            //     "protocol" => "smtp",
            //     "smtp_host" => "mail.digitalduniya.com",
            //     "smtp_port" => 465,
            //     "smtp_user" => "noreply@digitalduniya.com",
            //     "smtp_pass" => "RcQ&hdArg{}w",
            //     "smtp_crypto" => "ssl",
            //     "mailtype" => "html",
            //     "crlf" => "\r\n",
            //     "newline" => "\r\n",
            //     "charset" => "utf-8",
            //     "wordwrap" => true,
            // ];
            $config = [
                "protocol" => "smtp",
                "smtp_host" => "vimarsh.tcoe.in",
                "smtp_port" => 465,
                "smtp_user" => "info@vimarsh.tcoe.in",
                "smtp_pass" => "&re{x74crQk.",
                "smtp_crypto" => "ssl",
                "mailtype" => "html",
                "crlf" => "\r\n",
                "newline" => "\r\n",
                "charset" => "utf-8",
                "wordwrap" => true,
            ];
            $this->email->initialize($config);
            $this->email->set_crlf("\r\n");
            $this->email->set_newline("\r\n");
            $this->email->from($config["smtp_user"]);
            $this->email->to($to);
            if ($cc !== "") {
                $this->email->cc($cc);
            }
            $this->email->subject($subject);
            $this->email->message($message);
            if ($attach !== "") {
                $this->email->attach($attach);
            }
            if ($this->email->send()) {
                return true;
            } else {
                return false;
            }
        }
        catch(Exception $e) {
            // Handle email sending exceptions here
            echo "Email sending error: " . $e->getMessage();
            return false;
        }
    }
    private function sendActivationCode($email, $activationCodeEmail) {
        $getUserName = $this->BaseModel->getData('login', ['UserId'=>$email])->row()->UserName;
        $subject = "Verification Code - " . $activationCodeEmail . " from Vimarsh";
        $output = "";
        $output = '<!DOCTYPE html>
        <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>BPR&D</title>
            <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                min-width: 100% !important;
                background-color: #000;
                color: #ffffff;
            }
            .content {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                color: #000000;
            }
            .header {
                background-color: #000;
                text-align: center;
                color: #ffffff;
            }
            .header img {
              height: 80px;
              padding: 1rem;
            }
            .inner-content {
                min-height: 120px;
                margin-top: 40px;
                margin-bottom: 40px;
                padding: 20px;
                background-color: #ffffff;
            }
            .otp-code {
                text-align: center;
              margin-top: 1rem;
            }
            .otp-value {
                font-weight: bold;
            }
            .greeting {
                font-weight: bold;
            }
            .instructions {
                margin-top: 10px;
            }
            .regards {
                text-align: left;
            }
            .footer {
                background: linear-gradient(#000, #000);
                text-align: center;
                color: #ffffff;
                height: 40px;
                line-height: 40px;
            }

            </style>
        </head>
        <body>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="header">
                <tr>
                    <td><img src="" height="100px" alt="Vimarsh Logo"></td>
                </tr>
            </table>
            <table class="content inner-content" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr>
                                            <td colspan="2" class="greeting">Dear Mr. / Mrs. ' . $getUserName . ',</td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan="2" class="instructions">Please enter the given code to verify your account.</td>
                </tr>
              <tr>
                  <td><br></td>
              </tr>
              <tr  class="otp-code">
                <td><b>Verification Code  <span class="otp-value">: ' . $activationCodeEmail . '</span></b> </td>
              
                                    </tr>
                <tr><td><br></td></tr>
                <tr><td><br></td></tr>
               
                <tr>
                    <th class="regards">Regards</th>
                </tr>
                <tr>
                    <th class="regards">Vimarsh 5G Hackathon 2023</th>
                </tr>
            </table>
            <table width="100%" class="footer">
                <tr>
                     <td>&copy; ' . date("Y") . ' Vimarsh . All rights reserved.</td>
                </tr>
            </table>
        </body>
        </html>';
        if ($this->mainEmailConfig($email, $subject, $output, "", "")) {
            return true;
        } else {
            return false;
        }
    }
    public function __construct() {
        parent::__construct();
        $this->load->Model("BaseModel");
        $this->load->helper("common_helper");
        date_default_timezone_set("Asia/kolkata");
    }
    public function index() {
        $ipAddress = $this->input->ip_address();
        $userAgent = $this->input->user_agent();
        if ($this->BaseModel->isUniqueVisitor($ipAddress, $userAgent)) {
            $this->BaseModel->insertVisitor($ipAddress, $userAgent);
        }
        $data["title"] = $this->projectTitle . " : Home";
        $this->load->view("index", $data);
    }
    public function signUp() {
        $data["title"] = $this->projectTitle . " : Sign Up";
        $this->load->view("sign-up", $data);
    }
    public function signIn() {
        $data["title"] = $this->projectTitle . " : Sign In";
        $this->load->view("sign-in", $data);
    }
    public function problemStatement() {
        $data["title"] = $this->projectTitle . " : Problem Statement";
        $this->load->view("problem-statement", $data);
    }
    public function postSignUp() {
        if ($this->input->method() === "post") {
            $this->form_validation->set_rules("fullName", "Full Name", 'trim|required|min_length[3]|max_length[50]|regex_match[/^[A-Za-z\s]+$/]');
            $this->form_validation->set_rules("contactNo", "Contact No.", "trim|required|max_length[10]|min_length[10]");
            $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|max_length[100]");
            $this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]|max_length[16]");
            if ($this->form_validation->run() === false) {
                $response = ["status" => "validation_errors", "message" => validation_errors() ];
            } else {
                $userName = $this->input->post("fullName");
                $email = $this->input->post("email");
                $contactNo = $this->input->post("contactNo");
                $password = hash("SHA512", $this->input->post("password"));
                $set = "1234567890";
                $activationCode = substr(str_shuffle($set), 0, 6);
                $cond = ["UserId" => $email, "UserLevel" => 2];
                $checkEmailDuplicate = $this->BaseModel->getData("login", $cond);
                if ($checkEmailDuplicate->num_rows() > 0) {
                    $response = ["status" => "error", "message" => "Email address is already in use."];
                } else {
                    $userData = ["UserName" => $userName, "IsActive" => 0, "UserId" => $email, "Password" => $password, "ActivationCode" => $activationCode, "ContactNo" => $contactNo, "UserLevel" => 2, "CreatedAt" => date("Y-m-d H:i:s") ];
                    $insertResult = $this->BaseModel->insertData("login", $userData);
                    $insert_id = $this->db->insert_id();
                    if ($insertResult && $insert_id !== null) {
                        $response = ["status" => "success", "data" => $insert_id, "message" => "Signup successful! Verification code sent on the registered email address."];
                    } else {
                        $response = ["status" => "error", "message" => "Signup failed. Please try again later."];
                    }
                }
            }
            $this->output->set_content_type("application/json");
            echo json_encode($response);
        } else {
            $response = ["status" => "error", "message" => "Invalid request method."];
            $this->output->set_content_type("application/json");
            echo json_encode($response);
        }
    }
    public function postSignIn() {
        $response = ["status" => "error", "message" => ""];
        if ($this->input->post()) {
            $this->form_validation->set_rules("email", "User Id", "trim|required");
            $this->form_validation->set_rules("password", "User Password", "trim|required");
            if ($this->form_validation->run() == false) {
                $response = ["status" => "validation_errors", "message" => $this->form_validation->error_array() ];
            } else {
                $userId = $this->input->post("email");
                $password = hash("SHA512", $this->input->post("password"));
                $record = $this->BaseModel->getData("login", ["UserId" => $userId]);
                if ($record->num_rows() == 0) {
                    $response["message"] = "This email is not registered please register yourself";
                } else {
                    $details = $record->row();
                    $dbUserId = $details->UserId;
                    $dbPassword = $details->Password;
                    $userEnterPassword = hash("SHA512", $password);
                    $encaPassword = hash("SHA512", $dbPassword);
                    $WrongAttempt = $details->WrongAttempt;
                    if ($encaPassword != $userEnterPassword) {
                        $response["message"] = "Please enter correct password.";
                        if ($WrongAttempt >= 5) {
                            $response["message"] = "Your login attempts have exceeded the maximum limit. Please reset your password to regain access.";
                        } else {
                            $count = $WrongAttempt + 1;
                            $this->BaseModel->updateData("login", ["WrongAttempt" => $count], ["UserId" => $dbUserId]);
                        }
                    } else {
                        if ($WrongAttempt >= 5) {
                            $response["message"] = "Your login attempts have exceeded the maximum limit. Please reset your password to regain access.";
                        } else {
                            if ($userId != $dbUserId) {
                                $response["message"] = "Please enter correct user name & password.";
                            } else {
                                $userStatus = $details->IsActive;
                                if ($userStatus == 0) {
                                    $response["data"] = $details->LoginId;
                                    $response["status"] = "verify";
                                    $response["message"] = "User does not verified.";
                                } else {
                                    if ($userStatus != 1) {
                                        $response["message"] = "User does not active.";
                                    } else {
                                        $sessData = ["LoginId" => $details->LoginId, "UserName" => $details->UserName, "UserLevel" => $details->UserLevel, "UserId" => $details->UserId, "UserLevel" => $details->UserLevel];
                                        if ($details->UserLevel) {
                                            $this->session->set_userdata("login", $sessData);
                                            AntiFixationInit();
                                            $this->session->salt = generateSalt();
                                            $this->load->helper("cookie");
                                            $duration = 30 * 60;
                                            set_cookie("AuthoToken", $this->session->salt, $duration);
                                            $this->BaseModel->updateData("login", ["WrongAttempt" => 0, "CurrentLoginTime" => date("Y-m-d H:i:s"), "SessionId" => $this->session->userdata("salt") ], ["UserId" => $dbUserId]);
                                            $response["status"] = "success";
                                            $response["UserLevel"] = $details->UserLevel;
                                            $response["message"] = "Redirect to dashboard......";
                                        } else {
                                            $response["message"] = "User does not have the required privilege.";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
    public function resetPassword() {
        $data["title"] = $this->projectTitle . " : Reset Password";
        $this->load->view("reset-password", $data);
    }
    public function verifyResetPassword($id) {
        $data["title"] = $this->projectTitle . " : Verify Reset Password";
        $record = $this->BaseModel->getData('login', ['LoginId' => $id]);
        if ($record->num_rows() == 0) {
            // Account is already created; redirect to the login page
            $this->session->set_flashdata("verified", "Your account is already created. Please log in");
            $this->load->view("sign-in", $data);
        } else {
            // Get user details from the record
            $details = $record->row();
            // dd($details);
            $data["UserId"] = $details->UserId;
            // Generate an activation code
            $set = "1234567890";
            $activationCode = substr(str_shuffle($set), 0, 6);
            // Send the activation code via email
            // $sendResult = $this->sendActivationCode($email, $activationCode);
            $cond = ["UserId" => $details->UserId];
            $subject = "Verification Code - " . $activationCode . " from Vimarsh";
            $output = "";
            $output = '<!DOCTYPE html>
                        <html>
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>BPR&D</title>
                            <style type="text/css">
                            body {
                                margin: 0;
                                padding: 0;
                                min-width: 100% !important;
                                background-color: #000;
                                color: #ffffff;
                            }
                            .content {
                                width: 100%;
                                max-width: 600px;
                                margin: 0 auto;
                                background-color: #ffffff;
                                color: #000000;
                            }
                            .header {
                                background-color: #000;
                                text-align: center;
                                color: #ffffff;
                            }
                            .header img {
                              height: 80px;
                              padding: 1rem;
                            }
                            .inner-content {
                                min-height: 120px;
                                margin-top: 40px;
                                margin-bottom: 40px;
                                padding: 20px;
                                background-color: #ffffff;
                            }
                            .otp-code {
                                text-align: center;
                              margin-top: 1rem;
                            }
                            .otp-value {
                                font-weight: bold;
                            }
                            .greeting {
                                font-weight: bold;
                            }
                            .instructions {
                                margin-top: 10px;
                            }
                            .regards {
                                text-align: left;
                            }
                            .footer {
                                background: linear-gradient(#000, #000);
                                text-align: center;
                                color: #ffffff;
                                height: 40px;
                                line-height: 40px;
                            }
                
                            </style>
                        </head>
                        <body>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="header">
                                <tr>
                                    <td><img src="https://vimarsh.tcoe.in/include/custom/img/logo.png" height="100px" alt="Vimarsh Logo"></td>
                                </tr>
                            </table>
                            <table class="content inner-content" align="center" cellpadding="0" cellspacing="0" border="0">
                
                                <tr>
                                    <td colspan="2" class="greeting">Dear Mr. / Mrs. ' . $details->UserName . ',</td>
                                </tr>
                                <tr><td><br></td></tr>
                                <tr>
                                    <td colspan="2" class="instructions">Please enter the given code to verify your account.</td>
                                </tr>
                              <tr>
                                  <td><br></td>
                              </tr>
                              <tr  class="otp-code">
                                <td><b>Verification Code  <span class="otp-value">: ' . $activationCode . '</span></b> </td>
                              
                              </tr>
                               
                               <tr><td><br></td></tr>
                                <tr><th class="regards">Regards</th></tr>
                                <tr>
                                    <th class="regards">Vimarsh 5G Hackathon 2023</th>
                                </tr>
                            </table>
                            <table width="100%" class="footer">
                                <tr>
                                    <td>&copy; ' . date("Y") . ' Vimarsh . All rights reserved.</td>
                                </tr>
                            </table>
                        </body>
                        </html>';
            $sendActivationCode = $this->mainEmailConfig($details->UserId, $subject, $output);
            if ($sendActivationCode) {
                $updateActivationCode = $this->BaseModel->updateData("login", ["ActivationCode" => $activationCode], $cond);
                if ($updateActivationCode) {
                    $this->load->view("verify-reset-password", $data);
                } else {
                    throw new Exception("Failed to update activation code in the database");
                }
            } else {
                echo "server down";
            }
        }
    }
    public function verifyAccount($id) {
        // Set the page title
        $data["title"] = $this->projectTitle . " : Verify Account";
        try {
            // Attempt to retrieve a record from the 'login' table
            $record = $this->BaseModel->getData("login", ["LoginId" => $id]);
            if ($record->num_rows() == 0) {
                // Account is already created; redirect to the login page
                $this->session->set_flashdata("verified", "Your account is already created. Please log in");
                $this->load->view("sign-in", $data);
            } else {
                // Get user details from the record
                $details = $record->row();
                // dd($details);
                $data["UserId"] = $details->UserId;
                // Generate an activation code
                $set = "1234567890";
                $activationCode = substr(str_shuffle($set), 0, 6);
                // Send the activation code via email
                // $sendResult = $this->sendActivationCode($email, $activationCode);
                $cond = ["UserId" => $details->UserId];
                $subject = "Verification Code - " . $activationCode . " from Vimarsh";
                $output = "";
                $output = '<!DOCTYPE html>
                            <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                <title>BPR&D</title>
                                <style type="text/css">
                                body {
                                    margin: 0;
                                    padding: 0;
                                    min-width: 100% !important;
                                    background-color: #000;
                                    color: #ffffff;
                                }
                                .content {
                                    width: 100%;
                                    max-width: 600px;
                                    margin: 0 auto;
                                    background-color: #ffffff;
                                    color: #000000;
                                }
                                .header {
                                    background-color: #000;
                                    text-align: center;
                                    color: #ffffff;
                                }
                                .header img {
                                  height: 80px;
                                  padding: 1rem;
                                }
                                .inner-content {
                                    min-height: 120px;
                                    margin-top: 40px;
                                    margin-bottom: 40px;
                                    padding: 20px;
                                    background-color: #ffffff;
                                }
                                .otp-code {
                                    text-align: center;
                                  margin-top: 1rem;
                                }
                                .otp-value {
                                    font-weight: bold;
                                }
                                .greeting {
                                    font-weight: bold;
                                }
                                .instructions {
                                    margin-top: 10px;
                                }
                                .regards {
                                    text-align: left;
                                }
                                .footer {
                                    background: linear-gradient(#000, #000);
                                    text-align: center;
                                    color: #ffffff;
                                    height: 40px;
                                    line-height: 40px;
                                }
                    
                                </style>
                            </head>
                            <body>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="header">
                                    <tr>
                                        <td><img src="https://vimarsh.tcoe.in/include/custom/img/logo.png" height="100px" alt="Vimarsh Logo"></td>
                                    </tr>
                                </table>
                                <table class="content inner-content" align="center" cellpadding="0" cellspacing="0" border="0">
                    
                                                            <tr>
                                                                <td colspan="2" class="greeting">Dear Mr. / Mrs. ' . $details->UserName . ',</td>
                                    </tr>
                                    <tr><td><br></td></tr>
                                    <tr>
                                        <td colspan="2" class="instructions">Please enter the given code to verify your account.</td>
                                    </tr>
                                  <tr>
                                      <td><br></td>
                                  </tr>
                                  <tr  class="otp-code">
                                    <td><b>Verification Code  <span class="otp-value">: ' . $activationCode . '</span></b> </td></tr>
                                    
                                    
                               <tr><td><br></td></tr>
                                   
                                    <tr>
                                        <th class="regards">Regards</th>
                                    </tr>
                                    <tr>
                                        <th class="regards">Vimarsh 5G Hackathon 2023</th>
                                    </tr>
                                </table>
                                <table width="100%" class="footer">
                                    <tr>
                                         <td>&copy; ' . date("Y") . ' Vimarsh . All rights reserved.</td>
                                    </tr>
                                </table>
                            </body>
                            </html>';
                $sendActivationCode = $this->mainEmailConfig($details->UserId, $subject, $output);
                if ($sendActivationCode) {
                    $updateActivationCode = $this->BaseModel->updateData("login", ["ActivationCode" => $activationCode], $cond);
                    if ($updateActivationCode) {
                        $this->load->view("verify-account", $data);
                    } else {
                        throw new Exception("Failed to update activation code in the database");
                    }
                } else {
                    echo "server down";
                }
            }
        }
        catch(Exception $e) {
            // Log the error and handle it gracefully
            log_message("error", $e->getMessage());
            // Add error handling logic here, such as displaying an error message or redirecting to an error page.
            
        }
    }
    public function postResetVerifyAccount() {
        $response = ["status" => "error", "message" => ""];
        if ($this->input->post()) {
            $this->form_validation->set_rules("NewPassword", "New Password", "required");
            $this->form_validation->set_rules("ConfirmPassword", "Confirm Password", "required");
            if ($this->form_validation->run() == false) {
                $response["status"] = "error";
                $response["message"] = validation_errors();
            }
            if ($this->input->post("NewPassword") != $this->input->post("ConfirmPassword")) {
                $response["status"] = "error";
                $response["message"] = "New Password And Retype New Password does not matched.";
            } else {
                $cond = ['ActivationCode' => $this->input->post('activationCode') ];
                $checkVerificationCode = $this->BaseModel->getData("login", $cond);
                if ($checkVerificationCode->num_rows() > 0) {
                    $password = hash("SHA512", $this->input->post("CurrentPassword"));
                    $newPassword = hash("SHA512", $this->input->post("NewPassword"));
                    $cond = ["UserId" => $this->input->post('userId')];
                    $login_data = $this->BaseModel->getData("login", $cond);
                    if ($login_data->num_rows() > 0) {
                        $response_update = $this->BaseModel->updateData("login", ["password" => $newPassword], $cond);
                        if ($response_update) {
                            $response["status"] = "success";
                            $response["message"] = "Password has been changed.";
                        } else {
                            $response["status"] = "error";
                            $response["message"] = "Failed to change password.";
                        }
                    } else {
                        $response["status"] = "error";
                        $response["message"] = "Failed to change password, Current Password does not matched.";
                    }
                } else {
                    $response["status"] = "error";
                    $response["message"] = "Please enter correct email Id.";
                }
            }
        } else {
            $response["message"] = "No POST data received.";
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
    public function postForgotPassword() {
        $response = ["status" => "error", "message" => ""];
        if ($this->input->post()) {
            $this->form_validation->set_rules("NewPassword", "New Password", "required");
            $this->form_validation->set_rules("ConfirmPassword", "Confirm Password", "required");
            if ($this->form_validation->run() == false) {
                $response["status"] = "error";
                $response["message"] = validation_errors();
            }
            if ($this->input->post("NewPassword") != $this->input->post("ConfirmPassword")) {
                $response["status"] = "error";
                $response["message"] = "New Password And Retype New Password does not matched.";
            } else {
                $cond = ['UserId' => $this->input->post('email') ];
                $checkVerificationCode = $this->BaseModel->getData("login", $cond);
                if ($checkVerificationCode->num_rows() > 0) {
                    $response["status"] = "success";
                    $response["data"] = $checkVerificationCode->row()->LoginId;
                    $response["message"] = ".";
                } else {
                    $response["status"] = "error";
                    $response["message"] = "Please enter correct email Id.";
                }
            }
        } else {
            $response["message"] = "No POST data received.";
        }
        header("Content-Type: application/json");
        echo json_encode($response);
    }
    public function postVerifyAccount() {
        if ($this->input->method() === "post") {
            $this->form_validation->set_rules("activationCode", "Activation Code", "trim|required|min_length[6]|max_length[6]");
            $this->form_validation->set_rules("userId", "userId", "trim|required");
            if ($this->form_validation->run() === false) {
                $response = ["status" => "validation_errors", "message" => validation_errors() ];
            } else {
                $activationCode = $this->input->post("activationCode");
                $userId = $this->input->post("userId");
                $cond = ['UserId' => $this->input->post('userId'), 'ActivationCode'=>$activationCode ];
                $checkVerificationCode = $this->BaseModel->getData("login", $cond);          
                if ($checkVerificationCode->num_rows() > 0) {
                    try {
                        $cond = ["UserId" => $userId];
                        $updateData = ["IsActive" => 1];
                        $updateUserActivation = $this->BaseModel->updateData("login", $updateData, $cond);
                        if ($updateUserActivation) {
                            $response = ["status" => "success", "message" => "User verified successfully."];
                        } else {
                            $response = ["status" => "error", "message" => "Failed. Please try again later."];
                        }
                    }
                    catch(Exception $e) {
                        $response = ["status" => "error", "message" => "Failed. Please try again later."];
                    }
                } else {
                    $response = ["status" => "error", "message" => "Invalid Verification code."];
                }
            }
        } else {
            $response = ["status" => "error", "message" => "Invalid request method."];
        }
        $this->output->set_content_type("application/json");
        echo json_encode($response);
    }
    public function resendOTP() {
        $data["title"] = $this->projectTitle . " : Verify Reset Password";
        $record = $this->BaseModel->getData('login', ['UserId' => $this->input->post('userId') ]);
        if ($record->num_rows() == 0) {
            $this->session->set_flashdata("verified", "Your account is already created. Please log in");
            $this->load->view("sign-in", $data);
        } else {
            // Get user details from the record
            $details = $record->row();
            $data["UserId"] = $details->UserId;
            // Generate an activation code
            $set = "1234567890";
            $activationCode = substr(str_shuffle($set), 0, 6);
            // Send the activation code via email
            // $sendResult = $this->sendActivationCode($email, $activationCode);
            $cond = ["UserId" => $details->UserId];
            $subject = "Verification Code - " . $activationCode . " from Vimarsh";
            $output = "";
            $output = '<!DOCTYPE html>
                        <html>
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>BPR&D</title>
                            <style type="text/css">
                            body {

                                margin: 0;
                 
                                padding: 0;
                 
                                min-width: 100% !important;
                 
                                background-color: #eaedf7;
                 
                                color: #ffffff;
                 
                                }
                 
                                .content {
                 
                                width: 100%;
                 
                                max-width: 600px;
                 
                                margin: 0 auto;
                 
                                background-color: #16191a;
                 
                                color: #000000;
                 
                                }
                 
                                .header {
                 
                                background-color: #16191a;
                 
                                text-align: center;
                 
                                color: #ffffff;
                 
                                }
                 
                                .header img {
                 
                                height: 80px;
                 
                                padding: 1rem;
                 
                                }
                 
                                .inner-content {
                 
                                min-height: 120px;
                 
                                margin-top: 40px;
                 
                                margin-bottom: 40px;
                 
                                padding: 20px;
                 
                                background-color: #ffffff;
                 
                                  border-radius: 0.2rem;
                 
                                  box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
                 
                                }
                 
                                .otp-code {
                 
                                text-align: center;
                 
                                margin-top: 1rem;
                 
                                }
                 
                                .otp-value {
                 
                                font-weight: bold;
                 
                                }
                 
                                .greeting {
                 
                                font-weight: bold;
                 
                                }
                 
                                .instructions {
                 
                                margin-top: 10px;
                 
                                }
                 
                                .regards {
                 
                                text-align: left;
                 
                                }
                 
                                .footer {
                 
                                background: linear-gradient(#16191a, #16191a);
                 
                                text-align: center;
                 
                                color: #ffffff;
                 
                                height: 40px;
                 
                                line-height: 40px;
                 
                                }
                 
                
                            </style>
                        </head>
                        <body>
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="header">
                                <tr>
                                    <td><img src="https://vimarsh.tcoe.in/include/custom/img/logo.png" height="100px" alt="Vimarsh Logo"></td>
                                </tr>
                            </table>
                            <table class="content inner-content" align="center" cellpadding="0" cellspacing="0" border="0">
                
                                                        <tr>
                                                            <td colspan="2" class="greeting">Dear Mr. / Mrs. ' . $details->UserName . ',</td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="instructions">Please enter the given code to verify your account.</td>
                                </tr>
                              <tr>
                                  <td><br></td>
                              </tr>
                              <tr  class="otp-code">
                                <td><b>Verification Code  <span class="otp-value">: ' . $activationCode . '</span></b> </td>
                              
                                                    </tr>
                               <tr><td><br></td></tr>
                               
                                <tr>
                                    <th class="regards">Regards</th>
                                </tr>
                                <tr>
                                    <th class="regards">Vimarsh 5G Hackathon 2023</th>
                                </tr>
                            </table>
                            <table width="100%" class="footer">
                                <tr>
                                     <td>&copy; ' . date("Y") . ' Vimarsh . All rights reserved.</td>
                                </tr>
                            </table>
                        </body>
                        </html>';
            $sendActivationCode = $this->mainEmailConfig($details->UserId, $subject, $output);
            if ($sendActivationCode) {
                $updateActivationCode = $this->BaseModel->updateData("login", ["ActivationCode" => $activationCode], $cond);
                if ($updateActivationCode) {
                    $response = ["status" => "success", "message" => "Verification code send to registered Email ID."];
                    $this->output->set_content_type("application/json");
                    echo json_encode($response);
                } else {
                    throw new Exception("Failed to update activation code in the database");
                }
            } else {
                echo "server down";
            }
        }
    }
}
