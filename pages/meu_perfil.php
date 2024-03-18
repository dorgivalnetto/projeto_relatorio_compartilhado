      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><?= pegaNome() ?>, você está editando o seu Perfil</h1>
            
            <!-- Formulário Adicionar -->
            <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="">
                    <!-- <form> -->
                    <form role="form" action="controller/updateProfile.php" method="post" enctype="multipart/form-data">

<!--                       <div class="input-wrapper">
                        <div class="profile-picture">
                          <input class="picture-input" name="picture" id="picture" type="file" accept=".png, .jpg, .jpeg" />
                          <label class="picture-label" for="picture"><i class="fas fa-pen"></i></i></label>
                          <p class="profile-letter" id="profile-image"></p>
                        </div>
                      </div> -->
                      <?
                      $selectMyProfile = selectMyProfile($_SESSION['usuarioID']);
                      $lsSelectMyProfile = mysqli_fetch_object($selectMyProfile);
                      ?>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="input-name">Nome</label>
                          <input type="text" class="form-control" id="input-name" value="<?= $lsSelectMyProfile->nomeUsuario ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="login">Email</label>
                          <input type="text" class="form-control" id="login" name="login" value="<?= $lsSelectMyProfile->loginUsuario ?>" required>
                        </div>
                      <!-- </div> -->

                      <!-- <div class="form-row"> -->
                        <div class="form-group col-md-4">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="" required>
                        </div>
                      </div>
                      <input type="hidden" id="idUsu" name="idUsu" value="<?= $_SESSION['usuarioID'] ?>">
                      <input type="hidden" id="senhaEmDB" name="senhaEmDB" value="<?= $lsSelectMyProfile->senhaUsuario ?>">

                      <button type="submit" class="btn btn-warning">Alterar</button>
                    </form>
                  </div>
                </div>
            </div>

          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
  </div>
