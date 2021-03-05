DROP DATABASE cosas_tabla;

CREATE DATABASE IF NOT EXISTS cosas_tabla;
show databases;
USE cosas_tabla;

SHOW TABLES;
CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    id_usuario INTEGER UNSIGNED NOT NULL,
    nombre VARCHAR(50) NOT NULL DEFAULT 'desconocido',
    correo VARCHAR(50) NOT NULL UNIQUE,
    password_usuarios VARCHAR(50) NOT NULL,
	activo_o_desactivado INTEGER(2) NOT NULL DEFAULT 1
);
CREATE TABLE IF NOT EXISTS mazos (
	id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	id_grupos_de_productos INTEGER UNSIGNED NOT NULL,
	nombre_grupos_de_productos VARCHAR(100) NOT NULL,
	descripcion_grupo_del_producto VARCHAR(150) NOT NULL DEFAULT 'Bodega',
    id_usuario INTEGER UNSIGNED NOT NULL,
	activo_o_desactivado INTEGER(2) NOT NULL DEFAULT 1
);
CREATE TABLE IF NOT EXISTS productos (
	id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	id_producto INTEGER UNSIGNED NOT NULL,
	id_usuario INTEGER UNSIGNED NOT NULL,
	id_mazo INTEGER UNSIGNED NOT NULL,
	nombre_producto VARCHAR(100) NOT NULL,
    cantidad_del_producto INTEGER UNSIGNED NOT NULL,
    producto_contenedor INTEGER UNSIGNED NOT NULL,
    precio_del_producto INTEGER UNSIGNED NOT NULL,
    descripcion_del_producto TEXT,
    activo_o_desactivado INTEGER(2) NOT NULL DEFAULT 1
);

INSERT INTO usuarios(id_usuario, nombre, correo, password_usuarios)
    VALUES
	('2', 'Sergio', 'sergio@gmail.com', 'hola');

INSERT INTO usuarios(id_usuario, nombre, correo, password_usuarios)
	VALUES
    ('9', 'Jose', 'jose@gmail.com', 'asunto'), 
	('3', 'Marco', 'marco@gmail.com', 'oculto'), 
	('6', 'Sergio', 'nuevo@gmail.com', 'nuevo'), 
	('4', 'Luis', 'luis@gmail.com', 'escondido'),
	('1', 'Manuel', 'manuel@gmail.com', 'signo');


INSERT INTO mazos(id_grupos_de_productos, nombre_grupos_de_productos, descripcion_grupo_del_producto, id_usuario)
    VALUES
    ('5', 'Mi primer almacen', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. ', '1'),
    ('4', 'Mi tienda', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. ', '1'),
    ('3', 'Mi restaurante', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. ', '2'),
    ('0', 'Mi garaje', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. ', '2');

INSERT INTO productos(id_producto, id_usuario, id_mazo, nombre_producto, cantidad_del_producto, producto_contenedor, precio_del_producto, descripcion_del_producto, activo_o_desactivado) 
	VALUES
	('1', '12', '1', 'Tomate', '5', '1', '15', 'Este es un producto muy bueno',1),
	('4', '11', '4', 'Zapatos', '8', '1', '456', 'Este es un producto muy bueno',1),
	('3', '10', '3', 'Mesa', '6', '1', '27', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Mouse', '7', '2', '45', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Zanahoria', '5', '2', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Trujillo', '8', '2', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Puerta', '6', '3', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Ventana', '7', '3', '45', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Zanahoria', '5', '3', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Chimbote', '8', '4', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Corazon', '6', '4', '27', 'Este es un producto muy bueno',1),
	('2', '11', '2', 'Zapatos', '8', '1', '456', 'Este es un producto muy bueno',1),
	('3', '10', '3', 'Mesa', '6', '1', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Mouse', '7', '2', '45', 'Este es un producto muy bueno',1),
	('1', '1', '1', 'Zanahoria', '5', '2', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Trujillo', '8', '2', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Puerta', '6', '3', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Ventana', '7', '3', '45', 'Este es un producto muy bueno',1),
	('5', '1', '5', 'Zanahoria', '5', '3', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Chimbote', '8', '4', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Corazon', '6', '4', '27', 'Este es un producto muy bueno',1),
	('2', '11', '2', 'Zapatos', '8', '1', '456', 'Este es un producto muy bueno',1),
	('3', '10', '3', 'Mesa', '6', '1', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Mouse', '7', '2', '45', 'Este es un producto muy bueno',1),
	('1', '1', '1', 'Zanahoria', '5', '2', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Trujillo', '8', '2', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Puerta', '6', '3', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Ventana', '7', '3', '45', 'Este es un producto muy bueno',1),
	('1', '1', '1', 'Zanahoria', '5', '3', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Chimbote', '8', '4', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Corazon', '6', '4', '27', 'Este es un producto muy bueno',1),
	('2', '11', '2', 'Zapatos', '8', '1', '456', 'Este es un producto muy bueno',1),
	('3', '10', '3', 'Mesa', '6', '1', '27', 'Este es un producto muy bueno',1),
	('7', '1', '7', 'Mouse', '7', '2', '45', 'Este es un producto muy bueno',1),
	('7', '1', '7', 'Zanahoria', '5', '2', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Trujillo', '8', '2', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Puerta', '6', '3', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Ventana', '7', '3', '45', 'Este es un producto muy bueno',1),
	('1', '1', '1', 'Zanahoria', '5', '3', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Chimbote', '8', '4', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Corazon', '6', '4', '27', 'Este es un producto muy bueno',1),
	('2', '11', '2', 'Zapatos', '8', '1', '456', 'Este es un producto muy bueno',1),
	('3', '10', '3', 'Mesa', '6', '1', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Mouse', '7', '2', '45', 'Este es un producto muy bueno',1),
	('1', '1', '1', 'Zanahoria', '5', '2', '15', 'Este es un producto muy bueno',1),
	('4', '1', '4', 'Trujillo', '8', '2', '456', 'Este es un producto muy bueno',1),
	('3', '1', '3', 'Puerta', '6', '3', '27', 'Este es un producto muy bueno',1),
	('2', '5', '2', 'Ventana', '7', '3', '45', 'Este es un producto muy bueno',1),
	('1', '4', '1', 'Zanahoria', '5', '3', '15', 'Este es un producto muy bueno',1),
	('4', '3', '4', 'Chimbote', '8', '4', '456', 'Este es un producto muy bueno',1),
	('3', '2', '3', 'Corazon', '6', '4', '27', 'Este es un producto muy bueno',1),
	('2', '11', '2', 'Zapatos', '8', '1', '456', 'Este es un producto muy bueno',1),
	('3', '10', '3', 'Mesa', '6', '1', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Mouse', '7', '2', '45', 'Este es un producto muy bueno',1),
	('1', '8', '1', 'Zanahoria', '5', '2', '15', 'Este es un producto muy bueno',1),
	('4', '7', '4', 'Trujillo', '8', '2', '456', 'Este es un producto muy bueno',1),
	('3', '6', '3', 'Puerta', '6', '3', '27', 'Este es un producto muy bueno',1),
	('6', '5', '6', 'Ventana', '7', '3', '45', 'Este es un producto muy bueno',1),
	('1', '4', '1', 'Zanahoria', '5', '3', '15', 'Este es un producto muy bueno',1),
	('4', '3', '4', 'Chimbote', '8', '4', '456', 'Este es un producto muy bueno',1),
	('3', '2', '3', 'Corazon', '6', '4', '27', 'Este es un producto muy bueno',1),
	('2', '1', '2', 'Mouse', '7', '4', '45', 'Este es un producto muy bueno',1);


UPDATE productos SET id_producto = 1, producto_contenedor = 6, descripcion_del_producto = 'El mejor producto de todos' WHERE id_producto = 1 LIMIT 1;



select * from usuarios;

SELECT * FROM usuarios WHERE id_usuario = 5\G;



-- INSERT INTO productos(precio_unitario, cantidad_stock, id_tienda) VALUES('2', '10', (SELECT id_tienda FROM tiendas WHERE nombre_tienda = 'Cocinero' LIMIT 1));

SELECT * FROM productos;
-- INSERT INTO productos(precio_unitario, cantidad_stock, id_tienda) VALUES('2', '10', (SELECT id_tienda FROM tiendas WHERE nombre_tienda = 'Ferretero' LIMIT 1));

SELECT * FROM productos;
--c:\xampp\mysql\bin>mysql -h localhost -u root -p < C:\xampp\htdocs\puntoDeVenta\estructura2.sql
SHOW TABLES; SELECT * FROM productos; SELECT * FROM usuarios; SELECT id, id_grupos_de_productos, nombre_grupos_de_productos, id_usuario FROM mazos;



SHOW TABLES; SELECT * FROM productos; SELECT * FROM usuarios; SELECT * FROM mazos;
