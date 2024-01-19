<?php
use yii\helpers\Url;
use app\assets\StreamAsset;
StreamAsset::register($this);
/** @var yii\web\View $this */
$this->title = 'охх Маскара';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>test</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

    
<h1><?= $name = $_POST['name'];
echo $name;
echo $id;

?></h1>


</body>
</html>