<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

// Dados do Post
$decode_id =  base64_decode(\strip_tags($_POST['id']));
$id_usu = is_numeric($decode_id) ? $decode_id : 0 ;
$auth = \strip_tags($_POST['auth']);
$senha = \strip_tags($_POST['senha']);
$senha_confirm = \strip_tags($_POST['senhaConfirm']);

// Busca requisicao
$query = mysqli_query($_SG['link'], "
    SELECT * FROM recupera_senha
    WHERE get_id_usuario = '{$id_usu}' AND hash = '{$auth}'"
) or die(mysql_error());

$requisicao = mysqli_fetch_object($query);

// Data da troca
$data_agora = date('Y-m-d H:i:s');
$limite_troca = date("Y-m-d H:i:s", strtotime("+1 days", strtotime($requisicao->data_pedido)));

// Verificacoes
if (mysqli_num_rows($query) == 0){
    header("Location: ../nova_senha.php?id={$_POST['id']}&auth={$auth}&msg_erro=1");
    exit();
} else if (!is_null($requisicao->data_troca)){
    header("Location: ../nova_senha.php?id={$_POST['id']}&auth={$auth}&msg_erro=2");
    exit();
} else if (strtotime($data_agora) > strtotime($limite_troca)){
    header("Location: ../nova_senha.php?id={$_POST['id']}&auth={$auth}&msg_erro=3");
    exit();
} else if(!($senha === $senha_confirm)) {
    header("Location: ../nova_senha.php?id={$_POST['id']}&auth={$auth}&msg_erro=4");
    exit();
} else {
    $nova_senha = base64_encode($senha);
    try{
        // INICO
        $query = mysqli_query($_SG['link'], "START TRANSACTION;") or die(mysqli_error($_SG['link']));

        // UPDATE SENHA
        $query = mysqli_query($_SG['link'], "
        UPDATE usuario SET senha = '{$nova_senha}'
        WHERE id_usu = {$id_usu};") or die(mysqli_error($_SG['link']));

        // UPDATE TABELA TROCA
        $query = mysqli_query($_SG['link'], "
        UPDATE recupera_senha SET data_troca = '{$data_agora}'
        WHERE id_recupera_senha = {$requisicao->id_recupera_senha};") or die(mysqli_error($_SG['link']));

        // COMMITA OS INSERTS
        $query = mysqli_query($_SG['link'], "COMMIT;") or die(mysqli_error($_SG['link']));

    }  catch (\Throwable $e){
        $query = mysqli_query($_SG['link'], "ROLLBACK;") or die(mysqli_error($_SG['link']));
        header("Location: ../nova_senha.php?id={$_POST['id']}&auth={$auth}&msg_erro=5");
        exit();
    }

    // REDIRECIONAMENTO PARA  O LOGIN
    echo "<script>alert(\"Senha atualizada com Sucesso!\");</script>";
    echo "<script>window.location = \"../index.php\"</script>";
    exit();
}