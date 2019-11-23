<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'friendcir_id',
            'content',
       //     'create_time:datetime',
            [
             'attribute'=>'create_time',
             'format'=>['date','php: Y-m-d H:i:s'],
            ],
           // 'user_id',
            [
              'attribute'=>'user_id',
              'value'=>function($model)
              {
                  return $model->user->username;
              }
            ],

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view}{delete}'],
        ],
    ]); ?>


</div>
