<?php
function rota($page) {
	switch ($page) {
		// General Pages
		case 'dashboard':
			require 'common/container.php';
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


		default:
			require 'common/container.php';
	}
}