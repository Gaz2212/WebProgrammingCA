<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

require 'ensureUserLoggedIn.php';

$id = session_id();
if ($id == "") {
    session_start();
}


$registration = filter_input(INPUT_POST, 'registration', FILTER_SANITIZE_STRING);
$makeModel = filter_input(INPUT_POST, 'makeModel', FILTER_SANITIZE_STRING);
$seats = filter_input(INPUT_POST, 'seats', FILTER_SANITIZE_STRING);
$engine = filter_input(INPUT_POST, 'engine', FILTER_SANITIZE_STRING);
$dateBought= filter_input(INPUT_POST, 'dateBought', FILTER_SANITIZE_STRING);
$nextService= filter_input(INPUT_POST, 'nextService', FILTER_SANITIZE_STRING);


//error messages being displayed if information entered is already taken or text field is balnk
        $errorMessage = array();
if ($registration === FALSE || $registration === '') {
    $errorMessage['registration'] = 'Registration field must not be blank<br/>';
}

if ($makeModel === FALSE || $makeModel === '') {
    $errorMessage['makeModel'] = 'Make & Model field must not be blank<br/>';
}

if ($seats === FALSE || $seats === ''){
    $errorMessage['seats'] = 'Seat number field must not be blank<br/>';
}

if ($engine === FALSE || $engine === ''){
    $errorMessage['engine'] = 'Engine size field must not be blank<br/>';
}

if($dateBought === FALSE || $dateBought === ''){
    $errorMessage['dateBought'] = 'Date Bought field must not be blank<br/>';
}

if($nextService === FALSE || $nextService === ''){
    $errorMessage['nextService'] = 'Next Service field must not be blank<br/>';
}


if (!isset($_SESSION['buses'])) {
    die("Illegal Request");
}
else {
    $buses= $_SESSION['buses'];
}


if (empty($errorMessage)) {
    $connection = Connection::getInstance();
    $gateway = new BusTableGatewayTableGateway($connection);
    $id = $gateway->insertBus($registration, $makeModel, $seats, $engine, $dateBought, $nextService);



    /* If there are no errors that occur, the user will be redirected to the homepage */
    header("Location: home.php");
} else {
    require 'createCustomerForm.php';
}
/* If errors do occur, the user will not be allowed to continue 
   to the homepage and will be redirected back to the createCustomerForm page */