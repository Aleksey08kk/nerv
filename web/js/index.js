




   

document.addEventListener("DOMContentLoaded", hiddenCloseclick());
document.addEventListener("DOMContentLoaded", hiddenCloseclickk());
document.getElementById('click-to-hide').addEventListener("click", hiddenCloseclick);
document.getElementById('hidden-element').addEventListener("click", hiddenCloseclickk);
function hiddenCloseclick() {
    let x = document.getElementById('hidden-element');
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block"
    }
};


function hiddenCloseclickk() {
    let x = document.getElementById('click-to-hide');
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block"
    }
};








