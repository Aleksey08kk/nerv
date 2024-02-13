<?php

use app\models\Like;
use yii\helpers\Url;
use app\assets\IndexAsset;
use app\models\User;
use yii\helpers\Html;

IndexAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>



<a class="a exit" href="<?= Url::toRoute(['site/index']) ?>">←</a>
<!------------------------------------------------------------------------------------------------>
<br>
<div class="block-video">
    <div class="xx">
        <?php foreach ($videoModel as $video) : ?>
            <video controls class="vivi">
                <source src="<?= $video->getImage() ?>#t=0.1" />
            </video>
            <!-----------------------------------------Лайки------------------------------------------------->
            <div class="likebl">
       
                <?php
                
                if(Like::find()->where(['user_id' => $myid])->andWhere(['video_id' => $video->id])->one()){
                    echo app\models\StarRating::widget([
                        'name' => 'rating_21',
                        'pluginOptions' => [
                            'disabled' => Yii::$app->user->isGuest ? true : false,
                            'showClear' => false,
                            'showCaption' => false,
                            'stars' => 1,
                            'filledStar' => '<span class="likeful"></span>',
                            'emptyStar' => '<span class="likeful"></span>',
                            'min' => 0,
                            'max' => 1,
                            'step' => 1,
                            'size' => 'xs',
                            'language' => 'ru',
                        ]
                    ]);
                } else {
                echo app\models\StarRating::widget([
                    'name' => 'rating_21',
                    'pluginOptions' => [
                        'disabled' => Yii::$app->user->isGuest ? true : false,
                        'showClear' => false,
                        'showCaption' => false,
                        'stars' => 1,
                        'filledStar' => '<span class="likeful"></span>',
                        'emptyStar' => '<span class="likee"></span>',
                        'min' => 0,
                        'max' => 1,
                        'step' => 1,
                        'size' => 'xs',
                        'language' => 'ru',
                    ],
                    'pluginEvents' => [
                        'rating:change' => "function(event, value, caption){
                                    $.ajax({
                                    url: '/site/like',
                                    method: 'post',
                                    data:{
                                    like:value,
                                    id: '$video->id',
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
                <span class="likecount"><?= $video->like ?></span>
            </div>
            <div class="name-and-task">
                <a href="<?= Url::toRoute(['site/profile', 'userId' => $video->user_id]) ?>" class="down" title="Нажмите чтоб открыть страницу игрока">
                    <img class="img-ava" src="<?= User::find()->where(['id' => $video->user_id])->one()->getImage(); ?>" alt="info">
                    <h1 class="player-name"><?= User::find()->where(['id' => $video->user_id])->one()->name; ?></h1>
                </a>
                <span class="link-task" title="Нажмите чтоб смотреть других игроков выполнивших это задание">
                    <h1 class="player-task"><?= $video->task ?></h1>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
</div>

