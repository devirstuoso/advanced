<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'username',
            'email:email',
            // 'auth_key',
            'password_hash',
            // 'password_reset_token',
            ['label' => 'Status',
            'attribute' => 'status',
            'format' => 'html',
            'value' => function($attribute){
                if($attribute['status'] == 10){
                return '<div style="background : green; height:20px; width:20px; border-radius:50%;"></div>' ;
            }
            else if($attribute['status'] == 9) {
                return '<div style="background : yellow; border-radius: 50%; height:20px; width:20px; "></div>';
            }
            else {
                return '<div style="background : red; border-radius: 50%; height:20px; width:20px; "></div>';
            }
        }
             ],
            // 'created_at',
            // 'updated_at',
            //'verification_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
