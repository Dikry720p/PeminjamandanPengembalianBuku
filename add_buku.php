<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
</head>

<body>
    <h1>Form Tambah Buku</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" required><br><br>

        <label for="penulis">Penulis:</label><br>
        <input type="text" id="penulis" name="penulis" required><br><br>

        <label for="tahun_terbit">Tahun Terbit:</label><br>
        <input type="number" id="tahun_terbit" name="tahun_terbit" required><br><br>

        <input type="submit" name="submit" value="Tambah Buku">
    </form>

    <?php
    require 'database.php';

    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $tahun_terbit = $_POST['tahun_terbit'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO buku (judul, penulis, tahun_terbit) values(?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($judul, $penulis, $tahun_terbit));
        Database::disconnect();
        echo "<p>Buku berhasil ditambahkan.</p>";
    }
    ?>
</body>

</html>