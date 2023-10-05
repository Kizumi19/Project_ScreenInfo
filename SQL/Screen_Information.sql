CREATE TABLE `schedules` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `doctor_id` int,
  `shift` ENUM ('day', 'afternoon'),
  `hidden` boolean
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `username` varchar(255),
  `role` ENUM ('admin', 'viewer'),
  `created_at` timestamp,
  `hidden` boolean
);

CREATE TABLE `locations` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `floor` ENUM ('0', '1', '2', '3', '4'),
  `room` int,
  `created_at` timestamp,
  `hidden` boolean
);

CREATE TABLE `doctors` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255),
  `surname` varchar(255),
  `specialty_id` int,
  `location_id` int,
  `created_at` timestamp,
  `hidden` boolean
);

CREATE TABLE `specialties` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `type_specialty` varchar(255),
  `created_at` timestamp,
  `hidden` boolean
);

ALTER TABLE `schedules` ADD FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
ALTER TABLE `doctors` ADD FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`id`);
ALTER TABLE `doctors` ADD FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);
