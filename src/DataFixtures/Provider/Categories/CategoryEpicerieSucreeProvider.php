<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryEpicerieSucreeProvider extends Base
{
    protected static $epicerieSucréeArray = [
        
        'Gateaux',
        'Confitures',
        'Confiseries',
                
    ];

    protected static $epicerieSucreeImages = [
        'gateaux.jpg',
        'confiture.jpg',
        'confiseries.jpg',
    ];
   
    public static function randomCategoryEpicerieSucrée()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$epicerieSucréeArray);
    }

    public static function Categories() 
    {
        return static::$epicerieSucréeArray;
    }

    public static function images()
    {
        return self::$epicerieSucreeImages;
    }
}