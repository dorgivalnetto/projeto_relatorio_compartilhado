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
-- Banco de dados: `programaeficie03`
--

-- --------------------------------------------------------
CREATE DATABASE new_test;

USE new_test;

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` int(11) NOT NULL,
  `login` tinytext NOT NULL,
  `nome` tinytext NOT NULL,
  `senha` tinytext NOT NULL,
  `fotoPeople` tinytext NOT NULL,
  `get_id_prefeitura` int(11) NOT NULL,
  `tipo` char(2) NOT NULL,
  `status` int(11) NOT NULL,
  `idUserRegister` int(11) NOT NULL,
  `dataRegistro` datetime NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--
SELECT * FROM `usuario`;
INSERT INTO `usuario` (`id_usu`, `login`, `nome`, `senha`, `fotoPeople`, `get_id_prefeitura`, `tipo`, `status`, `idUserRegister`, `dataRegistro`) VALUES
(1, 'dorgival.netto@ufca.edu.br', 'Dorgival Netto', 'MTIzNDU=', 'noPhoto.jpg', 2, '0', 1, 1, '2023-01-05 09:24:59');
UPDATE `usuario`SET senha = 'teste123' WHERE `id_usu`=1;
--
-- Estrutura para tabela `organizacaoUFCA`
--

CREATE TABLE IF NOT EXISTS `organizacaoUFCA` (
  `id_organizacao` int(11) NOT NULL,
  `get_id_unidade_academica` int(11) NOT NULL,
  `get_id_curso` int(11) NOT NULL,
  `get_id_register` int(11) NOT NULL,
  `data_register_organizacao` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `egp_organizaoprefeituras`
--

INSERT INTO `organizacaoUFCA` (`id_organizacao`, `get_id_unidade_academica`, `get_id_curso`,`get_id_register`, `data_register_organizacao`) VALUES
(1, 1, 1, 1, '2022-09-12 19:49:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade_academica`
--

CREATE TABLE IF NOT EXISTS `unidade_academica` (
  `id_unid_aca` int NOT NULL AUTO_INCREMENT,
  `nome_unidade_academica` tinytext NOT NULL,
  `get_id_register` int NOT NULL,
  `data_register_prefeitura` datetime NOT NULL,
  PRIMARY KEY (`id_unid_aca`),
  KEY `get_id_register` (`get_id_register`),
  CONSTRAINT `unidade_academica_ibfk_1` FOREIGN KEY (`get_id_register`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Fazendo dump de dados para tabela `unidade_academica`
--

INSERT INTO `unidade_academica` VALUES (1, 'Centro de Ciências Agrárias e da Biodiversidade (CCAB)', 1, '2023-11-22 22:08:51'),
(2, 'Centro de Ciências e Tecnologia (CCT)', 1, '2023-11-22 22:08:51'),
(3, 'Centro de Ciências Sociais e APlicadas (CCSA)', 1, '2023-11-22 22:08:51'),
(4, 'Instituto de Estudos do Semiárido (IESA)', 1, '2023-11-22 22:08:51'),
(5, 'Instituto de Formação de Educadores (IFE)', 1, '2023-11-22 22:08:51'),
(6, 'Instituto Interdisciplinar de Sociedade, Cultura e Artes (IIsca)', 1, '2023-11-22 22:08:51'),
(7, 'Faculdade de Medicina (Famed)', 1, '2023-11-22 22:08:51');

-- --------------------------------------------------------
--
-- Estrutura para tabela `coordenadores_perfil`
--

CREATE TABLE IF NOT EXISTS `coordenadores_perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` tinytext NOT NULL,
  `get_id_register` int(11) NOT NULL,
  `data_register_servidor` datetime DEFAULT NULL,
   PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=8677 DEFAULT CHARSET=utf8mb4;

INSERT INTO `coordenadores_perfil` (`id_perfil`, `nome_perfil`,`get_id_register`, `data_register_servidor`) VALUES
(1, 'Docente', 1, '2023-11-13 20:16:06'),
(2, 'Técnico Administrativo', 1, '2023-11-13 20:16:06');

--
-- Estrutura para tabela `coordenadores_perfil`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` tinytext NOT NULL,
  `get_id_register` int(11) NOT NULL,
  `data_register_servidor` datetime DEFAULT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=8677 DEFAULT CHARSET=utf8mb4;
SELECT * FROM `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int NOT NULL,
  `nome_curso` tinytext NOT NULL,
  `get_id_register` int NOT NULL,
  `data_register_servidor` datetime DEFAULT NULL,
  `get_id_unid_aca` int NOT NULL,
  PRIMARY KEY (`id_curso`),
  FOREIGN KEY (`get_id_unid_aca`) REFERENCES `unidade_academica` (`id_unid_aca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `curso` (`id_curso`, `nome_curso`,`get_id_register`, `data_register_servidor`,`get_id_unid_aca`) VALUES
(1, 'Administração', 1, '2023-11-13 20:16:06', 3),
(2, 'Administração Pública e Gestão Social', 1, '2023-11-13 20:16:06', 3),
(3, 'Biblioteconomia', 1, '2023-11-13 20:16:06', 3),
(4, 'Ciências Contábeis', 1, '2023-11-13 20:16:06', 3),
(5, 'Ciência da Computação', 1, '2023-11-13 20:16:06',2),
(6, 'Engenharia Civil', 1, '2023-11-13 20:16:06', 2),
(7, 'Engenharia de Materiais', 1, '2023-11-13 20:16:06', 2),
(8, 'Matemática Computacional', 1, '2023-11-13 20:16:06',2),
(9, 'Design', 1, '2023-11-13 20:16:06', 6),
(10, 'Filosofia (Bacharelado)', 1, '2023-11-13 20:16:06', 6),
(11, 'Filosofia (Licenciatura)', 1, '2023-11-13 20:16:06', 6),
(12, 'Jornalismo', 1, '2023-11-13 20:16:06', 6),
(13, 'Letras Libras', 1, '2023-11-13 20:16:06', 6),
(14, 'Música', 1, '2023-11-13 20:16:06', 6),
(15, 'Agronomia', 1, '2023-11-13 20:16:06', 1),
(16, 'Medicina Veterinária', 1, '2023-11-13 20:16:06',1),
(17, 'Licenciatura Interdisciplinar em Ciências Naturais e Matemática', 1, '2023-11-13 20:16:06', 5),
(18, 'Pedagogia', 1, '2023-11-13 20:16:06', 5),
(19, 'Física', 1, '2023-11-13 20:16:06', 5),
(20, 'Química', 1, '2023-11-13 20:16:06', 5),
(21, 'Biologia', 1, '2023-11-13 20:16:06', 5),
(22, 'Matemática', 1, '2023-11-13 20:16:06', 5),
(23, 'Medicina', 1, '2023-11-13 20:16:06',7);


--
-- Estrutura para tabela `coordenadores`
--

CREATE TABLE IF NOT EXISTS `coordenadores` (
  `id_servidor` int(11) NOT NULL,
  `nome_servidor` tinytext NOT NULL,
  `matricula_servidor` tinytext NOT NULL,
  `id_perfil` int NOT NULL,
  `status_servidor` int(11) NOT NULL,
  `id_curso` int,
  `get_id_register` int(11) NOT NULL,
  `data_register_servidor` datetime DEFAULT NULL,
  KEY `id_perfil` (`id_perfil`),
  CONSTRAINT `perfil_coordenador_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `coordenadores_perfil` (`id_perfil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8677 DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `egp_servidores`
--
SELECT * FROM coordenadores;
INSERT INTO `coordenadores` (`id_servidor`, `nome_servidor`, `matricula_servidor`, `id_perfil`, `status_servidor`, `id_curso`, `get_id_register`, `data_register_servidor`) VALUES
(1, 'DORGIVAL PEREIRA DA SILVA NETTO', '1946364', 1, 1,5, 1, '2023-01-04 20:16:06');
INSERT INTO `coordenadores` (`id_servidor`, `nome_servidor`, `matricula_servidor`, `id_perfil`, `status_servidor`, `id_curso`, `get_id_register`, `data_register_servidor`) VALUES
(2, 'PAOLA RODRIGUES DE GODOY ACCIOLY', '1030405', 1, 1,5, 1, '2023-01-04 20:16:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidade_acao`
--

CREATE TABLE IF NOT EXISTS `modalidade_acao` (
  `id_modalidade` int NOT NULL,
  `nome_modalidade` tinytext NOT NULL,
  `get_id_register` int NOT NULL,
  `data_register_local` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `locais`
--

INSERT INTO `modalidade_acao` (`id_modalidade`, `nome_modalidade`, `get_id_register`, `data_register_local`) VALUES
(1, 'Ampla Concorrência', 1, '2022-11-13 10:06:42'),
(2, 'Fluxo Contínuo', 1, '2022-11-13 10:06:42'),
(3, 'PROPE', 1, '2022-11-13 10:06:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modalidade_acao`
--

CREATE TABLE IF NOT EXISTS `tipo_acao` (
  `id_tipo` int NOT NULL,
  `nome_tipo` tinytext NOT NULL,
  `get_id_register` int NOT NULL,
  `data_register_local` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `locais`
--

INSERT INTO `tipo_acao` (`id_tipo`, `nome_tipo`, `get_id_register`, `data_register_local`) VALUES
(1, 'Programa', 1, '2022-11-13 13:11:42'),
(2, 'Projeto', 1, '2022-11-13 13:11:42');


-- --------------------------------------------------------

--
-- Estrutura para tabela `paineis_pwbi`
--

CREATE TABLE IF NOT EXISTS `paineis_pwbi` (
  `id_paineis_pwbi` int(11) NOT NULL,
  `nome_painel` tinytext NOT NULL,
  `link_painel` tinytext NOT NULL,
  `coluna_permissao` tinytext NOT NULL,
  `get_id_register` int(11) NOT NULL,
  `dateRegister` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `paineis_pwbi`
--

-- INSERT INTO `paineis_pwbi` (`id_paineis_pwbi`, `nome_painel`, `link_painel`, `coluna_permissao`, `get_id_register`, `dateRegister`) VALUES
-- (2, 'diagnóstico sesau', 'https://app.powerbi.com/view?r=eyJrIjoiZDFmMGIyZDMtNjEwYy00OGUzLWFkYjgtYmQ1N2ZhNGFiNTYyIiwidCI6IjMyMTEyODk1LTEwNzItNDFiZS04MjVjLWExNzlhNmYyMzFiNiJ9&pageName=ReportSection', 'dash_diagnostico_sesau', 10, '2023-02-16 13:35:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissoes`
--

CREATE TABLE IF NOT EXISTS `permissoes` (
  `idPermissao` int(11) NOT NULL,
  `usuarios` int(11) DEFAULT 0,
  `getIdUsu` int(11) NOT NULL DEFAULT 0,
  `configuracoes_prefeituras` int(11) NOT NULL DEFAULT 0,
  `configuracoes_secretarias` int(11) NOT NULL DEFAULT 0,
  `configuracoes_diretorias` int(11) NOT NULL DEFAULT 0,
  `configuracoes_estrutura` int(11) NOT NULL DEFAULT 0,
  `configuracoes_servidores` int(11) NOT NULL DEFAULT 0,
  `configuracoes_cargos` int(11) NOT NULL DEFAULT 0,
  `configuracoes_lotacoes` int(11) NOT NULL DEFAULT 0,
  `configuracoes_vinculos` int(11) NOT NULL DEFAULT 0,
  `questionarios_colaboradores` int(11) NOT NULL DEFAULT 0,
  `processos_inserir` int(11) NOT NULL DEFAULT 0,
  `processos_stages` int(11) NOT NULL DEFAULT 0,
  `processos_editar` int(11) NOT NULL DEFAULT 0,
  `formularios_almoxarifado` int(11) NOT NULL DEFAULT 0,
  `formularios_compras` int(11) NOT NULL DEFAULT 0,
  `formularios_ordens_judiciais` int(11) NOT NULL DEFAULT 0,
  `formularios_vigencia_contratos` int(11) NOT NULL DEFAULT 0,
  `formularios_registros_beneficios` int(11) NOT NULL DEFAULT 0,
  `formularios_enel` int(11) NOT NULL DEFAULT 0,
  `formularios_folha_pagamento` int(11) NOT NULL DEFAULT 0,
  `processos_powerbi` int(11) NOT NULL DEFAULT 0,
  `dash_diagnostico_sesau` int(11) NOT NULL DEFAULT 0,
  `dash_enel` int(11) NOT NULL DEFAULT 0,
  `dash_folha_de_pagamento` int(11) NOT NULL DEFAULT 0,
  `dash_atencao_primaria` int(11) NOT NULL DEFAULT 0,
  `dash_beneficios` int(11) NOT NULL DEFAULT 0,
  `dash_vigencia_de_contratos` int(11) NOT NULL DEFAULT 0,
  `dash_combustiveis` int(11) NOT NULL DEFAULT 0,
  `dash_ordens_judiciais` int(11) NOT NULL DEFAULT 0,
  `dash_central_de_marcacoes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `permissoes`
--

INSERT INTO `permissoes` (`idPermissao`, `usuarios`, `getIdUsu`, `configuracoes_prefeituras`, `configuracoes_secretarias`, `configuracoes_diretorias`, `configuracoes_estrutura`, `configuracoes_servidores`, `configuracoes_cargos`, `configuracoes_lotacoes`, `configuracoes_vinculos`, `questionarios_colaboradores`, `processos_inserir`, `processos_stages`, `processos_editar`, `formularios_almoxarifado`, `formularios_compras`, `formularios_ordens_judiciais`, `formularios_vigencia_contratos`, `formularios_registros_beneficios`, `formularios_enel`, `formularios_folha_pagamento`, `processos_powerbi`, `dash_diagnostico_sesau`, `dash_enel`, `dash_folha_de_pagamento`, `dash_atencao_primaria`, `dash_beneficios`, `dash_vigencia_de_contratos`, `dash_combustiveis`, `dash_ordens_judiciais`, `dash_central_de_marcacoes`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(3, 1, 4, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(4, 1, 5, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 6, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 0, 7, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(7, 1, 8, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 0, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0, 0, 0, 0),
(9, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(10, 0, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 0, 0),
(11, 0, 12, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 14, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 15, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 1, 19, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 0, 20, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 1, 21, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 0, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0),
(22, 0, 23, 1, 1, 1, 1, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 0, 24, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 0, 26, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosgerenciais`
--

CREATE TABLE IF NOT EXISTS `processosgerenciais` (
  `id_processosGerenciais` int(11) NOT NULL,
  `nome_processo` tinytext NOT NULL,
  `get_id_organizaoPrefeituras` int(11) NOT NULL,
  `imagemProcesso` tinytext NOT NULL,
  `get_id_status_processo` int(11) NOT NULL,
  `get_id_register` int(11) NOT NULL,
  `data_register_processo` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `processosgerenciais`
--

-- INSERT INTO `processosgerenciais` (`id_processosGerenciais`, `nome_processo`, `get_id_organizaoPrefeituras`, `imagemProcesso`, `get_id_status_processo`, `get_id_register`, `data_register_processo`) VALUES
-- (1, 'OrganizaÃ§Ã£o da folha de pagamento SESAU', 1, 'de2c19c90f3065362740e1632d9f2775.pdf', 4, 4, '2022-09-30 14:52:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosgerenciais_historico`
--

CREATE TABLE IF NOT EXISTS `processosgerenciais_historico` (
  `id_processosgerenciais_historico` int(11) NOT NULL,
  `get_id_processosGerenciais` int(11) NOT NULL,
  `imagemProcessoHistorico` tinytext NOT NULL,
  `get_id_status_processo_historico` int(11) NOT NULL,
  `data_register_proc_historico` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `processosgerenciais_historico`
--

-- INSERT INTO `processosgerenciais_historico` (`id_processosgerenciais_historico`, `get_id_processosGerenciais`, `imagemProcessoHistorico`, `get_id_status_processo_historico`, `data_register_proc_historico`) VALUES
-- (1, 1, '125a1c7ce3ca28967231170771e71b0f.pdf', 2, '2022-09-30 14:52:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `processosgerenciais_status`
--

CREATE TABLE IF NOT EXISTS `processosgerenciais_status` (
  `id_processos_status` int(11) NOT NULL,
  `processos_status` tinytext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `processosgerenciais_status`
--

INSERT INTO `processosgerenciais_status` (`id_processos_status`, `processos_status`) VALUES
(1, 'Mapeando'),
(2, 'Mapeados'),
(3, 'Melhorados'),
(4, 'Em implantação'),
(5, 'Implantados');

-- --------------------------------------------------------

--
-- Estrutura para tabela `recupera_senha`
--

CREATE TABLE IF NOT EXISTS `recupera_senha` (
  `id_recupera_senha` int(11) NOT NULL,
  `get_id_usuario` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `data_pedido` datetime NOT NULL,
  `data_troca` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Fazendo dump de dados para tabela `recupera_senha`
--

INSERT INTO `recupera_senha` (`id_recupera_senha`, `get_id_usuario`, `hash`, `data_pedido`, `data_troca`) VALUES
(1, 7, 'c1af1e060b300f4c1f4179e20309d7fbf5a84c2e', '2023-02-15 09:28:29', NULL);

-- --------------------------------------------------------


--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `egp_lotacoes`
--
ALTER TABLE `egp_lotacoes`
  ADD PRIMARY KEY (`id_lotacao`), ADD KEY `get_id_register` (`get_id_register`);

--
-- Índices de tabela `paineis_pwbi`
--
ALTER TABLE `paineis_pwbi`
  ADD PRIMARY KEY (`id_paineis_pwbi`);

--
-- Índices de tabela `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`idPermissao`);

--
-- Índices de tabela `processosgerenciais`
--
ALTER TABLE `processosgerenciais`
  ADD PRIMARY KEY (`id_processosGerenciais`), ADD KEY `get_id_organizaoPrefeituras` (`get_id_organizaoPrefeituras`,`get_id_register`), ADD KEY `get_id_register` (`get_id_register`), ADD KEY `get_id_status_processo` (`get_id_status_processo`);

--
-- Índices de tabela `processosgerenciais_historico`
--
ALTER TABLE `processosgerenciais_historico`
  ADD PRIMARY KEY (`id_processosgerenciais_historico`), ADD KEY `get_id_processosGerenciais` (`get_id_processosGerenciais`), ADD KEY `get_id_status_processo` (`get_id_status_processo_historico`);

--
-- Índices de tabela `processosgerenciais_status`
--
ALTER TABLE `processosgerenciais_status`
  ADD PRIMARY KEY (`id_processos_status`);

--
-- Índices de tabela `recupera_senha`
--
ALTER TABLE `recupera_senha`
  ADD PRIMARY KEY (`id_recupera_senha`), ADD KEY `recupera_senha_ibfk_01` (`get_id_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`), ADD KEY `get_id_prefeitura` (`get_id_prefeitura`), ADD KEY `idUserRegister` (`idUserRegister`);

--
-- AUTO_INCREMENT de tabelas apagadas
--


--
ALTER TABLE `egp_lotacoes`
  MODIFY `id_lotacao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `paineis_pwbi`
--
ALTER TABLE `paineis_pwbi`
  MODIFY `id_paineis_pwbi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `processosgerenciais`
--
ALTER TABLE `processosgerenciais`
  MODIFY `id_processosGerenciais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de tabela `processosgerenciais_historico`
--
ALTER TABLE `processosgerenciais_historico`
  MODIFY `id_processosgerenciais_historico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT de tabela `processosgerenciais_status`
--
ALTER TABLE `processosgerenciais_status`
  MODIFY `id_processos_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `recupera_senha`
--
ALTER TABLE `recupera_senha`
  MODIFY `id_recupera_senha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--

--
-- Restrições para dumps de tabelas
--


--
-- Restrições para tabelas `recupera_senha`
--
ALTER TABLE `recupera_senha`
ADD CONSTRAINT `recupera_senha_ibfk_01` FOREIGN KEY (`get_id_usuario`) REFERENCES `usuario` (`id_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
