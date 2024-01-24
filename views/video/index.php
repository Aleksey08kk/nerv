<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\GoalAsset;

GoalAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>

<body style="justify-content: center;
    align-items: center;">


    <h1 class="whoyou">Выбирайте кто вы:</h1>

    <div class="flex">
        <a class="blue-btn c-btn" href="viewer">Зритель</a>
        <p class="or">или</p>
        <a class="pink-btn c-btn" href="player">Игрок</a>
    </div>

    <br><br><br>
    <a class="aa" href="/site/index">
        <p>на главную</p>
    </a>

</body>