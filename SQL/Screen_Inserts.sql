INSERT INTO `specialties` (`type_specialty`, `created_at`, `hidden`)
VALUES 
('Neurología', NOW(), false),
('Pediatría', NOW(), false),
('Ortopedia', NOW(), false),
('Dermatología', NOW(), false),
('Gastroenterología', NOW(), false);

INSERT INTO `locations` (`floor`, `room`, `created_at`, `hidden`)
VALUES 
('1', 102, NOW(), false),
('2', 201, NOW(), false),
('2', 202, NOW(), false),
('3', 301, NOW(), false),
('3', 302, NOW(), false);

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
