<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
//PUXA AS PERMISSOES
permissao($_GET['page']);
// DECRYPT O ID
$id_processosGerenciais = base64_decode($_GET['qw']);
// Instanciando
$selectProcessosId = selectProcessosId($id_processosGerenciais);
$ls = mysqli_fetch_object($selectProcessosId);
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
            <p class="mb-4">Atualização do processo.</p>

            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#create-warehouse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Alterar Processo</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse show" id="create-warehouse" >
                <div id="create-warehouse-main-form" class="card-body">
                <form role="form" action="controller/uploadProcesso.php" method="post" enctype="multipart/form-data">
                  <div class="form-row">
                      <div class="form-group col-md-6">
                          <label for="nome_processo">Nome do Processo</label>
                          <input type="text" class="form-control" id="nome_processo" name="nome_processo" value="<?= $ls->nome_processo ?>" required>
                      </div>

                      <div class="form-group col-md-2">
                        <label for="imagemProcessoAtual">Processo Atual</label><br>
                        <? if ($ls->imagemProcesso != 'noPhoto.jpg' ): ?>
                          <a href="../uploads/processos/<?= $ls->imagemProcesso ?>" target="_blank" class="btn btn-sm btn-facebook">
                              <i class="fa fa-download"></i> Baixar
                          </a>
<!--                           <a href="controller/delProcessoArquivo.php?&q=<?= $id_processosGerenciais ?>&i=<?= $ls->imagemProcesso ?>" class="btn btn-sm btn-google">
                              <i class="fa fa-trash"></i> Deletar
                          </a>    -->                       
                        <? else: ?>
                          <p class="text-danger"><small>Processo está sendo mapeado</small></p>
                        <? endif ?>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="imagemProcesso">Arquivo do Processo</label><br>
                        <input type="file" accept=".pdf" id="imagem" name="imagem" value="">
                        <p class="help-block"><small>Somente arquiro tipo .pdf max: 5mb</small></p>
                      </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="get_id_prefeitura">Selecione o dono do Processo</label>
                          <select id="get_id_org_prefeitura" name="get_id_org_prefeitura" class="custom-select">
                            <option value="<?= $ls->get_id_organizaoPrefeituras ?>">Dono atual:
                              <?
                              $selectselectVinculosPeloId=selectselectVinculosPeloId($ls->get_id_organizaoPrefeituras);
                              $lsV = mysqli_fetch_object($selectselectVinculosPeloId);
                              ?>
                              <?= $lsV->nome_prefeitura ?> - 
                              <?= $lsV->nome_secretaria ?> - 
                              <?= $lsV->nome_diretoria ?>
                            </option>
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
                    <div class="form-group col-md-4">
                        <label for="get_id_status_processo">Status do Processo</label>
                          <select id="get_id_status_processo" name="get_id_status_processo" class="custom-select">
                            <option value="<?= $ls->get_id_status_processo ?>">Status atual: <?= $ls->processos_status ?></option>
                          <?
                          // traz a lista de todos os possíveos status do processo
                          $selectStatus = selectStatus();
                          while($lsSelectStatus = mysqli_fetch_object($selectStatus)):
                          ?>
                            <option value="<?= $lsSelectStatus->id_processos_status ?>">
                              <?= $lsSelectStatus->processos_status ?></option>
                          <? endwhile; ?>
                          </select>
                    </div>                    
                  </div>
                  
                  <input type="hidden" id="id_processosGerenciais" name="id_processosGerenciais" value="<?= $id_processosGerenciais ?>" required>
                  <input type="hidden" id="imagemProcesso" name="imagemProcesso" value="<?= $ls->imagemProcesso ?>" required>
                  <button type="submit" class="btn btn-warning">Alterar Processo</button>
                </form>
                </div>
              </div>
            </div>


            <div class="card shadow mb-4">
              <!-- Card Header - Accordion -->
              <a href="#historico-warehouse" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Histórico do Processo</h6>
              </a>
              <!-- Card Content - Collapse -->
              <div class="collapse" id="historico-warehouse" >
                <div id="create-warehouse-main-form" class="card-body">
                  <div class="form-row">
                    <ul>

<?
$selectProcessosHistorico = selectProcessosHistorico(1);
while($lsSelectProcessosHistorico = mysqli_fetch_object($selectProcessosHistorico)):

                          switch($lsSelectProcessosHistorico->get_id_status_processo_historico){
                            case 1: $badge = 'secondary'; break;
                            case 2: $badge = 'warning'; break;
                            case 3: $badge = 'info'; break;
                            case 4: $badge = 'danger'; break;
                            case 5: $badge = 'success'; break;
                          }
?>
                      <li>
                        <data>
                          <small>
                            <span class="badge badge-<?= $badge ?>"><?= $lsSelectProcessosHistorico->processos_status ?></span> em: <? $data_register_proc_historico = new DateTime($lsSelectProcessosHistorico->data_register_proc_historico ); echo $data_register_proc_historico->format('d/m/Y H:i:s'); ?>
                          <? if ($lsSelectProcessosHistorico->get_id_status_processo_historico != 1): ?>
                          <a href="../uploads/processos/<?= $lsSelectProcessosHistorico->imagemProcessoHistorico ?>" target="_blank">
                            <span class="icon text-white-80"><i class="fas fa-download"></i></span>
                          </a>
                          <? endif ?>

                          </small>
                        </data>
                      </li>              
<? endwhile ?>

<!--                       <li><data value=""><small><span class="badge badge-info">MAPEADO</span> em:</small></data></li>
                      <li><data value=""><small><span class="badge badge-info">MELHORADO</span> em:</small></data></li>
                      <li><data value=""><small><span class="badge badge-danger">EM IMPLANTAÇÃO</span> em:</small></data></li>
                      <li><data value=""><small><span class="badge badge-success">IMPLANTADO</span> em:</small></data></li> -->

                    </ul>
                  </div>

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
                        <td><small><a href="?page=processos_editar&qw=<?= base64_encode($lsSelectProcessos->id_processosGerenciais) ?>"><?= $lsSelectProcessos->nome_processo ?></a></small></td>
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