<?php

use app\widgets\Alert;
use yii\helpers\Html;
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
        <button type="submit" class="btn send-btn ">Опубликовать</button>
        <?php ActiveForm::end(); ?>
    </div>
</div>




