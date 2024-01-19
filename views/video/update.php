<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TaskFromViewer $model */

$this->title = 'Update Task From Viewer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task From Viewers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-from-viewer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
