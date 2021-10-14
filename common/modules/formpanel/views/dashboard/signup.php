<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

$this->title = 'Registeration';
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
       <p class="login-box-msg">Register a new membership</p>

      <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableAjaxValidation' => true]); ?>
            <?= $form->field($model, 'username',['options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>{hint}{error}'])->textInput(['autofocus' => true, 'class'=>'form-control', 'placeholder' => 'Username']) ?>

            <?= $form->field($model, 'email',['options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>{hint}{error}'])->textInput(['class'=>'form-control', 'placeholder' => 'Email']) ?>

            <?= $form->field($model, 'password',['options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>{hint}{error}'])->passwordInput(['class'=>'form-control', 'placeholder' => 'Password']) ?>

            <?= $form->field($model, 'c_password',['options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>{hint}{error}'])->textInput(['class'=>'form-control', 'placeholder' => 'Confirm Password']) ?>


        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                I agree to the <a href="#">terms</a>
              </label> -->
              <?= $form->field($model, 'terms')->checkbox()->label('I agree to the <a href="#">terms</a>') ?>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="form-group">
              <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
          </div>
          <!-- /.col -->
        </div>
      <?php ActiveForm::end(); ?>

      <p class="mb-1">
        <a href="<?= Url::to(['index']); ?>" class="text-center">I already have a membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>


