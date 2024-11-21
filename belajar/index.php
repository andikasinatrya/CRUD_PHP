<?php
include "./koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>

<body>
    <center>
        <h1>Data Penjualan</h1>
    </center>
    <center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include './koneksi.php';
                $result = mysqli_query($db, "SELECT * FROM base ORDER BY id_base DESC");
                while ($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['id_base'] . "</td>";
                    echo "<td>" . $data['Name'] . "</td>";
                    echo "<td>" . $data['Price'] . "</td>";
                    echo "<td><a href='./update.php?id=$data[id_base]'>Edit</a> | <a href='delete.php?id=$data[id_base]'>Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </center>
    <center><a href="add.php">Tambah</a></center>
</body>

</html>