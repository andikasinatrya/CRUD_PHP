<?php
include './koneksi.php';

$nama = '';
$harga = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM base WHERE id_base = $id");
    if ($result && mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_array($result)) {
            $nama = $data['Name'];
            $harga = $data['Price'];
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak ditemukan di URL.";
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    
    $nama = mysqli_real_escape_string($db, $nama);
    $harga = mysqli_real_escape_string($db, $harga);

    $result = mysqli_query($db, "UPDATE base SET Name='$nama', Price='$harga' WHERE id_base=$id");
    
    if ($result) {
        header("location:index.php");
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <title>Edit Data</title>
</head>
<body>
    <center>
        <h1>Edit</h1>
        <form action="update.php" method="post">
            <table border="0">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga" value="<?php echo htmlspecialchars($harga); ?>"></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <td><input type="submit" name="update" value="Edit" class="btn btn-success btn-lg"></td>
                </tr>
            </table>
        </form>
    </center>
</body>
</html>
