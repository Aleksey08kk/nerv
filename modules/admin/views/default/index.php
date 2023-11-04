<?php

use yii\bootstrap4\Nav;

?>


<div class="settings">
<?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
           ['label' => 'Задания', 'url' => ['/admin/task/index']],
           ['label' => 'усер', 'url' => ['/admin/user/index']],
        ],
    ]);
?>
</div>