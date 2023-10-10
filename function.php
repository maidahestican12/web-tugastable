<?php
require "koneksi.php";

function query($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = array(); 
    while ($row = mysqli_fetch_object($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $koneksi;

    $foto = $data["foto"];
    $nama = $data["nama"];
    $populasi = $data["populasi"];
    $deskripsi = $data["deskripsi"];

    $query = "INSERT INTO hewan (foto, nama, populasi, deskripsi)
              VALUES ('$foto', '$nama', '$populasi', '$deskripsi')";

    if (mysqli_query($koneksi, $query)) {
        return mysqli_affected_rows($koneksi);
    } else {
        return 0;
    }
}


function hapus($id){

    global $koneksi;

    
    $query = "DELETE FROM hewan
     WHERE id = $id";

mysqli_query($koneksi, $query);
return mysqli_affected_rows($koneksi);

}

function ubah($id, $data) {
    global $koneksi;

    $nama = $data["nama"];
    $populasi = $data["populasi"];
    $deskripsi = $data["deskripsi"];

    $query = "UPDATE hewan SET
                nama = '$nama',
                populasi = '$populasi',
                deskripsi = '$deskripsi'
              WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        return mysqli_affected_rows($koneksi);//MENGECEK APAKAH ADA PERUBAAHN DI SETIAP BARIISNYA
    } else {
        return 0;//JIKA BERNILAI ELSE MAKA DIA AKAN KEMABLI KE PAGES AWAL
    }
}


?>