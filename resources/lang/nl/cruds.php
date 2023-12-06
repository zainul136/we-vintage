<?php

return [
    'userManagement' => [
        'title'          => 'Gebruikersbeheer',
        'title_singular' => 'Gebruikersbeheer',
    ],
    'permission' => [
        'title'          => 'Permissies',
        'title_singular' => 'Permissie',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rollen',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Gebruikers',
        'title_singular' => 'Gebruiker',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'inventory' => [
        'title'          => 'Inventory',
        'title_singular' => 'Inventory',
    ],
    'addStock' => [
        'title'          => 'Add Stock',
        'title_singular' => 'Add Stock',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'barcode'               => 'Barcode',
            'barcode_helper'        => 'click on this field and scan your barcode with a scanner',
            'quantity'              => 'Quantity',
            'quantity_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'select_product'        => 'Select Product',
            'select_product_helper' => ' ',
            'rack_no'               => 'Rack No',
            'rack_no_helper'        => ' ',
        ],
    ],
    'removeStock' => [
        'title'          => 'Remove Stock',
        'title_singular' => 'Remove Stock',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'barcode'               => 'Barcode',
            'barcode_helper'        => 'click on this field and scan your barcode with a scanner',
            'quantity'              => 'Quantity',
            'quantity_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'select_product'        => 'Select Product',
            'select_product_helper' => ' ',
            'rack_no'               => 'Rack No',
            'rack_no_helper'        => ' ',
        ],
    ],
    'availableStock' => [
        'title'          => 'Available Stock',
        'title_singular' => 'Available Stock',
    ],
    'report' => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
    ],
    'stockOut' => [
        'title'          => 'Stock Out',
        'title_singular' => 'Stock Out',
    ],
    'purchase' => [
        'title'          => 'Purchase',
        'title_singular' => 'Purchase',
    ],
    'product' => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'barcode'              => 'Barcode',
            'ImageBarcode'          => 'streepjescode afbeelding',
            'barcode_helper'       => 'Scan your barcode in this field or enter code',
            'low_quantity'         => 'Enter Low Quantity',
            'low_quantity_helper' => '',
            'buying_price'         => 'Buying Price',
            'buying_price_helper'  => ' ',
            'selling_price'        => 'Selling Price',
            'selling_price_helper' => ' ',
            'description'              => 'Description',
            'description_helper'       => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],

];