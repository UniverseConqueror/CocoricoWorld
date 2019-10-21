<?php

namespace App\DataFixtures\Provider\Subcategories\ProduitElabore;

use Faker\Provider\Base;


class SubCategoryFriandProvider extends Base
{
    protected static $friandArray = [
        
        'Feuilleté au fromage',
        'Feuilleté au viande',
        'Feuilleté au vegan',
    ];
   
    public static function randomSubCategoryFriand()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$friandArray);
    }

    public static function categories() 
    {
        return static::$friandArray;
    }



   
}