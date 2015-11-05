<?php
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/arrays.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/templates',
    __DIR__.'/layouts',
]);

$twig = new Twig_Environment($loader);

$title = 'Карточка товара';

if (isset($_GET['id'])) {
    $item = $goods[(int)$_GET['id'] - 1];
} else {
    $title = 'Товар не найден';
    $item = false;
}

echo $twig->render('card.html',[
    'title' => $title,
    'item' => $item,
]);
