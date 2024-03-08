<?php
require 'database.php';

if (!empty($_POST)) {
    $id_peminjaman = $_POST['id_peminjaman'];

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE peminjaman SET status_pengembalian = 'Sudah Kembali' WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id_peminjaman));
    Database::disconnect();
    header("Location: daftar_peminjaman.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pengembalian Buku</title>
</head>

<body>
    <h1>Form Pengembalian Buku</h1>
    <form action="pengembalian.php" method="post">
        <label for="id_peminjaman">ID Peminjaman:</label><br>
        <input type="text" id="id_peminjaman" name="id_peminjaman" required><br><br>

        <input type="submit" value="Kembalikan Buku">
    </form>
</body>

</html>