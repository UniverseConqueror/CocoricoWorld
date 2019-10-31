<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryEpicerieSaleeProvider extends Base
{
    protected static $epicerieSaléeArray = [
        
        'Huiles',
        'Sel et poivres',
        'Bocaux',
                
    ];

    protected static $epicerieSaleeImages = [
        'oil.jpg',
        'sel-et-poivres.jpg',
        'bocaux.jpg',
    ];
   
    public static function randomCategoryEpicerieSalée()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$epicerieSaléeArray);
    }

    public static function Categories() 
    {
        return static::$epicerieSaléeArray;
    }

    public static function images()
    {
        return self::$epicerieSaleeImages;
    }
}