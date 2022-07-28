-- date 06-06-2022
ALTER TABLE `z_booking` ADD `status` INT NOT NULL DEFAULT '1';
ALTER TABLE `z_booking` ADD `created_by` INT NOT NULL;
ALTER TABLE `z_booking` ADD `date_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `z_booking` CHANGE `booking_date` `booking_date` DATE NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `z_booking` ADD `document` TEXT NOT NULL;
ALTER TABLE `z_booking` ADD `assigned_to` INT NOT NULL DEFAULT '1';
ALTER TABLE `z_booking` CHANGE `req_delivery_date` `req_delivery_date` DATE NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `delivery_date` `delivery_date` DATE NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `z_booking` CHANGE `created_by` `created_by` INT(11) NOT NULL DEFAULT '1';

ALTER TABLE `z_booking` ADD `stage` VARCHAR(10) NOT NULL DEFAULT 'Created';
ALTER TABLE `z_booking_status` ADD `badges` VARCHAR(10) NOT NULL DEFAULT 'primary';
ALTER TABLE `z_call_type` ADD `slug` VARCHAR(200) NOT NULL;


-- new updated
ALTER TABLE `z_booking_status` CHANGE `badges` `badges` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'primary';

ALTER TABLE `z_booking` ADD `delivery_expect_start_date` DATE NULL, ADD `delivery_expect_end_date` DATE NULL;



-- date 06-06-2022
UPDATE `z_booking_status` SET `badges` = 'warning' WHERE `z_booking_status`.`id` = 5;


CREATE TABLE `z_booking_log` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `stage` varchar(10) NOT NULL DEFAULT 'Created',
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `customer_mobile` varchar(40) DEFAULT NULL,
  `customer_alter_mobile` varchar(40) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `other_state` varchar(25) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `other_district` varchar(25) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `other_city` varchar(25) DEFAULT NULL,
  `village` varchar(200) DEFAULT NULL,
  `pincode` varchar(200) DEFAULT NULL,
  `booking_date` date DEFAULT current_timestamp(),
  `req_delivery_date` date DEFAULT current_timestamp(),
  `delivery_date` date DEFAULT current_timestamp(),
  `supply_address` varchar(200) DEFAULT NULL,
  `vehicle_no` varchar(50) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `crates` varchar(200) DEFAULT NULL,
  `bank_trans_id` varchar(200) DEFAULT NULL,
  `contract` varchar(20) DEFAULT NULL,
  `productive_plants` varchar(200) DEFAULT NULL,
  `driver_name` varchar(200) DEFAULT NULL,
  `booking_status` varchar(50) DEFAULT NULL,
  `crop_status` varchar(50) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `same_billing` varchar(10) DEFAULT NULL,
  `delivery_address` text DEFAULT NULL,
  `advance` float DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `payment_mode` varchar(20) DEFAULT NULL,
  `cheque_no` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `bank_branch` varchar(200) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `cgst_rate` float DEFAULT NULL,
  `sgst_rate` float DEFAULT NULL,
  `igst_rate` float DEFAULT NULL,
  `cgst_amount` float DEFAULT NULL,
  `sgst_amount` float DEFAULT NULL,
  `igst_amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `pending_bill` float DEFAULT NULL,
  `product_set` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `date_at` date NOT NULL DEFAULT current_timestamp(),
  `document` text NOT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT 1,
  `delivery_expect_start_date` date DEFAULT NULL,
  `delivery_expect_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 
ALTER TABLE `z_booking_log`
  ADD PRIMARY KEY (`id`);
 
ALTER TABLE `z_booking_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `z_booking` ADD `update_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `z_booking_log` ADD `update_at` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE `z_booking` ADD `company_id` INT NOT NULL DEFAULT '1';
ALTER TABLE `z_booking_log` ADD `company_id` INT NOT NULL DEFAULT '1';
 
 
 --date 10-06-2022
 
 
 
DROP TABLE IF EXISTS `z_company`;
CREATE TABLE IF NOT EXISTS `z_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `nursury_address` varchar(300) NOT NULL DEFAULT 'Nagla Mohiuddin Pur Old GT Road Khurja Bulandshahr , Uttar Pradesh 203131 India',
  `office_address` varchar(300) NOT NULL DEFAULT 'H.No. 80, Block-B, Ganga Nagar Colony, Distt. Bulandshahr-203001, U.P. India',
  `state` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_at` date NOT NULL,
  `update_at` date NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `gst_no` varchar(200) NOT NULL,
  `pan_no` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `bank_account_number` varchar(200) NOT NULL,
  `bank_holder_name` varchar(200) NOT NULL,
  `bank_ifsc_code` varchar(200) NOT NULL,
  `bank_branch_address` varchar(200) NOT NULL,
  `seal_logo` varchar(200) NOT NULL DEFAULT 'seal-logo.png',
  `logo` varchar(200) NOT NULL DEFAULT 'logo.png',
  `social_url` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `z_company`
--

INSERT INTO `z_company` (`id`, `name`, `title`, `slug`, `nursury_address`, `office_address`, `state`, `district`, `city`, `status`, `date_at`, `update_at`, `phone`, `email`, `website`, `gst_no`, `pan_no`, `bank_name`, `bank_account_number`, `bank_holder_name`, `bank_ifsc_code`, `bank_branch_address`, `seal_logo`, `logo`, `social_url`) VALUES
(1, 'swastik agro biotech & plantation', 'Swastik Agro Biotech & Plantation', 'swastik-agro-biotech-plantation', 'Nagla Mohiuddin Pur Old GT Road Khurja Bulandshahr , Uttar Pradesh 203131 India', 'H.No. 80, Block-B, Ganga Nagar Colony, Distt. Bulandshahr-203001, U.P. India', 1, 1, 1, 1, '2022-06-07', '2022-06-07', '+918868999198', 'swastikagrobiotech2016@gmail.com', 'https://swastikfarming.com', '09AALCM6341E1ZD', 'CVBPK2998B', 'Axis bank (Current Account)', '919020084408047', 'Swastik Agro Biotech & Plantaion', 'UTIB0001177', 'khurja Uttar Pradesh', 'seal-logo.png', 'logo.png', '[{\"title\":\"Facebook\",\"url\":\"https:\\/\\/www.facebook.com\"},{\"title\":\"Youtube\",\"url\":\"https:\\/\\/www.youtube.com\"}]');
COMMIT;



ALTER TABLE `z_booking` CHANGE `date_at` `date_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


ALTER TABLE `z_booking` ADD `tax_rate` INT NOT NULL DEFAULT '0';









--dated on  14-06-2020
--

ALTER TABLE `z_admin` CHANGE `admin_type` `admin_type` INT(11) NOT NULL COMMENT '1-Role Admin\r\n2-Role Agent\r\n3-Role User';


DROP TABLE IF EXISTS `z_payment_type`;
CREATE TABLE IF NOT EXISTS `z_payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `z_payment_type` (`id`, `name`, `title`, `slug`, `status`, `date_at`, `update_at`) VALUES
(1, 'payment', 'Payment', 'payment', 1, '2022-06-01', '2022-06-01'),
(2, 'refund', 'Refund', 'refund', 1, '2022-06-01', '2022-06-01'),
(3, 'cancellation charge', 'Cancellation Charge', 'cancellation-charge', 1, '2022-06-01', '2022-06-01'),
(4, 'other', 'other', 'other', 1, '2022-06-01', '2022-06-01');
COMMIT;



DROP TABLE IF EXISTS `z_booking_payments`;
CREATE TABLE IF NOT EXISTS `z_booking_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `payment_type` varchar(100) DEFAULT 'payment',
  `payment_mode` varchar(100) DEFAULT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` int(11) NOT NULL,
  `bank_transaction_id` varchar(200) NOT NULL,
  `date_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cheque_no` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `bank_branch` varchar(200) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--date 15-06-2022--

ALTER TABLE `z_booking` ADD `outstanding_amount` INT NULL DEFAULT '0' AFTER `balance`;
ALTER TABLE `z_booking_log` ADD `outstanding_amount` INT NULL DEFAULT '0' AFTER `balance`;

ALTER TABLE `z_booking` ADD `total_paid_amount` INT NOT NULL DEFAULT '0' AFTER `outstanding_amount`;
ALTER TABLE `z_booking_log` ADD `total_paid_amount` INT NOT NULL DEFAULT '0' AFTER `outstanding_amount`;

ALTER TABLE `z_booking_payments` CHANGE `payment_date` `payment_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `z_booking_payments` ADD `update_by` INT NULL AFTER `created_by`;


 ALTER TABLE `z_booking` ADD `refunded_amount` INT NOT NULL DEFAULT '0' AFTER `total_paid_amount`;
 ALTER TABLE `z_booking_log` ADD `refunded_amount` INT NOT NULL DEFAULT '0' AFTER `total_paid_amount`;


 ALTER TABLE `z_booking` ADD `cancellation_charge` INT NOT NULL , ADD `cancellation_reason` VARCHAR(400) NOT NULL , ADD `cancellation_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP  , ADD `cancel_by` INT NOT NULL;
 ALTER TABLE `z_booking_log` ADD `cancellation_charge` INT NOT NULL , ADD `cancellation_reason` VARCHAR(400) NOT NULL , ADD `cancellation_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP  , ADD `cancel_by` INT NOT NULL;




 ----16-06-2022


 ALTER TABLE `z_customer` ADD `last_call_back_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP;
 ALTER TABLE `z_customer` CHANGE `other_state` `other_state` VARCHAR(100) NULL DEFAULT NULL, CHANGE `other_city` `other_city` VARCHAR(100) NULL DEFAULT NULL, CHANGE `other_district` `other_district` VARCHAR(100) NULL DEFAULT NULL;

----17-06-2022


DROP TABLE IF EXISTS `z_farmers`;
CREATE TABLE IF NOT EXISTS `z_farmers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `alt_mobile` varchar(20) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  `village` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `source` int(11) DEFAULT NULL,
  `date_at` date DEFAULT current_timestamp(),
  `update_at` date DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1,
  `update_by` int(11) NOT NULL DEFAULT 1,
  `company_id` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `z_lead_source`;
CREATE TABLE IF NOT EXISTS `z_lead_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `z_farmers` ADD `other_state` VARCHAR(100) , ADD `other_district` VARCHAR(100) , ADD `other_city` VARCHAR(100);
ALTER TABLE `z_farmers` CHANGE `source` `source` VARCHAR(100) NULL DEFAULT NULL;


ALTER TABLE `z_admin` ADD `created_by` INT NULL DEFAULT NULL , ADD `update_by` INT NULL DEFAULT NULL;


ALTER TABLE `z_admin` ADD `state_id` INT NULL , ADD `district_id` INT NULL , ADD `city_id` INT NULL , ADD `other_state` VARCHAR(100) NOT NULL , ADD `other_district` VARCHAR(100)NOT NULL; 

ALTER TABLE `z_admin` ADD `other_city` VARCHAR(100) NULL ;


ALTER TABLE `z_admin` CHANGE `created_by` `created_by` INT(11) NULL DEFAULT '1';

ALTER TABLE `z_admin` ADD `pincode` INT(25) NOT NULL AFTER `other_city` ;





----20-06-2022

ALTER TABLE `z_admin` ADD `company_id` INT NOT NULL DEFAULT '1';

ALTER TABLE `z_customer` ADD `farmer_id` INT NULL AFTER `id`;
ALTER TABLE `z_customer` ADD `current_conversation` TEXT NULL;
ALTER TABLE `z_customer` ADD `update_by` INT NOT NULL DEFAULT '1';

ALTER TABLE `z_customer` CHANGE `update_at` `update_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

----21-06-2022

ALTER TABLE `z_booking` ADD `farmer_id` INT NULL DEFAULT NULL AFTER `id`;
ALTER TABLE `z_booking_payments` ADD `farmer_id` INT NULL DEFAULT NULL AFTER `id`;
ALTER TABLE `z_booking_log` ADD `farmer_id` INT NULL DEFAULT NULL AFTER `id`;





----22-06-2022
ALTER TABLE `z_company` ADD `other_state` VARCHAR(200) NULL DEFAULT NULL  , ADD `other_district` VARCHAR(200) NULL DEFAULT NULL , ADD `other_city` VARCHAR(200) NULL DEFAULT NULL  , ADD `created_by` INT NOT NULL DEFAULT '1' , ADD `updated_by` INT NOT NULL DEFAULT '1';

ALTER TABLE `z_customer` ADD `company_id` INT NULL DEFAULT '1';
ALTER TABLE `z_customer_call` ADD `company_id` INT NULL DEFAULT '1';



----23-06-2022
ALTER TABLE `z_product_category` ADD `description` TEXT NULL, ADD `update_by` INT NULL;

----24-06-2022

ALTER TABLE `z_admin` ADD `date_join` DATE NULL DEFAULT CURRENT_TIMESTAMP;


----24-06-2022

ALTER TABLE `z_customer_call` CHANGE `call_back_date` `call_back_date` DATE NULL DEFAULT NULL;








-- 29-06-2022

DROP TABLE IF EXISTS `z_consultant_ticket_status`;
CREATE TABLE IF NOT EXISTS `z_consultant_ticket_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `z_consultant_ticket_status` (`id`, `name`, `title`, `slug`, `status`, `date_at`, `update_at`) VALUES
(1, 'open', 'Open', 'open', 1, '2022-06-01', '2022-06-01'),
(2, 'pending', 'Pending', 'pending', 1, '2022-06-01', '2022-06-01'),
(3, 'resolved', 'Resolved', 'resolved', 1, '2022-06-01', '2022-06-01'),
(4, 'closed', 'Closed', 'closed', 1, '2022-06-01', '2022-06-01');
COMMIT;


DROP TABLE IF EXISTS `z_consultant_call_type`;
CREATE TABLE IF NOT EXISTS `z_consultant_call_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` date DEFAULT NULL,
  `update_at` date DEFAULT NULL,
  `slug` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `z_consultant_call_type` (`id`, `name`, `title`, `status`, `date_at`, `update_at`, `slug`) VALUES
(1, 'consultation', 'Consultation', 1, '2022-05-19', '2022-05-19', 'consultation'),
(2, 'inquiry', 'Inquiry', 1, '2022-05-19', '2022-05-19', 'inquiry');
COMMIT;























DROP TABLE IF EXISTS `z_document_category`;
CREATE TABLE IF NOT EXISTS `z_document_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `crop_id` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;


 
 

DROP TABLE IF EXISTS `z_document`;
CREATE TABLE IF NOT EXISTS `z_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `crop_id` int(10) NOT NULL DEFAULT 1,
  `document_cat_id` int(10) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_at` date NOT NULL DEFAULT current_timestamp(),
  `update_at` date NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 1,
  `images` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `root_cause` text DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

 



 ----30-06-2022

DROP TABLE IF EXISTS `z_consultants`;
CREATE TABLE IF NOT EXISTS `z_consultants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_title` varchar(250) DEFAULT NULL,
  `ticket_status` varchar(30) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `farmer_name` varchar(250) DEFAULT NULL,
  `farmer_mobile` varchar(20) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `crop_id` int(11) DEFAULT NULL,
  `crop_status` varchar(15) DEFAULT 'Active',
  `crop_area` varchar(300) DEFAULT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `call_type` int(11) DEFAULT NULL,
  `follow_up_date` date DEFAULT current_timestamp(),
  `document_category_id` int(11) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `root_cause` text DEFAULT NULL,
  `recommendation` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `screenshot` varchar(200) DEFAULT NULL,
  `date_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;


DROP TABLE IF EXISTS `z_crop`;
CREATE TABLE IF NOT EXISTS `z_crop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 
INSERT INTO `z_crop` (`id`, `name`, `title`, `status`, `date_at`, `update_at`, `created_by`, `updated_by`) VALUES
(1, 'papaya', 'Papaya', 1, '2022-07-01 09:52:22', '2022-07-01 09:52:22', 1, NULL),
(2, 'lemon', 'Lemon', 1, '2022-07-01 09:52:22', '2022-07-01 09:52:22', 1, NULL);
COMMIT;
 


-------04-07-2022

INSERT INTO `z_call_type` (`id`, `name`, `title`, `status`, `date_at`, `update_at`, `slug`) VALUES (NULL, 'consultation call', 'Consultation Call', '1', '2022-05-19', '2022-05-19', 'cunsultation-call');




-------06-07-2022

ALTER TABLE `z_booking` CHANGE `agent_id` `agent_id` INT(11) NULL DEFAULT '0';

INSERT INTO `z_admin` (`id`, `name`, `title`, `admin_type`, `email`, `phone`, `address`, `password`, `date_at`, `update_at`, `status`, `otp`, `created_by`, `update_by`, `state_id`, `district_id`, `city_id`, `other_state`, `other_district`, `other_city`, `pincode`, `company_id`, `date_join`) VALUES
 (0, 'Direct', 'Direct', '2', '', '', '', '', '2018-04-10 00:00:00', '0000-00-00 00:00:00', '2', '', NULL, NULL, NULL, NULL, NULL, '', '', NULL, '0', '1', '2022-06-24');
 UPDATE `z_booking` SET  create_date=date_at WHERE 1;





-------08-07-2022

ALTER TABLE `z_farmers` ADD `farmer_type` INT NULL DEFAULT '1';

DROP TABLE IF EXISTS `z_farmer_type`;
CREATE TABLE IF NOT EXISTS `z_farmer_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `slug` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `z_farmer_type` (`id`, `name`, `title`, `status`, `date_at`, `update_at`, `slug`) VALUES
(1, 'farmer', 'Farmer', 1, '2022-07-08 12:42:11', '2022-07-08 12:42:11', 'farmer'),
(2, 'dealer', 'Dealer', 1, '2022-07-08 12:42:19', '2022-07-08 12:42:19', 'dealer'),
(3, 'entrepreneur', 'Entrepreneur', 1, '2022-07-08 12:43:03', '2022-07-08 12:43:03', 'entrepreneur'),
(4, 'manufacturer', 'Manufacturer', 1, '2022-07-08 12:43:13', '2022-07-08 12:43:13', 'manufacturer'),
(5, 'societies', 'Societies', 1, '2022-07-08 12:43:25', '2022-07-08 12:43:25', 'societies');
COMMIT;


----updated


ALTER TABLE `z_crop` ADD `slug` VARCHAR(300) NULL DEFAULT NULL;
ALTER TABLE `z_farmers` ADD `crop_id` INT NULL DEFAULT '1';

 

DROP TABLE IF EXISTS `z_crop`;
CREATE TABLE IF NOT EXISTS `z_crop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `date_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT 1,
  `updated_by` int(11) DEFAULT NULL,
  `slug` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

INSERT INTO `z_crop` (`id`, `name`, `title`, `status`, `date_at`, `update_at`, `created_by`, `updated_by`, `slug`) VALUES
(1, 'papaya', 'Papaya', 1, '2022-07-08 14:11:34', '2022-07-08 14:13:44', 1, NULL, 'papaya'),
(2, 'lemon', 'Lemon', 1, '2022-07-08 14:12:48', NULL, 1, NULL, 'lemon'),
(3, 'tiwan pink guava', 'Tiwan Pink Guava', 1, '2022-07-08 14:14:45', NULL, 1, NULL, 'tiwan-pink-guava'),
(4, 'g9 banana', 'G9 Banana', 1, '2022-07-08 14:15:12', NULL, 1, NULL, 'g9-banana'),
(5, 'apple ber', 'Apple Ber', 1, '2022-07-08 14:15:28', NULL, 1, NULL, 'apple-ber'),
(6, 'fig', 'Fig', 1, '2022-07-08 14:16:34', NULL, 1, NULL, 'fig');
COMMIT;
 







------13-07-2022

ALTER TABLE `z_consultants` CHANGE `call_type` `call_type` VARCHAR(20) NULL DEFAULT NULL;

------14-07-2022

ALTER TABLE `z_consultant_ticket_status` ADD `badge_color` VARCHAR(200) NOT NULL DEFAULT 'primary';
UPDATE `z_consultant_ticket_status` SET `badge_color` = 'warning' WHERE `z_consultant_ticket_status`.`id` = 2;
UPDATE `z_consultant_ticket_status` SET `badge_color` = 'success' WHERE `z_consultant_ticket_status`.`id` = 3;
UPDATE `z_consultant_ticket_status` SET `badge_color` = 'danger' WHERE `z_consultant_ticket_status`.`id` = 4;




------15-07-2022

ALTER TABLE `z_booking_payments` ADD `transaction_type` VARCHAR(20) NULL DEFAULT 'booking';

DROP TABLE IF EXISTS `z_sales`;
CREATE TABLE IF NOT EXISTS `z_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `farmer_id` int(11) DEFAULT NULL,
  `stage` varchar(10) NOT NULL DEFAULT 'Created',
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `customer_mobile` varchar(40) DEFAULT NULL,
  `customer_alter_mobile` varchar(40) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `supply_address` varchar(200) DEFAULT NULL,
  `vehicle_no` varchar(50) DEFAULT NULL,
  `bank_trans_id` varchar(200) DEFAULT NULL,
  `booking_status` varchar(50) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `same_billing` varchar(10) DEFAULT NULL,
  `delivery_address` text DEFAULT NULL,
  `advance` float DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `outstanding_amount` int(11) DEFAULT 0,
  `total_paid_amount` int(11) NOT NULL DEFAULT 0,
  `refunded_amount` int(11) NOT NULL DEFAULT 0,
  `payment_mode` varchar(20) DEFAULT NULL,
  `cheque_no` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `bank_branch` varchar(200) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `pending_bill` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `agent_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) NOT NULL DEFAULT 1,
  `cancel_by` int(11) NOT NULL,
  `booking_date` date DEFAULT current_timestamp(),
  `date_at` datetime NOT NULL DEFAULT current_timestamp(),
  `create_date` date DEFAULT NULL,
  `update_at` date NOT NULL DEFAULT current_timestamp(),
  `company_id` int(11) NOT NULL DEFAULT 1,
  `cancellation_charge` int(11) NOT NULL,
  `cancellation_reason` varchar(400) NOT NULL,
  `cancellation_date` date NOT NULL DEFAULT current_timestamp(),
  `product_set` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `trans_desctription` text DEFAULT NULL,
  `reverse_charge` varchar(50) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `transport_type` varchar(50) NOT NULL,
  `supply_date` date NOT NULL DEFAULT current_timestamp(),
  `discount_amount` float DEFAULT 0,
  `gst_amount` float DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;



DROP TABLE IF EXISTS `z_sales_dtl`;
CREATE TABLE IF NOT EXISTS `z_sales_dtl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `tax_rate` float DEFAULT 0,
  `tax_amount` float DEFAULT 0,
  `cgst_rate` float DEFAULT 0,
  `cgst_amount` float DEFAULT 0,
  `sgst_rate` float DEFAULT 0,
  `sgst_amount` float DEFAULT 0,
  `igst_rate` float DEFAULT 0,
  `igst_amount` float DEFAULT 0,
  `price` float DEFAULT 0,
  `quantity` float DEFAULT 0,
  `discount` float DEFAULT 0,
  `status` int(5) DEFAULT 1,
  `sub_total_amount` float DEFAULT 0,
  `created_by` int(20) DEFAULT NULL,
  `updated_by` int(20) DEFAULT NULL,
  `date_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `company_id` int(10) DEFAULT 1,
  `data_set` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;


--28-07-2022--

ALTER TABLE `z_farmers` ADD `is_premium` INT(5) NOT NULL DEFAULT '0';




