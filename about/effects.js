var we = document.getElementById("we");

window.onload = function() {
    scrollFunction()
};

function scrollFunction() {
    setTimeout(function() {
        and.style.visibility = "visible";
    }, 1000);
}

var mybutton = document.getElementById("tothetop");

window.onscroll = function() {
    scrollFunctiontop();
    // imgfunction();
};

function scrollFunctiontop() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// imgscroll = document.getElementById("teamimg");

// function imgfunction() {
//     if (document.body.scrollTop > 100 && document.body.scrollTop < 500 || document.documentElement.scrollTop > 100 && document.documentElement.scrollTop < 500) {
//         imgscroll.style.transform = "scale(1.2)";
//     }
// }