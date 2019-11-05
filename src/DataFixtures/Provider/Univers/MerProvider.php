<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class MerProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Produit de la Mer',
        'image' => 'fruits-de-mer.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Poissons',
            'image' => 'poissons.jpg',
        ],
        [
            'name'  => 'Crustacés',
            'image' => 'crustaces.jpg',
        ],
        [
            'name'  => 'Coquillages',
            'image' => 'coquillages.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Poissons' => [
            [
                'name' => 'Bar',
            ],
            [
                'name' => 'Sole',
            ],
            [
                'name' => 'Raie',
            ],
        ],
        'Crustacés' => [
            [
                'name' => 'Crabe',
            ],
            [
                'name' => 'Homard',
            ],
            [
                'name' => 'Araignée',
            ],
        ],
        'Coquillages' => [
            [
                'name' => 'Huîtres',
            ],
            [
                'name' => 'Moules',
            ],
            [
                'name' => 'Bigorneaux',
            ],
        ],
    ];
}