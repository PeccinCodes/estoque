
// VALIDACAO DO NAVEGADOR FIREFOX
var sBrowser, sUsrAg = navigator.userAgent;
if (sUsrAg.indexOf("Firefox") > -1) {

    // ADICIONA UM UMA NOVA CLASSE NO CONTAINER
    let container = document.getElementById('idcontainer');
    container.classList.remove('container');
    container.classList.add('containerInativo');

    sBrowser = "Mozilla Firefox";
    alert("Você está utilizando o " + sBrowser + ", esta versão não é compatível com esta aplicação!\nRecomendamos utilizar o Chrome");
} 