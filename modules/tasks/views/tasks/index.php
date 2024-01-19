<?php

use app\models\Task;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\assets\ListAsset;
use yii\widgets\ActiveForm;

ListAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\TaskSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = 'Игра началсь';
?>

<br>

<a class="pp glow-on-hover" href="<?= Url::toRoute(['/site/inside']) ?>">🏃</a>
<br>
<span class="p glow-on-hover"><input id="full" type="button" value="⤡" onclick="toggleFullScreen(document.body)"></span>

<div class="listtasks scrol">
    <header>
        <?php foreach ($tasks as $task =>$v) :  if($task > $userCountTasks) continue;?>
            
            <div style="display: flex;">
                <p class="numtask"><?= $v->id ?></p>
                <?= Html::a('доступное задание', ['tasks/image', 'id' => $v->id], ['class' => 'blue-btn a-btn']) ?>
            </div>
        <?php endforeach; ?>
    </header>
</div>

<div class="listtasksno">
    <header>
        <?php foreach ($tasks as $task =>$v) :  if($task < $userCountTasks + 1) continue;?>
            
            <div style="display: flex; ">
                <p class="numtask"><?= $v->id ?></p>
                <span class="pink-btn a-btn">не доступно</span>
            </div>
        <?php endforeach; ?>
    </header>
</div>





