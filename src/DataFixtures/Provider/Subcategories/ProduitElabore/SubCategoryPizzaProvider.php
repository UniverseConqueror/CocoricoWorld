<?php

namespace App\DataFixtures\Provider\Subcategories\ProduitElabore;

use Faker\Provider\Base;


class SubCategoryPizzaProvider extends Base
{
    protected static $pizzasArray = [
        
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