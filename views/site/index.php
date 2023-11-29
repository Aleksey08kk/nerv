<?php

use yii\helpers\Url;
use app\assets\MyAsset;

MyAsset::register($this);

/** @var yii\web\View $this */

$this->title = 'Нерв';
?>

<span class="p glow-on-hover"><input id="full" type="button" value="⤡" onclick="toggleFullScreen(document.body)"></span>

<div class="wrapper">

    <div class="hidden">
        <ul data-time="3000">
            <li data-hue="197">Н</li>
            <li data-hue="0">Е</li>
            <li data-hue="197">Р</li>
            <li data-hue="197">В</li>
        </ul>
    </div>
    <canvas class="canv"></canvas>

    <div class="blackpink" id="wind"></div>

    <div class="blackpink__tagline">
        <?php if (Yii::$app->user->isGuest) : ?>
            <a class="a headerr" href="<?= Url::toRoute(['auth/signup']) ?>">регистрация</a>
            <a class="a headerr" href="<?= Url::toRoute(['auth/login']) ?>">войти</a>
        <?php endif; ?>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <a class="a header" href="<?= Url::toRoute(['/auth/logout']) ?>">выход (<?= Yii::$app->user->identity->name ?>)</a>
            <a class="a headerr" href="<?= Url::toRoute(['site/inside']) ?>">войти</a>
        <?php endif; ?>
    </div>
</div>


<div class="playpouse">
<audio id="player" src="sound/play.wav"></audio>
<div class="flex cen"> 
  <p class="play" onclick="document.getElementById('player').play()">▷</p> 
  <p class="pouse" onclick="document.getElementById('player').pause()">❚❚</p>
  <!--<button onclick="document.getElementById('player').volume += 0.1">Vol +</button> -->
  <!--<button onclick="document.getElementById('player').volume -= 0.1">Vol -</button> -->
</div>
</div>



<details class="how-inter">
    <summary class="summary">что такое нерв?</summary>
    <ul class="ul">
        <li class="li">- игра делится на две роли: зрители и игроки. Зрители придумывают задания для игроков, назначают за их выполнение денежное вознаграждение. Игроки выполняют задания и получают в конце игры денежное вознаграждение.</li>
        <li class="li">- прояви смекалку, ведь из воды можно выйти сухим...</li>
        <li class="li">- не готов идти дальше? попроси друга пройти за тебя испытание. есть условие*</li>
        <li class="li">- поиграй со мной... если не боишься</li>
    </ul>
</details>

<!--
<details class="how-inter2">
    <summary class="summary">как начать?</summary>
    <ul class="ul">
        <li class="li">- ознакомьтесь с Пользовательским соглашением</li>
        <li class="li">- скачайте телеграм</li>
        <li class="li">- оплатите игру. напишите "нерв" сюда - <br><a style="font-size:16px;font-weight:500;text-align:center;border-radius:8px;padding:10px 20px 10px 10px;background:#389ce9;text-decoration:none;color:#fff;" href="https://tttttt.me/Alekseyyeskel" target="_blank"><svg style="width:30px;height:20px;vertical-align:middle;margin:0px 5px;" viewBox="0 0 21 18">
                    <g fill="none">
                        <path fill="#ffffff" d="M0.554,7.092 L19.117,0.078 C19.737,-0.156 20.429,0.156 20.663,0.776 C20.745,0.994 20.763,1.23 20.713,1.457 L17.513,16.059 C17.351,16.799 16.62,17.268 15.88,17.105 C15.696,17.065 15.523,16.987 15.37,16.877 L8.997,12.271 C8.614,11.994 8.527,11.458 8.805,11.074 C8.835,11.033 8.869,10.994 8.905,10.958 L15.458,4.661 C15.594,4.53 15.598,4.313 15.467,4.176 C15.354,4.059 15.174,4.037 15.036,4.125 L6.104,9.795 C5.575,10.131 4.922,10.207 4.329,10.002 L0.577,8.704 C0.13,8.55 -0.107,8.061 0.047,7.614 C0.131,7.374 0.316,7.182 0.554,7.092 Z"></path>
                    </g>
                </svg>Написать в телеграм</a>
                откроется инструкция.
        </li>
        <li class="li">- если есть промокод: "нерв и промокод" <br><a style="font-size:16px;font-weight:500;text-align:center;border-radius:8px;padding:10px 20px 10px 10px;background:#389ce9;text-decoration:none;color:#fff;" href="https://tttttt.me/Alekseyyeskel" target="_blank"><svg style="width:30px;height:20px;vertical-align:middle;margin:0px 5px;" viewBox="0 0 21 18">
                    <g fill="none">
                        <path fill="#ffffff" d="M0.554,7.092 L19.117,0.078 C19.737,-0.156 20.429,0.156 20.663,0.776 C20.745,0.994 20.763,1.23 20.713,1.457 L17.513,16.059 C17.351,16.799 16.62,17.268 15.88,17.105 C15.696,17.065 15.523,16.987 15.37,16.877 L8.997,12.271 C8.614,11.994 8.527,11.458 8.805,11.074 C8.835,11.033 8.869,10.994 8.905,10.958 L15.458,4.661 C15.594,4.53 15.598,4.313 15.467,4.176 C15.354,4.059 15.174,4.037 15.036,4.125 L6.104,9.795 C5.575,10.131 4.922,10.207 4.329,10.002 L0.577,8.704 C0.13,8.55 -0.107,8.061 0.047,7.614 C0.131,7.374 0.316,7.182 0.554,7.092 Z"></path>
                    </g>
                </svg>Написать в телеграм</a>
        </li>
        <li class="li">- в ответ получите логин и пароль</li>
        <li class="li">- войдите на сайт</li>
    </ul>
</details>
        -->

<details class="how-inter2">
    <summary class="summary">Пользовательское соглашение</summary>
    <ul class="ul">
        <li class="li"><mark>до 31.02.2024г. игра бесплатна для всех. так же деньги победителям не выплачиваются.</mark></li>
        <li class="li"></li>
        <li class="li">1. выполняя задания каждый игрок несет ответственность за себя сам.</li>
        <li class="li">2. не навреди себе, окружающим и животным.</li>
        <li class="li">3. любая сломанная вещь или порваная одежда остается под вашей ответственностью.</li>
        <li class="li">4. Унижение чести и достоинства, выраженное в неприличной форме себя или других запрещается и корается вылетом.</li>
        <li class="li">5. если игрок или зритель нарушает правила, мы будем вынуждены удалить его из игры.</li>
    </ul>
</details>




<footer style="margin: 800px 0 0 0; padding: 0 0 0 30px;">
    <h5 style="font-size: 15px;">Все права защищены© 2023г.</h5>
</footer>