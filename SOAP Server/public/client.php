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