<?php
require "koneksi.php";
require "function.php";

$id = $_GET['id'];

if (isset($_GET['confirmed']) && $_GET['confirmed'] === 'yes') {
    if (hapus($id) > 0) {
        echo "<script>
            alert('Data berhasil dihapus.');
        </script>";
    } else {
        echo "<script>
            alert('Error saat menghapus data.');
        </script>";
    }
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "<script>
        var confirmDelete = confirm('Apakah Anda yakin ingin menghapus data ini?');
        if (confirmDelete) {
            window.location.href='hapus.php?id=$id&confirmed=yes';
        } else {
            alert('Penghapusan dibatalkan.');
            window.location.href='index.php';
        }i
    </script>";
}
?>
