<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Friend */

$this->title = '更新朋友圈: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '朋友圈', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="friend-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form=ActiveForm::begin()?>

    <?= $form->field($model,'content')->textarea(['rows'=>3]);?>

    <?= Html::submitButton('更新',['class' => 'btn btn-success'])?>

    <?php ActiveForm::end();?>
</div>
