<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "phpproject";

$koneksi = mysqli_connect($server, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
// } else {
//     echo "Koneksi berhasil !";
// }
?>
