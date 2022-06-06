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

