<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// route for base URL's
$route['default_controller'] = 'BaseController';
$route['sign-up'] = 'BaseController/signUp';
$route['sign-in'] = 'BaseController/signIn';
$route['post-sign-up'] = 'BaseController/postSignUp';
$route['post-sign-in'] = 'BaseController/postSignIn';
$route['forgot-password'] = 'BaseController/resetPassword';
$route['verify-account/(:any)'] = 'BaseController/verifyAccount/$1';
$route['post-forgot-password'] = 'BaseController/postForgotPassword';
$route['post-verify-account'] = 'BaseController/postVerifyAccount';
$route['verify-reset-password/(:any)'] = 'BaseController/verifyResetPassword/$1';
$route['problem-statement'] = 'BaseController/problemStatement';
$route['post-reset-verify-account'] = 'BaseController/postResetVerifyAccount';
$route['resendOTP'] = 'BaseController/resendOTP';
// route for admin
$route['admin-dashboard'] = 'AdminController/adminDashboard';
$route['user-dashboard'] = 'AdminController/userDashboard';
$route['logout'] = 'AdminController/logout';
$route['reports'] = 'AdminController/reports';
$route['registration'] = 'AdminController/registration';
$route['post-company-profile'] = 'AdminController/postCompanyProfile';
$route['post-technical'] = 'AdminController/postTechnical';
$route['post-upload-document'] = 'AdminController/postUploadDocument';
$route['post-final-submit'] = 'AdminController/postFinalSubmit';
$route['application-preview/(:any)'] = 'AdminController/applicationPreview/$1'; 
$route['application-list'] = 'AdminController/applicationList';
$route['approve-application'] = 'AdminController/approveApplication';
$route['reject-application'] = 'AdminController/rejectApplication';
$route['pending-application'] = 'AdminController/pendingApplication';
$route['post-approve-application'] = 'AdminController/postApproveApplication';
$route['post-reject-application'] = 'AdminController/postRejectApplication';
$route['get-comment-data'] = 'AdminController/getCommentData';
$route['update-comment'] = 'AdminController/updateComment';
$route['encryptedfilelocation/(:any)'] = 'AdminController/encryptedfilelocation/$1';
$route['change-password'] = 'AdminController/changePassword';
$route['post-change-password'] = 'AdminController/postChangePassword';
$route['submit-file-upload'] = 'Admin/submitFileUpload';
$route['registered-users'] = 'AdminController/registeredUsers';
$route['change-status/(:any)/(:any)'] = 'Admin/changeStatus/$1/$2';
$route['export-report'] = 'AdminController/exportReport';
$route['post-send-message'] = 'AdminController/postSendMessage';
$route['download-application-preview/(:any)'] = 'AdminController/downloadApplicationPreview/$1';
$route['generatePDF/(:any)'] = 'AdminController/generatePDF/$1';
$route['user-detail/(:any)'] = 'AdminController/userDetail/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;