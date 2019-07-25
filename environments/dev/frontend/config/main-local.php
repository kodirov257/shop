<?php

$config = [
    'components' => [
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'vk' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '',       // TODO: add clientId
                    'clientSecret' => '',   // TODO: add clientSecret
                ],
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '',       // TODO: add clientId
                    'clientSecret' => '',   // TODO: add clientSecret
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '',       // TODO: add clientId
                    'clientSecret' => '',   // TODO: add clientSecret
                ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
