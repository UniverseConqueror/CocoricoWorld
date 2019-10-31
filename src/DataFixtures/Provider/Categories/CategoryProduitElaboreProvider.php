<?php

namespace App\DataFixtures\Provider\Categories;

use Faker\Provider\Base;


class CategoryProduitElaboreProvider extends Base
{
    protected static $ProduitsElaborésArray = [
        
        'Plats préparés',
        'Friands',
        'Pizzas',
                
    ];

    protected static $produitElaboresImages = [
        'plat-prepares.jpg',
        'friand.jpg',
        'pizza.jpg',
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

    public static function images()
    {
        return self::$produitElaboresImages;
    }
}