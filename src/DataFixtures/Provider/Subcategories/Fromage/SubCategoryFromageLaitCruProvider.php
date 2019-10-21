<?php

namespace App\DataFixtures\Provider\Subcategories\Fromage;

use Faker\Provider\Base;


class SubCategoryFromageLaitCruProvider extends Base
{
    protected static $fromageLaitCruArray = [
        
        'Comtè',
        'Emmental',
        'Tomme de Savoie',
    ];
   
    public static function randomSubCategoryFromageLaitCru()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$fromageLaitCruArray);
    }

    public static function categories() 
    {
        return static::$fromageLaitCruArray;
    }



   
}