<?php

use app\assets\LobbyAsset;
use app\models\User;
use yii\helpers\Url;

LobbyAsset::register($this);
/** @var yii\web\View $this */
$this->title = 'охх Маскара';
?>


<?php foreach ($streamModel as $room) : ?>
    <a href="<?= Url::toRoute(['default/lobbyy', 'taskid' => $room->task_id, 'username' => User::find()->where(['id' => $room->user_id])->one()->name]) ?>">комната</a>                
<?php endforeach; ?>



</html>