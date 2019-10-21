<?php

namespace App\DataFixtures\Provider\Subcategories\Mer;

use Faker\Provider\Base;


class SubCategoryCoquillageProvider extends Base
{
    protected static $coquillagesArray = [
        
        'Huîtres',
        'Moules',
        'Bigorneaux',
        
    ];
   
    public static function randomSubCategoryCoquillage()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$coquillagesArray);
    }

    public static function categories() 
    {
        return static::$coquillagesArray;
    }



   
}