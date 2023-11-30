<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= totalSolicitantesAlmoxarifado() ?> Solicitantes Registrados</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                    </tr>
                </thead>

                <tbody id="table-body-warehouse">
                    <?
                    $selectSolicitantesAlmoxarifado = selectSolicitantesAlmoxarifado();
                    $cont = 1;
                    while($lsSelectSolicitantesAlmoxarifado = mysqli_fetch_object($selectSolicitantesAlmoxarifado)):
                    ?>
                        <tr>
                            <td><small><?= $cont ?></small></td>
                            <td>
                                <a href="?page=formularios_almoxarifado_solicitantes&asdf=<?= base64_encode($lsSelectSolicitantesAlmoxarifado->id_almoxarifado_solicitante) ?>">
                                    <small><?= $lsSelectSolicitantesAlmoxarifado->nome_solicitante ?></small>
                                </a>
                            </td>
                            <td><small><?= $lsSelectSolicitantesAlmoxarifado->email_solicitante ?></small></td>
                            <td><small class="telefone"><?= $lsSelectSolicitantesAlmoxarifado->telefone_solicitante ?></small></td>
                            <td><small class="cpf"><?= $lsSelectSolicitantesAlmoxarifado->cpf_solicitante ?></small></td>
                        </tr>                
                    <?
                        $cont += 1;
                    endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>