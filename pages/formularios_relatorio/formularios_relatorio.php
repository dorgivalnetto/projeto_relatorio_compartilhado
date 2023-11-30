<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();

// PUXA AS PERMISSOES
permissao($_GET['page']);

// SELECIONA AS INFORMAÇÕES PARA A TABELA
if (!isset($_GET['q'])) {
    //$selectAlmoxarifado = selectAlmoxarifado();
}
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Formulários</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Patrimônios</h2>
            <p class="mb-4">Controle da movimentação dos bens e patrimônios.</p>

            <? 
            // INCLUIR OS EARNINGS DO ALMOXARIFADO
            include_once('formularios_relatorio_earnings.php');

            // INCLUIR O CADASTRO NO ALMOXARIFADO
            include_once('formularios_relatorio_cadastrar.php');
            ?>

            <div class="row">
                <?
                // INCLUIR O CADASTRO DO SOLICITANTE
                include_once('formularios_relatorio/formularios_relatorio_cadastrar.php');
                // INCLUIR O CADASTRO DO LOCAL
                include_once('formularios_locais/formularios_locais_cadastrar.php');
                ?>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->