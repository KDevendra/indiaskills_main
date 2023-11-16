<?php
require "vendor/autoload.php";
require_once APPPATH . "helpers/common_helper.php";
class ExportController {
    public function generatePDF($userId) {
        if (class_exists("CI_Controller")) {
            $CI = new CI_Controller();
            $CI->load = new CI_Loader();
        }
        // Load the custom helper using the CodeIgniter instance
        $CI->load->helper("common_helper");
        $getAppointmentDetail = getAppointmentDetail($userId)->row();
        // Create a new TCPDF object
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);
        // Set document information
        $pdf->SetCreator("TCoE India(DoT) - BPR&D(MHA) 5G Vimarsh 2023");
        $pdf->SetAuthor("BPR&D");
        $pdf->SetTitle("VIMARSH 2023");
        $pdf->SetSubject("Registration Preview");
        $pdf->SetKeywords("TCoE India(DoT) - BPR&D(MHA) 5G Vimarsh 2023");
        // Set default header and footer data (if needed)
        // $pdf->SetHeaderData('', PDF_HEADER_LOGO_WIDTH, 'VIMARSH 2023', 'TCoE India(DoT) - BPR&D(MHA) 5G Vimarsh 2023');
        // Set header and footer fonts (if needed)
        // $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        // $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        // Set default monospaced font (if needed)
        // $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        // Set margins (if needed)
        // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        // $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // Add a page
        $pdf->AddPage();
        // Create a function to generate a table with title and value pairs
        function generateTable($pdf, $title, $data) {
            $pdf->SetFont("times", "B", 16);
            // Set title background color and text color
            $pdf->SetFillColor(12, 36, 62); // #0c243e in RGB
            $pdf->SetTextColor(255, 255, 255); // White text color
            // Set the border radius
            $borderRadius = 2;
            // Draw a rectangle with rounded corners for the table title
            $pdf->RoundedRect(10, $pdf->GetY(), 190, 15, $borderRadius, "1111", "DF");
            // Title
            $pdf->Cell(0, 15, $title, 0, 1, "C", true);
            // Reset background and text color to default
            $pdf->SetFillColor(255, 255, 255); // Reset background color to white
            $pdf->SetTextColor(0, 0, 0); // Reset text color to black
            // Set font for content
            $pdf->SetFont("times", "", 12);
            // Define columns
            $col1X = 10;
            $col2X = 90;
            // Create table with title and value pairs
            foreach ($data as $title => $value) {
                $pdf->SetX($col1X);
                $pdf->Cell(0, 10, $title, 1); // Add a border around the cell
                $pdf->SetX($col2X);
                $pdf->Cell(0, 10, $value, 1); // Add a border around the cell
                $pdf->Ln(); // Move to the next line
                
            }
        }
        $applicationStatus = !empty($getAppointmentDetail->application_status) ? $getAppointmentDetail->application_status : "";
        $statusLabel = "";
        switch ($applicationStatus) {
            case '1':
                $statusLabel = 'Pending';
            break;
            case '2':
                $statusLabel = 'Approved';
            break;
            case '3':
                $statusLabel = 'Rejected';
            break;
            case '4':
                $statusLabel = 'Winner';
            break;
            default:
                $statusLabel = 'Unknown';
        }
        // Define data for the Company Profile section
        $companyProfileData = ["Application No.:" => !empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "", "Application Status:" => $statusLabel, "Name:" => !empty($getAppointmentDetail->name) ? $getAppointmentDetail->name : "", "Company / Entity Name:" => !empty($getAppointmentDetail->company_name) ? $getAppointmentDetail->company_name : "", "Contact No:" => !empty($getAppointmentDetail->contact_no) ? $getAppointmentDetail->contact_no : "", "Email ID:" => !empty($getAppointmentDetail->email) ? $getAppointmentDetail->email : "", "City:" => !empty($getAppointmentDetail->city) ? $getAppointmentDetail->city : "", "State:" => !empty($getAppointmentDetail->state) ? $getAppointmentDetail->state : "", "Phone:" => !empty($getAppointmentDetail->phone) ? $getAppointmentDetail->phone : "", "Postal Address:" => !empty($getAppointmentDetail->postal_address) ? $getAppointmentDetail->postal_address : "", "Applying as an:" => !empty($getAppointmentDetail->applying_as_an) ? $getAppointmentDetail->applying_as_an : "", "Problem Statements:" => !empty($getAppointmentDetail->problem_statements) ? $getAppointmentDetail->problem_statements : "", "Website/URL:" => !empty($getAppointmentDetail->website_url) ? $getAppointmentDetail->website_url : "", "Company Turnover: (Last Financial Year)" => !empty($getAppointmentDetail->company_turnover) ? $getAppointmentDetail->company_turnover : "", ];
        // Generate the Company Profile table
        generateTable($pdf, "Company Profile", $companyProfileData);
        // Add a top margin of 20 pixels between tables
        $pdf->SetY($pdf->GetY() + 20);
        // Define data for the Technical section
        $technicalData = ["Domain/Thrust Area:" => !empty($getAppointmentDetail->domain) ? $getAppointmentDetail->domain : "", "Brief about your product/solution:" => !empty($getAppointmentDetail->brief_solution) ? $getAppointmentDetail->brief_solution : "", "uploads the note on Technical Details:" => empty($getAppointmentDetail->technical_details_link) ? $getAppointmentDetail->technical_details_link : "", "Please provide the PowerPoint Presentation" => !empty($getAppointmentDetail->point_presentation) ? $getAppointmentDetail->point_presentation : "", "Stage of Product:" => !empty($getAppointmentDetail->stag_of_product) ? $getAppointmentDetail->stag_of_product : "", "Proof for PoC (Video, Picture, etc.):" => !empty($getAppointmentDetail->stag_of_product) ? $getAppointmentDetail->stag_of_product : "", "Have you filed a patent for your product?" => !empty($getAppointmentDetail->patent_product) ? $getAppointmentDetail->patent_product : "", "Application No." => !empty($getAppointmentDetail->application_number) ? $getAppointmentDetail->application_number : "", "Date of Filing:" => !empty($getAppointmentDetail->date_of_filing) ? $getAppointmentDetail->date_of_filing : "", "Country:" => !empty($getAppointmentDetail->country) ? $getAppointmentDetail->country : "", "Have you validated / Tested your product:" => !empty($getAppointmentDetail->validated) ? $getAppointmentDetail->validated : "", "If yes, then uploads the details:" => !empty($getAppointmentDetail->advantage_details_link) ? $getAppointmentDetail->advantage_details_link : "", "Similar Product/Solution available in the market:" => !empty($getAppointmentDetail->similar_product) ? $getAppointmentDetail->similar_product : "", "View Attachment :" => !empty($getAppointmentDetail->attachment) ? base_url('uploads/') . $getAppointmentDetail->attachment : "", "Describe Solution :" => !empty($getAppointmentDetail->products_lassifies_as_a_5G) ? $getAppointmentDetail->products_lassifies_as_a_5G : "", ];
        // Generate the Technical table
        generateTable($pdf, "Technical", $technicalData);
        // Add a top margin of 20 pixels between tables
        $pdf->SetY($pdf->GetY() + 20);
        // Define data for the Technical section
        $technicalData = ["51% shareholding by Indian citizen :" => !empty($getAppointmentDetail->indian_citizen) ? base_url('uploads/') . $getAppointmentDetail->indian_citizen : "", "ID Proof/ passport of Applicant:" => !empty($getAppointmentDetail->id_proof) ? base_url('uploads/') . $getAppointmentDetail->id_proof : "", ];
        // Generate the Technical table
        generateTable($pdf, "Uploads Document", $technicalData);
        $pdf->SetY($pdf->GetY() + 5);
        // Create a custom checkbox symbol
        $customCheckbox = "*"; // You can use any Unicode character that represents a checkbox
        // Add the checkbox symbol and statement
        $pdf->Cell(10, 10, $customCheckbox, 0, 0, "C", false);
        $pdf->MultiCell(0, 20, "I declare that all the information given by me in this application and documents attached hereto are true to the best of my knowledge and that I have not willfully suppressed any material fact. I accept that if any of the information given by me in this application is in any way false or incorrect, my application may be rejected, any offer of the grant may be withdrawn or my candidature may be rejected at any time.", 0, "L");
        // Output the PDF
        $timestamp = date('His');
        // Construct the filename with the timestamp
        $filename = (!empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "default_application") . "_{$timestamp}.pdf";
        // Output the PDF with the specified filename
        $pdf->Output($filename, "D");
    }
    public function generatePDFAndSendEmail($userId) {
        if (class_exists("CI_Controller")) {
            $CI = new CI_Controller();
            $CI->load = new CI_Loader();
        }
    
        // Load the custom helper using the CodeIgniter instance
        $CI->load->helper("common_helper");
        $getAppointmentDetail = getAppointmentDetail($userId)->row();
    
        // ... Rest of your code to generate the PDF ...
    
        // Construct the filename with the timestamp
        $timestamp = date('His');
        $filename = (!empty($getAppointmentDetail->application_id) ? $getAppointmentDetail->application_id : "default_application") . "_{$timestamp}.pdf";
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);
        // Save the PDF to a temporary directory
        $pdf->Output($filename, "F");
    
        // Email configuration
        $CI->load->library('email');
        $config = array('protocol' => 'smtp', 'smtp_host' => 'mail.digitalduniya.com', 'smtp_port' => 465, 'smtp_user' => 'info@digitalduniya.com', 'smtp_pass' => 'TcoeIndia@12345', 'smtp_crypto' => 'ssl', 'mailtype' => 'html', 'crlf' => "\r\n", 'newline' => "\r\n", 'charset' => 'utf-8', 'wordwrap' => true);
    
        $CI->email->initialize($config);
        $CI->email->from($config['smtp_user']);
        $CI->email->to($getAppointmentDetail->email);
        $CI->email->subject('Your VIMARSH 2023 Application PDF');
        $CI->email->message('Please find the attached PDF for your VIMARSH 2023 application.');
    
        // Attach the generated PDF
        $pdfFilePath = FCPATH . $filename;  // Use the correct path to the PDF
        $CI->email->attach($pdfFilePath);
    
        if ($CI->email->send()) {
            // Email sent successfully
            // Clean up: remove the temporary PDF file
            unlink($pdfFilePath);
            return true;
        } else {
            // Email sending failed
            // Clean up: remove the temporary PDF file
            unlink($pdfFilePath);
            return false;
        }
    }
    
}
