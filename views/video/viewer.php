<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\GoalAsset;
use app\models\User;

//use kartik\widgets\StarRating;

GoalAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>

<body>
    <a class="a exit" href="<?= Url::toRoute(['site/index']) ?>">←</a>


    <div class="container">

        <div class="chatul scroll" id="chatul">
            <ul class="chat">
                <?php foreach ($tasks as $task) : ?>
                    <br>
                    <h5 class="namelogo"><?= User::find()->where(['id' => $task->user_id])->one()->name; ?></h5>
                    <li class="message left glow-task">
                        <img class="logo" src="<?= User::find()->where(['id' => $task->user_id])->one()->getImage(); ?>" alt="аватарка">
                        <p class="tel"><?= $task->proposed_task ?></p>
                        <div style="display: flex;">
                        <p class="pc"><?= $task->proposed_task ?></p>   

                            <!-----------------------------------------  Да - нет  ------------------------------------------------->
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <label class="coin" id="<?= $task->id ?>" data-url="<?= Url::toRoute(["/video/yes"]) ?>"></label>
                            <div class="<?= $task->id ?> coincount"><?= $task->stars ?></div>
                            <script>
                                $(document).ready(function() {
                                    $("#<?= $task->id ?>").bind("click", function(event) {
                                        var taskid = $(this).attr("id");
                                        var actionUrl = $(this).attr("data-url");
                                        $.ajax({
                                            url: actionUrl,
                                            method: 'post',
                                            data: {
                                                taskid: taskid,
                                                _csrf: yii.getCsrfToken()
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                $('.<?= $task->id ?>').load(' .<?= $task->id ?>');
                                                //$('.coinupop').load(' .coinupop');
                                            }
                                        });
                                    });
                                });
                            </script>

                            <?php if ($admin || $userId == $task->user_id) : ?>
                                <a class="del" href="<?= Url::toRoute(['video/delete', 'id' => $task->id]) ?>"><img class="imgx" src="/img/delete.svg"></a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>



        <div class="comment">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'task_name')->textinput(['class' => 'glow-on-hover', 'placeholder' => 'Дайте короткое название заданию'])->label(false) ?>
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

    <br>




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