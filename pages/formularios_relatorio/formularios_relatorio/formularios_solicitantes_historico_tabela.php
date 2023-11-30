<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <? $totalPorSolicitante = totalAlmoxarifadoPorSolicitante($idSolicitante);?>
            <a href="#historico" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Histórico de Solicitações de <?= $ls->nome_solicitante ?> <small> (Foram feitas <?= $totalPorSolicitante?> solicitações)</small></h6>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="historico" >
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable-historico" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patrimônio(s)</th>
                                    <th>Número do Termo</th>
                                    <th>Número do Ofício</th>
                                    <th>Data Entrega</th>
                                    <th>Destino</th>
                                    <th>Solicitante(s)</th>
                                </tr>
                            </thead>
        
                            <tbody id="table-body-warehouse">
                                <?
                                $selectAlmoxarifado = selectAlmoxarifadoPorSolicitante($idSolicitante);
                                while ($lsSelectAlmoxarifado = mysqli_fetch_object($selectAlmoxarifado)):
                                ?>
                                    <tr>
                                        <td><small><?= $lsSelectAlmoxarifado->id_almoxarifado ?></small></td>
                                        <td>
                                            <small><a href="?page=formularios_almoxarifado_detalhe&as=<?= base64_encode($lsSelectAlmoxarifado->id_almoxarifado) ?>"><?= totalPatrimoniosIdAlmoxarifado($lsSelectAlmoxarifado->id_almoxarifado) ?> itens neste termo.</a></small>
                                        </td>
                                        <td><?= $lsSelectAlmoxarifado->num_termo ?></td>
                                        <td><?= $lsSelectAlmoxarifado->num_oficio ?></td>
                                        <td><small><? $data_entrega = new DateTime($lsSelectAlmoxarifado->data_entrega ); echo $data_entrega->format('d/m/Y'); ?></small></td>
                                        <td>
                                            <? $selectselectVinculosPeloId = selectselectVinculosPeloId($lsSelectAlmoxarifado->get_id_org_prefeitura);
                                            $lsSelectselectVinculosPeloId = mysqli_fetch_object($selectselectVinculosPeloId);?>
                                            <?= $lsSelectAlmoxarifado->nome_local ?><br>
                                            <small>
                                                <?= $lsSelectselectVinculosPeloId->nome_prefeitura ?><br> 
                                                <?= $lsSelectselectVinculosPeloId->nome_secretaria ?><br> 
                                                <u><?= $lsSelectselectVinculosPeloId->nome_diretoria ?></u>
                                            </small>
                                        </td>
                                        <td>
                                            <? $selectSolicitantes = selectSolicitantes($lsSelectAlmoxarifado->id_almoxarifado); ?>
                                            <? while($lsSelectSolicitante = mysqli_fetch_object($selectSolicitantes)): ?>
                                            <small><?= $lsSelectSolicitante->nome_solicitante ?></small><br>
                                            <?
                                            $lsSelectSolicitante = null;
                                            endwhile;
                                            unset($selectSolicitantes);
                                            gc_collect_cycles();
                                            ?>
                                        </td>
                                    </tr>                
                                <? endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End of card-body -->
            </div>
            <!-- End of collapse-historico -->
        </div>
        <!-- End of card shadow mb-4" -->
    </div>
    <!-- End of col-md-12 -->
</div>
<!-- End of row -->

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable-historico').DataTable();
    });
</script>