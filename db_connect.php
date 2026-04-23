<?php
// Database config
$host = "localhost";
$user = "root";       // defect user
$pass = "";           // defect password
$db   = "redblue_db"; // Database name
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            =>PDO::ERRMODE_EXCEPTION, //Helps catching sec errors
    PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC, //Returns data as associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,          //Critical for preventing SQL Injection
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // In a real enviroment, never show the error message $e->getMessage() to the user
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($pdo)) {
   // echo "Usted está conectado a la base de datos de forma segura usando PDO.";
}