<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\GoalAsset;
use yii\helpers\Url;

GoalAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Игра началась';
?>

<a class="a exit" href="<?= Url::toRoute(['/video/player']) ?>">←</a>
<body>
   
<div class="formadd">
    <?php $form = ActiveForm::begin(); ?>
    <div class="formfoto">
        <div>
            <?= $form->field($model, 'image')->fileInput(['class' => 'bbttnn', 'maxlength' => true])->label('') ?>
        </div>
        <div><?= Html::submitButton('Отправить', ['class' => 'pink-btn b-btn']) ?></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<h3 class="ruls">
    Снимите инересное видео того как вы выполняете это задание и залейте на сайт. Зрители будут оставлять как простые лайки так и лайки-монеты. 1 лайк-монета стоит реальных денег. Накопите нужную сумму и переводите себе на карту.
</h3>

</body>
