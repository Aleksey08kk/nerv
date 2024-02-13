<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\MyAsset;

MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>


  <div class="form flex" id="ffoo">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'image')->fileInput(['maxlength' => true])->label('') ?>
    <div class="form-group">
      <div onclick="preload()"><?= Html::submitButton('отправить', ['class' => 'pink-btn c-btn']) ?></div>
    </div>
    <?php ActiveForm::end(); ?>
  </div>


<div class="pre" id="pre">

<div class="progress">
  <div class="progress-value"></div>
</div>

</div>