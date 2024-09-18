<?php

$options = array(
    'trace' => true
);
$client = new SOAPClient('http://localhost:9080/soap-websiteservice-wsdl/server.php?wsdl', $options);
var_dump($client->NewOperation());
