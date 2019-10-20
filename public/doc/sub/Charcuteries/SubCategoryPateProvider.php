<?php

namespace App\DataFixtures\Provider\Subcategories\Charcuteries;

use Faker\Provider\Base;


class SubCategoryPateProvider extends Base
{
    protected static $pateArray = [
        
        'Pâté de canard',
        'Pâté de lapin',
        'Pâté de caille',
    ];
   
    public static function randomSubCategoryPate()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$pateArray);
    }

    public static function categories() 
    {
        return static::$pateArray;
    }



   
}