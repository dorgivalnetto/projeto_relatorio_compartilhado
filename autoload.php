<?php

// Autoload
spl_autoload_register(function($class) {

    $ds = DIRECTORY_SEPARATOR;

    $file = __DIR__ . $ds . str_replace('\\', $ds, $class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require __DIR__ . '/libs/funcsRelatorio.php';
require __DIR__ . '/libs/funcsConfiguracoes.php';
require __DIR__ . '/libs/funcsContratos.php';
require __DIR__ . '/libs/funcsFolhaPagamento.php';
require __DIR__ . '/libs/funcsGeneral.php';
require __DIR__ . '/libs/funcsLicitacaoCompraDireta.php';
require __DIR__ . '/libs/funcsLicitacaoCompraDiretaAux.php';
require __DIR__ . '/libs/funcsOrdemJudicial.php';
require __DIR__ . '/libs/funcsPainelBI.php';
require __DIR__ . '/libs/funcsPermissoes.php';
require __DIR__ . '/libs/funcsProfile.php';
require __DIR__ . '/libs/funcsProcessos.php';
require __DIR__ . '/libs/funcsRegistrosBeneficios.php';
require __DIR__ . '/libs/route.php';