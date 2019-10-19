<?php

namespace App\DataFixtures\Provider\Subcategories\FruitLegume;

use Faker\Provider\Base;


class SubCategoryHerbeProvider extends Base
{
    protected static $herbesArray = [
        
        'basilic',
        'ciboulette',
        'coriandre',
        
    ];
   
    public static function randomSubCategoryHerbes()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$herbesArray);
    }

    public static function categories() 
    {
        return static::$herbesArray;
    }



   
}