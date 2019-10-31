<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryCharcuterieProvider extends Base
{
    protected static $charcuterieArray = [
        
        'Foie gras',
        'Jambons',
        'Pâtés',
                
    ];

    protected static $charcuterieImages = [
        'foie-gras.jpg',
        'jambon.jpg',
        'pate.jpg',
    ];
   
    public static function randomCategoryCharcuterie()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$charcuterieArray);
    }

    public static function Categories() 
    {
        return static::$charcuterieArray;
    }

    public static function images()
    {
        return self::$charcuterieImages;
    }
}