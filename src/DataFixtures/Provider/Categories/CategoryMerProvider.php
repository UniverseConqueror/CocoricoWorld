<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryMerProvider extends Base
{
    protected static $merArray = [
        
        'Poissons',
        'Crustacés',
        'Coquillages',
                
    ];

    protected static $merImages = [
        'poissons.jpg',
        'crustaces.jpg',
        'coquillages.jpg',
    ];
   
    public static function randomCategoryMer()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$merArray);
    }

    public static function Categories() 
    {
        return static::$merArray;
    }

    public static function images()
    {
        return self::$merImages;
    }
}