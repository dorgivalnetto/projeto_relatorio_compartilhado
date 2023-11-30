<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();

//PUXA AS PERMISSOES
permissao('formularios_relatorio');

// PEGA O ID DO CONTRATO QUE VEM NO GET
$id_almoxarifado = base64_decode($_GET['as']);

$selectAlmoxarifadoIdAlmoxarifado = selectAlmoxarifadoIdAlmoxarifado($id_almoxarifado);
$ls = mysqli_fetch_object($selectAlmoxarifadoIdAlmoxarifado);
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Formulários</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Patrimônios - Ofício <?= $ls->num_oficio?> </h2>
            <p class="mb-4">Controle da movimentação dos bens e patrimônios.</p>

            <? 
            // INCLUIR OS EARNINGS DO ALMOXARIFADO
            include_once('formularios_relatorio_earnings.php');

            // INCLUIR O CADASTRO DO OFÍCIO
            include_once('formularios_oficios/formularios_oficios_cadastrar.php');

            // INCLUIR O TABELA DE PATRIMONIOS
            include_once('formularios_patrimonios/formularios_patrimonios_tabela.php');
            ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->