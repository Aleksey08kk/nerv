<?php
use yii\helpers\Url;
use app\assets\IndexAsset;
IndexAsset::register($this);
/** @var yii\web\View $this */
$this->title = 'охх Маскара';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>index</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

<a href="<?= Url::toRoute(['default/lobby']) ?>">lobby</a>
<!--<a href="<?= Url::toRoute(['default/room']) ?>">room</a>-->


</body>
</html>