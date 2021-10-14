<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
                        'appendTimestamp' => true,
                    ],
        'authManager' => [
            'class' => 'yii/rbac/DbManager',
            'defaultRoles' => ['guest'],
            ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // 'viewPath' => '@common/modules/formpanel/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com', //'localhost',
                'username' => 'devanshuverma158@gmail.com',
                'password' => '*\X3CZVnay@<?"?R',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
              ],
             // 'userFormPanel' => [
             //        'class' => 'yii\web\User',
             //        'identityClass' => 'common\modules\formpanel\models\User',
             //        'idParam' => 'fp_id',
             //        'loginUrl' => ['/formpanel/dashboard'],
             //        'enableAutoLogin' => true,
             //        'identityCookie' => ['name' => '_identity-formpanel', 'httpOnly' => true],
             //    ],

            // 'urlManagerPanel' =>[
            //     'class' => 'yii\web\urlManager',
            //     // 'scriptUrl' => '/adminlte/common/modules/schools',
            //     'baseUrl' => '@formpanel',
            //     'enablePrettyUrl' => true,
            //     'showScriptName' => true,
            //     ],
          

    ],
    'modules' => [
        'formpanel' => [
            'class' => 'common\modules\formpanel\FormPanel',
        ],
    ],
];
