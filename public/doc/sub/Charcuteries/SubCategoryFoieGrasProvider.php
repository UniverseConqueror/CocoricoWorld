<?php

namespace App\DataFixtures\Provider\Subcategories\Charcuteries;

use Faker\Provider\Base;


class SubCategoryFoieGrasProvider extends Base
{
    protected static $foieGrasArray = [
        
        'Canard cru',
        'Oie cru',
        'Canard mi cuit',
        'Oie mi cuit',
        
    ];
   
    public static function randomSubCategoryFoieGras()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$foieGrasArray);
    }

    public static function categories() 
    {
        return static::$foieGrasArray;
    }



   
}