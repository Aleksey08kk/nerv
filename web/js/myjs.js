
var block = document.getElementById("scrollTop");
  block.scrollTop = block.scrollHeight;

  function playMusic(){
    var music = new Audio('/sound/knopka1.mp3');
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

 
  