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

<a class="vipl" href="viewer">Зритель</a>
<br>
<p>или</p>
<br>
<a class="vipl" href="player">Игрок</a>

<br><br><br>
<a class="aa" href="/site/index"><p>на главную</p></a>

</body>