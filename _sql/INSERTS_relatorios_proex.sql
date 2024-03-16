-- COLOCAR INSERTS AQUI

--
-- Inserindo usuario
--

SELECT * from `usuarios`;
INSERT INTO `usuarios` (`usuarioID`, `nomeUsuario`, `siapeUsuario`, `cpfUsuario`, `loginUsuario`, `senhaUsuario`, `tipoUsuario`, `statusUsuario`, `unidadeAcademicaUsuario`, `registroUsuario_ID`, `dataRegistroUsuario`) VALUES
(1, "Dorgival Netto", "40028922", '1', "dorgival.netto@ufca.edu.br", 'MTIzNDU2', '1', 1, 2, 1, '2023-01-05 09:24:59');

--
-- Inserindo permissoes
--

SELECT * from `permissoes`;
INSERT INTO `permissoes` (`idPermissao`, `usuarios`, `getIdUsu`, `relatorios`, `configuracoes_secretarias`, `configuracoes_diretorias`, `configuracoes_estrutura`, `configuracoes_servidores`, `configuracoes_cargos`, `configuracoes_lotacoes`, `configuracoes_vinculos`, `questionarios_colaboradores`, `processos_inserir`, `processos_stages`, `processos_editar`, `formularios_almoxarifado`, `formularios_compras`, `formularios_ordens_judiciais`, `formularios_vigencia_contratos`, `formularios_registros_beneficios`, `formularios_enel`, `formularios_folha_pagamento`, `processos_powerbi`, `dash_diagnostico_sesau`, `dash_enel`, `dash_folha_de_pagamento`, `dash_atencao_primaria`, `dash_beneficios`, `dash_vigencia_de_contratos`, `dash_combustiveis`, `dash_ordens_judiciais`, `dash_central_de_marcacoes`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

--
-- Fazendo dump de dados para tabela `unidadeAcademica`
--

SELECT * from `unidadeAcademica`;
INSERT INTO `unidadeAcademica` VALUES (1, 'Centro de Ciências Agrárias e da Biodiversidade (CCAB)'),
(2, 'Centro de Ciências e Tecnologia (CCT)'),
(3, 'Centro de Ciências Sociais e Aplicadas (CCSA)'),
(4, 'Instituto de Estudos do Semiárido (IESA)'),
(5, 'Instituto de Formação de Educadores (IFE)'),
(6, 'Instituto Interdisciplinar de Sociedade, Cultura e Artes (IIsca)'),
(7, 'Faculdade de Medicina (Famed)');