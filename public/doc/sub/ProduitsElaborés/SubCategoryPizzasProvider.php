<?php

namespace App\DataFixtures\Provider\Subcategories\ProduitsElaborés;

use Faker\Provider\Base;


class SubCategoryPizzasProvider extends Base
{
    protected static $izzasArray = [
        
        'Base tomate',
        'Base crème fraiche',
    ];
   
    public static function randomSubCategoryPizzas()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$pizzasArray);
    }

    public static function categories() 
    {
        return static::$pizzasArray;
    }



   
}