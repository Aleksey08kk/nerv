<?php
use yii\helpers\Url;
use app\assets\MyAsset;
MyAsset::register($this);

/** @var yii\web\View $this */

$this->title = 'Нерв';
?>

<a class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>
<!----------------------------------------------гравная страница------------------------------------------>
<br><br><br>
<div class="wrapper-inside">
    <div class="blackpink">HEPB</div>
</div>

<h3 class="no">Зрителям не доступна страница игроков</h3> 
<h5 class="noruls">
    Выбор Игрок ты или Зритель произошел в момент нажатия на кнопку "Зритель" или "Игрок".
    Чтоб посмотреть страницу "Игрок", зарегистрируйся снова.
</h5>
