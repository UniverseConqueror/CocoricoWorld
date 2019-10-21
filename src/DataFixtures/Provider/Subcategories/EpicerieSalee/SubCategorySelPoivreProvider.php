<?php

namespace App\DataFixtures\Provider\Subcategories\EpicerieSalee;

use Faker\Provider\Base;


class SubCategorySelPoivreProvider extends Base
{
    protected static $selPoivreArray = [
        
        'Bretagne',
        'Guerande',
        'Camargue',
    ];
   
    public static function randomSubCategorySelPoivre()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$selPoivreArray);
    }

    public static function categories() 
    {
        return static::$selPoivreArray;
    }



   
}