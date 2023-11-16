<?php
defined("BASEPATH") or exit("No direct script access allowed");
class AdminController extends CI_Controller
{
    var $projectTitle = "BPR&D";
    public function __construct()
    {
        parent::__construct();
        if (!isset($this->session->login["UserLevel"]) || empty($this->session->login["UserId"])) {
            redirect("sign-in");
        }
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model("BaseModel");
        $this->load->helper("common_helper");
    }
    public function mainEmailConfig($to, $subject, $message, $cc = "", $attach = "")
    {
        try {
            $this->load->library("email");
            // $config = array('protocol' => 'smtp', 'smtp_host' => 'mail.icbappliedscience.com', 'smtp_port' => 465, 'smtp_user' => 'admin@icbappliedscience.com', 'smtp_pass' => 'Y5?4pO0cOX#x', 'smtp_crypto' => 'ssl', 'mailtype' => 'html', 'crlf' => "\r\n", 'newline' => "\r\n", 'charset' => 'utf-8', 'wordwrap' => true);
            //     $config = [
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
        } catch (Exception $e) {
            // Handle email sending exceptions here
            echo "Email sending error: " . $e->getMessage();
            return false;
        }
    }
    function handleFileUpload($inputName, $uploadPath, $allowedTypes, $maxSize)
    {
        if (!empty($_FILES[$inputName]["name"])) {
            $config["upload_path"] = $uploadPath;
            $config["max_size"] = $maxSize;
            $config["allowed_types"] = $allowedTypes;
            $CI = &get_instance(); // Assuming you're working with CodeIgniter

            $CI->load->library("upload", $config);
            $CI->upload->initialize($config); // Initialize the upload library

            if ($CI->upload->do_upload($inputName)) {
                $uploadData = $CI->upload->data();

                // Generate a unique filename for the uploaded file
                $fileExtension = pathinfo($uploadData["file_name"], PATHINFO_EXTENSION);
                $uniqueFilename = uniqid($inputName . "_") . "." . $fileExtension;

                // Move the uploaded file to the new unique filename
                $oldFilePath = $config["upload_path"] . $uploadData["file_name"];
                $newFilePath = $config["upload_path"] . $uniqueFilename;

                if (rename($oldFilePath, $newFilePath)) {
                    return $uniqueFilename; // Return the new unique filename
                } else {
                    $CI->session->set_flashdata("error", "Failed to rename the uploaded file.");
                    return false;
                }
            } else {
                $CI->session->set_flashdata("error", $CI->upload->display_errors());
                return false;
            }
        } else {
            return ""; // Return an empty string when no file is uploaded
        }
    }
    public function adminDashboard()
    {
        $data["title"] = $this->projectTitle . ": Dashboard";
        $data["page_name"] = "pages/admin-dashboard";
        $data["totalRegisteredUsers"] = $this->BaseModel->getData("login", ["UserLevel" => 2])->result_array();
        $data["totalCompletedApplications"] = $this->BaseModel->getData("form_status", ["last_submited_form" => 3])->result_array();
        $data["totalApplications"] = $this->BaseModel->getData("form_status")->result_array();
        $data["totalApplicationsPending"] = $this->BaseModel->getData("form_status", ["application_status" => 1])->result_array();
        $data["totalApplicationsApproved"] = $this->BaseModel->getAppointmentDetail(2);
        $data["totalApplicationsReject"] = $this->BaseModel->getAppointmentDetail(3);
        $this->load->view("component/index", $data);
    }
    public function userDashboard()
    {
        $data["title"] = $this->projectTitle . ": Dashboard";
        $data["page_name"] = "pages/user-dashboard";
        $data["userDashboard"] = $this->BaseModel
            ->getData("form_status", [
                "user_id" => $this->session->login["UserId"],
            ])
            ->row();
        $this->load->view("component/index", $data);
    }
    public function applicationPreview($id)
    {
        $UserId = $this->BaseModel->getData("form_status", ["login_id" => $id])->row()->user_id;
        $data["title"] = $this->projectTitle . ": Application Preview";
        $data["page_name"] = "pages/application-preview";
        $data["getApplicationPreview"] = $this->BaseModel->getApplicationPreview($UserId)->row();
        $this->load->view("component/index", $data);
    }
    public function logout()
    {
        $this->load->driver("cache");
        $this->session->sess_destroy();
        $this->cache->clean();
        return redirect("sign-in");
    }
    public function profile()
    {
        $data["title"] = $this->projectTitle . ": Profile";
        $data["page_name"] = "pages/profile";
        $this->load->view("component/index", $data);
    }
    public function registration()
    {
        $data["title"] = $this->projectTitle . ": Registration";
        $data["page_name"] = "pages/registration";
        $this->load->view("component/index", $data);
    }
    public function changePassword()
    {
        $data["title"] = $this->projectTitle . ": Change Pssword";
        $data["page_name"] = "pages/change-password";
        $this->load->view("component/index", $data);
    }
    public function registeredUsers()
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["title"] = $this->projectTitle . ": Registered Users";
            $data["page_name"] = "pages/registered-users";
            $data["registeredUsers"] = $this->BaseModel->getData("login", ["UserLevel" => 2])->result_array();
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function userDetail($id)
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["userDetail"] = $this->BaseModel->getData("login", ["LoginId" => $id])->row();
            $data["title"] = $data["userDetail"]->UserName;
            ": User Detail";
            $data["page_name"] = "pages/user-detail";
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function reports()
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["title"] = $this->projectTitle . ": Reports";
            $data["page_name"] = "pages/reports";
            $data["applicationList"] = $this->BaseModel->getAppointmentDetail();
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function applicationList()
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["title"] = $this->projectTitle . ": Application List";
            $data["page_name"] = "pages/application-list";
            // $cond = ["form_status" => 2, "application_status" => 1];
            $data["applicationList"] = $this->BaseModel->getAppointmentDetail();
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function approveApplication()
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["title"] = $this->projectTitle . ": Approve Application";
            $data["page_name"] = "pages/approve-application";
            $data["applicationList"] = $this->BaseModel->getAppointmentDetail(2);
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function pendingApplication()
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["title"] = $this->projectTitle . ": Pending Application";
            $data["page_name"] = "pages/pending-application";
            $data["applicationList"] = $this->BaseModel->getAppointmentDetail(1);
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function rejectApplication()
    {
        if ($this->session->login["UserLevel"] == 1) {
            $data["title"] = $this->projectTitle . ": Reject Application";
            $data["page_name"] = "pages/reject-application";
            $data["applicationList"] = $this->BaseModel->getAppointmentDetail(3);
            $this->load->view("component/index", $data);
        } else {
            redirect("sign-in");
        }
    }
    public function postCompanyProfile()
    {
        $response = [];
        try {
            if ($this->input->post()) {
                // Validation rules and messages company_turnover
                $this->form_validation->set_rules("name", "Name", "required|min_length[3]|max_length[50]");
                $this->form_validation->set_rules("company_turnover", "Company Turnover", "max_length[50]");
                $this->form_validation->set_rules("company_name", "Company Name", "required|min_length[3]|max_length[255]");
                $this->form_validation->set_rules("contact_no", "Contact Number", "required|min_length[10]|max_length[20]");
                $this->form_validation->set_rules("email", "Email", "required|valid_email|max_length[255]");
                $this->form_validation->set_rules("city", "City", "required|max_length[255]");
                $this->form_validation->set_rules("state", "State", "required|max_length[255]");
                $this->form_validation->set_rules("phone", "Phone", "min_length[10]|max_length[20]");
                $this->form_validation->set_rules("postal_address", "Postal Address", "max_length[255]");
                $this->form_validation->set_rules("applying_as_an", "Applying As An", "required");
                $this->form_validation->set_rules("problem_statements", "Problem Statements", "required");
                $this->form_validation->set_rules("website_url", "Website URL", "valid_url|max_length[255]");
                $this->form_validation->set_message("required", "Please enter %s.");
                $this->form_validation->set_message("min_length", "%s must be at least %s characters.");
                $this->form_validation->set_message("max_length", "%s is too long.");
                $this->form_validation->set_message("valid_email", "Invalid email format.");
                $this->form_validation->set_message("valid_url", "Please enter a correct URL.");
                if ($this->form_validation->run() === false) {
                    $this->session->set_flashdata("error", validation_errors());
                    $data["title"] = $this->projectTitle . ": Registration";
                    $data["page_name"] = "pages/registration";
                    $this->load->view("component/index", $data);
                } else {
                    $cond = ["user_id" => $this->input->post("user_id")];
                    $check = $this->BaseModel->getData("form1", $cond);
                    if (empty($check->row()->upload_certificate)) {
                        if (!empty($this->input->post("applying_as_an") === "Startup/MSME" || $this->input->post("applying_as_an") === "Collaboration (attach mou)")) {
                            $upload_certificate = $this->handleFileUpload("upload_certificate", "./uploads/Applying_as_an/", "pdf", 200);
                            if (empty($upload_certificate)) {
                                $this->session->set_flashdata("error", "Document size is greater than 200kb in applying as an.");
                                $data["title"] = $this->projectTitle . ": Registration";
                                $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                            }
                        } else {
                            $upload_certificate = "";
                        }
                    } else {
                        $upload_certificate = $check->row()->upload_certificate;
                    }
                    if (($check->row()->applying_as_an !== $this->input->post("applying_as_an")) && ($this->input->post("applying_as_an") === "Startup/MSME" || $this->input->post("applying_as_an") === "Collaboration (attach mou)")) {
                        $upload_certificate = $this->handleFileUpload("upload_certificate", "./uploads/Applying_as_an/", "pdf", 200);
                        if (empty($upload_certificate)) {
                            $this->session->set_flashdata("error", "Document is required when the 'applying_as_an' field is updated.");
                            $data["title"] = $this->projectTitle . ": Registration";
                            $data["page_name"] = "pages/registration";
                            $this->load->view("component/index", $data);
                        }
                    }
                    if ($upload_certificate !== false) {
                        $postData["user_id"] = $this->input->post('user_id');
                        $postData["file_name"] = $upload_certificate;
                        $postData["file_path"] = './uploads/Applying_as_an/';
                        $postData['uploaded_at'] = date('Y-m-d H:i:s');
                        $query = $this->BaseModel->insertData("uploaded_files", $postData);
                    } else {
                        $this->session->set_flashdata("error", "The file type you're trying to upload is not permitted; only PDF files are accepted");
                        $data["title"] = $this->projectTitle . ": Registration";
                        $data["page_name"] = "pages/registration";
                        $this->load->view("component/index", $data);
                    }
                    if ($this->input->post("applying_as_an") !== "Startup/MSME" && $this->input->post("applying_as_an") !== "Collaboration (attach mou)") {
                        $upload_certificate = "";
                    }
                    $postData = [
                        "name" => $this->input->post("name"),
                        "login_id" => $this->session->login["LoginId"],
                        "user_id" => $this->input->post("user_id"),
                        "company_name" => $this->input->post("company_name"),
                        "contact_no" => $this->input->post("contact_no"),
                        "email" => $this->input->post("email"),
                        "city" => $this->input->post("city"),
                        "state" => $this->input->post("state"),
                        "phone" => $this->input->post("phone"),
                        "postal_address" => $this->input->post("postal_address"),
                        "applying_as_an" => $this->input->post("applying_as_an"),
                        "problem_statements" => $this->input->post("problem_statements"),
                        "company_turnover" => $this->input->post("company_turnover"),
                        "website_url" => $this->input->post("website_url"),
                        "status" => 1,
                        "upload_certificate" => !empty($upload_certificate) ? $upload_certificate : (!empty($check->upload_certificate) ? $check->upload_certificate : ''),
                    ];

                    // Continue with your code to insert or update the data as needed
                    if ($check->num_rows() == 0) {
                        // Insert data into the database
                        $query = $this->BaseModel->insertData("form1", $postData);
                        if ($query) {
                            $insertFormStatus = $this->BaseModel->insertData("form_status", [
                                "user_id" => $this->input->post("user_id"),
                                "form1" => 1,
                                "last_submited_form" => 1,
                                "last_submited_date" => date("Y-m-d H:i:s"),
                                "form_status" => 0,
                                "application_status" => 0,
                                "create_datetime" => date("Y-m-d H:i:s"),
                            ]);
                            if ($insertFormStatus) {
                                $insert_id = $this->db->insert_id();
                                $insertedId = "VMSH" . date("Y") . str_pad($insert_id, 7, "0", STR_PAD_LEFT);
                                $query = $this->BaseModel->updateData("form_status", ["application_id" => $insertedId], $cond);
                                if ($query) {
                                    $this->session->set_flashdata("success", "Company profile has beed saved");
                                    return redirect("registration");
                                } else {
                                    $this->session->set_flashdata("error", "Something went wrong");
                                    return redirect("registration");
                                }
                            }
                        } else {
                            $this->session->set_flashdata("error", "Something went wrong");
                            return redirect("registration");
                        }
                    } else {
                        // Update data into the database
                        $query = $this->BaseModel->updateData("form1", $postData, $cond);
                        if ($query) {
                            $this->session->set_flashdata("success", "Company profile has been updated.");
                            return redirect("registration");
                        } else {
                            $this->session->set_flashdata("error", "Something went wrong");
                            return redirect("registration");
                        }
                    }
                }
            } else {
                $this->session->set_flashdata("error", "No POST data received");
                return redirect("registration");
            }
        } catch (Exception $e) {
            $this->session->set_flashdata("error", $e->getMessage());
            return redirect("registration");
        }
    }
    public function postUploadDocument()
    {
        // Check if "indian_citizen" file was uploaded
        if (!empty($_FILES["indian_citizen"]["name"])) {
            $config["upload_path"] = "./uploads/";
            $config["max_size"] = "200";
            $config["allowed_types"] = "pdf";
            $this->load->library("upload", $config);
            $this->upload->initialize($config); // Initialize the upload library
            if ($this->upload->do_upload("indian_citizen")) {
                $uploadData = $this->upload->data();
                // Generate a unique filename for "indian_citizen"
                $fileExtension = pathinfo($uploadData["file_name"], PATHINFO_EXTENSION);
                $uniqueFilename = uniqid("indian_citizen_") . "." . $fileExtension;
                // Move the uploaded file to the new unique filename
                $oldFilePath = $config["upload_path"] . $uploadData["file_name"];
                $newFilePath = $config["upload_path"] . $uniqueFilename;
                if (rename($oldFilePath, $newFilePath)) {
                    $indian_citizen = $uniqueFilename; // Update the variable with the new unique filename
                } else {
                    $this->session->set_flashdata("error", "Failed to rename the uploaded file.");
                    return redirect("registration");
                }
            } else {
                $this->session->set_flashdata("error", $this->upload->display_errors());
                return redirect("registration");
            }
        } else {
            $indian_citizen = ""; // Set an empty string for "indian_citizen" when no file is uploaded
        }
        // Check if "id_proof" file was uploaded (similar process as above)
        if (!empty($_FILES["id_proof"]["name"])) {
            $config["upload_path"] = "./uploads/";
            $config["max_size"] = "200";
            $config["allowed_types"] = "pdf";
            $this->load->library("upload", $config);
            $this->upload->initialize($config); // Initialize the upload library
            if ($this->upload->do_upload("id_proof")) {
                $uploadData = $this->upload->data();
                // Generate a unique filename for "id_proof"
                $fileExtension = pathinfo($uploadData["file_name"], PATHINFO_EXTENSION);
                $uniqueFilename = uniqid("id_proof_") . "." . $fileExtension;
                // Move the uploaded file to the new unique filename
                $oldFilePath = $config["upload_path"] . $uploadData["file_name"];
                $newFilePath = $config["upload_path"] . $uniqueFilename;
                if (rename($oldFilePath, $newFilePath)) {
                    $id_proof = $uniqueFilename; // Update the variable with the new unique filename
                } else {
                    $this->session->set_flashdata("error", "Failed to rename the uploaded file.");
                    return redirect("registration");
                }
            } else {
                $this->session->set_flashdata("error", $this->upload->display_errors());
                return redirect("registration");
            }
        } else {
            $id_proof = ""; // Set an empty string for "id_proof" when no file is uploaded
        }
        $postData = [
            "indian_citizen" => $indian_citizen,
            "login_id" => $this->session->login["LoginId"],
            "id_proof" => $id_proof,
            "user_id" => $this->input->post("user_id"),
            "declare" => $this->input->post("declare"),
        ];
        $inserted = $this->BaseModel->insertData("form3", $postData);
        if (!$inserted) {
            $this->session->set_flashdata("error", "Database insert failed");
            return redirect("registration");
        } else {
            $cond = ["user_id" => $this->input->post("user_id")];
            $updateData = [
                "form_status" => 1,
                "last_submited_form" => 3,
                "form3" => 1,
                "modify_datetime" => date("Y-m-d H:i:s"),
            ];
            // Handle success
            $updateStatus = $this->BaseModel->updateData("form_status", $updateData, $cond);
            if ($updateStatus) {
                $this->session->set_flashdata("success", "Documents has been uploaded, Click on final submit button.");
                return redirect("registration");
            } else {
                $this->session->set_flashdata("error", "Something went wrong");
                return redirect("registration");
            }
        }
    }
    public function postFinalSubmit()
    {
        try {
            $this->form_validation->set_rules("user_id", "User Id", "required");
            if ($this->form_validation->run() === false) {
                $errors = validation_errors();
                $response = ["error" => $errors];
            } else {
                $id = $this->input->post("user_id");
                $login_id = $this->BaseModel->getData("form1", ["user_id" => $id])->row()->login_id;
                $postData = [
                    "form_status" => 2,
                    "application_status" => 1,
                    "login_id" => $login_id,
                    "modify_datetime" => date("Y-m-d H:i:s"),
                ];
                $cond = ["user_id" => $id];
                $query = $this->BaseModel->updateData("form_status", $postData, $cond);
                if ($query) {
                    $generatePDFAndSendEmail = $this->generatePDFAndSendEmail($id);
                    if ($generatePDFAndSendEmail) {
                        $response = ["message" => "Registration Completed."];
                    } else {
                        $response = ["error" => "Something went wrong"];
                    }
                } else {
                    $response = ["error" => "Something went wrong"];
                }
            }
            $this->output->set_content_type("application/json")->set_output(json_encode($response));
        } catch (Exception $e) {
            $response = ["error" => $e->getMessage()];
            $this->output->set_content_type("application/json")->set_output(json_encode($response));
        }
    }
    public function postSendMessage()
    {
        try {
            $response = [];
            $message = $this->input->post("message");
            $login_id = $this->input->post("user_id");
            $cc = $this->input->post("cc");
            $to = $this->input->post("to");
            $subject = $this->input->post("subject");
            if (empty($message)) {
                $response = [
                    "status" => "error",
                    "message" => "Message is required.",
                ];
            } else {
                $postData = [
                    "to" => $to,
                    "cc" => $cc,
                    "login_id" => $login_id,
                    "subject" => $subject,
                    "message" => $message,
                    "create_datetime" => date("Y-m-d H:i:s"),
                ];
                if (empty($cc) || is_null($cc)) {
                    $cc = null;
                }
                if (empty($subject) || is_null($subject)) {
                    $subject = null;
                }
                $sendEmail = $this->mainEmailConfig($to, $subject, $message, $cc);
                if ($sendEmail) {
                    $query = $this->BaseModel->insertData("email_messages", $postData);
                    if ($query) {
                        $response = [
                            "status" => "success",
                            "message" => "Email send.",
                        ];
                    } else {
                        $response = [
                            "status" => "error",
                            "message" => "Something went wrong",
                        ];
                    }
                } else {
                    $response = [
                        "status" => "error",
                        "message" => "Faild to sending a mail",
                    ];
                }
            }
            $this->output->set_content_type("application/json")->set_output(json_encode($response));
        } catch (Exception $e) {
            $response = ["status" => "error", "message" => $e->getMessage()];
            $this->output->set_content_type("application/json")->set_output(json_encode($response));
        }
    }
    public function postTechnical()
    {
        try {
            $cond = ["user_id" => $this->input->post("user_id")];
            $check = $this->BaseModel->getData("form2", $cond);
            if ($this->input->post()) {
                if ($this->input->post("similar_product") == "yes") {
                    if (empty($check->row()->attachment)) {
                        if (empty($_FILES["attachment"]["name"])) {
                            $this->session->set_flashdata("error", "Uploading a document is mandatory for the Similar product");
                            $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                        } elseif (!empty($_FILES["attachment"]["name"])) {
                            $attachment = $this->handleFileUpload("attachment", "./uploads/", "pdf", 200);
                            if (empty($attachment)) {
                                $this->session->set_flashdata("error", "Uploading a document is mandatory for the Similar product");
                                $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                            }
                        } else {
                            $attachment = "";
                        }
                    } else {
                        $attachment = $check->row()->attachment;
                    }
                }
                if ($this->input->post("point_presentation") == "file") {
                    if (empty($check->row()->point_presentationfile)) {
                        if (empty($_FILES["point_presentationfile"]["name"])) {
                            $this->session->set_flashdata("error", "Uploading a document is mandatory for the PowerPoint presentation");
                                $this->load->view("pages/registration");
                        } elseif (!empty($_FILES["point_presentationfile"]["name"])) {
                            $point_presentationfile = $this->handleFileUpload("point_presentationfile", "./uploads/Power_Point_Presentation/", "pdf", 200);
                            if (empty($point_presentationfile)) {
                                $this->session->set_flashdata("error", "Uploading a document is mandatory for the PowerPoint presentation");
                                $this->load->view("pages/registration");
                            }
                        } else {
                            $point_presentationfile = "";
                        }
                    } else {
                        $point_presentationfile = $check->row()->point_presentationfile;
                    }
                }
                if ($this->input->post("proof_for_poC") == "file") {
                    if (empty($check->row()->proof_for_poCFile)) {
                        if (empty($_FILES["proof_for_poCFile"]["name"])) {
                            $this->session->set_flashdata("error", "Uploading a document is mandatory for the Proof for PoC");
                            $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                        } elseif (!empty($_FILES["proof_for_poCFile"]["name"])) {
                            $proof_for_poCFile = $this->handleFileUpload("proof_for_poCFile", "./uploads/Proof_for_poC/", "pdf", 200);
                            if (empty($proof_for_poCFile)) {
                                $this->session->set_flashdata("error", "Uploading a document is mandatory for the Proof for PoC");
                                $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                            }
                        } else {
                            $proof_for_poCFile = "";
                        }
                    } else {
                        $proof_for_poCFile = $check->row()->proof_for_poCFile;
                    }
                }
                if ($this->input->post("validated") == "file") {
                    if (empty($check->row()->validatedFile)) {
                        if (empty($_FILES["validatedFile"]["name"])) {
                            $this->session->set_flashdata("error", "Uploading a document is mandatory for the Validated document");
                            $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                        } elseif (!empty($_FILES["validatedFile"]["name"])) {
                            $validatedFile = $this->handleFileUpload("validatedFile", "./uploads/Validated/", "pdf", 200);
                            if (empty($validatedFile)) {
                                $this->session->set_flashdata("error", "Uploading a document is mandatory for the Validated document");
                                $data["page_name"] = "pages/registration";
                                $this->load->view("component/index", $data);
                            }
                        } else {
                            $validatedFile = "";
                        }
                    } else {
                        $validatedFile = $check->row()->validatedFile;
                    }
                }
                $this->form_validation->set_rules("domain", "Domain/Thrust Area", "required|max_length[5000]");
                $this->form_validation->set_rules("brief_solution", "Brief about your product/solution", "required|max_length[10000]");
                $this->form_validation->set_rules("technical_details_link", "Technical Details Link", "required|valid_url");
                $this->form_validation->set_rules("point_presentation", "Point Presentation", "required");
                $this->form_validation->set_rules("stag_of_product", "Stage of Product TRL", "required|max_length[10000]");
                $this->form_validation->set_rules("proof_for_poC", "Proof for PoC", "valid_url");
                $this->form_validation->set_rules("patent_product", "Have you filed a patent for your product/solution", "required");
                // Define conditional validation based on radio buttons
                if ($this->input->post("patent_product") === "yes") {
                    $this->form_validation->set_rules("application_number", "Application Number", "required");
                    $this->form_validation->set_rules("date_of_filing", "Date of Filing", "required");
                    $this->form_validation->set_rules("country", "Country", "required");
                }
                if ($this->input->post("point_presentation") === "link") {
                    $this->form_validation->set_rules("point_presentationlink", "Point Presentation link", "required");
                }
                if ($this->input->post("proof_for_poC") === "link") {
                    $this->form_validation->set_rules("proof_for_poCLink", "Proof for poC", "required");
                }
                if ($this->input->post("validated") === "link") {
                    $this->form_validation->set_rules("validatedLink", "Validated Link", "required");
                }

                // Define custom error messages
                $this->form_validation->set_message("required", "Please enter %s.");
                $this->form_validation->set_message("max_length", "%s is too long.");
                $this->form_validation->set_message("valid_url", "Please enter a valid URL.");
                if ($this->form_validation->run() === false) {
                    $this->session->set_flashdata("error", validation_errors());
                    $data["title"] = $this->projectTitle . ": Registration";
                    $data["page_name"] = "pages/registration";
                    $this->load->view("component/index", $data);
                } else {
                    if ($this->input->post("point_presentationlink")) {
                        $point_presentationlink = $this->input->post("point_presentationlink");
                    } else {
                        $point_presentationlink = '';
                    }
                    if ($this->input->post("proof_for_poCLink")) {
                        $proof_for_poCLink = $this->input->post("proof_for_poCLink");
                    
                    } else {
                        $proof_for_poCLink = '';
                       
                    }
                    if ($this->input->post("validatedLink")) {
                        $validatedLink = $this->input->post("validatedLink");
                       
                    } else {
                        $validatedLink = '';
                      
                    }
                    if ($this->input->post('validated') == 'none' ) 
                    {
                        $validatedLink = ''; 
                        $validatedFile = '';
                    }
                    $postData = [
                        "user_id" => $this->input->post("user_id"),
                        "login_id" => $this->session->login["LoginId"],
                        "domain" => $this->input->post("domain"),
                        "brief_solution" => $this->input->post("brief_solution"),
                        "technical_details_link" => $this->input->post("technical_details_link"),
                        "point_presentation" => $this->input->post("point_presentation"),
                        "point_presentationfile" => $point_presentationfile,
                        "point_presentationlink" => $point_presentationlink,
                        "proof_for_poCFile" => $proof_for_poCFile,
                        "proof_for_poCLink" => $proof_for_poCLink,
                        "validatedFile" => $validatedFile,
                        "validatedLink" => $validatedLink,
                        "stag_of_product" => $this->input->post("stag_of_product"),
                        "proof_for_poC" => $this->input->post("proof_for_poC"),
                        "patent_product" => $this->input->post("patent_product"),
                        "application_number" => $this->input->post("application_number"),
                        "date_of_filing" => $this->input->post("date_of_filing"),
                        "country" => $this->input->post("country"),
                        "validated" => $this->input->post("validated"),
                        "validation_details_link" => $this->input->post("validation_details"),
                        "similar_product" => $this->input->post("similar_product"),
                        "advantage_details_link" => $this->input->post("advantage_details"),
                        "products_lassifies_as_a_5G" => $this->input->post("products_lassifies_as_a_5G"),
                        "attachment" => $attachment,
                    ];
                    $cond = ["user_id" => $this->input->post("user_id")];
                    $check = $this->BaseModel->getData("form2", $cond);
                    if ($check->num_rows() == 0) {
                        $inserted = $this->BaseModel->insertData("form2", $postData);
                        if (!$inserted) {
                            $this->session->set_flashdata("error", "Database insert failed");
                            return redirect("registration");
                        }
                        // Handle success
                        $query = $this->BaseModel->updateData(
                            "form_status",
                            [
                                "form2" => 1,
                                "last_submited_form" => 2,
                                "modify_datetime" => date("Y-m-d H:i:s"),
                            ],
                            ["user_id" => $this->input->post("user_id")]
                        );
                        if ($query) {
                            $this->session->set_flashdata("success", "Technical details has bee saved");
                            return redirect("registration");
                        } else {
                            $this->session->set_flashdata("error", "Something went wrong");
                            return redirect("registration");
                        }
                    } else {
                        
                        // Update data into the database
                        $query = $this->BaseModel->updateData("form2", $postData, $cond);
                        if ($query) {
                            $this->session->set_flashdata("success", "Technical details has been updated");
                            return redirect("registration");
                        } else {
                            $this->session->set_flashdata("error", "Something went wrong");
                            return redirect("registration");
                        }
                    }
                }
            } else {
                $this->session->set_flashdata("error", "Invalid POST data");
                return redirect("registration");
            }
        } catch (Exception $e) {
            $this->session->set_flashdata("error", $e->getMessage());
            return redirect("registration");
        }
    }
    public function postChangePassword($param1 = "page")
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules("CurrentPassword", "Old Passsword", "required");
            $this->form_validation->set_rules("NewPassword", "New Password", "required");
            $this->form_validation->set_rules("ConfirmPassword", "Confirm Password", "required");
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata("error", validation_errors());
                return redirect("change-password");
            }
            if ($this->input->post("NewPassword") != $this->input->post("ConfirmPassword")) {
                $this->session->set_flashdata("error", "New Password And Retype New Password does not matched");
                return redirect("change-password");
            } else {
                $password = hash("SHA512", $this->input->post("CurrentPassword"));
                $newPassword = hash("SHA512", $this->input->post("NewPassword"));
                $cond = [
                    "UserId" => $this->session->login["UserId"],
                    "password" => $password,
                ];
                $login_data = $this->BaseModel->getData("login", $cond);
                if ($login_data->num_rows() > 0) {
                    $response_update = $this->BaseModel->updateData("login", ["password" => $newPassword], $cond);
                    if ($response_update) {
                        $this->session->set_flashdata("success", "Password has been changed");
                        return redirect("change-password");
                    } else {
                        $this->session->set_flashdata("error", "Failed to change password");
                        return redirect("change-password");
                    }
                } else {
                    $this->session->set_flashdata("error", "Failed to change password, Current Password does not matched!");
                    return redirect("change-password");
                }
            }
        } else {
            $this->session->set_flashdata("error", "No POST data received!");
            return redirect("change-password");
        }
    }
    public function postApproveApplication()
    {
        $this->form_validation->set_rules("user_id", "User Id", "required");
        if ($this->form_validation->run() === false) {
            $errors = validation_errors();
            $response = ["status" => "error", "message" => $errors];
        } else {
            $user_id = $this->input->post("user_id");
            $postData = [
                "application_status" => 2,
                "modify_datetime" => date("Y-m-d H:i:s"),
            ];
            $cond = ["user_id" => $user_id];
            $query = $this->BaseModel->updateData("form_status", $postData, $cond);
            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "Application approved successfully",
                ];
            } else {
                $response = ["error" => "Menu delete faild"];
            }
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
    public function downloadApplicationPreview($id)
    {
        try {
            $UserId = $this->BaseModel->getData("form_status", ["login_id" => $id])->row()->user_id;
            $cond = [
                "user_id" => $UserId,
                "last_submited_form" => 3,
                "form_status" => 2,
            ];
            $query = $this->BaseModel->getData("form_status", $cond);
            if ($query) {
                $response = [
                    "status" => "success",
                    "data" => customEncrypt($query->row()->user_id),
                    "message" => "Redirecting to application preview download",
                ];
            } else {
                $response = ["error" => "Application preview download failed"];
            }
        } catch (Exception $e) {
            $response = [
                "error" => "An error occurred while processing the request.",
            ];
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
    public function postRejectApplication()
    {
        $this->form_validation->set_rules("user_id", "User Id", "required");
        if ($this->form_validation->run() === false) {
            $errors = validation_errors();
            $response = ["status" => "error", "message" => $errors];
        } else {
            $user_id = $this->input->post("user_id");
            $postData = [
                "application_status" => 3,
                "modify_datetime" => date("Y-m-d H:i:s"),
            ];
            $cond = ["user_id" => $user_id];
            $query = $this->BaseModel->updateData("form_status", $postData, $cond);
            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "Application reject successfully",
                ];
            } else {
                $response = ["error" => "Application reject faild"];
            }
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
    public function getCommentData()
    {
        $cond = ["user_id" => $this->input->post("user_id")];
        $query = $this->BaseModel->getData("form_status", $cond);
        if ($query->num_rows() > 0) {
            $data = $query->result_array();
            echo json_encode(["data" => $data]);
        } else {
            echo json_encode(["data" => "No result found"]);
        }
    }
    public function updateComment()
    {
        $this->form_validation->set_rules("user_id", "User Id", "required");
        if ($this->form_validation->run() === false) {
            $errors = validation_errors();
            $response = ["status" => "error", "message" => $errors];
        } else {
            $user_id = $this->input->post("user_id");
            $remark = $this->input->post("remark");
            $postData = [
                "remark" => $remark,
                "modify_datetime" => date("Y-m-d H:i:s"),
            ];
            $cond = ["user_id" => $user_id];
            $query = $this->BaseModel->updateData("form_status", $postData, $cond);
            if ($query) {
                $response = [
                    "status" => "success",
                    "message" => "Add the comment against the submitted application",
                ];
            } else {
                $response = ["error" => "Menu delete faild"];
            }
        }
        $this->output->set_content_type("application/json")->set_output(json_encode($response));
    }
    public function encryptedfilelocation($file)
    {
        $decodedFileLocation = base64_decode(strtr($file, "-_,", "+/="));
        $sanitizedFileLocation = filter_var($decodedFileLocation, FILTER_SANITIZE_URL);
        $data["fileLocation"] = $sanitizedFileLocation;
        $this->load->view("encryptedfilelocation", $data);
    }
    public function exportReport()
    {
        if ($this->session->login["UserLevel"] == 1) {
            if ($this->input->post()) {
                $problem_statements = $this->input->post("problem_statements");
                $company_wise = $this->input->post("company_wise");
                $name_wise = $this->input->post("name_wise");
                $date_wise = $this->input->post("date_wise");
                $status = $this->input->post("status");
                $qry = "SELECT * FROM form_status
                    LEFT JOIN form1 ON form_status.user_id = form1.user_id
                    LEFT JOIN form2 ON form_status.user_id = form2.user_id
                    LEFT JOIN form3 ON form_status.user_id = form3.user_id
                    LEFT JOIN login ON form_status.user_id = login.UserId
                    WHERE 1=1";
                if (!empty($problem_statements)) {
                    $qry .= " AND problem_statements = '" . $problem_statements . "'";
                }
                if ($company_wise === "ASC") {
                    $qry .= " ORDER BY company_name ASC";
                } elseif ($company_wise === "DESC") {
                    $qry .= " ORDER BY company_name DESC";
                }
                if ($name_wise === "ASC") {
                    $qry .= " ORDER BY name ASC";
                } elseif ($name_wise === "DESC") {
                    $qry .= " ORDER BY name DESC";
                }
                if (!empty($date_wise)) {
                    $qry .= " AND create_datetime = '" . $date_wise . "'";
                }
                if (!empty($status)) {
                    $qry .= " AND application_status = '" . $status . "'";
                }
                $applicationList = $this->db->query($qry)->result_array();
                $i = 1;
                $filename = "Vimarsh" . date("YmdH_i_s") . ".csv";
                header("Content-type: text/csv");
                header("Content-Disposition: attachment;filename=" . $filename);
                header("Cache-Control: no-store, no-cache, must-revalidate");
                header("Cache-Control: post-check=0,pre-check=0");
                header("Pragma: no-cache");
                header("Expires:0");
                $handle = fopen("php://output", "w");
                fputcsv($handle, [
                    "Sr.No.",
                    "Application Number",
                    "Applying Type",
                    "Name",
                    "Phone Number",
                    "Email ID",
                    "Company Name",
                    "Address",
                    "City",
                    "State",
                    "Industry Verticle",
                    "Website URL",
                    "Domain/Thrust Area",
                    "Brief About Your Product/solution",
                    "The Note On Technical Details Or Work/Process Flow Of Product/Solution",
                    "Power Point Presentation / Two-minute Product Video",
                    "Stage Of Product Based On Technology Readiness Level (TRL)",
                    "Proof For PoC(Video, Picture Etc)",
                    "Patent For Your Product/solution",
                    "Application Number",
                    "Date Of Filing",
                    "Country",
                    "Similar Product/ Solution Available In The Market W.r.t Your Solution",
                    "Proposed Product",
                    "Problem Statements Given In Annexure",
                    "Certificate Of Incorporation",
                    "Declaration",
                    "Application Detail (PDF)",
                    "Attachment",
                    "Indian Citizen",
                    "ID Proof",
                ]);
                foreach ($applicationList as $list) {
                    $sNo = $i++;
                    $excelFormula = '=HYPERLINK("' . base_url() . "generatePDF/" . $list["login_id"] . '", "PDF Link")';
                    $websiteURL = '= HYPERLINK("';
                    if (strpos($list["website_url"], "https://") !== 0) {
                        $websiteURL .= "https://";
                    }
                    $websiteURL .= $list["website_url"] . '", "' . $list["website_url"] . '")';
                    $technicalDetailsLink = '=HYPERLINK("' . $list["technical_details_link"] . '", "' . $list["technical_details_link"] . '")';
                    $proofForPoC = '=HYPERLINK("' . $list["proof_for_poC"] . '", "' . $list["proof_for_poC"] . '")';
                    $pointPresentation = '=HYPERLINK("' . $list["point_presentation"] . '", "' . $list["point_presentation"] . '")';
                    // $attachment = '=HYPERLINK(' . base_url('uploads/').$list["attachment"] . '", "Attachment")';
                    $attachment = '=HYPERLINK("' . base_url() . "uploads/" . $list["attachment"] . '", "Attachment")';
                    $indian_citizen = '=HYPERLINK("' . base_url("uploads/") . $list["indian_citizen"] . '", "View Indian Citizen Document")';
                    $id_proof = '=HYPERLINK("' . base_url("uploads/") . $list["id_proof"] . '", "View ID Proof Document")';
                    $validationDetailsLink = '=HYPERLINK("' . $list["validation_details_link"] . '", "' . $list["validation_details_link"] . '")';
                    fputcsv($handle, [
                        $sNo,
                        $list["application_id"],
                        $list["applying_as_an"],
                        $list["name"],
                        $list["contact_no"],
                        $list["email"],
                        $list["company_name"],
                        $list["postal_address"],
                        $list["city"],
                        $list["state"],
                        "",
                        $websiteURL,
                        $list["domain"],
                        $list["brief_solution"],
                        $technicalDetailsLink,
                        $pointPresentation,
                        $list["stag_of_product"],
                        $proofForPoC,
                        $list["patent_product"],
                        $list["application_number"],
                        $list["date_of_filing"],
                        $list["country"],
                        $list["similar_product"],
                        $list["products_lassifies_as_a_5G"],
                        $list["problem_statements"],
                        "",
                        $list["declare"],
                        $excelFormula,
                        $attachment,
                        $indian_citizen,
                        $id_proof,
                    ]);
                }
                fclose($handle);
                exit();
            }
        } else {
            redirect("sign-in");
        }
    }
    public function generatePDF($userId)
    {
        $userEmail = customDecrypt($userId);
        $login_id = $this->BaseModel->getData("form_status", ["user_id" => $userEmail])->row()->user_id;
        require "vendor/autoload.php";
        $getAppointmentDetail = $this->BaseModel->getApplicationPreview($login_id)->row();
        $logoImageUrl = base_url("include/custom/img/logo.png");
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("BPR&D");
        $pdf->SetTitle("VIMARSH 2023");
        $pdf->SetSubject("Registration Preview");
        $pdf->SetKeywords("TCoE India(DoT) - BPR&D(MHA) 5G Vimarsh 2023");
        // $pdf->SetHeaderData($logoImageUrl, 30, 'Vimarsh 2023', 'TCoE-India proudly introduces a National Level Hackathon on 5G');
        // $pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
        // $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
        // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        if (@file_exists(dirname(__FILE__) . "/lang/eng.php")) {
            require_once dirname(__FILE__) . "/lang/eng.php";
            $pdf->setLanguageArray($l);
        }
        $pdf->SetFont("helvetica", "B", 20);
        $pdf->AddPage();
        $pdf->SetFont("helvetica", "", 10);
        $applicationStatus = !empty($getAppointmentDetail->application_status) ? $getAppointmentDetail->application_status : "";
        $statusLabel = "";
        switch ($applicationStatus) {
            case "1":
                $statusLabel = "Pending";
                break;
            case "2":
                $statusLabel = "Approved";
                break;
            case "3":
                $statusLabel = "Rejected";
                break;
            case "4":
                $statusLabel = "Winner";
                break;
            default:
                $statusLabel = "Unknown";
        }
        $applicationId = !empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "";
        $ApplicationStatus = $statusLabel;
        $Name = !empty($getAppointmentDetail->name) ? $getAppointmentDetail->name : "";
        $CompanyEntity = !empty($getAppointmentDetail->company_name) ? $getAppointmentDetail->company_name : "";
        $ContactNo = !empty($getAppointmentDetail->contact_no) ? $getAppointmentDetail->contact_no : "";
        $EmailID = !empty($getAppointmentDetail->email) ? $getAppointmentDetail->email : "";
        $City = !empty($getAppointmentDetail->city) ? $getAppointmentDetail->city : "";
        $State = !empty($getAppointmentDetail->state) ? $getAppointmentDetail->state : "";
        $Phone = !empty($getAppointmentDetail->phone) ? $getAppointmentDetail->phone : "";
        $PostalAddress = !empty($getAppointmentDetail->postal_address) ? $getAppointmentDetail->postal_address : "";
        $ApplyingAsAn = !empty($getAppointmentDetail->applying_as_an) ? $getAppointmentDetail->applying_as_an : "";
        $upload_certificate = !empty($getAppointmentDetail->upload_certificate) ? $getAppointmentDetail->upload_certificate : "";
        $ProblemStatements = !empty($getAppointmentDetail->problem_statements) ? $getAppointmentDetail->problem_statements : "";
        $WebsiteURL = !empty($getAppointmentDetail->website_url) ? $getAppointmentDetail->website_url : "";
        $CompanyTurnover = !empty($getAppointmentDetail->company_turnover) ? $getAppointmentDetail->company_turnover : "";
        $DomainThrustArea = !empty($getAppointmentDetail->domain) ? $getAppointmentDetail->domain : "";
        $BriefAbout = !empty($getAppointmentDetail->brief_solution) ? $getAppointmentDetail->brief_solution : "";
        $technical_details_link = !empty($getAppointmentDetail->technical_details_link) ? $getAppointmentDetail->technical_details_link : "";
        $PowerPointPresentation = !empty($getAppointmentDetail->point_presentation) ? $getAppointmentDetail->point_presentation : "";
        $setPowerPointPresentation = "";

            if ($PowerPointPresentation === "file") {
                $setPowerPointPresentation = $getAppointmentDetail->point_presentationfile;
            }
            else if ($PowerPointPresentation === "link") 
            {
                $setPowerPointPresentation = $getAppointmentDetail->point_presentationlink;
            }
            else
            {
                $setPowerPointPresentation = "None"; 
            }

        $StageofProduct = !empty($getAppointmentDetail->stag_of_product) ? $getAppointmentDetail->stag_of_product : "";
        $ProofforPoC = !empty($getAppointmentDetail->point_presentation) ? $getAppointmentDetail->point_presentation : "";
        $setProofforPoC = "";

        if ($ProofforPoC === "file") {
            $setProofforPoC = $getAppointmentDetail->proof_for_poCFile;
        }
        else if ($ProofforPoC === "link") 
        {
            $setProofforPoC = $getAppointmentDetail->proof_for_poCLink;
        }
        else
        {
            $setProofforPoC = "None"; 
        }
        $HavePatentProduct = !empty($getAppointmentDetail->patent_product) ? $getAppointmentDetail->patent_product : "";
        $PatentApplicationNo = !empty($getAppointmentDetail->application_number) ? $getAppointmentDetail->application_number : "";
        $DateofFiling = !empty($getAppointmentDetail->date_of_filing) ? $getAppointmentDetail->date_of_filing : "";
        $Country = !empty($getAppointmentDetail->country) ? $getAppointmentDetail->country : "";
        $validated = !empty($getAppointmentDetail->validated) ? $getAppointmentDetail->validated : "";
        $setvalidated = "";

        if ($validated === "file") {
            $setvalidated = $getAppointmentDetail->validatedFile;
        }
        else if ($validated === "link") 
        {
            $setvalidated = $getAppointmentDetail->validatedLink;
        }
        else
        {
            $setvalidated = "None"; 
        }
        $UploadsDetails = !empty($getAppointmentDetail->validation_details_link) ? $getAppointmentDetail->validation_details_link : "";
        $SimilarProductSolution = !empty($getAppointmentDetail->similar_product) ? $getAppointmentDetail->similar_product : "";
        $ViewAttachment = !empty($getAppointmentDetail->attachment) ? $getAppointmentDetail->attachment : "";
        $DescribeSolution = !empty($getAppointmentDetail->products_lassifies_as_a_5G) ? $getAppointmentDetail->products_lassifies_as_a_5G : "";
        $indian_citizen = !empty($getAppointmentDetail->indian_citizen) ? $getAppointmentDetail->indian_citizen : "";
        $id_proof = !empty($getAppointmentDetail->id_proof) ? $getAppointmentDetail->id_proof : "";
        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="8" border="1">
            <tr style="background-color: #0c243e; font-size: 18px; color: #fff;">
                <th colspan="2" align="center">Company Profile</th>
            </tr>
            <tr>
                <td><b>Application No.</b></td>
                <td>$applicationId</td>
            </tr>
            <tr>
                <td><b>Application Status</b></td>
                <td>$statusLabel</td>
            </tr>
            <tr>
                <td><b>Name</b></td>
                <td>$Name</td>
            </tr>
            <tr>
                <td><b>Company / Entity Name</b></td>
                <td>$CompanyEntity</td>
            </tr>
            <tr>
                <td><b>Contact No</b></td>
                <td>$ContactNo</td>
            </tr>
            <tr>
                <td><b>Email ID</b></td>
                <td>$EmailID</td>
            </tr>
            <tr>
                <td><b>City</b></td>
                <td>$City</td>
            </tr>
            <tr>
                <td><b>State</b></td>
                <td>$State</td>
            </tr>
            <tr>
                <td><b>Phone</b></td>
                <td>$Phone</td>
            </tr>
            <tr>
                <td><b>Postal Address</b></td>
                <td>$PostalAddress</td>
            </tr>
            <tr>
                <td><b>Applying as an</b></td>
                <td>$ApplyingAsAn</td>
            </tr>
            <tr>
                <td><b>Upload Certificate</b></td>
                <td>$ApplyingAsAn</td>
            </tr>
            
            <tr>
                <td><b>Problem Statements</b></td>
                <td>$ProblemStatements</td>
            </tr>
            <tr>
                <td><b>Website/URL</b></td>
                <td>$WebsiteURL</td>
            </tr>
            <tr>
                <td><b>Company Turnover (Last Financial Year)</b></td>
                <td>$CompanyTurnover</td>
            </tr>
            <tr style="background-color: #0c243e; font-size: 18px; color: #fff;">
                <th colspan="2" align="center">Technical</th>
            </tr>
            <tr>
                <td><b>Domain/Thrust Area</b></td>
                <td>$DomainThrustArea</td>
            </tr>
            <tr>
                <td><b>Brief about your product/solution</b></td>
                <td>$BriefAbout</td>
            </tr>
            <tr>
                <td><b>Uploads the note on Technical Details</b></td>
                <td>$technical_details_link</td>
            </tr>
            <tr>
                <td><b>Please provide the PowerPoint Presentation</b></td>
                <td>$setPowerPointPresentation</td>
            </tr>
            <tr>
                <td><b>Stage of Product</b></td>
                <td>$StageofProduct</td>
            </tr>
            <tr>
                <td><b>Proof for PoC (Video, Picture, etc.)</b></td>
                <td>$setProofforPoC</td>
            </tr>
            <tr>
                <td><b>Have you filed a patent for your product? </b></td>
                <td>$HavePatentProduct</td>
            </tr>
            <tr>
                <td><b>Application No. </b></td>
                <td>$PatentApplicationNo</td>
            </tr>
            <tr>
                <td><b>Date of Filing</b></td>
                <td>$DateofFiling</td>
            </tr>
            <tr>
                <td><b>Country</b></td>
                <td>$Country</td>
            </tr>
            <tr>
                <td><b>Have you validated / Tested your product</b></td>
                <td>$setvalidated</td>
            </tr>
            <tr>
                <td><b>If yes, then uploads the details</b></td>
                <td>$UploadsDetails</td>
            </tr>
            <tr>
                <td><b>Similar Product/Solution available in the market</b></td>
                <td>$SimilarProductSolution</td>
            </tr>
            <tr>
                <td><b>View Attachment </b></td>
                <td>$ViewAttachment</td>
            </tr>
            <tr>
                <td><b>Describe Solution </b></td>
                <td>$DescribeSolution</td>
            </tr>
            <tr style="background-color: #0c243e; font-size: 18px; color: #fff;">
                <th colspan="2" align="center">Uploads Document</th>
            </tr>
            <tr>
                <td><b>51% shareholding by Indian citizen</b></td>
                <td>$indian_citizen</td>
            </tr>
            <tr>
                <td><b>ID Proof/ passport of Applicant</b></td>
                <td>$id_proof</td>
            </tr>
        </table>
        <p>I declare that all the information given by me in this application and documents attached hereto are true
        to the best of my knowledge and that I have not willfully suppressed any material fact. I accept that if
        any of the information given by me in this application is in any way false or incorrect, my application
        may be rejected, any offer of the grant may be withdrawn or my candidature may be rejected at any
        time.</p>
EOD;
        $pdf->writeHTML($tbl, true, false, false, false, "");
        $timestamp = date("His");
        $filename = (!empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "default_application") . "_{$timestamp}.pdf";
        $pdf->Output($filename, "D");
    }
    public function generatePDFAndSendEmail($userId)
    {
        require "vendor/autoload.php";
        $getAppointmentDetail = $this->BaseModel->getApplicationPreview($userId)->row();
        $logoImageUrl = base_url("include/custom/img/logo.png");
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("BPR&D");
        $pdf->SetTitle("VIMARSH 2023");
        $pdf->SetSubject("Registration Preview");
        $pdf->SetKeywords("TCoE India(DoT) - BPR&D(MHA) 5G Vimarsh 2023");
        // $pdf->SetHeaderData($logoImageUrl, 30, 'Vimarsh 2023', 'TCoE-India proudly introduces a National Level Hackathon on 5G');
        // $pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
        // $pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
        // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        if (@file_exists(dirname(__FILE__) . "/lang/eng.php")) {
            require_once dirname(__FILE__) . "/lang/eng.php";
            $pdf->setLanguageArray($l);
        }
        $pdf->SetFont("helvetica", "B", 20);
        $pdf->AddPage();
        $pdf->SetFont("helvetica", "", 10);
        $applicationStatus = !empty($getAppointmentDetail->application_status) ? $getAppointmentDetail->application_status : "";
        $statusLabel = "";
        switch ($applicationStatus) {
            case "1":
                $statusLabel = "Pending";
                break;
            case "2":
                $statusLabel = "Approved";
                break;
            case "3":
                $statusLabel = "Rejected";
                break;
            case "4":
                $statusLabel = "Winner";
                break;
            default:
                $statusLabel = "Unknown";
        }
        $applicationId = !empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "";
        $ApplicationStatus = $statusLabel;
        $Name = !empty($getAppointmentDetail->name) ? $getAppointmentDetail->name : "";
        $CompanyEntity = !empty($getAppointmentDetail->company_name) ? $getAppointmentDetail->company_name : "";
        $ContactNo = !empty($getAppointmentDetail->contact_no) ? $getAppointmentDetail->contact_no : "";
        $EmailID = !empty($getAppointmentDetail->email) ? $getAppointmentDetail->email : "";
        $City = !empty($getAppointmentDetail->city) ? $getAppointmentDetail->city : "";
        $State = !empty($getAppointmentDetail->state) ? $getAppointmentDetail->state : "";
        $Phone = !empty($getAppointmentDetail->phone) ? $getAppointmentDetail->phone : "";
        $PostalAddress = !empty($getAppointmentDetail->postal_address) ? $getAppointmentDetail->postal_address : "";
        $ApplyingAsAn = !empty($getAppointmentDetail->applying_as_an) ? $getAppointmentDetail->applying_as_an : "";
        $upload_certificate = !empty($getAppointmentDetail->upload_certificate) ? $getAppointmentDetail->upload_certificate : "";
        $ProblemStatements = !empty($getAppointmentDetail->problem_statements) ? $getAppointmentDetail->problem_statements : "";
        $WebsiteURL = !empty($getAppointmentDetail->website_url) ? $getAppointmentDetail->website_url : "";
        $CompanyTurnover = !empty($getAppointmentDetail->company_turnover) ? $getAppointmentDetail->company_turnover : "";
        $DomainThrustArea = !empty($getAppointmentDetail->domain) ? $getAppointmentDetail->domain : "";
        $BriefAbout = !empty($getAppointmentDetail->brief_solution) ? $getAppointmentDetail->brief_solution : "";
        $technical_details_link = !empty($getAppointmentDetail->technical_details_link) ? $getAppointmentDetail->technical_details_link : "";
        $PowerPointPresentation = !empty($getAppointmentDetail->point_presentation) ? $getAppointmentDetail->point_presentation : "";
        $setPowerPointPresentation = "";

            if ($PowerPointPresentation === "file") {
                $setPowerPointPresentation = $getAppointmentDetail->point_presentationfile;
            }
            else if ($PowerPointPresentation === "link") 
            {
                $setPowerPointPresentation = $getAppointmentDetail->point_presentationlink;
            }
            else
            {
                $setPowerPointPresentation = "None"; 
            }

        $StageofProduct = !empty($getAppointmentDetail->stag_of_product) ? $getAppointmentDetail->stag_of_product : "";
        $ProofforPoC = !empty($getAppointmentDetail->point_presentation) ? $getAppointmentDetail->point_presentation : "";
        $setProofforPoC = "";

        if ($ProofforPoC === "file") {
            $setProofforPoC = $getAppointmentDetail->proof_for_poCFile;
        }
        else if ($ProofforPoC === "link") 
        {
            $setProofforPoC = $getAppointmentDetail->proof_for_poCLink;
        }
        else
        {
            $setProofforPoC = "None"; 
        }
        $HavePatentProduct = !empty($getAppointmentDetail->patent_product) ? $getAppointmentDetail->patent_product : "";
        $PatentApplicationNo = !empty($getAppointmentDetail->application_number) ? $getAppointmentDetail->application_number : "";
        $DateofFiling = !empty($getAppointmentDetail->date_of_filing) ? $getAppointmentDetail->date_of_filing : "";
        $Country = !empty($getAppointmentDetail->country) ? $getAppointmentDetail->country : "";
        $validated = !empty($getAppointmentDetail->validated) ? $getAppointmentDetail->validated : "";
        $setvalidated = "";

        if ($validated === "file") {
            $setvalidated = $getAppointmentDetail->validatedFile;
        }
        else if ($validated === "link") 
        {
            $setvalidated = $getAppointmentDetail->validatedLink;
        }
        else
        {
            $setvalidated = "None"; 
        }
        $UploadsDetails = !empty($getAppointmentDetail->validation_details_link) ? $getAppointmentDetail->validation_details_link : "";
        $SimilarProductSolution = !empty($getAppointmentDetail->similar_product) ? $getAppointmentDetail->similar_product : "";
        $ViewAttachment = !empty($getAppointmentDetail->attachment) ? $getAppointmentDetail->attachment : "";
        $DescribeSolution = !empty($getAppointmentDetail->products_lassifies_as_a_5G) ? $getAppointmentDetail->products_lassifies_as_a_5G : "";
        $indian_citizen = !empty($getAppointmentDetail->indian_citizen) ? $getAppointmentDetail->indian_citizen : "";
        $id_proof = !empty($getAppointmentDetail->id_proof) ? $getAppointmentDetail->id_proof : "";
        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="8" border="1">
            <tr style="background-color: #0c243e; font-size: 18px; color: #fff;">
                <th colspan="2" align="center">Company Profile</th>
            </tr>
            <tr>
                <td><b>Application No.</b></td>
                <td>$applicationId</td>
            </tr>
            <tr>
                <td><b>Application Status</b></td>
                <td>$statusLabel</td>
            </tr>
            <tr>
                <td><b>Name</b></td>
                <td>$Name</td>
            </tr>
            <tr>
                <td><b>Company / Entity Name</b></td>
                <td>$CompanyEntity</td>
            </tr>
            <tr>
                <td><b>Contact No</b></td>
                <td>$ContactNo</td>
            </tr>
            <tr>
                <td><b>Email ID</b></td>
                <td>$EmailID</td>
            </tr>
            <tr>
                <td><b>City</b></td>
                <td>$City</td>
            </tr>
            <tr>
                <td><b>State</b></td>
                <td>$State</td>
            </tr>
            <tr>
                <td><b>Phone</b></td>
                <td>$Phone</td>
            </tr>
            <tr>
                <td><b>Postal Address</b></td>
                <td>$PostalAddress</td>
            </tr>
            <tr>
                <td><b>Applying as an</b></td>
                <td>$ApplyingAsAn</td>
            </tr>
            <tr>
                <td><b>Upload Certificate</b></td>
                <td>$ApplyingAsAn</td>
            </tr>
            
            <tr>
                <td><b>Problem Statements</b></td>
                <td>$ProblemStatements</td>
            </tr>
            <tr>
                <td><b>Website/URL</b></td>
                <td>$WebsiteURL</td>
            </tr>
            <tr>
                <td><b>Company Turnover (Last Financial Year)</b></td>
                <td>$CompanyTurnover</td>
            </tr>
            <tr style="background-color: #0c243e; font-size: 18px; color: #fff;">
                <th colspan="2" align="center">Technical</th>
            </tr>
            <tr>
                <td><b>Domain/Thrust Area</b></td>
                <td>$DomainThrustArea</td>
            </tr>
            <tr>
                <td><b>Brief about your product/solution</b></td>
                <td>$BriefAbout</td>
            </tr>
            <tr>
                <td><b>Uploads the note on Technical Details</b></td>
                <td>$technical_details_link</td>
            </tr>
            <tr>
                <td><b>Please provide the PowerPoint Presentation</b></td>
                <td>$setPowerPointPresentation</td>
            </tr>
            <tr>
                <td><b>Stage of Product</b></td>
                <td>$StageofProduct</td>
            </tr>
            <tr>
                <td><b>Proof for PoC (Video, Picture, etc.)</b></td>
                <td>$setProofforPoC</td>
            </tr>
            <tr>
                <td><b>Have you filed a patent for your product? </b></td>
                <td>$HavePatentProduct</td>
            </tr>
            <tr>
                <td><b>Application No. </b></td>
                <td>$PatentApplicationNo</td>
            </tr>
            <tr>
                <td><b>Date of Filing</b></td>
                <td>$DateofFiling</td>
            </tr>
            <tr>
                <td><b>Country</b></td>
                <td>$Country</td>
            </tr>
            <tr>
                <td><b>Have you validated / Tested your product</b></td>
                <td>$setvalidated</td>
            </tr>
            <tr>
                <td><b>If yes, then uploads the details</b></td>
                <td>$UploadsDetails</td>
            </tr>
            <tr>
                <td><b>Similar Product/Solution available in the market</b></td>
                <td>$SimilarProductSolution</td>
            </tr>
            <tr>
                <td><b>View Attachment </b></td>
                <td>$ViewAttachment</td>
            </tr>
            <tr>
                <td><b>Describe Solution </b></td>
                <td>$DescribeSolution</td>
            </tr>
            <tr style="background-color: #0c243e; font-size: 18px; color: #fff;">
                <th colspan="2" align="center">Uploads Document</th>
            </tr>
            <tr>
                <td><b>51% shareholding by Indian citizen</b></td>
                <td>$indian_citizen</td>
            </tr>
            <tr>
                <td><b>ID Proof/ passport of Applicant</b></td>
                <td>$id_proof</td>
            </tr>
        </table>
        <p>I declare that all the information given by me in this application and documents attached hereto are true
        to the best of my knowledge and that I have not willfully suppressed any material fact. I accept that if
        any of the information given by me in this application is in any way false or incorrect, my application
        may be rejected, any offer of the grant may be withdrawn or my candidature may be rejected at any
        time.</p>
EOD;
        $pdf->writeHTML($tbl, true, false, false, false, "");
        $timestamp = date("His");
        $filename = (!empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "default_application") . "_{$timestamp}.pdf";
        $pdfFilePath = FCPATH . "uploads/temporary/" . $filename;
        $pdf->Output($pdfFilePath, "F");
        $message =
            '<!DOCTYPE html>
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
                    <td><img src="http://bprd.gworkspace.co.in/include/custom/img/logo.png" height="100px" alt="Vimarsh Logo"></td>
                 </tr>
              </table>
              <table class="content inner-content" align="center" cellpadding="0" cellspacing="0" border="0">
                 <tr>
                    <td colspan="2" class="greeting">Dear Mr./Mrs. ' .
            ucwords($getAppointmentDetail->name) .
            ' ,</td>
                 </tr>
                <tr>
                    <td><br></td>
                 </tr>
                 <tr>
                    <td colspan="2" class="greeting">Subject: Registration and Idea Submission Confirmation for VIMARSH 2023</td>
                 </tr>
                 <tr>
                    <td colspan="2" class="instructions">We are pleased to inform you that your registration and idea submission for VIMARSH 2023 have been successfully received. VIMARSH 2023 is a government initiative aimed at promoting innovation and idea generation, and we appreciate your participation in this important endeavor.</td>
                 </tr>
                 <tr>
                    <td><br></td>
                 </tr>
                 <tr>
                    <td><b>Registration and Submission Details</b></td>
                 </tr>
                 <tr>
                    <td><b>Registration Date</b> ' .
            $getAppointmentDetail->modify_datetime .
            '</td>
                 </tr>
                 <tr>
                 <td><b>Application Id</b> ' .
            $getAppointmentDetail->application_id .
            '</td>
              </tr>
                <tr>
                    <td><br></td>
                 </tr>
                 <tr>
                    <th class="regards">Regards</th>
                 </tr>
                 <tr>
                    <th class="regards">Vimarsh 5G Hackathon 2023</th>
                 </tr>
              </table>
              <table width="100%" class="footer">
                 <tr>
                    <td>&copy; ' .
            date("Y") .
            ' Vimarsh . All rights reserved.</td>
                 </tr>
              </table>
           </body>
        </html>
        ';
        $emailSent = $this->mainEmailConfig($getAppointmentDetail->user_id, "Registration and Idea Submission Confirmation for VIMARSH 2023", $message, $cc = "", $pdfFilePath);
        if ($emailSent) {
            return true;
        } else {
            return false;
        }
    }
}
