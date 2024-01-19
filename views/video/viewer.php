<?php

use app\models\TaskFromViewer;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\GoalAsset;
use app\models\User;

GoalAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>

<body>
    <a class="a exit" href="<?= Url::toRoute(['index']) ?>">←</a>


    <div class="container">

        <div class="chatul scroll" id="chatul">
            <ul class="chat">
                <?php foreach ($tasks as $task) : ?>
                    <h5 class="namelogo"><?= User::find()->where(['id' => $task->user_id])->one()->name; ?></h5>
                    <li class="message left">
                        <img class="logo" src="<?= User::find()->where(['id' => $task->user_id])->one()->getImage(); ?>" alt="аватарка">
                        <div style="display: flex;">
                            <p><?= $task->proposed_task ?></p>
                            <?php if (Yii::$app->user->identity->isAdmin || $userId == $task->user_id) : ?>
                                <a href="<?= Url::toRoute(['video/delete', 'id' => $task->id]) ?>"><img class="del" src="/img/remove.svg"></a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="comment">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'proposed_task')->textarea(['class' => 'glow-on-hover', 'placeholder' => 'Напишите своё задание тут'])->label(false) ?>
            <?php if (!Yii::$app->user->isGuest) : ?>
                <button type="submit" class="glow-on-hover">Опубликовать</button>
            <?php endif; ?>
            <?php if (Yii::$app->user->isGuest) : ?>
                <button disabled style="cursor: url(https://assets.codepen.io/210284/hand-drawn.svg), default;" class="glow-on-hover">Войдите чтоб опубликовать</button>
            <?php endif; ?>
            <?php ActiveForm::end(); ?>
        </div>

    </div>












</body>













<!--

<div class="chat-container">
        <ul class="chat">
            <li class="message left">
                <img class="logo" src="https://randomuser.me/api/portraits/women/17.jpg" alt="">
                <p>I'm hungry!</p>
            </li>
            <li class="message right">
                <img class="logo" src="https://randomuser.me/api/portraits/men/67.jpg" alt="">
                <p>Hi hungry, nice to meet you. I'm Dad.</p>
            </li>
        </ul>
        <input type="text" class="text_input" placeholder="Message..." />
    </div>

-->