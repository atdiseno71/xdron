<?php

return [
    [
        'text' => 'Usuarios',
        'url' => 'users',
        'icon' => 'fas fa-fw fa-users',
        'can' => 'users.index'
    ],
    [
        'text' => 'Tanqueadores',
        'url' => 'assistants',
        'icon' => 'fas fa-fw fa-users',
        'can' => 'assistants.index'
    ],
    [
        'text' => 'Clientes',
        'url' => 'clients',
        'icon' => 'fas fa-fw fa-user',
        'can' => 'clients.index'
    ],
    [
        'text' => 'Drones',
        'url' => 'drons',
        'icon' => 'fa fa-rocket',
        'can' => 'drons.index'
    ],
    [
        'text' => 'Haciendas',
        'url' => 'estates',
        'icon' => 'fa fa-street-view',
        'can' => 'estates.index'
    ],
    /* [
        'text' => 'Suertes',
        'url' => 'lucks',
        'icon' => 'fa fa-map',
        'can' => 'lucks.index'
    ], */
    [
        'text' => 'Operaciones',
        'url' => 'operations',
        'icon' => 'fa fa-tasks',
        'can' => 'operations.index'
    ],
    [
        'text' => 'Producto',
        'url' => 'type-products',
        'icon' => 'fas fa-box',
        'can' => 'type-products.index'
    ],
    [
        'text' => 'Zona',
        'url' => 'zones',
        'icon' => 'fas fa-map',
        'can' => 'zones.index'
    ],
];
