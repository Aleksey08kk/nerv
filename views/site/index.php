<?php
use yii\helpers\Url;
use app\assets\MyAsset;
MyAsset::register($this);

/** @var yii\web\View $this */

$this->title = 'Нерв';
?>



<div class="wrapper">

    <div class="blackpink"><a class="a" href="<?php if (!Yii::$app->user->isGuest): ?>
        <?= Url::toRoute(['site/inside']) ?>
        <?php endif; ?>">HEPB</a>
    </div>
    
    <div class="blackpink__tagline">
        <?php if (Yii::$app->user->isGuest): ?>
        <a class="a header" href="<?= Url::toRoute(['auth/signup']) ?>">регистрация</a>
        <a class="a header" href="<?= Url::toRoute(['auth/login']) ?>">войти</a>
        <?php endif; ?>
    </div>
</div>

