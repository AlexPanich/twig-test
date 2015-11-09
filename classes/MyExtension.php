<?php

class MyExtension extends Twig_Extension
{
    public function getName()
    {
        return 'myExtension';
    }

    public function getGlobals()
    {
        return [
            'config' => include __DIR__.'/../config.php',
        ];
    }

    public function getFilters() {
        return [
            new Twig_SimpleFilter('priceToDollars', function($price) {
               return round($price / 64, 2);
            }),
            new Twig_SimpleFilter('priceToEuro', function($price) {
                return round($price / 74, 2);
            }),
        ];
    }

    public function getFunctions() {
        return [
          new Twig_SimpleFunction('byTag', function($goods, $tag) {
              $arr = [];
              foreach($goods as $item) {
                  if (in_array($tag, $item['tags'])) {
                      $arr[] = $item;
                  }
              }
              return $arr;
          }),
        ];
    }

    public function getTests()
    {
        return [
          new Twig_SimpleTest('adult', function($item) {
              return in_array('взрослое', $item['tags'])
                    && !in_array('детское', $item['tags']);
          })
        ];
    }

}