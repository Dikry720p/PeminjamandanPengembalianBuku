<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'database.php';

            $pdo = Database::connect();
            $sql = 'SELECT * FROM buku ORDER BY id DESC';
            foreach ($pdo->query($sql) as $row) {
                echo '<tr>';
                echo '<td>' . $row['judul'] . '</td>';
                echo '<td>' . $row['penulis'] . '</td>';
                echo '<td>' . $row['tahun_terbit'] . '</td>';
                echo '</tr>';
            }
            Database::disconnect();
            ?>
        </tbody>
    </table>

    <br>
    <a href="add_buku.php">Tambah Buku</a>
</body>
</html>
