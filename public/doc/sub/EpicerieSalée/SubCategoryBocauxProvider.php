<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSalée;

use Faker\Provider\Base;


class SubCategoryBocauxProvider extends Base
{
    protected static $bocauxArray = [
        
        'Plat régionaux',
        'Plat nationaux',
    ];
   
    public static function randomSubCategoryBocaux()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$bocauxArray);
    }

    public static function categories() 
    {
        return static::$bocauxArray;
    }



   
}