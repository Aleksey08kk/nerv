<?php

use yii\helpers\Url;
use app\assets\IndexAsset;
use app\models\User;
use app\models\Task;

IndexAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Маскара';
?>



<header class="header">
    <img class="img-logo" src="img/logo.png" alt="">
    <h1 class="logo-name">mackapa</h1>


    <div class="login">
        <?php if (Yii::$app->user->isGuest) : ?>
            <a class="a headerr" href="<?= Url::toRoute(['auth/signup']) ?>">регистрация</a>
            <a class="a headerr" href="<?= Url::toRoute(['auth/login']) ?>">войти</a>
        <?php endif; ?>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <a class="a header" href="<?= Url::toRoute(['/auth/logout']) ?>">выход (<?= Yii::$app->user->identity->name ?>)</a>
        <?php endif; ?>
    </div>
</header>

<!------------------------------------------------------------------------------------------------>
<input type="checkbox" id="nav-toggle" hidden>
<input type="checkbox" id="nav-toggle2" hidden>
<!------------------------------------------------------------------------------------------------>

<div class="block-video">
    <div class="xx">
        <?php foreach ($tapeModel as $tapeModels) : ?>
            <video controls class="vivi">
                <source src="<?= $tapeModels->getImage() ?>#t=0.1" />
            </video>
            <div class="name-and-task">
                <a href="#" class="down" title="Нажмите чтоб открыть страницу игрока">
                    <img class="img-ava" src="<?= User::find()->where(['id' => $tapeModels->user_id])->one()->getImage(); ?>" alt="info">
                    <h1 class="player-name"><?= $tapeModels->name_player ?></h1>
                </a>
                <a href="#" class="link-task" title="Нажмите чтоб смотреть других игроков выполнивших это задание">
                    <h1 class="player-task"><?= Task::find()->where(['number' => $tapeModels->tape_task])->one()->description;  ?></h1>
                </a>
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







<!----------------------------------------------гравная страница ------------------------------------------>
<div class="wrapper-inside">
    <?php if (Yii::$app->user->identity->isAdmin) : ?>
      <a class="a header" href="<?= Url::toRoute(['/admin']) ?>">Админ</a>
    <?php endif; ?>

    <a class="a header" href="#video">правила игры</a>
    <a class="a header" href="<?= Url::toRoute(['/auth/logout']) ?>">выход (<?= Yii::$app->user->identity->name ?>)</a>
</div>


<!-------------------------------------------зритель или игрок?------------------------------------------>
<div class="vibor"> <div class="wrapper2">
    <a class="a yellow" href="<?= Url::toRoute(['site/role']) ?>">Зритель</a>
    <p class="or neon">или</p>
    <a class="a green" href="<?= Url::toRoute(['tasks/default/role']) ?>">Игрок</a>
  </div>
</div>



<!--------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------->

<!--------------------------------------------------------------------------------------------------------->
