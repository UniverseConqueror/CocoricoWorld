<?php

namespace App\DataFixtures\Provider\Subcategories\Viandes;

use Faker\Provider\Base;


class SubCategoryVeauProvider extends Base
{
    protected static $veauArray = [
        
        'Escalope',
        'Jarret',
        '1/2 veau',
        
    ];
   
    public static function randomSubCategoryVeau()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$veauArray);
    }

    public static function categories() 
    {
        return static::$veauArray;
    }



   
}