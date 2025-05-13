CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(20),
    telefono1 VARCHAR(15),
    telefono2 VARCHAR(15),
    correo VARCHAR(100),
    direccion TEXT
);

INSERT INTO clientes (nombre, cedula, telefono1, telefono2, correo, direccion) VALUES
('Juan Pérez', '1234567890', '3001234567', '3109876543', 'juan.perez@example.com', 'Calle 10 #15-20, Bogotá'),
('María Gómez', '1098765432', '3151234567', NULL, 'maria.gomez@example.com', 'Carrera 8 #10-55, Medellín'),
('Carlos Ramírez', '5678901234', '3129876543', '3112345678', 'carlos.ramirez@example.com', 'Avenida 30 #45-90, Cali'),
('Ana Torres', '2345678901', '3145678901', NULL, 'ana.torres@example.com', 'Calle 5 #20-15, Bucaramanga'),
('Luis Fernández', '3456789012', '3184567890', NULL, 'luis.fernandez@example.com', 'Carrera 15 #30-45, Cartagena'),
('Sofía López', '4567890123', '3203456789', '3176543210', 'sofia.lopez@example.com', 'Avenida 7 #20-33, Barranquilla'),
('Miguel Herrera', '9876543210', '3114567890', NULL, 'miguel.herrera@example.com', 'Calle 12 #8-40, Manizales'),
('Daniela Martínez', '8765432109', '3191234567', '3123456789', 'daniela.martinez@example.com', 'Carrera 10 #25-60, Pereira'),
('Andrés Rivera', '7654321098', '3167890123', NULL, 'andres.rivera@example.com', 'Calle 3 #9-22, Cúcuta'),
('Paula Nieto', '6543210987', '3222345678', '3139876543', 'paula.nieto@example.com', 'Carrera 11 #17-50, Santa Marta');
