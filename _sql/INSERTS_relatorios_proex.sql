--
-- Fazendo dump de dados para tabela `unidadeAcademica, tipoMembro, tipoAcao e tipoArea`
--

SELECT * from `unidadeAcademica`;
INSERT INTO `unidadeAcademica` VALUES
(1, 'Centro de Ciências Agrárias e da Biodiversidade (CCAB)'),
(2, 'Centro de Ciências e Tecnologia (CCT)'),
(3, 'Centro de Ciências Sociais e Aplicadas (CCSA)'),
(4, 'Instituto de Estudos do Semiárido (IESA)'),
(5, 'Instituto de Formação de Educadores (IFE)'),
(6, 'Instituto Interdisciplinar de Sociedade, Cultura e Artes (IIsca)'),
(7, 'Faculdade de Medicina (Famed)');

SELECT * from `tipoMembro`;
INSERT INTO `tipoMembro` (`tipoMembroID`, `nomeTipo`) VALUES 
(1, 'Docente'),
(2, 'Técnico Administrativo'),
(3, 'Colaborador Externo');

SELECT * from `tipoAcao`;
INSERT INTO `tipoAcao` (`tipoAcaoID`, `nome_Tipo`) VALUES 
(1, 'Programa'),
(2, 'Projeto'),
(3, 'Evento'),
(4, 'Curso'),
(5, 'Prestação de Serviço');

SELECT * from `tipoArea`;
INSERT INTO `tipoArea` (`tipoAreaID`, `nomeArea`) VALUES 
(1, 'Cultura'),
(2, 'Saúde'),
(3, 'Tecnologia'),
(4, 'Trabalho'),
(5, 'Educação'),
(6, 'Comunicação'),
(7, 'Meio Ambiente'),
(8, 'Direitos Humanos e Justiça');

-- COLOCAR INSERTS AQUI EMBAIXO

--
-- Inserindo usuario
--

SELECT * from `usuarios`;
INSERT INTO `usuarios` (`usuarioID`, `nomeUsuario`, `siapeUsuario`, `cpfUsuario`, `loginUsuario`, `senhaUsuario`, `tipoUsuario`, `statusUsuario`, `unidadeAcademicaUsuario`, `registroUsuario_ID`, `dataRegistroUsuario`) VALUES
(1, "Dorgival Netto", "40028922", '1234534', "dorgival.netto@ufca.edu.br", 'MTIzNDU2', '1', 1, 2, 1, '2023-01-05 09:24:59');

--
-- Inserindo permissoes
--

SELECT * from `permissoes`;
INSERT INTO `permissoes` (`idPermissao`, `usuarios`, `getIdUsu`, `relatorios`, `relatoriofinal`, `configuracoes_diretorias`, `configuracoes_estrutura`, `configuracoes_servidores`, `configuracoes_cargos`, `configuracoes_lotacoes`, `configuracoes_vinculos`, `questionarios_colaboradores`, `processos_inserir`, `processos_stages`, `processos_editar`, `formularios_almoxarifado`, `formularios_compras`, `formularios_ordens_judiciais`, `formularios_vigencia_contratos`, `formularios_registros_beneficios`, `formularios_enel`, `formularios_folha_pagamento`, `processos_powerbi`, `dash_diagnostico_sesau`, `dash_enel`, `dash_folha_de_pagamento`, `dash_atencao_primaria`, `dash_beneficios`, `dash_vigencia_de_contratos`, `dash_combustiveis`, `dash_ordens_judiciais`, `dash_central_de_marcacoes`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

SELECT * from `acoes`;
INSERT INTO `acoes` (`acaoID`, `tituloAcao`, `tipoAcao`, `unidadeAcademicaAcao`, `areaTematicaAcao`) VALUES
(1, 'Formando Cientistas', 1, 8, 5),
(2, 'Cinema SocioAmbiental no Cariri', 3, 6, 1),
(3, 'Depois dos Créditos', 5, 6, 6),
(4, 'Mulheres.h', 2, 2, 3),
(5, 'Phyplant', 4, 3, 7);

SELECT * from `alunos`;
INSERT INTO `alunos` (`alunoID`, `nomeAluno`, `matriculaAluno`, `cpfAluno`) VALUES
(1, 'Pedro', 201938, '01928'),
(2, 'Felipe', 28374, '19283'),
(3, 'Laís', 28378, '28305'),
(4, 'Luana', 18274, '34855')
(5, 'Diana', 84726, '44566'),
(6, 'Renata', 10293, '51029'),
(7, 'Lucas', 91823, '69182'),
(8, 'Nathan', 39485, '71621'),
(9, 'Ricardo', 68574, '82934'),
(10, 'Vitória', 81723, '91834');

SELECT * from `alunoContribuinte`;
INSERT INTO `alunocontribuinte` (`alunoContribuinteID`, `acoes_AC_ID`, `usuario_AC_ID`, `bolsista`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 0),
(3, 2, 4, 0),
(4, 2, 4, 1),
(5, 3, 3, 0),
(6, 3, 3, 0),
(7, 4, 2, 1),
(8, 4, 2, 1),
(9, 5, 5, 0),
(10, 5, 5, 1);

-- FALTA FAZER INSERTS DA MEMBROEQUIPE E MAIS USUARIOS

SELECT * from `membroEquipe`;
INSERT INTO `membroEquipe` (`membroEquipeID`,`acao_ME_ID`,`usuario_ME_ID`,`tipoMembro`) VALUES
(),
(),
(),
(),
();