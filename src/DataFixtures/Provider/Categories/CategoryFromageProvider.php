<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryFromageProvider extends Base
{
    protected static $FromagesArray = [
        
        'Fromages',
        'Cremerie',
                
    ];

    protected static $fromagesImages = [
        'fromages2.jpg',
        'cremerie.jpg',
    ];
   
    public static function randomCategoryFromages()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$FromagesArray);
    }

    public static function Categories() 
    {
        return static::$FromagesArray;
    }

    public static function images()
    {
        return self::$fromagesImages;
    }
}