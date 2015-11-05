<?php



require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/arrays.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/templates',
    __DIR__.'/layouts',
]);
$twig = new Twig_Environment($loader);

$title = 'Наши товары';




echo $twig->render('goods.html',[
    'title' => $title,
    'goods' => $goods,


]);