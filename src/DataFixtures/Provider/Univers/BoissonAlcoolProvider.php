<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class BoissonAlcoolProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Boisson Alcoolisée',
        'image' => 'boissons-alcoolises.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Vins',
            'image' => 'vin.jpg',
        ],
        [
            'name'  => 'Cidres',
            'image' => 'cidre.jpg',
        ],
        [
            'name'  => 'Bières',
            'image' => 'bieres.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Vins' => [
            [
                'name' => 'Bordeaux Rouge',
            ],
            [
                'name' => 'Alsace Blanc',
            ],
            [
                'name' => 'Anjou Rosé',
            ],
        ],
        'Cidres' => [
            [
                'name' => 'Normand brut',
            ],
            [
                'name' => 'Normand demi sec',
            ],
            [
                'name' => 'Normand sec',
            ],
        ],
        'Bières' => [
            [
                'name' => 'Blonde',
            ],
            [
                'name' => 'Brune',
            ],
            [
                'name' => 'Ambrée',
            ],
        ],
    ];
}