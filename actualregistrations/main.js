var links = document.getElementsByClassName('hr');
for (var i = 0; i < links.length; i++) {
    window.addEventListener("hashchange", function() {
        var hash1 = location.hash.substr(1);
        if (hash1 != 'sec1') {
            var active = document.getElementById('sec1');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
            active.className = "myanimation";
        }
        if (hash1 != 'sec2') {
            var active = document.getElementById('sec2');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        if (hash1 != 'sec3') {
            var active = document.getElementById('sec3');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        if (hash1 != 'sec4') {
            var active = document.getElementById('sec4');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        var view = document.getElementById(hash1);
        view.className = active.className.replace(" section", " section1 myanimation");
    });
}

const n1 = document.querySelector('.vertnav');
const cn = document.querySelector('.navpos');
const bu = document.querySelector('.none');


cn.addEventListener('click', () => {
    n1.classList.toggle('mynav');
    cn.classList.toggle('navpostrans');
    bu.classList.toggle('block');
});

const fobu = document.querySelector('.formbutton');
const fosel = document.querySelector('.formselect');

fobu.addEventListener('click', () => {
    fosel.classList.toggle('seldis');
});

var mybutton = document.getElementById("tothetop");

window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
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