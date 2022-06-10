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


