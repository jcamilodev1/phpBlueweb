  DROP DATABASE cosas_tabla;

  CREATE DATABASE IF NOT EXISTS cosas_tabla;
  show databases;
  USE cosas_tabla;

  -- phpMyAdmin SQL Dump
  -- version 5.0.4
  -- https://www.phpmyadmin.net/
  --
  -- Servidor: 127.0.0.1
  -- Tiempo de generación: 04-02-2021 a las 02:48:14
  -- Versión del servidor: 10.4.17-MariaDB
  -- Versión de PHP: 7.4.14

  SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
  START TRANSACTION;
  SET time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Base de datos: `cosas_tabla`
  --

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `mazos`
  --

  CREATE TABLE `mazos` (
    `id` int(10) UNSIGNED NOT NULL,
    `id_grupos_de_productos` int(10) UNSIGNED NOT NULL,
    `nombre_grupos_de_productos` varchar(100) NOT NULL,
    `descripcion_grupo_del_producto` varchar(150) NOT NULL DEFAULT 'Bodega',
    `id_usuario` int(10) UNSIGNED NOT NULL,
    `activo_o_desactivado` int(2) NOT NULL DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Volcado de datos para la tabla `mazos`
  --

  INSERT INTO `mazos` (`id`, `id_grupos_de_productos`, `nombre_grupos_de_productos`, `descripcion_grupo_del_producto`, `id_usuario`, `activo_o_desactivado`) VALUES
  (1, 5, 'Mi primer almacen', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto', 1, 0),
  (2, 4, 'Mi tienda', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto', 1, 0),
  (3, 3, 'Mi restaurante', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto', 2, 0),
  (4, 0, 'Mi garaje', 'Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto. Descripción por defecto del producto', 2, 1),
  (5, 1, 'casa', 'asdf', 1, 0),
  (6, 2, 'casa', 'Cosas de la casa', 1, 0),
  (7, 3, 'hey', 'asdf', 1, 0),
  (8, 4, 'person', 'asdf', 1, 0),
  (9, 5, 'kkk', 'd', 1, 0),
  (10, 6, 'casa mas', ' Camino ', 1, 1),
  (11, 7, 'Comentario', ' probar ', 1, 1),
  (12, 8, 'Comprar', 'comprar', 1, 1),
  (13, 9, 'hey@gmail.com', 'hey@gmail.com', 3, 1);

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `productos`
  --

  CREATE TABLE `productos` (
    `id` int(10) UNSIGNED NOT NULL,
    `id_producto` int(10) UNSIGNED NOT NULL,
    `id_usuario` int(10) UNSIGNED NOT NULL,
    `id_mazo` int(10) UNSIGNED NOT NULL,
    `nombre_producto` varchar(100) NOT NULL,
    `cantidad_del_producto` int(10) UNSIGNED NOT NULL,
    `producto_contenedor` int(10) UNSIGNED NOT NULL,
    `precio_del_producto` int(10) UNSIGNED NOT NULL,
    `descripcion_del_producto` text DEFAULT NULL,
    `activo_o_desactivado` int(2) NOT NULL DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Volcado de datos para la tabla `productos`
  --

  INSERT INTO `productos` (`id`, `id_producto`, `id_usuario`, `id_mazo`, `nombre_producto`, `cantidad_del_producto`, `producto_contenedor`, `precio_del_producto`, `descripcion_del_producto`, `activo_o_desactivado`) VALUES
  (1, 1, 12, 1, 'Tomate', 5, 6, 15, 'El mejor producto de todos', 1),
  (2, 4, 11, 4, 'Zapatos', 8, 1, 456, 'Este es un producto muy bueno', 1),
  (3, 3, 10, 3, 'Mesa', 6, 1, 27, 'Este es un producto muy bueno', 1),
  (4, 3, 1, 3, 'Mouse', 7, 2, 45, 'Este es un producto muy bueno', 1),
  (5, 3, 1, 3, 'Zanahoria', 5, 2, 15, 'Este es un producto muy bueno', 1),
  (6, 4, 1, 4, 'Trujillo', 8, 2, 456, 'Este es un producto muy bueno', 1),
  (7, 3, 1, 3, 'Puerta', 6, 3, 27, 'Este es un producto muy bueno', 1),
  (8, 2, 1, 2, 'Ventana', 7, 3, 45, 'Este es un producto muy bueno', 1),
  (9, 4, 1, 4, 'Zanahoria', 5, 3, 15, 'Este es un producto muy bueno', 1),
  (10, 4, 1, 4, 'Chimbote', 8, 4, 456, 'Este es un producto muy bueno', 1),
  (11, 3, 1, 3, 'Corazon', 6, 4, 27, 'Este es un producto muy bueno', 1),
  (12, 2, 11, 2, 'Zapatos', 8, 1, 456, 'Este es un producto muy bueno', 1),
  (13, 3, 10, 3, 'Mesa', 6, 1, 27, 'Este es un producto muy bueno', 1),
  (14, 2, 1, 2, 'Mouse', 7, 2, 45, 'Este es un producto muy bueno', 1),
  (15, 1, 1, 1, 'Zanahoria', 5, 2, 15, 'Este es un producto muy bueno', 1),
  (16, 4, 1, 4, 'Trujillo', 8, 2, 456, 'Este es un producto muy bueno', 1),
  (17, 3, 1, 3, 'Puerta', 6, 3, 27, 'Este es un producto muy bueno', 1),
  (18, 2, 1, 2, 'Ventana', 7, 3, 45, 'Este es un producto muy bueno', 1),
  (19, 5, 1, 5, 'Zanahoria', 5, 3, 15, 'Este es un producto muy bueno', 1),
  (20, 4, 1, 4, 'Chimbote', 8, 4, 456, 'Este es un producto muy bueno', 1),
  (21, 3, 1, 3, 'Corazon', 6, 4, 27, 'Este es un producto muy bueno', 1),
  (22, 2, 11, 2, 'Zapatos', 8, 1, 456, 'Este es un producto muy bueno', 1),
  (23, 3, 10, 3, 'Mesa', 6, 1, 27, 'Este es un producto muy bueno', 1),
  (24, 2, 1, 2, 'Mouse', 7, 2, 45, 'Este es un producto muy bueno', 1),
  (25, 1, 1, 1, 'Zanahoria', 5, 2, 15, 'Este es un producto muy bueno', 1),
  (26, 4, 1, 4, 'Trujillo', 8, 2, 456, 'Este es un producto muy bueno', 1),
  (27, 3, 1, 3, 'Puerta', 6, 3, 27, 'Este es un producto muy bueno', 1),
  (28, 2, 1, 2, 'Ventana', 7, 3, 45, 'Este es un producto muy bueno', 1),
  (29, 1, 1, 1, 'Zanahoria', 5, 3, 15, 'Este es un producto muy bueno', 1),
  (30, 4, 1, 4, 'Chimbote', 8, 4, 456, 'Este es un producto muy bueno', 1),
  (31, 3, 1, 3, 'Corazon', 6, 4, 27, 'Este es un producto muy bueno', 1),
  (32, 2, 11, 2, 'Zapatos', 8, 1, 456, 'Este es un producto muy bueno', 1),
  (33, 3, 10, 3, 'Mesa', 6, 1, 27, 'Este es un producto muy bueno', 1),
  (34, 7, 1, 7, 'Mouse', 7, 2, 45, 'Este es un producto muy bueno', 1),
  (35, 7, 1, 7, 'Zanahoria', 5, 2, 15, 'Este es un producto muy bueno', 1),
  (36, 4, 1, 4, 'Trujillo', 8, 2, 456, 'Este es un producto muy bueno', 1),
  (37, 3, 1, 3, 'Puerta', 6, 3, 27, 'Este es un producto muy bueno', 1),
  (38, 2, 1, 2, 'Ventana', 7, 3, 45, 'Este es un producto muy bueno', 1),
  (39, 1, 1, 1, 'Zanahoria', 5, 3, 15, 'Este es un producto muy bueno', 1),
  (40, 4, 1, 4, 'Chimbote', 8, 4, 456, 'Este es un producto muy bueno', 1),
  (41, 3, 1, 3, 'Corazon', 6, 4, 27, 'Este es un producto muy bueno', 1),
  (42, 2, 11, 2, 'Zapatos', 8, 1, 456, 'Este es un producto muy bueno', 1),
  (43, 3, 10, 3, 'Mesa', 6, 1, 27, 'Este es un producto muy bueno', 1),
  (44, 2, 1, 2, 'Mouse', 7, 2, 45, 'Este es un producto muy bueno', 1),
  (45, 1, 1, 1, 'Zanahoria', 5, 2, 15, 'Este es un producto muy bueno', 1),
  (46, 4, 1, 4, 'Trujillo', 8, 2, 456, 'Este es un producto muy bueno', 1),
  (47, 3, 1, 3, 'Puerta', 6, 3, 27, 'Este es un producto muy bueno', 1),
  (48, 2, 5, 2, 'Ventana', 7, 3, 45, 'Este es un producto muy bueno', 1),
  (49, 1, 4, 1, 'Zanahoria', 5, 3, 15, 'Este es un producto muy bueno', 1),
  (50, 4, 3, 4, 'Chimbote', 8, 4, 456, 'Este es un producto muy bueno', 1),
  (51, 3, 2, 3, 'Corazon', 6, 4, 27, 'Este es un producto muy bueno', 1),
  (52, 2, 11, 2, 'Zapatos', 8, 1, 456, 'Este es un producto muy bueno', 1),
  (53, 3, 10, 3, 'Mesa', 6, 1, 27, 'Este es un producto muy bueno', 1),
  (54, 2, 1, 2, 'Mouse', 7, 2, 45, 'Este es un producto muy bueno', 1),
  (55, 1, 8, 1, 'Zanahoria', 5, 2, 15, 'Este es un producto muy bueno', 1),
  (56, 4, 7, 4, 'Trujillo', 8, 2, 456, 'Este es un producto muy bueno', 1),
  (57, 3, 6, 3, 'Puerta', 6, 3, 27, 'Este es un producto muy bueno', 1),
  (58, 6, 5, 6, 'Ventana', 7, 3, 45, 'Este es un producto muy bueno', 1),
  (59, 1, 4, 1, 'Zanahoria', 5, 3, 15, 'Este es un producto muy bueno', 1),
  (60, 4, 3, 4, 'Chimbote', 8, 4, 456, 'Este es un producto muy bueno', 1),
  (61, 3, 2, 3, 'Corazon', 6, 4, 27, 'Este es un producto muy bueno', 1),
  (62, 2, 1, 2, 'Mouse', 7, 4, 45, 'Este es un producto muy bueno', 1),
  (63, 1, 1, 0, '', 0, 0, 0, '', 1),
  (64, 1, 1, 0, '', 0, 0, 0, '', 1),
  (65, 1, 1, 0, '', 0, 0, 0, '', 1),
  (66, 1, 1, 0, '', 0, 0, 0, '', 1),
  (67, 1, 1, 0, '', 0, 0, 0, '', 1),
  (68, 1, 1, 0, '', 0, 0, 0, '', 1),
  (69, 1, 1, 0, '', 0, 0, 0, '', 1),
  (70, 1, 1, 0, '', 0, 0, 0, '', 1),
  (71, 1, 1, 0, '', 0, 0, 0, '', 1),
  (72, 1, 1, 0, '', 0, 0, 0, '', 1),
  (73, 1, 1, 0, '', 0, 0, 0, '', 1),
  (74, 1, 1, 0, 'sdfasf asd', 2345343453, 0, 5345345, '', 1),
  (75, 1, 1, 0, 'sdfasf asd', 2345343453, 0, 5345345, '', 1),
  (76, 1, 1, 0, 'sdfasf asd', 2345343453, 0, 5345345, '', 1),
  (77, 1, 1, 0, 'sdfasf asd', 2345343453, 0, 5345345, '', 1),
  (78, 1, 1, 0, 'sdfasf asd', 2345343453, 0, 5345345, '', 1),
  (79, 1, 1, 0, 'hey ', 465, 0, 4654, 'hey', 1),
  (80, 1, 1, 0, 'verdad', 85, 0, 58888888, 'mar cielo corazon', 1),
  (81, 2, 1, 0, 'verdaderos', 978, 0, 654, 'amigos', 1),
  (82, 3, 1, 0, 'Hello', 425, 0, 4242, 'asfsa sdf sadf as', 1),
  (83, 4, 1, 0, 'Miramontes', 4564, 3, 546896, 'sfasdfasfs', 1),
  (84, 5, 1, 0, '', 0, 3, 0, '', 1),
  (85, 6, 1, 0, '', 0, 3, 0, '', 1),
  (86, 7, 1, 0, 'hey', 1, 3, 0, '', 1),
  (87, 8, 1, 0, 'productitos', 1, 2, 52, 'descripciones ', 1),
  (88, 9, 1, 5, 'amigos', 1, 0, 0, '', 1),
  (89, 10, 1, 5, 'medias tintas', 1, 5, 0, '', 1),
  (90, 11, 1, 5, 'sdfgd', 1, 5, 0, '', 1),
  (91, 12, 1, 5, 'her', 1, 5, 0, '', 1),
  (92, 13, 1, 5, 'f', 1, 5, 0, '', 1),
  (93, 14, 1, 5, 't', 1, 5, 0, '', 1),
  (94, 15, 1, 5, 'z', 1, 5, 0, '', 1),
  (95, 16, 1, 5, 'ol', 1, 13, 0, '', 1),
  (96, 17, 1, 5, 'tir', 1, 13, 0, '', 1),
  (97, 18, 1, 5, 'tututututu', 1, 16, 0, '', 1),
  (98, 19, 1, 6, 'Habitación', 1, 0, 0, '', 0),
  (99, 20, 1, 6, 'Baño', 1, 0, 0, '', 1),
  (100, 21, 1, 6, 'Cocina', 1, 0, 0, '', 1),
  (101, 22, 1, 6, 'Patio', 1, 0, 0, '', 1),
  (102, 23, 1, 6, 'Catre', 1, 19, 0, '', 1),
  (103, 24, 1, 6, 'Computadoras', 2, 19, 0, '', 1),
  (104, 25, 1, 6, 'Mesa', 1, 19, 0, '', 1),
  (105, 26, 1, 6, 'Ropero', 1, 19, 0, '', 1),
  (106, 27, 1, 6, 'Camarote', 1, 19, 0, '', 1),
  (107, 28, 1, 6, 'Habitación', 1, 0, 0, 'Se refiere a la parte principal de la casa', 1),
  (108, 29, 1, 6, 'Habitación mas', 1, 19, 0, '', 1),
  (109, 30, 1, 6, '', 0, 0, 0, '', 0),
  (110, 31, 1, 6, '', 0, 0, 0, '', 0),
  (111, 32, 1, 6, 'Piso', 1, 28, 0, 'Aquí se enlistan elementos que no son muy grandes o no tienen muchos elementos.', 1),
  (112, 33, 1, 6, 'Mobiliario de pc', 1, 28, 0, 'Aquel que contiene a la computadora', 1),
  (113, 34, 1, 6, 'Computadora', 1, 33, 0, '', 1),
  (114, 35, 1, 6, 'Estabilizador', 1, 33, 0, '', 1),
  (115, 36, 1, 6, 'Tabler wacom', 1, 33, 0, '', 1),
  (116, 37, 1, 6, 'Parlante', 1, 33, 0, '', 1),
  (117, 38, 1, 6, 'Mouse', 1, 34, 0, '', 1),
  (118, 39, 1, 6, 'Cpu', 1, 34, 0, '', 1),
  (119, 40, 1, 6, 'Monitor', 1, 34, 0, 'La pantalla está un poco dañada', 1),
  (120, 41, 1, 6, 'Habitación', 1, 0, 0, '', 0),
  (121, 42, 1, 6, 'Mesa', 1, 28, 0, 'La mesa blanca de madera', 1),
  (122, 43, 1, 6, 'Camarote Pequeño', 1, 28, 0, 'C', 1),
  (123, 44, 1, 6, 'Camarote papá', 1, 28, 0, '', 1),
  (124, 45, 1, 6, 'Cama', 1, 28, 0, '', 1),
  (125, 46, 1, 6, 'Silla', 1, 32, 0, 'De plastico negra', 1),
  (126, 47, 1, 6, 'Computadora Papá', 1, 42, 0, '', 1),
  (127, 48, 1, 6, 'Impresora', 1, 42, 0, '', 1),
  (128, 49, 1, 6, 'Parlante', 1, 47, 0, '', 1),
  (129, 50, 1, 6, 'Mouse', 1, 47, 0, '', 1),
  (130, 51, 1, 6, 'Monitor', 1, 47, 0, 'Tiene una tendencia al azul', 1),
  (131, 52, 1, 6, 'Tasa', 1, 20, 0, '', 1),
  (132, 53, 1, 6, 'Lavavo', 1, 20, 0, '', 1),
  (133, 54, 1, 6, 'Esponja para labar', 1, 52, 0, '', 1),
  (134, 55, 1, 6, 'Jabonera', 1, 52, 0, '', 1),
  (135, 56, 1, 6, 'Tacho', 1, 20, 0, 'De basura para papeles', 1),
  (136, 57, 1, 6, 'Tendedero', 1, 22, 0, '', 1),
  (137, 58, 1, 6, 'Labadero', 1, 22, 0, '', 1),
  (138, 59, 1, 6, 'Labadora', 1, 22, 0, '', 1),
  (139, 60, 1, 6, 'Piso', 1, 22, 0, '', 1),
  (140, 61, 1, 6, 'Escoba', 1, 60, 0, '', 1),
  (141, 62, 1, 6, 'Recojedor', 1, 60, 0, '', 1),
  (142, 63, 1, 6, 'Tacho de basura', 1, 60, 0, '', 1),
  (143, 64, 1, 6, 'Valdes', 3, 60, 0, '', 1),
  (144, 65, 1, 6, 'Macetas', 2, 60, 0, '', 1),
  (145, 66, 1, 6, 'Hay cactus y maiz', 1, 60, 0, '', 1),
  (146, 67, 1, 6, 'Armario madera', 1, 21, 0, '', 1),
  (147, 68, 1, 6, 'Cocina', 1, 21, 0, '', 1),
  (148, 69, 1, 6, 'Armario de vidrio', 1, 21, 0, '', 1),
  (149, 70, 1, 6, 'Viveres', 1, 67, 0, '', 1),
  (150, 71, 1, 6, 'Armario rojo', 1, 67, 0, '', 1),
  (151, 72, 1, 6, 'Frutas', 1, 71, 0, '', 1),
  (152, 73, 1, 6, 'Verduras', 1, 71, 0, '', 1),
  (153, 74, 1, 6, 'Ollas', 1, 68, 0, '', 1),
  (154, 75, 1, 6, 'Condimentos', 1, 69, 0, '', 1),
  (155, 76, 1, 6, 'Guardadero de platos', 1, 69, 0, '', 1),
  (156, 77, 1, 6, 'Platos', 4, 76, 0, '', 1),
  (157, 78, 1, 6, 'Tasas', 4, 76, 0, '', 1),
  (158, 79, 1, 6, '4', 1, 78, 0, '', 0),
  (159, 80, 1, 8, 'Atun', 1, 0, 0, '', 1),
  (160, 81, 1, 8, 'Cebolla', 1, 0, 0, '', 1),
  (161, 82, 1, 7, 'Listas', 1, 0, 0, '', 1),
  (162, 83, 1, 7, 'Lista de compras para la casa', 1, 82, 0, '', 1),
  (163, 84, 1, 7, 'Lista de redes sociales', 1, 82, 0, '', 1),
  (164, 85, 1, 7, 'Lista de amigos', 1, 82, 0, '', 1),
  (165, 86, 1, 7, 'tick tock', 1, 84, 0, '', 1),
  (166, 87, 1, 7, 'Instagram', 1, 84, 0, '', 1),
  (167, 88, 1, 7, 'Whatsapp', 1, 84, 0, '', 1),
  (168, 89, 1, 7, 'Twiter', 1, 84, 0, '', 1),
  (169, 90, 1, 7, 'Discord', 1, 84, 0, '', 1),
  (170, 91, 1, 7, 'Telegram', 1, 84, 0, '', 1),
  (171, 92, 1, 7, 'Twich', 1, 84, 0, '', 1),
  (172, 93, 1, 7, 'Proyectos a realizar', 1, 0, 0, '', 1),
  (173, 94, 1, 7, 'Personalizados', 1, 93, 0, '', 1),
  (174, 95, 1, 7, 'Lenguajes de programación', 1, 93, 0, '', 1),
  (175, 96, 1, 7, 'Lenguage de dibujo de mapas', 1, 95, 0, 'Lenguaje de programación de dibujo vectorial para mapas conceptuales y mentales', 1),
  (176, 97, 1, 7, 'Lenguaje de creación de formularios.', 1, 95, 0, '', 1),
  (177, 98, 1, 7, 'Integrantes y puestos', 1, 94, 0, '', 1),
  (178, 99, 1, 7, 'Planes a realizar', 1, 94, 0, '', 1),
  (179, 100, 1, 7, 'Plan de marketing', 1, 94, 0, '', 1),
  (180, 101, 1, 7, 'Juego de cashflow', 1, 93, 0, '', 1),
  (181, 102, 1, 7, 'Tareas', 1, 0, 0, '', 1),
  (182, 103, 1, 7, 'Cocinar', 1, 102, 0, '', 1),
  (183, 104, 1, 7, 'Eliminar los errores que salen en la app de list.', 1, 102, 0, '', 1),
  (184, 105, 1, 7, 'Solucionar el problema de seción de se list', 1, 102, 0, '', 1),
  (185, 106, 1, 7, 'Estudios', 1, 93, 0, '', 1),
  (186, 107, 1, 7, 'Php', 1, 106, 0, '', 1),
  (187, 108, 1, 7, 'Javascript', 1, 106, 0, '', 1),
  (188, 109, 1, 7, 'Nodejs', 1, 106, 0, '', 1),
  (189, 110, 1, 7, 'Git', 1, 106, 0, '', 1),
  (190, 111, 1, 7, 'Github', 1, 106, 0, '', 1),
  (191, 112, 1, 7, 'Boton de regresar en list', 1, 102, 0, 'Esto se puede hacer por medio de que el producto contenedor de un elemento, me permite subir de escala. Es decir. Puede haber un boton que diga regresar, y lo que haga es que tome el valor del producto condenendor, del producto contenido en la actualidad y eso lo mande como variable de producto contenedor y así se regresa. Es decir  que se toma el producto conteneder del producto contenedor actual y listo.', 1),
  (192, 113, 1, 7, 'Crear la opción de poder ver el contenido o la descripción ...', 1, 102, 0, ' Crear la opción de poder ver el contenido o la descripción de un elemento o ocultarlo, creo que en la tabla que se trae los elementos no debe ir la descripción por que es bastante contenido, Pero creo que si sería ideal en la parte de arriba de el producto contenido.\r\n\r\nAdemas no se si es buena idea poner en forma de tabla la parte de arriva del producto.', 1),
  (193, 114, 1, 7, 'Problemas que tenemos que resolver', 1, 112, 0, '', 1),
  (194, 115, 1, 7, 'Que al hacer clic en un id que no existe en el contenedor actual, nos bote un error.', 1, 114, 0, '', 1),
  (195, 116, 1, 7, 'Crear un boton  regresar, ', 1, 114, 0, 'presumibleme esto va a ir en el menú. Aque luego esto tambien tra el problema de que el crear productos, y actualizar, tambien estaría el boton, no creo que sea buena idea ponerlo en el menú.', 1),
  (196, 117, 1, 7, 'Capturar el id del padre', 1, 114, 0, '', 1),
  (197, 118, 1, 7, 'Enviar el id del padre como formulario de ver id.', 1, 114, 0, 'Esto como producto contenedor.', 1),
  (198, 119, 1, 7, 'Con javascript', 1, 114, 0, 'Un javascript podría poner como valor por defecto en el ver id, el id del contenedor del contenedor. Y enviar inmediatamente el formulario. El problema está en que debería aprender javascript.', 1),
  (199, 120, 1, 7, 'En que Objeto es donde debo crear la función esta', 1, 114, 0, '', 1),
  (200, 121, 1, 6, 'Madera blanco con televición', 1, 32, 0, '', 1),
  (201, 122, 1, 6, 'Caja de ropa', 1, 32, 0, '', 1),
  (202, 123, 1, 6, 'Cpus viejos', 1, 32, 0, '', 1),
  (203, 124, 1, 7, 'Foda', 1, 99, 0, 'Fortalezas: Nosotros somos los únicos que lo vamos ha hacer. Entonces no hay gasto de personal. Yo conozco el sector.\r\nOportunidades: La pandemia.\r\nDebilidades: No tenemos capital.\r\nAmenazas: La competencia.\r\n', 1),
  (204, 125, 1, 7, 'conocimientos', 1, 0, 0, '', 1),
  (205, 126, 1, 7, 'Hacer deploy en heroku', 1, 125, 0, '', 1),
  (206, 127, 1, 7, 'Crearse una cuenta en heroku', 1, 126, 0, '', 1),
  (207, 128, 1, 7, 'Se sube un zip o una carpeta y listo?', 1, 126, 0, '', 1),
  (208, 129, 1, 7, 'Se tiene que poner la tarjeta al momento de crear la cuenta?', 1, 126, 0, '', 1),
  (209, 130, 1, 7, 'Hacer logotipo para list', 1, 102, 0, '', 1),
  (210, 131, 1, 7, 'Servicios que ofrese Heroku', 1, 126, 0, '', 1),
  (211, 132, 1, 7, 'Hosting compartido, o nube, plataforma para servicios web', 1, 131, 0, '', 1),
  (212, 133, 1, 7, 'Permite crear una aplicación o un team', 1, 131, 0, '', 1);

  -- --------------------------------------------------------

  --
  -- Estructura de tabla para la tabla `usuarios`
  --

  CREATE TABLE `usuarios` (
    `id` int(10) UNSIGNED NOT NULL,
    `id_usuario` int(10) UNSIGNED NOT NULL,
    `nombre` varchar(50) NOT NULL DEFAULT 'desconocido',
    `correo` varchar(50) NOT NULL,
    `password_usuarios` varchar(50) NOT NULL,
    `activo_o_desactivado` int(2) NOT NULL DEFAULT 1
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

  --
  -- Volcado de datos para la tabla `usuarios`
  --

  INSERT INTO `usuarios` (`id`, `id_usuario`, `nombre`, `correo`, `password_usuarios`, `activo_o_desactivado`) VALUES
  (1, 2, 'Sergio', 'sergio@gmail.com', 'hola', 1),
  (2, 9, 'Jose', 'jose@gmail.com', 'asunto', 1),
  (3, 3, 'Marco', 'marco@gmail.com', 'oculto', 1),
  (4, 6, 'Sergio', 'nuevo@gmail.com', 'nuevo', 1),
  (5, 4, 'Luis', 'luis@gmail.com', 'escondido', 1),
  (6, 1, 'Manuel', 'manuel@gmail.com', 'signo', 1),
  (7, 2, 'Sergio', 'sergio@gmail.comm', 'hola', 1),
  (8, 3, 'hey@gmail.com', 'hey@gmail.com', 'hey@gmail.com', 1);

  --
  -- Índices para tablas volcadas
  --

  --
  -- Indices de la tabla `mazos`
  --
  ALTER TABLE `mazos`
    ADD PRIMARY KEY (`id`);

  --
  -- Indices de la tabla `productos`
  --
  ALTER TABLE `productos`
    ADD PRIMARY KEY (`id`);

  --
  -- Indices de la tabla `usuarios`
  --
  ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `correo` (`correo`);

  --
  -- AUTO_INCREMENT de las tablas volcadas
  --

  --
  -- AUTO_INCREMENT de la tabla `mazos`
  --
  ALTER TABLE `mazos`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

  --
  -- AUTO_INCREMENT de la tabla `productos`
  --
  ALTER TABLE `productos`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

  --
  -- AUTO_INCREMENT de la tabla `usuarios`
  --
  ALTER TABLE `usuarios`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  COMMIT;

  /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
  /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
  /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
