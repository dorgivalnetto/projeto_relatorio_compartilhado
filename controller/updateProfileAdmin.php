<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	//RECEBE O QUE VEM DO POST
	$nome = trim($_POST['nome']);
	$login = trim($_POST['login']);
	$senha = trim($_POST['senha']);
	$get_id_unidade_academica = trim($_POST['get_id_unidade_academica']);
	$matricula = trim($_POST['matricula']);
	$get_id_tipo = trim($_POST['get_id_tipo']);

	$idUsu = trim($_POST['idUsu']);
	$senhaEmDB = trim($_POST['senhaEmDB']);

	$senhaEmD = base64_decode($senhaEmD);

	// data do regitro
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

	//TESTAR SE A SENHA FOI ALTERADA
	if ($senhaEmDB == $senha):
		//REALIZAR O UP SEM NOVA SENHA
		$update = mysqli_query($_SG['link'],"UPDATE usuario SET
			nome = '$nome',
			login = '$login',
			get_id_unid_aca = '$get_id_unidade_academica',
			matricula = '$matricula',
			tipo = '$get_id_tipo'
			WHERE (id_usu = $idUsu)") or die(mysqli_error($_SG['link']));
	else:
		//REALIZAR O UP COM NOVA SENHA
		$senhaCRYPT = base64_encode($senha);
		$update = mysqli_query($_SG['link'],"UPDATE usuario SET
			nome = '$nome',
			senha = '$senhaCRYPT',
			login = '$login',
			get_id_unid_aca = '$get_id_unidade_academica',
			matricula = '$matricula',
			tipo = '$get_id_tipo'
		WHERE (id_usu = $idUsu)") or die(mysqli_error($_SG['link']));
	endif;

	//PERMISSOES	
	$usuarios = trim($_POST['usuarios']);
	$configuracoes_prefeituras = trim($_POST['configuracoes_prefeituras']);
	$configuracoes_secretarias = trim($_POST['configuracoes_secretarias']);
	$configuracoes_diretorias = trim($_POST['configuracoes_diretorias']);
	$configuracoes_estrutura = trim($_POST['configuracoes_estrutura']);
	$configuracoes_servidores = trim($_POST['configuracoes_servidores']);
	$configuracoes_cargos = trim($_POST['configuracoes_cargos']);
	$configuracoes_lotacoes = trim($_POST['configuracoes_lotacoes']);
	$configuracoes_vinculos = trim($_POST['configuracoes_vinculos']);
	$questionarios_colaboradores = trim($_POST['questionarios_colaboradores']);
	$processos_inserir = trim($_POST['processos_inserir']);
	$processos_powerbi = trim($_POST['processos_powerbi']);
	$processos_stages = trim($_POST['processos_stages']);
	$processos_editar = trim($_POST['processos_editar']);
	$formularios_relatorio = trim($_POST['formularios_relatorio']);
	$formularios_compras = trim($_POST['formularios_compras']);
	$formularios_ordens_judiciais = trim($_POST['formularios_ordens_judiciais']);
	$formularios_vigencia_contratos = trim($_POST['formularios_vigencia_contratos']);
	$formularios_registros_beneficios = trim($_POST['formularios_registros_beneficios']);
	$formularios_enel = trim($_POST['formularios_enel']);
	$formularios_folha_pagamento = trim($_POST['formularios_folha_pagamento']);

	// TRATA O VALOR DO CHECKBOX
	if(empty($usuarios)): $usuarios=0; else: $usuarios=1; endif;
	if(empty($configuracoes_prefeituras)): $configuracoes_prefeituras=0; else: $configuracoes_prefeituras=1; endif;
	if(empty($configuracoes_secretarias)): $configuracoes_secretarias=0; else: $configuracoes_secretarias=1; endif;
	if(empty($configuracoes_diretorias)): $configuracoes_diretorias	=0; else: $configuracoes_diretorias=1; endif;
	if(empty($configuracoes_estrutura)): $configuracoes_estrutura=0; else: $configuracoes_estrutura=1; endif;
	if(empty($configuracoes_servidores)): $configuracoes_servidores=0; else: $configuracoes_servidores=1; endif;
	if(empty($configuracoes_cargos)): $configuracoes_cargos=0; else: $configuracoes_cargos=1; endif;
	if(empty($configuracoes_lotacoes)): $configuracoes_lotacoes=0; else: $configuracoes_lotacoes=1; endif;
	if(empty($configuracoes_vinculos)): $configuracoes_vinculos=0; else: $configuracoes_vinculos=1; endif;
	if(empty($questionarios_colaboradores)): $questionarios_colaboradores=0; else: $questionarios_colaboradores=1; endif;
	if(empty($processos_inserir)): $processos_inserir=0; else: $processos_inserir=1; endif;
	if(empty($processos_powerbi)): $processos_powerbi=0; else: $processos_powerbi=1; endif;
	if(empty($processos_stages)): $processos_stages=0; else: $processos_stages=1; endif;
	if(empty($processos_editar)): $processos_editar=0; else: $processos_editar=1; endif;
	if(empty($formularios_relatorio)): $formularios_relatorio=0; else: $formularios_relatorio=1; endif;
	if(empty($formularios_compras)): $formularios_compras=0; else: $formularios_compras=1; endif;
	if(empty($formularios_ordens_judiciais)): $formularios_ordens_judiciais=0; else: $formularios_ordens_judiciais=1; endif;
	if(empty($formularios_vigencia_contratos)): $formularios_vigencia_contratos=0; else: $formularios_vigencia_contratos=1; endif;
	if(empty($formularios_registros_beneficios)): $formularios_registros_beneficios=0; else: $formularios_registros_beneficios=1; endif;
	if(empty($formularios_enel)): $formularios_enel=0; else: $formularios_enel=1; endif;
	if(empty($formularios_folha_pagamento)): $formularios_folha_pagamento=0; else: $formularios_folha_pagamento=1; endif;

	// TRATA AS PERMISSOES DE PERFIL
	$queryDash = ",";
	foreach($_POST as $key => $value){
		if (substr($key, 0, strlen('dash_')) === 'dash_'){
			$valorForm = \strip_tags(trim($value));
			if(empty($valorForm)): $valorForm=0; else: $valorForm=1; endif;
			$queryDash .= \strip_tags(trim($key)) . " = '" . $valorForm . "', ";
		}
	}
	$queryDash = rtrim($queryDash, ', ');

	// UP NAS PERMISSOES
	$update = mysqli_query($_SG['link'],"UPDATE permissoes SET
		usuarios = '$usuarios',
		configuracoes_prefeituras = '$configuracoes_prefeituras',
		configuracoes_secretarias = '$configuracoes_secretarias',
		configuracoes_diretorias = '$configuracoes_diretorias',
		configuracoes_estrutura = '$configuracoes_estrutura',
		configuracoes_servidores = '$configuracoes_servidores',
		configuracoes_cargos = '$configuracoes_cargos',
		configuracoes_lotacoes = '$configuracoes_lotacoes',
		configuracoes_vinculos = '$configuracoes_vinculos',
		questionarios_colaboradores = '$questionarios_colaboradores',
		processos_inserir = '$processos_inserir',
		processos_stages = '$processos_stages',
		processos_editar = '$processos_editar',
		formularios_relatorio = '$formularios_relatorio',
		formularios_compras = '$formularios_compras',
		formularios_ordens_judiciais = '$formularios_ordens_judiciais',
		formularios_vigencia_contratos = '$formularios_vigencia_contratos',
		formularios_registros_beneficios = '$formularios_registros_beneficios',
		formularios_enel = '$formularios_enel',
		formularios_folha_pagamento = '$formularios_folha_pagamento'
		" . $queryDash . "
		WHERE (getIdUsu = $idUsu)") or die(mysqli_error($_SG['link']));

	//SUCESSO NO UPDATE
	echo "<script>alert(\"Atualização feita com Sucesso!\")</script>";
	// echo "<script>window.history.go(-1);</script>";
	echo "<script>window.location = \"../indexLogado.php?page=usuarios\"</script>";