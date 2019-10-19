<?php

namespace App\DataFixtures\Provider\Subcategories;

use Faker\Provider\Base;


class SubCategoryPoissonProvider extends Base
{
    protected static $poissonsArray = [
        
        'Bar',
        'Sole',
        'Raie',
        
    ];
   
    public static function randomSubCategoryPoissons()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$poissonsArray);
    }

    public static function categories() 
    {
        return static::$poissonsArray;
    }



   
}