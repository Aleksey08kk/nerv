<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\MyAsset;

MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form flex">
    <?php $form = ActiveForm::begin(['options' => ['accept'=>'image/*']]); ?>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true])->label('') ?>
    <div class="form-group">
        <?= Html::submitButton('отправить', ['class' => 'pink-btn c-btn']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
