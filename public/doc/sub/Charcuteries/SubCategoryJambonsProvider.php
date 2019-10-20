<?php

namespace App\DataFixtures\Provider\Subcategories\Charcuteries;

use Faker\Provider\Base;


class SubCategoryJambonsProvider extends Base
{
    protected static $jambonsArray = [
        
        'Jambon cru fumè',
        'Jambon blanc fumè',
        'Lardons fumès',
    ];
   
    public static function randomSubCategoryJambons()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$jambonsArray);
    }

    public static function categories() 
    {
        return static::$jambonsArray;
    }



   
}