<?php

namespace App\DataFixtures\Provider;

use Faker\Provider\Base;


class UniversProvider extends Base
{
    protected static $universarray = [
        
        'Fruits et Légumes',
        'Produits de la Mer',
        'Charcuteries',
        'Viandes',
        'Produits élaborés',
        'Fromage et Crèmerie',
        'Epicerie Salée',
        'Epicerie Sucrée',
        'Boisson sans alcool',
        'Boisson alcoolisée'
       
    ];

   
    public static function randomUnivers()
    {
        // on utilise les fonctions fournies par Base pour retourner facilement une données aléatoire
        return static::randomElement(static::$universarray);
    }

    public static function univers() 
    {
        return static::$universarray;
    }

   





    

   
}