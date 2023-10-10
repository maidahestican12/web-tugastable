<?php
    require "function.php";
    require "koneksi.php";

    $id = $_GET["id"];
    
    $hewan = query("SELECT * FROM hewan WHERE id =$id");
    
    if(isset($_POST["submit"])){
        $nama = $_POST["nama"];
        $populasi = $_POST["populasi"];
        $deskripsi = $_POST["deskripsi"];
        
        $result = ubah($id, [
            "nama" => $nama,
            "populasi" => $populasi,
            "deskripsi" => $deskripsi
        ]);
        
        if ($result > 0) {
            echo "<script>
                    alert('Data berhasil diubah');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal diubah');
                    document.location.href = 'index.php';
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Hewan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            background-color: #183D3D;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #93B1A6;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 40px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="file"] {
            border: none;
            outline: none;
        }

        .button-container {
            text-align: center;
        }

        .submit-button {
            background-color: #183D3D;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 18px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #93B1A6;
        }
    </style>
</head>
<body>
    <h1>Edit Data Hewan</h1>
    
    <form action="ubah.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <label for="nama">Nama Hewan:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $hewan[0]->nama; ?>" required>
        <br>
        <label for="foto">Foto Hewan:</label>
        <input type="text" id="foto" name="foto" accept="image/*">
        <br>
        <label for="populasi">Populasi:</label>
        <input type="text" id="populasi" name="populasi" value="<?php echo $hewan[0]->populasi; ?>" required>
        <br>
        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required><?php echo $hewan[0]->deskripsi; ?></textarea>
        <br>
        <div class="button-container">
            <button type="submit" class="submit-button" name="submit">Simpan Perubahan</button>
        </div>
    </form>
</body>
</html>
