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

        <div id="nav__links">
            <a class="nav__link" id="create__room__btn" href="lobby.html">
                Create Room
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ede0e0" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
            </a>
        </div>
    </header>

    <main id="room__lobby__container">
        
        <div id="form__container">
             <div id="form__container__header">
                 <p>👋 Create or Join Room</p>
             </div>
 
 
            <form id="lobby__form">
            <?= $myid ?>
                 <div class="form__field__wrapper">
                     <label>Your Name</label>
                     <input type="text" name="name" value="<?= $player ?>" />
                 </div>
 
                 <div class="form__field__wrapper">
                     <label>Room Name</label>
                     <input type="text" name="room"  value="<?= $id ?>" />
                 </div>
 
                 <div class="form__field__wrapper">
                     <button class="glow" type="submit">Go to Room 
                     <a href="<?= Url::toRoute(['room', 'player' => $player, 'myid' => $myid]) ?>">Начать</a>
                         <!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M13.025 1l-2.847 2.828 6.176 6.176h-16.354v3.992h16.354l-6.176 6.176 2.847 2.828 10.975-11z"/></svg>-->
                    </button>
                 </div>
            </form>
        </div>
     </main>
    
</body>
</html>