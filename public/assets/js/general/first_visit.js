{

    var html = document.getElementsByTagName('html')[0];
    var defaultLanguage = html.lang;
    var FV_Container = document.createElement("div");
    var FV_Row = document.createElement("div");
    var FV_Text_Div = document.createElement("div");
    var FV_Text = document.createElement("div");
    var FV_Flag_Div = document.createElement("div");
    var FV_Flags = [];
    var FV_Decorating_Div = [];

    initStyle();
    addFlags();

    for(let i=0; i<2; i++){
        let divDecoratingElement = document.createElement('div');
        divDecoratingElement.classList.add("FV-animated-div", "no-display");
        FV_Decorating_Div.push(divDecoratingElement);
    }

    FV_Flags.forEach(flag => FV_Flag_Div.append(flag));
    FV_Decorating_Div.forEach(div => FV_Text_Div.append(div));
    FV_Text_Div.append(FV_Text);
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
        flag.classList.add('FV-flag-img');

        let linkFlag = document.createElement("button");
        linkFlag.onclick=function(){languageChoose(flagNames[i])};
        linkFlag.classList.add("FV-flag", "p-0", "mx-lg-5", "mx-md-3", "m-2");
        linkFlag.id=flagNames[i];
        //flag.tabIndex=0;
        linkFlag.onmouseenter=function(){flagFocus(this)};
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

    FV_Text_Div.classList.add('col-12', "FV-animated-row", "p-0", "m-0");

    FV_Text.classList.add('col-12', 'pb-md-4', 'pb-3', 'pt-md-0', 'pb-3');
    FV_Text.style.fontFamily="Segoe UI";
    FV_Text.style.color="white";

    FV_Flag_Div.classList.add('col-12', 'm-0', 'p-0', 'no-display');
}

function changeDisplayedText(text){
    FV_Text.textContent=text;
}

function welcome(){
    clearFVDiv();
    changeDisplayedText(translation(defaultLanguage, "welcome")+' !');
    FV_Text.classList.add('welcome-message');
    FV_Decorating_Div.forEach(div => div.classList.remove("no-display"));
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
    FV_Text.classList.remove('welcome-message');
    FV_Text.classList.add("language-message");

    FV_Flag_Div.classList.remove('no-display');
    FV_Flag_Div.classList.add("language-message", "mt-2");

    focusDefaultLanguageFlag();
}

function focusDefaultLanguageFlag() {
    let FV_DefaultFocusedFlag = document.getElementById(defaultLanguage);
    if(FV_DefaultFocusedFlag){flagFocus(FV_DefaultFocusedFlag);}
}

function clearFVDiv(){
    FV_Text.textContent=null;
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
