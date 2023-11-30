<?php include_once "./libs/dataConfig.php";

$term = $_GET['term'];

$qry = mysqli_query($link, "SELECT id_almoxarifado_patrimonio as id, get_id_bem, num_tombo, nome_do_bem
        FROM almoxarifado_patrimonio
        INNER JOIN almoxarifado_bens ON (almoxarifado_bens.id_almoxarifado_bens = almoxarifado_patrimonio.get_id_bem  )
        WHERE `almoxarifado_bens`.`nome_do_bem` like '$term%'
        ORDER BY `almoxarifado_bens`.`nome_do_bem` LIMIT 5");

$res = mysqli_fetch_all($qry, MYSQLI_ASSOC);

echo json_encode([
	"total" => count($res),
	"results" => $res,
]);