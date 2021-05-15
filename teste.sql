-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.17-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.2.0.6228
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para studio
CREATE DATABASE IF NOT EXISTS `studio` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `studio`;

-- Copiando estrutura para tabela studio.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_procedimento` int(11) DEFAULT NULL,
  `data_agendamento` datetime DEFAULT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_final` datetime DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `status` enum('realizado','cancelado','reagendado','agendado') DEFAULT NULL,
  `informacoes_adicionais` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.agenda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id`, `id_funcionario`, `id_cliente`, `id_procedimento`, `data_agendamento`, `hora_inicio`, `hora_final`, `tempo`, `status`, `informacoes_adicionais`) VALUES
	(69, 1, 46, 1, '2021-04-06 18:04:12', '2021-04-06 07:30:00', '2021-04-06 08:30:00', '01:00:00', 'agendado', 'teste                                           ');
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

-- Copiando estrutura para tabela studio.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `informacoesadicionais` varchar(300) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('A','I') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.cliente: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `sobrenome`, `email`, `cpf`, `celular`, `telefone`, `datanascimento`, `endereco`, `numero`, `cidade`, `uf`, `cep`, `informacoesadicionais`, `data_cadastro`, `status`) VALUES
	(46, 'Lucas', 'Bientinezi', 'matheusbientinezi.mb@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '(00) 0000-0000', '1998-12-29', 'Rua Roberto Koch', '748', 'São  José', 'PR', '81010-220', 'Teste campo', '2021-02-07 14:22:17', 'A'),
	(47, 'Matheus', 'Bientinezi', 'matheusbientinezi.mb@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '(41) 9916-1506', '1998-12-29', 'Rua Francisco Kochinski', '', 'Curitiba', 'PR', '81920-530', '', '2021-02-07 14:22:38', 'I'),
	(50, 'Matheus', 'Bientinezi', 'matheusbientinezi.mb@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '(41) 9916-1506', '1998-12-29', 'Rua Francisco Kochinski', '', 'Curitiba', '', '81920-530', 'teste', '2021-02-07 16:02:43', 'A'),
	(51, 'Luis', 'Carneiro', 'luis_carneiro@webcontrol.com.br', '', '', '', '0000-00-00', '', '', '', 'Choose...', '', '', '2021-02-08 13:26:50', 'I'),
	(52, 'Lucas', 'Lopes', 'lucasbientinezi@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '', '1996-11-14', 'Rua Francisco Kochinski', '512', 'Curitiba', 'PR', '81010-220', 'Teste', '2021-02-16 16:11:02', 'I'),
	(53, 'Deise ', 'Jardim', 'deise.tecman@gmail.com', '901.431.670-49', '(41) 9 9730-9958', '(41) 9916-1506', '1974-05-25', 'rua francisco kochinski', '512', 'Curitiba', 'PR', '81920-530', '', '2021-03-06 10:57:06', 'A');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela studio.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(100) DEFAULT NULL,
  `sobrenome_funcionario` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `cpf` varchar(30) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `procedimento_1` enum('S','N') DEFAULT NULL,
  `procedimento_2` enum('S','N') DEFAULT NULL,
  `procedimento_3` enum('S','N') DEFAULT NULL,
  `procedimento_4` enum('S','N') DEFAULT NULL,
  `procedimento_5` enum('S','N') DEFAULT NULL,
  `procedimento_6` enum('S','N') DEFAULT NULL,
  `procedimento_7` enum('S','N') DEFAULT NULL,
  `procedimento_8` enum('S','N') DEFAULT NULL,
  `procedimento_9` enum('S','N') DEFAULT NULL,
  `procedimento_10` enum('S','N') DEFAULT NULL,
  `procedimento_11` enum('S','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.funcionario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id`, `funcionario`, `sobrenome_funcionario`, `email`, `senha`, `telefone`, `celular`, `cpf`, `data_nascimento`, `data_cadastro`, `procedimento_1`, `procedimento_2`, `procedimento_3`, `procedimento_4`, `procedimento_5`, `procedimento_6`, `procedimento_7`, `procedimento_8`, `procedimento_9`, `procedimento_10`, `procedimento_11`) VALUES
	(1, 'Thais', 'Jardim', 'tatajardimoliveira@gmail.com', NULL, NULL, '41991615069', '10864347901', '1999-01-26', '2021-02-06 14:38:14', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'N', '', NULL),
	(2, 'Deise', 'Jardim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 'Amanda', 'Franco', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela studio.procedimento
CREATE TABLE IF NOT EXISTS `procedimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedimento` varchar(100) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `informacoesadicionais` varchar(255) DEFAULT NULL,
  `status` enum('A','I') DEFAULT 'A',
  `color` varchar(50) DEFAULT 'nada',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.procedimento: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `procedimento` DISABLE KEYS */;
INSERT INTO `procedimento` (`id`, `procedimento`, `tempo`, `informacoesadicionais`, `status`, `color`) VALUES
	(1, 'Micropigmentação labial teste', '02:00:00', 'teste', 'A', '#FFD700'),
	(2, 'Micropigmentação labial', '02:00:00', '', 'A', '#0071c5'),
	(5, 'Desing de sobrancelha + henna', '00:45:00', '', 'A', '#40e0d0'),
	(6, 'Brow lamination', '01:00:00', '', 'A', ''),
	(8, 'Depilação egípcia', '01:00:00', '', 'A', '#ffea00');
/*!40000 ALTER TABLE `procedimento` ENABLE KEYS */;

-- Copiando estrutura para tabela studio.usuario_adm
CREATE TABLE IF NOT EXISTS `usuario_adm` (
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `foto_perfil` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.usuario_adm: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_adm` DISABLE KEYS */;
INSERT INTO `usuario_adm` (`usuario`, `email`, `senha`, `foto_perfil`) VALUES
	('Dellas ADM', 'stddellas@gmail.com', '123456', 'imagem\\logo.png');
/*!40000 ALTER TABLE `usuario_adm` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
