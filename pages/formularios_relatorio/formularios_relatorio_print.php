<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>EGP Admin - Termo de Entrega de Bens</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <!-- <body class="bg-light"> -->
  <body class="bg-light" onload="window.print();">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="assets/brand/logo_pmjdo.png" alt="logo_pmjdo">
      <p>Governo Municipal de Juazeiro do Norte-CE</br>
      Secretaria de Saúde</br>
      Patrimônio
      </p>
      <h2>TERMO DE ENTREGA DE BENS PERMANENTE</h2>
    </div>
<?
include_once("../../libs/dataConfig.php");
include_once("../../autoload.php");

// Dados da url
$id_almoxarifado = is_numeric(base64_decode(trim($_GET['asdf']))) ? base64_decode(trim($_GET['asdf'])) : 0;

$selectAlmoxarifadoIdAlmoxarifado = selectAlmoxarifadoIdAlmoxarifado($id_almoxarifado);
$ls = mysqli_fetch_object($selectAlmoxarifadoIdAlmoxarifado);
// var_dump($ls);
?>
    <div class="col-md-8">
      <dl class="row">
        <dt class="col-sm-3">Unidade Requisitante</dt>
        <dd class="col-sm-9"><?= $ls->nome_local ?></dd>

        <dt class="col-sm-3">No.</dt>
        <dd class="col-sm-9"><?= $ls->num_termo ?></dd>

        <dt class="col-sm-3">Solicitantes</dt>
        <dd class="col-sm-9">
        <? 
          $selectSolicitantes = selectSolicitantes($ls->id_almoxarifado);
          $total = mysqli_num_rows($selectSolicitantes);
          $count = 0;
        ?>
        <? while($lsSolicitante = mysqli_fetch_object($selectSolicitantes)): ?>
          <?= $lsSolicitante->nome_solicitante ?><?if(!($count + 1 == $total)) echo(',')?>
        <?
          $count += 1;
          endwhile;
        ?>
        </dd>

        <dt class="col-sm-3">Data:</dt>
        <dd class="col-sm-9">
          <? $data_entrega = new DateTime($ls->data_entrega ); echo $data_entrega->format('d/m/Y'); ?>
        </dd>
      </dl>
    </div>

<p class="text-muted"><small>Este termo possui <?= totalPatrimoniosIdAlmoxarifado($ls->get_id_almoxarifado) ?> item(s)</small></p>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tombo</th>
          <th scope="col">Descrição</th>
        </tr>
      </thead>
      <tbody>
<?
$sequencia = 1;
$selectPatrimoniosIdAlmoxarifado = selectPatrimoniosIdAlmoxarifado($ls->get_id_almoxarifado);
while($ls = mysqli_fetch_object($selectPatrimoniosIdAlmoxarifado)):
?>        
        <tr>
          <th scope="row"><small><?= $sequencia ?></small></th>
          <td><small><?= $ls->num_tombo ?></small></td>
          <td><small><?= $ls->nome_do_bem ?></small></td>
        </tr>
<?
$sequencia+=1;
endwhile;
?>

      </tbody>
    </table>

    <p class="text-xs text-muted"><small>Declaro que recebi o bem conforme oficio <?= $ls->num_oficio ?> os seguintes itens.</small></p>

    <br>
    <dv class="row">
      <div class="col-md-6">

    <dl class="row">
      <dt class="col-sm-3">Recebido por:</dt>
      <dd class="col-sm-9">________________________________________</dd>

      <dt class="col-sm-3">CPF:</dt>
      <dd class="col-sm-9">________________________________________</dd>
    </dl>

      </div>  
      <div class="col-md-6">

    <dl class="row">
      <dt class="col-sm-3">Despachado por:</dt>
      <dd class="col-sm-9">________________________________________</dd>

      <dt class="col-sm-3">CPF:</dt>
      <dd class="col-sm-9">________________________________________</dd>
    </dl>

      </div>
    </div>

    </div>

  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">Rua José Marrocos, s/nº, Santa Tereza - Juazeiro do Norte, CE</p>
    <p class="mb-1">sesau@juazeiro.ce.gov.br</p>
    <p class="mb-1">www.juazeirodonorte.ce.gov.br</p>
  </footer>
</div>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
