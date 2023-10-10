<?php
include 'koneksi.php';
require 'function.php';

$datahewan = query("SELECT * FROM hewan");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tabel Data</title>
    <link rel="stylesheet" type="text/css" href="styles_2.css">
</head>
<body>
    <h1>Tabel Data Hewan</h1>
    <a href="tambah.php">Tambah Data Hewan</a>
    <table>
        <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Populasi</th>
            <th>Deskripsi</th>
            <th>Aksi</th> 
        </tr>

        <?php

$nomorUrut = 1; 

foreach ($datahewan as $row) {
?>
    <tr>
        <td><?= $nomorUrut ?></td>
        <td><img src='img/<?= $row->foto ?>' alt='img'></td>
        <td><?= $row->nama ?></td>
        <td><?= $row->populasi ?></td>
        <td><?= $row->deskripsi ?></td>
        <td>
            <a href='hapus.php?id=<?= $row->id ?>'>Hapus</a>
            <a href='ubah.php?id=<?= $row->id ?>'>Edit</a> 
        </td>
    </tr>
<?php
    $nomorUrut++; 
}
?>


    </table>
    <style>
       h1 {
        text-align: center;
        background-color: #fff; 
        color: #040D12;
        padding: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        transition: background-color 0.3s;
    }

    th {
        background-color: #183D3D; 
        color: #fff;
    }

    tr:nth-child(odd) {
        background-color: #5C8374; 
        color: #fff;
    }

    tr:hover {
        background-color: #93B1A6; 
        color: #fff;
    }

    img {
        max-width: 100px;
        max-height: 100px;
        box-shadow: 5px 5px 10px #888;
        transition: transform 0.3s; 
    }

    img:hover {
        transform: scale(1.1); 
    }

    
    </style>
</body>
</html>
