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
            <p class="mb-4">Você está editando o usuário <span class="text-danger"><u><?= $lsSelectMyProfile->nome ?></u></span></p>
            
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
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= $lsSelectMyProfile->nome ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="login">Login / E-Mail</label>
                            <input type="email" class="form-control" id="login" name="login" value="<?= $lsSelectMyProfile->login ?>" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" value="<?= $lsSelectMyProfile->senha ?>" required >
                        </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="get_id_unidade_academica">Selecione a Unidade Acadêmica</label>                    
                          <select id="get_id_unidade_academica" name="get_id_unidade_academica" class="custom-select">
                          <?
                          // traz a lista das unidades acadêmicas
                          $selectUnidadeAcademica = selectUnidadeAcademicaPeloId($lsSelectMyProfile->get_id_unid_aca);
                          $ls = mysqli_fetch_object($selectUnidadeAcademica)
                          ?>                           
                            <option value="<?= $ls->id_unid_aca ?>">Hoje está em: <?= $ls->nome_unidade_academica ?></option>
                          <?
                          $selectUnidadeAcademica = selectUnidadeAcademica();
                          while($lsSelectUnidadeAcademica = mysqli_fetch_object($selectUnidadeAcademica)):
                          ?>
                            <option value="<?= $lsSelectUnidadeAcademica->id_unid_aca  ?>"><?= $lsSelectUnidadeAcademica->nome_unidade_academica ?></option>
                          <? endwhile; ?>
                          </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label for="get_id_tipo">Perfil</label>
                        <?
                        switch ($lsSelectMyProfile->tipo) {
                          case '0': $tipoN = 'Administrador'; break;
                          case '1': $tipoN = 'Usuário Comum'; break;
                        }                    
                    ?>
                          <select id="get_id_tipo" name="get_id_tipo" class="custom-select">
                            <option value="<?= $lsSelectMyProfile->tipo ?>">Hoje está como: <?= $tipoN ?></option>
                            <option value="0">Administrador</option>
                            <option value="1">Usuário Final</option>
                          </select>
                      </div>
                      <div class="form-group col-md-4">
                            <label for="login">SIAPE / Matrícula</label>
                            <input type="text" class="form-control" id="matricula" name="matricula" value="<?= $lsSelectMyProfile->matricula ?>" required>
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
                <dl>
                  <dt><h6 class="m-2 font-weight-bold text-danger">Formulários</h6></dt>
                  <dd>
                    <input type="checkbox" id="formularios_almoxarifado" name="formularios_almoxarifado" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_almoxarifado == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_almoxarifado">Almoxarifado</label> 
                  </dd>
                  <dd>
                    <input type="checkbox" id="formularios_compras" name="formularios_compras" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_compras == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_compras">Compras</label> 
                  </dd>
                  <dd>
                    <input type="checkbox" id="formularios_enel" name="formularios_enel" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_enel == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_enel">ENEL</label> 
                  </dd>
                  <dd>
                    <input type="checkbox" id="formularios_folha_pagamento" name="formularios_folha_pagamento" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_folha_pagamento == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_folha_pagamento">Folha de Pagamento</label> 
                  </dd>                  
                  <dd>
                    <input type="checkbox" id="formularios_ordens_judiciais" name="formularios_ordens_judiciais" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_ordens_judiciais == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_ordens_judiciais">Ordens Judiciais</label>
                  </dd>
                  <dd>
                    <input type="checkbox" id="formularios_vigencia_contratos" name="formularios_vigencia_contratos" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_vigencia_contratos == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_vigencia_contratos">Vigência dos Contratos</label>
                  </dd>
                  <!-- <dd>
                    <input type="checkbox" id="formularios_registros_beneficios" name="formularios_registros_beneficios" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->formularios_registros_beneficios == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                    <label for="formularios_registros_beneficios">Registro de Benefícios</label>
                  </dd> -->
                  <!-- <dd>
                  </dd>                                     -->
                </dl>
              </div>
              
              <div class="form-group col-md-4">
                <dl>
                  <dt><h6 class="m-2 font-weight-bold text-danger">Repositório de Processos</h6></dt>
                  <dd>
                  <input type="checkbox" id="processos_inserir" name="processos_inserir" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->processos_inserir == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="processos_inserir">Inserir Processo</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="processos_powerbi" name="processos_powerbi" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->processos_powerbi == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="processos_powerbi">Inserir PowerBi</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="processos_stages" name="processos_stages" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->processos_stages == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="processos_stages">Visualizar Processo</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="processos_editar" name="processos_editar" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->processos_editar == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="processos_editar">Alterar Processo</label>
                  </dd>
                </dl>

                

              </div>

              <div class="form-group col-md-4">
                <dl>
                  <dt><h6 class="m-2 font-weight-bold text-danger">Configurações</h6></dt>
                  <dd>
                  <input type="checkbox" id="usuarios" name="usuarios" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->usuarios == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="usuarios">Usuários</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_prefeituras" name="configuracoes_prefeituras" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_prefeituras == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_prefeituras">Prefeituras</label>    
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_secretarias" name="configuracoes_secretarias" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_secretarias == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_secretarias">Secretarias</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_diretorias" name="configuracoes_diretorias" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_diretorias == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_diretorias">Diretorias</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_estrutura" name="configuracoes_estrutura" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_estrutura == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_estrutura">Estrutura Organizacional</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_servidores" name="configuracoes_servidores" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_servidores == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_servidores">Servidores</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_cargos" name="configuracoes_cargos" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_cargos == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_cargos">Cargos</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_lotacoes" name="configuracoes_lotacoes" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_lotacoes == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_lotacoes">Lotações</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="configuracoes_vinculos" name="configuracoes_vinculos" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->configuracoes_vinculos == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="configuracoes_vinculos">Vínculos</label>
                  </dd>
                  <dd>
                  <input type="checkbox" id="questionarios_colaboradores" name="questionarios_colaboradores" class="minimal-red" <? if($lsSelectPermissoesPorIdUser->questionarios_colaboradores == 1): echo "checked value=\"1\""; else: ""; endif; ?> />
                  <label for="questionarios_colaboradores">Colaboradores</label>
                  </dd>
                </dl>
              </div>                            
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <input type="hidden" class="form-control" id="idUsu" name="idUsu" value="<?= $lsSelectMyProfile->id_usu; ?>">
                <input type="hidden" id="senhaEmDB" name="senhaEmDB" value="<?= $lsSelectMyProfile->senha?>">
                <? // TESTANDO SE O USER LOGADO É SINGLE. SINGLE NÃO TEM BTN-SUBMIT
                if(($_SESSION['usuarioTipo'] == 1) and ($_SESSION['usuarioID'] != $lsSelectProfiles->idPeople )): echo ""; else: ?>
                  <button type="submit" class="btn btn-warning">Atualizar Usuário</button>
                  <? endif ?>
              </div>
            </div>
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
                          $tipo = 'Uusário Final';
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
                        <? else:?>
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


  
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->