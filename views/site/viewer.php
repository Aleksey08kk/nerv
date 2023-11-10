<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\MyAsset;

/** @var yii\web\View $this */
/** @var app\models\TaskFromViewer $model */
/** @var ActiveForm $form */

MyAsset::register($this);
$this->title = 'Нерв';
?>



<div class="task-from">
    <h1 class="tac">Задания от зрителей</h1>
    <div class="listtask scroll" id="scrollTop">
        <?php foreach ($allTasks as $oneTask) : ?>
            <div class="col-sm-9">
                <div class="wooo">
                    <h5 class="taskviewer"><?= $oneTask->proposed_task ?></h5>
                    <a onclick="playMusic()" class="like" href="<?= Url::toRoute(['site/like', 'id' => $oneTask->id]) ?>">👍</a>
                    <span class="like"><?= $oneTask->like ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="comment">
        <?php $form = ActiveForm::begin([
            'action' => ['site/viewer'],
            'options' => ['class' => 'form-horizontal contact-form', 'role' => "form"]
        ]) ?>
        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($model, 'proposed_task')->textarea(['class' => 'form-control', 'placeholder' => 'Напиши своё задание'])->label(false) ?>
            </div>
        </div>
        <button onclick="playButton()" type="submit" class="glow">Опубликовать</button>
        <?php ActiveForm::end(); ?>
        <h3 class="rules">Какие задания НЕ принимаются:</h3>
        <ul>
            <li>Приченяющие любой вред себе, другим людям и животным.</li>
            <li>Написаные нецензурно или непонятно.</li>
            <li>Нарушающие законодательство РФ.</li>
        </ul>
    </div>
    
</div>


<div class="flex">

<a onclick="playExit()" class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>

    <div class="scroll" id="scrollTop">
        <h1 class="all-players">Все игроки</h1>
        <?php foreach ($allUser as $oneUser) : ?>
            <div class="col-sm-2">
                <div class="wooo2">
                    <a onclick="playExit()" class="like" href="<?= Url::toRoute(['site/show-video', 'id' => $oneUser->id]) ?>"><?= $oneUser->name ?></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <div class="list-video scroll">
        <h1>Имя игрока: <?= $userOne->name ?></h1>
    
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoOne ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoTwo ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoThree ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoFour ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoFive ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoSix ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoSeven ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoEight ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoNine ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>
        <div class="flex">
            <div>
                <video controls class="video">
                    <source src="<?= $videoTen ?>" type="video/webm" />
                </video>
            </div>
            <ul>
                <li>dfn</li>
                <li>zdtgn</li>
                <li>zdgt</li>
            </ul>
        </div>

    </div>








</div>