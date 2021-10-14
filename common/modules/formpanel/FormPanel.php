<?php

namespace common\modules\formpanel;

/**
 * formpanel module definition class
 */
class FormPanel extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\formpanel\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::$app->set('userFormPanel', [ 
                        'class' => 'yii\web\User',
                        'identityClass' => 'common\modules\formpanel\models\User',
                        'idParam' => 'fp_id',
                        'loginUrl' => ['/formpanel/dashboard'],
                        'enableAutoLogin' => true,
                        'identityCookie' => ['name' => '_identity-formpanel', 'httpOnly' => true],
                    ],
        );

        \Yii::$app->set('session', [
                        'class' => 'yii\web\Session',
                        'name' => '_formpanelSessionId',
                    ],
        );

        \Yii::$app->set('mailer', [
                        'class' => 'yii\swiftmailer\Mailer',
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
        );

        \Yii::$app->set('db', [
                        'class' => 'yii\db\Connection',
                        'dsn' => 'mysql:host=localhost;dbname=formpanel',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8',
                    ],
        );

        \Yii::$app->set('urlManagerFp', [
                        'class' => 'yii\web\urlManager',
                        'scriptUrl' => '/adminlte/common/modules/schools',
                        'baseUrl' => '@formpanel',
                        'enablePrettyUrl' => false,
                        'showScriptName' => true,
                    ],
        );

        // \Yii::configure($this, require (__DIR__.'/config/main.php'));

        // custom initialization code goes here
        $this->setAliases(['@formpanel' => __DIR__. '',
                           '@formpanel-url' => '/advanced/common/modules/formpanel',
                           '@formpanel-img' => '/advanced/common/modules/formpanel/web/images'
                           ]);
    }

    // public function __construct($id, $parent=null, $config=[])
    // {
    //     $config = \yii\helpers\ArrayHelper::merge(
    //             require __DIR__ . '/config/main.php',
    //             $config
    //     );
    //     parent::__construct($id, $parent, $config);
    // }


}
