<?php

namespace App\DataFixtures\Provider\Subcategories\FruitLegume;

use Faker\Provider\Base;


class SubCategoryLegumeSecProvider extends Base
{
    protected static $legumeSecArray = [
        
        'Lentilles',
        'Pois Cassés',
        'Haricots rouges',
        
    ];
   
    public static function randomSubCategoryLegumeSec()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$legumeSecArray);
    }

    public static function categories() 
    {
        return static::$legumeSecArray;
    }



   
}