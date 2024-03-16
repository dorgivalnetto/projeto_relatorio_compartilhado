<?php
function rota($page) {
	switch ($page) {
		// General Pages
		case 'dashboard':
			require 'common/container.php';
			// require '../pages/profiles.php';
			break;			
		case 'usuarios':
			require 'pages/usuarios.php';
			break;			
		case 'logout':
			require 'pages/logout.php';
			break;
		case 'relatorios':
			require 'pages/relatorios.php';
			break;


		// PROFILE
		case 'meu_perfil':
			require 'pages/meu_perfil.php';
			break;
		case 'profileEditDoAdmin':
			require 'pages/profileEditDoAdmin.php';
			break;


		//// FORMULÁRIOS
		// PATRIMÔNIOS
		case 'formularios_relatorio':
			require 'pages/formularios_relatorio/formularios_relatorio.php';
			break;
		case 'formularios_relatorio_detalhe':
			require 'pages/formularios_relatorio/formularios_relatorio_detalhe.php';
			break;
		case 'formularios_almoxarifado_bens':
			require 'pages/formularios_almoxarifado/formularios_bens/formularios_bens.php';
			break;
		case 'formularios_almoxarifado_oficios':
			require 'pages/formularios_almoxarifado/formularios_oficios/formularios_oficios.php';
			break;
		case 'formularios_relatorio_solicitantes':
			require 'pages/formularios_relatorio/formularios_solicitantes/formularios_relatorio.php';
			break;			
		case 'formularios_almoxarifado_patrimonios':
			require 'pages/formularios_almoxarifado/formularios_patrimonios/formularios_patrimonios.php';
			break;	
		case 'formularios_almoxarifado_movimentacao':
			require 'pages/formularios_almoxarifado/formularios_almoxarifado_movimentacao.php';
			break;
		case 'formularios_almoxarifado_patrimonio_remanejamento':
			require 'pages/formularios_almoxarifado/formularios_patrimonios_remanejamento/formularios_patrimonios_remanejamento.php';
			break;
		case 'formularios_almoxarifado_notas_fiscais':
			require 'pages/formularios_almoxarifado/formularios_notas_fiscais/formularios_notas_fiscais.php';
			break;
		case 'formularios_almoxarifado_fornecedores':
			require 'pages/formularios_almoxarifado/formularios_fornecedores/formularios_fornecedores.php';
			break;
		case 'formularios_almoxarifado_print':
			require 'pages/formularios_almoxarifado/formularios_almoxarifado_print.php';
			break;
		case 'formularios_almoxarifado_patrimonio_remanejamento':
			require 'pages/formularios_almoxarifado/formularios_patrimonios/formularios_patrimonios_remanejamento.php';
			break;

		// COMPRAS
		case 'formularios_compras':
			require 'pages/formularios_compras/formularios_compras.php';
			break;
		case 'formularios_compras_detalhes':
			require 'pages/formularios_compras/formularios_compras_detalhes.php';
			break;
		case 'formularios_compras_validar':
			require 'pages/formularios_compras/formularios_compras_validar.php';
			break;
		case 'formularios_compras_consolidar':
			require 'pages/formularios_compras/formularios_compras_consolidar.php';
			break;					

		// ENEL
		case 'formularios_enel':
			require 'pages/formularios_enel/formularios_enel.php';
			break;

		// SOA-BNAFAR
		case 'formularios_bnafar':
			require 'pages/formularios_bnafar/formularios_bnafar.php';
			break;

		// FOLHA DE PAGAMENTO
		case 'formularios_folha_pagamento':
			require 'pages/formularios_folha_pagamento/formularios_folha_pagamento.php';
			break;
			
		// ORDENS JUDICIAIS
		case 'formularios_ordens_judiciais':
			require 'pages/formularios_ordens_judiciais/formularios_ordens_judiciais.php';
			break;
		case 'formularios_credores':
			require 'pages/formularios_ordens_judiciais/formularios_credores/formularios_credores.php';
			break;		
		case 'formularios_ordens_judiciais_movimentacao':
			require 'pages/formularios_ordens_judiciais/formularios_ordens_judiciais_movimentacao.php';
			break;


		// VIGENCIA DE CONTRATOS
		case 'formularios_vigencia_contratos':
			require 'pages/formularios_vigencia_contratos/formularios_vigencia_contratos.php';
			break;
		case 'formularios_prestadores':
			require 'pages/formularios_vigencia_contratos/formularios_prestadores/formularios_prestadores.php';
			break;
		case 'formularios_vigencia_contratos_lista_prestadores_editar':
			require 'pages/formularios_vigencia_contratos/formularios_vigencia_contratos_lista_prestadores_editar.php';
			break;			
		case 'formularios_vigencia_contratos_movimentacao':
			require 'pages/formularios_vigencia_contratos/formularios_vigencia_contratos_movimentacao.php';
			break;		
		
			
		// REGISTROS DE BENEFÍCIOS
		case 'formularios_registros_beneficios':
			require 'pages/formularios_registros_beneficios/formularios_registros_beneficios.php';
			break;
		case 'formularios_registros_beneficios_editar':
			require 'pages/formularios_registros_beneficios/formularios_registros_beneficios_editar.php';
			break;
		case 'formularios_registros_beneficios_status':
			require 'pages/formularios_registros_beneficios/formularios_registros_beneficios_status.php';
			break;
		case 'formularios_registros_beneficios_do_mes':
			require 'pages/formularios_registros_beneficios/formularios_registros_beneficios_do_mes.php';
			break;


		//PROCESSOS
		case 'processos_inserir':
			require 'pages/processos_inserir.php';
			break;	
		case 'processos_stages':
			require 'pages/processos_stages.php';
			break;	
		case 'processos_editar':
			require 'pages/processos_editar.php';
			break;	
		case 'processos_inserir_pwbi':
			require 'pages/formularios_processos/processos_inserir_pwbi.php';
			break;	

		//CONFIGURAÇÕES
		case 'configuracoes_prefeituras':
			require 'pages/configuracoes_prefeituras.php';
			break;
		case 'configuracoes_prefeituras_edit':
			require 'pages/configuracoes_prefeituras_edit.php';
			break;			
		case 'configuracoes_secretarias':
			require 'pages/configuracoes_secretarias.php';
			break;
		case 'configuracoes_secretarias_edit':
			require 'pages/configuracoes_secretarias_edit.php';
			break;			
		case 'configuracoes_diretorias':
			require 'pages/configuracoes_diretorias.php';
			break;
		case 'configuracoes_diretorias_edit':
			require 'pages/configuracoes_diretorias_edit.php';
			break;			
		case 'configuracoes_estrutura':
			require 'pages/configuracoes_estrutura.php';
			break;
		case 'configuracoes_servidores':
			require 'pages/configuracoes_servidores/configuracoes_servidores.php';
			break;
		case 'configuracoes_servidores_editar':
			require 'pages/configuracoes_servidores/configuracoes_servidores_editar.php';
			break;
		case 'configuracoes_cargos':
			require 'pages/configuracoes_cargos/configuracoes_cargos.php';
			break;
		case 'configuracoes_cargos_editar':
			require 'pages/configuracoes_cargos/configuracoes_cargos_editar.php';
			break;
		case 'configuracoes_lotacoes':
			require 'pages/configuracoes_lotacoes/configuracoes_lotacoes.php';
			break;
		case 'configuracoes_lotacoes_editar':
			require 'pages/configuracoes_lotacoes/configuracoes_lotacoes_editar.php';
			break;
		case 'configuracoes_vinculos':
			require 'pages/configuracoes_vinculos/configuracoes_vinculos.php';
			break;
		case 'configuracoes_vinculos_editar':
			require 'pages/configuracoes_vinculos/configuracoes_vinculos_editar.php';
			break;


		// QUESTIONÁRIOS
		case 'questionarios_colaboradores':
			require 'pages/questionarios/questionarios_colaboradores.php';
			break;


		default:
			require 'common/container.php';
	}
}