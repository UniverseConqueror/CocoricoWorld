<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryBoissonAlcoolProvider extends Base
{
    protected static $boissonAlcoolArray = [
        
        'Vins',
        'Cidres',
        'Bières',
                
    ];
   
    public static function randomCategoryBoissonAlcool()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$boissonAlcoolArray);
    }

    public static function Categories() 
    {
        return static::$boissonAlcoolArray;
    }



   
}