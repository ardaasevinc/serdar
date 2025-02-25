<?php

return [
    /*
    |--------------------------------------------------------------------------
    | List of enabled features
    |--------------------------------------------------------------------------
    | The following features are available:
    | ACCOUNT_EXPIRY, TWO_FACTOR
    */
    'features' => [
        // 'ACCOUNT_EXPIRY',
        // 'TWO_FACTOR',
    ],

    /*
    |--------------------------------------------------------------------------
    | Date Format
    |--------------------------------------------------------------------------
    | Display format for datepicker
    */
    'date_format' => 'd.m.Y',

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    | User model used for admin access and management.
    | Eğer özel bir modelin varsa, burada belirtebilirsin. Örneğin:
    | 'user_model' => \App\Models\User::class,
    */
    'user_model' => \App\Models\User::class,

    /*
    |--------------------------------------------------------------------------
    | Resources
    |--------------------------------------------------------------------------
    | Resources used for managing users, roles and permissions.
    | Eğer farklı bir yetkilendirme yönetimi kullanıyorsan, burayı değiştirmen gerekir.
    */
    'resources' => [
        'user' => null, // Eğer özel bir UserResource'un varsa, burada tanımlayabilirsin.
        'role' => null,
        'permission' => null,
    ]
];
