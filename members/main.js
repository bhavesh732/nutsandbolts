var links = document.getElementsByClassName('hr');
for (var i = 0; i < links.length; i++) {
    window.addEventListener("hashchange", function() {
        var hash1 = location.hash.substr(1);
        if (hash1 != 'current') {
            var active = document.getElementById('current');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        if (hash1 != 'past') {
            var active = document.getElementById('past');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        //     if (hash1 != 'sec3') {
        //         var active = document.getElementById('sec3');
        //         active.className = active.className.replace(" section1", " section");
        //         this.className += " section1";
        //     }
        //     if (hash1 != 'sec4') {
        //         var active = document.getElementById('sec4');
        //         active.className = active.className.replace(" section1", " section");
        //         this.className += " section1";
        //     }
        var view = document.getElementById(hash1);
        view.className = active.className.replace(" section", " section1");
    });
}

var links = document.getElementsByClassName('butt');
for (var i = 0; i < links.length; i++) {
    links[i].addEventListener("click", function() {
        var active = document.getElementsByClassName('nav-a');
        active[0].className = active[0].className.replace(" nav-a", "");
        this.className += " nav-a";
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