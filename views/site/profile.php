<?php

use yii\helpers\Url;
use yii\helpers\Html;
use app\assets\ProfileAsset;
use yii\widgets\ActiveForm;

ProfileAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'охх Маскара';
?>

<body>
<a class="a exit" href="<?= Url::toRoute(['site/index']) ?>">←</a>

<div class="container">
    
    <h1 class="name"><?= $userModel->name ?></h1>
    <img class="blackpink" src="<?= $userModel->getImage(); ?>" alt="avatar">

    <h3 class="description"><?= $userModel->description ?></h3>

</div>  

<?= Html::a('Подписаться', ['site/subscribe', 'otherUser' => $userModel->id], ['class' => 'blue-btn a-btn']) ?>
    



</body>