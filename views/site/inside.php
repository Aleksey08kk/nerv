<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\MyAsset;
use yii\widgets\ActiveForm;

MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Нерв';
?>


<input class="glow-on-hover fullscreen n" type="button" value="⤡" onclick="toggleFullScreen(document.body)">
<!----------------------------------------------гравная страница ------------------------------------------>
<div class="wrapper-inside">
  <h2 class="neon welcome">Добро пожаловать в . . .</h2>
  <div class="blackpink">HEPB</div>
  <div class="blackpink__tagline">

    <?php if (Yii::$app->user->identity->isAdmin) : ?>
      <a class="a header" href="<?= Url::toRoute(['/admin']) ?>">Админ</a>
    <?php endif; ?>

    <a class="a header" id="myBtn">есть вопрос?</a>
    <!--<a class="a header" href="<?= Url::toRoute(['/']) ?>">Часто задаваемые вопросы</a>-->
    <a class="a header" href="#video">правила игры</a>
    <a class="a header" href="<?= Url::toRoute(['/auth/logout']) ?>">выход (<?= Yii::$app->user->identity->name ?>)</a>

  </div>
</div>


<!-------------------------------------------зритель или игрок?------------------------------------------>
<div class="vibor">
  <h2 class="choice">выбирай кто ты</h2>
  <h3 class="axtung">После нажатия на одну из кнопок, информация о выборе запишется в базу. Содержание другой будет недоступно</h3>
  <div class="wrapper2">
    <a class="a yellow" href="<?= Url::toRoute(['site/role']) ?>">Зритель</a>
    <p class="or neon">или</p>
    <a class="a green" href="<?= Url::toRoute(['tasks/default/role']) ?>">Игрок</a>
  </div>
</div>



<!--------------------------------------------------------------------------------------------------------->
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
    </div>
    <div class="modal-body">
      <br>
      <h1>вопросы и предложения</h1>
      <br><br><br><br>
      <a style="font-size:16px;font-weight:500;text-align:center;border-radius:8px;padding:10px 20px 10px 10px;background:#389ce9;text-decoration:none;color:#fff;" href="https://tttttt.me/Alekseyyeskel" target="_blank"><svg style="width:30px;height:20px;vertical-align:middle;margin:0px 5px;" viewBox="0 0 21 18">
          <g fill="none">
            <path fill="#ffffff" d="M0.554,7.092 L19.117,0.078 C19.737,-0.156 20.429,0.156 20.663,0.776 C20.745,0.994 20.763,1.23 20.713,1.457 L17.513,16.059 C17.351,16.799 16.62,17.268 15.88,17.105 C15.696,17.065 15.523,16.987 15.37,16.877 L8.997,12.271 C8.614,11.994 8.527,11.458 8.805,11.074 C8.835,11.033 8.869,10.994 8.905,10.958 L15.458,4.661 C15.594,4.53 15.598,4.313 15.467,4.176 C15.354,4.059 15.174,4.037 15.036,4.125 L6.104,9.795 C5.575,10.131 4.922,10.207 4.329,10.002 L0.577,8.704 C0.13,8.55 -0.107,8.061 0.047,7.614 C0.131,7.374 0.316,7.182 0.554,7.092 Z"></path>
          </g>
        </svg>Написать в телеграм</a>
    </div>
  </div>
</div>

<!--------------------------------------------------------------------------------------------------------->
<div class="vid">
  <h1 id="video" class="seeme">↓↓↓ посмотри меня ↓↓↓</h1>
  <video controls class="vivi">
    <source src="/sound/nerve.mp4" type="video/mp4" />
  </video>
</div>


<!--------------------------------------------------------------------------------------------------------->
<footer style="margin: 800px 0 0 0; padding: 0 0 0 30px;">
  <h5 style="font-size: 15px;">Все права защищены© 2023г.</h5>
</footer>