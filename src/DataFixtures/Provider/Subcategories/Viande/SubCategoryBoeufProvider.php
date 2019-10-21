<?php

namespace App\DataFixtures\Provider\Subcategories\Viande;

use Faker\Provider\Base;


class SubCategoryBoeufProvider extends Base
{
    protected static $boeufArray = [
        
        'Filet',
        'Entrecôte',
        'Bavette',
        
    ];
   
    public static function randomSubCategoryBoeuf()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$boeufArray);
    }

    public static function categories() 
    {
        return static::$boeufArray;
    }



   
}