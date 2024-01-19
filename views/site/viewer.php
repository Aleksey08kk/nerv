<?php

use app\models\Task;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\ViewerAsset;

/** @var yii\web\View $this */
/** @var app\models\TaskFromViewer $model */
/** @var ActiveForm $form */

ViewerAsset::register($this);
$this->title = 'Нерв';
?>


<!--<a class="a" href="<?= Url::toRoute(['/auth/logout']) ?>">выход (<?= Yii::$app->user->identity->name ?>)</a>-->


<div class="flexmain">
    <span class="nav">
        <a onclick="playExit()" class="glow-on-hover" href="<?= Url::toRoute(['/site/index']) ?>">🏃</a>
        <span class="glow-on-hover goh"><input class="full" type="button" value="⤡" onclick="toggleFullScreen(document.body)"></span>
    </span>


    <div class="names" id="scrollTop">
        <h1>Все игроки</h1>
        <?php foreach ($allUser as $oneUser) : ?>
            <div>
                <a onclick="playExit()" class="user-name" href="<?= Url::toRoute(['site/show-video', 'id' => $oneUser->id]) ?>"><?= $oneUser->name ?></a>
            </div>
        <?php endforeach; ?>
    </div>

    <!------------------------------------------------------------------------------------------------>
    <nav class="one">
        <ul class="topmenu">
            <li><a href="#">Все игроки<i class="fa fa-angle-down"></i></a>
                <ul class="submenu">
                    <?php foreach ($allUser as $oneUser) : ?>
                        <li class="lin">
                            <a onclick="playExit()" class="user-name lin" href="<?= Url::toRoute(['site/show-video', 'id' => $oneUser->id]) ?>"><?= $oneUser->name ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="#task">задания для игоков<i class="fa fa-angle-down"></i></a>
            <li><a href="#task">правила<i class="fa fa-angle-down"></i></a>
        </ul>
    </nav>

    <!------------------------------------------------------------------------------------------------>
    

    <div class="task-from" id="task">
        <h1 class="tac">Задания от зрителей</h1>
        <div class="listtask scroll" id="scrollTop">
            <?php foreach ($allTasks as $oneTask) : ?>
                <div class="flex str">
                    <h5 class="taskviewer"><?= $oneTask->proposed_task ?></h5>
                    <div class="right">
                        <span class="like"><?= $oneTask->like ?></span>
                        <a onclick="playMusic()" class="like" href="<?= Url::toRoute(['site/like', 'id' => $oneTask->id]) ?>">👍</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="comment">
            <?php $form = ActiveForm::begin(); ?>
            <div class="">
                <div class="">
                    <?= $form->field($model, 'proposed_task')->textarea(['class' => 'form-control', 'placeholder' => 'Напиши своё задание'])->label(false) ?>
                </div>
            </div>
            <button onclick="playButton()" type="submit" class="glow">Опубликовать</button>
            <?php ActiveForm::end(); ?>
        </div>

        
    </div>

</div>

