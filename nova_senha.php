<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PROEX Relatórios - Recuperação de Senha</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
  </head>

  <body class="bg-gradient-primary">

    <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-md-6">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-12 text-center">
                  <img src="img/logoEGP.jpg" style="max-width: 45%;">
                </div>
                <div class="col-12">
                  <div class="text-center">
                    <h2 class="h4 text-gray-700 mb-3">Recuperação de Senha de usuário</h2>
                    <p class="mb-3">Para sua segurança crie uma nova senha</p>
                  </div>
                  <? if(isset($_GET['msg_erro'])): ?>
                    <? if($_GET['msg_erro'] == '1'): ?>
                    <div class="alert alert-warning alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      A Requisição para troca de senha não existe
                    </div>
                    <? elseif($_GET['msg_erro'] == '2'): ?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Essa Requisição já foi utilizada
                      </div>
                    <? elseif($_GET['msg_erro'] == '3'): ?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        O tempo dessa Requisição expirou
                      </div>
                    <? elseif($_GET['msg_erro'] == '4'): ?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        As senhas digitadas estão diferentes
                      </div>
                    <? elseif($_GET['msg_erro'] == '5'): ?>
                      <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Houve um erro ao atualizar sua senha. Tente Novamente.
                      </div>
                    <? endif; ?>
                  <? endif; ?>
                  <hr>
                  <form class="user" action="controller/updateSenha.php" method="post" enctype="multipart/form-data">
                    <input name="id" value="<? if(isset($_GET['id'])) echo($_GET['id']); ?>" hidden>
                    <input name="auth" value="<? if(isset($_GET['auth'])) echo($_GET['auth']); ?>" hidden>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="senha" name="senha"
                      aria-describedby="senha" placeholder="Digite uma nova Senha" required autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="senhaConfirm"
                      name="senhaConfirm" placeholder="Confirme sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block mb-4">Confirmar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

  </body>

</html>
