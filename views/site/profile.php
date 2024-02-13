<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\ProfileAsset;

ProfileAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>

<body>
    <a class="a exit" href="<?= Url::toRoute(['site/index']) ?>">←</a>

    <div class="container">

        <h1 class="name"><?= $userModel->name ?></h1>
        <h3 class="description"><?= $userModel->description ?></h3>
        <img class="blackpink" src="<?= $userModel->getImage(); ?>" alt="avatar">

    </div>


    <?php if (Yii::$app->user->isGuest) : ?>
        <div class="boton">
            <span class="blue-btn bbb" onclick="alert('Нужно войти на сайт')">Подписаться</span>
        </div>
    <?php endif; ?>
    <?php if (!Yii::$app->user->isGuest) : ?>
        <div class="boton">
            <?php if ($subs == false) : ?>
                <?= Html::a('Подписаться', ['site/subscribe', 'otherUser' => $userModel->id], ['class' => 'blue-btn bbb']) ?>
            <?php endif; ?>
            <?php if ($subs == true) : ?>
                <?= Html::a('Отписаться', ['site/unsubs', 'otherUser' => $userModel->id], ['class' => 'pink-btn bbb']) ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="subs">
        <h2 class="subsli">Подписки <?= $countWho ?></h2>
        <h2 class="subsli">|</h2>
        <h2 class="subsli">Подписчики <?= $countWhom ?></h2>
    </div>

    <div class="allvideo">
        <?php foreach ($videoModel as $video) : ?>
            <div class="card">
                <video controls class="vivi">
                    <source src="<?= $video->getImage() ?>#t=0.1" />
                </video>
                <div class="mytask">
                    <span class="link-task" title="Нажмите чтоб смотреть других игроков выполнивших это задание">
                        <h1 class="player-task"><?= $video->task ?></h1>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</body>