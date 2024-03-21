<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
// PUXA AS PERMISSOES
permissao('acoes');
?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Gestão de Ações</h1>
            
            <!-- Formulário Adicionar -->

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Adicionar Ação</h5>
              </div>
              <div class="card-body">
                <div id="create-user-main-form" class="">
                <form role="form" action="controller/insertAcao.php" method="post" enctype="multipart/form-data">
                  <div class="form-row">

                    <div class="form-group col-md-8">
                      <label for="tituloAcao">Título da Ação</label>
                      <input type="text" class="form-control" id="tituloAcao" name="tituloAcao" placeholder="" required>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="get_id_coordenador">Selecione o Coordenador da Ação</label>
                      <select id="get_id_coordenador" name="get_id_coordenador" class="custom-select">
                        <option value="0"></option>
                        <?
                        // traz a lista dos usuarios
                        $selectNomeUsuario = selectUsuarioPeloNome();
                        while($lsselectNomeUsuario = mysqli_fetch_object($selectNomeUsuario)):
                        ?>
                          <option value="<?= $lsselectNomeUsuario->usuarioID  ?>"><?= $lsselectNomeUsuario->nomeUsuario ?></option>
                        <? endwhile; ?>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="get_id_acao">Selecione o Tipo da Ação</label>
                      <select id="get_id_acao" name="get_id_acao" class="custom-select">
                        <option value="0"></option>
                        <?
                        // traz a lista dos tipos
                        $selectTipoAcao = selectAcaoTipo();
                        while($lsselectTipoAcao = mysqli_fetch_object($selectTipoAcao)):
                        ?>
                          <option value="<?= $lsselectTipoAcao->tipoAcaoID  ?>"><?= $lsselectTipoAcao->nome_Tipo ?></option>
                        <? endwhile; ?>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="get_id_area">Selecione a Área Temática da Ação</label>
                      <select id="get_id_area" name="get_id_area" class="custom-select">
                        <option value="0"></option>
                        <?
                        // traz a lista das areas tematicas
                        $selectAreaAcao = selectAreaTematica();
                        while($lsselectAreaAcao = mysqli_fetch_object($selectAreaAcao)):
                        ?>
                          <option value="<?= $lsselectAreaAcao->tipoAreaID  ?>"><?= $lsselectAreaAcao->nome_Area ?></option>
                        <? endwhile; ?>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="get_id_unidade_academica">Selecione a Unidade Acadêmica da Ação</label>
                      <select id="get_id_unidade_academica" name="get_id_unidade_academica" class="custom-select">
                        <option value="0"></option>
                        <?
                        // traz a lista das unidades acadêmicas
                        $selectUnidadeAcademica = selectUnidadeAcademica();
                        while($lsselectUnidadeAcademica = mysqli_fetch_object($selectUnidadeAcademica)):
                        ?>
                          <option value="<?= $lsselectUnidadeAcademica->unidadeAcademicaID  ?>"><?= $lsselectUnidadeAcademica->nome_UA ?></option>
                        <? endwhile; ?>
                      </select>
                    </div>

                  </div>  
                </div>
              </div>
            </div>

            <script>
              $(document).ready(function() {
                $("#botaoAdd").on('click',function() {
                    $(".append").append(
                      '<div class="form-row"><div class="form-group col-md-4"><label for="nomeAluno">Nome do Aluno</label><input type="text" class="form-control" id="nomeAluno" name="nomeAluno" placeholder="" required></div><div class="form-group col-md-4"><label for="matricula">Matrícula</label><input type="text" class="form-control" id="matricula" name="matricula" placeholder="" required></div><div class="form-group col-md-4"><label for="cpf">CPF</label><input type="text" class="cpf form-control" id="cpf" name="cpf" placeholder=""></div></div>');
                });
              });
            </script>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <div class="row">

                  <h5 class="m-0 font-weight-bold text-primary">Adicionar Alunos Contribuintes</h5>



                </div>
              </div>
              <div class="card-body">
                <div id="create-user-main-form" class="">
                  <div class="form">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="nomeAluno">Nome do Aluno</label>
                        <input type="text" class="form-control" id="nomeAluno" name="nomeAluno" placeholder="" required>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="matricula">Matrícula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" required>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="cpf">CPF</label>
                        <input type="text" class="cpf form-control" id="cpf" name="cpf" placeholder="">
                      </div>
                    </div>

                    <div class="append"></div>

                    <button id="botaoAdd" type="button" class="btn">
                      <i class="fa-solid fa-user-plus fa-lg" style="color:#4e73df" aria-hidden="true"></i>
                    </button>

                    <button id="remove" type="button" class="btn">
                      <i class="fa-solid fa-user-minus fa-lg" style="color:#e74a3b" aria-hidden="true"></i>
                    </button>
                    
                  </div>
                </div>
                  
                  <button type="submit" class="btn btn-primary">Cadastrar nova Ação</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>





                      <!-- FALTA PEDIR ALUNOS CONTRIBUINTES DA ACAO -->



                      
                      

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= totalAlunos() ?> Alunos Cadastrados</h6>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id do Aluno</th>
                        <th>Nome do Aluno</th>
                        <th>Id da Ação</th>
                        <th>Título da Ação</th>
                        <th>Coordenador</th>
                        <th>Tipo</th>
                        <th>Unidade Acadêmica</th>
                        <th>Área Temática</th>
                      </tr>
                    </thead>
                    <tbody id="table-body">
                    <?
                    $selectAcoes = selectAcoes();
                    while($lsSelectProfiles = mysqli_fetch_object($selectAcoes)):
                      switch ($lsSelectProfiles->membroEquipe) {
                        case '2':
                          $tipo = 'Técnico Administrativo';
                          break;
                        case '1':
                          $tipo = 'Docente';
                          break;
                      }                 
                    ?>
                        <tr>
                            <td><small><?= $lsSelectProfiles->alunoID ?> </small></td>
                            <td><?= $lsSelectProfiles->nomeAluno ?></td>
                            <td><small><?= $lsSelectProfiles->acaoID ?> </small></td>
                            <td><?= $lsSelectProfiles->tituloAcao ?><small></td>
                            <td>
                              <?= $lsSelectProfiles->nomeUsuario ?>
                              <span class="badge badge-<?= $lsSelectProfiles->tipo == 2 ? 'warning' : 'info'; ?>"><?= $tipo ?></span>
                            </td>
                            <td><small><?= $lsSelectProfiles->nome_Tipo ?></small></td>
                            <td><small><?= whichUnidadeAcademica($lsSelectProfiles->unidadeAcademicaUsuario) ?></small></td>
                            <td><small><?= $lsSelectProfiles->nome_Area ?></small></td>
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