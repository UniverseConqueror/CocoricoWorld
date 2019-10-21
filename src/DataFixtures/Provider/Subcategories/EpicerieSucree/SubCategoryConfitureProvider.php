<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSucree;

use Faker\Provider\Base;


class SubCategoryConfitureProvider extends Base
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