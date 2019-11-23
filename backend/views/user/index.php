<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',

          // 'auth_key',
         //  'password_hash',
          // 'password_reset_token',
            'email:email',
            [
             'attribute'=>'status',
             'value'=>'statusStr',
            ],
            //'status',
            //'created_at',
            [
             'attribute'=>'created_at',
             'format'=>['date','php:Y-m-d H:i:s'],
            ],
            //'updated_at',
            [  'label'=>'更新时间',
               'attribute'=>'updated_at',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            //'verification_token',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{update}'],
        ],
    ]); ?>


</div>
