<?php

namespace App\DataFixtures\Provider\Subcategories\BoissonSansAlcool;

use Faker\Provider\Base;


class SubCategoryBioProvider extends Base
{
    protected static $bioArray = [
        
        'Jus de pomme ',
        'Jus de groseille',
        'Jus de framboise',
    ];
   
    public static function randomSubCategoryBio()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$bioArray);
    }

    public static function categories() 
    {
        return static::$bioArray;
    }



   
}