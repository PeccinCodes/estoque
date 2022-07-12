<?php

include_once "../db/conexao_oracle_prod.php";

$filtro_item = filter_input(INPUT_GET, "cod_descricao");
$filtro_item = strtoupper($filtro_item);

if (!empty($filtro_item)) {
    $pesquisa = "%" . $filtro_item . "%";
    $query = oci_parse(
        $ora_conexao,
        "SELECT 
            CODIGO,
            DESCRICAO,
            UNIDADE,
            LOTE,
            QTDE
    FROM
            PCN_VW_ESTOQUE
    WHERE
         CODIGO LIKE :cod_descricao
         OR DESCRICAO LIKE :cod_descricao"
    );
    ocibindbyname($query, ':cod_descricao', $pesquisa);
    ociexecute($query);

    while (($row_linha = oci_fetch_assoc($query)) != false) {

        $dados[] = [
            'codigo' => $row_linha['CODIGO'],
            'descricao' => preg_replace('/(\'|")/', "", $row_linha['DESCRICAO']),
            'unidade' => $row_linha['UNIDADE'],
            'lote' => $row_linha['LOTE'],
            'qtde' => $row_linha['QTDE'],
            'cod_e_descricao' => $row_linha['CODIGO'] . " - " . $row_linha['DESCRICAO']
        ];
    }

    $retorno_produto = ['erro' => false, 'dados' => $dados];
} else {

    $retorno_produto = ['erro' => true, 'msgerro' => "Erro de retorno"];
}

echo json_encode($retorno_produto);
