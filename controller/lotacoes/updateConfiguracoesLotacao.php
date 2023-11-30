<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

//RECEBE OS ACTIONS PELO GET
$id_lotacao = $_POST['id_lotacao'];
$nome_lotacao = trim($_POST['nome_lotacao']);

//REALIZAR O UPDATE
$query = mysqli_query($_SG['link'], "UPDATE egp_lotacoes SET 
                nome_lotacao = '$nome_lotacao'
            WHERE (id_lotacao = $id_lotacao)
        ") or die(mysqli_error($_SG['link']));

//SUCESSO NO UP
echo "<script>alert(\"Atualização feita com sucesso!\")</script>";
echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_lotacoes_editar&q=" . base64_encode($id_lotacao) . "\"</script>";
		