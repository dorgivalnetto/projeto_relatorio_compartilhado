<?
//TRAZ AS PERMISSÕES PELO ID DO USER
$idUsu = $_SESSION['usuarioID'];
$selectPermissoesPorIdUser = selectPermissoesPorIdUser($idUsu);
$lsSelectPermissoesPorIdUser = mysqli_fetch_object($selectPermissoesPorIdUser);            
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="indexLogado.php?page=dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-regular fa-memo-pad"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Relatórios PROEX</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link"  href="indexLogado.php?page=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <i class="fa-duotone fa-house"></i>
            <span>Início</span>
        </a>
    </li>

    <!-- Nav Item - Relatorios -->
    <li class="nav-item active">
        <a class="nav-link"  href="indexLogado.php?page=relatorios">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <i class="fa-duotone fa-house"></i>
            <span>Relatórios</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Configurações
    </div>

    <? if($lsSelectPermissoesPorIdUser->usuarios == 0): echo ""; else: ?>

        <!-- Nav Item - Usuários -->
        <li class="nav-item">
            <a class="nav-link" href="?page=usuarios">
                <i class="fas fa-fw fa-users"></i>
                <span>Usuários</span>
            </a>
        </li>

    <? endif; ?>

    <? if (($lsSelectPermissoesPorIdUser->configuracoes_prefeituras == 0) AND 
        ($lsSelectPermissoesPorIdUser->configuracoes_secretarias == 0) AND 
        ($lsSelectPermissoesPorIdUser->configuracoes_diretorias == 0) AND 
        ($lsSelectPermissoesPorIdUser->configuracoes_estrutura == 0)): echo ""; else: ?>

        <!-- Nav Item - Configurações -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfiguracoes"
                aria-expanded="true" aria-controls="collapseConfiguracoes">
                <i class="fas fa-fw fa-cog"></i>
                <span>Configurações</span>
            </a>
            <div id="collapseConfiguracoes" class="collapse" aria-labelledby="headingConfiguracoes" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Ambiente EGP:</h6>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_prefeituras == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_prefeituras">Prefeituras</a>
                    <? endif; ?>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_secretarias == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_secretarias">Secretarias</a>
                    <? endif; ?>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_diretorias == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_diretorias">Diretorias</a>
                    <? endif; ?>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_estrutura == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_estrutura">Estrutura Organizacional</a>
                    <? endif; ?>

                    <h6 class="collapse-header">Recursos Humanos:</h6>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_servidores == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_servidores">Servidores</a>
                    <? endif; ?>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_cargos == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_cargos">Cargos</a>
                    <? endif; ?>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_lotacoes == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_lotacoes">Lotações</a>
                    <? endif; ?>

                    <? if ($lsSelectPermissoesPorIdUser->configuracoes_vinculos == 0): echo ""; else: ?>
                        <a class="collapse-item" href="?page=configuracoes_vinculos">Vínculos</a>
                    <? endif; ?>
                </div>
            </div>
        </li>

    <? endif; ?>

    <!-- Nav Item - Sair -->
    <li class="nav-item">
        <a class="nav-link" href="?page=logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Sair</span>
        </a>
    </li>  

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="?page=meu_perfil" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= pegaNome(); ?></span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
