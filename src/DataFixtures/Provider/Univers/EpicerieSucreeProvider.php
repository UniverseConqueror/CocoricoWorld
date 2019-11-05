<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class EpicerieSucreeProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Epicerie Sucrée',
        'image' => 'epicerie-sucree.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Gateaux',
            'image' => 'gateaux.jpg',
        ],
        [
            'name'  => 'Confitures',
            'image' => 'confiture.jpg',
        ],
        [
            'name'  => 'Confiseries',
            'image' => 'confiseries.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Gateaux' => [
            [
                'name' => 'Entremets',
            ],
            [
                'name' => 'Gateaux d\'anniversaire',
            ],
            [
                'name' => 'Gateaux secs',
            ],
        ],
        'Confitures' => [
            [
                'name' => 'Gelées',
            ],
            [
                'name' => 'Confitures',
            ],
            [
                'name' => 'Marmelades',
            ],
        ],
        'Confiseries' => [
            [
                'name' => 'Chocolat',
            ],
            [
                'name' => 'Sucre d\'orge',
            ],
            [
                'name' => 'Confiserie en vrac',
            ],
        ],
    ];
}