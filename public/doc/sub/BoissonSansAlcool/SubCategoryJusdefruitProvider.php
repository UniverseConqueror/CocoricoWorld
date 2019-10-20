<?php

namespace App\DataFixtures\Provider\Subcategories\BoissonSansAlcool;

use Faker\Provider\Base;


class SubCategoryJusdefruitProvider extends Base
{
    protected static $jusdefruitArray = [
        
        'Jus de raisin',
        'Jus d\'orange',
        'Jus de tomate',
    ];
   
    public static function randomSubCategoryJusdefruit()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$jusdefruitArray);
    }

    public static function categories() 
    {
        return static::$jusdefruitArray;
    }



   
}