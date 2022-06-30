<?php

include_once "../db/conexao_oracle_prod.php";

$array = array();

$filtro_item = filter_input(INPUT_GET, "cod_descricao");
$filtro_item = strtoupper($filtro_item);

if (!empty($filtro_item)) {

    $pesquisa_full = "%" . $filtro_item . "%";
    $query_full = oci_parse(
        $ora_conexao,
        "SELECT 
            DEPOSITO,
            STATUS,
            LOTE,
            QT_LOTE,
            ENDERECO,
            VALIDADE,
            QTDE
        FROM
            PCN_VW_ESTOQUE_LOTE
        WHERE
            CODIGO LIKE :cod_descricao
            OR DESCRICAO LIKE :cod_descricao"
    );

    ocibindbyname($query_full, ':cod_descricao', $pesquisa_full);
    ociexecute($query_full);

    $sum = 0;

    while (($row_linha = oci_fetch_assoc($query_full)) != false) {

        $dados[] = [
            'deposito' => $row_linha['DEPOSITO'],
            'status' => $row_linha['STATUS'],
            'lote' => $row_linha['LOTE'],
            'qtlote' => $row_linha['QT_LOTE'],
            'endereco' => $row_linha['ENDERECO'],
            'validade' => $row_linha['VALIDADE'],
            'qtde' =>  $row_linha['QTDE'],
        ];
        
    }

    $retorna = ['erro' => false, 'dados' => $dados];

} else {

    echo 'SEM RETORNO';
}

echo json_encode($retorna);
