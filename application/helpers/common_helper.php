<?php defined("BASEPATH") or exit("No direct script access allowed");
function generateSalt($length = 6) {
    $str = "";
    $characters = array_merge(range("A", "Z"), range("a", "z"), range("0", "9"));
    $max = count($characters) - 1;
    for ($i = 0;$i < $length;$i++) {
        $rand = mt_rand(0, $max);
        $str.= $characters[$rand];
    }
    $str = hash("sha512", $str);
    return $str;
}
function AntiFixationInit() {
    $obj = & get_instance();
    $value = generateSalt();
    $obj->load->helper('cookie');
    set_cookie("ci_fixation", $value, 30 * 60);
    $obj->session->ci_fixation = $value;
}
function generateOTP($length = 4) {
    $str = "";
    $characters = array_merge(range("0", "9"));
    $max = count($characters) - 1;
    for ($i = 0;$i < $length;$i++) {
        $rand = mt_rand(0, $max);
        $str.= $characters[$rand];
    }
    return $str;
}
function customEncrypt($string) {
    if ($string === null) {
        $string = '';
        
    }
    $secretKey = 'evbDXau3dj9ASJG3PWundQ==';
    $cipher = 'AES-256-CBC';
    $iv = '!#%&\'()*+,/:;=?@[]';
    $iv = substr(hash('sha256', $iv), 0, 16);
    if (strlen($string) < 80) {
        $string = str_pad($string, 80, ' ', STR_PAD_RIGHT);
    }
    $output = openssl_encrypt($string, $cipher, $secretKey, 0, $iv);
    $output = base64_encode($output);
    return $output;
}
function customDecrypt($string) {
    $secretKey = 'evbDXau3dj9ASJG3PWundQ==';
    $cipher = 'AES-256-CBC';
    $iv = '!#%&\'()*+,/:;=?@[]';
    $iv = substr(hash('sha256', $iv), 0, 16);
    $output = base64_decode($string);
    $output = openssl_decrypt($output, $cipher, $secretKey, 0, $iv);
    $output = rtrim($output);
    return $output;
}
function encryptID($ID)
{
    $encryptionKey = "C!~zNX;HX@.+5j?";
    $encrypted = openssl_encrypt($ID, 'AES-128-ECB', $encryptionKey, OPENSSL_RAW_DATA);
    $encoded = base64_encode($encrypted);
    $IDPart = substr($encoded, 0, 4);
    $keyPart = substr($encryptionKey, -4);
    $encryptedID = $IDPart . $keyPart;
    return $encryptedID;
}

function decryptID($encryptedID)
{
    $encryptionKey = "C!~zNX;HX@.+5j?";
    $IDPart = substr($encryptedID, 0, 4);
    $keyPart = substr($encryptedID, -4);
    $fullEncryptedString = $IDPart . $encryptionKey;
    $decoded = base64_decode($fullEncryptedString);
    $decrypted = openssl_decrypt($decoded, 'AES-128-ECB', $encryptionKey, OPENSSL_RAW_DATA);
    return $decrypted;
}

function hasAccess($userId, $menuItemAccess) {
    $CI = & get_instance();
    $query = $CI->db->where(['UserId' => $userId, 'MenuItemId' => $menuItemAccess])->get('user_menu_access');
    return $query->result_array();
}
function menuItems() {
    $CI = & get_instance();
    $query = $CI->db->get('menu_items')->result_array();
    return $query;
}
function checkLanguage() {
    $CI = & get_instance();
    $query = $CI->db->where(['status' => 1])->get('language')->result_array();
    return $query;
}
function countVisitors() {
    $CI = & get_instance();
    $query = $CI->db->get('visitors')->result_array();
    return $query;
}
function dd($data = null) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die;
}
function pr($data = null) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
function encryptAndPartiallyDisplayEmail($email) {
    $parts = explode('@', $email);
    $username = $parts[0];
    $domain = $parts[1];
    $len = strlen($username);
    $hiddenChars = max(2, ceil($len / 3));
    $hiddenUsername = substr($username, 0, $len - $hiddenChars) . str_repeat('*', $hiddenChars);
    return $hiddenUsername . '@' . $domain;
}
function checkRegistrationStatus($userId) {
    if (empty($userId)) {
        return null;
    }
    $CI = & get_instance();
    $query = $CI->db->where(['user_id' => $userId])->get('form_status');
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return null;
    }
}
function checkFormStep($userId, $Step) {
    if (empty($userId)) {
        return null;
    }
    $CI = & get_instance();
    $query = $CI->db->where(['user_id' => $userId])->get($Step);
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return null;
    }
}
function getAppointmentDetail($userId) {
    if (empty($userId)) {
        return null;
    }
    $CI = & get_instance();
    $CI->db->select('*');
    $CI->db->from('form_status');
    $CI->db->join('form1', 'form_status.user_id = form1.user_id', 'left');
    $CI->db->join('form2', 'form_status.user_id = form2.user_id', 'left');
    $CI->db->join('form3', 'form_status.user_id = form3.user_id', 'left');
    $CI->db->join('login', 'form_status.user_id = login.UserId', 'left');
    if ($userId !== null) {
        $CI->db->where('form_status.user_id', customDecrypt($userId));
    }
    $query = $CI->db->get();
    if ($query->num_rows() > 0) {
        return $query;
    } else {
        return array();
    }
}
