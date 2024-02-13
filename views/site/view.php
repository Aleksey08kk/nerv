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

        <?= DetailView::widget([
            'model' => $model,
            'options' => [
                'class' => 'widget'
            ],
            'attributes' => [
                'id',
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

        <h1><?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'blue-btn a-btn']) ?></h1>
        <br>

        
            <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn" />
            <label for="modal-btn">Пополнить баланс <i class="uil uil-expand-arrows"></i></label>
            <div class="modal">
                <div class="modal-wrap">
                    <img src="/img/pay.jpg" alt="">
                    <p class="insidemodel">Вощем сам закинь бабла на сайт через спб или переводом на номер: такой то такой то. Не забудь указать свой ID. Твой ID написан на этой странице</p>
                </div>
            </div>
        

        <br><br><br><br><br>
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
                'class' => 'a subsli red',
                'data' => [
                    'confirm' => 'Уверены что хотите удалить аккаунт?',
                    'method' => 'post',
                ],
            ]) ?>
        </div>

    </div>
</body>