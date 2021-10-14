<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1">
        <img src="<?= Yii::getAlias('@formpanel-img/logo.jpg'); ?>" height="40px">
        <b>DUCC</b>Form <p class="h5"><?= $this->title; ?></p>
      </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Please fill out your email. A link to reset password will be sent there.</p>

      <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', ]); ?>
       
          <?= $form->field($model, 'email',['enableAjaxValidation' => true, 'options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>{hint}{error}'])->textInput(['autofocus' => true, 'class'=>'form-control', 'placeholder' => 'Email Id']) ?>

        <div class="row">
          <!-- /.col -->
            <div class="form-group col-12">
              <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-block col-4 float-right', 'name' => 'request-password-reset-button']) ?>
            </div>

          <!-- /.col -->
        </div>
      <?php ActiveForm::end(); ?>


      <p class="mb-1">
        <a href="<?= Url::to(['index']); ?>">or Log in</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
