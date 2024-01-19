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





    </div>





</body>