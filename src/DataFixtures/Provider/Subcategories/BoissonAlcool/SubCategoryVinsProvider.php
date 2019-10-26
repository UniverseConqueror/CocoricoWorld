<?php

namespace App\DataFixtures\Provider\Subcategories\BoissonAlcool;

use Faker\Provider\Base;


class SubCategoryVinsProvider extends Base
{
    protected static $vinsArray = [
        
        'Bordeaux Rouge',
        'Alsace Blanc',
        'Anjou Rosé',
    ];
   
    public static function randomSubCategoryVins()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$vinsArray);
    }

    public static function categories() 
    {
        return static::$vinsArray;
    }



   
}