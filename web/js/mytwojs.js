


    function hiddenTask(){
        document.getElementById('taskstart').style.visibility = 'hidden';
        document.getElementById("upload").style.visibility = 'hidden';
        document.getElementById("You-re-out").style.display = "block";
    }
    
    function viewTask(){
        document.getElementById("taskstart").style.display = "block";
        document.getElementById("timer").style.display = "block";
        document.getElementById("upload").style.display = "block";
        document.getElementById('btntaskstart').style.visibility = 'hidden';
        setTimeout(hiddenTask, 1000 * 60);
      
      };
/*----------------------------------------------------------------------------------------------------*/

/*--------------------------------------Таймер минуты секунды-------------------------------------------------*/

function startTimer(duration, display) {
  var timer = duration, minutes, seconds;
  setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds;

      if (--timer < 0) {
          timer = 0;
      }
  }, 1000);
}

window.onload = function () {
  var fiveMinutes = 60 * 1,
      display = document.querySelector('#timer');
  startTimer(fiveMinutes, display);
};