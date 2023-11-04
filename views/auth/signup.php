<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use app\assets\MyAsset;

MyAsset::register($this);

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="reg-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "\n<div class=\"col-lg-10\">{input}</div>\n<div class=\"col-lg-10\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label cursor'],
        ],
    ]); ?>

    <div class="">
        <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'placeholder' => "Имя"]) ?>

        <?= $form->field($model, 'email')->textInput(['placeholder' => "Почта"]) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Пароль"]) ?>
    </div>

    <?= Html::submitButton('🔐', ['class' => 'glow-on-hover', 'name' => 'login-button']) ?>

    <?php ActiveForm::end(); ?>

</div>
        

    
