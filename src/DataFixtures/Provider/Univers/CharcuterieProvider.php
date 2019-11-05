<?php


namespace App\DataFixtures\Provider\Univers;


use App\DataFixtures\Provider\BaseProvider;


class CharcuterieProvider extends BaseProvider
{
    /**
     * {@inheritDoc}
     */
    protected const UNIVERS = [
        'name'  => 'Charcuterie',
        'image' => 'charcuterie.jpg',
    ];

    /**
     * {@inheritDoc}
     */
    protected const CATEGORIES = [
        [
            'name'  => 'Foie gras',
            'image' => 'foie-gras.jpg',
        ],
        [
            'name'  => 'Jambons',
            'image' => 'jambon.jpg',
        ],
        [
            'name'  => 'Pâtés',
            'image' => 'pate.jpg',
        ],
    ];

    /**
     * {@inheritDoc}
     */
    protected const SUBCATEGORIES = [
        'Foie gras' => [
            [
                'name' => 'Canard cru',
            ],
            [
                'name' => 'Oie cru',
            ],
            [
                'name' => 'Canard mi cuit',
            ],
            [
                'name' => 'Oie mi cuit',
            ],
        ],
        'Jambons' => [
            [
                'name' => 'Jambon cru fumé',
            ],
            [
                'name' => 'Jambon blanc fumé',
            ],
            [
                'name' => 'Lardons fumés',
            ],
        ],
        'Pâtés' => [
            [
                'name' => 'Pâté de canard',
            ],
            [
                'name' => 'Pâté de lapin',
            ],
            [
                'name' => 'Pâté de caille',
            ],
        ],
    ];
}