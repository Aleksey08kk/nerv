<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\assets\ProfileAsset;

ProfileAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<body>

    <div class="widget">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => '']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>

    <div>
    <a class="a izm" href="<?= Url::toRoute(['myprofile']) ?>">Вернуться в свой профиль</a>
    </div>


</body>