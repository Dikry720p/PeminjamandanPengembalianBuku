<?php
require 'database.php';

if (!empty($_POST)) {
    $id_buku = $_POST['id_buku'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $tanggal_peminjaman = date('Y-m-d');

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO peminjaman (id_buku, nama_peminjam, tanggal_peminjaman) values(?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute(array($id_buku, $nama_peminjam, $tanggal_peminjaman));
    Database::disconnect();
    header("Location: daftar_peminjaman.php");
}

$pdo = Database::connect();
$sql = 'SELECT * FROM buku';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Peminjaman Buku</title>
</head>

<body>
    <h1>Form Peminjaman Buku</h1>
    <form action="peminjaman.php" method="post">
        <label for="id_buku">ID Buku:</label><br>
        <select id="id_buku" name="id_buku" required>
            <?php foreach ($pdo->query($sql) as $row) { ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="nama_peminjam">Nama Peminjam:</label><br>
        <input type="text" id="nama_peminjam" name="nama_peminjam" required><br><br>

        <input type="submit" value="Pinjam Buku">
    </form>
</body>

</html>