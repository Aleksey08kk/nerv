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
                'description',
                //'email:email',
                //'password',
                //'isAdmin',
                //'userPhoto',
                //'role',
                'money',
                'coins_from_viewers',
                'cout_task',
                
                
            ],
        ]) ?>

        <h1><?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'blue-btn a-btn']) ?></h1>
        <br>

        
            <input class="modal-btn" type="checkbox" id="modal-btn" name="modal-btn" />
            <label for="modal-btn">Пополнить баланс <i class="uil uil-expand-arrows"></i></label>
            <div class="modal">
                <div class="modal-wrap">
                    <img src="/img/pay.jpg" alt="">
                    <p class="insidemodel">Пополнение баланса осуществляется переводом на сбер 2202 2036 5172 8125 <br>. При переводе в сообщении укажите свой ID. <br>ID можно найти в своем профиле на сайте.<br> Через 5-10 минут средства зачислятся на счет вашего профиля. </p>
                    <p class="insidemodel">Пополнение может быть на суммы: 50р. 100р. 500р. или на ваше усмотрение.</p>
                </div>
            </div>

            
            <h3 class="insidemodel">Вывод средств осуществляется от 50р</h3>
            

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