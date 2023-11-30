<!-- DataTales Example -->
<div class="card shadow mb-4">    
    <? if (isset($periodo)): ?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-danger">
                <? if ($periodo == 1): echo $totalAlmoxarifadoSemana; endif; ?>
                <? if ($periodo == 2): echo $totalAlmoxarifadoMes; endif;  ?>
                <small>Movimentações de Almoxarifado Feitas
                <?= $msg2 ?></small>
            </h6>
        </div>
    <? else: ?>
        <div class="card-header py-3">
            <!--<h6 class="m-0 font-weight-bold text-primary"><?//= totalAlmoxarifado() ?> Movimentações de Almoxarifado Feitas</h6>-->
        </div>
    <? endif; ?>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    //while($lsSelectAlmoxarifado = mysqli_fetch_object($selectAlmoxarifado)):
                    ?>
                        <tr>
                            <td><small><?= $lsSelectAlmoxarifado->id_almoxarifado ?></small></td>
                            <td>
                                <!--<small><a href="?page=formularios_almoxarifado_detalhe&as=<?//= base64_encode($lsSelectAlmoxarifado->id_almoxarifado) ?>"><?//= totalPatrimoniosIdAlmoxarifado($lsSelectAlmoxarifado->id_almoxarifado) ?> itens neste termo.</a></small>-->
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
                                <ul>
                                    <? 
                                    //$selectSolicitantes = selectSolicitantes($lsSelectAlmoxarifado->id_almoxarifado);
                                    //while($lsSelectSolicitante = mysqli_fetch_object($selectSolicitantes)): ?>
                                    <!--    <li><small><?//= $lsSelectSolicitante->nome_solicitante ?></small></li>
                                    <?
                                    //    $lsSelectSolicitante = null;
                                    //endwhile;
                                    //unset($selectSolicitantes);
                                    //gc_collect_cycles();
                                    ?>
                                </ul>
                            </td>
                        </tr>                
                    <? //endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>