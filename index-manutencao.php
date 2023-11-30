<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PROEX Relatórios Admin - Login</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="https://painel-teste.programaeficiencia.com.br/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="d-block d-sm-none text-center mb-3">
                    <img src="img/EGP_brain.jpg" width="30%">
                  </div>
                  <div class="text-center">
                    <h2 class="h4 text-gray-700 mb-4">PROEX Relatórios</h2>
                    <p class="mb-4 text-danger"><strong>EM MANUTENÇÃO.</strong></p>
                    <p class="mb-4 text-danger">Em breve estaremos online novamente!</p>
                  </div>
                  <hr>
                  <form class="user" action="controller/validaAdmin.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <input disabled type="email" class="form-control form-control-user" id="login" name="login" aria-describedby="senha" placeholder="Digite seu Email..." required autofocus>
                    </div>
                    <div class="form-group">
                      <input disabled type="password" class="form-control form-control-user" id="senha" name="senha" placeholder="Sua senha" required>
                    </div>
                    <button disabled type="submit" class="btn btn-primary btn-user btn-block">Acessar</button>
                  </form>

                  <hr>
                  <div class="text-center">
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</body>
</html>