<?php

require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CustomerTableGateway($connection);

/* echo '<pre>';
  print_r($_POST);
  echo '</pre>'; */ //allows user to see what is going wrong with code, to see for e.g names are matching or not.

$registration = $_POST['registration'];

$makeModel = $_POST['makeModel'];


$seats = $_POST['seats'];
$engine = $_POST['engine'];
$dateBought = $_POST['dateBought'];
$nextService = $_POST['nextService'];
$id = $_POST['id'];

$gateway->updateBus($registration, $makeModel, $seats, $engine, $dateBought, $nextService, $id);

header('Location: home.php');