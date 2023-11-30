<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

//RECEBE OS ACTIONS PELO GET
$id_vinculo = $_POST['id_vinculo'];
$codigo_vinculo = trim($_POST['codigo_vinculo']);
$nome_vinculo = trim($_POST['nome_vinculo']);

//REALIZAR O UPDATE
$query = mysqli_query($_SG['link'], "UPDATE egp_vinculos SET 
                nome_vinculo = '$nome_vinculo'
            WHERE (id_vinculo = $id_vinculo)
        ") or die(mysqli_error($_SG['link']));

//SUCESSO NO UP
echo "<script>alert(\"Atualização feita com sucesso!\")</script>";
echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_vinculos_editar&q=" . base64_encode($id_vinculo) . "\"</script>";
		