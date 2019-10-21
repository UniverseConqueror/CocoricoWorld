<?php

namespace App\DataFixtures\Provider\Subcategories\BoissonAlcool;

use Faker\Provider\Base;


class SubCategoryCidreProvider extends Base
{
    protected static $cidreArray = [
        
        'Normand brut',
        'Normand demi sec',
        'Normand sec',
    ];
   
    public static function randomSubCategoryCidre()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$cidreArray);
    }

    public static function categories() 
    {
        return static::$cidreArray;
    }



   
}