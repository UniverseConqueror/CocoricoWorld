<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;

class FruitLegumeProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Fruit et Legume',
        'image' => 'fruits-et-legumes.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Fruits',
            'image' => 'fruits.jpg',
        ],
        [
            'name'  => 'Légumes',
            'image' => 'legumes.jpg',
        ],
        [
            'name'  => 'Herbes aromatiques',
            'image' => 'herbes-aromatiques.jpg',
        ],
        [
            'name'  => 'Légumes Secs',
            'image' => 'legumes-secs.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        "Fruits" => [
            [
                'name'  => 'Pomme',
            ],
            [
                'name'  => 'Poire',
            ],
            [
                'name'  => 'Orange',
            ],
        ],
        "Légumes" => [
            [
                'name'  => 'Tomate',
            ],
            [
                'name'  => 'Courgette',
            ],
            [
                'name'  => 'Pomme de terre',
            ],
        ],
        "Herbes aromatiques" => [
            [
                'name'  => 'Basilic',
            ],
            [
                'name'  => 'Ciboulette',
            ],
            [
                'name'  => 'Coriandre',
            ],
        ],
        "Légumes Secs" => [
            [
                'name'  => 'Lentilles',
            ],
            [
                'name'  => 'Pois Cassés',
            ],
            [
                'name'  => 'Haricots rouges',
            ],
        ],
    ];
}