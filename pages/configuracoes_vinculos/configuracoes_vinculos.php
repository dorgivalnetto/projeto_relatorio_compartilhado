<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();

//PUXA AS PERMISSOES
permissao($_GET['page']);
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Configurações</h1>
            <h2 class="h4 mb-2 text-red-800 text-danger">Vínculos</h2>
            <p class="mb-4"><small>Gerenciamentos dos vínculos das prefeituras.</small></p>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Adicionar Vínculo</h6>
                        </div>
                        <div class="card-body">
                            <form role="form" action="controller/vinculos/insertConfiguracoesVinculo.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="codigo_vinculo">Código do Vínculo</label>
                                        <input type="text" class="form-control" id="codigo_vinculo" name="codigo_vinculo" 
                                            placeholder="Digite o código do vínculo" required>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="nome_vinculo">Nome do Vínculo</label>
                                        <input type="text" class="form-control" id="nome_vinculo" name="nome_vinculo" 
                                            placeholder="Digite o nome do vínculo" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
                            </form>
                        </div>
                    </div>

                    <? require 'configuracoes_vinculos_tabela.php'; ?>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
</div>