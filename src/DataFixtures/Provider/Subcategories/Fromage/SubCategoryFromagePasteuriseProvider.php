<?php

namespace App\DataFixtures\Provider\Subcategories\Fromage;

use Faker\Provider\Base;


class SubCategoryFromagePasteuriseProvider extends Base
{
    protected static $fromagePasteurisesArray = [
        
        'Epoisse',
        'Camembert',
        'St Marcelin',
    ];
   
    public static function randomSubCategoryFromagePasteurise()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$fromagePasteurisesArray);
    }

    public static function categories() 
    {
        return static::$fromagePasteurisesArray;
    }



   
}