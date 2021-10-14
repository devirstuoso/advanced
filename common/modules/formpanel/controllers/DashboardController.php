<?php

namespace common\modules\formpanel\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

// use common\modules\formpanel\controllers\DefaultController;

use common\modules\formpanel\models\LoginForm;
use common\modules\formpanel\models\SignupForm;
use common\modules\formpanel\models\User;
use common\modules\formpanel\models\PasswordResetRequestForm;
use common\modules\formpanel\models\VerifyEmailForm;
use common\modules\formpanel\models\ResetPasswordForm;
use common\modules\formpanel\models\ResendVerificationEmailForm;


use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * Dashboard controller for the `formpanel` module
 */
class DashboardController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        // return \yii\helpers\ArrayHelper::merge(parent::behaviors(), 
         return   [
            'access' => [
                'class' => AccessControl::className(),
                'user' => 'userFormPanel',
                // 'only' => [''],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['?'],

                    ],
                    [
                        'actions' => ['dash-board', 'logout'],
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

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['dash-board']);
            // return $this->redirect(['test']);
        } else {
            $model->password = '';

            $this->layout = 'login';
            return $this->render('login', ['model' => $model]);
        }
    }

    public function actionDashBoard() {
        if(Yii::$app->userFormPanel->isGuest) {
           throw new ForbiddenHttpException('You are not allowed to perform this operation');
        }
        $user_email = \Yii::$app->userFormPanel->identity->email;
        $user = User::findByEmail($user_email);
        $this->layout = 'main';
        return $this->render('dashboard', ['user' => $user]);
    }

    public function actionLogout()
    {
        Yii::$app->userFormPanel->logout();
        return  $this->redirect(['index']);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->redirect(['index']);
        }

        $this->layout = 'login';
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

            return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
            return $this->redirect(['index']);

        }
        $this->layout = 'login';
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        $this->layout = 'login';
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->userFormPanel->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                 return $this->redirect(['index']);
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->render(['index']);
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        $this->layout = 'login';
        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionTest(){
        echo "hello testing 123....";
    }
}
