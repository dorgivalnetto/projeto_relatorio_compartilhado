<?
// unset( $_SESSION );
// // Apaga todas as variáveis da sessão
// $_SESSION = array();

// session_destroy();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Dashboards</h1>
  <p class="mb-4">Preencha o Relatório de suas ações aqui.</p>

  <div class="row">
  <?
    $idUsu = $_SESSION['usuarioID']; 
    //$selectPaineisBI = selectPaineisBIAsc();
    //while($ls = mysqli_fetch_object($selectPaineisBI)):
    ?>
      <div class="col-xl-3 col-md-6 mb-4">
        <? if($ls->nome_painel == "Relatório Ação"): ?>
          <div class="card border-left-danger shadow h-100 py-2">
        <? else: ?>
          <div class="card border-left-primary shadow h-100 py-2">
        <? endif; ?>
          <a href="<?= $ls->link_painel ?>" target="_blank"> <!-- inserir em _blank a pagina do relatorio -->
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                    <?= $ls->nome_painel ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    <? 
  ?>

  </div>
  <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->