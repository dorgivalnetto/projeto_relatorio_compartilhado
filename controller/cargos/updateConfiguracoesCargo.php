<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../../seguranca.php");

//RECEBE OS ACTIONS PELO GET
$id_cargo = $_POST['id_cargo'];
$codigo_cargo = trim($_POST['codigo_cargo']);
$nome_cargo = trim($_POST['nome_cargo']);

//REALIZAR O UPDATE
$query = mysqli_query($_SG['link'], "UPDATE egp_cargos SET 
                codigo_cargo = '$codigo_cargo',
                nome_cargo = '$nome_cargo'
            WHERE (id_cargo = $id_cargo)
        ") or die(mysqli_error($_SG['link']));

//SUCESSO NO UP
echo "<script>alert(\"Atualização feita com sucesso!\")</script>";
echo "<script>window.location = \"../../indexLogado.php?page=configuracoes_cargos_editar&q=" . base64_encode($id_cargo) . "\"</script>";
		