<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
//PUXA AS PERMISSOES
permissao($_GET['page']);
// PEGA O ID DO STATUS DO PROCESSO QUE VEM NO GET
$id_status_processo = $_GET['q'];
?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Gerenciamento dos Processos</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Processos <?= nomeProcessoPeloStatus($id_status_processo) ?></h2>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= totalProcessosIdStatus($id_status_processo) ?> Registros</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Dono</th>
                        <th>Status</th>
                      </tr>
                    </thead>
  
                    <tbody id="table-body-warehouse">
                    <?
                    $selectProcessos = selectProcessosPeloIdStatus($id_status_processo);
                    while($lsSelectProcessos = mysqli_fetch_object($selectProcessos)):
                    ?>
                      <tr>
                        <td><small><?= $lsSelectProcessos->id_processosGerenciais ?></small></td>
                        <td>
                          <small>
                          <?
                          $selectPermissoesPorIdUser = selectPermissoesPorIdUser($_SESSION['usuarioID']);
                          $lsSelectPermissoesPorIdUser = mysqli_fetch_object($selectPermissoesPorIdUser);
                          if($lsSelectPermissoesPorIdUser->processos_editar == 0): ?>
                            <?= $lsSelectProcessos->nome_processo ?>
                          <? else: ?>
                          <a href="?page=processos_editar&qw=<?= base64_encode($lsSelectProcessos->id_processosGerenciais) ?>">
                            <?= $lsSelectProcessos->nome_processo ?>
                          </a>
                          <? endif ?>
                          </small>
                        </td>
                        <td>
                          <?
                          $selectselectVinculosPeloId = selectselectVinculosPeloId($lsSelectProcessos->get_id_organizaoPrefeituras);
                          $lsSelectselectVinculosPeloId = mysqli_fetch_object($selectselectVinculosPeloId);?>
                          <small>
                            <?= $lsSelectselectVinculosPeloId->nome_prefeitura ?><br> 
                            <?= $lsSelectselectVinculosPeloId->nome_secretaria ?><br> 
                            <u><?= $lsSelectselectVinculosPeloId->nome_diretoria ?></u>
                            </small>
                        </td>
                        <td>
                          <?
                          switch($lsSelectProcessos->get_id_status_processo){
                            case 1: $badge = 'secondary'; break;
                            case 2: $badge = 'warning'; break;
                            case 3: $badge = 'info'; break;
                            case 4: $badge = 'danger'; break;
                            case 5: $badge = 'success'; break;
                          }
                          ?>
                          <span class="badge badge-<?= $badge ?>"><?= $lsSelectProcessos->processos_status ?></span>
                          <? if ($lsSelectProcessos->get_id_status_processo != 1): ?>
                          <a href="../uploads/processos/<?= $lsSelectProcessos->imagemProcesso ?>" target="_blank" class="btn btn-sm btn-info btn-icon-split">
                            <span class="icon text-white-80">
                                <i class="fas fa-download"></i>
                            </span>
                          </a>
                          <? endif ?>

                        </td>
                      </tr>                
                    <? endwhile ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>