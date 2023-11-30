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
            <h2 class="h4 mb-2 text-red-800 text-danger">Servidores</h2>
            <p class="mb-4"><small>Gerenciamentos dos servidores das prefeituras.</small></p>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Adicionar Servidor</h6>
                        </div>
                        <div class="card-body">
                            <form role="form" action="controller/servidores/insertConfiguracoesServidor.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="matricula_servidor">Matrícula do Servidor</label>
                                        <input type="text" class="form-control" id="matricula_servidor" name="matricula_servidor" 
                                            placeholder="Digite o matrícula da servidor"required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cpf_servidor">CPF do Servidor</label>
                                        <input type="text" class="form-control cpf" id="cpf_servidor" name="cpf_servidor" 
                                            placeholder="Digite o CPF da servidor">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nome_servidor">Nome do Servidor</label>
                                        <input type="text" class="form-control" id="nome_servidor" name="nome_servidor" 
                                            placeholder="Digite o nome da servidor" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
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