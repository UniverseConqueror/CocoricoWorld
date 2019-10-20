<?php

namespace App\DataFixtures\Provider\Subcategories\Viandes;

use Faker\Provider\Base;


class SubCategoryAgneauProvider extends Base
{
    protected static $agneauArray = [
        
        'Gigot',
        'Côtellette',
        '1/2 agneau',
        
    ];
   
    public static function randomSubCategoryAgneau()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$agneauArray);
    }

    public static function categories() 
    {
        return static::$agneauArray;
    }



   
}