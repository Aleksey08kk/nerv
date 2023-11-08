
var block = document.getElementById("scrollTop");
  block.scrollTop = block.scrollHeight;

  $(document).ready(function () {
    if (!$.browser.webkit) {
      $('.wrapper').html('<p>Sorry! Non webkit users.</p>');
    }
  });

function viewMoney(){
    document.getElementById("showmoney").style.display = "block";
    document.getElementById('btnmoney').style.visibility = 'hidden';
  };

  function viewWord(){
    document.getElementById('btnmoney').style.display = "block";
    document.getElementById("showmoney").style.visibility = 'hidden';
  };

 
 