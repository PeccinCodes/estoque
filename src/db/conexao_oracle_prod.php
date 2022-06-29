<?php

/* Arquivo: config.php
 *
 * Este script e o responsavel pela conexao no banco pelos arquivos. Ao inves
 * de usar estes comandos em cada arquivo, apenas chamado via include esse script.
 * NUNCA, EM HIPOTESE ALGUMA ESSE ARQUIVO DEVE SER MODIFICADO!
 *
 */
date_default_timezone_set('America/Recife'); //seta timezone (data + hora) padrão Brasil (UTC +3)
$ora_user = "apps";
$ora_senha = "psfwpec07";

//se ocorrer atualizacao de versao do oracle ou algo do genero, e esse trecho que precisa ser revisto.
//HMOM
//      (ADDRESS = (PROTOCOL = TCP)(HOST = dbtst.peccin.local)(PORT = 1523))
//      (SERVICE_NAME = tst)

$ora_bd = "(DESCRIPTION =
    (ADDRESS_LIST =
      (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.203.130)(PORT = 1521))
    )
    (CONNECT_DATA =
      (SERVICE_NAME = PROD)
    )
  )";
$ora_conexao = oci_connect($ora_user,$ora_senha,$ora_bd); //Faz a conexao com o banco, se der erro, ira tratar direto no index.php

//SETA IDIOMA (ERROS EM OUTUBRO/2020)
$setup = OCIParse($ora_conexao,"alter session set nls_language = 'BRAZILIAN PORTUGUESE' NLS_TERRITORY = 'BRAZIL'");

// executa
OCIExecute($setup);

//Fim do script.
?>