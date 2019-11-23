<?php

use yii\helpers\Html;
use common\models\User;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'email')->textInput()?>
    <?= $form->field($model, 'status')->dropDownList(User::allStatus(),['prompt'=>'请选择状态'])?>
    <div class="form-group">
        <?= Html::submitButton('修改', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
