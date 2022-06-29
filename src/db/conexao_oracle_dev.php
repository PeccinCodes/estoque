<?php

date_default_timezone_set('America/Recife');
$ora_user = "apps";
$ora_senha = "appsdev";

$ora_bd = "(DESCRIPTION= 
(ADDRESS=(PROTOCOL=tcp)(HOST=192.168.203.102)(PORT=1532)) 
       (CONNECT_DATA= 
             (SERVICE_NAME=ebs_DEV) (INSTANCE_NAME=CDBDEV)
)
)";

$ora_conexao = oci_connect($ora_user,$ora_senha,$ora_bd);
$setup = OCIParse($ora_conexao,"alter session set nls_language = 'BRAZILIAN PORTUGUESE' NLS_TERRITORY = 'BRAZIL'");
OCIExecute($setup);
?>