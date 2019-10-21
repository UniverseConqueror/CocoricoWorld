<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryBoissonSansAlcoolProvider extends Base
{
    protected static $boissonSansAlcoolArray = [
        
        'Jus de fruits',
        'Boissons gazeuses',
        'Boissons Bio',
                
    ];
   
    public static function randomCategoryBoissonSansAlcool()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$boissonSansAlcoolArray);
    }

    public static function Categories() 
    {
        return static::$boissonSansAlcoolArray;
    }



   
}