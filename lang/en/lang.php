<?php

return [
    'plugin' => [
        'name' => 'Iran Post',
        'description' => 'Iran Post System',
        'tab' => 'Iran Post',
        'access_irpost' => 'Manage Iran Post System',
    ],
    'irpost' => [
        'title' => 'Iran Post',
        'description' => 'Setting Iran Post',
        'irpost_type' => 'Type Iran Post',
        'none' => 'None',
        'smart' => 'Smart',
        'pishtaz' => 'Pioneer',
        'custom' => 'Custom',
        'tax_rate' => 'Tax Rate',
        'id_price' => 'Electronic ID amount (Toman)',
        'fine_price' => 'Compulsory compensation amount (Toman)',
        'ads_price' => 'Electronic delivery advertisement (Toman)',
        'packaging_price' => 'Package amount (Toman)',
        'insurance_price' => 'Insurance amount (Toman)',
        'free' => 'Minimum purchase amount for free shipping (Rials)',
    ],
    'locations' => [
        'state' => [
            'cities' => [
                'title' => 'Cities',
                'create' => 'Create City',
                'edit' => 'Edit City',
                'delete' => 'Do you want to delete?',
                'fields' => [
                    'name' => 'City Name',
                    'name_comment' => 'Enter the city name to display.',
                    'code' => 'City Code',
                    'code_comment' => 'Enter a unique code to access this city.',
                    'pishtaz_500' => 'Pioneer shipping up to 500g',
                    'pishtaz_comment_500' => 'Pioneer shipping costs up to 500g',
                    'pishtaz_1000' => 'Pioneer shipping up to 1000g',
                    'pishtaz_comment_1000' => 'Pioneer shipping costs form 501g to 1000g',
                    'pishtaz_2000' => 'Pioneer shipping up to 2000g',
                    'pishtaz_comment_2000' => 'Pioneer shipping costs form 1001g to 2000g',
                    'pishtaz_up' => 'Pioneer shipping from 2000g',
                    'pishtaz_comment_up' => 'Pioneer shipping cost from 2000g per kilogram',
                    'custom_500' => 'Custom shipping up to 500g',
                    'custom_comment_500' => 'Custom shipping costs up to 500g',
                    'custom_1000' => 'Custom shipping up to 1000g',
                    'custom_comment_1000' => 'Custom shipping costs form 501g to 1000g',
                    'custom_2000' => 'Custom shipping up to 2000g',
                    'custom_comment_2000' => 'Custom shipping costs form 1001g to 2000g',
                    'custom_up' => 'Custom shipping from 2000g',
                    'custom_comment_up' => 'Custom shipping cost from 2000g per kilogram',
                ],
                'btn' => [
                    'save' => 'Save',
                    'cancel' => 'Cancel',
                    'edit' => 'Edit',
                    'delete' => 'Delete',
                ]
            ]
        ]
    ]
];
