<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class EpicerieSaleeProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Epicerie Salée',
        'image' => 'epicerie-salee.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Huiles',
            'image' => 'oil.jpg',
        ],
        [
            'name'  => 'Sel et poivres',
            'image' => 'sel-et-poivres.jpg',
        ],
        [
            'name'  => 'Bocaux',
            'image' => 'bocaux.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Huiles' => [
            [
                'name' => 'Colza',
            ],
            [
                'name' => 'Tournesol',
            ],
            [
                'name' => 'Sésame',
            ],
        ],
        'Sel et poivres' => [
            [
                'name' => 'Bretagne',
            ],
            [
                'name' => 'Guerande',
            ],
            [
                'name' => 'Camargue',
            ],
        ],
        'Bocaux' => [
            [
                'name' => 'Plat régionaux',
            ],
            [
                'name' => 'Plat nationaux',
            ],
        ],
    ];
}