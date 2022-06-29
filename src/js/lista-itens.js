
async function lista_produtos(valor) {
    if (valor.length >= 3) {

        var dados = await fetch('http://pcn-sig.peccin.local/test/estoque/src/php/pesquisa_produtos?cod_descricao=' + valor);
        var resposta = await dados.json();

        let div = document.getElementById('div');
        div.classList.remove('itensPesquisaInativo');
        div.classList.add('itensPesquisaAtivo');

        var html = "<ul>";

        for (i = 0; i < resposta['dados'].length; i++) {

            html += "<dt id='litxt'; onclick='get_produto("
                + JSON.stringify(resposta['dados'][i].codigo) + ","
                + JSON.stringify(resposta['dados'][i].descricao) + ","
                + JSON.stringify(resposta['dados'][i].unidade.toUpperCase()) + ","
                //+ JSON.stringify(resposta['dados'][i].lote) + ","
                + JSON.stringify(resposta['dados'][i].qtde) + ")'>"
                + resposta['dados'][i].cod_e_descricao + "<br>"
        }

        html += "</ul>"

    } else {

        var html = "<ul>";
        html += "<dt id=litxtNe>" + "NADA ENCONTRADO, VERIFIQUE O CÓDIGO DO PRODUTO OU DESCRIÇÃO!";
        html += "</ul>";
    }

    document.getElementById('resultado_pesquisa').innerHTML = html;
}

// FUNCAO PARA COMPLETAR AS INFORMACOES
function get_produto(codigo, descricao, unidade, qtde) {

    document.getElementById("codigo").value = codigo;
    document.getElementById("descricao").value = descricao;
    document.getElementById("unidade").value = unidade;
    //document.getElementById("lote").value = lote;
    document.getElementById("qtde").value = qtde;
    lista_lotes();

    // DESATIVA O INPUT DE DESCRICAO DO ITEM
    var inputDescricao = document.getElementById("descricao");
    inputDescricao.disabled = true;

    // ATIVA O BOTAO DE "NOVA PESQUISA"
    var btnPesquisa = document.getElementById("btnNovaPesquisa");
    btnPesquisa.disabled = false;
    btnPesquisa.classList.remove('btnNovaPesquisaInativo');
    btnPesquisa.classList.add('btnNovaPesquisa');

};

const fechar_lista = document.getElementById('codigo');
document.addEventListener('click', function (event) {
    const validar_clique = fechar_lista.contains(event.target);
    if (!validar_clique) {

        document.getElementById('resultado_pesquisa').innerHTML = '';
        div.classList.remove('itensPesquisaAtivo');
        div.classList.add('itensPesquisaInativo');
    };
});

novaPesquisa = () => location.reload();
