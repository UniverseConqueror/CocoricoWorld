<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class FromageProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Fromage',
        'image' => 'fromages.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Fromage lait cru',
            'image' => 'fromages2.jpg',
        ],
        [
            'name'  => 'Fromage pasteurisé',
            'image' => 'fromages2.jpg',
        ],
        [
            'name'  => 'Cremerie',
            'image' => 'cremerie.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Fromage lait cru' => [
            [
                'name' => 'Comté',
            ],
            [
                'name' => 'Emmental',
            ],
            [
                'name' => 'Tomme de Savoie',
            ],
        ],
        'Fromage pasteurisé' => [
            [
                'name' => 'Epoisse',
            ],
            [
                'name' => 'Camembert',
            ],
            [
                'name' => 'St Marcelin',
            ],
        ],
        'Cremerie' => [
            [
                'name' => 'Crème legère',
            ],
            [
                'name' => 'Crème semi épaisse',
            ],
            [
                'name' => 'Crème épaisse',
            ],
        ],
    ];
}