var we = document.getElementById("we");

var mybutton = document.getElementById("tothetop");

window.onscroll = function() {
    scrollFunctiontop();
    marginfunction();
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

var leftparent = document.getElementById('leftparent');
var container = document.getElementById('container');
const row1 = document.getElementById('row1');


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
    }
} else {

    function marginfunction() {
        if (document.body.scrollTop > window.innerHeight * 1.10326 || document.body.scrollTop > window.innerHeight * 3.2876 || document.body.scrollTop > window.innerHeight * 5.4858 || document.documentElement.scrollTop > window.innerHeight * 1.10326 || document.documentElement.scrollTop > window.innerHeight * 3.2876 || document.documentElement.scrollTop > window.innerHeight * 5.4858) {
            // leftparent.style.marginLeft = "-15px";
            leftparent.style.position = "fixed";
            leftparent.style.top = "0px";
            leftparent.style.marginTop = "0vh";
            if (document.body.scrollTop > window.innerHeight * 2.2882 || document.documentElement.scrollTop > window.innerHeight * 2.2882) {
                // leftparent.style.marginLeft = "0px";
                leftparent.style.position = "absolute";
                leftparent.style.marginTop = "230vh";
            }
            if (document.body.scrollTop > window.innerHeight * 3.2876 || document.documentElement.scrollTop > window.innerHeight * 3.2876) {
                // container.style.marginLeft = "0px";
                leftparent.style.position = "fixed";
                leftparent.style.bottom = "0";
                leftparent.style.marginTop = "-100vh";
            }
            if (document.body.scrollTop > window.innerHeight * 4.4255 || document.documentElement.scrollTop > window.innerHeight * 4.4255) {
                // container.style.marginLeft = "15px";
                leftparent.style.position = "absolute";
                leftparent.style.marginTop = "347vh";
            }
            if (document.body.scrollTop > window.innerHeight * 5.4858 || document.documentElement.scrollTop > window.innerHeight * 5.4858) {
                // container.style.marginLeft = "0px";
                leftparent.style.position = "fixed";
                leftparent.style.bottom = "0";
                leftparent.style.marginTop = "-200vh";
            }
            if (document.body.scrollTop > window.innerHeight * 6.7012 || document.documentElement.scrollTop > window.innerHeight * 6.7012) {
                // container.style.marginLeft = "15px";
                leftparent.style.position = "absolute";
                leftparent.style.marginTop = "484.7vh";
            }
        } else {
            leftparent.style.position = "absolute";
            leftparent.style.top = "initial";
            leftparent.style.bottom = "initial";
            leftparent.style.marginTop = "0vh";
        }
        // if (document.body.scrollTop > window.innerHeight*1.10326 || document.body.scrollTop > 2375 || document.body.scrollTop > 3963 || document.documentElement.scrollTop > window.innerHeight*1.10326 || document.documentElement.scrollTop > 2375 || document.documentElement.scrollTop > 3963) {
        //     // leftparent.style.marginLeft = "-15px";
        //     leftparent.style.position = "fixed";
        //     leftparent.style.top = "0px";
        //     leftparent.style.marginTop = "0vh";
        //     if (document.body.scrollTop > 1653 || document.documentElement.scrollTop > 1653) {
        //         // leftparent.style.marginLeft = "0px";
        //         leftparent.style.position = "absolute";
        //         leftparent.style.marginTop = "230vh";
        //     }
        //     if (document.body.scrollTop > 2375 || document.documentElement.scrollTop > 2375) {
        //         // container.style.marginLeft = "0px";
        //         leftparent.style.position = "fixed";
        //         leftparent.style.bottom = "0";
        //         leftparent.style.marginTop = "-100vh";
        //     }
        //     if (document.body.scrollTop > 3197 || document.documentElement.scrollTop > 3197) {
        //         // container.style.marginLeft = "15px";
        //         leftparent.style.position = "absolute";
        //         leftparent.style.marginTop = "347vh";
        //     }
        //     if (document.body.scrollTop > 3963 || document.documentElement.scrollTop > 3963) {
        //         // container.style.marginLeft = "0px";
        //         leftparent.style.position = "fixed";
        //         leftparent.style.bottom = "0";
        //         leftparent.style.marginTop = "-200vh";
        //     }
        //     if (document.body.scrollTop > 4841 || document.documentElement.scrollTop > 4841) {
        //         // container.style.marginLeft = "15px";
        //         leftparent.style.position = "absolute";
        //         leftparent.style.marginTop = "484.7vh";
        //     }
        // } else {
        //     leftparent.style.position = "absolute";
        //     leftparent.style.top = "initial";
        //     leftparent.style.bottom = "initial";
        //     leftparent.style.marginTop = "0vh";
        // }
    }
}