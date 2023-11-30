<div class="col-md-6">
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#create-requester" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Cadastrar Equipe de Trabalho</h6>
        </a>

        <!-- Card Content - Collapse -->
        <div class="collapse" id="create-requester" >
        <div class="card-body">
            <form role="form" action="controller/patrimonios/insertAlmoxarifadoSolicitante.php" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                    <label for="tipoUsuario">Tipo de Usuário:</label>
                    <select name="tipoUsuario" id="tipoUsuario" onchange="mostrarCampos()">
                        <option value="docente">Docente</option>
                        <option value="tecnicoAdm">Técnico Administrativo</option>
                        <option value="bolsista">Bolsista</option>
                        <option value="voluntario">Voluntário</option>
                    </select><br>

                    <div class="form-row">
                        <div class="form-group" id="camposAdicionais">
                        <!-- Campos adicionais serão exibidos aqui -->
                        </div>
                    </div>
                </div>
            </form>  
        </div>
        <script>
        function mostrarCampos() {
            var tipoUsuario = document.getElementById("tipoUsuario").value;
            var container = document.getElementById("camposAdicionais");

            // Limpar campos existentes
            container.innerHTML = "";

            if (tipoUsuario === "docente") {
                container.innerHTML += '<label for="nome_membro">Nome</label>';
                container.innerHTML += '<input type="text" class="form-control" id="nome_membro" name="nome_membro" placeholder="" required>';
                container.innerHTML += '<label for="funcao">SIAPE:</label>';
                container.innerHTML += '<input type="text" class="form-control" id="siape" name="siape" placeholder="" required>';
                container.innerHTML += '<span class="text-danger"><small>somente números</small></span><br>';
                container.innerHTML += '<label for="get_id_unidAc">Unidade Acadêmica</label>';
                container.innerHTML += '<select id="get_id_unidAc[]" name="get_id_unidAc[]" class="custom-select select2"></select>';
                container.innerHTML += '<label for="get_id_curso">Curso</label>';
                container.innerHTML += '<select id="get_id_curso[]" name="get_id_curso[]" class="custom-select select2"></select>';
                container.innerHTML += '<label for="get_id_funcao">Função</label>';
                container.innerHTML += '<select id="get_id_funcao[]" name="get_id_funcao[]" class="custom-select select2"></select>';
            } else if (tipoUsuario === "tecnicoAdm"){
                container.innerHTML += '<label for="nome_membro">Nome</label>';
                container.innerHTML += '<input type="text" class="form-control" id="nome_membro" name="nome_membro" placeholder="" required>';
                container.innerHTML += '<label for="funcao">SIAPE:</label>';
                container.innerHTML += '<input type="text" class="form-control" id="siape" name="siape" placeholder="">';
                container.innerHTML += '<span class="text-danger"><small>somente números</small></span><br>';
                container.innerHTML += '<label for="get_id_funcao">Função</label>';
                container.innerHTML += '<select id="get_id_funcao[]" name="get_id_funcao[]" class="custom-select select2" required></select>';
            } else if (tipoUsuario === "bolsista") {
                container.innerHTML += '<label for="nome_membro">Nome</label>';
                container.innerHTML += '<input type="text" class="form-control" id="nome_membro" name="nome_membro" placeholder="" required>';
                container.innerHTML += '<label for="matricula">Matrícula:</label>';
                container.innerHTML += '<input type="text" class="form-control" id="matricual" name="matricula" placeholder="" required>';
                container.innerHTML += '<span class="text-danger"><small>somente números</small></span><br>';
                container.innerHTML += '<label for="curso">Curso:</label>';
                container.innerHTML += '<select id="get_id_funcao[]" name="get_id_funcao[]" class="custom-select select2" required></select>';
            } else if (tipoUsuario === "voluntario") {
                container.innerHTML += '<label for="nome_membro">Nome</label>';
                container.innerHTML += '<input type="text" class="form-control" id="nome_membro" name="nome_membro" placeholder="" required>';
                container.innerHTML += '<label for="matricula">Matrícula:</label>';
                container.innerHTML += '<input type="text" class="form-control" id="matricual" name="matricula" placeholder="" required>';
                container.innerHTML += '<span class="text-danger"><small>somente números</small></span><br>';
                container.innerHTML += '<label for="curso">Curso:</label>';
                container.innerHTML += '<select id="get_id_funcao[]" name="get_id_funcao[]" class="custom-select select2" required></select>';
                container.innerHTML += '<label for="data_inicio">Data de Início</label>';
                container.innerHTML += '<input type="date" name="data_inicio" id="data_inicio" class="input-date" required>';
                container.innerHTML += '<label for="data_termino">Data de Término</label>';
                container.innerHTML += '<input type="date" name="data_termino" id="data_termino" class="input-date" required>';
                container.innerHTML += '<label for="matricula">Carga Horária Mensal</label>';
                container.innerHTML += '<input type="text" class="form-control" id="ch_mensal" name="ch_mensal" placeholder="" required>';
            }
        }
        </script>
        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome_solicitante">Nome</label>
                            <input type="text" class="form-control" id="nome_solicitante" name="nome_solicitante" placeholder="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email_solicitante">E-mail</label>
                            <input type="email" class="form-control" id="email_solicitante" name="email_solicitante" placeholder="" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefone_solicitante">Telefone</label>
                            <input type="text" class="form-control" id="telefone_solicitante" name="telefone_solicitante" placeholder="" required>
                            <span class="text-danger"><small>somente números</small></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cpf_solicitante">CPF</label>
                            <input type="text" class="form-control" id="cpf_solicitante" name="cpf_solicitante" maxlength="11" placeholder="" required>
                            <span class="text-danger"><small>somente números</small></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar Equipe</button>
                </form>
            </div>
        </div>
    </div>
</div>