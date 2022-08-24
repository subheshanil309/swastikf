
---date 02-07-2022 --
DROP TABLE IF EXISTS `z_admin_profile`;
CREATE TABLE IF NOT EXISTS `z_admin_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `date_of_birth` datetime DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1,
  `date_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;


DROP TABLE IF EXISTS `z_role`;
CREATE TABLE IF NOT EXISTS `z_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `slug_url` varchar(200) DEFAULT NULL,
  `date_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `z_role` (`id`, `title`, `name`, `slug_url`, `date_at`, `update_at`, `created_by`, `update_by`, `company_id`, `status`) VALUES
(1, 'Admin', 'admin', 'admin', '2022-08-02 11:05:53', '2022-08-03 10:09:27', 1, 1, 1, 1),
(2, 'Employee', 'employee', 'employee', '2022-08-02 11:05:53', '2022-08-16 12:45:34', 1, 1, 1, 1);
COMMIT;


DROP TABLE IF EXISTS `z_admin_role`;
CREATE TABLE IF NOT EXISTS `z_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
 
INSERT INTO `z_admin_role` (`id`, `user_id`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`, `company_id`, `status`) VALUES
(1, 1, 1, '2022-08-02 14:04:38', 1, '2022-08-03 18:03:37', 1, 1, 1);
COMMIT;




DROP TABLE IF EXISTS `z_module_role`;
CREATE TABLE IF NOT EXISTS `z_module_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `date_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `action_required` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `z_module_role` (`id`, `module_id`, `role_id`, `date_at`, `created_by`, `updated_at`, `updated_by`, `company_id`, `status`, `action_required`) VALUES
(null, 1, 1, '2022-08-02 13:55:06', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null, 2, 1, '2022-08-02 13:55:06', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null, 3, 1, '2022-08-02 13:55:06', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null, 10, 1, '2022-08-02 13:55:06', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null, 11, 1, '2022-08-02 13:55:06', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null, 12, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null, 13, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null, 14, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null, 15, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  16, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  4, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  5, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  6, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  7, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  17, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  18, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  19, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  8, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  9, 1, '2022-08-03 13:35:30', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  20, 1, '2022-08-03 13:51:53', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  21, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  22, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  23, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  24, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  25, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  26, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  27, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  28, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  29, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  31, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  32, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  33, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  34, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  35, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  36, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  37, 1, '2022-08-03 14:20:42', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  38, 1, '2022-08-03 14:24:13', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  39, 1, '2022-08-05 11:38:58', 1, '2022-08-24 17:48:17', 1, 1, 1, '[]'),
(null,  40, 1, '2022-08-05 11:38:58', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}'),
(null,  41, 1, '2022-08-05 11:38:58', 1, '2022-08-24 17:48:17', 1, 1, 1, '{\"lists\":\"lists\",\"create\":\"create\",\"edit\":\"edit\",\"delete\":\"delete\",\"view\":\"view\"}');




DROP TABLE IF EXISTS `z_module_m`;
CREATE TABLE IF NOT EXISTS `z_module_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(200) DEFAULT NULL,
  `module_url` varchar(300) DEFAULT '#',
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `icon_name` varchar(100) DEFAULT NULL,
  `orders_with` int(10) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `parent_id` int(11) DEFAULT 0,
  `target` varchar(100) DEFAULT NULL,
  `slug_url` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_with` (`orders_with`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

 

INSERT INTO `z_module_m` (`id`, `module_name`, `module_url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `company_id`, `icon_name`, `orders_with`, `status`, `parent_id`, `target`, `slug_url`) VALUES
(1, 'Dashboard', 'admin/dashboard', '2022-08-02 11:56:53', 1, '2022-08-02 11:56:53', 1, 1, 'bx bx-home-circle', 1, 1, 0, NULL, NULL),
(2, 'Customer Support', '#', '2022-08-02 11:56:53', 1, '2022-08-02 11:56:53', 1, 1, 'bx bx-support', 2, 1, 0, NULL, NULL),
(3, 'Sales', '#', '2022-08-02 12:15:00', 1, '2022-08-02 12:15:00', 1, 1, 'bx bxs-cart', 3, 1, 0, NULL, NULL),
(4, 'Purchase', '#', '2022-08-02 12:15:00', 1, '2022-08-02 12:15:00', 1, 1, 'bx bxs-shopping-bag', 4, 1, 0, NULL, NULL),
(5, 'Farmers', '#', '2022-08-02 12:20:05', 1, '2022-08-02 12:20:05', 1, 1, 'bx bx-group', 5, 1, 0, NULL, NULL),
(6, 'Documents', '#', '2022-08-02 12:20:05', 1, '2022-08-02 12:20:05', 1, 1, 'bx bxs-file-doc', 6, 1, 0, NULL, NULL),
(7, 'Settings', '#', '2022-08-02 12:20:05', 1, '2022-08-02 12:20:05', 1, 1, 'bx bx-cog', 7, 1, 0, NULL, NULL),
(8, 'Type', '#', '2022-08-02 12:20:05', 1, '2022-08-02 12:20:05', 1, 1, 'bx bx-duplicate', 8, 1, 0, NULL, NULL),
(9, 'Profile', '#', '2022-08-02 12:20:05', 1, '2022-08-02 12:20:05', 1, 1, 'bx bx-user', 9, 1, 0, NULL, NULL),
(10, 'Bookings', 'admin/bookings', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 21, 1, 2, NULL, NULL),
(11, 'Delivery Management', 'admin/delivery_management', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 22, 1, 2, NULL, NULL),
(12, 'Consultation', 'admin/consultants', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 23, 1, 2, NULL, NULL),
(13, 'Harvesting Management', 'admin/harvesting_management', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 24, 1, 2, NULL, NULL),
(14, 'Premium Customer', 'admin/farmers?is_premium=1', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 25, 1, 2, NULL, NULL),
(15, 'Sales', 'admin/sales', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 31, 1, 3, NULL, NULL),
(16, 'RazorPay Sales', 'admin/razorpay_sales', '2022-08-02 12:30:52', 1, '2022-08-02 12:30:52', 1, 1, NULL, 32, 1, 3, NULL, NULL),
(17, 'Access Mgt', '#', '2022-08-03 11:58:32', 1, '2022-08-03 12:11:31', 1, 1, '', 71, 1, 7, NULL, NULL),
(18, 'Manage Module', 'admin/modules', '2022-08-03 12:14:24', 1, '2022-08-03 13:47:26', 1, 1, '', 711, 1, 17, NULL, NULL),
(19, 'Manage Role', 'admin/roles', '2022-08-03 12:15:04', 1, '2022-08-03 13:47:55', 1, 1, '', 712, 1, 17, NULL, NULL),
(20, 'Add New Farmers', 'admin/customer/addnew', '2022-08-03 13:51:35', 1, '2022-08-03 13:52:31', 1, 1, '', 51, 1, 5, NULL, NULL),
(21, 'Farmers', 'admin/farmers', '2022-08-03 13:55:24', 1, '2022-08-03 13:55:24', NULL, 1, '', 52, 1, 5, NULL, NULL),
(22, 'K Documents', 'admin/kdocuments', '2022-08-03 13:57:41', 1, '2022-08-03 13:57:41', NULL, 1, '', 61, 1, 6, NULL, NULL),
(23, 'Company', 'admin/company', '2022-08-03 14:00:36', 1, '2022-08-03 14:00:36', NULL, 1, '', 72, 1, 7, NULL, NULL),
(24, 'Category', 'admin/category', '2022-08-03 14:02:12', 1, '2022-08-03 14:02:12', NULL, 1, '', 73, 1, 7, NULL, NULL),
(25, 'Product', 'admin/product', '2022-08-03 14:08:01', 1, '2022-08-03 14:08:01', NULL, 1, '', 74, 1, 7, NULL, NULL),
(26, 'Agent Mgt', 'admin/agents', '2022-08-03 14:08:52', 1, '2022-08-03 14:09:16', 1, 1, '', 75, 1, 7, NULL, NULL),
(27, 'Country', 'admin/country', '2022-08-03 14:09:59', 1, '2022-08-03 14:09:59', NULL, 1, '', 76, 1, 7, NULL, NULL),
(28, 'State', 'admin/state', '2022-08-03 14:11:22', 1, '2022-08-03 14:11:22', NULL, 1, '', 77, 1, 7, NULL, NULL),
(29, 'District', 'admin/district', '2022-08-03 14:12:06', 1, '2022-08-03 14:12:06', NULL, 1, '', 78, 1, 7, NULL, NULL),
(31, 'Tehsil', 'admin/city', '2022-08-03 14:13:31', 1, '2022-08-03 14:13:31', NULL, 1, '', 79, 1, 7, NULL, NULL),
(32, 'K Doduments Category', 'admin/document_category', '2022-08-03 14:14:47', 1, '2022-08-03 14:14:47', NULL, 1, '', 80, 1, 7, NULL, NULL),
(33, 'Farmer Type', 'admin/farmer_type', '2022-08-03 14:17:14', 1, '2022-08-03 14:17:14', NULL, 1, '', 81, 1, 8, NULL, 'farmer-type'),
(34, 'Call Type', 'admin/call_type', '2022-08-03 14:17:47', 1, '2022-08-03 14:17:47', NULL, 1, '', 82, 1, 8, NULL, 'call-type'),
(35, 'Crop Type', 'admin/crop_type', '2022-08-03 14:18:45', 1, '2022-08-03 14:18:45', NULL, 1, '', 83, 1, 8, NULL, 'crop-type'),
(36, 'Edit Profile', 'admin/profile/edit', '2022-08-03 14:19:38', 1, '2022-08-03 14:19:38', NULL, 1, '', 91, 1, 9, NULL, 'edit-profile'),
(37, 'Change Password', 'admin/profile/change_passowrd', '2022-08-03 14:20:20', 1, '2022-08-03 14:20:20', NULL, 1, '', 92, 1, 9, NULL, 'change-password'),
(38, 'Manage User Role', 'admin/admin_roles', '2022-08-03 14:23:53', 1, '2022-08-03 17:24:02', 1, 1, '', 713, 1, 17, '', 'manage-user-role'),
(39, 'Attendance', '#', '2022-08-04 13:25:43', 1, '2022-08-04 13:28:07', 1, 1, 'bx bx-fingerprint', 10, 1, 0, '', 'attendance'),
(40, 'Attendance Form', 'admin/attendance/addnew', '2022-08-04 13:31:13', 1, '2022-08-04 13:31:13', NULL, 1, '', 101, 1, 39, '', 'attendance-form'),
(41, 'Attendance Log', 'admin/attendance', '2022-08-04 13:31:58', 1, '2022-08-04 13:31:58', NULL, 1, '', 102, 1, 39, '', 'attendance-log');
COMMIT;

DROP TABLE IF EXISTS `z_village_pin`;
CREATE TABLE IF NOT EXISTS `z_village_pin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `date_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(200) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `z_village_pin`
--

INSERT INTO `z_village_pin` (`id`, `name`, `pincode`, `city_id`, `state_id`, `district_id`, `country_id`, `date_at`, `update_at`, `status`) VALUES
(1, 'Bhikhamapur', '221404', 998, 33, 229, 105, '2022-08-22 14:58:52', '2022-08-22 14:58:52', 1),
(2, 'Purani Bazar', '221406', 998, 33, 229, 105, '2022-08-22 15:08:20', '2022-08-22 15:08:20', 1),
(3, 'Ekouni', '221404', 998, 33, 229, 105, '2022-08-22 15:09:13', '2022-08-22 15:09:13', 1),
(4, 'Matethu', '221404', 998, 33, 229, 105, '2022-08-22 15:20:38', '2022-08-22 15:20:38', 1),
(5, 'Mondh', '221406', 998, 33, 229, 105, '2022-08-22 15:28:13', '2022-08-22 15:28:13', 1),
(6, 'Suriyawan', '221404', 998, 33, 229, 105, '2022-08-22 15:33:35', '2022-08-22 15:33:35', 1),
(7, 'Bhori', '221404', 998, 33, 229, 105, '2022-08-22 15:37:51', '2022-08-22 15:37:51', 1),
(8, 'Abarana', '221404', 998, 33, 229, 105, '2022-08-22 15:43:47', '2022-08-22 15:43:47', 1),
(9, 'Abholi', '221404', 998, 33, 229, 105, '2022-08-22 15:45:21', '2022-08-22 15:45:21', 1),
(10, 'Kador', '221404', 998, 33, 229, 105, '2022-08-22 15:51:20', '2022-08-22 15:51:20', 1),
(11, 'Achhawar', '221404', 998, 33, 229, 105, '2022-08-22 15:57:15', '2022-08-22 16:07:22', 1),
(12, 'Swaipur', '311603', 635, 29, 140, 105, '2022-08-22 16:20:46', '2022-08-22 16:20:46', 1),
(13, 'Padri', '272151', 940, 33, 180, 105, '2022-08-22 16:21:45', '2022-08-22 16:21:45', 1),
(14, 'Ghinauna', '207124', 5926, 33, 680, 105, '2022-08-22 16:24:36', '2022-08-22 16:24:36', 1),
(15, 'Akola', '444004', 3991, 21, 533, 105, '2022-08-22 16:25:17', '2022-08-23 09:01:59', 1),
(16, 'Asaithapatati', '223103', 984, 33, 202, 105, '2022-08-22 16:25:54', '2022-08-22 16:25:54', 1),
(17, 'Madapur', '202129', 754, 33, 168, 105, '2022-08-22 16:26:23', '2022-08-22 16:26:23', 1),
(18, 'Kuthond', '285125', 852, 33, 201, 105, '2022-08-22 16:26:58', '2022-08-22 16:26:58', 1),
(19, 'Bishunpur Anant', '843101', 1201, 5, 260, 105, '2022-08-22 16:27:38', '2022-08-22 16:27:38', 1),
(20, 'Maghagai', '262902', 6028, 33, 685, 105, '2022-08-22 16:29:57', '2022-08-22 16:29:57', 1),
(21, 'Rasoolpur Mithiberi', '246763', 354, 34, 96, 105, '2022-08-22 16:30:33', '2022-08-22 16:30:33', 1),
(22, 'Karsua', '202001', 755, 33, 168, 105, '2022-08-22 16:33:21', '2022-08-22 16:33:21', 1),
(23, 'Madhapithu', '281307', 760, 33, 200, 105, '2022-08-22 16:34:17', '2022-08-22 16:34:17', 1),
(24, 'Hardua', '485334', 3462, 20, 490, 105, '2022-08-22 16:35:12', '2022-08-22 16:35:12', 1),
(25, 'Deori Hardo Patti', '230001', 881, 33, 224, 105, '2022-08-22 16:35:54', '2022-08-22 16:35:54', 1),
(26, 'Kakra Kalan', '243503', 789, 33, 179, 105, '2022-08-22 16:37:22', '2022-08-22 16:37:22', 1),
(27, 'Ambapura', '222129', 393, 29, 139, 105, '2022-08-22 17:37:29', '2022-08-22 17:37:29', 1),
(28, 'Ghatari', '321408', 512, 29, 139, 105, '2022-08-22 18:02:45', '2022-08-22 18:02:45', 1),
(29, 'Ahiraura', '231301', 921, 33, 174, 105, '2022-08-22 18:06:35', '2022-08-22 18:06:35', 1),
(32, 'Asaithapatat', '223103', 984, 33, 202, 105, '2022-08-23 09:03:10', '2022-08-23 09:03:10', 1),
(33, 'Karsua', '202001', 754, 33, 168, 105, '2022-08-23 09:06:19', '2022-08-23 09:06:19', 1),
(34, 'Barkagaon', '825311', 2657, 16, 391, 105, '2022-08-23 09:14:44', '2022-08-23 09:14:44', 1),
(35, 'Barkagaon', '825311', 2653, 16, 391, 105, '2022-08-23 09:16:06', '2022-08-23 09:16:06', 1),
(36, 'Chheoki', '212105', 890, 33, 169, 105, '2022-08-23 09:17:47', '2022-08-23 09:17:47', 1),
(37, 'Chheoki', '212105', 888, 33, 169, 105, '2022-08-23 12:04:25', '2022-08-23 12:04:25', 1),
(38, 'Soraon', '212502', 888, 33, 169, 105, '2022-08-23 12:07:28', '2022-08-23 12:07:28', 1);
COMMIT;

ALTER TABLE `z_booking` ADD `village_pin_id` INT NULL DEFAULT NULL;