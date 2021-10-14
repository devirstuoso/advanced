<?php
	return[
		'params' => [
			'test' => 'this is a test param',
		],

		'components' => [
			// 'assetManager' => [
                    //     'appendTimestamp' => true,
                    // ],
            'mailer' => [
			            'class' => 'yii\swiftmailer\Mailer',
			            // 'viewPath' => '@common/mail',
			            'viewPath' => '@common/modules/formpanel/mail',
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

			'userFormPanel' => [ 
                        'class' => 'yii\web\User',
                        'identityClass' => 'common\modules\formpanel\models\User',
                        'idParam' => 'fp_id',
                        'loginUrl' => ['/formpanel/dashboard'],
                        'enableAutoLogin' => true,
                        'identityCookie' => ['name' => '_identity-formpanel', 'httpOnly' => true],
                    ],


					
		],
	];

?>