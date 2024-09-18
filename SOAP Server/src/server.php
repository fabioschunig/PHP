<?php

class NewOperation
{
    public function NewOperation() {}
}

ini_set("soap.wsdl_cache_enabled", "0");
$server = new SOAPServer('http://localhost:9080/soap-websiteservice-wsdl/CalculatorService.wsdl', array(
    'soap_version' => SOAP_1_2,
    'style' => SOAP_RPC,
    'use' => SOAP_LITERAL
));
$server->setClass('NewOperation');
$server->handle();
