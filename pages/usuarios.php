<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
// PUXA AS PERMISSOES
permissao($_GET['page']);
?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Gestão de Usuários</h1>
            
            <!-- Formulário Adicionar -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Adicionar Usuário</h6>
                </div>
                <div class="card-body">
                  <div id="create-user-main-form" class="">
                  <form role="form" action="controller/insertProfile.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome do Usuário</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="login">Login / E-Mail</label>
                            <input type="email" class="form-control" id="login" name="login" placeholder="" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="" required>
                        </div>                        
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="get_id_unidade_academica">Selecione a Unidade Acadêmica</label>                    
                          <select id="get_id_unidade_academica" name="get_id_unidade_academica" class="custom-select">
                          <?
                          // traz a lista das unidades acadêmicas
                          $selectUnidadeAcademica = selectUnidadeAcademica();
                          while($lsselectUnidadeAcademica = mysqli_fetch_object($selectUnidadeAcademica)):
                          ?>
                            <option value="<?= $lsselectUnidadeAcademica->id_unid_aca  ?>"><?= $lsselectUnidadeAcademica->nome_unidade_academica ?></option>
                          <? endwhile; ?>
                          </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="get_id_tipo">Perfil</label>                    
                          <select id="get_id_tipo" name="get_id_tipo" class="custom-select">
                            <option value="0">Administrador</option>
                            <option value="1">Usuário Comum</option>
                          </select>
                      </div>

                      <div class="form-group col-md-4">
                            <label for="login">SIAPE / Matrícula</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" required>
                        </div>
                    </div>                  

                    <button type="submit" class="btn btn-primary">Cadastrar novo Usuário</button>
                  </form>

                  </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= totalProfiles() ?> Usuários Cadastrados</h6>
                <h6 class="m-0 text-primary"><small><?= totalProfilesByType(0) ?> Administrador(es)</small></h6>
                <h6 class="m-0 text-primary"><small><?= totalProfilesByType(1) ?> Usuário Final</small></h6>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Unidade Acadêmica</th>
                        <th>Matrícula</th>
                        <th>Tipo</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody id="table-body">
                    <?
                    $selectProfiles = selectProfiles();
                    while($lsSelectProfiles = mysqli_fetch_object($selectProfiles)):
                      switch ($lsSelectProfiles->tipo) {
                        case '0':
                          $tipo = 'Administrador';
                          break;
                        case '1':
                          $tipo = 'Usuário Comum';
                          break;
                      }
                      //TRATA O LABEL DO STATUS
                      switch ($lsSelectProfiles->status) {
                        case '0':
                          $statusDeAcesso = 'Inativo';
                          break;
                        case '1':
                          $statusDeAcesso = 'Ativo';
                          break;
                      }                      
                    ?>
                        <tr>
                            <td><small><?= $lsSelectProfiles->id_usu ?> </small></td>
                            <td><small>

                      <? // TESTANDO SE O USER LOGADO É SINGLE. SINGLE NÃO TEM BTN-SUBMIT
                        if(($_SESSION['usuarioTipo'] == 1) and ($_SESSION['usuarioID'] != $lsSelectProfiles->idPeople )):?>
                          <?= $lsSelectProfiles->nome ?>
                        <? else: ?>
                        <a href="?page=profileEditDoAdmin&asdf=<?= base64_encode($lsSelectProfiles->id_usu) ?>"><?= $lsSelectProfiles->nome ?></a>
                        <!-- <a href="?page=profileEditDoAdmin&asdf=<?= base64_encode($lsSelectProfiles->id_usu); ?>" type="submit" class="btn btn-success btn-sm btn-flat"><i class="fa fa-edit"></i> Edit Profile</a> -->
                        <? endif ?>

                              <br>
                            <span class="text-gray-500">registrado em: <? $dataRegistro = new DateTime($lsSelectProfiles->dataRegistro ); echo $dataRegistro->format('d/m/Y H:i'); ?></span></small></td>
                            <td><small><?= $lsSelectProfiles->login ?></small></td>
                            <td><small><?= $lsSelectProfiles->nome_unidade_academica ?></small></td>
                            <td><small><?= $lsSelectProfiles->matricula ?></small></td>
                            <td><?//= $lsSelectProfiles->tipo ?>
                      <span class="badge badge-<?= $lsSelectProfiles->tipo == 0 ? 'success' : 'danger'; ?>"><?= $tipo ?></span>
                      <span class="badge badge-<?= $lsSelectProfiles->status == 0 ? 'warning' : 'info'; ?>"><?= $statusDeAcesso ?></span>
                              
                            </td>
                            <td>

                      <?php // TESTANDO SE O USER LOGADO É SINGLE. SINGLE NÃO TEM BTN-SUBMIT
                        if(($_SESSION['usuarioTipo'] == 1) and ($_SESSION['usuarioID'] != $lsSelectProfiles->idPeople )): echo "";else:?>
                            <!--
                                STTAUS 0(ZERO) O USER ESTÁ DESATIVADO.
                                STATUS 1 ESTÁ ATIVO PARA ACESSO AO SISTEMA
                            -->
                            <?php if ($lsSelectProfiles->status == 0):?>
                            <form method="post" action="controller/updateUsuarioStatus.php" enctype="multipart/form-data">
                                <input type="hidden" id="id_usu" name="id_usu" value="<?= $lsSelectProfiles->id_usu ?>">
                                <input type="hidden" id="status" name="status" value="1">
                                <button type="submit" class="btn btn-info btn-sm"><small>Ativar</small></button>
                            </form>
                            <?php else: ?>
                            <form method="post" action="controller/updateUsuarioStatus.php" enctype="multipart/form-data">
                                <input type="hidden" id="id_usu" name="id_usu" value="<?= $lsSelectProfiles->id_usu ?>">
                                <input type="hidden" id="status" name="status" value="0">
                                <button type="submit" class="btn btn-sm btn-warning"><small>Desativar</small></button>
                            </form>
                            <?php endif; ?>

                      <?php endif ;?>
                              
                            </td>
                        </tr>
                    <? endwhile ?>   
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Registro do Almoxarifado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <!-- Card Content - Collapse -->
                      <div class="" id="edit-user" >
                        <div id="edit-user-modal-form" class="card-body">
                          
                        </div>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" form="form-edit-user-modal" class="btn btn-primary">Editar</button>
                  </div>
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
  <!-- End of Page Wrapper -->