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
            <div class="likeblone">

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <div id="likebl" class="likebl">


                    <label class="coinupop" id="coinup"></label>
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <label class="coin"></label>
                    <?php endif; ?>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <label onclick="playCoins()" class="coin" id="<?= $video->id ?>" name="<?= $video->user_id ?>" for="coin" data-url="<?= Url::toRoute(["/site/coins"]) ?>"></label>
                    <?php endif; ?>
                    <div class="<?= $video->id ?> coincount"><?= $video->coins ?></div>
                    <script>
                        $(document).ready(function() {
                            $("#<?= $video->id ?>").bind("click", function(event) {
                                var videoid = $(this).attr("id");
                                var authorid = $(this).attr("name");
                                var actionUrl = $(this).attr("data-url");
                                $.ajax({
                                    url: actionUrl,
                                    method: 'post',
                                    data: {
                                        videoid: videoid,
                                        authorid: authorid,
                                        _csrf: yii.getCsrfToken()
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


                    <br>


                    <?php if (Yii::$app->user->isGuest) : ?>
                        <label class="likee"></label>
                    <?php endif; ?>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <label onclick="playLike()" class="<?= $video->id_for_likes ?> likee" id="<?= $video->id ?>" name="<?= $video->user_id ?>" data-url="<?= Url::toRoute(["/site/like"]) ?>"></label>
                    <?php endif; ?>
                    <div class="coincount" id="<?= $video->id_for_likes ?>"><?= $video->like ?></div>
                    <script>
                        $(document).ready(function() {
                            $(".<?= $video->id_for_likes ?>").bind("click", function(event) {
                                var videoid = $(this).attr("id");
                                var authorid = $(this).attr("name");
                                var actionUrl = $(this).attr("data-url");
                                $.ajax({
                                    url: actionUrl,
                                    method: 'post',
                                    data: {
                                        videoid: videoid,
                                        authorid: authorid,
                                        _csrf: yii.getCsrfToken()
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        $('#<?= $video->id_for_likes ?>').load(' #<?= $video->id_for_likes ?>');
                                    }
                                });
                            });
                        });
                    </script>
                </div>

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