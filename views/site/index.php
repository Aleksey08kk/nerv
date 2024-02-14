<?php

use app\models\Like;
use app\models\TaskFromViewer;
use yii\helpers\Url;
use app\assets\IndexAsset;
use app\models\User;
use yii\helpers\Html;

IndexAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>


<header class="header">
    <img class="img-logo" src="/img/logo.png" alt="">
    <!--<h1 class="logo-name">oxx mackapa</h1>-->


    <div class="login">
        <?php if (Yii::$app->user->isGuest) : ?>
            <a class="a" href="<?= Url::toRoute(['auth/signup']) ?>">регистрация</a>
            <a class="a" href="<?= Url::toRoute(['auth/login']) ?>">войти</a>
        <?php endif; ?>

        <?php if (!Yii::$app->user->isGuest) : ?>
            <a class="a profile" href="<?= Url::toRoute(['site/myprofile']) ?>"></a>
        <?php endif; ?>
    </div>
</header>

<!------------------------------------------------------------------------------------------------>
<input type="checkbox" id="nav-toggle" hidden>
<input type="checkbox" id="nav-toggle2" hidden>
<!------------------------------------------------------------------------------------------------>


<div class="block-video">
    <div class="xx">
        <?php foreach ($videoModel as $video) : ?>
            <video controls class="vivi" id="vivi">
                <source src="<?= $video->getImage() ?>#t=0.1" />
            </video>
            <!-------------------------------------------------------------------------------------->

            <!-----------------------------------------Лайки------------------------------------------------->
            <div id="likebl" class="likebl">


                <label class="coinupop" id="coinup"></label>
                
                <label onclick="playCoins()" class="coin" id="<?= $video->id ?>" name="<?= $video->user_id ?>" for="coin"></label>
                <div class="<?= $video->id ?> coincount"><?= $video->coins ?></div>
                <script>
                    $(document).ready(function() {
                        $("#<?= $video->id ?>").bind("click", function(event) {
                            var videoid = $(this).attr("id");
                            var authorid = $(this).attr("name");
                            $.ajax({
                                url: '/site/coins',
                                method: 'post',
                                data: {
                                    videoid: videoid,
                                    authorid: authorid
                                },
                                dataType: 'json',
                                success: function(response) {
                                    $('.<?= $video->id ?>').load(' .<?= $video->id ?>');
                                    $('.coinupop').load(' .coinupop');
                                }
                            });
                        });
                    });
                </script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




                <br>



                <?php
                if (Like::find()->where(['user_id' => $myid])->andWhere(['video_id' => $video->id])->one()) {
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
                                    //$('#likecount').load('/site/index #likecount');
                                    }
                                    
                                    });
                                    }"
                        ],
                    ]);
                }
                ?>

                <div id="likecount" class="likecount"><?= $video->like ?></div>
            </div>
            <div class="name-and-task">
                <a href="<?= Url::toRoute(['site/profile', 'userId' => $video->user_id]) ?>" class="down" title="Нажмите чтоб открыть страницу игрока">
                    <img class="img-ava" src="<?= User::find()->where(['id' => $video->user_id])->one()->getImage(); ?>" alt="info">
                    <h1 class="player-name"><?= User::find()->where(['id' => $video->user_id])->one()->name; ?></h1>
                </a>

                <span class="link-task" title="Нажмите чтоб смотреть других игроков выполнивших это задание">
                    <h1 class="player-task"><?= Html::a($video->task, ['site/onetasks', 'taskid' => TaskFromViewer::find()->where(['proposed_task' => $video->task])->one()->id], ['class' => 'player-task']) ?></h1>
                </span>

            </div>
        <?php endforeach; ?>
    </div>
</div>


<!------------------------------------ выдвигающаяся панель ------------------------------------------------>
<nav class="nav">
    <label id="click-to-hide" for="nav-toggle" class="nav-toggle" onclick></label>
    <h2 class="logo">
        <a href="#">Задания которые сейчас кто то выполняет в прямом эфире</a>
    </h2>
    <ul>
        <li>
            <?php foreach ($streamModel as $room) : ?>
                <a href="<?= Url::toRoute(['/webrtc/default/lobbyy', 'taskid' => $room->task_id, 'username' => $myname]) ?>"><?= TaskFromViewer::find()->where(['id' => $room->task_id])->one()->task_name ?></a>
            <?php endforeach; ?>

            <!--<li><a style="font-family: 'BlueCurve';" href="<?= Url::toRoute(['/webrtc/default/index']) ?>">Сейчас онлайн</a>-->
            <!-- <li><a href="#3">Три</a>
        <li><a href="#4">Четыре</a>
        <li><a href="#5">Пять</a>
        <li><a href="#6">Шесть</a>
        <li><a href="#7">Семь</a>-->
    </ul>
</nav>

<div class="mask-content"></div>


<!------------------------------------ выдвигающаяся панель поиск ----------------------------------------------->

<nav class="nav2">
    <label id="hidden-element" for="nav-toggle2" class="nav-toggle2" onclick></label>
    <br><br><br>
    <h2 class="hhh">Выбирай кто ты есть:</h2>
    <ul>
        <br>
        <li class="hhh">Зритель
        <li><a style="font-family: 'BlueCurve';" href="<?= Url::toRoute(['video/viewer']) ?>">Предложить задание</a>
            <br><br>
        <li class="hhh">Игрок
        <li><a style="font-family: 'BlueCurve';" href="<?= Url::toRoute(['video/player']) ?>">Выбрать задание</a>
        <li>
    </ul>
</nav>
<div class="mask-content2"></div>

<!---------------------------------------------------------------------------------------------------------->