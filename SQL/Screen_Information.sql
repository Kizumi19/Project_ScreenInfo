CREATE TABLE `schedules` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `day` ENUM ('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday') NOT NULL,
  `shift` ENUM ('morning', 'afternoon') NOT NULL,
  `created_at` timestamp,
  `hidden` boolean
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `role` ENUM ('admin', 'viewer') NOT NULL,
  `created_at` timestamp,
  `hidden` boolean
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE `locations` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `floor` ENUM ('0', '1', '2', '3', '4') NOT NULL,
  `room` int NOT NULL,
  `created_at` timestamp,
  `hidden` boolean
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `doctors` (
  `id` integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `surname` varchar(255),
  `location_id` integer,
  `created_at` timestamp,
  `hidden` boolean
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `specialties` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `type_specialty` varchar(255) NOT NULL,
  `created_at` timestamp,
  `hidden` boolean
) CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `doctor_specialty` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `specialty_id` int NOT NULL,
  `created_at` timestamp,
  `hidden` boolean
);


ALTER TABLE `schedules` ADD FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
ALTER TABLE `doctors` ADD FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
ALTER TABLE `doctor_specialty` ADD FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`);
ALTER TABLE `doctor_specialty` ADD FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
