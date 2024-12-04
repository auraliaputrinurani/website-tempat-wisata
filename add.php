<?php
    include ('config.php');
    
    // Proses simpan jika tombol simpan ditekan
    if (isset($_POST['simpan'])){
        $result = mysqli_query($conn, 'INSERT INTO `paket wisata` (`Nama Pemesan`, `Jumlah Orang`, `Paket`, `Tanggal Keberangkatan`, `Harga Total`) VALUES 
        ("'. $_POST['Nama_Pemesan']. '","'. $_POST['Jumlah_Orang']. '","'. $_POST['Paket']. '","'. $_POST['Tanggal_Keberangkatan']. '","'. $_POST['Harga_Total']. '")');

        // Redirect setelah simpan
        header('Location: index.php');
        exit();  // Pastikan setelah header, tidak ada lagi kode yang dijalankan
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Pesanan</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #000;
        color: #444;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
        }

        .container {
            max-width: 400px;
            background-color: #222;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        h1 {
            color: #FFA500;
            margin-bottom: 30px;
        }

        .input-form {
            margin-bottom: 20px;
        }

        label {
            font-size: 15px;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #FFA500;
            color: #fff;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            border: none;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #ff8000;
        }

        input:hover, select:hover {
            border-color: #FFA500;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 22px;
            }
            input, select {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Tambahkan Pesanan</h1>
    <form method="POST" action="add.php">
        <div class="input-form">
            <label>Nama Pemesan</label>
            <input type="text" name="Nama Pemesan">
        </div>
        <div class="input-form">
            <label>Jumlah Orang</label>
            <input type="text" name="Jumlah Orang">
        </div>
        <div class="input-form">
            <label>Paket</label>
            <select name="Paket">
                <option value="">tentukan pilihan anda</option>
                <option value="1">Paket Wisata Sehari Penuh</option>
                <option value="2">Paket Wisata Keluarga</option>
                <option value="3">Paket Wisata Khusus Budaya</option> 
            </select>
        </div>
        <div class="input-form">
            <label>Tanggal Keberangkatan</label>
            <input type="date" name="Tanggal Keberangkatan">
        </div>
        <div class="input-form">
            <label>Harga Total</label>
            <select name="Harga Total">
                <option value="">pilih</option>
                <option value="Rp. 500.000">Rp. 500.000</option>
                <option value="Rp. 1.000.000">Rp. 1.000.000</option>
                <option value="Rp. 1.500.000">Rp. 1.500.000</option>
                <option value="Rp. 2.000.000">Rp. 2.000.000</option>
                <option value="Rp. 2.500.000">Rp. 2.500.000</option>
                <option value="Rp. 3.000.000">Rp. 3.000.000</option>
                <option value="Rp. 3.500.000">Rp. 3.500.000</option>
                <option value="Rp. 4.000.000">Rp. 4.000.000</option>
                <option value="Rp. 4.500.000">Rp. 4.500.000</option>
                <option value="Rp. 5.000.000">Rp. 5.000.000</option> 
            </select>
        </div>
        <div class="input-form">
            <input type="submit" name="simpan" value="SIMPAN">
        </div>
    </form>
</div>
</body>
</html>
