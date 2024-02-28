<?php

use yii\helpers\Url;
use app\assets\GoalAsset;
use app\models\User;
use yii\helpers\Html;

GoalAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>

<body>
    <a class="a exit" href="<?= Url::toRoute(['site/index']) ?>">←</a>


    <div class="container">
        <div class="chatulp scroll" id="chatul">
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
                            <label class="coinplayer" id="<?= $task->id ?>" data-url="<?= Url::toRoute(["/video/yes"]) ?>"></label>
                            <div class="<?= $task->id ?> coincountplayer"><?= $task->stars ?></div>
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

                            <div class="uplostr">
                                <?php if (!Yii::$app->user->isGuest) : ?>
                                    <a class="del" href="<?= Url::toRoute(['/webrtc/default/lobby', 'taskid' => $task->id, 'myid' => Yii::$app->user->identity->id, 'author' => $task->user_id]) ?>"><img class="imgup" src="/img/stream.svg"></a>
                                <?php endif; ?>
                                <?php if (!Yii::$app->user->isGuest) : ?>
                                    <a class="del" href="<?= Url::toRoute(['set-image', 'taskid' => $task->id, 'myid' => Yii::$app->user->identity->id]) ?>"><img class="imgup" src="/img/upload.svg"></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>



    <h1 class="gostr"><img class="imgstr" src="/img/stream.svg"> - Выйти в прямой эфир и выполнять задания</h1>
    <h1 class="gostr"><img class="imgstr" src="/img/upload.svg"> - Загрузить заранее снятое видео</h1>
    <br><br>



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