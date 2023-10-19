INSERT INTO `specialties` (`type_specialty`, `created_at`, `hidden`)
VALUES 
('Neurología', NOW(), false),
('Pediatría', NOW(), false),
('Ortopedia', NOW(), false),
('Dermatología', NOW(), false),
('Gastroenterología', NOW(), false);

INSERT INTO `locations` (`floor`, `room`, `created_at`, `hidden`)
VALUES 
('0', 1, NOW(), false),
('0', 2, NOW(), false),
('0', 3, NOW(), false),
('0', 4, NOW(), false),
('0', 5, NOW(), false),
('0', 6, NOW(), false),
('0', 7, NOW(), false),
('0', 8, NOW(), false),
('0', 9, NOW(), false),
('0', 10, NOW(), false),
('0', 11, NOW(), false),
('0', 12, NOW(), false),
('0', 13, NOW(), false),
('0', 14, NOW(), false),
('0', 15, NOW(), false),

('1', 16, NOW(), false),
('1', 17, NOW(), false),
('1', 18, NOW(), false),
('1', 19, NOW(), false),
('1', 20, NOW(), false),
('1', 21, NOW(), false),
('1', 22, NOW(), false),
('1', 23, NOW(), false),
('1', 24, NOW(), false),
('1', 25, NOW(), false),
('1', 26, NOW(), false),

('4', 28, NOW(), false),
('4', 29, NOW(), false),
('4', 30, NOW(), false),
('4', 31, NOW(), false);



INSERT INTO `doctors` (`name`, `surname`, `location_id`, `created_at`, `hidden`)
VALUES 
('Mary', 'Smith', 2, NOW(), false),
('James', 'Johnson', 3, NOW(), false),
('Patricia', 'Williams', 4, NOW(), false),
('Michael', 'Brown', 5, NOW(), false),
('Linda', 'Taylor', 5, NOW(), false);


INSERT INTO `doctor_specialty` (`doctor_id`, `specialty_id`, `created_at`, `hidden`)
VALUES 
(1, 2, NOW(), false),
(2, 3, NOW(), false),
(3, 4, NOW(), false),
(4, 5, NOW(), false),
(5, 5, NOW(), false);

INSERT INTO `schedules` (`doctor_id`, `day`, `shift`, `created_at`, `hidden`)
VALUES 
(1, 'monday', 'morning', NOW(), false), 
(2, 'tuesday', 'afternoon', NOW(), false), 
(3, 'wednesday', 'morning', NOW(), false), 
(4, 'tuesday', 'afternoon', NOW(), false), 
(5, 'friday', 'morning', NOW(), false);

INSERT INTO `users` (`username`, `role`, `created_at`, `hidden`)
VALUES 
('viewer1', 'viewer', NOW(), false),
('viewer2', 'viewer', NOW(), false),
('viewer3', 'viewer', NOW(), false),
('admin2', 'admin', NOW(), false),
('admin3', 'admin', NOW(), false);
