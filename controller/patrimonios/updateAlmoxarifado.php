<?
// INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

$encodedId = trim($_POST['qsre']);
$id = base64_decode($encodedId);
$num_termo = trim($_POST['num_termo']);
$num_oficio = trim($_POST['num_oficio']);
$sql_termo = "(num_termo = '$num_termo')";
$sql_oficio = "(num_oficio = '$num_oficio')";
if ($num_termo == ""){
	$num_termo = "NULL";
	$sql_termo = "0";
} else {
	$num_termo = "'$num_termo'";
}
if ($num_oficio == ""){
	$num_oficio = "NULL";
	$sql_oficio = "0";
} else {
	$num_oficio = "'$num_oficio'";
}

//VERIFICA SE JÁ TEM UM REGISTRO COM ESSE NOME
$query = mysqli_query($_SG['link'],"SELECT num_termo, num_oficio FROM almoxarifado
	WHERE ($sql_termo OR $sql_oficio) AND id_almoxarifado != '$id'") or die(mysqli_error( $_SG['link'] ));

if (mysqli_num_rows($query) > 0):
	//REDIRECIONAMENTO CASO HAJA REGISTO COM OS DADOS DO POST QUE FORAM TESTADOS
	echo "<script>alert(\"OPS! Já Existe um REGISTRO com esses Dados!\")</script>";
	echo "<script>window.history.go(-1);</script>";
else:
    $update = mysqli_query($_SG['link'],"UPDATE almoxarifado SET
    num_termo = $num_termo,
    num_oficio = $num_oficio
    WHERE id_almoxarifado = '$id'") or die(mysqli_error( $_SG['link'] ));

    echo "<script>window.location = \"../../indexLogado.php?page=formularios_almoxarifado_detalhe&as=$encodedId\"</script>";
endif;