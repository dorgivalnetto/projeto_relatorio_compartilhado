<?php

require './seguranca.php';
require_once "./libs/dataConfig.php";

protegePagina();

$tabela = $_GET['table'];
$idPre = \strip_tags(trim($_GET['id1']));
$idSec = \strip_tags(trim($_GET['id2']));

switch($tabela){
    case '1':
        try{
            $query = mysqli_query($link, "SELECT DISTINCT get_id_secretaria FROM egp_organizaoprefeituras WHERE get_id_prefeitura = '{$idPre}'");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        } catch (\mysqli_sql_exception $e) {
            $result = [];
        }
        break;
    case '2':
        try{
            $query = mysqli_query($link, "SELECT DISTINCT get_id_diretoria FROM egp_organizaoprefeituras WHERE get_id_prefeitura = '{$idPre}' AND get_id_secretaria = '{$idSec}'");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        } catch (\mysqli_sql_exception $e) {
            $result = [];
        }
        break;
    case '3':
        try{
            $query = mysqli_query($link, "SELECT
                    c.id_compras_unidades AS id_und,
                    c.compras_unidade AS unidade,
                    SUM(cr.quantidade_aprovada) AS qtd_aprovado_und,
                    COUNT(cr.get_id_compras_unidades) AS count_und,
                    CAST(AVG(cr.quantidade_aprovada) AS INT) AS media_und
                FROM compras_requisicoes AS cr
                INNER JOIN compras_unidades AS c
                    ON cr.get_id_compras_unidades = c.id_compras_unidades
                WHERE cr.validar = 1 AND cr.get_id_compras_itens = '{$idPre}'
                GROUP BY cr.get_id_compras_unidades
                ORDER BY count_und DESC"
            );
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
        } catch (\mysqli_sql_exception $e) {
            $result = [];
        }
        break;
    default:
        $result = [];
        break;
}

$output = [
	"total" => count($result),
	"results" => $result
];

echo json_encode($output);