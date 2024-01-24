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

<input class="glow-on-hover p" type="button" value="⤡" onclick="toggleFullScreen(document.body)">
<!----------------------------------------------гравная страница------------------------------------------>
<br><br>
<h1 class="task" id="taskstart"><?= $taskDescription->description ?></h1>

<h2 class="You-out" id="You-re-out">время истекло. ТЫ ВЫБЫЛ</h2>

<span class="timer task" id="timer"></span>

<div class="wrapper" id="btntaskstart">
    <input class="pink-btn a-btn" type="button" value="Запустить таймер" onmousedown="viewTask()">
</div>


<div class="formfoto" id="upload">
    <?php $form = ActiveForm::begin(['options' => ['accept'=>'video/*'], 'class' => 'bbttnn']); ?>
    <div class="formfoto">
        <div>
            <?= $form->field($model, 'image')->fileInput(['class' => 'bbttnn', 'maxlength' => true, 'accept'=>'video/*'])->label('') ?>
        </div>
        <div><?= Html::submitButton('Отправить', ['class' => 'pink-btn b-btn']) ?></div>
    </div>
    <?php ActiveForm::end(); ?>
</div>


<div class="again" id="again">
    <?= Html::a('Начать заново', ['tasks/again'], ['class' => 'blue-btn a-btn']) ?>
</div>

<!--
<form class="form" action="image.php" method="post" enctype="multipart/form-data">
    <input type="file" id="videoFile" name='camera' capture="environment" accept="video/*" />
    <button id="button" class="buttonAuthorization" type="submit">загрузить</button>
</form>
-->


<!---- звук при нажатии
<input type="button" value="sound" onclick="playMusic()" />
function playMusic(){
  var music = new Audio('/sound/knopka1.mp3');
  music.play();
  }
-->