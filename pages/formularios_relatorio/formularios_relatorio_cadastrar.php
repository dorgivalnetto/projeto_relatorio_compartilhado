<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#create-warehouse" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Ação</h6>
    </a>

    <!-- Card Content - Collapse -->
    <div class="collapse show" id="create-warehouse" >
        <div id="create-warehouse-main-form" class="card-body">
            <form role="form" action="controller/patrimonios/insertAlmoxarifado.php" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="num_termo">Título da Ação</label>
                        <input type="text" class="form-control" id="num_termo" name="num_termo" placeholder="" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="num_oficio">Tipo da Ação</label>
                        <select id="get_id_local" name="get_id_local" class="custom-select" required>
                            <?
                            // lista todas as modalidades das ações = Ampla, Prope, Fluxo Contínuo
                            $selectTipoAcao = selectTipoAcao();
                            while($lsselectTipoAcao = mysqli_fetch_object($selectTipoAcao)):
                            ?>
                                <option value="<?= $lsselectTipoAcao->id_tipo  ?>"><?= $lsselectTipoAcao->nome_tipo; ?></option>
                            <? endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="get_id_local">Selecione a Modalidade</label>
                        <select id="get_id_local" name="get_id_local" class="custom-select" required>
                            <?
                            // lista todas as modalidades das ações = Ampla, Prope, Fluxo Contínuo
                            $selectModalidadeAcao = selectModalidadeAcao();
                            while($lsselectModalidadeAcao = mysqli_fetch_object($selectModalidadeAcao)):
                            ?>
                                <option value="<?= $lsselectModalidadeAcao->id_modalidade  ?>"><?= $lsselectModalidadeAcao->nome_modalidade; ?></option>
                            <? endwhile; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="get_id_solicitante">Coordenador da Ação</label>
                        <select id="get_id_solicitante[]" name="get_id_solicitante[]" class="custom-select select-solicitantes" required>
                            <option value="Selecione...">
                            <?
                            $selectCoordenadorProjeto = selectTodosCoordenadores();
                            while($lsselectCoordenadorProjeto = mysqli_fetch_object($selectCoordenadorProjeto)):
                            ?>
                                <option value="<?= $lsselectCoordenadorProjeto->id_servidor ?>">
                                    <?= $lsselectCoordenadorProjeto->nome_servidor ?>

                                </option>
                            <? endwhile; ?>
                        </select>
                    </div>  

                    <div class="form-group col-md-4">
                        <label for="num_siape">SIAPE</label>
                        <input type="text" class="form-control" id="num_siape" name="num_siape" value="<?= $lsselectSiape->matricula_servidor ?>" required>
                        <span class="text-danger"><small>somente números</small></span>
                        <?php
                            // traz a lista de todas os servidores
                            $selectSiape = selectTodosCoordenadores();
                            //$selectSiape = selectSiapeCoordenador($lsselectCoordenadorProjeto->matricula_servidor);
                            //$selectSiape = selectSiapeCoordenador($lsselectCoordenadorProjeto->id_servidor);
                            while ($lsselectSiape = mysqli_fetch_object($selectSiape)):
                            ?>
                                <script>
                                    // Preencher o campo num_siape com o valor da matricula_servidor ao selecionar uma opção
                                    $(document).ready(function () {
                                        $('#num_siape').on('focus', function () {
                                            $(this).val('<?= $lsselectSiape->matricula_servidor ?>');
                                        });
                                    });
                                </script>
                            <?php endwhile; ?>
                            
                    </div>  

                    <div class="form-group col-md-4">
                        <label for="get_id_patrimonio">Perfil</label>                        
                        <select id="get_id_solicitante[]" name="get_id_solicitante[]" class="custom-select select-solicitantes" required>
                            <option value="Selecione...">
                            <?
                            $selectPerfilCoordenadorProjeto = selectTodosPerfis();
                            while($lsselectPerfilCoordenadorProjeto = mysqli_fetch_object($selectPerfilCoordenadorProjeto)):
                            ?>
                                <option value="<?= $lsselectPerfilCoordenadorProjeto->id_perfil ?>">
                                    <?= $lsselectPerfilCoordenadorProjeto->nome_perfil ?>

                                </option>
                            <? endwhile; ?>
                        </select>
                    </div>                
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="get_id_curso">Curso</label>
                        <select id="get_id_cursos" name="get_id_cursos" class="custom-select" required>
                            <?
                            // traz a lista de todas os cursos
                            $selectCursos = selectCursos();
                            while($lsselectCursos = mysqli_fetch_object($selectCursos)):
                            ?>
                                <option value="<?= $lsselectCursos->id_curso ?>">
                                    <?= $lsselectCursos->nome_curso ?>
                                </option>
                            <? endwhile; ?>
                        </select>
                    </div>
                </div>
                
                <div id="periodo_realizacao class="form-group">
                    <label for="data_inicio">Data de Início</label>
                    <input type="date" name="data_inicio" id="data_inicio" class="input-date" required>

                    <label for="data_termino">Data de Término</label>
                    <input type="date" name="data_termino" id="data_termino" class="input-date" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Cadastrar Ação</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.select2').select2({ multiple: true });
    $('.select2-solicitantes').select2({ multiple: true });
</script>  