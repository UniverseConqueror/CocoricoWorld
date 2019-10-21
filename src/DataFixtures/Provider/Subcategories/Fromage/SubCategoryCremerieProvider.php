<?php

namespace App\DataFixtures\Provider\Subcategories\Fromage;

use Faker\Provider\Base;


class SubCategoryCremerieProvider extends Base
{
    protected static $cremerieArray = [
        
        'Crème legère',
        'Crème semi épaisse',
        'Crème épaisse',
    ];
   
    public static function randomSubCategoryCremerie()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$cremerieArray);
    }

    public static function categories() 
    {
        return static::$cremerieArray;
    }



   
}