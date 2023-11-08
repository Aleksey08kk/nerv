<?php

use app\models\Task;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\assets\MyTwoAsset;
MyTwoAsset::register($this);
use app\assets\MyAsset;
MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Игра началась';
?>


<a class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>

<!----------------------------------------------гравная страница------------------------------------------>
<h1 class="task" id="taskstart"><?= $taskDescription->description ?></h1>

<h2 class="You-out" id="You-re-out">время истекло. ТЫ ВЫБЫЛ</h2>

<span class="timer task" id="timer"></span>

<div class="wrapper" id="btntaskstart">
    <input class="pink-btn a-btn" type="button" value="Начать задание" onmousedown="viewTask()">
</div>


<div class="formfoto" id="upload">
    <?php $form = ActiveForm::begin(); ?>
    <div class="formfoto">
    <div>
        <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>
    </div>
        <div><?= Html::submitButton('Отправить', ['class' => 'input-file-btn']) ?></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


<!------------------------------------------------------------------------------------->

