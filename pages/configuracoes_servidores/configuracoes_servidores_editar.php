<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();

//PUXA AS PERMISSOES
permissao($_GET['page']);

// DECRYPT O ID
$id_servidor = base64_decode($_GET['q']);

// INSTANCIANDO
$selectServidoresPeloId = selectServidoresPeloId($id_servidor);
$servidor = mysqli_fetch_object($selectServidoresPeloId);

$selectEstruturaServidorPeloIdServidor = selectEstruturaServidorPeloIdServidor($id_servidor);
$estrutura_servidor = mysqli_fetch_object($selectEstruturaServidorPeloIdServidor);
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Configurações</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Servidores</h2>
            <p class="mb-4"><small>Gerenciamentos dos servidores das prefeituras.</small></p>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Alterar Servidor</h6>
                        </div>
                        <div class="card-body">
                            <form role="form" action="controller/servidores/updateConfiguracoesServidor.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="matricula_servidor">Matrícula do Servidor</label>
                                        <input type="text" class="form-control" id="matricula_servidor" name="matricula_servidor" 
                                            placeholder="Digite o matrícula da servidor" value="<?= $servidor->matricula_servidor ?>" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cpf_servidor">CPF do Servidor</label>
                                        <input type="text" class="form-control cpf" id="cpf_servidor" name="cpf_servidor" 
                                            placeholder="Digite o CPF da servidor" value="<?= $servidor->cpf_servidor ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nome_servidor">Nome do Servidor</label>
                                        <input type="text" class="form-control" id="nome_servidor" name="nome_servidor" 
                                            placeholder="Digite o nome da servidor" value="<?= $servidor->nome_servidor ?>" required>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="get_id_prefeitura">Selecione a Prefeitura</label>   
                                        <select id="get_id_prefeitura" name="get_id_prefeitura" class="custom-select select2" required>
                                            <option value="">Selecione</option>
                                            <? $prefeituras = selectPrefeiturasIdNome();
                                            while($prefeitura = mysqli_fetch_object($prefeituras)):
                                            ?>
                                                <option value="<?= $prefeitura->id_prefeitura  ?>">
                                                    <?= $prefeitura->nome_prefeitura ?>
                                                </option>
                                            <? endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="get_id_secretaria">Selecione a Secretaria</label>   
                                        <select id="get_id_secretaria" name="get_id_secretaria" class="custom-select select2" required>
                                            <option value="">Selecione</option>
                                            <? $secretarias = selectSecretariasIdNome();
                                            while($secretaria = mysqli_fetch_object($secretarias)):
                                            ?>
                                                <option value="<?= $secretaria->id_secretaria ?>">
                                                    <?= $secretaria->nome_secretaria ?>
                                                </option>
                                            <? endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">                                   
                                    <div class="form-group col-md-6">
                                        <label for="get_id_cargo">Selecione a Cargos</label>   
                                        <select id="get_id_cargo" name="get_id_cargo" class="custom-select select2" required>
                                            <option value="">Selecione</option>
                                            <? $cargos = selectCargosIdNome();
                                            while($cargo = mysqli_fetch_object($cargos)):
                                            ?>
                                                <option value="<?= $cargo->id_cargo ?>">
                                                    <?= $cargo->nome_cargo ?>
                                                </option>
                                            <? endwhile; ?>
                                        </select>
                                    </div>                                 
                                    <div class="form-group col-md-6">
                                        <label for="get_id_lotacao">Selecione a Lotação</label>   
                                        <select id="get_id_lotacao" name="get_id_lotacao" class="custom-select select2" required>
                                            <option value="">Selecione</option>
                                            <? $lotacoes = selectLotacoesIdNome();
                                            while($lotacao = mysqli_fetch_object($lotacoes)):
                                            ?>
                                                <option value="<?= $lotacao->id_lotacao ?>">
                                                    <?= $lotacao->nome_lotacao ?>
                                                </option>
                                            <? endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">                                    
                                    <div class="form-group col-md-6">
                                        <label for="get_id_vinculo">Selecione o Vínculo</label>   
                                        <select id="get_id_vinculo" name="get_id_vinculo" class="custom-select select2" required>
                                            <option value="">Selecione</option>
                                            <? $vinculos = selectVinculosServidoresIdNome();
                                            while($vinculo = mysqli_fetch_object($vinculos)):
                                            ?>
                                                <option value="<?= $vinculo->id_vinculo ?>">
                                                    <?= $vinculo->nome_vinculo ?>
                                                </option>
                                            <? endwhile; ?>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" id="id_servidor" name="id_servidor" value="<?= $id_servidor ?>">
                                <input type="hidden" id="status_servidor" name="status_servidor" value="<?= $servidor->status_servidor ?>">
                                <input type="hidden" id="id_estrutura_servidor" name="id_estrutura_servidor" value="<?= $estrutura_servidor->id_estrutura_servidor ?>">
                                <button type="submit" class="btn btn-warning mt-3">Alterar</button>
                            </form>
                        </div>
                    </div>

                    <? require 'configuracoes_servidores_tabela.php'; ?>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
</div>

<script>
    $('#get_id_prefeitura').val(<?= $estrutura_servidor->get_id_prefeitura ?>);
    $('#get_id_prefeitura').trigger('change');

    $('#get_id_secretaria').val(<?= $estrutura_servidor->get_id_secretaria ?>);
    $('#get_id_secretaria').trigger('change');

    $('#get_id_cargo').val(<?= $estrutura_servidor->get_id_cargo ?>);
    $('#get_id_cargo').trigger('change');

    $('#get_id_lotacao').val(<?= $estrutura_servidor->get_id_lotacao ?>);
    $('#get_id_lotacao').trigger('change');

    $('#get_id_vinculo').val(<?= $estrutura_servidor->get_id_vinculo ?>);
    $('#get_id_vinculo').trigger('change');
</script>