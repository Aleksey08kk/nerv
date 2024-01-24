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
    <a class="a exit" href="<?= Url::toRoute(['index']) ?>">←</a>


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
                                    <a class="del" href="<?= Url::toRoute(['/webrtc/default/lobby', 'id' => $task->id, 'myid' => Yii::$app->user->identity->id, 'player' => User::find()->where(['id' => $task->user_id])->one()->name]) ?>"><img class="imgup" src="/img/stream.svg"></a>
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