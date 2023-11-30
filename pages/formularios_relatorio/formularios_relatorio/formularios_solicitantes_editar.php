<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#create-requester" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Atualizar os Dados de <?= $ls->nome_solicitante ?></h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse show" id="create-requester">
                <div class="card-body">
                    <form role="form" action="controller/patrimonios/updateAlmoxarifadoSolicitante.php" method="post" enctype="multipart/form-data">
                        <input name="id" value="<?= $_GET['asdf'] ?>" hidden>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome_solicitante">Nome</label>
                                <input type="text" class="form-control" value="<?= $ls->nome_solicitante ?>"
                                    id="nome_solicitante" name="nome_solicitante" placeholder="" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_solicitante">E-mail</label>
                                <input type="email" class="form-control" value="<?= $ls->email_solicitante ?>"
                                    id="email_solicitante" name="email_solicitante" placeholder="" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="telefone_solicitante">Telefone</label>
                                <input type="text" class="form-control" value="<?= $ls->telefone_solicitante ?>"
                                    id="telefone_solicitante" name="telefone_solicitante" placeholder="" required>
                                <span class="text-danger"><small>somente números</small></span>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cpf_solicitante">CPF</label>
                                <input type="text" class="form-control" value="<?= $ls->cpf_solicitante ?>"
                                    id="cpf_solicitante" name="cpf_solicitante" maxlength="11" placeholder="" required>
                                <span class="text-danger"><small>somente números</small></span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning">Atualizar Solicitante</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>