<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use app\assets\ProfileAsset;

ProfileAsset::register($this);

/** @var yii\web\View $this */
/** @var app\models\User $model */
?>

<body>
    <a class="a exit" href="<?= Url::toRoute(['site/myprofile']) ?>">←</a>

    <div class="container">



        <h1>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'a izm']) ?>
        </h1>




        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'widget'
            ],
            'attributes' => [
                //'id',
                'name',
                //'email:email',
                //'password',
                //'isAdmin',
                //'userPhoto',
                //'role',
                'money',
                'cout_task',
                'description',
            ],
        ]) ?>





        <div>
            <?= Html::a('Выйти из аккаунта', ['auth/logout'], [
                'class' => 'a subsli',
                'data' => [
                    'confirm' => 'Действительно хотите выйти из аккаунта?',
                    'method' => 'post',
                ],
            ]) ?>
            <br>
            <br>
            <?= Html::a('Удалить аккаунт', ['delete', 'id' => $model->id], [
                'class' => 'a subsli',
                'data' => [
                    'confirm' => 'Уверены что хотите удалить аккаунт?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>


    </div>
</body>