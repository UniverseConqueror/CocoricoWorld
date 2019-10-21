<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSucree;

use Faker\Provider\Base;


class SubCategoryGateauProvider extends Base
{
    protected static $gateauxArray = [
        
        'Entremets',
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
        return static::$gateauxArray;
    }



   
}