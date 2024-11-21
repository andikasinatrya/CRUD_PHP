<?php
include './koneksi.php';
$id= $_GET['id'];
$result = mysqli_query($db, "DELETE FROM base WHERE id_base=$id");
header("Location:index.php");
?>