<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\ProfileAsset;
use yii\widgets\ActiveForm;

ProfileAsset::register($this);
/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Нерв';
?>

<div class="icons">
<a class="glow-on-hover td" href="<?= Url::toRoute(['/site/index']) ?>">🏃</a>
<span class="glow-on-hover pp" onclick="toggleFullScreen(document.body)"><p class="m">⤡</p></span>
</div>
<!------------------------------------------------------------------------------------------->

<div class="div-ava">
    <div class="avaplus">
        <div class="shape-outer circle">
            <img class="avatar shape-inner" src="<?= $userModel->getImage(); ?>" alt="">
        </div>
        <?= Html::a('➕', ['set-image', 'id' => $userModel->id], ['class' => 'btnava']) ?>
    </div>
    <div class="wrapper-profile">
        <h1 class="namepro"><?= $userModel->name; ?></h1>
        <h1 class="plaernerv">игрок в нерв</h1>
    </div>
</div>

<!-------------------------------------------зритель или игрок?------------------------------------------>
<div class="vibor">
    <h2 class="choice">Информация по игроку</h2>
    <h3 class="axtung">начиная играть, ты соглашаешься с условиями игры и сам несешь ответственность за себя и окружающих участников игры</h3>
    <div class="wrapperbtns">
        <button class="yellow" onmousedown="viewMoney()">
            <p id="btnmoney">Деньги</p>
            <p id="showmoney" onmousedown="viewWord()"><?= $money ?> руб.</p>
        </button>
        <span class="gfkrb"> || </span>
        <a class="a green" href="<?= Url::toRoute(['tasks/index']) ?>">играть</a>
    </div>
</div>

<!------------------------------------------- профиль ----------------------------------------------------->

<h1 class="yourvideo">твои видеозаписи прохождения заданий</h1>


<div class="all-video scroll">
    <div class="container y mandatory-scroll-snapping" dir="ltr">
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoOne ?>#t=0.1" type="video/mp4" />
            </video>
            <p><?= $task->name ?></p>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoTwo ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoThree ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoFour ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoFive ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoSix ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoSeven ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoEight ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
        <div class="xx">
            <video controls class="myvideo">
                <source src="<?= $videoNine ?>#t=0.1" type="video/mp4" />
            </video>
        </div>
    </div>
</div>


<!-------------------------------------------------------------------------------------------->








<footer style="margin: 100px 0 0 0; padding: 0 0 0 30px;">
    <h5 style="font-size: 15px;">Все права защищены© 2023г.</h5>
</footer>