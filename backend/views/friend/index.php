<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FriendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '朋友圈管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friend-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
        //    ['class' => 'yii\grid\SerialColumn'],

            'id',
           // 'user_id',
            [
             'attribute'=>'user_id',
             'value'=>function($model)
             {
                 return $model->user->username;
             }
            ],
            'content',
          //  'picture_url:url',
          //  'create_time:datetime',
            [
              'attribute'=>'create_time',
              'format'=>['date','php: Y-m-d H:i:s']
            ],

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view}{delete}'],
        ],
    ]); ?>


</div>
