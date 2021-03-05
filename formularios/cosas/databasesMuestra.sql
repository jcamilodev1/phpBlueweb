CREATE DATABASE IF NOT EXISTS punto_venta;
show databases;
USE punto_venta;
SHOW TABLES;
CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_usuario INTEGER UNSIGNED NOT NULL,
    nombre VARCHAR(50) NOT NULL DEFAULT 'desconocido',
    dni INTEGER UNSIGNED NOT NULL,
    correo VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    id_tienda INTEGER UNSIGNED NOT NULL,
    cargo VARCHAR(30) NOT NULL DEFAULT 'vendedor'
);
CREATE TABLE IF NOT EXISTS tiendas (
	id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	id_tienda INTEGER UNSIGNED NOT NULL,
	nombre_tienda VARCHAR(70) NOT NULL,
	ubicacion VARCHAR(255) NOT NULL,
	tipo_negocio VARCHAR(150) NOT NULL DEFAULT 'Bodega'
);
CREATE TABLE IF NOT EXISTS ventas (
	id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT, 
	fecha VARCHAR(100) NOT NULL,
	hora INTEGER UNSIGNED NOT NULL,
	id_producto INTEGER UNSIGNED NOT NULL,
	cantidad_vendida INTEGER UNSIGNED NOT NULL DEFAULT 1,
	precio_total DOUBLE(8,2) NOT NULL DEFAULT '0.00',
	id_tienda INTEGER UNSIGNED NOT NULL,
	id_cliente INTEGER UNSIGNED NOT NULL
);
CREATE TABLE IF NOT EXISTS productos (
	id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	id_producto INTEGER UNSIGNED NOT NULL,
	nombre_producto VARCHAR(100) NOT NULL,
	precio_unitario DOUBLE(8,2) UNSIGNED NOT NULL DEFAULT '0.00',
	cantidad_stock INTEGER UNSIGNED,
	id_tienda INTEGER UNSIGNED NOT NULL,
	description TEXT
);
CREATE TABLE IF NOT EXISTS clientes (
	id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	id_tienda INTEGER UNSIGNED NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	dni INTEGER UNSIGNED NOT NULL
);


INSERT INTO usuarios(id_usuario, nombre, dni, correo, password, id_tienda, cargo) VALUES('1', 'Sergio', '82899829', 'sergio@gmail.com', 'hola', '0', 'master');


INSERT INTO usuarios(id_usuario, nombre, dni, correo, password, id_tienda, cargo) 
	VALUES('2', 'Jose', '12345678', 'jose@gmail.com', 'asunto', '1', 'administrador'), 
	('3', 'Marco', '87654321', 'marco@gmail.com', 'oculto', '3', 'vendedor'), 
	('1', 'Sergio', '96387541', 'nuevo@gmail.com', 'nuevo', '3', 'master'), 
	('4', 'Luis', '81723645', 'luis@gmail.com', 'escondido', '2', 'vendedor'),
	('5', 'Manuel', '87654123', 'manuel@gmail.com', 'signo', '4', 'administrador');


INSERT INTO tiendas(id_tienda, nombre_tienda, ubicacion, tipo_negocio) 
	VALUES('1', 'Amigos', 'Santa Anita', 'Ferrereria'), 
	('2', 'Grupo', 'San Juan de Lurigancho', 'Restaurante'), 
	('3', 'Tambo', 'Miraflores', 'Vidriería'),
	('4', 'Caral', 'Huaycan', 'Lubricentro'),
	('5', 'Chamo', 'Surco', 'Eventos'),
	('6', 'Serox', 'Surquillo', 'Cerrajero'),
	('7', 'Productos', 'San Martin de Porres', 'Recreación');


INSERT INTO productos(nombre_producto, precio_unitario, cantidad_stock, id_tienda, description) 
	VALUES('Tomate', '5.00', '84', '2', 'Este es un producto muy bueno'), 
	('Camote', '80.00', '90', '2', 'Estos son los productos que la gente quiere'), 
	('Yuca', '40.20', '44', '3', 'Los productos mas grandes'),
	('Lechuga', '4.00', '20', '3', 'Los productos mas finos');

INSERT INTO clientes (id_tienda, nombre, dni)
	VALUES('2', 'Eduardo', '85263741'),
	('3', 'Alberto', '98765432'),
	('4', 'Julio', '96385741'),
	('2', 'Miguel', '98745623'),
	('2', 'Jorge', '98712345');


UPDATE productos SET id_producto = 4, precio_unitario = 6, description = 'El mejor producto de todos' WHERE id = 1 LIMIT 1;



select * from usuarios;

SELECT * FROM usuarios WHERE id_usuario = 5\G;

INSERT INTO tiendas(id_tienda, nombre_tienda, ubicacion, tipo_negocio) VALUES('1', 'Ferretero', 'Santa Anita', 'Ferretería'), ('2', 'Cocinero', 'San Martin', 'Restaurante');

SELECT * FROM tiendas;

SELECT * FROM productos;

INSERT INTO productos(precio_unitario, cantidad_stock, id_tienda) VALUES('2', '10', (SELECT id_tienda FROM tiendas WHERE nombre_tienda = 'Cocinero' LIMIT 1));

SELECT * FROM productos;


INSERT INTO productos(precio_unitario, cantidad_stock, id_tienda) VALUES('2', '10', (SELECT id_tienda FROM tiendas WHERE nombre_tienda = 'Ferretero' LIMIT 1));

SELECT * FROM productos;


--c:\xampp\mysql\bin>mysql -h localhost -u root -p < C:\xampp\htdocs\puntoDeVenta\estructura2.sql





