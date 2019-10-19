<?php

namespace App\DataFixtures\Provider\SubCategories\BoissonAlcool;

use Faker\Provider\Base;


class SubCategoryBoissonAlcoolProvider extends Base
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