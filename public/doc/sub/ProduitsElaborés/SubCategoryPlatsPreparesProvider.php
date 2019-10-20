<?php

namespace App\DataFixtures\Provider\Subcategories\ProduitsElaborés;

use Faker\Provider\Base;


class SubCategoryPlatsPreparesProvider extends Base
{
    protected static $platsPreparesArray = [
        
        'Régionaux',
        'Nationaux',
    ];
   
    public static function randomSubCategoryPlatsPrepares()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$platsPreparesArray);
    }

    public static function categories() 
    {
        return static::$platsPreparesArray;
    }



   
}