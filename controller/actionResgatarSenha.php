<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");
$site_url = $_SG['site_url'];
$tituloProjeto = $_SG['tituloProjeto'];

//RECEBE O LOGIN QUE VEM DO POST
$login = $_POST['login'];

//SELECIONA OS DADOS DO USER QUE VEM DO POST
$BuscaReg = mysqli_query($_SG['link'],"SELECT *
					FROM `".$_SG['TabUsuario']."`
					WHERE login = '$login'
					")
	   or die(mysql_error());
	//TRAZ O NUMERO DE LINHAS AFETADAS COM ESSE SELECT
	$num_rows = mysqli_num_rows($BuscaReg);

	//CONDIÇÃO SE NÃO HOUVER NENHUM REGISTRO COM O DADO QUE VEM DO POST
	if($num_rows == '0'){
		//REDIRECIONAMENTO CASO CONDIÇÃO SEJA ATENDIDA
		header("Location: ../forgot-password.php?page=loginERRO");
		exit();
	}else{
		// Data do registro
		$dateRegister = date('Y-m-d H:i:s');
		
		//resgata ps valores que vieram da consulta
		$resultado = mysqli_fetch_array($BuscaReg);
		$id_usu = $resultado['id_usu'];
		$nome = $resultado['nome'];
		$login = $resultado['login'];
		$email = $resultado['login'];
		$senha = $resultado['senha'];

		// Variaveis da url
		$hash = sha1($resultado['id_usu'] . $login . $dateRegister . 'tolx3');
		$id_usuario = "id=" . base64_encode($id_usu);
		$auth = "auth=" . $hash;

		// Insere na tabela recupera senha
		$query = mysqli_query($_SG['link'], "INSERT INTO
		recupera_senha(
			get_id_usuario,
			hash,
			data_pedido
		) VALUES (
			'{$id_usu}',
			'{$hash}',
			'{$dateRegister}')"
		) or die(mysql_error());

		// Link do formulário
		$link_nova_senha = $_SG['site_url'] . "/nova_senha.php?{$id_usuario}&{$auth}";

		// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
		require("phpmailer/class.phpmailer.php");

		// Inicia a classe PHPMailer
		$mail = new PHPMailer();

		// Define os dados do servidor e tipo de conexão
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsSMTP(); // Define que a mensagem será SMTP
		$mail->Host = $_SG['Host']; // Endereço do servidor SMTP
		$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
		$mail->Username = $_SG['Username']; // Usuário do servidor SMTP
		$mail->Password = $_SG['Password']; // Senha do servidor SMTP

		// Define o remetente
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->From = "acoes.proex@ufca.edu.br"; // Seu e-mail
		$mail->FromName = "Coordenadoria de Gestão das Ações"; // Seu nome

		// Define os destinatário(s)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->AddAddress($email);
		//$mail->AddCC('EMAIL@AA.com.br'); // Copia
		//$mail->AddBCC('EMAIL@AA.com.br'); // Cópia Oculta

		// Define os dados técnicos da Mensagem
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
		$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)

		// Define a mensagem (Texto e Assunto)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		$mail->Subject = "[Relatório PROEX] - RESGATE DE SENHA"; // Assunto da mensagem
		$mail->Body = "
		<img src=\" \">
		<br />
		<h1>Olá, {$nome}.</h1>
		<h2>Houve uma solicitacão de resgate de senha para o Login {$login}.</h2>
		<h2><u>Mude sua senha <a href={$link_nova_senha}>clicando aqui</a></u></h2>";
		$mail->AltBody = "
		<img src=\"\">
		\r\n
		<h1>Olá, {$nome}.</h1>
		<h2>Houve uma solicitacão de resgate de senha para o Login {$login}.</h2>
		<h2><u>Mude sua senha <a href={$link_nova_senha}>clicando aqui</a></u></h2>";

		// Define os anexos (opcional)
		// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
		//$mail->AddAttachment("/images/topo_email.jpg", "topo_email.jpg");  // Insere um anexo
		
		// Envia o e-mail
		$enviado = $mail->Send();

		// Limpa os destinatários e os anexos
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();

		// Exibe uma mensagem de resultado
		if ($enviado) {
		//echo "E-mail enviado com sucesso!";
		} else {
			
		}

		$emailCod = base64_encode($login);

		//ENVIADO COM SUCESSO
		header("Location: ../index.php?page=envioEmail&emailCod=$emailCod");
		exit();
	}