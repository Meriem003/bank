<?php 
$serverHost = "localhost";
$serveruser = "root";
$serverPassword = "";
$dbname = "bankneo";
try {
$dns = "mysql:host=".$serverHost.";dbname=".$dbname;
$pdo = new PDO($dns,$serveruser,$serverPassword);
// echo "ouiiiiiiiii";
} catch (PDOException $e) {
    echo "error conn";
}   
?>