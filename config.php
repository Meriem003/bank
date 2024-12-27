<?php 
$serverHost = "localhost";
$serveruser = "root";
$serverPassword = "";
$dbname = "NeoBank";
try {
$dns = "mysql:host=".$serverHost.";dbname=".$dbname;
$pdo = new PDO($dns,$serveruser,$serverPassword);
// echo "yeeeeeeeeeeeeeees";
} catch (PDOException $e) {
    echo "conn ghalat";
}
?>