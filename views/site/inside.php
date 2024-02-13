<?php

use app\models\TaskFromViewer;
use yii\helpers\Url;
use app\models\User;
use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>


<br><br><br>

<style>
    html,
    body {
        background-color: black;
        font-family: 'BlueCurve';
    }





    /*---------------------------------------------video ------------------------------------------------*/
    .block-video {
        margin: -43px auto 0 auto;
        border: 1px solid rgba(53, 53, 53, 0.507);
        border-radius: 10px;
    }

    .xx {
        width: 360px;
        height: 620px;
        border-radius: 10px;
        scroll-snap-type: y mandatory;
    }

    .xx::-webkit-scrollbar {
        display: none;
    }

    .vivi {
        scroll-snap-align: start;
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }
</style>

<div class="block-video">
    <div class="xx">
        <?php foreach ($videoModel as $video) : ?>
            <video controls muted class="vivi" id="vivi">
                <source src="<?= $video->getImage() ?>#t=0.1" />
            </video>
            <!-------------------------------------------------------------------------------------->
            <script>
                var videos = document.getElementsByTagName("video"),
                    fraction = 0.8;

                function checkScroll() {
                    for (var i = 0; i < videos.length; i++) {
                        var video = videos[i];
                        var x = video.offsetLeft,
                            y = video.offsetTop,
                            w = video.offsetWidth,
                            h = video.offsetHeight,
                            r = x + w, //right
                            b = y + h, //bottom
                            visibleX, visibleY, visible;
                        visibleX = Math.max(0, Math.min(w, window.pageXOffset + window.innerWidth - x, r - window.pageXOffset));
                        visibleY = Math.max(0, Math.min(h, window.pageYOffset + window.innerHeight - y, b - window.pageYOffset));
                        visible = visibleX * visibleY / (w * h);
                        if (visible > fraction) {
                            video.play();
                        } else {
                            video.pause();
                        }
                    }
                }
                window.addEventListener('scroll', checkScroll, false);
                window.addEventListener('resize', checkScroll, false);
            </script>


        <?php endforeach; ?>

    </div>
</div>