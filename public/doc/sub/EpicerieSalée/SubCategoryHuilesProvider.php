<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSalée;

use Faker\Provider\Base;


class SubCategoryHuilesProvider extends Base
{
    protected static $huilesArray = [
        
        'Colza',
        'Tournesol',
        'Sésame',
    ];
   
    public static function randomSubCategoryHuiles()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$huilesArray);
    }

    public static function categories() 
    {
        return static::$huilesArray;
    }



   
}