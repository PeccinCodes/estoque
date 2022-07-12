<!--teste-->
<!--teste-->
<!--teste-->
<!--teste-->

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=-2.0">
    <link rel="shortcut icon" href="./src/img/favicon.ico" type="image/x-icon" />

    <link rel="stylesheet" href="./src/css/reset.css">
    <link rel="stylesheet" href="./src/css/normalize.css">
    <link rel="stylesheet" href="./src/css/cabecalho.css">
    <link rel="stylesheet" href="./src/css/dropdown.css">
    <link rel="stylesheet" href="./src/css/geral.css">
    <link rel="stylesheet" href="./src/css/blocos.css">
    <link rel="stylesheet" href="./src/css/table.css">
    <link rel="stylesheet" href="./src/css/btn.css">
    <link rel="stylesheet" href="./src/css/itens_pesquisa.css">
    <link rel="stylesheet" href="./src/css/status.css">

    <title>PECCIN | Pesquisa Estoque</title>
</head>

<body id="body">
    <div id="idcontainer" class="container">

        <img class="logo" src="./src/img/logo-peccin.png" alt="logo-da-peccin">

        <header class="cabecalho">

            <label for="" class="cabecalho__titulo">Consulta de Estoques</label>

            <div class="dropdown" style="float:right;">
                <button class="dropbtn">MENU</button>
                <div class="dropdown-content">
                    <a>
                        <div id="validade">VALIDADE</div><br>
                        <div id="data">DD/MM/YYYY</div>Lote dentro da validade
                    </a>
                    <a>
                        <div id="dataFora">DD/MM/YYYY</div>Lote fora de validade
                    </a>
                    <a>
                        <div id="dataLimite">DD/MM/YYYY</div>Validade menor que 15 dias para vencimento
                    </a>
                    <br><br>
                    <a>
                        <div id="status">STATUS</div><br>
                        <div id="aprovado">APROVADO</div>Lote liberado para utilização
                    </a>
                    <a>
                        <div id="bloqueado">BLOQUEADO</div>Lote não está liberado para utilização
                    </a>
                    <a>
                        <div id="inspecao">INSPECAO</div>Lote está em inspeção pela qualidade
                    </a>

                </div>
            </div>

        </header>

        <div id="bloco">

            <div id="bloco__input">

                <div id="bloco__input--produto">
                    <label for="" class="" id="bloco__input--label">PRODUTO</label><br><br>
                    <input type="text" class="bloco__input--input" id="descricao" placeholder="Digite o código ou a descrição do produto" onkeyup="lista_produtos(this.value)" autocomplete="off" autofocus />
                </div>

                <div class="itensPesquisaInativo" id="div">
                    <span id="resultado_pesquisa"></span>
                </div>

                <div class="bloco__informacoes">
                    <div>CÓDIGO<input type="text" class="input-info" id="codigo" disabled></div>
                    <div>QT. LOTES<input type="text" class="input-info" id="lote" disabled></div>
                    <div>ESTOQUE<input type="text" class="input-info" id="qtde" disabled></div>
                    <div>UNIDADE<input type="text" class="input-info" id="unidade" disabled></div>
                </div>

            </div>

            <input onclick="javascript:novaPesquisa()" type="button" class="btnNovaPesquisaInativo" id="btnNovaPesquisa" value="Nova Pesquisa" disabled>

            <div id="blocos__tabela">
                <div class="tabela">
                    <label for="" id="blocos__tabela--label">INFORMAÇÕES DOS LOTES</label><br><br>

                    <div>

                        <table id="Tabela">
                            <thead>
                                <tr>
                                    <th>LOTE</th>
                                    <th>VALIDADE</th>
                                    <th>STATUS</th>
                                    <th>DEPOSITO</th>
                                    <th>ENDEREÇO</th>
                                    <th>ESTOQUE</th>
                                </tr>
                            </thead>
                        </table>

                    </div>

                    <div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <footer>
        <h4>
            v 1.0.6
        </h4>
    </footer>
</body>

<script src="./src/js/lista-itens.js"></script>
<script src="./src/js/pesquisa-lotes.js"></script>
<script src="./src/js/validacao_navegador.js"></script>

</html>