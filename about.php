<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/arrays.php';
require_once __DIR__.'/classes/MyExtension.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/templates',
    __DIR__.'/layouts',
]);
$twig = new Twig_Environment($loader);
$twig->addExtension(new MyExtension());
$title = 'О нас';

echo $twig->render('about.html', [
    'title' => $title,
]);