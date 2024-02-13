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
                        <div style="display: flex;">
                            <p><?= $task->proposed_task ?></p>
                            <div class="uplostr">
                                <?php if (!Yii::$app->user->isGuest) : ?>
                                    <a class="del" href="<?= Url::toRoute(['/webrtc/default/lobby', 'taskid' => $task->id, 'myid' => Yii::$app->user->identity->id]) ?>"><img class="imgup" src="/img/stream.svg"></a>
                                <?php endif; ?>
                                <?php if (!Yii::$app->user->isGuest) : ?>
                                    <a class="del" href="<?= Url::toRoute(['set-image', 'taskid' => $task->id, 'myid' => Yii::$app->user->identity->id]) ?>"><img class="imgup" src="/img/upload.svg"></a>
                                  <?php endif; ?>
                            </div>
                        </div>
                    </li>

<!-----------------------------------------звезды------------------------------------------------->
<div class="stars">
                        <?php
                        if (is_null($task->stars)) {
                            $stars = 0;
                        } else {
                            $stars = $task->stars / $task->count_vote;
                        }
                        if ($task->stars > 0) {
                            echo app\models\StarRating::widget([
                                'name' => 'rating_21',
                                'value' => $stars,
                                'pluginOptions' => [
                                    'disabled' => (bool)Yii::$app->user->isGuest,
                                    'showClear' => false,
                                    'showCaption' => false,
                                    'min' => 0,
                                    'max' => 5,
                                    'step' => 1,
                                    'size' => 'xs',
                                    'language' => 'ru',
                                ],
                                'pluginEvents' => [
                                    'rating:change' => "function(event, value, caption){
                                    $.ajax({
                                    url: '/video/stars',
                                    method: 'post',
                                    data:{
                                    stars:value,
                                    id: '$task->id',
                                    coutVote: 1,
                                    },
                                    dataType:'json',
                                    success:function(data){
                                    //console.log(data);
                                    $('message').html(data);
                                    }
                                    });
                                    }"
                                ],
                            ]);
                        } else {
                            echo app\models\StarRating::widget([
                                'name' => 'rating_21',
                                'pluginOptions' => [
                                    'disabled' => Yii::$app->user->isGuest ? true : false,
                                    'showClear' => false,
                                    'showCaption' => false,
                                    'min' => 0,
                                    'max' => 5,
                                    'step' => 1,
                                    'size' => 'xs',
                                    'language' => 'ru',
                                ],
                                'pluginEvents' => [
                                    'rating:change' => "function(event, value, caption){
                                    $.ajax({
                                    url: '/video/stars',
                                    method: 'post',
                                    data:{
                                    stars:value,
                                    id: '$task->id',
                                    coutVote: 1,
                                    },
                                    dataType:'json',
                                    success:function(data){
                                    //console.log(data);
                                    $('message').html(data);
                                    }
                                    
                                    });
                                    }"
                                ],
                            ]);
                        }
                        ?>
                        <p class="vote"><?= $task->count_vote ?></p>
                    </div>

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