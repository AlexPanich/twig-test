<?php

function __autoload($classname) {

}
require_once __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
                            __DIR__.'/templates',
                            __DIR__.'/layouts',
                            ]);
$twig = new Twig_Environment($loader);

$title = 'Главная страница';

echo $twig->render('index.html', [
    'title' => $title,
]);