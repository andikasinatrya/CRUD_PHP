<?php  
$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "base_db";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo "Database Connection Error Bos!";
    die("Kesalahan Sintaks Detection!");
}
?>