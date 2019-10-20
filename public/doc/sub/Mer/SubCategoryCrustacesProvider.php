<?php

namespace App\DataFixtures\Provider\Subcategories\Mer;

use Faker\Provider\Base;


class SubCategoryCrustacesProvider extends Base
{
    protected static $crustacesArray = [
        
        'Crabe',
        'Homard',
        'Araignée',
        
    ];
   
    public static function randomSubCategoryCrustaces()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$crustacesArray);
    }

    public static function categories() 
    {
        return static::$crustacesArray;
    }



   
}