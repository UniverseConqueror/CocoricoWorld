<?php

namespace App\DataFixtures\Provider\Subcategories\BoissonSansAlcool;

use Faker\Provider\Base;


class SubCategoryGazeuxProvider extends Base
{
    protected static $gazeuxArray = [
        
        'Regionaux',
        'Nationaux',
        'Energisant',
    ];
   
    public static function randomSubCategoryGazeux()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$gazeuxArray);
    }

    public static function categories() 
    {
        return static::$gazeuxArray;
    }



   
}