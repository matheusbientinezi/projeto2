-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.14-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


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
  `data_agendada` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `informacoes_adicionais` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.agenda: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` (`id`, `id_funcionario`, `id_cliente`, `id_procedimento`, `data_agendamento`, `data_agendada`, `hora_inicio`, `hora_final`, `tempo`, `informacoes_adicionais`) VALUES
	(1, 1, 39, 8, '2021-02-06 14:35:07', '2021-02-07', '15:30:00', '16:30:00', '01:00:00', 'informacoes adicionais'),
	(2, 1, 37, 6, '2021-02-06 14:45:52', '2021-02-08', '17:30:00', '19:00:00', '01:30:00', 'informacoes adicionais'),
	(3, 1, 46, 6, '2021-02-07 15:52:30', '2021-02-08', '17:30:00', '19:00:00', '01:30:00', 'informacoes adicionais'),
	(4, 1, 47, 5, '2021-02-07 15:52:44', '2021-02-08', '17:30:00', '19:00:00', '01:30:00', 'informacoes adicionais'),
	(5, 1, 50, 16, '2021-02-07 16:04:00', '2021-02-09', '15:30:00', '16:30:00', '01:00:00', 'informacoes adicionais'),
	(6, 1, 50, 7, '2021-02-07 16:04:26', '2021-02-09', '15:30:00', '16:30:00', '01:00:00', 'informacoes adicionais'),
	(7, 1, 51, 5, '2021-02-07 16:04:29', '2021-02-09', '15:30:00', '16:30:00', '01:00:00', 'informacoes adicionais'),
	(8, 1, 50, 1, '2021-02-07 16:04:47', '2021-02-09', '15:30:00', '16:30:00', '01:00:00', 'informacoes adicionais'),
	(9, 1, 50, 2, '2021-02-07 16:04:53', '2021-02-09', '15:30:00', '16:30:00', '01:00:00', 'informacoes adicionais');
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.cliente: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `sobrenome`, `email`, `cpf`, `celular`, `telefone`, `datanascimento`, `endereco`, `numero`, `cidade`, `uf`, `cep`, `informacoesadicionais`, `data_cadastro`, `status`) VALUES
	(46, 'Matheus', 'Bientinezi', 'matheusbientinezi.mb@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '(00) 0000-0000', '1998-12-29', 'Rua Roberto Koch', '748', 'São  José', 'PR', '81010-220', 'Teste campo', '2021-02-07 14:22:17', 'A'),
	(47, 'Matheus', 'Bientinezi', 'matheusbientinezi.mb@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '(41) 9916-1506', '1998-12-29', 'Rua Francisco Kochinski', '', 'Curitiba', 'PR', '81920-530', '', '2021-02-07 14:22:38', 'I'),
	(50, 'Matheus', 'Bientinezi', 'matheusbientinezi.mb@gmail.com', '101.117.399-93', '(41) 9 9161-5069', '(41) 9916-1506', '1998-12-29', 'Rua Francisco Kochinski', '', 'Curitiba', 'Choose...', '81920-530', 'teste', '2021-02-07 16:02:43', 'A'),
	(51, 'Luis', 'Carneiro', 'luis_carneiro@webcontrol.com.br', '', '', '', '0000-00-00', '', '', '', 'Choose...', '', '', '2021-02-08 13:26:50', 'I');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`id`, `funcionario`, `sobrenome_funcionario`, `email`, `senha`, `telefone`, `celular`, `cpf`, `data_nascimento`, `data_cadastro`, `procedimento_1`, `procedimento_2`, `procedimento_3`, `procedimento_4`, `procedimento_5`, `procedimento_6`, `procedimento_7`, `procedimento_8`, `procedimento_9`, `procedimento_10`, `procedimento_11`) VALUES
	(1, 'Thais', 'Jardim', 'tatajardimoliveira@gmail.com', NULL, NULL, '41991615069', '10864347901', '1999-01-26', '2021-02-06 14:38:14', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'S', 'N', '', NULL);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando estrutura para tabela studio.procedimento
CREATE TABLE IF NOT EXISTS `procedimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedimento` varchar(100) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `informacoesadicionais` varchar(255) DEFAULT NULL,
  `status` enum('A','I') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela studio.procedimento: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `procedimento` DISABLE KEYS */;
INSERT INTO `procedimento` (`id`, `procedimento`, `tempo`, `informacoesadicionais`, `status`) VALUES
	(1, 'Micropigmentação shadow', '01:30:00', '', 'A'),
	(2, 'Micropigmentação labial', '02:00:00', '', 'A'),
	(5, 'Desing de sobrancelha + henna', '00:45:00', '', 'A'),
	(6, 'Brow lamination', '01:00:00', '', 'A'),
	(8, 'Depilação egípcia', '01:00:00', '', 'I');
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
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
