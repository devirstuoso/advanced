<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use common\modules\formpanel\assets\FormPanelAsset;

FormPanelAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body class="hold-transition sidebar-mini">
    <?php $this->beginBody() ?>

    <?php
    Modal::begin([
        'id' => 'modal',
        'size' => 'modal-xl',
    ]);
    echo '<div id="modalContent"></div>';
    Modal::end();
    ?>

    <?php
    Modal::begin([
        'id' => 'modalUpdate',
        'size' => 'modal-xl',
    ]);
    echo '<div id="modalUpdateContent"></div>';
    Modal::end();
    ?>

    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->render('main/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->render('main/sidebar') ?>


        <!-- Content Wrapper. Contains page content -->
        <?= $this->render('main/content', ['content' => $content]) ?>


        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <!-- ?= $this->render('main/control-sidebar') ?> -->
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?= $this->render('main/footer') ?>
    </div>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
