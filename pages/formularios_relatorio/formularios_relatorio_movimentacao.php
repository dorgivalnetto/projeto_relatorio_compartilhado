<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();

//PUXA AS PERMISSOES
permissao('formularios_almoxarifado');

// PEGA O INICIO E FIM DESTA SEMANA
$dataDomingo = dataDomingo(date('Y-m-d'));
$sabado = sabado($dataDomingo);

// ULTIMO DIA DO MES ATUAL
$ultimo_dia_mes = new DateTime( date('Y-m-d') );
$ultimo_dia_mes = $ultimo_dia_mes->format( 'Y-m-t' );

// PRIMEIRO DIA DO MES ATUAL
$primeiro_dia = date("Y-m-01");

// RECEBE O PERIODO 1 = SEMANA, 2 = MÊS
$periodo = $_GET['q'];
switch ($periodo) {
    case '1':
        $msg = 'esta Semana';
        $msg2 = 'nesta Semana';
        $selectAlmoxarifado = selectAlmoxarifadoPorDatas($dataDomingo, $sabado);
        break;

    case '2':
        $msg = 'este Mês';
        $msg2 = 'neste Mês';
        $selectAlmoxarifado = selectAlmoxarifadoPorDatas($primeiro_dia, $ultimo_dia_mes);
        break;

    default: $msg = 'este Mês'; $msg2 = 'neste Mês'; break;
}

// TOTAL DE MOVIMENTAÇAO PELO PERÍODO
$totalAlmoxarifadoSemana = totalAlmoxarifadoDatas($dataDomingo,$sabado);
$totalAlmoxarifadoMes = totalAlmoxarifadoDatas($primeiro_dia,$ultimo_dia_mes);
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Formulários</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Patrimônios - Movimentação <?= $msg ?></h2>
            <p class="mb-4">Controle da movimentação dos bens e patrimônio.</p>

            <?
            // INCLUIR OS EARNINGS DO ALMOXARIFADO
            include_once('formularios_almoxarifado_earnings.php');

            // INCLUIR A TABELA COM AS MOVIMENTAÇÕES FEITAS
            include_once('formularios_almoxarifado_tabela.php'); 
            ?>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->