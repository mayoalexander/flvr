<?php
$servername = "107.180.46.203";
$username = "freelabeladmin";
$password = "Redwalrus123!";
$dbname = "amrusers";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>