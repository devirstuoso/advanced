<?php

namespace common\modules\formpanel\controllers;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\modules\formpanel\models\LoginForm;
use common\modules\formpanel\models\SignupForm;

/**
 * Default controller for the `formpanel` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function behaviors()
    {
        return [
            'access' => [
                'user' => 'userFormPanel',
                'class' => AccessControl::className(),
                'only' => [''],
                'rules' => [
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?'],

                    ],
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        return $this->redirect(['/formpanel/dashboard']);
    }




}
