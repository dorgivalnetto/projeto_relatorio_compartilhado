<?php
// Inclui o arquivo com o sistema de segurança
include("../seguranca.php");
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Salva duas variáveis com o que foi digitado no formulário
	// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
	$login = (isset($_POST['login'])) ? $_POST['login'] : '';
	$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	// $tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
	// Utiliza uma função criada no seguranca.php pra validar os dados digitados
	if (validaUsuario($login, $senha) == true) {
	// O usuário e a senha digitados foram validados, manda pra página interna
		if ($_SESSION['usuarioTipo'] == 0): // zero é admin
    	    // $_SESSION['getIdParque'] = 0;
			header("Location: ../indexLogado.php?page=dashboard");
		else:
       		header("Location: ../indexLogado.php?page=dashboard");
		endif;
	} else {
	// O usuário e/ou a senha são inválidos, manda de volta pro form de login
	// Para alterar o endereço da página de login, verifique o arquivo seguranca.php
	//expulsaVisitante();
	acessoUsuariorErro();
	}
	//EOF if REQUEST_METHOD POST
}