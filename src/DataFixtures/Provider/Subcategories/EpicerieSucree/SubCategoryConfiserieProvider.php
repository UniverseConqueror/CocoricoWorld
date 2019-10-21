<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSucree;

use Faker\Provider\Base;


class SubCategoryConfiserieProvider extends Base
{
    protected static $confiserieArray = [
        
        'Chocolat',
        'Sucre d\'orge',
        'Confiserie en vrac',
    ];
   
    public static function randomSubCategoryConfiserie()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$confiserieArray);
    }

    public static function categories() 
    {
        return static::$confiserieArray;
    }



   
}