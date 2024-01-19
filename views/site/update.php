<?php

use yii\helpers\Html;
use app\assets\ProfileAsset;

ProfileAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Изменить данные: ' . $model->name;
?>

<br>

<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
