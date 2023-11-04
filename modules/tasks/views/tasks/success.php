<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\MyTwoAsset;
MyTwoAsset::register($this);
use app\assets\MyAsset;
MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\Task $model */

$this->title = 'Игра началась';
?>

<a class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>

<h2 class="success">+<?= $taskPrice?>₽</h2>

<div style="margin: 0 auto;">
<?= Html::a('Следующее задание', ['tasks/index'], ['class' => 'blue-btn a-btn']) ?>
</div>


