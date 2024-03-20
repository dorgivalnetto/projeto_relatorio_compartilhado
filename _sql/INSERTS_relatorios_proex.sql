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
(7, 'Faculdade de Medicina (Famed)'),
(8, 'Universidade Federal do Cariri (UFCA)');

SELECT * from `tipoMembro`;
INSERT INTO `tipoMembro` (`tipoMembroID`, `nomeTipo`) VALUES 
(1, 'Docente'),
(2, 'Técnico Administrativo');

SELECT * from `tipoAcao`;
INSERT INTO `tipoAcao` (`tipoAcaoID`, `nome_Tipo`) VALUES 
(1, 'Programa'),
(2, 'Projeto'),
(3, 'Evento'),
(4, 'Curso'),
(5, 'Prestação de Serviço');

SELECT * from `tipoArea`;
INSERT INTO `tipoArea` (`tipoAreaID`, `nome_Area`) VALUES 
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
(1, "Dorgival Netto", "19283", '123453', "dorgival.netto@ufca.edu.br", 'MTIzNDU2', '1', 1, 2, 1, '2023-03-18 09:24:59'),
(2, "Pedro Lopes", "20394", '019283', "lopes.pedro@aluno.ufca.edu.br", 'MTIzNDU2', '1', 1, 2, 1, '2023-01-15 18:24:45'),
(3, "Pedro Feitosa", "10192", '293734', "pedro.fernandes@aluno.ufca.edu.br", 'MTIzNDU2', '1', 1, 2, 1, '2023-02-05 12:54:59'),
(4, "Paola Accioly", "92837", '394857', "paola.accioly@ufca.edu.br", 'MTIzNDU2', '1', 1, 2, 1, '2023-03-05 03:33:33'),
(5, "Luciana Gomes", "44444", '938475', "luciana.gomes@teste.edu.br", 'MTIzNDU2', '2', 1, 4, 1, '2023-01-27 15:31:59');

--
-- Inserindo permissoes
--

SELECT * from `permissoes`;
INSERT INTO `permissoes` (`idPermissao`, `usuarios`, `getIdUsu`, `relatorios`, `relatoriofinal`, `acoes`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1),
(3, 1, 3, 1, 1, 1),
(4, 1, 4, 1, 1, 1),
(5, 0, 5, 1, 1, 0);

SELECT * from `acoes`;
INSERT INTO `acoes` (`acaoID`, `tituloAcao`, `tipoAcao`, `unidadeAcademicaAcao`, `areaTematicaAcao`) VALUES
(1, 'Formando Cientistas', 1, 8, 5),
(2, 'Cinema SocioAmbiental no Cariri', 3, 6, 1),
(3, 'Depois dos Créditos', 5, 6, 6),
(4, 'Mulheres.h', 2, 2, 3),
(5, 'Phyplant', 4, 3, 7);

SELECT * from `alunos`;
INSERT INTO `alunos` (`alunoID`, `nomeAluno`, `matriculaAluno`, `cpfAluno`) VALUES
(1, 'Pedro', 201938, "01928"),
(2, 'Felipe', 28374, "19283"),
(3, 'Laís', 28378, "28305"),
(4, 'Luana', 18274, "34855"),
(5, 'Diana', 84726, "44566"),
(6, 'Renata', 10293, "51029"),
(7, 'Lucas', 91823, "69182"),
(8, 'Nathan', 39485, "71621"),
(9, 'Ricardo', 68574, "82934"),
(10, 'Vitória', 81723, "91834");

SELECT * from `alunoContribuinte`;
INSERT INTO `alunoContribuinte` (`alunoContribuinteID`, `acoes_AC_ID`, `usuario_AC_ID`, `bolsista`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 2, 3, 0),
(4, 2, 4, 1),
(5, 3, 5, 0),
(6, 3, 6, 0),
(7, 4, 7, 1),
(8, 4, 8, 1),
(9, 5, 9, 0),
(10, 5, 10, 1);

-- FALTA FAZER INSERTS DA MEMBROEQUIPE E MAIS USUARIOS

SELECT * from `membroEquipe`;
INSERT INTO `membroEquipe` (`membroEquipeID`,`acao_ME_ID`,`usuario_ME_ID`,`tipoMembro`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 2),
(4, 4, 4, 1),
(5, 5, 5, 2);