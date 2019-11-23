<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Friend */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '后台朋友圈查看', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="friend-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定删除这条朋友圈吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'content',
            'picture_url:url',
            'create_time:datetime',
        ],
    ]) ?>

</div>
