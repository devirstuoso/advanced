<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Reset password';
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
      <p class="login-box-msg">Please choose your new password:</p>

      <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', ]); ?>
       
          <?= $form->field($model, 'password',['options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>{hint}{error}'])->passwordInput(['autofocus' => true, 'class'=>'form-control', 'placeholder' => 'Password']) ?>
          <?= $form->field($model, 'c_password',['enableAjaxValidation' => true, 'options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>{hint}{error}'])->textInput(['autofocus' => true, 'class'=>'form-control', 'placeholder' => 'Confirm Password']) ?>


        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="form-group">
              <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block', 'name' => 'reset-password-button']) ?>
            </div>
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
