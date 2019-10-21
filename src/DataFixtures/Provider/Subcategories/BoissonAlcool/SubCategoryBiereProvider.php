<?php

namespace App\DataFixtures\Provider\Subcategories\BoissonAlcool;

use Faker\Provider\Base;


class SubCategoryBiereProvider extends Base
{
    protected static $biereArray = [
        
        'Blonde',
        'Brune',
        'Ambrée',
    ];
   
    public static function randomSubCategoryBiere()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$biereArray);
    }

    public static function categories() 
    {
        return static::$biereArray;
    }



   
}