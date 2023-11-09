<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\assets\MyAsset;
use yii\widgets\ActiveForm;

MyAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Игра началсь';
?>

<a class="glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>


<div class="listtasks">
    <header>
        <?php foreach ($tasks as $task) : ?>
            <div style="display: flex;">
                <p class="numtask"><?= $task->id ?></p>
                <?= Html::a('НАЧАТЬ ЗАДАНИЕ', ['tasks/image', 'id' => $task->id], ['class' => 'blue-btn a-btn']) ?>
            </div>
        <?php endforeach; ?>
    </header>
</div>

