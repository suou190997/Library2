-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2020 a las 20:50:33
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_books` (IN `a_isbn` VARCHAR(100), `a_title` VARCHAR(200), `a_subtitle` VARCHAR(200), `a_descripcion` VARCHAR(200), `a_year` INT, `a_npag` INT, `a_author` INT, `a_editorial` INT, `a_category` INT, `accion` INT, `a_id` INT)  BEGIN
	CASE accion
    	WHEN 0 THEN select * from book;
    	WHEN 1 THEN INSERT INTO book(isbn,title,subtitle,description,year,n_pag,author_id,editorial_id,category_id) VALUES                     (a_isbn,a_title,a_subtitle,a_descripcion,a_year,a_npag,a_author,a_editorial,a_category);
        WHEN 2 THEN UPDATE book set isbn = a_isbn,title = a_title , subtitle = a_subtitle ,description = a_descripcion , year = a_year,n_pag = a_npag , author_id=a_author , editorial_id = a_editorial , category_id= a_category   WHERE id = a_id;
        WHEN 3 THEN DELETE from book WHERE id = a_id;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_category` (IN `a_id` INT, `a_name` VARCHAR(100), `accion` INT)  BEGIN
	CASE accion
    	WHEN 0 THEN select * from category;
    	WHEN 1 THEN INSERT INTO category(name) VALUES (a_name);
        WHEN 2 THEN UPDATE category set name = a_name  WHERE id = a_id;
        WHEN 3 THEN DELETE from category WHERE id = a_id;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_client` (IN `a_id` INT, IN `a_name` VARCHAR(100), IN `a_lastname` VARCHAR(100), IN `a_email` VARCHAR(100), IN `a_address` VARCHAR(100), IN `a_phone` VARCHAR(100), IN `a_is_active` INT, IN `accion` INT)  BEGIN
	CASE accion
    	WHEN 0 THEN select * from client;
    	WHEN 1 THEN INSERT INTO client(name,lastname,email,address,phone,is_active) VALUES (a_name,a_lastname,a_email,a_address,a_phone,a_is_active);
        WHEN 2 THEN UPDATE client set name = a_name,lastname=a_lastname,email=a_email,address=a_address,phone=a_phone,is_active=a_is_active  WHERE id = a_id;
        WHEN 3 THEN DELETE from client WHERE id = a_id;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_editorial` (IN `a_id` INT, `a_name` VARCHAR(100), `accion` INT)  BEGIN
	CASE accion
    	WHEN 0 THEN select * from editorial;
    	WHEN 1 THEN INSERT INTO editorial(name) VALUES (a_name);
        WHEN 2 THEN UPDATE editorial set name = a_name  WHERE id = a_id;
        WHEN 3 THEN DELETE from editorial WHERE id = a_id;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_item` (IN `a_id` INT, `a_code` VARCHAR(100), `a_status_id` INT, `a_book_id` INT, `accion` INT)  BEGIN
	CASE accion
    	WHEN 0 THEN select * from item;
    	WHEN 1 THEN INSERT INTO item(code,status_id,book_id) VALUES (a_code,a_status_id,a_book_id);
        WHEN 2 THEN UPDATE item set code = a_code ,status_id=a_status_id,book_id=a_book_id  WHERE id = a_id;
        WHEN 3 THEN DELETE from item WHERE id = a_id;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `crud_prestamo` (IN `a_id` INT, IN `a_status_id` INT, IN `a_id_user` INT, IN `accion` INT)  BEGIN
	CASE accion
    	WHEN 0 THEN SELECT i.code,b.title,c.name,o.start_at,o.finish_at,o.id,i.status_id,i.id as 'iditem'
                                         FROM operation o
                                         INNER JOIN user u ON o.user_id = u.id
                                         INNER JOIN client c ON c.id = o.client_id 
                                         INNER JOIN item i ON i.id = o.item_id
                                         INNER JOIN book b ON b.id = i.book_id
                                         INNER JOIN status s ON s.id = i.status_id where o.returned_at is null;
    	WHEN 1 THEN UPDATE operation set returned_at = now(),receptor_id=a_id_user  WHERE id=a_id ;
	WHEN 2 THEN UPDATE item set status_id=1  WHERE id=a_status_id;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `prestar` (IN `a_item_id` INT, IN `a_status_id` INT, IN `a_client_id` INT, IN `a_start_at` DATE, IN `a_finish_at` DATE, IN `a_id_user` INT, IN `accion` INT)  BEGIN
	CASE accion
	WHEN 0 THEN select * from book;
    	WHEN 1 THEN SELECT * from client;
	WHEN 2 THEN SELECT * from item where status_id=1 and book_id=a_item_id;
    	WHEN 3 THEN insert into operation (item_id,client_id,start_at,finish_at,user_id,receptor_id)values(a_item_id,a_client_id,a_start_at,a_finish_at,a_id_user,null);
	WHEN 4 THEN UPDATE item set status_id=2  WHERE id=a_item_id;
    WHEN 5 THEN UPDATE operation set receptor_id=a_id_user;
    end case;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte` ()  BEGIN
	SELECT i.code,b.title,c.name,o.start_at,o.finish_at,o.returned_at FROM operation o
                                         INNER JOIN user u ON o.user_id = u.id
                                         INNER JOIN client c ON c.id = o.client_id 
                                         INNER JOIN item i ON i.id = o.item_id
                                         INNER JOIN book b ON b.id = i.book_id ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_all_author` (IN `A_id` INT, IN `A_name` VARCHAR(100), IN `A_lastname` VARCHAR(100), IN `accion` INT)  BEGIN
case accion
		WHEN 0 THEN select * from author;
    	WHEN 1 THEN INSERT INTO author(name,lastname) VALUES (A_name,A_lastname);
        WHEN 2 THEN UPDATE author set name=A_name,lastname=A_lastname where id=A_id;
        WHEN 3 THEN DELETE from author where id=A_id;
end case;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`id`, `name`, `lastname`) VALUES
(5, 'Wm. Paul ddd', 'Youngwww'),
(6, 'J. J. ', 'Benítez'),
(7, 'María ', 'Dueñas'),
(8, ' E. P. ', 'Sanders'),
(9, ' Othmar ', 'Keel'),
(10, 'Joachim ', 'Gnilka'),
(11, ' José Virgilio ', 'García Trabazo'),
(15, 'popo', 'tieso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `n_pag` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `editorial_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `subtitle`, `description`, `year`, `n_pag`, `author_id`, `editorial_id`, `category_id`) VALUES
(4, '978-612-4181-95-5', 'La cabañass', 'La cabaña', 'Si algo importa, todo importa. Dado que tú eres importante, todo lo que haces lo es. Cada vez que perdonas, el universo cambia; cada vez que te esfuerzas y tocas un corazón o una vida, el mundo cambia', 224, 5, 5, 3, 5),
(5, '978-958-42-8470-9', 'Caná. Caballo de Troya 9', 'Caná. Caballo de Troya 9', 'Al leer Caná. Caballo de Troya 9, el lector llega a una conclusión: todo lo contado sobre Jesús de Nazaret conviene ponerlo en duda.\r\n\r\nLa verdad, probablemente, fue más intensa e inquietante. Si usted acierta a leer la primera línea de Caná no será por casualidad.\r\n\r\nY atención: sus principios se tambalearán. ', 31, 1084, 6, 3, 6),
(6, '978-22-41-95-5', 'EL TIEMPO ENTRE COSTURAS', 'EL TIEMPO ENTRE COSTURAS', 'La joven modista Sira Quiroga abandona Madrid en los meses previos al alzamiento, arrastrada por el amor desbocado hacia un hombre a quien apenas conoce. Juntos se instalan en Tánger, una ciudad mundana, exótica y vibrante donde todo lo impensable puede hacerse realidad. Incluso, la traición y el abandono. \r\n\r\nSola y acuciada por deudas ajenas, Sira se traslada a Tetuán, la capital del Protectorado español en Marruecos. Con argucias inconfesables y ayudada por amistades de reputación dudosa, forja una nueva identidad y logra poner en marcha un selecto atelier en el que atiende a clientas de orígenes remotos y presentes insospechados.', 7, 324, 7, 3, 8),
(7, '978-84-9879-973-6', 'Jesús y el judaísmo', 'Jesús y el judaísmo', '¿Cómo es posible que Jesús viviese totalmente dentro del judaísmo y al mismo tiempo fuera el origen de un movimiento que se separó de él? «La finalidad de este libro», escribe Ed Parish Sanders, «es investigar dos cuestiones relacionadas entre sí en torno a Jesús: el propósito y las relaciones de este con sus contemporáneos en el marco del judaísmo. Estas dos cuestiones nos llevan inmediatamente a otras dos: la causa de su muerte (¿implicaban sus intenciones una oposición tal al judaísmo que habría de conducirlo a la muerte?) y el impulso que motivó el surgimiento del cristianismo (¿tuvo su origen en una confrontación histórica entre Jesús y el judaísmo la escisión entre el movimiento cristiano y ese último?)»', 5, 544, 8, 4, 6),
(8, ' 978-84-8164-785-3', 'La iconografía del Antiguo Oriente y el Antiguo Testamento', 'La iconografía del Antiguo Oriente y el Antiguo Testamento', 'Esta obra, que supuso una auténtica renovación de los estudios bíblicos, es considerada actualmente todo un clásico de su especialidad. Constituye un excelente compendio de la orientación hermenéutica seguida por Othmar Keel desde sus primeros trabajos: el estudio del Antiguo Testamento a partir de la comparación del texto con la iconografía del Próximo Oriente antiguo. La aproximación iconográfica desarrolla la vinculación de los sistemas ortográficos del Próximo Oriente con sus respectivas artes pictóricas y explora el carácter de representación evocadora tanto de la palabra poética, mágica, como de la imagen monumental, simbólica. De la mano de la arqueología Keel ahonda en el contexto cultural e histórico del texto bíblico, permitiendo un acceso valiosísimo a sus modos de concepción y expresión.', 10, 424, 9, 4, 6),
(9, '978-84-8164-243-8', 'Teología del Nuevo Testamento', 'Teología del Nuevo Testamento', 'Gnilka pretende exponer «la actuación salvadora de Dios en Jesucristo, tal y como aparece testimoniada en el Nuevo testamento o en cada uno de sus escritos», contribuyendo desde una perspectiva propia a la necesaria colaboración entre la teología neotestamentaria y la teología dogmática.', 7, 544, 10, 4, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Libros de Aventuras'),
(3, 'Libros de Cuentos'),
(4, 'Libros de Humor'),
(5, 'Libros de suspenso'),
(6, 'Novela de culto'),
(7, 'Novela de no ficción'),
(8, 'Novelas Románticas'),
(9, 'Libros Autobiográficos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `name`, `lastname`, `email`, `address`, `phone`, `is_active`, `created_at`) VALUES
(2, 'kevin', 'vilcas linares', 'zangetsu_74@hotmail.com', 'En mi casa', '951951951', 1, '2020-11-02 19:35:10'),
(3, 'alejoflix', 'Prime video', 'alejoflix@gmaiul.com', 'En mi casa 2', '1445455445', 1, '2020-11-02 19:35:46'),
(4, 'Melisa', 'JUegTacos', 'meliTuchikita@gmail.com', 'En mi casa 3', '4984984', 1, '2020-11-02 19:36:14'),
(5, 'susana', 'Socsa Moral', 'sus@gmail.com', 'En mi casa 4', '548948649', 1, '2020-11-02 19:36:44'),
(6, 'Gersson', 'Pescador', 'PescaditoMazNa@gmail.com', 'En mi casa 5 ', '95529549', 1, '2020-11-02 19:37:10'),
(7, 'Michel', 'TraumaMuñoz', 'Mitraumita@gamil.com', 'En mi casa 6', '684894', 1, '2020-11-02 19:37:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `name`) VALUES
(2, 'Espasa'),
(3, ' Booket'),
(4, 'TROTTA S.A.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `code`, `status_id`, `book_id`) VALUES
(5, '254', 1, 4),
(6, '782', 1, 4),
(7, '2651919195195', 1, 4),
(8, '65', 1, 7),
(9, '76', 1, 7),
(10, '567', 1, 8),
(11, '88', 1, 8),
(12, '67', 1, 9),
(13, '76', 1, 9),
(14, '159159', 1, 4),
(16, '33333', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `start_at` date NOT NULL,
  `finish_at` date NOT NULL,
  `returned_at` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `receptor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `operation`
--

INSERT INTO `operation` (`id`, `item_id`, `client_id`, `start_at`, `finish_at`, `returned_at`, `user_id`, `receptor_id`) VALUES
(3, 5, 4, '2020-11-02', '2020-11-12', '2020-11-13', 2, NULL),
(4, 8, 4, '2020-11-02', '2020-11-12', '2020-11-14', 2, NULL),
(5, 9, 3, '2020-11-02', '2020-11-04', '2020-11-14', 2, NULL),
(6, 7, 3, '2020-11-13', '2020-11-14', '2020-11-15', 2, NULL),
(11, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(12, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(13, 5, 4, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(14, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(15, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(16, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(17, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(18, 5, 2, '2020-01-01', '2020-01-01', '2020-11-15', 2, 2),
(19, 7, 4, '2020-01-01', '2020-01-01', '2020-11-16', 2, 2),
(20, 7, 7, '2020-01-01', '2020-01-01', '2020-11-16', 2, 2),
(21, 7, 7, '2020-01-01', '2020-01-01', '2020-11-16', 2, 2),
(22, 9, 5, '2020-01-01', '2020-01-01', '2020-11-16', 2, 2),
(23, 13, 2, '2020-01-01', '2020-01-01', '2020-11-16', 2, 6),
(24, 12, 2, '2020-01-01', '2020-01-01', '2020-11-16', 2, 6),
(25, 6, 2, '2020-01-01', '2020-01-01', '2020-11-16', 6, 2),
(26, 14, 2, '2020-01-01', '2020-01-01', '2020-11-16', 2, 2),
(27, 5, 2, '2020-01-01', '2020-01-01', '2020-11-16', 2, 2),
(28, 16, 2, '2020-01-01', '2020-01-01', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Disponible'),
(2, 'Ocupado'),
(3, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'subAdministrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `tipo_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `username`, `email`, `password`, `is_active`, `created_at`, `tipo_user_id`) VALUES
(2, 'Administrador', 'el pepe', 'admin', '', 'admin', 1, '2020-11-02 10:06:48', 1),
(5, 'Administrador', '', 'admin', '', '123', 1, '2020-11-14 21:26:46', NULL),
(6, '', '', 'user', 'asd@gmail.com', '123', 1, '2020-11-16 13:54:10', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `editorial_id` (`editorial_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indices de la tabla `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `receptor_id` (`receptor_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket` (`tipo_user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`editorial_id`) REFERENCES `editorial` (`id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`);

--
-- Filtros para la tabla `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `operation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`receptor_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `operation_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_ticket` FOREIGN KEY (`tipo_user_id`) REFERENCES `tipo_user` (`id`);
COMMIT;

create view v_usuarios as
select u.*,tu.nombre
from user u 
inner join tipo_user tu 
on u.tipo_user_id = tu.id;

create view v_libros as
select i.id,i.book_id,i.code,i.status_id,s.id as 'idstatus',s.name 
from item i
inner join status s
on i.status_id=s.id;

create view v_libros_detallado as
select b.*,e.name as 'editorial',c.name as 'categoria' , a.name as 'autor',a.lastname 
from book b 
inner join editorial e 
on e.id = b.editorial_id 
inner join category c 
on c.id = b.category_id 
inner join author a 
on a.id = b.author_id;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
