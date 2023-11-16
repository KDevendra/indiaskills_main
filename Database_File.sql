-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for admintea_team365
CREATE DATABASE IF NOT EXISTS `admintea_team365` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `admintea_team365`;

-- Dumping structure for table admintea_team365.account_details
CREATE TABLE IF NOT EXISTS `account_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(50) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `acc_holder_name` varchar(250) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `register_mobile` varchar(30) NOT NULL,
  `upi_id` varchar(50) NOT NULL,
  `bank_country` varchar(50) NOT NULL,
  `enable_payment` tinyint(1) NOT NULL DEFAULT '0',
  `terms_condition` longtext NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.admin_users
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) NOT NULL,
  `sub_domain` varchar(250) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_mobile` bigint NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `activation_code` varchar(10) NOT NULL,
  `mo_activation_code` varchar(10) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `company_address` longtext NOT NULL,
  `zipcode` int NOT NULL,
  `company_mobile` bigint NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_website` varchar(50) NOT NULL,
  `company_gstin` varchar(50) NOT NULL,
  `pan_number` varchar(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `company_logo` longtext NOT NULL,
  `signature_img` varchar(300) NOT NULL,
  `terms_condition_customer` longtext NOT NULL,
  `terms_condition_seller` longtext NOT NULL,
  `invoice_declaration` text NOT NULL,
  `password_key` varchar(50) NOT NULL,
  `sub_domain_login` varchar(250) NOT NULL,
  `your_plan_id` int NOT NULL,
  `password_key_valid_untill` datetime DEFAULT NULL,
  `license_activation_date` date NOT NULL,
  `invoice_license_active_date` timestamp NULL DEFAULT NULL,
  `license_expiration_date` date NOT NULL,
  `invoice_license_exp_date` timestamp NULL DEFAULT NULL,
  `trial_end_date` date NOT NULL,
  `activation_date` datetime DEFAULT NULL,
  `license_type` varchar(100) NOT NULL,
  `invoice_license_type` varchar(100) NOT NULL,
  `invoice_account_type` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `partner_name` varchar(200) NOT NULL,
  `license_duration` varchar(20) NOT NULL,
  `invoice_license_duration` varchar(50) NOT NULL,
  `total_licence` int NOT NULL,
  `invoice_lic_amnt` int NOT NULL,
  `basic_lic_amnt` int NOT NULL,
  `business_lic_amnt` int NOT NULL,
  `enterprise_lic_amnt` int NOT NULL,
  `user_image` longtext NOT NULL,
  `create_user` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_user` tinyint(1) NOT NULL DEFAULT '1',
  `delete_user` tinyint(1) NOT NULL DEFAULT '1',
  `update_user` tinyint(1) NOT NULL DEFAULT '1',
  `create_org` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_org` tinyint(1) NOT NULL DEFAULT '1',
  `update_org` tinyint(1) NOT NULL DEFAULT '1',
  `delete_org` tinyint(1) NOT NULL DEFAULT '1',
  `create_contact` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_contact` tinyint(1) NOT NULL DEFAULT '1',
  `update_contact` tinyint(1) NOT NULL DEFAULT '1',
  `delete_contact` tinyint(1) NOT NULL DEFAULT '1',
  `create_lead` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_lead` tinyint(1) NOT NULL DEFAULT '1',
  `update_lead` tinyint(1) NOT NULL DEFAULT '1',
  `delete_lead` tinyint(1) NOT NULL DEFAULT '1',
  `create_opp` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_opp` tinyint(1) NOT NULL DEFAULT '1',
  `update_opp` tinyint(1) NOT NULL DEFAULT '1',
  `delete_opp` tinyint(1) NOT NULL DEFAULT '1',
  `create_quote` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_quote` tinyint(1) NOT NULL DEFAULT '1',
  `update_quote` tinyint(1) NOT NULL DEFAULT '1',
  `delete_quote` tinyint(1) NOT NULL DEFAULT '1',
  `create_so` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_so` tinyint(1) NOT NULL DEFAULT '1',
  `update_so` tinyint(1) NOT NULL DEFAULT '1',
  `delete_so` tinyint(1) NOT NULL DEFAULT '1',
  `create_vendor` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_vendor` tinyint(1) NOT NULL DEFAULT '1',
  `update_vendor` tinyint(1) NOT NULL DEFAULT '1',
  `delete_vendor` tinyint(1) NOT NULL DEFAULT '1',
  `create_product` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_product` tinyint(1) NOT NULL DEFAULT '1',
  `update_product` tinyint(1) NOT NULL DEFAULT '1',
  `delete_product` tinyint(1) NOT NULL DEFAULT '1',
  `create_po` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_po` tinyint(1) NOT NULL DEFAULT '1',
  `update_po` tinyint(1) NOT NULL DEFAULT '1',
  `delete_po` tinyint(1) NOT NULL DEFAULT '1',
  `create_inv` tinyint(1) NOT NULL DEFAULT '1',
  `retrieve_inv` tinyint(1) NOT NULL DEFAULT '1',
  `create_pi` int NOT NULL DEFAULT '1',
  `update_pi` int NOT NULL DEFAULT '1',
  `retrieve_pi` int NOT NULL DEFAULT '1',
  `delete_pi` int NOT NULL DEFAULT '1',
  `update_inv` tinyint(1) NOT NULL DEFAULT '1',
  `delete_inv` tinyint(1) NOT NULL DEFAULT '1',
  `login_count` int NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1',
  `current_session` int NOT NULL,
  `online` int NOT NULL,
  `reference_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1365 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.api_detail
CREATE TABLE IF NOT EXISTS `api_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(250) NOT NULL,
  `api_name` varchar(250) NOT NULL,
  `api_key` varchar(300) NOT NULL,
  `site_mobile` varchar(15) NOT NULL,
  `api_url` text NOT NULL,
  `site_userid` varchar(400) NOT NULL,
  `site_profileid` varchar(400) NOT NULL,
  `currentdate` datetime NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `delete_status` int NOT NULL,
  `updated_date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.become_partner
CREATE TABLE IF NOT EXISTS `become_partner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Company_name` varchar(255) NOT NULL,
  `Official_website` varchar(255) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Email_first` varchar(255) NOT NULL,
  `Email_second` varchar(255) NOT NULL,
  `Telephone_no` varchar(20) NOT NULL,
  `Mobile_no` bigint NOT NULL,
  `Country` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Language` varchar(255) NOT NULL,
  `Fax` int NOT NULL,
  `Zip_code` int NOT NULL,
  `Address` longtext NOT NULL,
  `Main_business` text NOT NULL,
  `GST_id` varchar(30) NOT NULL,
  `Customer_structure` text NOT NULL,
  `Numberof_empl` varchar(50) NOT NULL,
  `Marketing_channel` varchar(255) NOT NULL,
  `products` varchar(255) NOT NULL,
  `Team365` varchar(255) DEFAULT NULL,
  `Messages` longtext NOT NULL,
  `Currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` int NOT NULL,
  `IP` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1156 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `blog_tag` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `blog_heading` varchar(200) NOT NULL,
  `blog_image` varchar(200) NOT NULL,
  `meta_title` varchar(200) NOT NULL,
  `seo_title` varchar(100) NOT NULL,
  `meta_tag` varchar(100) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `meta_desc` text NOT NULL,
  `short_description` text NOT NULL,
  `long_description` longtext NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `delete_status` int NOT NULL DEFAULT '1',
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.call_log
CREATE TABLE IF NOT EXISTS `call_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(150) NOT NULL,
  `session_company` varchar(150) NOT NULL,
  `session_comp_email` varchar(150) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `caller_no` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int NOT NULL AUTO_INCREMENT,
  `session_comp_email` varchar(200) NOT NULL,
  `sender_userid` int NOT NULL,
  `reciever_userid` int NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.chats
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `sess_name` varchar(50) NOT NULL,
  `entry_id` varchar(50) NOT NULL,
  `messages` longtext NOT NULL,
  `currentdate` date NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.chat_login_details
CREATE TABLE IF NOT EXISTS `chat_login_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_typing` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.chat_users
CREATE TABLE IF NOT EXISTS `chat_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `sess_eml` varchar(250) NOT NULL,
  `session_company` varchar(250) NOT NULL,
  `session_comp_email` varchar(250) NOT NULL,
  `userid` int NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `current_session` int NOT NULL,
  `online` int NOT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `state_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48357 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `added_by` varchar(250) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `contact_id` varchar(50) NOT NULL,
  `contact_owner` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `org_id` int NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  `office_phone` bigint NOT NULL,
  `dob` varchar(30) NOT NULL,
  `fax` bigint NOT NULL,
  `title` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `cust_status` varchar(100) NOT NULL,
  `report_to` varchar(50) NOT NULL,
  `secondary_email` varchar(50) NOT NULL,
  `assigned_to` varchar(50) NOT NULL,
  `twitter_username` varchar(50) NOT NULL,
  `sla_name` varchar(50) DEFAULT NULL,
  `contact_type` varchar(50) NOT NULL,
  `contact_status` varchar(50) NOT NULL,
  `referred_by` varchar(50) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_address` longtext NOT NULL,
  `description` longtext NOT NULL,
  `currentdate` date NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3515 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.create_call
CREATE TABLE IF NOT EXISTS `create_call` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `opportunity_id` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `from_date` varchar(30) NOT NULL,
  `from_time` varchar(20) NOT NULL DEFAULT '0',
  `to_date` varchar(30) NOT NULL,
  `to_time` varchar(20) NOT NULL,
  `particepants` longtext NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `call_subject` varchar(200) NOT NULL,
  `call_purpose` varchar(100) NOT NULL,
  `related_to` varchar(100) NOT NULL,
  `call_type` varchar(100) NOT NULL,
  `call_detail` varchar(400) NOT NULL,
  `call_description` text NOT NULL,
  `reminder` varchar(50) NOT NULL,
  `reminder_status` int NOT NULL DEFAULT '1',
  `remarks` text NOT NULL,
  `currentdate` date NOT NULL,
  `delete_status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.customer_activity
CREATE TABLE IF NOT EXISTS `customer_activity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `activity_id` int NOT NULL,
  `activity_name` varchar(250) NOT NULL,
  `delete_status` int NOT NULL,
  `currentdate` varchar(30) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4217 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.customer_email
CREATE TABLE IF NOT EXISTS `customer_email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `owner` varchar(150) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `email_adress` varchar(200) NOT NULL,
  `subject` varchar(400) NOT NULL,
  `cc_email` varchar(200) NOT NULL,
  `email_body` text NOT NULL,
  `delete_status` int NOT NULL,
  `currentdate` varchar(30) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.customer_note
CREATE TABLE IF NOT EXISTS `customer_note` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `owner` varchar(150) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `delete_status` int NOT NULL,
  `currentdate` varchar(30) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.email_automation
CREATE TABLE IF NOT EXISTS `email_automation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `email_cc` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `read_status` int NOT NULL DEFAULT '0',
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `subscription_status` int NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.email_from_csv
CREATE TABLE IF NOT EXISTS `email_from_csv` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session_comp_email` varchar(150) NOT NULL,
  `eamil` varchar(200) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `sent_status` int NOT NULL DEFAULT '0',
  `csv_file_name` varchar(100) NOT NULL,
  `path_name` varchar(400) NOT NULL,
  `template_name` varchar(150) NOT NULL,
  `sent_date` varchar(30) NOT NULL DEFAULT '0',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.enquiry
CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(250) NOT NULL,
  `requirement` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.external_po
CREATE TABLE IF NOT EXISTS `external_po` (
  `id` int NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) NOT NULL,
  `th_stamp_company` varchar(100) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `your_name` varchar(150) NOT NULL,
  `company_address` varchar(250) NOT NULL,
  `company_city_state` varchar(150) NOT NULL,
  `company_country` varchar(100) NOT NULL,
  `th_vendor_details` varchar(100) NOT NULL,
  `vendor_company` varchar(150) NOT NULL,
  `vendor_address` text NOT NULL,
  `vendor_city_state` varchar(150) NOT NULL,
  `vendor_country` varchar(100) NOT NULL,
  `th_po_id` varchar(50) NOT NULL,
  `po_id` varchar(50) NOT NULL,
  `th_order_date` varchar(50) NOT NULL,
  `order_date` varchar(50) NOT NULL,
  `th_delivery_date` varchar(50) NOT NULL,
  `delivery_date` varchar(30) NOT NULL,
  `th_product` varchar(50) NOT NULL,
  `th_qty` varchar(50) NOT NULL,
  `th_rate` varchar(50) NOT NULL,
  `th_amount` varchar(50) NOT NULL,
  `product` varchar(300) NOT NULL,
  `product_qty` varchar(300) NOT NULL,
  `product_rate` varchar(300) NOT NULL,
  `product_amount` varchar(300) NOT NULL,
  `th_sub_total` varchar(50) NOT NULL,
  `sub_total` varchar(50) NOT NULL,
  `th_tax` varchar(30) NOT NULL,
  `th_tax_perc` varchar(50) NOT NULL,
  `tax_price` varchar(50) NOT NULL,
  `th_final_total` varchar(50) NOT NULL,
  `final_total` varchar(50) NOT NULL,
  `th_note` varchar(50) NOT NULL,
  `note_value` text NOT NULL,
  `th_terms` varchar(50) NOT NULL,
  `terms_value` text NOT NULL,
  `logo` varchar(300) NOT NULL,
  `stamp` varchar(300) NOT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `ip` varchar(30) NOT NULL,
  `currentdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.fb_app_detail
CREATE TABLE IF NOT EXISTS `fb_app_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `comp_id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `fb_app_id` varchar(300) NOT NULL,
  `fb_secret_key` text NOT NULL,
  `fb_access_token` text NOT NULL,
  `fb_app_version` varchar(10) NOT NULL,
  `fb_form_id` varchar(300) NOT NULL,
  `fb_page_id` varchar(300) NOT NULL,
  `fb_form_name` varchar(300) NOT NULL,
  `fb_form_status` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `created_date` varchar(30) NOT NULL,
  `updated_date` varchar(30) NOT NULL,
  `delete_status` int NOT NULL,
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.gst
CREATE TABLE IF NOT EXISTS `gst` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(255) NOT NULL,
  `session_company` varchar(255) NOT NULL,
  `session_comp_email` varchar(255) NOT NULL,
  `tax_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `collection_of_sale` tinyint(1) DEFAULT '0',
  `collection_of_purchases` tinyint(1) DEFAULT '0',
  `gst_percentage` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_date` date NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.inventory_data
CREATE TABLE IF NOT EXISTS `inventory_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `inventory_name` varchar(300) NOT NULL,
  `sku` varchar(150) NOT NULL,
  `hsn_code` varchar(150) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `category` varchar(150) NOT NULL,
  `sale_price` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `income_account` varchar(150) NOT NULL,
  `asset_account` varchar(150) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `reverse_charge` varchar(50) NOT NULL,
  `preferred_supplier` varchar(200) NOT NULL,
  `stock_alert` varchar(50) NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `created_by` varchar(200) NOT NULL,
  `created_name` varchar(200) NOT NULL,
  `created_date` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  `updated_date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `supplier_ref` varchar(50) NOT NULL,
  `other_ref` varchar(50) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `shipping_address` longtext NOT NULL,
  `buyer_ord_no` varchar(50) NOT NULL,
  `po_date` date NOT NULL,
  `delivery_note` varchar(500) NOT NULL,
  `payment_mode` varchar(500) NOT NULL,
  `dispatch_doc_no` varchar(50) NOT NULL,
  `delivery_note_date` date NOT NULL,
  `dispatched_thrg` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `lr_rr_no` varchar(50) NOT NULL,
  `motor_vehicle_no` varchar(50) NOT NULL,
  `terms_delivery` longtext NOT NULL,
  `product_name` varchar(5000) NOT NULL,
  `hsn_sac` varchar(500) NOT NULL,
  `sku` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `initial_total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `after_discount` decimal(10,2) NOT NULL,
  `igst18` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `delay_interest` decimal(10,2) NOT NULL,
  `attached_file` longtext NOT NULL,
  `terms_condition` longtext NOT NULL,
  `tds_declaration` longtext NOT NULL,
  `currentdate` date NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `igst12` decimal(15,2) NOT NULL,
  `igst28` decimal(15,2) NOT NULL,
  `cgst6` decimal(15,2) NOT NULL,
  `sgst6` decimal(15,2) NOT NULL,
  `cgst9` decimal(15,2) NOT NULL,
  `sgst9` decimal(15,2) NOT NULL,
  `cgst14` decimal(15,2) NOT NULL,
  `sgst14` decimal(15,2) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `percent` varchar(500) NOT NULL,
  `total_percent` decimal(15,2) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.invoices
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(50) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `so_owner` varchar(100) NOT NULL,
  `saleorder_id` varchar(100) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `buyer_date` varchar(30) NOT NULL,
  `inv_terms` varchar(200) NOT NULL,
  `extra_field_label` varchar(255) NOT NULL,
  `extra_field_value` varchar(255) NOT NULL,
  `cust_id` int NOT NULL,
  `org_name` varchar(250) NOT NULL,
  `cust_order_no` varchar(200) NOT NULL,
  `invoice_declaration` text NOT NULL,
  `declaration_status` int NOT NULL,
  `branch_id` int NOT NULL,
  `notes` text NOT NULL,
  `attachment` text NOT NULL,
  `signature_img` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `pro_description` text NOT NULL,
  `enquiry_email` varchar(200) NOT NULL,
  `enquiry_mobile` varchar(50) NOT NULL,
  `product_name` longtext NOT NULL,
  `hsn_sac` varchar(500) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `sgst` varchar(500) NOT NULL,
  `cgst` varchar(500) NOT NULL,
  `igst` varchar(500) NOT NULL,
  `sub_total_with_gst` varchar(500) NOT NULL,
  `total_igst` varchar(200) NOT NULL,
  `total_cgst` varchar(200) NOT NULL,
  `total_sgst` varchar(200) NOT NULL,
  `pro_discount` varchar(200) NOT NULL,
  `extra_charge_label` text NOT NULL,
  `extra_charge_value` varchar(500) NOT NULL,
  `terms_condition` longtext NOT NULL,
  `total_discount` decimal(15,2) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `initial_total` decimal(15,2) NOT NULL,
  `sub_total` decimal(15,2) NOT NULL,
  `advanced_payment` int NOT NULL,
  `pending_payment` int NOT NULL,
  `jurisdiction` varchar(150) NOT NULL,
  `late_charge` varchar(50) NOT NULL,
  `pi_status` int NOT NULL DEFAULT '1',
  `delete_status` int NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.invoice_terms
CREATE TABLE IF NOT EXISTS `invoice_terms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(55) NOT NULL,
  `session_company` varchar(55) NOT NULL,
  `session_comp_email` varchar(55) NOT NULL,
  `inv_terms` varchar(255) NOT NULL,
  `inv_value` varchar(55) NOT NULL,
  `marks_default` tinyint(1) NOT NULL DEFAULT '0',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.keys
CREATE TABLE IF NOT EXISTS `keys` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.lead
CREATE TABLE IF NOT EXISTS `lead` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `lead_id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_id` int NOT NULL,
  `cont_id` int NOT NULL,
  `lead_owner` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint NOT NULL,
  `office_phone` bigint NOT NULL,
  `assigned` bigint NOT NULL,
  `website` varchar(20) NOT NULL,
  `lead_source` varchar(50) NOT NULL,
  `lead_status` varchar(50) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `employees` int NOT NULL,
  `annual_revenue` bigint NOT NULL,
  `rating` varchar(50) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `secondary_email` varchar(50) NOT NULL,
  `assigned_to` varchar(100) NOT NULL,
  `assigned_to_name` varchar(50) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `shipping_address` longtext NOT NULL,
  `description` longtext NOT NULL,
  `product_name` longtext NOT NULL,
  `quantity` longtext NOT NULL,
  `unit_price` longtext NOT NULL,
  `total` longtext NOT NULL,
  `percent` longtext NOT NULL,
  `initial_total` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total_percent` decimal(10,2) NOT NULL,
  `pro_description` text NOT NULL,
  `currentdate` date NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `assigned_status` tinyint(1) NOT NULL DEFAULT '0',
  `track_status` varchar(150) NOT NULL,
  `opportunity_id` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1174 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.licence_detail
CREATE TABLE IF NOT EXISTS `licence_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `sess_eml` varchar(300) NOT NULL,
  `session_company` varchar(300) NOT NULL,
  `session_comp_email` varchar(300) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `plan_id` varchar(20) NOT NULL,
  `plan_licence` int NOT NULL,
  `plan_price` int NOT NULL,
  `used_licence` int NOT NULL,
  `licence_act_date` varchar(50) NOT NULL,
  `licence_exp_date` varchar(50) NOT NULL,
  `licence_type` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currentdate` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `delete_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.mail_config
CREATE TABLE IF NOT EXISTS `mail_config` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(50) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `email_password` varchar(50) NOT NULL,
  `smtp_host` varchar(200) NOT NULL,
  `encryption_type` varchar(50) NOT NULL,
  `folder_name` varchar(50) NOT NULL,
  `gmail_port` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `default_setting` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.master_reference
CREATE TABLE IF NOT EXISTS `master_reference` (
  `id` int NOT NULL AUTO_INCREMENT,
  `referral_code` varchar(10) NOT NULL,
  `reference_name` varchar(255) DEFAULT NULL,
  `referral_valid_from` date DEFAULT NULL,
  `referral_valid_to` date DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `reference_description` text,
  `status` int NOT NULL,
  `created_date` date DEFAULT NULL,
  `modified_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.meeting
CREATE TABLE IF NOT EXISTS `meeting` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `opportunity_id` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `meeting_title` varchar(200) NOT NULL,
  `host_name` varchar(200) NOT NULL,
  `location` varchar(300) NOT NULL,
  `all_day` varchar(20) NOT NULL,
  `from_date` varchar(30) NOT NULL,
  `from_time` varchar(20) NOT NULL DEFAULT '0',
  `to_date` varchar(30) NOT NULL DEFAULT '0',
  `to_time` varchar(30) NOT NULL,
  `particepants` varchar(400) NOT NULL,
  `reminder` varchar(30) NOT NULL,
  `reminder_status` int NOT NULL DEFAULT '1',
  `remarks` text NOT NULL,
  `currentdate` date NOT NULL,
  `delete_status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.meta_tag
CREATE TABLE IF NOT EXISTS `meta_tag` (
  `id` int NOT NULL AUTO_INCREMENT,
  `meta_title` varchar(255) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `comp_id` int NOT NULL,
  `user_id` int NOT NULL,
  `opp_id` varchar(50) NOT NULL,
  `quote_id` varchar(50) NOT NULL,
  `so_id` varchar(50) NOT NULL,
  `po_id` varchar(50) NOT NULL,
  `renewal_id` int NOT NULL,
  `noti_for` text NOT NULL,
  `seen_status` int NOT NULL,
  `push_noti_status` int NOT NULL,
  `user_type` varchar(150) NOT NULL,
  `status` int NOT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `created_date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6384 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.offer
CREATE TABLE IF NOT EXISTS `offer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(200) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `banner_name` varchar(200) NOT NULL,
  `status` int NOT NULL,
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.opportunity
CREATE TABLE IF NOT EXISTS `opportunity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `opportunity_id` varchar(50) NOT NULL,
  `lead_id` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `assigned_to` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_id` int NOT NULL,
  `cont_id` int NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `expclose_date` varchar(50) NOT NULL,
  `pipeline` varchar(50) NOT NULL,
  `stage` varchar(50) NOT NULL,
  `lead_source` varchar(50) NOT NULL,
  `next_step` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `probability` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `employees` bigint NOT NULL,
  `weighted_revenue` bigint NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint NOT NULL,
  `lost_reason` varchar(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  `product_name` longtext NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `percent` varchar(500) NOT NULL,
  `initial_total` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `sub_total` decimal(15,2) NOT NULL,
  `total_percent` decimal(10,2) NOT NULL,
  `pro_description` text NOT NULL,
  `currentdate` date NOT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `track_status` varchar(150) NOT NULL,
  `create_so_date` varchar(30) NOT NULL,
  `so_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4884 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.opp_task
CREATE TABLE IF NOT EXISTS `opp_task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `opportunity_id` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `org_id` int NOT NULL,
  `contact_id` int NOT NULL,
  `contact_name` varchar(200) NOT NULL,
  `task_owner` varchar(150) NOT NULL,
  `task_subject` varchar(300) NOT NULL,
  `task_from_date` varchar(30) NOT NULL,
  `task_due_date` varchar(30) NOT NULL,
  `from_time` varchar(30) NOT NULL,
  `to_time` varchar(30) NOT NULL,
  `asign_to` varchar(400) NOT NULL,
  `task_priority` varchar(100) NOT NULL,
  `task_reminder` int NOT NULL DEFAULT '0',
  `task_repeat` int NOT NULL DEFAULT '0',
  `remarks` text NOT NULL,
  `currentdate` date NOT NULL,
  `delete_status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.organization
CREATE TABLE IF NOT EXISTS `organization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `added_by` varchar(250) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `organization_id` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `customer_type` varchar(150) NOT NULL,
  `primary_contact` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `office_phone` bigint NOT NULL,
  `mobile` bigint NOT NULL,
  `employees` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `annual_revenue` varchar(50) NOT NULL,
  `ownership` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `cust_types` varchar(200) NOT NULL,
  `assigned_to` varchar(50) NOT NULL,
  `sic_code` varchar(50) DEFAULT NULL,
  `sla_name` varchar(50) DEFAULT NULL,
  `region` varchar(50) NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `panno` varchar(50) NOT NULL,
  `org_status` varchar(100) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_address` longtext NOT NULL,
  `description` longtext NOT NULL,
  `currentdate` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `customer_status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3365 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.partner
CREATE TABLE IF NOT EXISTS `partner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `partner_id` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `org_name` varchar(500) NOT NULL,
  `gstin` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` bigint NOT NULL,
  `website` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activation_code` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `license_activation_date` date NOT NULL,
  `license_expiration_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.payment_details
CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `payment_id` varchar(50) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `licence_type` varchar(50) NOT NULL,
  `licence_duration` varchar(30) NOT NULL,
  `price_per_licence` decimal(15,2) NOT NULL,
  `total_licence` int NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `total_gst` decimal(15,2) NOT NULL,
  `final_price` decimal(15,2) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.payment_history
CREATE TABLE IF NOT EXISTS `payment_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `sales_id` varchar(50) NOT NULL,
  `invoice_id` int NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `total_payment` varchar(500) NOT NULL,
  `adv_payment` varchar(500) NOT NULL,
  `pending_payment` varchar(500) NOT NULL,
  `remarks` text NOT NULL,
  `curentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_date` varchar(30) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `delete_status` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.performa_invoice
CREATE TABLE IF NOT EXISTS `performa_invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(50) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `page_id` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date NOT NULL,
  `extraField_label` varchar(255) NOT NULL,
  `extraField_value` varchar(255) NOT NULL,
  `business_logo` varchar(100) NOT NULL,
  `billedto_orgname` varchar(100) NOT NULL,
  `billedby_branchid` varchar(100) NOT NULL,
  `client_bname` varchar(255) NOT NULL,
  `client_address` text NOT NULL,
  `client_country` varchar(100) NOT NULL,
  `client_state` varchar(50) NOT NULL,
  `client_city` varchar(50) NOT NULL,
  `client_zipcode` varchar(50) NOT NULL,
  `client_gst` varchar(100) NOT NULL,
  `challan_number` varchar(200) NOT NULL,
  `select_date` date NOT NULL,
  `transport` varchar(200) NOT NULL,
  `shipping_note` text NOT NULL,
  `notes` text NOT NULL,
  `attachment` text NOT NULL,
  `signature_img` varchar(255) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `enquiry_email` varchar(200) NOT NULL,
  `enquiry_mobile` varchar(50) NOT NULL,
  `product_name` longtext NOT NULL,
  `hsn_sac` varchar(500) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `sgst` varchar(500) NOT NULL,
  `cgst` varchar(500) NOT NULL,
  `igst` varchar(500) NOT NULL,
  `sub_totalwithgst` varchar(500) NOT NULL,
  `extraCharge_name` text NOT NULL,
  `extraCharge_value` varchar(500) NOT NULL,
  `terms_condition` longtext NOT NULL,
  `total_discount` decimal(15,2) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `initial_total` decimal(15,2) NOT NULL,
  `final_total` decimal(15,2) NOT NULL,
  `nrepeat_date` varchar(30) NOT NULL,
  `invemail_forto` varchar(30) NOT NULL,
  `invemail_forcc` varchar(30) NOT NULL,
  `recurring_invradio` varchar(30) NOT NULL,
  `pi_status` int NOT NULL DEFAULT '1',
  `delete_status` int NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.plan_module
CREATE TABLE IF NOT EXISTS `plan_module` (
  `id` int NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(150) NOT NULL,
  `plan_id` varchar(100) NOT NULL,
  `module_name` varchar(200) NOT NULL,
  `limit_upto` int NOT NULL,
  `craeted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  `delete_status` int NOT NULL,
  `currentdate` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.prefix_id
CREATE TABLE IF NOT EXISTS `prefix_id` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `module` varchar(100) NOT NULL,
  `prefix_id` varchar(50) NOT NULL,
  `status` int NOT NULL,
  `currentdate` date NOT NULL,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(150) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(150) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `manufacturer` varchar(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `mpn` varchar(50) NOT NULL,
  `upc` varchar(50) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `hsn_code` varchar(200) NOT NULL,
  `ean` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `product_name` varchar(5000) NOT NULL,
  `product_quantity` varchar(500) NOT NULL,
  `product_selling_price` varchar(500) NOT NULL,
  `product_unit_price` varchar(500) NOT NULL,
  `product_sellingprc_total` decimal(10,2) NOT NULL,
  `product_unitprc_total` decimal(10,2) NOT NULL,
  `service_name` varchar(5000) NOT NULL,
  `service_quantity` varchar(500) NOT NULL,
  `service_selling_price` varchar(500) NOT NULL,
  `service_unit_price` varchar(500) NOT NULL,
  `service_sellingprc_total` decimal(10,2) NOT NULL,
  `service_unitprc_total` decimal(10,2) NOT NULL,
  `product_description` longtext NOT NULL,
  `stock_alert` int NOT NULL,
  `pro_gst` varchar(50) NOT NULL,
  `income_account` varchar(150) NOT NULL,
  `reverse_charge` varchar(150) NOT NULL,
  `preferred_supplier` varchar(400) NOT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `currentdate` date NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.product_wise_profit
CREATE TABLE IF NOT EXISTS `product_wise_profit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `so_owner` varchar(150) NOT NULL,
  `so_id` varchar(100) NOT NULL,
  `pro_id` int NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `hsn_code` varchar(100) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `pro_gst` varchar(50) NOT NULL,
  `so_qty` varchar(11) NOT NULL,
  `so_q_price` varchar(100) NOT NULL,
  `so_pro_total` varchar(100) NOT NULL,
  `so_after_discount` varchar(100) NOT NULL,
  `so_discount` varchar(100) NOT NULL,
  `so_orc` varchar(100) NOT NULL,
  `est_price` int NOT NULL,
  `initial_est_price` int NOT NULL,
  `total_est_purchase_price` int NOT NULL,
  `po_id` varchar(100) NOT NULL,
  `po_qty` varchar(100) NOT NULL,
  `po_q_price` varchar(100) NOT NULL,
  `po_est_price` varchar(100) NOT NULL,
  `po_total_est_price` varchar(100) NOT NULL,
  `po_total_price` varchar(100) NOT NULL,
  `po_after_discount` varchar(100) NOT NULL,
  `sales_person_margin` varchar(100) NOT NULL,
  `actual_profit` varchar(100) NOT NULL,
  `created_date` varchar(30) NOT NULL,
  `so_created_date` varchar(30) NOT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2704 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.purchaseorder
CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `purchaseorder_id` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `saleorder_id` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `approve_status` tinyint NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `billing_gstin` varchar(50) NOT NULL,
  `shipping_gstin` varchar(50) DEFAULT NULL,
  `billing_country` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_address` longtext NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_contact` bigint NOT NULL,
  `supplier_comp_name` varchar(200) NOT NULL,
  `supplier_email` varchar(50) NOT NULL,
  `supplier_gstin` varchar(50) NOT NULL,
  `supplier_country` varchar(50) NOT NULL,
  `supplier_state` varchar(50) NOT NULL,
  `supplier_city` varchar(50) NOT NULL,
  `supplier_zipcode` int NOT NULL,
  `supplier_address` longtext NOT NULL,
  `pro_dummy_id` varchar(100) NOT NULL,
  `product_name` varchar(5000) NOT NULL,
  `hsn_sac` varchar(500) NOT NULL,
  `sku` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `percent` varchar(500) NOT NULL,
  `pro_description` text NOT NULL,
  `initial_total` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `after_discount_po` decimal(15,2) NOT NULL,
  `igst18` decimal(15,2) NOT NULL,
  `sub_total` decimal(15,2) NOT NULL,
  `total_percent` decimal(10,2) NOT NULL,
  `progress` decimal(10,2) NOT NULL,
  `progress_remain` decimal(10,2) NOT NULL DEFAULT '0.00',
  `terms_condition` longtext NOT NULL,
  `customer_company_name` varchar(200) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_mobile` bigint NOT NULL,
  `microsoft_lan_no` varchar(50) NOT NULL,
  `promo_id` varchar(50) NOT NULL,
  `customer_address` longtext NOT NULL,
  `currentdate` varchar(50) NOT NULL,
  `reportdate` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `igst12` decimal(15,2) NOT NULL,
  `igst28` decimal(15,2) NOT NULL,
  `cgst6` decimal(15,2) NOT NULL,
  `sgst6` decimal(15,2) NOT NULL,
  `cgst9` decimal(15,2) NOT NULL,
  `sgst9` decimal(15,2) NOT NULL,
  `cgst14` decimal(15,2) NOT NULL,
  `sgst14` decimal(15,2) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `igst` varchar(200) NOT NULL,
  `cgst` varchar(200) NOT NULL,
  `sgst` varchar(200) NOT NULL,
  `sub_total_with_gst` varchar(200) NOT NULL,
  `total_igst` varchar(200) NOT NULL,
  `total_cgst` varchar(200) NOT NULL,
  `total_sgst` varchar(200) NOT NULL,
  `pro_discount` varchar(200) NOT NULL,
  `extra_charge_label` varchar(400) NOT NULL,
  `extra_charge_value` varchar(300) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `total_orc_po` decimal(15,2) NOT NULL,
  `estimate_purchase_price_po` varchar(500) NOT NULL DEFAULT '0',
  `initial_estimate_purchase_price_po` varchar(500) NOT NULL DEFAULT '0',
  `total_estimate_purchase_price_po` varchar(500) NOT NULL DEFAULT '0',
  `profit_by_user_po` decimal(15,2) NOT NULL,
  `so_owner` varchar(500) DEFAULT NULL,
  `so_owner_email` varchar(100) NOT NULL,
  `opportunity_id` varchar(150) NOT NULL,
  `org_name` varchar(250) NOT NULL,
  `end_renewal` tinyint(1) NOT NULL DEFAULT '0',
  `is_renewal` tinyint(1) DEFAULT '0' COMMENT '0 for not 1 for renewal	',
  `renewal_date` varchar(50) DEFAULT NULL,
  `renewal_alert_date` varchar(50) NOT NULL,
  `renewal_mail_date` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4648 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.quota
CREATE TABLE IF NOT EXISTS `quota` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(200) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `user_id` int NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `finacial_year` varchar(300) NOT NULL,
  `quota` varchar(500) NOT NULL DEFAULT '0',
  `jan_month` varchar(300) NOT NULL DEFAULT '0',
  `feb_month` varchar(300) NOT NULL DEFAULT '0',
  `mar_month` varchar(300) NOT NULL DEFAULT '0',
  `apr_month` varchar(300) NOT NULL DEFAULT '0',
  `may_month` varchar(300) NOT NULL DEFAULT '0',
  `jun_month` varchar(300) NOT NULL DEFAULT '0',
  `jul_month` varchar(300) NOT NULL DEFAULT '0',
  `aug_month` varchar(300) NOT NULL DEFAULT '0',
  `sep_month` varchar(300) NOT NULL DEFAULT '0',
  `oct_month` varchar(300) NOT NULL DEFAULT '0',
  `nov_month` varchar(300) NOT NULL DEFAULT '0',
  `dec_month` varchar(300) NOT NULL DEFAULT '0',
  `quat1` varchar(200) NOT NULL DEFAULT '0',
  `quat2` varchar(200) NOT NULL DEFAULT '0',
  `quat3` varchar(200) NOT NULL DEFAULT '0',
  `quat4` varchar(200) NOT NULL DEFAULT '0',
  `profit_quota` int NOT NULL,
  `profit_jan_month` int NOT NULL,
  `profit_feb_month` int NOT NULL,
  `profit_mar_month` int NOT NULL,
  `profit_apr_month` int NOT NULL,
  `profit_may_month` int NOT NULL,
  `profit_jun_month` int NOT NULL,
  `profit_jul_month` int NOT NULL,
  `profit_aug_month` int NOT NULL,
  `profit_sep_month` int NOT NULL,
  `profit_oct_month` int NOT NULL,
  `profit_nov_month` int NOT NULL,
  `profit_dec_month` int NOT NULL,
  `profit_quat1` int NOT NULL,
  `profit_quat2` int NOT NULL,
  `profit_quat3` int NOT NULL,
  `profit_quat4` int NOT NULL,
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `ip` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.quote
CREATE TABLE IF NOT EXISTS `quote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `quote_id` varchar(50) NOT NULL,
  `lead_id` varchar(50) NOT NULL,
  `opportunity_id` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `opp_name` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_id` int NOT NULL,
  `cont_id` int NOT NULL,
  `payment_terms` varchar(100) NOT NULL,
  `quote_stage` varchar(50) NOT NULL,
  `team` varchar(50) NOT NULL,
  `valid_until` varchar(50) NOT NULL,
  `carrier` varchar(50) DEFAULT NULL,
  `courier_docket_no` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_address` longtext NOT NULL,
  `product_name` varchar(5000) NOT NULL,
  `hsn_sac` varchar(500) NOT NULL,
  `sku` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `percent` varchar(500) NOT NULL,
  `initial_total` decimal(15,2) NOT NULL,
  `advanced_payment` decimal(15,2) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `after_discount` decimal(15,2) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `overall_discount` varchar(50) NOT NULL,
  `igst18` decimal(15,2) NOT NULL,
  `sub_totalq` decimal(15,2) NOT NULL,
  `total_percent` decimal(10,2) NOT NULL,
  `pro_description` text NOT NULL,
  `terms_condition` longtext NOT NULL,
  `currentdate` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `igst12` decimal(15,2) NOT NULL,
  `igst28` decimal(15,2) NOT NULL,
  `cgst6` decimal(15,2) NOT NULL,
  `sgst6` decimal(15,2) NOT NULL,
  `cgst9` decimal(15,2) NOT NULL,
  `sgst9` decimal(15,2) NOT NULL,
  `cgst14` decimal(15,2) NOT NULL,
  `sgst14` decimal(15,2) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `igst` varchar(200) NOT NULL,
  `cgst` varchar(200) NOT NULL,
  `sgst` varchar(200) NOT NULL,
  `pro_discount` varchar(150) NOT NULL,
  `sub_total_with_gst` varchar(200) NOT NULL,
  `total_igst` varchar(100) NOT NULL,
  `total_cgst` varchar(100) NOT NULL,
  `total_sgst` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '0',
  `extra_charge_label` varchar(400) NOT NULL,
  `extra_charge_value` varchar(200) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `quote_item_type` text NOT NULL COMMENT '0 = Quote Item Type New\r\n1 = Quote Item Type Renew',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4897 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.reports_table
CREATE TABLE IF NOT EXISTS `reports_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(50) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `so_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `saleorder_id` varchar(20) NOT NULL,
  `so_sub_total` decimal(10,2) NOT NULL,
  `so_total_wotax` decimal(10,2) NOT NULL,
  `po_sub_total` decimal(10,2) NOT NULL,
  `po_total_wotax` decimal(10,2) NOT NULL,
  `currentdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=678 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(50) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `parent_role_id` int NOT NULL,
  `license_type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.salesorder
CREATE TABLE IF NOT EXISTS `salesorder` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `saleorder_id` varchar(50) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `lead_id` varchar(50) NOT NULL,
  `opportunity_id` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_id` int NOT NULL,
  `cont_id` int NOT NULL,
  `subject` varchar(100) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `opp_name` varchar(50) NOT NULL,
  `pending` varchar(50) NOT NULL,
  `excise_duty` varchar(50) NOT NULL,
  `quote_id` varchar(50) NOT NULL,
  `due_date` varchar(40) DEFAULT NULL,
  `carrier` varchar(50) NOT NULL,
  `courier_docket_no` varchar(100) NOT NULL,
  `payment_terms` varchar(50) NOT NULL,
  `pay_terms_status` tinyint(1) NOT NULL,
  `approved_by` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sales_commision` varchar(50) NOT NULL,
  `billing_country` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `shipping_country` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_zipcode` int NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_zipcode` int NOT NULL,
  `billing_address` longtext NOT NULL,
  `shipping_address` longtext NOT NULL,
  `pro_dummy_id` varchar(100) NOT NULL,
  `product_name` varchar(5000) NOT NULL,
  `hsn_sac` varchar(500) NOT NULL,
  `sku` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit_price` varchar(500) NOT NULL,
  `total` varchar(500) NOT NULL,
  `percent` varchar(500) NOT NULL,
  `initial_total` decimal(15,2) NOT NULL,
  `advanced_payment` decimal(15,2) NOT NULL,
  `pending_payment` int NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `overall_discount` varchar(50) NOT NULL,
  `discount` decimal(15,2) NOT NULL,
  `after_discount` decimal(15,2) NOT NULL,
  `igst18` decimal(15,2) NOT NULL,
  `igst12` decimal(15,2) NOT NULL,
  `igst28` decimal(15,2) NOT NULL,
  `cgst6` decimal(15,2) NOT NULL,
  `sgst6` decimal(15,2) NOT NULL,
  `cgst9` decimal(15,2) NOT NULL,
  `sgst9` decimal(15,2) NOT NULL,
  `cgst14` decimal(15,2) NOT NULL,
  `sgst14` decimal(15,2) NOT NULL,
  `sub_totals` decimal(15,2) NOT NULL,
  `total_percent` decimal(10,2) NOT NULL,
  `pro_description` text NOT NULL,
  `profit_by_user` decimal(15,2) NOT NULL,
  `terms_condition` longtext NOT NULL,
  `product_line` int NOT NULL,
  `attached_file` longtext NOT NULL,
  `customer_company_name` varchar(200) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_mobile` bigint NOT NULL,
  `microsoft_lan_no` varchar(150) NOT NULL,
  `promo_id` varchar(150) NOT NULL,
  `customer_address` longtext NOT NULL,
  `currentdate` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(100) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `gst` varchar(500) NOT NULL,
  `igst` varchar(200) NOT NULL,
  `cgst` varchar(200) NOT NULL,
  `sgst` varchar(200) NOT NULL,
  `sub_total_with_gst` varchar(200) NOT NULL,
  `total_igst` varchar(200) NOT NULL,
  `total_cgst` varchar(200) NOT NULL,
  `total_sgst` varchar(200) NOT NULL,
  `pro_discount` varchar(200) NOT NULL,
  `extra_charge_label` varchar(400) NOT NULL,
  `extra_charge_value` varchar(200) NOT NULL,
  `end_renewal` tinyint(1) NOT NULL DEFAULT '0',
  `is_renewal` tinyint(1) DEFAULT NULL,
  `renewal_date` varchar(40) DEFAULT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `total_orc` decimal(15,2) NOT NULL,
  `total_convenience` decimal(15,2) NOT NULL,
  `estimate_purchase_price` varchar(500) NOT NULL,
  `initial_estimate_purchase_price` varchar(500) NOT NULL,
  `total_estimate_purchase_price` decimal(15,2) NOT NULL,
  `reportdate` varchar(40) NOT NULL,
  `salesorder_item_type` text NOT NULL COMMENT '0 = Sales Order Item Type New 1 = Sales Order Item Type Renew 	',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3629 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.standard_users
CREATE TABLE IF NOT EXISTS `standard_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_domain` varchar(100) NOT NULL,
  `standard_name` varchar(20) NOT NULL,
  `standard_email` varchar(60) NOT NULL,
  `standard_mobile` bigint NOT NULL,
  `standard_password` varchar(40) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `otp_code` int NOT NULL,
  `type` varchar(10) NOT NULL,
  `product_type` varchar(200) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `reports_to` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `company_address` longtext NOT NULL,
  `zipcode` int NOT NULL,
  `company_mobile` bigint NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_website` varchar(50) NOT NULL,
  `company_gstin` varchar(50) NOT NULL,
  `pan_number` varchar(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `company_logo` longtext NOT NULL,
  `terms_condition_customer` longtext NOT NULL,
  `terms_condition_seller` longtext NOT NULL,
  `your_plan_id` int NOT NULL,
  `password_key` varchar(50) NOT NULL,
  `sub_domain_login` varchar(250) NOT NULL,
  `password_key_valid_untill` datetime NOT NULL,
  `license_type` varchar(100) NOT NULL,
  `license_activation_date` varchar(40) NOT NULL,
  `license_expiration_date` varchar(40) NOT NULL,
  `trial_end_date` varchar(40) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `partner_name` varchar(200) NOT NULL,
  `license_duration` varchar(20) NOT NULL,
  `create_user` tinyint(1) NOT NULL,
  `retrieve_user` tinyint(1) NOT NULL,
  `update_user` tinyint(1) NOT NULL,
  `delete_user` tinyint(1) NOT NULL,
  `create_org` tinyint(1) NOT NULL,
  `retrieve_org` tinyint(1) NOT NULL,
  `update_org` tinyint(1) NOT NULL,
  `delete_org` tinyint(1) NOT NULL,
  `create_contact` tinyint(1) NOT NULL,
  `retrieve_contact` tinyint(1) NOT NULL,
  `update_contact` tinyint(1) NOT NULL,
  `delete_contact` tinyint(1) NOT NULL,
  `create_lead` tinyint(1) NOT NULL,
  `retrieve_lead` tinyint(1) NOT NULL,
  `update_lead` tinyint(1) NOT NULL,
  `delete_lead` tinyint(1) NOT NULL,
  `create_opp` tinyint(1) NOT NULL,
  `retrieve_opp` tinyint(1) NOT NULL,
  `update_opp` tinyint(1) NOT NULL,
  `delete_opp` tinyint(1) NOT NULL,
  `create_quote` tinyint(1) NOT NULL,
  `retrieve_quote` tinyint(1) NOT NULL,
  `update_quote` tinyint(1) NOT NULL,
  `delete_quote` tinyint(1) NOT NULL,
  `create_so` tinyint(1) NOT NULL,
  `retrieve_so` tinyint(1) NOT NULL,
  `update_so` tinyint(1) NOT NULL,
  `delete_so` tinyint(1) NOT NULL,
  `create_vendor` tinyint(1) NOT NULL,
  `retrieve_vendor` tinyint(1) NOT NULL,
  `update_vendor` tinyint(1) NOT NULL,
  `delete_vendor` tinyint(1) NOT NULL,
  `create_product` tinyint(1) NOT NULL,
  `retrieve_product` tinyint(1) NOT NULL,
  `update_product` tinyint(1) NOT NULL,
  `delete_product` tinyint(1) NOT NULL,
  `create_po` tinyint(1) NOT NULL,
  `retrieve_po` tinyint(1) NOT NULL,
  `update_po` tinyint(1) NOT NULL,
  `delete_po` tinyint(1) NOT NULL,
  `create_inv` tinyint(1) NOT NULL,
  `retrieve_inv` tinyint(1) NOT NULL,
  `create_pi` int NOT NULL DEFAULT '0',
  `update_pi` int NOT NULL DEFAULT '0',
  `retrieve_pi` int NOT NULL DEFAULT '0',
  `delete_pi` int NOT NULL DEFAULT '0',
  `update_inv` tinyint(1) NOT NULL,
  `delete_inv` tinyint(1) NOT NULL,
  `pending_payment_mail` tinyint NOT NULL DEFAULT '0',
  `accept_payment_mail` tinyint NOT NULL DEFAULT '0',
  `so_approve_mail` tinyint NOT NULL DEFAULT '0',
  `so_approval` tinyint NOT NULL DEFAULT '0',
  `po_approval` tinyint NOT NULL,
  `notapprovalSO` tinyint(1) NOT NULL DEFAULT '0',
  `notapprovalPO` tinyint(1) NOT NULL DEFAULT '0',
  `user_image` longtext NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `login_count` int NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `profile_image` varchar(200) NOT NULL,
  `sales_quota` int NOT NULL,
  `profit_quota` int NOT NULL,
  `current_session` int NOT NULL,
  `online` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.states
CREATE TABLE IF NOT EXISTS `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `tin` tinyint NOT NULL,
  `country_id` varchar(50) NOT NULL,
  `delete_status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4122 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.std_user_target
CREATE TABLE IF NOT EXISTS `std_user_target` (
  `id` int NOT NULL AUTO_INCREMENT,
  `std_user_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `sess_eml` varchar(200) NOT NULL,
  `session_comp_email` varchar(200) NOT NULL,
  `sales_quota` int NOT NULL,
  `profit_quota` int NOT NULL,
  `for_month` varchar(30) NOT NULL,
  `created_date` varchar(30) NOT NULL,
  `updated_date` varchar(30) NOT NULL,
  `status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.superadmin_email_automation
CREATE TABLE IF NOT EXISTS `superadmin_email_automation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `email_cc` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `read_status` int NOT NULL DEFAULT '0',
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.support
CREATE TABLE IF NOT EXISTS `support` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(100) NOT NULL,
  `session_company` varchar(100) NOT NULL,
  `session_comp_email` varchar(120) NOT NULL,
  `owner` varchar(101) NOT NULL,
  `ticket` varchar(30) NOT NULL,
  `saleorder_id` varchar(120) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `creater_remark` text NOT NULL,
  `support_desk` varchar(255) NOT NULL,
  `time` time NOT NULL,
  `assigned_user` varchar(255) NOT NULL,
  `supported_by` varchar(255) NOT NULL,
  `supported_by_email` varchar(150) NOT NULL,
  `org_name` varchar(200) NOT NULL,
  `contact_person` varchar(200) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_mobile` varchar(15) NOT NULL,
  `support_start` datetime NOT NULL,
  `support_end` datetime NOT NULL,
  `support_duration` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.team365admin
CREATE TABLE IF NOT EXISTS `team365admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.team365_plan
CREATE TABLE IF NOT EXISTS `team365_plan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `team365_type` varchar(100) NOT NULL,
  `plan_name` varchar(300) NOT NULL,
  `total_modul` int NOT NULL,
  `month_price` int NOT NULL,
  `annual_price` int NOT NULL,
  `delete_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.user_branch
CREATE TABLE IF NOT EXISTS `user_branch` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `sess_eml` varchar(100) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `address` longtext NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `cin` varchar(50) NOT NULL,
  `pan` varchar(50) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `show_email` tinyint(1) NOT NULL DEFAULT '0',
  `contact_number` bigint NOT NULL,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=245 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.user_restriction
CREATE TABLE IF NOT EXISTS `user_restriction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `set_by` varchar(200) NOT NULL,
  `session_company` varchar(250) NOT NULL,
  `session_comp_email` varchar(250) NOT NULL,
  `module_name` varchar(400) NOT NULL,
  `create_u` int NOT NULL,
  `update_u` int NOT NULL,
  `retrieve_u` int NOT NULL,
  `delete_u` int NOT NULL,
  `other` int NOT NULL,
  `limit_u` int NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `currentdate` varchar(30) NOT NULL,
  `updated_date` varchar(30) NOT NULL,
  `update_by` varchar(30) NOT NULL,
  `delete_status` int NOT NULL,
  `ip` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1296 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.vendor
CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(200) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `vendor_id` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `asigned_to` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint NOT NULL,
  `office_phone` bigint NOT NULL,
  `website` varchar(50) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `terms` varchar(50) NOT NULL,
  `opening_balance` decimal(15,2) NOT NULL,
  `as_of` date NOT NULL,
  `gst_rtype` varchar(50) NOT NULL,
  `gstin` varchar(50) DEFAULT NULL,
  `tax_registration_no` varchar(50) NOT NULL,
  `effective_date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zipcode` int NOT NULL,
  `address` longtext NOT NULL,
  `description` longtext NOT NULL,
  `currentdate` date NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table admintea_team365.workflow
CREATE TABLE IF NOT EXISTS `workflow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sess_eml` varchar(50) NOT NULL,
  `session_company` varchar(255) NOT NULL,
  `session_comp_email` varchar(50) NOT NULL,
  `workflow_name` text NOT NULL,
  `module` varchar(150) NOT NULL,
  `trigger_workflow_on` tinyint(1) NOT NULL,
  `Recurrence` varchar(250) NOT NULL,
  `entry_all_con` text NOT NULL,
  `entry_any_con` text NOT NULL,
  `action` text NOT NULL,
  `limit_so` int NOT NULL,
  `price_limit` int NOT NULL,
  `set_by` varchar(250) NOT NULL,
  `update_by` varchar(250) NOT NULL,
  `updated_date` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_status` tinyint(1) NOT NULL DEFAULT '1',
  `description` text NOT NULL,
  `currentdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.


-- Dumping database structure for db_nigam
CREATE DATABASE IF NOT EXISTS `db_nigam` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_nigam`;

-- Dumping structure for table db_nigam.login
CREATE TABLE IF NOT EXISTS `login` (
  `LoginId` int NOT NULL AUTO_INCREMENT,
  `UserId` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `UserName` text COLLATE utf8mb4_general_ci NOT NULL,
  `Password` text COLLATE utf8mb4_general_ci NOT NULL,
  `UserLevel` int NOT NULL,
  `IsActive` int NOT NULL DEFAULT '1' COMMENT '0 : de-active user\r\n1 : active user',
  `WrongAttempt` int NOT NULL,
  `IsPasswordChanged` int NOT NULL,
  `CurrentLoginTime` datetime NOT NULL,
  `LastLoginTime` datetime DEFAULT NULL,
  `SessionId` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `CreatedAt` timestamp NOT NULL,
  PRIMARY KEY (`LoginId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.menu_attachment
CREATE TABLE IF NOT EXISTS `menu_attachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `caption` varchar(300) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.menu_content
CREATE TABLE IF NOT EXISTS `menu_content` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `hindi_content` text NOT NULL,
  `english_content` text NOT NULL,
  `has_attachment` tinyint(1) NOT NULL DEFAULT '0',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hi_none` varchar(200) DEFAULT NULL,
  `en_none` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `MenuItemId` int NOT NULL AUTO_INCREMENT,
  `Label` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Icon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MenuItemId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.menu_master
CREATE TABLE IF NOT EXISTS `menu_master` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `menu_name` text NOT NULL,
  `menu_name_hindi` text NOT NULL,
  `page_url` varchar(100) NOT NULL,
  `menu_position` decimal(3,0) DEFAULT NULL,
  `parent_menu` smallint NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for view db_nigam.page_content
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `page_content` (
	`id` INT(10) NOT NULL,
	`menu_id` INT(10) NOT NULL,
	`hindi_content` TEXT NOT NULL COLLATE 'utf8mb3_general_ci',
	`english_content` TEXT NOT NULL COLLATE 'utf8mb3_general_ci',
	`hi_none` VARCHAR(200) NULL COLLATE 'utf8mb3_general_ci',
	`en_none` VARCHAR(200) NULL COLLATE 'utf8mb3_general_ci',
	`has_attachment` TINYINT(1) NOT NULL,
	`is_enabled` TINYINT(1) NOT NULL,
	`created_date` DATETIME NOT NULL,
	`menu_name` TEXT NOT NULL COLLATE 'utf8mb3_general_ci',
	`page_url` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for table db_nigam.role_master
CREATE TABLE IF NOT EXISTS `role_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.upload
CREATE TABLE IF NOT EXISTS `upload` (
  `uId` int NOT NULL AUTO_INCREMENT,
  `menu_id` tinyint NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `file_name` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `login_name` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL,
  `role_id` int NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pass_modified` tinyint(1) NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `count_fail` tinyint NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `fail_attempt` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.user_menu_access
CREATE TABLE IF NOT EXISTS `user_menu_access` (
  `AccessId` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `MenuItemId` int NOT NULL,
  PRIMARY KEY (`AccessId`) USING BTREE,
  KEY `UserId` (`UserId`),
  KEY `MenuItemId` (`MenuItemId`),
  CONSTRAINT `user_menu_access_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `login` (`LoginId`),
  CONSTRAINT `user_menu_access_ibfk_2` FOREIGN KEY (`MenuItemId`) REFERENCES `menu_items` (`MenuItemId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table db_nigam.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for view db_nigam.page_content
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `page_content`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `db_nigam`.`page_content` AS select `db_nigam`.`menu_content`.`id` AS `id`,`db_nigam`.`menu_content`.`menu_id` AS `menu_id`,`db_nigam`.`menu_content`.`hindi_content` AS `hindi_content`,`db_nigam`.`menu_content`.`english_content` AS `english_content`,`db_nigam`.`menu_content`.`hi_none` AS `hi_none`,`db_nigam`.`menu_content`.`en_none` AS `en_none`,`db_nigam`.`menu_content`.`has_attachment` AS `has_attachment`,`db_nigam`.`menu_content`.`is_enabled` AS `is_enabled`,`db_nigam`.`menu_content`.`created_date` AS `created_date`,`db_nigam`.`menu_master`.`menu_name` AS `menu_name`,`db_nigam`.`menu_master`.`page_url` AS `page_url` from (`db_nigam`.`menu_content` join `db_nigam`.`menu_master` on((`db_nigam`.`menu_content`.`menu_id` = `db_nigam`.`menu_master`.`id`)));


-- Dumping database structure for tcoe_india
CREATE DATABASE IF NOT EXISTS `tcoe_india` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tcoe_india`;

-- Dumping structure for table tcoe_india.language
CREATE TABLE IF NOT EXISTS `language` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.login
CREATE TABLE IF NOT EXISTS `login` (
  `LoginId` int NOT NULL AUTO_INCREMENT,
  `UserId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserLevel` int NOT NULL,
  `IsActive` int NOT NULL DEFAULT '1' COMMENT '0 : de-active user\r\n1 : active user',
  `WrongAttempt` int NOT NULL,
  `IsPasswordChanged` int NOT NULL,
  `CurrentLoginTime` datetime NOT NULL,
  `LastLoginTime` datetime DEFAULT NULL,
  `SessionId` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CreatedAt` timestamp NOT NULL,
  PRIMARY KEY (`LoginId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.menu_attachment
CREATE TABLE IF NOT EXISTS `menu_attachment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `caption` varchar(300) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.menu_content
CREATE TABLE IF NOT EXISTS `menu_content` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int NOT NULL,
  `hindi_content` text NOT NULL,
  `english_content` text NOT NULL,
  `has_attachment` tinyint(1) NOT NULL DEFAULT '0',
  `is_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hi_none` varchar(200) DEFAULT NULL,
  `en_none` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `MenuItemId` int NOT NULL AUTO_INCREMENT,
  `Label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`MenuItemId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.menu_master
CREATE TABLE IF NOT EXISTS `menu_master` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `menu_name` text NOT NULL,
  `menu_name_hindi` text NOT NULL,
  `page_url` varchar(100) NOT NULL,
  `menu_position` decimal(3,0) DEFAULT NULL,
  `parent_menu` smallint NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.page_content
CREATE TABLE IF NOT EXISTS `page_content` (
  `id` int NOT NULL,
  `menu_id` int NOT NULL,
  `hindi_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `english_content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `hi_none` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `en_none` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `has_attachment` tinyint(1) NOT NULL,
  `is_enabled` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL,
  `menu_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `page_url` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.role_master
CREATE TABLE IF NOT EXISTS `role_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.upload
CREATE TABLE IF NOT EXISTS `upload` (
  `uId` int NOT NULL AUTO_INCREMENT,
  `menu_id` tinyint NOT NULL,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `file_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `login_name` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL,
  `role_id` int NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` datetime DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `pass_modified` tinyint(1) NOT NULL DEFAULT '0',
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `count_fail` tinyint NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `fail_attempt` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.user_menu_access
CREATE TABLE IF NOT EXISTS `user_menu_access` (
  `AccessId` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `MenuItemId` int NOT NULL,
  PRIMARY KEY (`AccessId`) USING BTREE,
  KEY `UserId` (`UserId`),
  KEY `MenuItemId` (`MenuItemId`),
  CONSTRAINT `user_menu_access_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `login` (`LoginId`),
  CONSTRAINT `user_menu_access_ibfk_2` FOREIGN KEY (`MenuItemId`) REFERENCES `menu_items` (`MenuItemId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table tcoe_india.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.


-- Dumping database structure for vimarshtcoe_database
CREATE DATABASE IF NOT EXISTS `vimarshtcoe_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `vimarshtcoe_database`;

-- Dumping structure for table vimarshtcoe_database.email_messages
CREATE TABLE IF NOT EXISTS `email_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text,
  `login_id` int DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `create_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.form1
CREATE TABLE IF NOT EXISTS `form1` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '0',
  `login_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `applying_as_an` varchar(255) DEFAULT NULL,
  `problem_statements` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `company_turnover` varchar(50) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.form2
CREATE TABLE IF NOT EXISTS `form2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) DEFAULT NULL,
  `login_id` int NOT NULL,
  `domain` text,
  `brief_solution` text,
  `technical_details_link` varchar(255) DEFAULT NULL,
  `point_presentation` varchar(255) DEFAULT NULL,
  `stag_of_product` text,
  `proof_for_poC` varchar(255) DEFAULT NULL,
  `patent_product` varchar(3) DEFAULT NULL,
  `application_number` varchar(255) DEFAULT NULL,
  `date_of_filing` date DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `validated` varchar(3) DEFAULT NULL,
  `validation_details_link` varchar(255) DEFAULT NULL,
  `validation_details` varchar(255) DEFAULT NULL,
  `similar_product` varchar(3) DEFAULT NULL,
  `advantage_details_link` varchar(255) DEFAULT NULL,
  `products_lassifies_as_a_5G` text,
  `attachment` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.form3
CREATE TABLE IF NOT EXISTS `form3` (
  `id` int NOT NULL AUTO_INCREMENT,
  `indian_citizen` text,
  `id_proof` text,
  `user_id` varchar(50) DEFAULT NULL,
  `login_id` int NOT NULL,
  `declare` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.form_status
CREATE TABLE IF NOT EXISTS `form_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '',
  `login_id` int NOT NULL,
  `application_id` varchar(50) NOT NULL DEFAULT '',
  `form1` tinyint DEFAULT NULL,
  `form2` tinyint DEFAULT NULL,
  `form3` tinyint DEFAULT NULL,
  `last_submited_form` tinyint NOT NULL,
  `last_submited_date` datetime NOT NULL,
  `form_status` tinyint(1) NOT NULL,
  `application_status` tinyint(1) NOT NULL,
  `remark` text NOT NULL,
  `create_datetime` datetime NOT NULL,
  `modify_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.login
CREATE TABLE IF NOT EXISTS `login` (
  `LoginId` int NOT NULL AUTO_INCREMENT,
  `UserId` varchar(50) NOT NULL,
  `UserName` text NOT NULL,
  `ContactNo` varchar(10) NOT NULL,
  `Password` text NOT NULL,
  `ActivationCode` varchar(6) NOT NULL DEFAULT '',
  `UserLevel` int NOT NULL,
  `IsActive` int NOT NULL DEFAULT '1' COMMENT '0 : de-active user\r\n1 : active user',
  `WrongAttempt` int NOT NULL,
  `IsPasswordChanged` int NOT NULL,
  `CurrentLoginTime` datetime NOT NULL,
  `LastLoginTime` datetime DEFAULT NULL,
  `SessionId` varchar(150) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`LoginId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.menu_items
CREATE TABLE IF NOT EXISTS `menu_items` (
  `MenuItemId` int NOT NULL AUTO_INCREMENT,
  `Label` varchar(255) NOT NULL,
  `Url` varchar(255) NOT NULL,
  `Icon` varchar(255) NOT NULL,
  PRIMARY KEY (`MenuItemId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.user_menu_access
CREATE TABLE IF NOT EXISTS `user_menu_access` (
  `AccessId` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `MenuItemId` int NOT NULL,
  PRIMARY KEY (`AccessId`) USING BTREE,
  KEY `UserId` (`UserId`) USING BTREE,
  KEY `MenuItemId` (`MenuItemId`) USING BTREE,
  CONSTRAINT `user_menu_access_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `login` (`LoginId`),
  CONSTRAINT `user_menu_access_ibfk_2` FOREIGN KEY (`MenuItemId`) REFERENCES `menu_items` (`MenuItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table vimarshtcoe_database.visitors
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.


-- Dumping database structure for webadmin_laravel
CREATE DATABASE IF NOT EXISTS `webadmin_laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `webadmin_laravel`;

-- Dumping structure for table webadmin_laravel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table webadmin_laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table webadmin_laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table webadmin_laravel.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table webadmin_laravel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table webadmin_laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
