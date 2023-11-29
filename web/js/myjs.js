var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


/*------------------------------------------------------------------------------------------------------*/

var block = document.getElementById("scrollTop");
  block.scrollTop = block.scrollHeight;

function playMusic() {
  var music = new Audio('/sound/like.mp3');
  music.play();
}
function playExit() {
  var music = new Audio('/sound/exit.mp3');
  music.play();
}
function playButton() {
  var music = new Audio('/sound/button.mp3');
  music.play();
}
function playSong() {
  var music = new Audio('/sound/song.mp3');
  music.play();
}

function viewMoney(){
    document.getElementById("showmoney").style.display = "block";
    document.getElementById('btnmoney').style.visibility = 'hidden';
  };

  function viewWord(){
    document.getElementById('btnmoney').style.display = "block";
    document.getElementById("showmoney").style.visibility = 'hidden';
  };

 
/*-----------------------------------------------кнопка для полноэкранного режима --------------------*/
  function toggleFullScreen(elem) {
    // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}









