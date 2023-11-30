<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
//PUXA AS PERMISSOES
permissao($_GET['page']);
?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Processos</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Gerenciamento dos Processos</h2>
            <p class="mb-4">Insira ou Atualize os processo.</p>


          <!-- Content Row -->
          <div class="row">

            <!-- Earnings Total de Soluções Propostas -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total de Processos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= totalProcessos() ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings Soluções Implementadas -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mapeando</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="?page=processos_stages&q=1"><?= totalProcessosIdStatus(1) ?></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings Tempo de Projeto Eficiência -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mapeados</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="?page=processos_stages&q=2"><?= totalProcessosIdStatus(2) ?></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Melhorados</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><a href="?page=processos_stages&q=3"><?= totalProcessosIdStatus(3) ?></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>            

            <!-- Time do Projeto Eficiênci -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Em Impantação</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?page=processos_stages&q=4"><?= totalProcessosIdStatus(4) ?></a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Impantados</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="?page=processos_stages&q=5"><?= totalProcessosIdStatus(5) ?></a>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- Content Row -->


            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#create-warehouse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Cadastrar novo Processo</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse show" id="create-warehouse" >
                <div id="create-warehouse-main-form" class="card-body">
                <form role="form" action="controller/insertProcesso.php" method="post" enctype="multipart/form-data">
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="nome_processo">Nome do Processo</label>
                          <input type="text" class="form-control" id="nome_processo" name="nome_processo" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label for="imagemProcesso">Arquivo do Processo</label><br>
                        <input type="file" accept=".pdf" id="imagem" name="imagem" value="">
                        <p class="help-block"><small>Somente arquiro tipo .pdf max: 5mb</small></p>
                      </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="get_id_prefeitura">Selecione o dono do Processo</label>
                          <select id="get_id_org_prefeitura" name="get_id_org_prefeitura" class="custom-select">
                          <?
                          // traz a lista de todas os vínculos das prefeituras
                          $selectVinculos = selectVinculos();
                          while($lsSelectVinculos = mysqli_fetch_object($selectVinculos)):
                          ?>
                            <option value="<?= $lsSelectVinculos->id_organizacao ?>">
                              <?= $lsSelectVinculos->nome_prefeitura ?> - 
                              <?= $lsSelectVinculos->nome_secretaria ?> - 
                              <?= $lsSelectVinculos->nome_diretoria ?>
                            </option>
                          <? endwhile; ?>
                          </select>
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Cadastrar novo Processo</button>
                </form>
                </div>
              </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= totalProcessos() ?> Processos totais identificados</h6>
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
                    $selectProcessos = selectProcessos();
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
                          <a href="?page=processos_editar&qw=<?= base64_encode($lsSelectProcessos->id_processosGerenciais) ?>"><?= $lsSelectProcessos->nome_processo ?></a>
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