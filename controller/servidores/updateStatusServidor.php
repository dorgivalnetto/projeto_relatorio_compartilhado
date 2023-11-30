<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

//RECEBE OS ACTIONS PELO GET
$id_servidor = $_POST['id_servidor'];
$status_servidor = $_POST['status_servidor'];
$page = $_POST['page'];

if ($status_servidor == 0) $status_servidor = 1;
else $status_servidor = 0;

//REALIZAR O UPDATE
$query = mysqli_query($_SG['link'], "UPDATE egp_servidores SET status_servidor = '$status_servidor'
            WHERE (id_servidor = '$id_servidor')") or die(mysqli_error($_SG['link']));

//SUCESSO NO UP
echo "<script>window.location = \"../../indexLogado.php" . $page . "\"</script>";