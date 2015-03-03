<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

$id = session_id();
if ($id == "") {
    session_start();
}

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);


//showing error messages if text fields are either blank or used already
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = 'Username must not be blank<br/>';
}
else if ($username === 'joe') {
    $errorMessage['username'] = 'Username already registered<br/>';
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = 'Password must not be blank<br/>';
}
else if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = 'Password2 must not be blank<br/>';
}
else if ($password !== $password2) {
    $errorMessage['password2'] = 'Passwords must match<br/>';
}

if (empty($errorMessage)) {
    if(!isset($_SESSION['users'])) {
        $users = array();
    }
    else {
        $users = $_SESSION['users'];
    }
    
    $user = new User($username, $password);
    
    $users[] = $user;
    
    $_SESSION['users'] = $users;
    
    header('Location: home.php');
}

//if unsuccessful bring back the register page
else {
    require 'register.php';
}

