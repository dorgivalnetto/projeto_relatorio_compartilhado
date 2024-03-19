<?php
function rota($page) {
	switch ($page) {
		// PAGES PRINCIPAIS
		case 'dashboard':
			require 'common/container.php';
			break;	

		case 'logout':
			require 'pages/logout.php';
			break;

		case 'usuarios':
			require 'pages/usuarios.php';
			break;

		case 'acoes':
			require 'pages/acoes.php';
			break;

		case 'relatorios':
			require 'pages/relatorios.php';
			break;

		//FORMULARIO ACOES
		case 'relatoriofinal':
			require 'pages/formulario_relatorio.php';
			break;
			
		// PROFILE
		case 'meu_perfil':
			require 'pages/meu_perfil.php';
			break;

		case 'profileEditDoAdmin':
			require 'pages/profileEditDoAdmin.php';
			break;

		// SE NAO TIVER A PAGE COM ESSE NOME, CAI NESSA PAGINA	
		default:
			require 'common/container.php';
	}
}