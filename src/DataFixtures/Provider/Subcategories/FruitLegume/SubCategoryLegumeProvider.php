<?php

namespace App\DataFixtures\Provider\Subcategories\FruitLegume;

use Faker\Provider\Base;


class SubCategoryLegumeProvider extends Base
{
    protected static $legumesArray = [
        
        'tomate',
        'courgette',
        'pomme de terre',
        
    ];
   
    public static function randomSubCategoryLegumes()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$legumesArray);
    }

    public static function categories() 
    {
        return static::$legumesArray;
    }



   
}