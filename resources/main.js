var links = document.getElementsByClassName('hr');
for (var i = 0; i < links.length; i++) {
    window.addEventListener("hashchange", function () {
        var hash1 = location.hash.substr(1);
        if(hash1!='sec1'){
            var active = document.getElementById('sec1');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
            active.className = "myanimation";
        }
        if(hash1!='sec2'){
            var active = document.getElementById('sec2');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        if(hash1!='sec3'){
            var active = document.getElementById('sec3');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        if(hash1!='sec4'){
            var active = document.getElementById('sec4');
            active.className = active.className.replace(" section1", " section");
            this.className += " section1";
        }
        var view = document.getElementById(hash1);
        view.className = active.className.replace(" section"," section1 myanimation");
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

const n2 = document.querySelector('.fixheight2');
const cn1 = document.querySelector('.deptnavpos');
const foot = document.querySelector('footer')
const but = document.querySelector('.none1');
const but1 = document.querySelector('.none2');
const but2 = document.querySelector('.none3');
const but3 = document.querySelector('.none4');
const but4 = document.querySelector('.none5');

cn1.addEventListener('click', () => {
    n2.classList.toggle('fixheight');
    cn1.classList.toggle('deptnavpostrans');
    foot.classList.toggle('footerdisplay');
    but.classList.toggle('block1');
    but1.classList.toggle('block1');
    but2.classList.toggle('block1');
    but3.classList.toggle('block1');
    but4.classList.toggle('block1');
});

// var circnav = document.getElementById('circlenav');
// function navfunction() {
//     circnav.className = "navpostrans";
//     displayfunction();
// }

// var nav1 = document.getElementById("movenav");

// var buttons = document.getElementById('butons');
// function displayfunction() {
//     if(nav1.style.visibility != "visible"){
//         console.log("True!!!");
//         nav1.className = "mynav";
//     }
//     else{
//         console.log('@@@');
//         circnav.addEventListener('click', () => {
//             nav1.classList.toggle("vertnav");
//         });
//         // nav1.classList.toggle("closemynav");
//         // circnav.className = "navpos";
//         // buttons.className = "mybuttonsheight"
//         // setTimeout(function() {nav1.style.visibility = "visible";},1000);
//     }
//     buttondisplayfunc();
// }

// function buttondisplayfunc(){
//     buttons.className = "mybuttons";
//     setTimeout(function () { buttons.style.display = "block";},1500);
// }