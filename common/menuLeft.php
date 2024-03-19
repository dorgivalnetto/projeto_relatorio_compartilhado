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
            <i class="fas fa-home"></i>
            <span>Início</span>
        </a>
    </li>

    <!-- Nav Item - Relatorios -->
    <li class="nav-item active">
        <a class="nav-link"  href="indexLogado.php?page=relatorios">
            <i class="fa-solid fa-book"></i>
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

    <? if($lsSelectPermissoesPorIdUser->acoes == 0): echo ""; else: ?>

        <!-- Nav Item - Ações -->
        <li class="nav-item">
            <a class="nav-link" href="?page=acoes">
                <i class="fa-solid fa-book"></i>
                <span>Cadastrar Ações</span>
            </a>
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
