<? 
$alfabeto = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= totalServidores()?> Servidores Cadastradas</h6>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <? foreach ($alfabeto as $letra): ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="<?= $letra ?>-tab" data-toggle="tab" data-target="#<?= $letra ?>" type="button" 
                        role="tab" aria-controls="<?= $letra ?>" aria-selected="true" onclick="mudarTab(<?= $letra ?>)"><?= $letra ?></a>
                </li>
            <? endforeach; ?>
        </ul>
        <div class="tab-content" id="myTabContent">
            <? foreach ($alfabeto as $letra): ?>
                <div class="tab-pane fade" id="<?= $letra ?>" role="tabpanel" aria-labelledby="<?= $letra ?>-tab">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered" id="dataTable-<?= $letra ?>" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Matrícula</th>
                                    <th>Nome</th>
                                    <th>Registro</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                $servidores = json_decode(selectListaServidoresPorLetra($letra));
                                foreach ($servidores as $servidor):
                                ?>
                                <tr>
                                    <td><small><?= $servidor->matricula_servidor ?></small></td>
                                    <td width="30%"><small><a href="?page=configuracoes_servidores_editar&q=<?= base64_encode($servidor->id_servidor) ?>"><?= $servidor->nome_servidor ?></a></small></td>
                                    <td width="400px"><small>Registrado em <? $dataRegistro = new DateTime($servidor->data_register_servidor ); echo $dataRegistro->format('d/m/Y H:i'); ?> por
                                    <?= nomeUserRegistro($servidor->get_id_register) ?></small></td>
                                    <td>
                                        <form method="post" action="controller/servidores/updateStatusServidor.php" enctype="multipart/form-data">
                                            <input type="hidden" id="id_servidor" name="id_servidor" value="<?= $servidor->id_servidor ?>">
                                            <input type="hidden" id="status_servidor" name="status_servidor" value="<?= $servidor->status_servidor ?>">
                                            <input type="hidden" id="page" name="page" value="?page=configuracoes_servidores">
                                            <? if ($servidor->status_servidor == 1): ?>
                                                <button type="submit" class="btn btn-sm btn-warning"><small>Desativar</small></button>
                                            <? else: ?>
                                                <button type="submit" class="btn btn-sm btn-info"><small>Ativar</small></button>
                                            <? endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <? endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        document.getElementById('A-tab').classList.add('active');
        document.getElementById('A').classList.add('active');
        document.getElementById('A').classList.add('show');
    };

    const alfabeto = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 
        'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    $(document).ready(function() {
        for (var i = 0; i < alfabeto.length; i++) {
            console.log(alfabeto[i]);
            $('#dataTable-' + alfabeto[i]).DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "search": "Pesquisar:",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "emptyTable": "Sem dados disponíveis na tabela",
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próximo"
                    }
                }
            });
        }
    });
</script>