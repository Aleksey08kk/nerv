<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\MyAsset;
use yii\widgets\ActiveForm;
MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Нерв';
?>


<!----------------------------------------------гравная страница------------------------------------------>
<div class="wrapper-inside">
    <h2 class="neon welcome">Добро пожаловать в . . .</h2> 
    <div class="blackpink">HEPB</div>
    <div class="blackpink__tagline">
        
        <?php if (Yii::$app->user->identity->isAdmin): ?>
            <a class="a header" href="<?= Url::toRoute(['/admin']) ?>">Админ</a>
        <?php endif; ?>

        <a class="a header" href="<?= Url::toRoute(['/']) ?>">Связь с организатором</a> 
        <a class="a header" href="<?= Url::toRoute(['/']) ?>">Часто задаваемые вопросы</a>  
        <a class="a header" href="<?= Url::toRoute(['/']) ?>">Правила игры</a>  
        <a class="a header" href="<?= Url::toRoute(['/auth/logout']) ?>">выход (<?= Yii::$app->user->identity->name?>)</a>

    </div>
</div>

<!-------------------------------------------зритель или игрок?------------------------------------------>
<div class="wrapper2">
<a class="a yellow" href="<?= Url::toRoute(['site/viewer-access']) ?>">Зритель</a>
<p class="or neon">или</p>
<a class="a green" href="<?= Url::toRoute(['tasks/default/access']) ?>">Игрок</a> 
</div>

<input class="pink-btn a-btn" type="button" value="музыка" onclick="playSong()">