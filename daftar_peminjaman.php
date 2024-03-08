<?php
require 'database.php';

$pdo = Database::connect();
$sql = 'SELECT * FROM peminjaman';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Peminjaman Buku</title>
</head>

<body>
    <h1>Daftar Peminjaman Buku</h1>
    <table>
        <tr>
            <th>Judul Buku</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Peminjaman</th>
            <th>Status Pengembalian</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($pdo->query($sql) as $row) { ?>
            <tr>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['nama_peminjam']; ?></td>
                <td><?php echo $row['tanggal_peminjaman']; ?></td>
                <td><?php echo $row['status_pengembalian']; ?></td>
                <td>
                    <?php if ($row['status_pengembalian'] != 'Sudah Kembali') { ?>
                        <form action="pengembalian.php" method="post">
                            <input type="hidden" name="id_peminjaman" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="Kembalikan">
                        </form>
                    <?php } else {
                        echo 'Sudah Dikembalikan';
                    } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>