<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\modules\formpanel\assets\FormPanelAsset;
use yii\helpers\Html;
use common\widgets\Alert;


FormPanelAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">
<?php $this->beginBody() ?>


<?php if (!Yii::$app->user->isGuest) {
   echo 'main log in<br>';
} else {
   echo 'main log out<br>';

} ?>

<?php if (!Yii::$app->userFormPanel->isGuest) {
   echo 'module log in';
} else {
   echo 'module log out';

} ?>
<!-- <main role="main">
    <div class="container"> -->
    <?= $content ?>
<!--     </div>
</main>
 -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
