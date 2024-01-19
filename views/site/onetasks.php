<?php

use yii\helpers\Url;
use app\assets\IndexAsset;
use app\models\User;
use app\models\Task;

IndexAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>


<header class="header">
    <img class="img-logo" src="img/logo.png" alt="">
    <h1 class="logo-name">mackapa</h1>


    <div class="login">
        <?php if (Yii::$app->user->isGuest) : ?>
            <a class="a" href="<?= Url::toRoute(['auth/signup']) ?>">регистрация</a>
            <a class="a" href="<?= Url::toRoute(['auth/login']) ?>">войти</a>
        <?php endif; ?>

        <?php if (!Yii::$app->user->isGuest) : ?>
            <a class="a profile" href="<?= Url::toRoute(['site/profile']) ?>"></a>
        <?php endif; ?>
    </div>
</header>

<!------------------------------------------------------------------------------------------------>
<input type="checkbox" id="nav-toggle" hidden>
<input type="checkbox" id="nav-toggle2" hidden>
<!------------------------------------------------------------------------------------------------>

<div class="block-video">
    <div class="xx">
        <?php foreach ($complModel as $tapeModels) : ?>
            <video controls class="vivi">
                <source src="<?= $tapeModels->getImage() ?>#t=0.1" />
            </video>
            <div class="name-and-task">
                <a href="#" class="down" title="Нажмите чтоб открыть страницу игрока">
                    <img class="img-ava" src="<?= User::find()->where(['id' => $tapeModels->user_id])->one()->getImage(); ?>" alt="info">
                    <h1 class="player-name"><?= $tapeModels->name_player ?></h1>
                </a>
                <span class="link-task">
                    <h1 class="player-task"><?= Task::find()->where(['number' => $complModel->$tasknumber])->one()->description;  ?></h1>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<!------------------------------------ выдвигающаяся панель ------------------------------------------------>
<nav class="nav">
    <label id="click-to-hide" for="nav-toggle" class="nav-toggle" onclick></label>
    <h2 class="logo">
        <a href="#">0хх Маскара</a>
    </h2>
    <ul>
        <li><a href="#1">Один</a>
        <li><a href="#2">Два</a>
        <li><a href="#3">Три</a>
        <li><a href="#4">Четыре</a>
        <li><a href="#5">Пять</a>
        <li><a href="#6">Шесть</a>
        <li><a href="#7">Семь</a>
    </ul>
</nav>

<div class="mask-content"></div>


<!------------------------------------ выдвигающаяся панель поиск ------------------------------------------------>

<nav class="nav2">
    <label id="hidden-element" for="nav-toggle2" class="nav-toggle2" onclick></label>
    <h2 class="logo">
        <a href="#">0xx Маскара поиск</a>
    </h2>
    <ul>
        <li><a href="#1">
                <div class="col-sm-4">
                    <form method="get" action="<?= Url::to(['catalog/search']); ?>" class="pull-right">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control" placeholder="Поиск по игрокам">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </a>
        <li><a href="#2">Два</a>
        <li><a href="#3">Три</a>
        <li><a href="#4">Четыре</a>
        <li><a href="#5">Пять</a>
        <li><a href="#6">Шесть</a>
        <li><a href="#7">Семь</a>
    </ul>
</nav>
<div class="mask-content2"></div>


<!--
<div class="playpouse">
    <audio id="player" src="sound/play.wav"></audio>
    <div class="flex cen">
        <p class="play" onclick="document.getElementById('player').play()">▷</p>
        <p class="pouse" onclick="document.getElementById('player').pause()">❚❚</p>
    </div>
</div>
-->