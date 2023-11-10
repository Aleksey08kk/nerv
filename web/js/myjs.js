
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

 
  