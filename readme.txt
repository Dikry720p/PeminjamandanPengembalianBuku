sql code : 
____________________________________________SQL______________________________________________________
CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    penulis VARCHAR(255) NOT NULL,
    tahun_terbit INT NOT NULL
);

CREATE TABLE peminjaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_buku INT,
    nama_peminjam VARCHAR(255) NOT NULL,
    tanggal_peminjaman DATE NOT NULL,
    status_pengembalian VARCHAR(50) NOT NULL DEFAULT 'Belum Kembali',
    FOREIGN KEY (id_buku) REFERENCES buku(id)
);
___________________________________SQL_______________________________________________________________
nama database : database.php

author: bucketman
