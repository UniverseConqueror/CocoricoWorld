<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class ViandeProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Viande',
        'image' => 'viande.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Boeuf',
            'image' => 'viande.jpg',
        ],
        [
            'name'  => 'Veau',
            'image' => 'veau.jpg',
        ],
        [
            'name'  => 'Agneau',
            'image' => 'viande-agneau.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Boeuf' => [
            [
                'name' => 'Filet',
            ],
            [
                'name' => 'Entrecôte',
            ],
            [
                'name' => 'Bavette',
            ],
        ],
        'Veau' => [
            [
                'name' => 'Escalope',
            ],
            [
                'name' => 'Jarret',
            ],
            [
                'name' => '1/2 veau',
            ],
        ],
        'Agneau' => [
            [
                'name' => 'Gigot',
            ],
            [
                'name' => 'Côtellette',
            ],
            [
                'name' => '1/2 agneau',
            ],
        ],
    ];
}