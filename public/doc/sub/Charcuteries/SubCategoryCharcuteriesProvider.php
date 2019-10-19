<?php

namespace App\DataFixtures\Provider\SubCategories;

use Faker\Provider\Base;


class SubCategoryCharcuteriesProvider extends Base
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