<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

// FUNÇÃO DO ALMOXARIFADO
require('../libs/funcsAlmoxarifado.php');

// RECEBE O QUE VEM DO POST
$array_id_almoxarifado_patrimonio_rastreio = explode(' ', trim($_POST['todos_id_almoxarifado_patrimonio_rastreio']));
$array_get_id_almoxarifado_patrimonio = $_POST['get_id_almoxarifado_patrimonio'];
$get_id_almoxarifado_solicitante = \strip_tags(trim($_POST['get_id_almoxarifado_solicitante']));
$array_get_id_local_origem = $_POST['get_id_local_origem'];
$get_id_local_destino = $_POST['get_id_local_destino'];
$id_almoxarifado_patrimonio_rastreio = $_POST['id_almoxarifado_patrimonio_rastreio'];
$caminho_arquivo = trim($_POST['caminho_arquivo']);

// PEGA A DATA DO OFÍCIO
$data_oficio = \strip_tags(trim($_POST['data_oficio']));

// Trata o arquivo
$pdf = $_FILES['oficio'];

// CASO UM ARQUIVO TENHA SIDO PASSADO
if ($pdf['name'] != '') {
    $extensao = strtolower(end(explode('.', $pdf['name'])));
    $target_dir = "../uploads/patrimonio/";
    $target_file =  md5($pdf['name'].time()) . '.' . $extensao;

    // Cria diretorio para os arquivos
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Deletando o arquivo anterior
    unlink('../' . $caminho_arquivo);

    //  Verifica se houve algum erro com o upload, faz a verificação da extensão do arquivo e tamanho do arquivo
    if ($pdf['error'] != 0) {
        echo "<script>alert(\"Não foi possível fazer o upload!\")</script>";
        echo "<script>window.location = \"../indexLogado.php?page=formularios_almoxarifado_patrimonio_remanejamento&asdf=" . base64_encode($id_almoxarifado_patrimonio_rastreio) . "\"</script>";
        exit();
    } else if (array_search($extensao, ['pdf', 'doc', 'docx']) === false) {
        echo "<script>alert(\"Por favor, envie arquivos com as seguintes extensões: pdf, doc ou docx!\")</script>";
        echo "<script>window.location = \"../indexLogado.php?page=formularios_almoxarifado_patrimonio_remanejamento&asdf=" . base64_encode($id_almoxarifado_patrimonio_rastreio) . "\"</script>";
        exit();
    } else if ((1024 * 1024 * 2) < $pdf['size']) {
        echo "<script>alert(\"O arquivo enviado é muito grande, envie arquivos de até 2Mb!\")</script>";
        echo "<script>window.location = \"../indexLogado.php?page=formularios_almoxarifado_patrimonio_remanejamento&asdf=" . base64_encode($id_almoxarifado_patrimonio_rastreio) . "\"</script>";
        exit();
    }

    // Move o arquivo temporario
    if (move_uploaded_file($pdf['tmp_name'], $target_dir . $target_file)) {
        // Faz a insersao no banco de dados
        $pathFile = ltrim($target_dir . $target_file, '../');

        foreach ($array_id_almoxarifado_patrimonio_rastreio as $id) {
            $selectPatrimoniosRemanejadosById = selectPatrimoniosRemanejadosById($id);
            while ($lsSelectPatrimoniosRemanejadosById = mysqli_fetch_object($selectPatrimoniosRemanejadosById)) {
                // PEGA SOMENTE OS ID QUE FOREM EDITADOS
                $ids[] = $lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio;

                // SE O PATRIMONIO FOI RETIRADO DO OFÍCIO
                if (!in_array($lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio, $array_get_id_almoxarifado_patrimonio)) {
                    $delete = mysqli_query($_SG['link'], "DELETE FROM almoxarifado_patrimonio_rastreio 
                                WHERE id_almoxarifado_patrimonio_rastreio = '$lsSelectPatrimoniosRemanejadosById->id_almoxarifado_patrimonio_rastreio' AND 
                                get_id_almoxarifado_patrimonio = '$lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio'
                            ") or die(mysqli_error($_SG['link']));
                } 
                // ATUALIZAR OS PATRIMONIOS
                else {
                    $aux_id_almoxarifado_patrimonio_rastreio = $id;
                    $aux_get_id_almoxarifado_patrimonio = $lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio;
                    $aux_get_id_local_origem = $array_get_id_local_origem[$aux_get_id_almoxarifado_patrimonio]; 

                    $update = mysqli_query($_SG['link'], "UPDATE almoxarifado_patrimonio_rastreio SET
                                get_id_almoxarifado_patrimonio = '$aux_get_id_almoxarifado_patrimonio',
                                get_id_almoxarifado_solicitante = '$get_id_almoxarifado_solicitante',
                                get_id_local_origem = '$aux_get_id_local_origem',
                                get_id_local_destino = '$get_id_local_destino',
                                caminho_arquivo = '$pathFile',
                                data_oficio = '$data_oficio'
                                WHERE id_almoxarifado_patrimonio_rastreio = '$aux_id_almoxarifado_patrimonio_rastreio'
                            ") or die(mysqli_error($_SG['link']));
                }
            }  
        }

        // PEGAR SOMENTE OS IDS DAQUELES QUE AINDA NÃO FORAM INSERIDOS
        $aux_get_id_almoxarifado_patrimonio = array_diff($array_get_id_almoxarifado_patrimonio, $ids);

        if (!empty($aux_get_id_almoxarifado_patrimonio)) {
            foreach ($aux_get_id_almoxarifado_patrimonio as $get_id_almoxarifado_patrimonio) {
                $aux_get_id_local_origem = $array_get_id_local_origem[$get_id_almoxarifado_patrimonio];

                $cadastrar = mysqli_query($_SG['link'], "INSERT INTO almoxarifado_patrimonio_rastreio (
                        get_id_almoxarifado_patrimonio,
                        get_id_almoxarifado_solicitante,
                        get_id_local_origem,
                        get_id_local_destino,
                        caminho_arquivo,
                        data_oficio
                    ) VALUES (
                        '$get_id_almoxarifado_patrimonio',
                        '$get_id_almoxarifado_solicitante',
                        '$aux_get_id_local_origem',
                        '$get_id_local_destino',
                        '$pathFile',
                        '$data_oficio'
                    )
                ") or die(mysqli_error($_SG['link']));
            }
        }

        echo "<script>window.location = \"../indexLogado.php?page=formularios_almoxarifado_patrimonio_remanejamento&asdf=" . base64_encode($id_almoxarifado_patrimonio_rastreio) . "\"</script>";
        exit();
    } else {
        echo "<script>alert(\"Não foi possível enviar o arquivo, tente novamente!\")</script>";
        echo "<script>window.location = \"../indexLogado.php?page=formularios_almoxarifado_patrimonio_remanejamento&asdf=" . base64_encode($id_almoxarifado_patrimonio_rastreio) . "\"</script>";
        exit();
    }
} else {
    foreach ($array_id_almoxarifado_patrimonio_rastreio as $id) {
        $selectPatrimoniosRemanejadosById = selectPatrimoniosRemanejadosById($id);
        while ($lsSelectPatrimoniosRemanejadosById = mysqli_fetch_object($selectPatrimoniosRemanejadosById)) {
            // PEGA SOMENTE OS ID QUE FOREM EDITADOS
            $ids[] = $lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio;

            // SE O PATRIMONIO FOI RETIRADO DO OFÍCIO
            if (!in_array($lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio, $array_get_id_almoxarifado_patrimonio)) {
                $delete = mysqli_query($_SG['link'], "DELETE FROM almoxarifado_patrimonio_rastreio 
                            WHERE id_almoxarifado_patrimonio_rastreio = '$lsSelectPatrimoniosRemanejadosById->id_almoxarifado_patrimonio_rastreio' AND 
                            get_id_almoxarifado_patrimonio = '$lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio'
                        ") or die(mysqli_error($_SG['link']));
            }
            // ATUALIZAR OS PATRIMONIOS
            else {
                $aux_id_almoxarifado_patrimonio_rastreio = $id;
                $aux_get_id_almoxarifado_patrimonio = $lsSelectPatrimoniosRemanejadosById->get_id_almoxarifado_patrimonio;
                $aux_get_id_local_origem = $array_get_id_local_origem[$aux_get_id_almoxarifado_patrimonio]; 

                $update = mysqli_query($_SG['link'], "UPDATE almoxarifado_patrimonio_rastreio SET
                            get_id_almoxarifado_patrimonio = '$aux_get_id_almoxarifado_patrimonio',
                            get_id_almoxarifado_solicitante = '$get_id_almoxarifado_solicitante',
                            get_id_local_origem = '$aux_get_id_local_origem',
                            get_id_local_destino = '$get_id_local_destino',
                            data_oficio = '$data_oficio'
                            WHERE id_almoxarifado_patrimonio_rastreio = '$aux_id_almoxarifado_patrimonio_rastreio'
                        ") or die(mysqli_error($_SG['link']));
            }
        }    
    }

    // PEGAR SOMENTE OS IDS DAQUELES QUE AINDA NÃO FORAM INSERIDOS
    $aux_get_id_almoxarifado_patrimonio = array_diff($array_get_id_almoxarifado_patrimonio, $ids);

    if (!empty($aux_get_id_almoxarifado_patrimonio)) {
        foreach ($aux_get_id_almoxarifado_patrimonio as $get_id_almoxarifado_patrimonio) {
            $aux_get_id_local_origem = $array_get_id_local_origem[$get_id_almoxarifado_patrimonio];
    
            $cadastrar = mysqli_query($_SG['link'], "INSERT INTO almoxarifado_patrimonio_rastreio (
                    get_id_almoxarifado_patrimonio,
                    get_id_almoxarifado_solicitante,
                    get_id_local_origem,
                    get_id_local_destino,
                    caminho_arquivo,
                    data_oficio
                ) VALUES (
                    '$get_id_almoxarifado_patrimonio',
                    '$get_id_almoxarifado_solicitante',
                    '$aux_get_id_local_origem',
                    '$get_id_local_destino',
                    '$caminho_arquivo',
                    '$data_oficio'
                )
            ") or die(mysqli_error($_SG['link']));
        }
    }

    echo "<script>window.location = \"../indexLogado.php?page=formularios_almoxarifado_patrimonio_remanejamento&asdf=" . base64_encode($id_almoxarifado_patrimonio_rastreio) . "\"</script>";
    exit();
}