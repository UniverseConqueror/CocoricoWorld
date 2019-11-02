<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class BoissonSansAlcoolProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Boisson Sans Alcool',
        'image' => 'boissons-sans-alcool.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Jus de fruits',
            'image' => 'jus-de-fruit.jpg',
        ],
        [
            'name'  => 'Boissons gazeuses',
            'image' => 'boissons-gazeuses.jpg',
        ],
        [
            'name'  => 'Boissons Bio',
            'image' => 'boissons-bio.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Jus de fruits' => [
            [
                'name' => 'Jus de raisin',
            ],
            [
                'name' => 'Jus d\'orange',
            ],
            [
                'name' => 'Jus de tomate',
            ],
        ],
        'Boissons gazeuses' => [
            [
                'name' => 'Regionaux',
            ],
            [
                'name' => 'Nationaux',
            ],
            [
                'name' => 'Energisant',
            ],
        ],
        'Boissons Bio' => [
            [
                'name' => 'Jus de pomme',
            ],
            [
                'name' => 'Jus de groseille',
            ],
            [
                'name' => 'Jus de framboise',
            ],
        ],
    ];
}