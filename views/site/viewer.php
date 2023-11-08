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

<a class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>

<div class="task-from">
    <h1 class="tac">Задания от зрителей</h1>
    <div class="listtask scroll" id="scrollTop" >
        <?php foreach ($allTasks as $oneTask) : ?>
            <div class="col-sm-9">
                <div class="wooo">
                    <h5 class="taskviewer"><?= $oneTask->proposed_task ?></h5>
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
        <button type="submit" class="glow">Опубликовать</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>

<h1 class="all-players">Все игроки</h1>
    <div class="listtask scroll" id="scrollTop" >
        <?php foreach ($allUser as $oneUser) : ?>
            <div class="col-sm-9">
                <div class="wooo">
                    <h5 class="taskviewer"><?= $oneUser->name ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


