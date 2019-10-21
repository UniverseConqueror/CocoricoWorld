<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryFromageProvider extends Base
{
    protected static $FromagesArray = [
        
        'Fromages',
        'Cremerie',
                
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



   
}