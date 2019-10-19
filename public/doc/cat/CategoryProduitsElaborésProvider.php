<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryProduitsElaborésProvider extends Base
{
    protected static $ProduitsElaborésArray = [
        
        'Plats prèparés',
        'Friands',
        'Pizza',
                
    ];
   
    public static function randomCategoryProduitsElaborés()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$ProduitsElaborésArray);
    }

    public static function Categories() 
    {
        return static::$ProduitsElaborésArray;
    }



   
}