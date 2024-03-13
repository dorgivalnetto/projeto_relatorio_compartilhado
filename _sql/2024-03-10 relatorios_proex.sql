-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql62-farm2.uni5.net
-- Tempo de geração: 14/03/2023 às 17:58
-- Versão do servidor: 10.5.16-MariaDB-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `ngd - proex`
--

CREATE DATABASE proex_db;

USE proex_db;

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioID` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` tinytext NOT NULL,
  `siapeUsuario` tinytext NOT NULL,
  `cpfUsuario` char(11) NOT NULL,
  `loginUsuario` tinytext NOT NULL,
  `senhaUsuario` tinytext NOT NULL,
  `tipoUsuario`   BIT NOT NULL, -- a user can be admin or not
  `statusUsuario` int(11) NOT NULL, -- if an account is active or not
  `registroUsuario_ID` int(11) NOT NULL,
  `dataRegistroUsuario` datetime NOT NULL,
  PRIMARY KEY (`usuarioID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `tipoAcao`
--

CREATE TABLE IF NOT EXISTS `tipoAcao` (
  `tipoAcaoID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Tipo` tinytext NOT NULL,
  PRIMARY KEY (`tipoAcaoID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `unidadeAcademica`
--

CREATE TABLE IF NOT EXISTS `unidadeAcademica` (
  `unidadeAcademicaID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_UA` tinytext NOT NULL,
  PRIMARY KEY (`unidadeAcademicaID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Estrutura para tabela `areas_tematica`
--

CREATE TABLE IF NOT EXISTS `tipoArea` (
  `tipoAreaID` int(11) NOT NULL AUTO_INCREMENT,
  `nomeArea` tinytext NOT NULL,
  PRIMARY KEY (`tipoAreaID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Estrutura para tabela `acoes`
--

CREATE TABLE IF NOT EXISTS `acoes` (
  `acaoID` int(11) NOT NULL AUTO_INCREMENT,
  `tituloAcao` tinytext NOT NULL,
  `tipoAcao` int(11) NOT NULL,
  `unidadeAcademicaAcao` int(11) NOT NULL,
  `areaTematicaAcao` int NOT NULL,
  PRIMARY KEY (`acaoID`),
  FOREIGN KEY (`tipoAcao`) REFERENCES `tipoAcao` (`tipoAcaoID`)  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`unidadeAcademicaAcao`) REFERENCES `unidadeAcademica` (`unidadeAcademicaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`areaTematicaAcao`) REFERENCES `tipoArea` (`tipoAreaID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `alunoID` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAluno` tinytext NOT NULL,
  `matriculaAluno` int NOT NULL,
  `cpfAluno` char(11) NOT NULL,
  PRIMARY KEY (`alunoID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `alunos_contribuintes`
--

CREATE TABLE IF NOT EXISTS `alunoContribuinte` (
  `alunoContribuinteID` int(11) NOT NULL AUTO_INCREMENT,
  `acoes_AC_ID` int(11) NOT NULL,
  `usuario_AC_ID` int(11) NOT NULL,
  `bolsista` BIT NOT NULL,
  PRIMARY KEY (`alunoContribuinteID`),
  FOREIGN KEY (`acoes_AC_ID`) REFERENCES `acoes` (`acaoID`)  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`usuario_AC_ID`) REFERENCES `alunos` (`alunoID`)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `membroEquipe`
--

CREATE TABLE IF NOT EXISTS `membroEquipe` (
  `membroEquipeID` int(11) NOT NULL AUTO_INCREMENT,
  `acao_ME_ID` int(11) NOT NULL,
  `usuario_ME_ID` int(11) NOT NULL,
  `tipoMembro` int(11) NOT NULL,
  PRIMARY KEY (`membroEquipeID`),
  FOREIGN KEY (`acao_ME_ID`) REFERENCES `acoes` (`acaoID`)  ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`usuario_ME_ID`) REFERENCES `usuarios` (`usuarioID`)  ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `tipoMembro`
--

CREATE TABLE IF NOT EXISTS `tipoMembro` (
  `tipoMembroID` int(11) NOT NULL AUTO_INCREMENT,
  `nomeTipo` tinytext NOT NULL,
  PRIMARY KEY (`tipoMembroID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;



-- COLOCAR INSERTS AQUI EM BAIXO

--
-- Inserindo usuario
--

SELECT * from `usuarios`;
INSERT INTO `usuarios` (`usuarioID`, `nomeUsuario`, `siapeUsuario`, `cpfUsuario`, `loginUsuario`, `senhaUsuario`, `tipoUsuario`, `statusUsuario`, `registroUsuario_ID`, `dataRegistroUsuario`) VALUES
(1, "Dorgival Netto", "1", 1, "dorgival.netto@ufca.edu.br", 'MTIzNDU2', 1, 1, 1, '2023-01-05 09:24:59');
