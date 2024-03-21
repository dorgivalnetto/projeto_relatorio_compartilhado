<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	// RECEBE O QUE VEM DO POST
	$nomeAcao = trim($_POST['nomeAcao']);
    $tipoAcao = trim($_POST['tipoAcao']);
    $modalidadeAcao = trim($_POST['modalidadeAcao']);
    $unidadeAcademicaAcao = trim($_POST['unidadeAcademicaAcao']);
    $areaTematicaAcao = trim($_POST['areaTematicaAcao']);
    $nomeCoordenador = trim($_POST['nomeCoordenador']);
    $tipoMembro = trim($_POST['tipoMembro']);
    $siapeCoordenador = trim($_POST['siapeCoordenador']);
    $atvRealizadas = trim($_POST['atvRealizadas']);
    $locaisAtividades = trim($_POST['locaisAtividades']);
    $publicoInterno = trim($_POST['publicoInterno']);
    $publicoExterno = trim($_POST['publicoExterno']);
    $impactosAcao = trim($_POST['impactosAcao']);
    $acoesVinculadas = trim($_POST['acoesVinculadas']);
    $escPublica = trim($_POST['escPublica']);
    $parceriaInternacional = trim($_POST['parceriaInternacional']);
    $tecnologiaSocial = trim($_POST['tecnologiaSocial']);
    $redesSociais = trim($_POST['redesSociais']);
    $avaliacaoMonitoramento = trim($_POST['avaliacaoMonitoramento']);
    $fotoLinkDrive = trim($_POST['fotoLinkDrive']);
    $descricaoFotos = trim($_POST['descricaoFotos']);
    
    
    if($escPublica == "2")
        $escPublica = 0;
    elseif($escPublica == "1")
        $escPublica = 1;

	// PEGA A DATA/HORA DO REGISTRO
	$dateRegister = date('Y-m-d H:i:s');

	// PEGA O ID DO USER LOGADO
	$idUserRegister = $_SESSION['usuarioID'];

    //VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
	$query = mysqli_query($_SG['link'],"SELECT tituloAcaoForm FROM formularios
        WHERE (tituloAcaoForm = '$nomeAcao') ") or die(mysqli_error( $_SG['link'] ));
    if(mysqli_num_rows($query) > 0):
        //REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
        echo "<script>alert(\"OPS! Já Existe um REGISTRO de formulário com esses Dados!\")</script>";
        echo "<script>window.history.go(-1);</script>";
    else:
    
    $cadastrar = mysqli_query($_SG['link'],"INSERT INTO formularios (
            tituloAcaoForm,
            tipoAcaoForm,
            modalidadeAcaoForm,
            unidadeAcademicaAcaoForm,
            areaTematicaAcaoForm,
            nomeUsuarioForm,
            tipoMembroForm,
            siapeUsuarioForm,
            atividadesRealizadasForm,
            locaisAtividadesForm,
            publicoInternoForm,
            publicoExternoForm,
            avancosForm,
            acoesVinculadasForm,
            publicaForm,
            internacionalForm,
            tecnologiaSocialForm,
            redesSociaisForm,
            avaliacaoForm,
            linkFotosForm,
            descricaoFotosForm
        ) VALUES (
            '$nomeAcao',
            '$tipoAcao',
            '$modalidadeAcao',
            '$unidadeAcademicaAcao',
            '$areaTematicaAcao',
            '$nomeCoordenador',
            '$tipoMembro',
            '$siapeCoordenador',
            '$atvRealizadas',
            '$locaisAtividades',
            '$publicoInterno',
            '$publicoExterno',
            '$impactosAcao',
            '$acoesVinculadas',
            '$escPublica',
            '$parceriaInternacional',
            '$tecnologiaSocial',
            '$redesSociais',
            '$avaliacaoMonitoramento',
            '$fotoLinkDrive',
            '$descricaoFotos'
            )
        ")
        or die(mysqli_error($_SG['link']));

        //SUCESSO NO CADASTRO-LEVA PARA O DASHBOARD
        echo "<script>alert(\"Formulário cadastrado com Sucesso!\")</script>";
        echo "<script>window.location = \"../indexLogado.php\"</script>";

    endif; // #EOF TESTA SE JA EXISTE UM REGISTRO COM ESSE NOME