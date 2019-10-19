<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryViandesProvider extends Base
{
    protected static $viandesArray = [
        
        'Boeuf',
        'Veau',
        'Agneau',
                
    ];
   
    public static function randomCategoryViandes()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$viandesArray);
    }

    public static function Categories() 
    {
        return static::$viandesArray;
    }



   
}