function clearDiv(div){
    div.innerHTML='';
}

function getLocale(){
    return document.getElementsByTagName('html')[0].lang;
}

$(document).ready(function() {
    let resume_div = document.getElementById("resume_div");
    let resume_name = resume_div.firstElementChild.id;
    let newImage = new Image();
    newImage.onload = function(){
        clearDiv(resume_div);
        resume_div.append(this);
    };
    newImage.src="resources/resume/"+getLocale()+'/'+resume_name+'.svg';
    newImage.classList.add('resume-border', 'w-100');
});
