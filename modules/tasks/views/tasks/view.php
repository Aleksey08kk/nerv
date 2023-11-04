<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Task $model */
/** @var yii\widgets\ActiveForm $form */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Загрузить изображение', ['set-image', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'task_name',
            'description:ntext',
            'completion_date',
            'completion_time',
            'image',
            'video',
            'viewed',
            'user_id',
            'status',
            'price',
        ],
    ]) ?>

</div>
