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

<a class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>

<div class="blackpink">HEPB</div>

<div class="wrapper2">
<button class="yellow" onmousedown="viewMoney()"><p id="btnmoney">Деньги</p><p id="showmoney" onmousedown="viewWord()"><?=$money?> Рублей</p></button>
<a id="btntry" class="a green" href="<?= Url::toRoute(['tasks/index']) ?>">Пробовать</a>
</div>



