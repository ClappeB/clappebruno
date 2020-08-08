{
    var html = document.getElementsByTagName('html')[0];
    var defaultLanguage = html.lang;
    var CC_Row = document.createElement("div");
    var CC_Button_Div = document.createElement("div");
    var CC_Consent_Button = document.createElement("button");

    CC_initElements();

    CC_Button_Div.append(CC_Consent_Button);
    CC_Row.append(CC_Button_Div);
    html.insertBefore(CC_Row, html.firstChild.nextSibling);
}

function CC_prepareTooltipOnConsentButton(){
    $('#consentButton').attr("data-toggle", "tooltip");
    $('#consentButton').attr("data-placement", "top");
    $('#consentButton').attr("title", CC_translation(defaultLanguage, "button-tooltip"));
    $('#consentButton').tooltip({boundary: 'window'});
}

function CC_makeTooltipFirstAppearance(){
    if(CC_isNotShowingFirstVisitLanguageChoose()){
        if(CC_isMobile()){
            CC_makeTooltipAppearOnlyOnce(3000);
        } else {
            CC_showTooltip(2000);
        }
    }
}

function CC_showTooltip(milliseconds){
    $('#consentButton').tooltip('show');
    setTimeout(function(){
        $('#consentButton').tooltip('hide');
    }, milliseconds);
}

function CC_makeTooltipAppearOnlyOnce(milliseconds){
    CC_showTooltip(milliseconds);
    setTimeout(function(){$('#consentButton').tooltip('dispose');}, milliseconds);
}

function CC_isMobile(){
    return (document.getElementsByTagName('body')[0]).classList.contains("body-mobile");
}

function CC_isNotShowingFirstVisitLanguageChoose(){
    return (document.getElementById('FV_Row')==null);
}

function CC_sendConsent() {
    $.ajax({
        url: '/cookies',
        type: 'POST',
        data: 'consent='+true+'&_token='+getCSRFToken(),
        success: function(data){
            $('#consentButton').tooltip('dispose');
            $('#CC_Row').remove();
        },
        error: function () {
            console.log(CC_translation(defaultLanguage, 'ajax'));
        }
    });
}

function CC_initElements(){
    CC_Row.classList.add("row", "justify-content-center", "align-items-center",
        "text-center", "p-0", "m-0", "CC_Row");
    CC_Row.id='CC_Row';

    CC_Button_Div.classList.add("CC_Text", "col-12");

    CC_Consent_Button.classList.add("w-100", "btn", "text-white", "CC_Consent_Button");
    CC_Consent_Button.textContent=CC_translation(defaultLanguage, 'cookies-message');
    CC_Consent_Button.id="consentButton";
    CC_Consent_Button.onclick=function(){$('#consentButton').tooltip('hide'); CC_sendConsent();};
}

function CC_translation(language, message){
    switch(language) {
        case 'fr':
            switch(message) {
                case 'consent-button':
                    return "Accepter";
                case 'cookies-message':
                    return "Ce site utilise des cookies pour améliorer votre confort. En poursuivant votre navigation vous acceptez leur utilisation.";
                case 'button-tooltip':
                    return "Cliquez pour accepter les cookies.";
                case 'ajax':
                    return "Problème lors de la requête au serveur";
                default:
                    return "Pas de traduction";
            }
            break;

        default : //en
            switch(message) {
                case 'consent-button':
                    return "Accept";
                case 'cookies-message':
                    return "This site uses cookies for your navigation comfort. By continuing on this site, you accept their usage.";
                case 'button-tooltip':
                    return "Click to accept cookies.";
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
    CC_prepareTooltipOnConsentButton();
    CC_makeTooltipFirstAppearance();
});
