<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\bootstrap4\ActiveForm;
    // use common\widgets\Alert;


    $this->title = 'Login';

?>
<!-- ?= \Yii::$app->getModule('formpanel')->params['test']; ?> -->

<!-- <div class="formpanel-default-index">
    <h1><? $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<? $this->context->action->id ?>".
        The action belongs to the controller "<? get_class($this->context) ?>"
        in the "<? $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><? __FILE__ ?></code>
    </p>
</div>
 -->

    <!-- ?= Alert::widget() ?> -->



<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">

      <a href="#" class="h1">
        <img src="<?= Yii::getAlias('@formpanel-img/logo.jpg'); ?>" height="40px">
        <b>DUCC</b>Form <p class="h5"><?= $this->title; ?></p>
      </a>
    </div>
      <div class="card-header text-center">
        <?php if(\Yii::$app->session->hasFlash('success')) : ?>
          <p class="h6 text-success"><?php echo \Yii::$app->session->getFlash('success'); ?></p>
        <?php endif; ?>
        <?php if(\Yii::$app->session->hasFlash('error')) : ?>
          <p class="h6 text-danger"><?php echo \Yii::$app->session->getFlash('error'); ?></p>
        <?php endif; ?>
      </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php $form = ActiveForm::begin(['id' => 'login-form', ]); ?>
        <!-- <div class="input-group mb-3"> -->
          <!-- <input type="email" class="form-control" placeholder="Email"> -->
          <?= $form->field($model, 'email',['enableAjaxValidation' => true, 'options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>{hint}{error}'])->textInput(['autofocus' => true, 'class'=>'form-control', 'placeholder' => 'Email']) ?>
         
        <!-- </div> -->
        <!-- <div class="input-group mb-3"> -->
          <!-- <input type="password" class="form-control" placeholder="Password"> -->
          <?= $form->field($model, 'password',['options' =>['class' => 'input-group mb-3'], 'template' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>{hint}{error}'])->passwordInput(['class'=> 'form-control', 'placeholder' => 'Password']) ?>
        <!-- </div> -->
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label> -->
              <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="form-group">
              <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
          </div>
          <!-- /.col -->
        </div>
      <?php ActiveForm::end(); ?>

     <!--  <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?= Url::to(['request-password-reset']); ?>">I forgot my password</a>
      </p>
      <p class="mb-1">
        <a href="<?= Url::to(['resend-verification-email']); ?>">Need new verification email? Resend</a>
      </p>
      <p class="mb-0">
        <a href="<?= Url::to(['signup']); ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>




<img src="<?='' //Yii::getAlias('@formpanel-img/newseventt1.png'); ?>" height="200px">
<?=''// Html::img('@formpanel-img/newseventt1.png',['alt'=>'img', 'class'=> 'brand-image img-circle elevation-4' , 'height'=>200]); ?>