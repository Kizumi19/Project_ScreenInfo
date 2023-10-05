-- Insertar especialidades adicionales
INSERT INTO `specialties` (`type_specialty`, `created_at`, `hidden`)
VALUES 
('Neurología', NOW(), false),
('Pediatría', NOW(), false),
('Ortopedia', NOW(), false),
('Dermatología', NOW(), false),
('Gastroenterología', NOW(), false);

-- Insertar ubicaciones adicionales
INSERT INTO `locations` (`floor`, `room`, `created_at`, `hidden`)
VALUES 
('1', 102, NOW(), false),
('2', 201, NOW(), false),
('2', 202, NOW(), false),
('3', 301, NOW(), false),
('3', 302, NOW(), false);

-- Insertar doctores adicionales
INSERT INTO `doctors` (`name`, `surname`, `specialty_id`, `location_id`, `created_at`, `hidden`)
VALUES 
('Mary', 'Smith', 2, 2, NOW(), false),
('James', 'Johnson', 3, 3, NOW(), false),
('Patricia', 'Williams', 4, 4, NOW(), false),
('Michael', 'Brown', 5, 5, NOW(), false),
('Linda', 'Taylor', 5, 5, NOW(), false);

-- Insertar horarios adicionales
INSERT INTO `schedules` (`doctor_id`, `shift`, `hidden`)
VALUES 
(2, 'day', false),
(3, 'afternoon', false),
(4, 'day', false),
(5, 'afternoon', false),
(5, 'day', false);

-- Insertar usuarios adicionales
INSERT INTO `users` (`username`, `role`, `created_at`, `hidden`)
VALUES 
('viewer1', 'viewer', NOW(), false),
('viewer2', 'viewer', NOW(), false),
('viewer3', 'viewer', NOW(), false),
('admin2', 'admin', NOW(), false),
('admin3', 'admin', NOW(), false);
