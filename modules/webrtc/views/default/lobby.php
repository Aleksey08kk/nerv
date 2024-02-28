<?php
use app\assets\LobbyAsset;
use yii\helpers\Url;
LobbyAsset::register($this);
/** @var yii\web\View $this */
$this->title = 'охх Маскара';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Room</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

    <header id="nav">
       <div class="nav--list">
            <a href="lobby.html">
                <h3 id="logo">
                <a href="<?= Url::toRoute(['/site/index']) ?>"><h3 id="logo"><span>MACKAPA</span></h3></a>
                </h3>
            </a>
       </div>

      <!--  <div class="font" id="nav__links">
            Создание комнаты
        </div>-->
    </header>

    <main id="room__lobby__container">
        
        <div id="form__container">
             <div id="form__container__header">
               <p style="font-size: 20px;" class="font">Вход в комнату</p>
             </div>
 
 <!--
            <form id="lobby__form">
                 <div class="form__field__wrapper">
                     <label>Your Name</label>
                     <input type="text" name="name" value="?= $userModel->name ?>" />
                 </div>
 
                 <div class="form__field__wrapper">
                     <label>Room Name</label>
                     <input type="text" name="room"  value="?= $taskid ?>" />
                 </div>
 
                 <div class="form__field__wrapper">
                     <button class="glow" type="submit">Go to Room 
                         <!-<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>--
                    </button>
                 </div>
            </form>
-->

            <form id="lobby__form">
                 <div class="form__field__wrapper">
                     <label class="font">Твое имя</label>
                     <input class="font" disabled type="text" name="name" value="<?= $username ?>" />
                 </div>
 
                 <div class="form__field__wrapper">
                     <label class="font">Номер задания</label>
                     <input class="font" disabled type="text" name="room"  value="<?= $taskid ?>" />
                 </div>

                 <input hidden name="author"  value="<?= $author ?>" />

                 <div class="form__field__wrapper">
                     <button class="glow" type="submit">Войти в комнату 
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>
                    </button>
                 </div>
            </form>

            
        </div>
     </main>
    
</body>
</html>

