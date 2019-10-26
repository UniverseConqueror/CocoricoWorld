<?php

namespace App\DataFixtures\Provider\Subcategories\Charcuterie;

use Faker\Provider\Base;


class SubCategoryJambonsProvider extends Base
{
    protected static $jambonsArray = [
        
        'Jambon cru fumé',
        'Jambon blanc fumé',
        'Lardons fumés',
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