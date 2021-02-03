-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.17-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.1.0.6210
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
  `data_agendada` date DEFAULT NULL,
  `hora_agendada` time DEFAULT NULL,
  `informacoes_adicionais` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

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
  ` cidade` varchar(100) DEFAULT NULL,
  `uf` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `informacoesadicionais` varchar(300) DEFAULT NULL,
  `data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela studio.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela studio.procedimento
CREATE TABLE IF NOT EXISTS `procedimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedimento` varchar(100) DEFAULT NULL,
  `tempo` time DEFAULT NULL,
  `informacoesadicionais` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela studio.usuario_adm
CREATE TABLE IF NOT EXISTS `usuario_adm` (
  `usuario` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `foto_perfil` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
