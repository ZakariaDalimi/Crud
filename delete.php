<?php 

if (isset($_GET["id"])){
    $id = $_GET['id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myshop";

// Connection
$connection = new mysqli($servername, $username, $password, $dbname);


$sql = "DELETE FROM clients WHERE id=$id";
$connection->query($sql);
}

header("location:index.php");
exit;

?>