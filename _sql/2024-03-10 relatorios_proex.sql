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

-- --------------------------------------------------------
CREATE DATABASE proex_db;

USE proex_db;

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Usuario` tinytext NOT NULL,
  `siape_Usuario` tinytext NOT NULL,
  `cpf_Usuario` tinytext NOT NULL,
  `login_Usuario` tinytext NOT NULL,
  `senha_Usuario` tinytext NOT NULL,
  -- `foto_Usuario` tinytext NOT NULL,
  -- `unidade_Academica_Usuario` int(11) NOT NULL,
  `tipo_Usuario` BIT NOT NULL,
  `status_Usuario` BIT NOT NULL,
  PRIMARY KEY (`usuario_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `acoes`
--

CREATE TABLE IF NOT EXISTS `acoes` (
  `acao_ID` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_Acao` tinytext NOT NULL,
  `tipo_Acao` int(11) NOT NULL,
  `unidade_Academica_Acao` int(11) NOT NULL,
  `areaTematica_Acao` int NOT NULL,
  PRIMARY KEY (`acao_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `tipos_acoes`
--

CREATE TABLE IF NOT EXISTS `tipos_acoes` (
  `tipo_Acao_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Tipo_Acao` tinytext NOT NULL,
  PRIMARY KEY (`tipo_Acao_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `unidades_academicas`
--

CREATE TABLE IF NOT EXISTS `unidades_academicas` (
  `unidade_Academica_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_UA` tinytext NOT NULL,
  PRIMARY KEY (`unidade_Academica_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Estrutura para tabela `areas_tematicas`
--

CREATE TABLE IF NOT EXISTS `areas_tematicas` (
  `area_Tematica_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_AT` tinytext NOT NULL,
  PRIMARY KEY (`area_Tematica_ID`),
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Restrições para tabela `acoes`
--
ALTER TABLE `acoes`
ADD CONSTRAINT `acao_ibfk_01` FOREIGN KEY (`tipo_acao`) REFERENCES `tipos_acoes` (`tipo_Acao_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `acao_ibfk_02` FOREIGN KEY (`unidade_Academica_Acao`) REFERENCES `unidades_academica` (`unidade_Academica_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `acao_ibfk_03` FOREIGN KEY (`areaTematica_Acao`) REFERENCES `areas_tematica` (`area_Tematica_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `aluno_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Aluno` tinytext NOT NULL,
  `matricula_Aluno` int NOT NULL,
  `cpf_Aluno` tinytext NOT NULL,
  PRIMARY KEY (`aluno_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `membros_equipe`
--

CREATE TABLE IF NOT EXISTS `membros_equipe` (
  `membro_Equipe_ID` int(11) NOT NULL AUTO_INCREMENT,
  `acao_ME_ID` int(11) NOT NULL,
  `usuario_ME_ID` int(11) NOT NULL,
  `tipo_ME` int(11) NOT NULL,
  PRIMARY KEY (`membro_Equipe_ID`)
  KEY `acao_ME_ID` (`acao_ME_ID`),
  CONSTRAINT `ME_ibfk_1` FOREIGN KEY (`acao_ME_ID`) REFERENCES `acoes` (`acao_ID`) ON DELETE CASCADE ON UPDATE CASCADE
  KEY `usuario_ME_ID` (`usuario_ME_ID`),
  CONSTRAINT `ME_ibfk_2` FOREIGN KEY (`usuario_ME_ID`) REFERENCES `usuarios` (`usuario_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Estrutura para tabela `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos_membros` (
  `tipo_Membro_ID` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Tipo_Membro` tinytext NOT NULL,
  PRIMARY KEY (`tipo_Membro_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Restrições para tabela `membros_equipe`
--
ALTER TABLE `membros_equipe`
ADD CONSTRAINT `ME_ibfk_3` FOREIGN KEY (`tipo_ME`) REFERENCES `tipos_membros` (`tipo_Membro_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Estrutura para tabela `alunos_contribuintes`
--

CREATE TABLE IF NOT EXISTS `alunos_contribuinte` (
  `aluno_Contribuinte_ID` int(11) NOT NULL AUTO_INCREMENT,
  `acao_AC_ID` int(11) NOT NULL,
  `usuario_AC_ID` int(11) NOT NULL,
  `bolsista` BIT NOT NULL,
  PRIMARY KEY (`aluno_Contribuinte_ID`)
  KEY `acao_AC_ID` (`acao_AC_ID`),
  CONSTRAINT `AC_ibfk_1` FOREIGN KEY (`acao_AC_ID`) REFERENCES `acoes` (`acao_ID`) ON DELETE CASCADE ON UPDATE CASCADE
  KEY `usuario_AC_ID` (`usuario_AC_ID`),
  CONSTRAINT `AC_ibfk_2` FOREIGN KEY (`usuario_AC_ID`) REFERENCES `alunos` (`aluno_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;