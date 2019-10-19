<?php

namespace App\DataFixtures\Provider\Subcategories\FruitLegume;

use Faker\Provider\Base;


class SubCategoryFruitProvider extends Base
{
    protected static $fruitsArray = [
        
        'pomme',
        'poire',
        'orange',
        
    ];
   
    public static function randomSubCategoryFruits()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$fruitsArray);
    }

    public static function categories() 
    {
        return static::$fruitsArray;
    }



   
}