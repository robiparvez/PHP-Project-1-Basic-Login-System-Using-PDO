<?php
// PDP format
$localhost = 'localhost';
$username  = 'root';
$password  = '';
$db        = 'login_pdo';

try {
    $con = new PDO("mysql:host=$localhost;dbname=$db;", $username, $password);
}
catch (PDOException $e)
{
    die("Connection failed: " . $e->getMessage());
}
