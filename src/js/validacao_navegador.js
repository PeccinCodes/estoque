
// VALIDACAO DO NAVEGADOR FIREFOX
var sBrowser, sUsrAg = navigator.userAgent;
if (sUsrAg.indexOf("Firefox") > -1) {

    // ADICIONA UM UMA NOVA CLASSE NO CONTAINER
    let container = document.getElementById('idcontainer');
    container.classList.remove('container');
    container.classList.add('containerInativo');

    sBrowser = "Mozilla Firefox";
    alert("Voc� est� utilizando o " + sBrowser + ", esta vers�o n�o � compat�vel com esta aplica��o!\nRecomendamos utilizar o Chrome");
} 