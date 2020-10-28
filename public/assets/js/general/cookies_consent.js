{
    var html = document.getElementsByTagName('html')[0];
    var defaultLanguage = html.lang;
    var CC_Row = document.createElement("div");
    var CC_Button_Div = document.createElement("div");
    var CC_Consent_Button = document.createElement("button");
    var CC_Consent_Icon = document.createElement("span");

    CC_initElements();
    createLinkAndModalBoxForMore();

    CC_Button_Div.append(CC_Consent_Button);
    CC_Button_Div.append(CC_Consent_Icon);
    CC_Row.append(CC_Button_Div);
    html.insertBefore(CC_Row, html.firstChild.nextSibling);
}

function CC_initElements(){
    CC_Row.classList.add("row", "justify-content-center", "align-items-center",
        "text-center", "p-0", "m-0", "CC_Row");
    CC_Row.id='CC_Row';

    CC_Button_Div.classList.add("CC_Text", "col-12");

    CC_Consent_Button.classList.add("w-100", "btn", "text-white", "CC_No_Focus_Button");
    CC_Consent_Button.textContent=CC_translation(defaultLanguage, 'cookies-message')+' ';
    CC_Consent_Button.id="consentButton";
    CC_Consent_Button.onclick=function(){$('#consentButton').tooltip('hide'); CC_sendConsent();};

    CC_Consent_Icon.classList.add("CC_Consent_Icon");
    CC_Consent_Icon.innerHTML=
        "<svg width=\"1em\" height=\"1em\" viewBox=\"0 0 16 16\" class=\"bi bi-check-circle-fill\" fill=\"currentColor\" xmlns=\"http://www.w3.org/2000/svg\">\n" +
        "  <path fill-rule=\"evenodd\" d=\"M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z\"/>\n" +
        "</svg>";
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
            CC_showTooltip(1500);
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
                case 'more-link':
                    return "En savoir plus...";
                case 'modal-cookies-title':
                    return "Utilisation des cookies";
                case  'cookies-usage':
                    return "Ce site utilise les cookies pour la sécurité et le confort de navigation uniquement.";
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
                case 'more-link':
                    return "More about it...";
                case 'modal-cookies-title':
                    return "Cookies usage";
                case 'cookies-usage':
                    return "This site only uses cookies for security and navigation comfort.";
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

function createLinkAndModalBoxForMore(){
    let modal =
        "<div class=\"modal fade\" id=\"cookiesModal\" tabindex=\"-1\" aria-labelledby=\"cookiesUsageLabel\" aria-hidden=\"true\">\n" +
        "  <div class=\"modal-dialog modal-dialog-centered\">\n" +
        "    <div class=\"modal-content\">\n" +
        "      <div class=\"modal-header dark-rock\">\n" +
        "        <h5 class=\"modal-title white-text\" id=\"cookiesUsageLabel\">"+CC_translation(defaultLanguage, "modal-cookies-title")+"</h5>\n" +
        "        <button type=\"button\" class=\"close white-button CC_No_Focus_Button\" data-dismiss=\"modal\" aria-label=\"Close\">\n" +
        "          <span aria-hidden=\"true\">&times;</span>\n" +
        "        </button>\n" +
        "      </div>\n" +
        "      <div class=\"modal-footer\">" +
                 CC_translation(defaultLanguage, "cookies-usage") +
        "      </div>\n" +
        "    </div>\n" +
        "  </div>\n" +
        "</div>";
        modal = $(modal);
        modal.appendTo("body");

    let link =
        "<a type=\"button\" class=\"btn px-0 m-0 CC_More_Link\" data-toggle=\"modal\" data-target=\"#cookiesModal\">\n" +
        "["+CC_translation(defaultLanguage, "more-link") + "]\n" +
        "</a>\n";
    link = $(link);
    link.on('click',
        function(event){
            modal.modal({keyboard:true});
            event.stopPropagation();
        });
    link.appendTo(CC_Consent_Button);
}


$(document).ready(function() {
    CC_prepareTooltipOnConsentButton();
    CC_makeTooltipFirstAppearance();
});
