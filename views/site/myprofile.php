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

        <div class="nastroyki">
            <!-- <?= Html::a('<img class="addfoto" src="/img/addfoto.svg">', ['set-image', 'userId' => $userModel->id], ['class' => 'a btnava']) ?>-->
            <a class="a update" href="<?= Url::toRoute(['set-image', 'userId' => $userModel->id]) ?>"><img class="addfoto" src="/img/addfoto.svg"></a>
            <a class="a update" href="<?= Url::toRoute(['view', 'id' => $userModel->id]) ?>"><img class="addfoto" src="/img/user.svg"></a>
        </div>

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
                            <h1 class="player-task"><?= Html::a($video->task, ['site/onetasks', 'tasknum' => $video->task], ['class' => 'player-task']) ?></h1>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>



    </div>





</body>