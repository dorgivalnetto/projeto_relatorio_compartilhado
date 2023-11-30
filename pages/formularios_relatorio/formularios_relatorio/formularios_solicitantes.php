<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();

//PUXA AS PERMISSOES
permissao('formularios_almoxarifado');

if (isset($_GET['asdf'])) {
    // PEGA O ID DO PRESTADOR QUE VEM NO GET
    $idSolicitante = is_numeric(base64_decode(trim($_GET['asdf']))) ? base64_decode(trim($_GET['asdf'])) : 0;

    // TRAZ OS DADOS DO PRESTADOR DO ID NO GET
    $selectSolicitantesAlmoxarifadoById = selectSolicitantesAlmoxarifadoById($idSolicitante);
    $ls = mysqli_fetch_object($selectSolicitantesAlmoxarifadoById);
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
            <h2 class="h4 mb-2 text-red-800 text-danger">Patrimônios - Solicitantes</h2>
            <p class="mb-4">Controle da movimentação dos bens e patrimônios.</p>

            <? 
            // INCLUIR OS EARNINGS DO ALMOXARIFADO
            include_once dirname(__FILE__) . '/../formularios_almoxarifado_earnings.php';

            // CASO EXISTA UM ID SENDO PASSADO
            if (isset($_GET['asdf'])) {
                include_once('formularios_solicitantes_editar.php');
                include_once('formularios_solicitantes_historico_tabela.php');
            }

            // INCLUIR A TABELA DE SOLICITANTES
            include_once('formularios_solicitantes_tabela.php'); 
            ?>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->