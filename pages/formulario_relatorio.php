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
                        <input type="text" class="form-control" id="nomeAcao" name="nomeAcao" placeholder="<?= selectAcaoPeloCoordenador($_SESSION['usuarioID'])->tituloAcao ?>" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tipoAcao">Tipo da Ação</label>
                        <input type="text" class="form-control" id="tipoAcao" name="tipoAcao" placeholder="<?= selectAcaoPeloCoordenador($_SESSION['usuarioID'])->nome_Tipo ?>" disabled>
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
                        <input type="text" class="form-control" id="nomeCoordenador" name="nomeCoordenador" placeholder="<?= selectAcaoPeloCoordenador($_SESSION['usuarioID'])->nomeUsuario ?>" disabled>
                    </div>

                    <!-- SE É DOCENTE OU TÉCNICO ADMINISTRATIVO -->
                    <div class="form-group col-md-4">
                        <label for="tipoMembro">Perfil</label>
                        <input type="text" class="form-control" id="tipoMembro" name="tipoMembro" placeholder="<?= selectAcaoPeloCoordenador($_SESSION['usuarioID'])->nomeTipo ?>" disabled>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="siapeCoordenador">SIAPE</label>
                        <input type="text" class="form-control" id="siapeCoordenador" name="siapeCoordenador" placeholder="<?= selectAcaoPeloCoordenador($_SESSION['usuarioID'])->siapeUsuario ?>" disabled>
                    </div>

                </div>                  
            </div>
        </div>
    </div>

    <!-- DETALHAMENTO DAS ATIVIDADES -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Detalhamento das Atividades</h5>
            <h6 class="m-0 font-weight-light text-secondary">Para cada atividade, coloque um número identificador e sua descrição.</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">

                    <div class="form-group">
                        <label for="atvRealizadas">Liste e Descreva as Atividades Realizadas</label>
                        <textarea class="form-control" id="atvRealizadas" rows="4" name="atvRealizadas" placeholder="Atividade X - Tour pelas áreas da UFCA feito para alunos da escola Y." required></textarea>
                    </div>

                </div>                  
            </div>
        </div>
    </div>

    <!-- LOCAIS DAS ATIVIDADES -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Locais das Atividades</h5>
            <h6 class="m-0 font-weight-light text-secondary">Para cada atividade respondida na questão anterior, digite o local onde ela foi realizada ou então ou então envie o link do local onde a atividade foi realizada seguindo este  <a href="https://docs.google.com/document/d/1PrhWLiudy-u_U8Spk1aJJceEwC6iJtY9J2uvUhIAgxg/edit?usp=sharing"><b>guia</b></a>.</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">

                    <div class="form-group">
                        <label for="locaisAtividades">Liste e Descreva os Locais das Atividades Realizadas.</label>
                        <textarea class="form-control" id="locaisAtividades" rows="4" name="locaisAtividades" placeholder="Atividade X - Universidade Federal do Cariri, CE, Juazeiro do Norte, Cidade Universitária." required></textarea>
                    </div>

                </div>                  
            </div>
        </div>
    </div>

        <!-- IDENTIFICAÇÃO E QUANTITATIVO DO PÚBLICO BENEFICIADO -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Identificação e Quantitativo do Público Beneficiado</h5>
            <h6 class="m-0 font-weight-light text-secondary">Descrever o número de pessoas da comunidade acadêmica da UFCA e/ou da comunidade externa à UFCA beneficiadas pela ação de extensão. <b>Não consideramos neste número, métricas de redes sociais, como seguidores do instagram ou assinantes do canal do Youtube.</b> Estas estarão contempladas em um item mais adiante neste formulário.</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="publicoInterno">Total do público <b>interno</b> à UFCA <br> <small>Quantitativo de pessoas da comunidade acadêmica (docentes, discentes e técnicos terceirizados) que foram beneficiadas pela ação.</small></label>
                            <input type="text" class="form-control" id="publicoInterno" name="publicoInterno" placeholder="" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="publicoExterno">Total do público <b>externo</b> à UFCA <br> <small>Quantitativo de pessoas da comunidade externa (qualquer pessoa que não ocupe uma função na UFCA) que foram beneficiadas.</small></label>
                            <input type="text" class="form-control" id="publicoExterno" name="publicoExterno" placeholder="" required>
                        </div>

                    </div>
                </div>                  
            </div>
        </div>
    </div>

    <!-- AVANÇOS ALCANÇADOS E IMPACTOS DA AÇÃO EXTENSIONISTA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Avanços Alcançados e Impactos da Ação Extensionista</h5>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">

                    <div class="form-group">
                        <label for="impactosAcao">Descreva os avanços alcançados e impactos da ação extensionista</label>
                        <textarea class="form-control" id="impactosAcao" rows="4" name="impactosAcao" placeholder="" required></textarea>
                    </div>
                </div>                  
            </div>
        </div>
    </div>

    <!-- PARCERIAS PLANILHA!!!!! -->

    <!-- AÇÕES VINCULADAS AO PROGRAMA DE EXTENSÃO -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Ações Vinculadas ao Programa de Extensão</h5>
            <h6>Descrever o conjunto de ações (projetos, cursos, eventos e prestação de serviço) que se articulam ao programa de extensão. <b>Item exclusivo para PROGRAMAS</b>.</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">
                    <div class="row">

                        <div class="form-group col-md-8">
                            <label for="acoesVinculadas">Liste os títulos das Ações que se articulam ao Programa de Extensão</label>
                            <textarea class="form-control" id="acoesVinculadas" rows="4" name="acoesVinculadas" placeholder="" required></textarea>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="escPublica">Perfil</label>                    
                            <select id="escPublica" name="escPublica" class="custom-select">
                            <option value="0"></option>
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="parceriaInternacional">A Ação estabeleceu parceria <b>internacional</b>? Se sim, descreva</label>
                        <textarea class="form-control" id="parceriaInternacional" rows="4" name="parceriaInternacional" placeholder="" required></textarea>
                    </div>

                </div>                  
            </div>
        </div>
    </div>

    <!-- A AÇÃO ATUOU COM O DESENVOLVIMENTO DE ALGUMA TECNOLOGIA SOCIAL? -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Tecnologia Social</h5>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">

                    <div class="form-group">
                        <label for="tecnologiaSocial">A Ação atuou com o Desenvolvimento de alguma Tecnologia Social? Se sim, descreva</label>
                        <textarea class="form-control" id="tecnologiaSocial" rows="4" name="tecnologiaSocial" placeholder="" required></textarea>
                    </div>
                </div>                  
            </div>
        </div>
    </div>

    <!-- REDES SOCIAIS CRIADAS PARA O PROGRAMA/PROJETO -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Redes Sociais criadas para o Programa/Projeto</h5>
            <h6>Para cada rede social, digite o link da rede social seguido do número de assinantes ou seguidores.</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">

                    <div class="form-group">
                        <label for="redesSociais">Liste os dados das redes sociais criadas para o programa/projeto:</label>
                        <textarea class="form-control" id="redesSociais" rows="4" name="redesSociais" placeholder="Exemplo: @ufcaoficial - 37,4 mil seguidores" required></textarea>
                    </div>
                </div>                  
            </div>
        </div>
    </div>

    <!-- DISPOSIÇÕES FINAIS -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Disposições Finais</h5>
            <h6>Para o espaço das fotos, ponha as imagens em uma pasta do Google Drive e coloque o link. As imagens poderão ser utilizadas em materiais de divulgação da PROEX. Nomeie as fotos no seguinte padrão: foto1, foto2, foto3, ..., fotoN.</h6>
        </div>
        <div class="card-body">
            <div id="create-user-main-form" class="">
                <div class="form">

                    <div class="form-group">
                        <label for="avaliacaoMonitoramento">Como a equipe avalia este instrumento de monitoramento? Sugere a abordagem de alguma questão que não esteve aqui ou que seja abordado de outra forma? Tem mais alguma crítica e/ou sugestões que deseja fazer à equipe da PROEX?</label>
                        <textarea class="form-control" id="avaliacaoMonitoramento" rows="4" name="avaliacaoMonitoramento" placeholder="" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="fotoLinkDrive">Inclua em uma pasta no Google Drive pelo menos <b>três (03)</b> imagens das atividades realizadas no projeto/programa (envolvendo a comunidade externa) e cole o link para a pasta no campo abaixo.</label>
                        <input type="text" class="form-control" id="fotoLinkDrive" name="fotoLinkDrive" placeholder="" required>
                    </div>

                    <div class="form-group">
                        <label for="avaliacaoMonitoramento">Com relação às imagens submetidas na pergunta anterior, informe aqui as legendas de cada um informando local, data e descrição da atividade.</label>
                        <textarea class="form-control" id="avaliacaoMonitoramento" rows="4" name="avaliacaoMonitoramento" placeholder="Foto 1 - Participação no evento X no Colégio Y do município Z. XX/XX/202X" required></textarea>
                    </div>

                </div>                  
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Relatório Final</button>

            </form>
        </div>
    </div>

</div>