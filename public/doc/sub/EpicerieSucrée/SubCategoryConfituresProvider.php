<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSucrée;

use Faker\Provider\Base;


class SubCategoryConfituresProvider extends Base
{
    protected static $confituresArray = [
        
        'Gelées',
        'Confitures',
        'Marmelades',
    ];
   
    public static function randomSubCategoryConfitures()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$confituresArray);
    }

    public static function categories() 
    {
        return static::$confituresArray;
    }



   
}