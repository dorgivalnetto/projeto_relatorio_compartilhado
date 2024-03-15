<?php
include_once("dataConfig.php");

//FUNÇÃO PARA PEGAR O TIMEZONE PARA A MENSAGEM DE SAUDAÇÃO.(BOM DIA, BOA TARDE OU BOA NOITE)
function saudacao(){
	strtotime($hora = date("H:i"));
	strtotime($horaManha = "00:00");
	strtotime($horaTarde = "12:00");
	strtotime($horaNoite = "18:00");

	if (($hora >= $horaManha) and ($hora < $horaTarde)) {
		$saudacao = "Good Morning";
	}else if(($hora >= $horaTarde) and ($hora < $horaNoite)){
		$saudacao = "Good Evening";
	}else if($hora >= $horaNoite){
		$saudacao = "Good Afternoon";
	}
	return $saudacao;
}

//FUNÇÃO PARA PEGAR LOGIN DO EMAIL DO USUARIO LOGADO
function pegaLogin(){
	$nome =	utf8_encode($_SESSION['usuarioLogin']);
	$login = explode("@", $nome);
	$login = $login[0];
	return $login;
}

//FUNÇÃO PARA PEGAR NOME DO USUARIO LOGADO E QUEBRAR APENAS NO PRIMEIRO NOME
function pegaNome(){
	$nome =	utf8_encode($_SESSION['usuarioNome']);
	$primeiroNome = explode(" ", $nome);
	$primeiroNome = $primeiroNome[0];
	return $primeiroNome;
}

//FUNÇÃO QUE PEGA O GET DA PAGINA O MONTA O ACTIVE LABEL PARA O MEU PAINEL
function labelActive($ahref){
	$getDaPagina = $_GET['pagina'];
	if ($getDaPagina == $ahref ? $label = "active" : $label = "") ;
	echo $label;
}

// TRAZ O NOME DO USER PELO ID DELE
function nomeUserRegistro($id_usu){
    $query = mysqli_query($_SESSION['link'] ,"SELECT usuarioID, nomeUsuario FROM usuarios
        WHERE (usuarioID = $id_usu)
        ") or die(mysql_error());
    $lsNomeUserRegistro = mysqli_fetch_object($query);
    return $lsNomeUserRegistro->nomeUsuario;
}

//FUNÇÃO PARA PEGAR A DATA DE REGISTRO DESSE USER
function dataUser($idUser){
	global $link;
    $query = mysqli_query($link,"SELECT * FROM usuarios
    	WHERE (usuarios.usuarioID = $idUser)
        ") or die(mysql_error());
    return $query;
}
function pegaFoto($id_usu){
    global $link;
    $query = mysqli_query($link,"SELECT *
        FROM usuarios
        -- INNER JOIN persons ON (usuario.id_usu = persons.getIdPersonsUser)
         ") or die(mysql_error());
    return $query;
}

// função para escrever o dia da semana de hoje
function diaDaSemana($dia)
{
   switch($dia){
       case "1": $diasemana = "Segunda-Feira"; break;
       case "2": $diasemana = "Terça-Feira"; break;
       case "3": $diasemana = "Quarta-Feira"; break;
       case "4": $diasemana = "Quinta-Feira"; break;
       case "5": $diasemana = "Sexta-Feira"; break;
       case "6": $diasemana = "Sábado"; break;
       case "7": $diasemana = "Domingo"; break;
   }
   return "$diasemana";
}

// traz a data do domingo desta semana
function dataDomingo($hoje){
	// $hoje = '2022-09-24';
	$diasemana_numero = date('w', strtotime($hoje));
	switch($diasemana_numero){
		// 6 é pq hoje é sábado
		case "6": $domingo = date('d')-6; break;
		case "5": $domingo = date('d')-5; break;
		case "4": $domingo = date('d')-4; break;
		case "3": $domingo = date('d')-3; break;
		case "2": $domingo = date('d')-2; break;
		case "1": $domingo = date('d')-1; break;
		case "0": $domingo = date('d')-0; break;
	}
	return $domingo_desta_semana = date('Y').'-'.date('m').'-'.$domingo;
}

function sabado($domingo){
	// Instância um objeto DateTime passando uma data como parâmetro
	$sabado = new DateTime($dataDomingo);
	// Adicionar 10 dias na data passada no construtor
	$sabado->add(new DateInterval('P5D'));
	// Exibe a nova data
	return $sabado->format('Y-m-d');
}

function nomeMes($mes) {
	switch($mes) {
		case 'January': $mes = 'Janeiro'; break;
		case 'February': $mes = 'Fevereiro'; break;
		case 'March': $mes = 'Março'; break;
		case 'April': $mes = 'Abril'; break;
		case 'May': $mes = 'Maio'; break;
		case 'June': $mes = 'Junho'; break;
		case 'July': $mes = 'Julho'; break;
		case 'August': $mes = 'Agosto'; break;
		case 'September': $mes = 'Setembro'; break;
		case 'October': $mes = 'Outubro'; break;
		case 'November': $mes = 'Novembro'; break;
		case 'December': $mes = 'Dezembro'; break;
	}

	return $mes;
}
