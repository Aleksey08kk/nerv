<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskFromViewer $model */

$this->title = 'Create Task From Viewer';
$this->params['breadcrumbs'][] = ['label' => 'Task From Viewers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-from-viewer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
