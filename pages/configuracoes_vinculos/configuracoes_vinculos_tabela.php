<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= totalVinculosServidores()?> Vínculos Cadastrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    $selectVinculos = selectVinculosServidores();
                    while($lsSelectVinculos = mysqli_fetch_object($selectVinculos)):
                    ?>
                    <tr>
                        <td><small><?= $lsSelectVinculos->id_vinculo ?></small></td>
                        <td><small><?= $lsSelectVinculos->codigo_vinculo ?></small></td>
                        <td><small><a href="?page=configuracoes_vinculos_editar&q=<?= base64_encode($lsSelectVinculos->id_vinculo) ?>"><?= $lsSelectVinculos->nome_vinculo ?></a></small></td>
                        <td><small>Registrado em <? $dataRegistro = new DateTime($lsSelectVinculos->data_register_vinculo ); echo $dataRegistro->format('d/m/Y H:i'); ?> por
                        <?= nomeUserRegistro($lsSelectVinculos->get_id_register) ?></small></td>
                    </tr>
                    <? endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>