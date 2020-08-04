{

    var html = document.getElementsByTagName('html')[0];
    var defaultLanguage = html.lang;
    var FV_Container = document.createElement("div");
    var FV_Row = document.createElement("div");
    var FV_Text_Div = document.createElement("div");
    var FV_Flag_Div = document.createElement("div");
    var FV_Flags = [];

    initStyle();
    addFlags();

    FV_Flags.forEach(flag => FV_Flag_Div.append(flag));
    FV_Container.append(FV_Text_Div);
    FV_Container.append(FV_Flag_Div);
    FV_Row.append(FV_Container);
    html.insertBefore(FV_Row, html.firstChild.nextSibling);

}

function addFlags(){
    let pathToFlagFile = "/assets/icons/flags/";
    let flagIconName = '_flag.png';

    let flagNames = ['fr', 'en'];
    for(let i=0; i<flagNames.length; i++){
        let flag = document.createElement("img");
        flag.src=pathToFlagFile+flagNames[i]+flagIconName;
        flag.classList.add('FV-flag', 'my-2');
        flag.id=flagNames[i];
        flag.tabIndex=0;
        flag.onmouseenter=function(){flagFocus(this)};

        let linkFlag = document.createElement("a");
        linkFlag.onclick=function(){languageChoose(flagNames[i])};
        linkFlag.classList.add("link-flag", "m-md-3", "p-md-3", "m-2", "p-2");
        linkFlag.append(flag);

        FV_Flags.push(linkFlag);
    }
}

function flagFocus(element) {
    element.focus();
}

function languageChoose(language) {
    return $.ajax({
        url: '/'+translation(defaultLanguage, "language-route")+'/'+language,
        type: 'PUT',
        data: 'previousRoute='+window.location.href+'&_token='+getCSRFToken(),
        success: function(data){
            $(location).attr("href", data);
        },
        error: function () {
            console.log(translation(defaultLanguage, 'ajax'));
        }
    });
}

function initStyle(){
    FV_Row.classList.add("row", "justify-content-center", "align-items-center", "h-100", "w-100",
        "text-center", "p-0", "m-0");
    FV_Row.style.position="fixed";
    FV_Row.style.backgroundColor="transparent";
    FV_Row.style.zIndex="10";

    FV_Container.classList.add("container-fluid", "p-0");

    FV_Text_Div.classList.add('col-12');
    FV_Text_Div.style.fontFamily="Segoe UI";
    FV_Text_Div.style.color="white";

    FV_Flag_Div.classList.add('col-12', 'm-0', 'p-0', 'no-display');
}

function changeDisplayedText(text){
    FV_Text_Div.textContent=text;
}

function welcome(){
    clearFVDiv();
    changeDisplayedText(translation(defaultLanguage, "welcome")+' !');
    FV_Text_Div.classList.add('welcome-message');
}

function blackScreen(){
    FV_Row.style.backgroundColor="rgba(0,0,0,0.6)";
}

function choosingLanguage(){
    clearFVDiv();
    rearrangeStyleForFlagDisplay();
    changeDisplayedText(translation(defaultLanguage, "language-choosing"));
}

function rearrangeStyleForFlagDisplay() {
    FV_Text_Div.classList.remove('welcome-message');
    FV_Text_Div.classList.add("language-message", "mb-4");

    FV_Flag_Div.classList.remove('no-display');
    FV_Flag_Div.classList.add("language-message", "mt-2");

    let FV_DefaultFocusedFlag = document.getElementById(defaultLanguage)
    if(FV_DefaultFocusedFlag){flagFocus(FV_DefaultFocusedFlag);}
}

function clearFVDiv(){
    FV_Text_Div.textContent=null;
}

function translation(language, message){
    switch(language) {
        case 'fr':
            switch(message) {
                case 'language-route':
                    return "langue";
                case 'welcome':
                    return "Bonjour";
                case 'language-choosing':
                    return "Choisissez votre langue";
                case 'ajax':
                    return "Problème lors de la requête au serveur";
                default:
                    return "Pas de traduction";
            }
            break;

        default : //en
            switch(message) {
                case 'language-route':
                    return "language";
                case 'welcome':
                    return "Welcome";
                case 'language-choosing':
                    return "Choose your language";
                case 'ajax':
                    return "Problem with the request to the server";
                default:
                    return "No translation";
            }
            break;

    }

}

function getCSRFToken(){
    return $('meta[name="csrf-token"]').attr('content');
}

$(document).ready(function() {
    blackScreen();
    setTimeout(welcome, 500);
    setTimeout(choosingLanguage, 2000);
});
