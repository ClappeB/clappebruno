let work_sliding = document.getElementsByClassName('sliding-work');
let slided = false;
init_sliding_work();

function init_sliding_work(){
    for(let i = 0; i<work_sliding.length; i++){
        work_sliding[i].classList.add("get-in");
    }
}

$(document).ready(function() {

    window.addEventListener("scroll", function(e) {
        if(!slided && window.pageYOffset>0) {
            for(let i = 0; i<work_sliding.length; i++){
                work_sliding[i].classList.toggle("get-in");
                work_sliding[i].classList.toggle("get-out");
            }
            slided=true;
        }
    });

});
