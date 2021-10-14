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

        // custom initialization code goes here
        $this->setAliases(['@formpanel' => __DIR__. '']);
        $this->setAliases(['@formpanel-assets' => __DIR__. '/assets']);
        $this->setAliases(['@formpanel-web' => __DIR__. '/web']);
    }
}
