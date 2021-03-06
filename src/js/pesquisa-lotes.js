
async function lista_lotes() {

  let codprod = document.getElementById("codigo").value

  var dados = await fetch('http://pcn-sig.peccin.local/test/estoque/src/php/pesquisa_lotes?cod_descricao=' + codprod);
  var resposta = await dados.json();

  const tabela = document.getElementById("Tabela");

  // INTERVALO PARA A GERACAO DA TABELA COM OS LOTES
  setTimeout(function () {

    var tbody = document.createElement("tbody")
    tabela.appendChild(tbody)

    // LACO DE REPETICAO DAS LINHAS DA TABELA
    for (i = 0; i < resposta['dados'].length; i++) {

      document.getElementById("lote").value = resposta['dados'].length;

      // SPLIT DA DATA DE VALIDADE DO LOTE
      let validadeDoLote = resposta['dados'][i].validade;
      let splitData = validadeDoLote.split("/");
      let dataValidade = new Date(splitData[2], splitData[1] - 1, splitData[0]);

      tr = document.createElement("tr");
      tabela.appendChild(tr);

      let tdLote = document.createElement("td")
      let lote = document.createTextNode(resposta['dados'][i].lote);
      tabela.appendChild(tdLote);
      tdLote.appendChild(lote);

      // CALCULA A DIFERENCA ENTRE A DATA ATUAL E A VALIDADE DO LOTE
      // PEGA O VALOR ABSOLUTO DAS DUAS DATAS
      let diferenca = Math.abs(dataValidade.getTime() - new Date().getTime());
      // FAZ O RETORNO DO MENOR NUMERO INTEIRO E DIVIDE PELOS MS
      var diferencaDatas = Math.ceil(diferenca / (1000 * 3600 * 24)); 

      let tdValidade = document.createElement("td");
      let validade = document.createTextNode(resposta['dados'][i].validade);

      // VALIDACAO DA VALIDADE
      if (dataValidade < new Date()) {
        tdValidade.setAttribute("id","dataForaDaValidade")

      } else if (diferencaDatas <= 15) {
        tdValidade.setAttribute("id","dataComAtencao")

      } else {
        tdValidade.setAttribute("id","dataNaValidade")
      };
      tabela.appendChild(tdValidade);
      tdValidade.appendChild(validade);

      //
      let tdStatus = document.createElement("td");
      let status = document.createTextNode(resposta['dados'][i].status);
      tabela.appendChild(tdStatus);

      // VALIDA??O DO STATUS DOS LOTES
      if (resposta['dados'][i].status === "APROVADO") {
        tdStatus.setAttribute("id", "statusAprovado")

      } else if (resposta['dados'][i].status === "INSPECAO") {
        tdStatus.setAttribute("id", "statusInspecao")

      } else {
        tdStatus.setAttribute("id", "statusBloqueado")
      };
      tdStatus.appendChild(status);

      let tdDeposito = document.createElement("td");
      let deposito = document.createTextNode(resposta['dados'][i].deposito);
      tabela.appendChild(tdDeposito);
      tdDeposito.appendChild(deposito);

      let tdEndereco = document.createElement("td");
      let endereco = document.createTextNode(resposta['dados'][i].endereco);
      tabela.appendChild(tdEndereco);
      tdEndereco.appendChild(endereco);

      let tdQtde = document.createElement("td");
      let qtde = document.createTextNode(resposta['dados'][i].qtde);
      tabela.appendChild(tdQtde);
      tdQtde.appendChild(qtde);

      tbody.appendChild(tr)
      tr.appendChild(tdLote)
      tr.appendChild(tdValidade)
      tr.appendChild(tdStatus)
      tr.appendChild(tdDeposito)
      tr.appendChild(tdEndereco)
      tr.appendChild(tdQtde)
    }

  }, 0010)


}