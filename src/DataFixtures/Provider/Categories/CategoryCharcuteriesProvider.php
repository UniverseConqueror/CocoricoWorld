<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryViandesProvider extends Base
{
    protected static $charcuteriesArray = [
        
        'Boeuf',
        'Veau',
        'Agneau',
                
    ];
   
    public static function randomCategoryCharcuteries()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$charcuteriesArray);
    }

    public static function Categories() 
    {
        return static::$charcuteriesArray;
    }



   
}