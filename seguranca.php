<?php
ob_start();
/**
 * Sistema de segurança com acesso restrito
 *
 * Usado para restringir o acesso de certas páginas do seu site
 *
 * STATUS DO USER
 * 0 - INATIVO
 * 1 - ATIVO
 *
 * TIPO DO USER
 * 0 - ADMIN MASTER
 * 1 - USER
 *
 **/

// SCRIPT CONFIGURATION
$_SG['conectaServidor'] = true;    // DO YOU WANT STARTER A MUSQL SERVER?
$_SG['abreSessao'] = true;         // STARTER SESSION WHITH A session_start()?
$_SG['caseSensitive'] = false;     // DO YOU WANT USE case-sensitive? [ 'thiago' IS DIFFERENT TO 'THIAGO' ]
$_SG['validaSempre'] = true;       // DO YOU WANT TO VALIDATE USER AND PASSWORD EVERY PAGE LOAD?

//DESABILITANDO A MENSAGEM DE WARNING DO PHP
error_reporting(0);

//SET TIMEZONE SYSTEM
date_default_timezone_set('America/Fortaleza');

//SET CHARSET SYSTEM
ini_set('default_charset','UTF-8');

//SET O FORMAT NUMBER
setlocale(LC_MONETARY, 'pt_BR');

// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

/// LOCAL CONFIGURATIONS
 $_SG['servidor'] = 'localhost';    // Servidor MySQL
 $_SG['usuario'] = 'root';          // Usuário MySQL
 $_SG['senha'] = '';                // Senha MySQL
 $_SG['banco'] = 'bd_egp';            // Banco de dados MySQL
 $_SG['site_url'] = 'http://localhost:8080'; //url do site



$_SG['tituloProjeto'] = 'PROEX Relatórios'; // nome do projeto

// CONF TO SERV-MAIL
//$_SG['Host'] = '';
//$_SG['Username'] = '';
//$_SG['Password'] = '';

//SET DEFAULT PAGE LOGIN
$_SG['paginaLogin'] = 'index.php';
//SET DEFAULT PAGE TO DESTROYED SESSIONS
$_SG['paginaLoginOFF'] = 'index.php';

/* ALIAS TO DATABASE TABLES */
$_SG['TabUsuario'] = 'usuario';

// ======================================
//   ~ PLEASE! DON'T CHANGE AFTER THIS POINT ~
// ======================================

// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
	//NOVO MYSQL"I"
	$_SG['link'] = mysqli_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha'], $_SG['banco']) or die("MySQL: Não foi possível conectar-se ao servidor");
	mysqli_set_charset($_SG['link'], "utf8");
}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
	session_start();
}

/**
* Função que valida um usuário e senha
*
* @param string $usuario - O usuário a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($login, $senha) {
	global $_SG;
	$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

	$senhaDeCod = base64_encode($senha);

	// Usa a função addslashes para escapar as aspas
	$nusuario = addslashes($login);
	$nsenha = addslashes($senhaDeCod);

	// Monta uma consulta SQL (query) para procurar um usuário
	// status 1(um) é pq está ativo
	$sql = "SELECT `id_usu`, `nome`, `tipo`, `status` FROM `".$_SG['TabUsuario']."`
	WHERE ".$cS." `login` = '".$nusuario."' AND ".$cS." `senha` = '".$nsenha."' AND ".$cS." `status` = '1'
	LIMIT 1";
		$query = mysqli_query($_SG['link'],$sql) or die(mysqli_error());
		$resultado = mysqli_fetch_assoc($query);
	// Verifica se encontrou algum registro
	if (empty($resultado)) {
	// Nenhum registro foi encontrado => o usuário é inválido
		return false;
	} else {
	// O registro foi encontrado => o usuário é valido

	// Definimos dois valores na sessão com os dados do usuário
	$_SESSION['usuarioID'] = $resultado['id_usu']; // Pega o valor da coluna 'id do registro encontrado no MySQL
	$_SESSION['usuarioNome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
	$_SESSION['usuarioTipo'] = $resultado['tipo']; // Pega o valor da coluna 'tipo' do registro encontrado no MySQL
	// $_SESSION['usuarioAcessoParque'] = $resultado['getIdParque']; // Pega o valor da coluna 'getIdParque' do registro encontrado no MySQL
	$_SESSION['link'] = $_SG['link']; // De conexão ao msqlI

	// Verifica a opção se sempre validar o login
		if ($_SG['validaSempre'] == true) {
		// Definimos dois valores na sessão com os dados do login
		$_SESSION['usuarioLogin'] = $login;
		$_SESSION['usuarioSenha'] = $senhaDeCod;
		$_SESSION['usuarioTipo'] = $resultado['tipo'];
		$_SESSION['link'] = $_SG['link'];
	}
	return true;
	}
}
/**
* Função que protege uma página
*/
function protegePagina() {
	global $_SG;
	if(
		!isset($_SESSION['usuarioID']) OR
		!isset($_SESSION['usuarioNome'])
	){
		// Não há usuário logado, manda pra página de login
		expulsaVisitante();
	}else{
		// Há usuário logado, verifica se precisa validar o login novamente
		if ($_SG['validaSempre'] == true) {
			// Verifica se os dados salvos na sessão batem com os dados do banco de dados
			if (!validaUsuario($_SESSION['usuarioLogin'], base64_decode($_SESSION['usuarioSenha']))) {
			// Os dados não batem, manda pra tela de login
			expulsaVisitante();
			}
		}
	}
}

/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
	global $_SG;
	// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
	// Manda pra tela de login
	// header("Location: ".$_SG['paginaLoginOFF']);
	header("Location: index.php?page=loginERRO");
}
/**
* Função para expulsar um visitante
*/
function acessoUsuariorErro() {
	global $_SG;
	// Remove as variáveis da sessão (caso elas existam)
	unset($_SESSION['usuarioID'], $_SESSION['usuarioNomes'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'], $_SESSION['usuarioNome']);
	// Manda pra tela de login
	header("Location: ../index.php?page=loginERRO");
}