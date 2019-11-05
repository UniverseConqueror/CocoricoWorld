<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class ProduitElaboreProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Produit Elaboré',
        'image' => 'produits-elabore.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Plats préparés',
            'image' => 'plat-prepares.jpg',
        ],
        [
            'name'  => 'Friands',
            'image' => 'friand.jpg',
        ],
        [
            'name'  => 'Pizzas',
            'image' => 'pizza.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Plats préparés' => [
            [
                'name' => 'Régionaux',
            ],
            [
                'name' => 'Nationaux',
            ],
        ],
        'Friands' => [
            [
                'name' => 'Feuilleté au fromage',
            ],
            [
                'name' => 'Feuilleté a la viande',
            ],
            [
                'name' => 'Feuilleté vegan',
            ],
        ],
        'Pizzas' => [
            [
                'name' => 'Base tomate',
            ],
            [
                'name' => 'Base crème fraiche',
            ],
        ],
    ];
}