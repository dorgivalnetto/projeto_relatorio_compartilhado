<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
// PUXA AS PERMISSOES
permissao('usuarios');
//DECRIPT
$idUsu = base64_decode($_GET['asdf']);
$selectMyProfile = selectMyProfile($idUsu);
$lsSelectMyProfile = mysqli_fetch_object($selectMyProfile);
?>
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Gestão de Usuários</h1>
            <p class="mb-4">Você está editando o usuário <span class="text-danger"><u><?= $lsSelectMyProfile->nomeUsuario ?></u></span></p>
            
            <!-- Formulário Adicionar -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Atualizar Usuário</h6>
                </div>
                <div class="card-body">
                  <div id="create-user-main-form" class="">
                  <form role="form" action="controller/updateProfileAdmin.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome">Nome do Usuário</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= $lsSelectMyProfile->nomeUsuario ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="login">Login / E-Mail</label>
                            <input type="email" class="form-control" id="login" name="login" value="<?= $lsSelectMyProfile->loginUsuario ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" value="<?= $lsSelectMyProfile->senhaUsuario ?>" required >
                        </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="get_id_unidade_academica">Selecione a Unidade Acadêmica</label>                    
                          <select id="get_id_unidade_academica" name="get_id_unidade_academica" class="custom-select">
                          <?
                          // traz a lista das unidades acadêmicas
                          $selectUnidadeAcademica = selectUnidadeAcademicaPeloId($lsSelectMyProfile->unidadeAcademicaUsuario);
                          $ls = mysqli_fetch_object($selectUnidadeAcademica)
                          ?>                           
                            <option value="<?= $ls->unidadeAcademicaID ?>">Hoje está em: <?= $ls->nome_UA ?></option>
                          <?
                          $selectUnidadeAcademica = selectUnidadeAcademica();
                          while($lsSelectUnidadeAcademica = mysqli_fetch_object($selectUnidadeAcademica)):
                          ?>
                            <option value="<?= $lsSelectUnidadeAcademica->unidadeAcademicaID  ?>"><?= $lsSelectUnidadeAcademica->nome_UA ?></option>
                          <? endwhile; ?>
                          </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="get_id_tipo">Perfil</label>
                        <?
                        switch ($lsSelectMyProfile->tipoUsuario) {
                          case '2': $tipoN = 'Usuário Comum'; break;
                          case '1': $tipoN = 'Administrador'; break;
                        }                    
                    ?>
                          <select id="get_id_tipo" name="get_id_tipo" class="custom-select">
                            <option value="<?= $lsSelectMyProfile->tipoUsuario ?>">Hoje está como: <?= $tipoN ?></option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário Final</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                            <label for="login">SIAPE</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" value="<?= $lsSelectMyProfile->siapeUsuario ?>" required>
                        </div>
                    </div>                  

                    <hr>
            <? //TRAZ AS PERMISSÕES PELO ID DO USER
            $selectPermissoesPorIdUser = selectPermissoesPorIdUser($idUsu);
            $lsSelectPermissoesPorIdUser = mysqli_fetch_object($selectPermissoesPorIdUser);            
            ?>

            <h5 class="m-0 font-weight-bold text-primary">Permissões de acesso</h5>
            <br>

            <div class="form-row">
              <div class="form-group col-md-4">
                <dt><h6 class="m-2 font-weight-bold text-danger">Relatórios</h6></dt>
                <dd>
                <input type="checkbox" id="configuracoes_relatorios" name="configuracoes_relatorios" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->relatorios == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                <label for="configuracoes_relatorios">Relatórios</label>    
                </dd>
                <dd>
                <input type="checkbox" id="configuracoes_relatoriofinal" name="configuracoes_relatoriofinal" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->relatoriofinal == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                <label for="configuracoes_relatoriofinal">Relatório Final</label>
                </dd>
              </div>

              <div class="form-group col-md-4">
                <dl>
                  <dt><h6 class="m-2 font-weight-bold text-danger">Configurações</h6></dt>
                  <dd>
                  <input type="checkbox" id="usuarios" name="usuarios" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->usuarios == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="usuarios">Usuários</label>
                  </dd>
                </dl>
              </div>                            
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <input type="hidden" class="form-control" id="idUsu" name="idUsu" value="<?= $lsSelectMyProfile->usuarioID; ?>">
                <input type="hidden" id="senhaEmDB" name="senhaEmDB" value="<?= $lsSelectMyProfile->senhaUsuario?>">
                  <button type="submit" class="btn btn-warning">Atualizar Usuário</button>
              </div>
            </div>
                  </form>
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