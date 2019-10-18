<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryFruitsLegumesProvider extends Base
{
    protected static $fruitsLegumes = [
        
        'Fruits',
        'Légumes',
        'Herbes aromatiques',
        'Légumes Secs'
        
    ];

   
    public static function randomCategoryFruitsLegumes()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$fruitsLegumes);
    }

   
}