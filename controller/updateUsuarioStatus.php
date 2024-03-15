<?
//INCLUI O ARQUIVO DE SEGURANÇA
include("../seguranca.php");

	//RECEBE OS ACTIONS PELO GET
	$id_usu = $_POST['id_usu'];
	$status = $_POST['status'];

	//REALIZAR O UPDATE
	$query = mysqli_query($_SG['link'],"UPDATE usuarios
			SET
				status = '$status'
			WHERE ( usuarioID = $id_usu )
			")
			or die(mysqli_error($_SG['link']));

 	  	//SUCESSO NO UP
		echo "<script>window.location = \"../indexLogado.php?page=usuarios\"</script>";