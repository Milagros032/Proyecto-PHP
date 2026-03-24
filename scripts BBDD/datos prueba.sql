--TRUNCATE TABLE compras, clientes, productos RESTART IDENTITY;

INSERT INTO clientes (nombre, apellido, dni, fecha_nacimiento) VALUES
('Juan', 'Perez', '12345678', '2000-05-10'),
('Ana', 'Gomez', '23456789', '2010-07-15'),
('Luis', 'Martinez', '34567890', '1995-03-20');

INSERT INTO productos (nombre, descripcion) VALUES
('fideo', 'Paquete de fideos'),
('arroz', 'Arroz blanco');

INSERT INTO compras (cliente_id, producto_id, precio) VALUES
(1, 1, 1500),
(2, 1, 1400),
(3, 2, 1200);