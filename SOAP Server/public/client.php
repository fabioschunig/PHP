<?php

$number1 = 1;
$number2 = 2;

if (isset($_POST['number1'])) {
    $number1 = (int) $_POST['number1'];
}

if (isset($_POST['number2'])) {
    $number2 = (int) $_POST['number2'];
}

?>

<h1>Calling SOAP Server</h1>

<p>Number 1: <?= $number1 ?></p>
<p>Number 2: <?= $number2 ?></p>

<?php

try {
    $client = new SoapClient('http://localhost:8081/calculator.wsdl');
    $result = $client->addNumbers($number1, $number2);
} catch (\Throwable $th) {
    echo "Error: " . $th->getMessage();
    throw $th;
}

/*
echo "Last SOAP request: ";
var_dump($client->__getLastRequest());

echo "Last SOAP response: ";
var_dump($client->__getLastResponse());
*/

?>

<p>Sum: <?= $result ?></p>