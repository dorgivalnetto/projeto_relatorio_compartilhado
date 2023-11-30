<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	// RECEBE O QUE VEM DO POST
	// $description = htmlentities(trim($_POST['description']), ENT_QUOTES);
	$nome_processo = trim($_POST['nome_processo']);
	$get_id_org_prefeitura = trim($_POST['get_id_org_prefeitura']);
	$imagem = $_FILES['imagem'];
 // echo $imagem;
 // exit;

	// PEGA A DATA/HORA DO REGISTRO
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

	// TESTA SE JA EXISTE UMA PUBLICACAO COM ESSE TITULO
	$query = mysqli_query($_SG['link'],"SELECT * FROM processosgerenciais
		WHERE ((nome_processo = '$nome_processo') AND (get_id_organizaoPrefeituras = '$get_id_org_prefeitura') ) ")
		or die(mysqli_error($_SG['link']));

	if(mysqli_num_rows($query) > 0):
		//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
		echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
		echo "<script>window.history.go(-1);</script>";
	else:
		// TESTAR SE A IMAGEM NAO FOI INSERIDA - se $imagem vazio é pq nao inseriu a foto
		if ($imagem['size'] == 0):
			// INSERE NA TABELA DE PROCESSOS
			$cadastrar = mysqli_query($_SG['link'],"INSERT INTO processosgerenciais (
						nome_processo,
						get_id_organizaoPrefeituras,
						imagemProcesso,
						get_id_status_processo,
						get_id_register,
						data_register_processo
					) VALUES (
						'$nome_processo',
						'$get_id_org_prefeitura',
						'noPhoto.jpg',
						'1',
						'$idUserRegister',
						'$dateRegister'
					)
				")
			or die(mysqli_error($_SG['link']));

			//PEGO O ULTIMO ID INSERIDO
			$id_processosGerenciais = mysqli_insert_id( $_SG['link'] );

			// INSERE NA TABELA DE HISTÓRICO DOS PROCESSOS
			$cadastrar = mysqli_query($_SG['link'],"INSERT INTO processosgerenciais_historico (
						get_id_processosGerenciais,
						imagemProcessoHistorico,
						get_id_status_processo_historico,
						data_register_proc_historico
					) VALUES (
						'$id_processosGerenciais',
						'noPhoto.jpg',
						'1',
						'$dateRegister'
					)
				")
			or die(mysqli_error($_SG['link']));

			//SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
			echo "<script>alert(\"Processo Cadastrado\")</script>";
			echo "<script>window.history.go(-1);</script>";

		elseif ($imagem['size'] != 0):
			//TESTA  SE O ARQUIVO É PDF
			$imagem['name'] = str_replace(" ", "_", $imagem['name']);
			$imagem['name'] = strtolower($imagem['name']);
			$nomefoto = explode(".", $imagem['name']);
			$nomefoto[0] = md5($nomefoto[0].time());
			$imagem['name'] = implode(".", $nomefoto);
			$caminho = "../uploads/processos/".$imagem['name'];

			if(!preg_match("/^application\/(pdf)$/", $imagem['type'])):
				echo "<script>alert(\"ATENÇÃO! O Arquivo precisa ser pdf.\")</script>";
				echo "<script>window.history.go(-1);</script>";
			else:
				//TESTE SE A IMAGEM TEM MENOS DE 5MB
				if($imagem['size'] >= 6000000):
					echo "<script>alert(\"ATENÇÃO! O Arquivo precisa ser menor que 5MB.\")</script>";
					echo "<script>window.history.go(-1);</script>";
				else:
					// MOVE O TEMP DA FOTO
					if(move_uploaded_file($imagem['tmp_name'], $caminho))
					{
						// TRATA O NOME DA FOTO EM HASH
						$nomefoto = $imagem['name'];

						$cadastrar = mysqli_query($_SG['link'],"INSERT INTO processosgerenciais (
									nome_processo,
									get_id_organizaoPrefeituras,
									imagemProcesso,
									get_id_status_processo,
									get_id_register,
									data_register_processo
								) VALUES (
									'$nome_processo',
									'$get_id_org_prefeitura',
									'$nomefoto',
									'2',
									'$idUserRegister',
									'$dateRegister'
								)
							")
					or die(mysqli_error());

					//PEGO O ULTIMO ID INSERIDO
					$id_processosGerenciais = mysqli_insert_id( $_SG['link'] );

					// INSERE NA TABELA DE HISTÓRICO DOS PROCESSOS
					$cadastrar = mysqli_query($_SG['link'],"INSERT INTO processosgerenciais_historico (
								get_id_processosGerenciais,
								imagemProcessoHistorico,
								get_id_status_processo_historico,
								data_register_proc_historico
							) VALUES (
								'$id_processosGerenciais',
								'$nomefoto',
								'2',
								'$dateRegister'
							)
						")
					or die(mysqli_error($_SG['link']));


					}//FECHA O ID DO MOVE
					//SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
					echo "<script>alert(\"Processo Cadastrado!\")</script>";
					echo "<script>window.history.go(-1);</script>";
				endif;//#EOF DO TYPE
			endif;//#EOF DO SIZE
		endif; // #EOF TESTAR SE A IMAGEM NAO FOI ALETRADA - se $imagem vazio é pq nao alterou a foto
	endif; // #EOF TESTA SE JA EXISTE UM PROCESSO COM ESSE TITULO
?>