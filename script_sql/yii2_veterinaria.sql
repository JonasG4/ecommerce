-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2022 at 01:59 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2_veterinaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('MasterRol', '1', 1646099809),
('UsuarioRol', '2', 1646099817);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/categorias/*', 2, NULL, NULL, NULL, 1646099417, 1646099417),
('/debug/*', 2, NULL, NULL, NULL, 1646099442, 1646099442),
('/gii/*', 2, NULL, NULL, NULL, 1646099450, 1646099450),
('/gridview/*', 2, NULL, NULL, NULL, 1646099465, 1646099465),
('/inicio/*', 2, NULL, NULL, NULL, 1646099380, 1646099380),
('/inicio/index', 2, NULL, NULL, NULL, 1646100390, 1646100390),
('/inicio/resta', 2, NULL, NULL, NULL, 1646100390, 1646100390),
('/inicio/suma', 2, NULL, NULL, NULL, 1646100390, 1646100390),
('/pacientes/*', 2, NULL, NULL, NULL, 1646575869, 1646575869),
('/productos/*', 2, NULL, NULL, NULL, 1646099423, 1646099423),
('/rbac/*', 2, NULL, NULL, NULL, 1646099493, 1646099493),
('/site/*', 2, NULL, NULL, NULL, 1646099406, 1646099406),
('/usuarios/*', 2, NULL, NULL, NULL, 1646099428, 1646099428),
('/usuarios/update', 2, NULL, NULL, NULL, 1646100607, 1646100607),
('/usuarios/view', 2, NULL, NULL, NULL, 1646100568, 1646100568),
('MasterAccess', 2, 'Permiso para acceder a todas las rutas del sistema como SuperAdmin', NULL, NULL, 1646099558, 1646099558),
('MasterRol', 1, 'Rol Master', NULL, NULL, 1646099694, 1646099771),
('UsuarioAccess', 2, 'Acceso limitado de usuario a productos y categorias', NULL, NULL, 1646099606, 1646099750),
('UsuarioRol', 1, 'Rol de usuario', NULL, NULL, 1646099726, 1646099777);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('MasterAccess', '/categorias/*'),
('UsuarioAccess', '/categorias/*'),
('MasterAccess', '/debug/*'),
('MasterAccess', '/gii/*'),
('MasterAccess', '/gridview/*'),
('MasterAccess', '/inicio/*'),
('UsuarioAccess', '/inicio/suma'),
('MasterAccess', '/pacientes/*'),
('MasterAccess', '/productos/*'),
('UsuarioAccess', '/productos/*'),
('MasterAccess', '/rbac/*'),
('MasterAccess', '/site/*'),
('UsuarioAccess', '/site/*'),
('MasterAccess', '/usuarios/*'),
('UsuarioAccess', '/usuarios/update'),
('UsuarioAccess', '/usuarios/view'),
('MasterRol', 'MasterAccess'),
('UsuarioRol', 'UsuarioAccess');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1644760080),
('m130524_201442_init', 1644760082),
('m140506_102106_rbac_init', 1646099002),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1646099002),
('m180523_151638_rbac_updates_indexes_without_prefix', 1646099002),
('m200409_110543_rbac_update_mssql_trigger', 1646099002);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departamentos`
--

CREATE TABLE `tbl_departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `codigo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_departamentos`
--

INSERT INTO `tbl_departamentos` (`id_departamento`, `nombre`, `codigo`) VALUES
(1, 'AHUACHAPAN', 'AH'),
(2, 'SANTA ANA', 'SA'),
(3, 'SONSONATE', 'SO'),
(4, 'CHALATENANGO', 'CH'),
(5, 'LA LIBERTAD', 'LL'),
(6, 'SAN SALVADOR', 'SS'),
(7, 'CUSCATLAN', 'CU'),
(8, 'LA PAZ', 'LP'),
(9, 'CABANAS', 'CA'),
(10, 'SAN VICENTE', 'SV'),
(11, 'USULUTAN', 'US'),
(12, 'SAN MIGUEL', 'SM'),
(13, 'MORAZAN', 'MO'),
(14, 'LA UNION', 'LU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_error_log`
--

CREATE TABLE `tbl_error_log` (
  `id_error_log` int(11) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `us_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_error_log`
--

INSERT INTO `tbl_error_log` (`id_error_log`, `controller`, `mensaje`, `us_id`, `fecha`) VALUES
(1, 'especies/create', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php:85<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-13 09:04:59'),
(2, 'especies/create', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php:85<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-13 09:05:26'),
(3, 'especies/create', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php:85<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-13 09:15:29'),
(4, 'especies/create', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php:85<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-13 09:16:42'),
(5, 'especies/create', 'Exception: User Ing cannot be blank. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php:85<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-13 09:20:28'),
(6, 'representantes/create', 'Exception: Cod Representante cannot be blank.&lt;br /&gt;Activo cannot be blank. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\RepresentantesController.php:85<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\RepresentantesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/repre...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-27 07:13:55'),
(7, 'representantes/create', 'Exception: Cod Representante cannot be blank. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\RepresentantesController.php:86<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\RepresentantesController-&gt;actionCreate()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/repre...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-27 07:17:39'),
(8, 'representantes/create-modal', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\RepresentantesController.php:145<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\RepresentantesController-&gt;actionCreateModal()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create-modal&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/repre...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-03 00:47:48'),
(9, 'representantes/create-modal', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\RepresentantesController.php:120<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\RepresentantesController-&gt;actionCreateModal()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create-modal&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/repre...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-03 09:21:56'),
(10, 'representantes/create-modal', 'Exception: User Mod is invalid. in C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\RepresentantesController.php:128<br />\nStack trace:<br />\n#0 [internal function]: app\\modules\\pacientes\\controllers\\RepresentantesController-&gt;actionCreateModal()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create-modal&#039;, Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/repre...&#039;, Array)<br />\n#5 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-03 09:34:05'),
(11, 'especies/delete', 'PDOException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`yii2_veterinaria`.`tbl_razas`, CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`)) in C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\nStack trace:<br />\n#0 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;DELETE FROM `tb...&#039;)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(405): yii\\db\\Command-&gt;execute()<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(765): yii\\db\\ActiveRecord::deleteAll(Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(724): yii\\db\\ActiveRecord-&gt;deleteInternal()<br />\n#5 C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php(142): yii\\db\\ActiveRecord-&gt;delete()<br />\n#6 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionDelete(&#039;1&#039;)<br />\n#7 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#8 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#9 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;delete&#039;, Array)<br />\n#10 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#11 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#12 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#13 {main}<br />\n<br />\nNext yii\\db\\IntegrityException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`yii2_veterinaria`.`tbl_razas`, CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`))<br />\nThe SQL being executed was: DELETE FROM `tbl_especies` WHERE `id_especie`=1 in C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\nStack trace:<br />\n#0 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;DELETE FROM `tb...&#039;)<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;DELETE FROM `tb...&#039;)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(405): yii\\db\\Command-&gt;execute()<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(765): yii\\db\\ActiveRecord::deleteAll(Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(724): yii\\db\\ActiveRecord-&gt;deleteInternal()<br />\n#5 C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php(142): yii\\db\\ActiveRecord-&gt;delete()<br />\n#6 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionDelete(&#039;1&#039;)<br />\n#7 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#8 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#9 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;delete&#039;, Array)<br />\n#10 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#11 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#12 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#13 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\n(<br />\n    [0] =&gt; 23000<br />\n    [1] =&gt; 1451<br />\n    [2] =&gt; Cannot delete or update a parent row: a foreign key constraint fails (`yii2_veterinaria`.`tbl_razas`, CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`))<br />\n)<br />\n', 1, '2022-04-24 07:42:56'),
(12, 'especies/delete', 'PDOException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`yii2_veterinaria`.`tbl_razas`, CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`)) in C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\nStack trace:<br />\n#0 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;DELETE FROM `tb...&#039;)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(405): yii\\db\\Command-&gt;execute()<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(765): yii\\db\\ActiveRecord::deleteAll(Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(724): yii\\db\\ActiveRecord-&gt;deleteInternal()<br />\n#5 C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php(142): yii\\db\\ActiveRecord-&gt;delete()<br />\n#6 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionDelete(&#039;2&#039;)<br />\n#7 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#8 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#9 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;delete&#039;, Array)<br />\n#10 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#11 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#12 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#13 {main}<br />\n<br />\nNext yii\\db\\IntegrityException: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`yii2_veterinaria`.`tbl_razas`, CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`))<br />\nThe SQL being executed was: DELETE FROM `tbl_especies` WHERE `id_especie`=2 in C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\nStack trace:<br />\n#0 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;DELETE FROM `tb...&#039;)<br />\n#1 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;DELETE FROM `tb...&#039;)<br />\n#2 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(405): yii\\db\\Command-&gt;execute()<br />\n#3 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(765): yii\\db\\ActiveRecord::deleteAll(Array)<br />\n#4 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(724): yii\\db\\ActiveRecord-&gt;deleteInternal()<br />\n#5 C:\\laragon\\www\\veterinaria\\modules\\pacientes\\controllers\\EspeciesController.php(142): yii\\db\\ActiveRecord-&gt;delete()<br />\n#6 [internal function]: app\\modules\\pacientes\\controllers\\EspeciesController-&gt;actionDelete(&#039;2&#039;)<br />\n#7 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#8 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#9 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;delete&#039;, Array)<br />\n#10 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;pacientes/espec...&#039;, Array)<br />\n#11 C:\\laragon\\www\\veterinaria\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#12 C:\\laragon\\www\\veterinaria\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#13 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\n(<br />\n    [0] =&gt; 23000<br />\n    [1] =&gt; 1451<br />\n    [2] =&gt; Cannot delete or update a parent row: a foreign key constraint fails (`yii2_veterinaria`.`tbl_razas`, CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`))<br />\n)<br />\n', 1, '2022-04-24 07:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_especies`
--

CREATE TABLE `tbl_especies` (
  `id_especie` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `user_ing` int(11) NOT NULL,
  `fecha_ing` datetime NOT NULL,
  `user_mod` int(11) NOT NULL,
  `fecha_mod` datetime NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_especies`
--

INSERT INTO `tbl_especies` (`id_especie`, `nombre`, `user_ing`, `fecha_ing`, `user_mod`, `fecha_mod`, `visible`) VALUES
(1, 'Canina', 1, '2022-03-06 13:38:55', 1, '2022-03-06 13:38:55', 1),
(2, 'Gatuna', 1, '2022-03-06 13:38:55', 1, '2022-03-06 13:38:55', 1),
(3, 'Especie 3', 1, '2022-05-04 19:49:13', 1, '2022-05-04 19:49:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_municipios`
--

CREATE TABLE `tbl_municipios` (
  `id_municipio` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `nombre` varchar(125) NOT NULL,
  `codigo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_municipios`
--

INSERT INTO `tbl_municipios` (`id_municipio`, `id_departamento`, `nombre`, `codigo`) VALUES
(1, 1, 'AHUACHAPAN', '0101'),
(2, 1, 'APANECA', '0102'),
(3, 1, 'ATIQUIZAYA', '0103'),
(4, 1, 'CONCEPCION DE ATACO', '0104'),
(5, 1, 'EL REFUGIO', '0105'),
(6, 1, 'GUAYMANGO', '0106'),
(7, 1, 'JUJUTLA', '0107'),
(8, 1, 'SAN FRANCISCO MENENDEZ', '0108'),
(9, 1, 'SAN LORENZO', '0109'),
(10, 1, 'SAN PEDRO PUXTLA', '0110'),
(11, 1, 'TACUBA', '0111'),
(12, 1, 'TURIN', '0112'),
(13, 2, 'SANTA ANA', '0201'),
(14, 2, 'CANDELARIA DE LA FRONTERA', '0202'),
(15, 2, 'COATEPEQUE', '0203'),
(16, 2, 'CHALCHUAPA', '0204'),
(17, 2, 'EL CONGO', '0205'),
(18, 2, 'EL PORVENIR', '0206'),
(19, 2, 'MASAHUAT', '0207'),
(20, 2, 'METAPAN', '0208'),
(21, 2, 'SAN ANTONIO PAJONAL', '0209'),
(22, 2, 'SAN SEBASTIAN SALITRILLO', '0210'),
(23, 2, 'SANTA ROSA GUACHIPILIN', '0211'),
(24, 2, 'SANTIAGO DE LA FRONTERA', '0212'),
(25, 2, 'TEXISTEPEQUE', '0213'),
(26, 3, 'SONSONATE', '0301'),
(27, 3, 'ACAJUTLA', '0302'),
(28, 3, 'ARMENIA', '0303'),
(29, 3, 'CALUCO', '0304'),
(30, 3, 'CUISNAHUAT', '0305'),
(31, 3, 'IZALCO', '0306'),
(32, 3, 'JUAYUA', '0307'),
(33, 3, 'NAHUIZALCO', '0308'),
(34, 3, 'NAHUILINGO', '0309'),
(35, 3, 'SALCOATITAN', '0310'),
(36, 3, 'SAN ANTONIO DEL MONTE', '0311'),
(37, 3, 'SAN JULIAN', '0312'),
(38, 3, 'SANTA CATARINA MASAHUAT', '0313'),
(39, 3, 'SANTA ISABEL ISHUATAN', '0314'),
(40, 3, 'SANTO DOMINGO DE GUZMAN', '0315'),
(41, 3, 'SONZACATE', '0316'),
(42, 4, 'CHALATENANGO', '0401'),
(43, 4, 'AGUA CALIENTE', '0402'),
(44, 4, 'ARCATAO', '0403'),
(45, 4, 'AZACUALPA', '0404'),
(46, 4, 'SAN JOSE CANCASQUE', '0405'),
(47, 4, 'CITALA', '0406'),
(48, 4, 'COMALAPA', '0407'),
(49, 4, 'CONCEPCION QUEZALTEPEQUE', '0408'),
(50, 4, 'DULCE NOMBRE DE MARIA', '0409'),
(51, 4, 'EL CARRIZAL', '0410'),
(52, 4, 'EL PARAISO', '0411'),
(53, 4, 'LA LAGUNA', '0412'),
(54, 4, 'LA PALMA', '0413'),
(55, 4, 'LA REINA', '0414'),
(56, 4, 'LAS FLORES', '0415'),
(57, 4, 'LAS VUELTAS', '0416'),
(58, 4, 'NOMBRE DE JESUS', '0417'),
(59, 4, 'NUEVA CONCEPCION', '0418'),
(60, 4, 'NUEVA TRINIDAD', '0419'),
(61, 4, 'OJOS DE AGUA', '0420'),
(62, 4, 'POTONICO', '0421'),
(63, 4, 'SAN ANTONIO DE LA CRUZ', '0422'),
(64, 4, 'SAN ANTONIO LOS RANCHOS', '0423'),
(65, 4, 'SAN FERNANDO', '0424'),
(66, 4, 'SAN FRANCISCO LEMPA', '0425'),
(67, 4, 'SAN FRANCISCO MORAZAN', '0426'),
(68, 4, 'SAN IGNACIO', '0427'),
(69, 4, 'SAN ISIDRO LABRADOR', '0428'),
(70, 4, 'SAN LUIS DEL CARMEN', '0429'),
(71, 4, 'SAN MIGUEL DE MERCEDES', '0430'),
(72, 4, 'SAN RAFAEL', '0431'),
(73, 4, 'SANTA RITA', '0432'),
(74, 4, 'TEJUTLA', '0433'),
(75, 5, 'SANTA TECLA', '0501'),
(76, 5, 'ANTIGUO CUSCATLAN', '0502'),
(77, 5, 'CIUDAD ARCE', '0503'),
(78, 5, 'COLON', '0504'),
(79, 5, 'COMASAGUA', '0505'),
(80, 5, 'CHILTIUPAN', '0506'),
(81, 5, 'HUIZUCAR', '0507'),
(82, 5, 'JAYAQUE', '0508'),
(83, 5, 'JICALAPA', '0509'),
(84, 5, 'LA LIBERTAD', '0510'),
(85, 5, 'NUEVO CUSCATLAN', '0511'),
(86, 5, 'SAN JUAN OPICO', '0512'),
(87, 5, 'QUEZALTEPEQUE', '0513'),
(88, 5, 'SACACOYO', '0514'),
(89, 5, 'SAN JOSE VILLANUEVA', '0515'),
(90, 5, 'SAN MATIAS', '0516'),
(91, 5, 'SAN PABLO TACACHICO', '0517'),
(92, 5, 'TALNIQUE', '0518'),
(93, 5, 'TAMANIQUE', '0519'),
(94, 5, 'TEOTEPEQUE', '0520'),
(95, 5, 'TEPECOYO', '0521'),
(96, 5, 'ZARAGOZA', '0522'),
(97, 6, 'SAN SALVADOR', '0601'),
(98, 6, 'AGUILARES', '0602'),
(99, 6, 'APOPA', '0603'),
(100, 6, 'AYUTUXTEPEQUE', '0604'),
(101, 6, 'CUSCATANCINGO', '0605'),
(102, 6, 'DELGADO', '0606'),
(103, 6, 'EL PAISNAL', '0607'),
(104, 6, 'GUAZAPA', '0608'),
(105, 6, 'ILOPANGO', '0609'),
(106, 6, 'MEJICANOS', '0610'),
(107, 6, 'NEJAPA', '0611'),
(108, 6, 'PANCHIMALCO', '0612'),
(109, 6, 'ROSARIO DE MORA', '0613'),
(110, 6, 'SAN MARCOS', '0614'),
(111, 6, 'SAN MARTIN', '0615'),
(112, 6, 'SANTIAGO TEXACUANGOS', '0616'),
(113, 6, 'SANTO TOMAS', '0617'),
(114, 6, 'SOYAPANGO', '0618'),
(115, 6, 'TONACATEPEQUE', '0619'),
(116, 7, 'COJUTEPEQUE', '0701'),
(117, 7, 'CANDELARIA', '0702'),
(118, 7, 'EL CARMEN', '0703'),
(119, 7, 'EL ROSARIO', '0704'),
(120, 7, 'MONTE SAN JUAN', '0705'),
(121, 7, 'ORATORIO DE CONCEPCION', '0706'),
(122, 7, 'SAN BARTOLOME PERULAPIA', '0707'),
(123, 7, 'SAN CRISTOBAL', '0708'),
(124, 7, 'SAN JOSE GUAYABAL', '0709'),
(125, 7, 'SAN PEDRO PERULAPAN', '0710'),
(126, 7, 'SAN RAFAEL CEDROS', '0711'),
(127, 7, 'SAN RAMON', '0712'),
(128, 7, 'SANTA CRUZ ANALQUITO', '0713'),
(129, 7, 'SANTA CRUZ MICHAPA', '0714'),
(130, 7, 'SUCHITOTO', '0715'),
(131, 7, 'TENANCINGO', '0716'),
(132, 8, 'ZACATECOLUCA', '0801'),
(133, 8, 'CUYULTITAN', '0802'),
(134, 8, 'EL ROSARIO', '0803'),
(135, 8, 'JERUSALEN', '0804'),
(136, 8, 'MERCEDES DE LA CEIBA', '0805'),
(137, 8, 'OLOCUILTA', '0806'),
(138, 8, 'PARAISO DE OSORIO', '0807'),
(139, 8, 'SAN ANTONIO MASAHUAT', '0808'),
(140, 8, 'SAN EMIGDIO', '0809'),
(141, 8, 'SAN FRANCISCO CHINAMECA', '0810'),
(142, 8, 'SAN JUAN NONUALCO', '0811'),
(143, 8, 'SAN JUAN TALPA', '0812'),
(144, 8, 'SAN JUAN TEPEZONTES', '0813'),
(145, 8, 'SAN LUIS TALPA', '0814'),
(146, 8, 'SAN LUIS LA HERRADURA', '0815'),
(147, 8, 'SAN MIGUEL TEPEZONTES', '0816'),
(148, 8, 'SAN PEDRO MASAHUAT', '0817'),
(149, 8, 'SAN PEDRO NONUALCO', '0818'),
(150, 8, 'SAN RAFAEL OBRAJUELO', '0819'),
(151, 8, 'SANTA MARIA OSTUMA', '0820'),
(152, 8, 'SANTIAGO NONUALCO', '0821'),
(153, 8, 'TAPALHUACA', '0822'),
(154, 9, 'SENSUNTEPEQUE', '0901'),
(155, 9, 'CINQUERA', '0902'),
(156, 9, 'DOLORES', '0903'),
(157, 9, 'GUACOTECTI', '0904'),
(158, 9, 'ILOBASCO', '0905'),
(159, 9, 'JUTIAPA', '0906'),
(160, 9, 'SAN ISIDRO', '0907'),
(161, 9, 'TEJUTEPEQUE', '0908'),
(162, 9, 'VICTORIA', '0909'),
(163, 10, 'SAN VICENTE', '1001'),
(164, 10, 'APASTEPEQUE', '1002'),
(165, 10, 'GUADALUPE', '1003'),
(166, 10, 'SAN CAYETANO ISTEPEQUE', '1004'),
(167, 10, 'SAN ESTEBAN CATARINA', '1005'),
(168, 10, 'SAN ILDEFONSO', '1006'),
(169, 10, 'SAN LORENZO', '1007'),
(170, 10, 'SAN SEBASTIAN', '1008'),
(171, 10, 'SANTA CLARA', '1009'),
(172, 10, 'SANTO DOMINGO', '1010'),
(173, 10, 'TECOLUCA', '1011'),
(174, 10, 'TEPETITAN', '1012'),
(175, 10, 'VERAPAZ', '1013'),
(176, 11, 'USULUTAN', '1101'),
(177, 11, 'ALEGRIA', '1102'),
(178, 11, 'BERLIN', '1103'),
(179, 11, 'CALIFORNIA', '1104'),
(180, 11, 'CONCEPCION BATRES', '1105'),
(181, 11, 'EL TRIUNFO', '1106'),
(182, 11, 'EREGUAYQUIN', '1107'),
(183, 11, 'ESTANZUELAS', '1108'),
(184, 11, 'JIQUILISCO', '1109'),
(185, 11, 'JUCUAPA', '1110'),
(186, 11, 'JUCUARAN', '1111'),
(187, 11, 'MERCEDES UMANA', '1112'),
(188, 11, 'NUEVA GRANADA', '1113'),
(189, 11, 'OZATLAN', '1114'),
(190, 11, 'PUERTO EL TRIUNFO', '1115'),
(191, 11, 'SAN AGUSTIN', '1116'),
(192, 11, 'SAN BUENAVENTURA', '1117'),
(193, 11, 'SAN DIONISIO', '1118'),
(194, 11, 'SAN FRANCISCO JAVIER', '1119'),
(195, 11, 'SANTA ELENA', '1120'),
(196, 11, 'SANTA MARIA', '1121'),
(197, 11, 'SANTIAGO DE MARIA', '1122'),
(198, 11, 'TECAPAN', '1123'),
(199, 12, 'SAN MIGUEL', '1201'),
(200, 12, 'CAROLINA', '1202'),
(201, 12, 'CIUDAD BARRIOS', '1203'),
(202, 12, 'COMACARAN', '1204'),
(203, 12, 'CHAPELTIQUE', '1205'),
(204, 12, 'CHINAMECA', '1206'),
(205, 12, 'CHIRILAGUA', '1207'),
(206, 12, 'EL TRANSITO', '1208'),
(207, 12, 'LOLOTIQUE', '1209'),
(208, 12, 'MONCAGUA', '1210'),
(209, 12, 'NUEVA GUADALUPE', '1211'),
(210, 12, 'NUEVO EDEN DE SAN JUAN', '1212'),
(211, 12, 'QUELEPA', '1213'),
(212, 12, 'SAN ANTONIO', '1214'),
(213, 12, 'SAN GERARDO', '1215'),
(214, 12, 'SAN JORGE', '1216'),
(215, 12, 'SAN LUIS DE LA REINA', '1217'),
(216, 12, 'SAN RAFAEL ORIENTE', '1218'),
(217, 12, 'SESORI', '1219'),
(218, 12, 'ULUAZAPA', '1220'),
(219, 13, 'SAN FRANCISCO GOTERA', '1301'),
(220, 13, 'ARAMBALA', '1302'),
(221, 13, 'CACAOPERA', '1303'),
(222, 13, 'CORINTO', '1304'),
(223, 13, 'CHILANGA', '1305'),
(224, 13, 'DELICIAS DE CONCEPCION', '1306'),
(225, 13, 'EL DIVISADERO', '1307'),
(226, 13, 'EL ROSARIO', '1308'),
(227, 13, 'GUALOCOCTI', '1309'),
(228, 13, 'GUATAJIAGUA', '1310'),
(229, 13, 'JOATECA', '1311'),
(230, 13, 'JOCOAITIQUE', '1312'),
(231, 13, 'JOCORO', '1313'),
(232, 13, 'LOLOTIQUILLO', '1314'),
(233, 13, 'MEANGUERA', '1315'),
(234, 13, 'OSICALA', '1316'),
(235, 13, 'PERQUIN', '1317'),
(236, 13, 'SAN CARLOS', '1318'),
(237, 13, 'SAN FERNANDO', '1319'),
(238, 13, 'SAN ISIDRO', '1320'),
(239, 13, 'SAN SIMON', '1321'),
(240, 13, 'SENSEMBRA', '1322'),
(241, 13, 'SOCIEDAD', '1323'),
(242, 13, 'TOROLA', '1324'),
(243, 13, 'YAMABAL', '1325'),
(244, 13, 'YOLOAIQUIN', '1326'),
(245, 14, 'LA UNION', '1401'),
(246, 14, 'ANAMOROS', '1402'),
(247, 14, 'BOLIVAR', '1403'),
(248, 14, 'CONCEPCION ORIENTE', '1404'),
(249, 14, 'CONCHAGUA', '1405'),
(250, 14, 'EL CARMEN', '1406'),
(251, 14, 'EL SAUCE', '1407'),
(252, 14, 'INTIPUCA', '1408'),
(253, 14, 'LISLIQUE', '1409'),
(254, 14, 'MEANGUERA DEL GOLFO', '1410'),
(255, 14, 'NUEVA ESPARTA', '1411'),
(256, 14, 'PASAQUINA', '1412'),
(257, 14, 'POLOROS', '1413'),
(258, 14, 'SAN ALEJO', '1414'),
(259, 14, 'SAN JOSE', '1415'),
(260, 14, 'SANTA ROSA DE LIMA', '1416'),
(261, 14, 'YAYANTIQUE', '1417'),
(262, 14, 'YUCUAIQUIN', '1418');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pacientes`
--

CREATE TABLE `tbl_pacientes` (
  `id_paciente` int(11) NOT NULL,
  `cod_paciente` varchar(25) NOT NULL,
  `id_representante` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_especie` int(11) NOT NULL,
  `id_raza` int(11) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fecha_nac` date NOT NULL,
  `color` varchar(255) NOT NULL,
  `caracteristicas` text,
  `alergias` text,
  `user_ing` int(11) NOT NULL,
  `fecha_ing` datetime NOT NULL,
  `user_mod` int(11) NOT NULL,
  `fecha_mod` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pacientes`
--

INSERT INTO `tbl_pacientes` (`id_paciente`, `cod_paciente`, `id_representante`, `nombre`, `imagen`, `id_especie`, `id_raza`, `sexo`, `fecha_nac`, `color`, `caracteristicas`, `alergias`, `user_ing`, `fecha_ing`, `user_mod`, `fecha_mod`, `activo`) VALUES
(1, 'PA-0001', 1, 'Byakko Junior', '/pacientes/byakko.png', 2, 246, 'M', '2014-04-01', 'Tuxedo', 'caracteristicas del paciente', 'alergias del paciente', 1, '2022-05-08 06:58:00', 1, '2022-05-08 06:58:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_razas`
--

CREATE TABLE `tbl_razas` (
  `id_raza` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `id_especie` int(11) NOT NULL,
  `user_ing` int(11) NOT NULL,
  `fecha_ing` datetime NOT NULL,
  `user_mod` int(11) NOT NULL,
  `fecha_mod` datetime NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_razas`
--

INSERT INTO `tbl_razas` (`id_raza`, `nombre`, `id_especie`, `user_ing`, `fecha_ing`, `user_mod`, `fecha_mod`, `visible`) VALUES
(1, 'Affenpinscher', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(2, 'Airedale terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(3, 'Aïdi', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(4, 'Akita Inu', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(5, 'Akita Americano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(6, 'Alano español', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(7, 'Alaskan malamute', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(8, 'Alaskan Klee Kai', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(9, 'American Hairless terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(10, 'American Staffordshire Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(11, 'Antiguo Perro Pastor Inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(12, 'Appenzeller', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(13, 'Australian Cattle Dog', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(14, 'Australian terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(15, 'Australian Silky Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(16, 'Azawakh', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(17, 'Bardino (Perro majorero)', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(18, 'Bandog', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(19, 'Basenji', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(20, 'Basset azul de Gascuña', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(21, 'Basset hound', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(22, 'Beagle', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(23, 'Beauceron', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(24, 'Bedlington terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(25, 'Bergamasco', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(26, 'Bichon frisé', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(27, 'Bichón maltés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(28, 'Bichón habanero', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(29, 'Bobtail', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(30, 'Bloodhound', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(31, 'Border collie', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(32, 'Borzoi', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(33, 'Boston terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(34, 'Bóxer', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(35, 'Boyero de Berna', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(36, 'Boyero de Flandes', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(37, 'Braco alemán de pelo corto', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(38, 'Braco alemán de pelo duro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(39, 'Braco de Auvernia', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(40, 'Braco francés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(41, 'Braco húngaro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(42, 'Braco italiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(43, 'Braco tirolés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(44, 'Braco de Saint Germain', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(45, 'Braco de Weimar', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(46, 'Bull Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(47, 'Bulldog americano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(48, 'Bulldog francés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(49, 'Bulldog inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(50, 'Bullmastiff', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(51, 'Buhund noruego', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(52, 'Calupoh', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(53, 'Can de palleiro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(54, 'Caniche', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(55, 'Cão da Serra da Estrela', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(56, 'Cão da Serra de Aires', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(57, 'Cão de Agua Português', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(58, 'Cão de Castro Laboreiro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(59, 'Cão de Fila de São Miguel', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(60, 'Cavalier King Charles Spaniel', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(61, 'Cazador de alces noruego', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(62, 'Chesapeake Bay Retriever', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(63, 'Chihuahueño', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(64, 'Crestado Chino', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(65, 'Cimarrón Uruguayo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(66, 'Cirneco del Etna', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(67, 'Chow chow', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(68, 'Clumber spaniel', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(69, 'Cobrador de pelo liso', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(70, 'Cocker spaniel americano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(71, 'Cocker spaniel inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(72, 'Collie de pelo corto', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(73, 'Collie de pelo largo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(74, 'Bearded collie', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(75, 'Corgi galés de Cardigan', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(76, 'Dachshund', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(77, 'Dálmata', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(78, 'Dandie Dinmont Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(79, 'Deerhound', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(80, 'Dobermann', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(81, 'Dogo alemán', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(82, 'Dogo argentino', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(83, 'Dogo de burdeos', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(84, 'Dogo del Tíbet', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(85, 'Dogo guatemalteco', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(86, 'English springer spaniel', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(87, 'Entlebucher', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(88, 'Épagneul bretón', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(89, 'Épagneul français', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(90, 'Epagneul papillón', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(91, 'Eurasier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(92, 'Fila Brasileiro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(93, 'Flat-Coated Retriever', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(94, 'Fox Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(95, 'Foxhound americano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(96, 'Galgo español', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(97, 'Galgo húngaro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(98, 'Galgo inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(99, 'Galgo italiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(100, 'Golden retriever', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(101, 'Glen of Imaal Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(102, 'Gran danés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(103, 'Gegar colombiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(104, 'Grifón belga', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(105, 'Hovawart', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(106, 'Husky siberiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(107, 'Jack Russell Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(108, 'Keeshond', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(109, 'Kerry blue terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(110, 'Komondor', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(111, 'Kuvasz', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(112, 'Labrador', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(113, 'Lakeland Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(114, 'Laekenois', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(115, 'Landseer', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(116, 'Lebrel afgano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(117, 'Lebrel polaco', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(118, 'Leonberger', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(119, 'Lobero irlandés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(120, 'Lundehund', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(121, 'Perro lobo de Saarloos', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(122, 'Lhasa apso', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(123, 'Löwchen', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(124, 'Maltés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(125, 'Malinois', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(126, 'Manchester terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(127, 'Mastín afgano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(128, 'Mastín del Pirineo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(129, 'Mastín español', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(130, 'Mastín inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(131, 'Mastín italiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(132, 'Mastín napolitano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(133, 'Mastín tibetano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(134, 'Mucuchies', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(135, 'Mudi', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(136, 'Münsterländer grande', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(137, 'Münsterländer pequeño', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(138, 'Nova Scotia Duck Tolling Retriever', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(139, 'Ovejero magallánico', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(140, 'Pastor alemán', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(141, 'Pastor belga', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(142, 'Pastor blanco suizo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(143, 'Pastor catalán', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(144, 'Pastor croata', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(145, 'Pastor garafiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(146, 'Pastor holandés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(147, 'Pastor peruano Chiribaya', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(148, 'Pastor de Brie', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(149, 'Pastor de los Pirineos', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(150, 'Pastor leonés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(151, 'Pastor mallorquín', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(152, 'Pastor maremmano-abrucés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(153, 'Pastor de Valée', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(154, 'Pastor vasco', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(155, 'Pekinés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(156, 'Pembroke Welsh Corgi', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(157, 'Pequeño Lebrel Italiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(158, 'Perdiguero francés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(159, 'Perdiguero portugués', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(160, 'Perro cimarrón uruguayo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(161, 'Perro de agua americano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(162, 'Perro de agua español', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(163, 'Perro de agua irlandés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(164, 'Perro de agua portugués', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(165, 'Perro de Groenlandia', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(166, 'Perro de osos de Carelia', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(167, 'Perro dogo mallorquín', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(168, 'Perro esquimal canadiense', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(169, 'Perro de Montaña de los Pirineos', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(170, 'Perro fino colombiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(171, 'Perro pastor de las islas Shetland', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(172, 'Perro peruano sin pelo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(173, 'Phalène', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(174, 'Pinscher alemán', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(175, 'Pinscher miniatura', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(176, 'Pitbull', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(177, 'Podenco canario', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(178, 'Podenco ibicenco', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(179, 'Podenco portugués', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(180, 'Pointer', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(181, 'Pomerania', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(182, 'Presa canario', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(183, 'Pudelpointer', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(184, 'Pug', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(185, 'Puli', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(186, 'Pumi', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(187, 'Rafeiro do Alentejo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(188, 'Ratonero bodeguero andaluz', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(189, 'Ratonero mallorquín', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(190, 'Ratonero valenciano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(191, 'Rhodesian Ridgeback', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(192, 'Rottweiler', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(193, 'Saluki', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(194, 'Samoyedo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(195, 'San Bernardo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(196, 'Schapendoes', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(197, 'Schnauzer estándar', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(198, 'Schnauzer gigante', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(199, 'Schnauzer miniatura', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(200, 'Staffordshire Bull Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(201, 'Sabueso bosnio', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(202, 'Schipperke', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(203, 'Sealyham terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(204, 'Setter inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(205, 'Setter irlandés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(206, 'Shar Pei', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(207, 'Shiba Inu', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(208, 'Shih Tzu', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(209, 'Shikoku Inu', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(210, 'Siberian husky', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(211, 'Skye terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(212, 'Spaniel japonés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(213, 'Spaniel tibetano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(214, 'Spitz enano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(215, 'Spitz grande', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(216, 'Spitz mediano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(217, 'Spitz japonés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(218, 'Sussex spaniel', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(219, 'Teckel', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(220, 'Terranova', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(221, 'Terrier alemán', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(222, 'Terrier brasileño', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(223, 'Terrier checo', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(224, 'Terrier chileno', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(225, 'Terrier de Norfolk', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(226, 'Terrier de Norwich', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(227, 'Terrier escocés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(228, 'Terrier galés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(229, 'Terrier irlandés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(230, 'Terrier ruso negro', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(231, 'Terrier tibetano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(232, 'Toy spaniel inglés', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(233, 'Tervueren', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(234, 'Vallhund sueco', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(235, 'Volpino italiano', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(236, 'Weimaraner', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(237, 'West Highland White Terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(238, 'Whippet', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(239, 'Wolfsspitz', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(240, 'Xoloitzcuintle', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(241, 'Yorkshire terrier', 1, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(242, 'Abisinio', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(243, 'American Curl', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(244, 'Azul ruso', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(245, 'American shorthair', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(246, 'American wirehair', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(247, 'Angora turco', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(248, 'Africano doméstico', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(249, 'Bembomba Almumema', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(250, 'Bengala', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(251, 'Bobtail japonés', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(252, 'Bombay', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(253, 'Bosque de Noruega', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(254, 'Brazilian Shorthair', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(255, 'Brivon de pelo corto', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(256, 'Brivon de pelo largo', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(257, 'British Shorthair', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(258, 'British Longhair', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(259, 'Burmés', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(260, 'Burmilla', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(261, 'Cornish rex', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(262, 'California Spangled', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(263, 'Cymric', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(264, 'Chartreux', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(265, 'Gato Carey', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(266, 'Devon rex', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(267, 'Dorado africano', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(268, 'Don Sphynx', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(269, 'Dragon Li', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(270, 'Europeo Común', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(271, 'Exótico de Pelo Corto', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(272, 'Gato europeo bicolor', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(273, 'FoldEx', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(274, 'German Rex', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(275, 'Habana brown', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(276, 'Himalayo', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(277, 'Korat', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(278, 'Khao Manee', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(279, 'Maine Coon', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(280, 'Manx', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(281, 'Mau egipcio', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(282, 'Munchkin', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(283, 'Ocicat', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(284, 'Oriental', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(285, 'Oriental de pelo largo', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(286, 'Persa Americano o Moderno', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(287, 'Peterbald', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(288, 'Pixie Bob', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(289, 'Gato rojo', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(290, 'Ragdoll', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(291, 'Sagrado de Birmania', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(292, 'Savannah', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(293, 'Scottish Fold', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(294, 'Selkirk rex', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(295, 'Serengeti', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(296, 'Seychellois', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(297, 'Siamés', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(298, 'Siamés Moderno', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(299, 'Siamés Tradicional', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(300, 'Siberiano', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(301, 'Snowshoe', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(302, 'Sphynx', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(303, 'Tonkinés', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(304, 'Van Turco', 2, 1, '2022-03-06 13:45:19', 1, '2022-03-06 13:45:19', 1),
(305, 'Ahuacatero Salvadoreño', 1, 1, '2022-03-20 08:30:02', 1, '2022-03-20 08:35:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_representantes`
--

CREATE TABLE `tbl_representantes` (
  `id_representante` int(11) NOT NULL,
  `cod_representante` varchar(25) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `user_ing` int(11) NOT NULL,
  `fecha_ing` datetime NOT NULL,
  `user_mod` int(11) NOT NULL,
  `fecha_mod` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_representantes`
--

INSERT INTO `tbl_representantes` (`id_representante`, `cod_representante`, `nombre`, `apellido`, `direccion`, `id_departamento`, `id_municipio`, `dui`, `telefono`, `correo_electronico`, `user_ing`, `fecha_ing`, `user_mod`, `fecha_mod`, `activo`) VALUES
(1, 'RP-0001', 'Jaime Ricardo', 'Guevara Hernandez', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 12, 207, '12321321', '3123213', 'jr.guevara@outlook.com', 1, '2022-03-27 08:28:55', 1, '2022-03-27 08:28:55', 1),
(2, 'RP-0002', 'Karla Vanessa', 'Quintanilla', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 10, 164, '2312313', '123122', 'kv_quintanilla@hotmail.com', 1, '2022-03-27 08:30:26', 1, '2022-03-27 08:30:26', 1),
(3, 'RP-0003', 'Carmen', 'Estrada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 5, 75, '213123', '3123123', 'cestrada@yahoo.com', 1, '2022-03-27 08:32:19', 1, '2022-03-27 08:32:19', 1),
(4, 'RP-0004', 'Ronald Edwin', 'Villalobos', 'San Miguel,.....', 11, 178, '12345678', '143414', 'correo3@test.com', 1, '2022-04-03 09:17:42', 1, '2022-04-03 09:17:42', 1),
(5, 'RP-0005', 'Jhojaira Abigail', 'Cruz Marquez', 'svbnadadd', 4, 45, '1232412414', '211323', 'correo2@test.com', 1, '2022-04-03 09:19:19', 1, '2022-04-03 09:19:19', 1),
(6, 'RP-0006', 'Anderson', 'Amaya', 'direccion', 1, 3, '123344124', '143414', 'correo2@test.com', 1, '2022-04-03 09:35:15', 1, '2022-04-03 09:35:15', 0),
(7, 'RP-0007', 'Gema Rocio', 'Sanabria', 'eqwqeewq', 5, 76, '1231231', '313244', 'correo3@test.com', 1, '2022-04-03 09:36:08', 1, '2022-04-03 09:36:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `username`, `nombre`, `apellido`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `imagen`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'james', 'Jaime', 'Guevara', 'tEuYL0epr10-PDJDdZ3dAmQs9nCU2gfl', '$2y$13$Hkpi4vzKpl.0cT1P7T.wVOJZRMBjvR6PHkJYrBmn/pO6z7d7wnPyi', NULL, 'admin@admin.com', '/avatars/dBC4_WA9QZx9sk7sYn3f8vrVcvQpqV-k.gif', 1, 1646012409, 1646012409, NULL),
(2, 'test', 'Test', 'test', 'YKKwSFAZSkRBp21O-nYSLvfh8-36Uu8Z', '$2y$13$Tdx5beo/phev7v4CLad.i.AYH7zKOZ.DUQDKtrGRc5lqHjFWOyroW', NULL, 'test@test.com', '/avatars/default.png', 1, 1646012577, 1646012577, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_departamentos`
--
ALTER TABLE `tbl_departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indexes for table `tbl_error_log`
--
ALTER TABLE `tbl_error_log`
  ADD PRIMARY KEY (`id_error_log`),
  ADD KEY `us_id` (`us_id`);

--
-- Indexes for table `tbl_especies`
--
ALTER TABLE `tbl_especies`
  ADD PRIMARY KEY (`id_especie`),
  ADD KEY `user_ing` (`user_ing`),
  ADD KEY `user_mod` (`user_mod`);

--
-- Indexes for table `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `ad_mu_relacion` (`id_departamento`),
  ADD KEY `ad_mu_relacion_2` (`id_departamento`),
  ADD KEY `ad_mu_relacion_3` (`id_departamento`);

--
-- Indexes for table `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_representante` (`id_representante`),
  ADD KEY `id_especie` (`id_especie`),
  ADD KEY `id_raza` (`id_raza`),
  ADD KEY `user_ing` (`user_ing`),
  ADD KEY `user_mod` (`user_mod`);

--
-- Indexes for table `tbl_razas`
--
ALTER TABLE `tbl_razas`
  ADD PRIMARY KEY (`id_raza`),
  ADD KEY `id_especie` (`id_especie`),
  ADD KEY `user_ing` (`user_ing`),
  ADD KEY `user_mod` (`user_mod`);

--
-- Indexes for table `tbl_representantes`
--
ALTER TABLE `tbl_representantes`
  ADD PRIMARY KEY (`id_representante`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `user_ing` (`user_ing`),
  ADD KEY `user_mod` (`user_mod`);

--
-- Indexes for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_departamentos`
--
ALTER TABLE `tbl_departamentos`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_error_log`
--
ALTER TABLE `tbl_error_log`
  MODIFY `id_error_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_especies`
--
ALTER TABLE `tbl_especies`
  MODIFY `id_especie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_razas`
--
ALTER TABLE `tbl_razas`
  MODIFY `id_raza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `tbl_representantes`
--
ALTER TABLE `tbl_representantes`
  MODIFY `id_representante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_error_log`
--
ALTER TABLE `tbl_error_log`
  ADD CONSTRAINT `tbl_error_log_ibfk_1` FOREIGN KEY (`us_id`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Constraints for table `tbl_especies`
--
ALTER TABLE `tbl_especies`
  ADD CONSTRAINT `tbl_especies_ibfk_1` FOREIGN KEY (`user_ing`) REFERENCES `tbl_usuarios` (`id_usuario`),
  ADD CONSTRAINT `tbl_especies_ibfk_2` FOREIGN KEY (`user_mod`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Constraints for table `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD CONSTRAINT `tbl_municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamentos` (`id_departamento`);

--
-- Constraints for table `tbl_pacientes`
--
ALTER TABLE `tbl_pacientes`
  ADD CONSTRAINT `tbl_pacientes_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`),
  ADD CONSTRAINT `tbl_pacientes_ibfk_2` FOREIGN KEY (`id_raza`) REFERENCES `tbl_razas` (`id_raza`),
  ADD CONSTRAINT `tbl_pacientes_ibfk_3` FOREIGN KEY (`id_representante`) REFERENCES `tbl_representantes` (`id_representante`),
  ADD CONSTRAINT `tbl_pacientes_ibfk_4` FOREIGN KEY (`user_ing`) REFERENCES `tbl_usuarios` (`id_usuario`),
  ADD CONSTRAINT `tbl_pacientes_ibfk_5` FOREIGN KEY (`user_mod`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Constraints for table `tbl_razas`
--
ALTER TABLE `tbl_razas`
  ADD CONSTRAINT `tbl_razas_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `tbl_especies` (`id_especie`),
  ADD CONSTRAINT `tbl_razas_ibfk_2` FOREIGN KEY (`user_ing`) REFERENCES `tbl_usuarios` (`id_usuario`),
  ADD CONSTRAINT `tbl_razas_ibfk_3` FOREIGN KEY (`user_mod`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Constraints for table `tbl_representantes`
--
ALTER TABLE `tbl_representantes`
  ADD CONSTRAINT `tbl_representantes_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `tbl_departamentos` (`id_departamento`),
  ADD CONSTRAINT `tbl_representantes_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `tbl_municipios` (`id_municipio`),
  ADD CONSTRAINT `tbl_representantes_ibfk_3` FOREIGN KEY (`user_ing`) REFERENCES `tbl_usuarios` (`id_usuario`),
  ADD CONSTRAINT `tbl_representantes_ibfk_4` FOREIGN KEY (`user_mod`) REFERENCES `tbl_usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
