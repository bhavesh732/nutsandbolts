var we = document.getElementById("we");

var mybutton = document.getElementById("tothetop");

window.onscroll = function() {
    scrollFunctiontop();
    marginfunction();
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

const row1 = document.getElementById('row1');
const row2 = document.getElementById('row2');
const row3 = document.getElementById('row3');
const lastdiv = document.getElementById('lastdiv');

var mq = window.matchMedia("(max-width: 766px)");
if (mq.matches) {
    function marginfunction() {
        if (document.body.scrollTop > 787 || document.documentElement.scrollTop > 787) {
            row1.style.position = "static";
            row1.style.marginTop = "0vh";
        } else {
            row1.style.position = "static";
            row1.style.marginTop = "0px";
        }
        if (document.body.scrollTop > 787 || document.documentElement.scrollTop > 787) {
            row2.style.position = "static";
            row2.style.marginTop = "0vh";
        } else {
            row2.style.position = "static";
            row2.style.marginTop = "0px";
        }
        if (document.body.scrollTop > 787 || document.documentElement.scrollTop > 787) {
            row3.style.position = "static";
            row3.style.marginTop = "0vh";
        } else {
            row3.style.position = "static";
            row3.style.marginTop = "0px";
        }
    }
} else {
    row1.style.position = "absolute";

    function marginfunction() {
        if (document.body.scrollTop > 787 || document.documentElement.scrollTop > 787) {
            row1.style.position = "fixed";
        } else {
            row1.style.position = "absolute";
            row1.style.bottom = 0;
        }
        if (document.body.scrollTop > 2387 || document.documentElement.scrollTop > 2387) {
            row1.style.position = "absolute"
            row2.style.position = "fixed";
        } else {
            row2.style.position = "absolute";
        }
        if (document.body.scrollTop > 4037 || document.documentElement.scrollTop > 4037) {
            row2.style.position = "absolute"
            row3.style.position = "fixed";
        } else {
            row3.style.position = "absolute";
        }
        if (document.body.scrollTop > 5000 || document.documentElement.scrollTop > 5000) {
            row3.style.position = "absolute";
            row3.style.bottom = 0;
        }
    }
}