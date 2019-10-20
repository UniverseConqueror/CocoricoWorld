<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSucrée;

use Faker\Provider\Base;


class SubCategoryGateauxProvider extends Base
{
    protected static $gateauxArray = [
        
        'Entremet',
        'Gateaux d\'anniversaire',
        'Gateaux secs',
    ];
   
    public static function randomSubCategoryGateaux()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$gateauxArray);
    }

    public static function categories() 
    {
        return static::$GateauxArray;
    }



   
}