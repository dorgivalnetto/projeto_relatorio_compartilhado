<?
// INSERT SAFETY GUIDELINES
require 'seguranca.php';

// TESTA O PARAMETRO QUE VEM NO _GET. CASO VENHA VAZIO CAI NO DEFAULT DO SWITCH
$getDaPagina = isset($_GET['page'])? $_GET['page']:'';

// AUTOLOAD FUNCTIONS
require 'autoload.php';

// INSERT HEADER
require 'common/header.php';

// INSERT MENU AT LEFT SIDE
require 'common/menuLeft.php';

// FUNÇÃO QUE MONTA O CONTAINER PELO _GET
rota($getDaPagina);

// INSERT FOOTER
require 'common/footer.php';
?>