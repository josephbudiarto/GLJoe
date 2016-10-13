<?php

require_once 'lib/nusoap.php';

$client = new nusoap_client('http://192.168.254.132:8888/Zetra/service/service.php?wsdl');

?>