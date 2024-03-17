<?
// SO ENTRA AQUI TB SE ESTIVER LOGADO
protegePagina();
// PUXA AS PERMISSOES
permissao('relatoriofinal');
?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Relatório Final</h1>
    <p class="mb-4">Preencha o Relatório Final da ação X.</p>


    <!-- SOBRE A AÇÃO -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Título da Ação de Extensão</h5>
            <h6 class="m-0 font-weight-light text-secondary"> Informe o título completo do Programa/Projeto de Extensão. (Deve ser obrigatoriamente o mesmo apresentado no formulário de Cadastro) </h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <form role="form" action="controller/relatoriofinal.php" method="post" enctype="multipart/form-data">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="nomeAcao">Título da Ação</label>
                        <input type="text" class="form-control" id="nomeAcao" name="nomeAcao" placeholder="PUXAR DO BANCO" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tipoAcao">Tipo da Ação</label>
                        <input type="text" class="form-control" id="tipoAcao" name="tipoAcao" placeholder="PUXAR DO BANCO" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="modalidadeAcao">Modalidade da Ação</label>
                        <input type="text" class="form-control" id="modalidadeAcao" name="modalidadeAcao" placeholder="Fluxo Contínuo" disabled>
                    </div>
                </div>                  
            </div>
        </div>
    </div>

    <!-- SOBRE O COORDENADOR DA ACAO -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Dados do Coordenador/Tutor da Ação de Extensão</h5>
            <!-- h6 class="m-0 font-weight-light text-secondary"> Informe o título completo do Programa/Projeto de Extensão. (Deve ser obrigatoriamente o mesmo apresentado no formulário de Cadastro) </h6 -->
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="nomeCoordenador">Nome</label>
                        <input type="text" class="form-control" id="nomeCoordenador" name="nomeCoordenador" placeholder="PUXAR DO BANCO" disabled>
                    </div>

                    <!-- SE É DOCENTE OU TÉCNICO ADMINISTRATIVO -->
                    <div class="form-group col-md-4">
                        <label for="tipoMembro">Perfil</label>
                        <input type="text" class="form-control" id="tipoMembro" name="tipoMembro" placeholder="PUXAR DO BANCO" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="siapeCoordenador">SIAPE</label>
                        <input type="text" class="form-control" id="siapeCoordenador" name="siapeCoordenador" placeholder="PUXAR DO BANCO" disabled>
                    </div>

                </div>                  
                </form>
            </div>
        </div>
    </div>

</div>