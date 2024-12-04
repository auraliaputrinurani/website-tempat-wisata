<?php
    include ('config.php');
   
    $result = mysqli_query($conn, "SELECT * FROM `paket wisata` WHERE id='" . $_GET['id'] ."'");
    
    while($row = mysqli_fetch_array($result)) {
        $Nama_Pemesan = $row['Nama Pemesan'];
        $Jumlah_Orang =  $row['Jumlah Orang'];
        $Paket =  $row['Paket'];
        $Tanggal_Keberangkatan =  $row['Tanggal Keberangkatan'];
        $Harga_Total =  $row['Harga Total'];
    }

    // Proses pembaruan data jika form di-submit
    if (isset($_POST['update'])) {
        $Nama_Pemesan = $_POST['Nama_Pemesan'];
        $Jumlah_Orang = $_POST['Jumlah_Orang'];
        $Paket = $_POST['Paket'];
        $Tanggal_Keberangkatan = $_POST['Tanggal_Keberangkatan'];
        $Harga_Total = $_POST['Harga_Total'];

        // Melakukan query UPDATE
        $query = "UPDATE `paket wisata` SET `Nama Pemesan`='$Nama_Pemesan', 
                                              `Jumlah Orang`='$Jumlah_Orang', 
                                              `Paket`='$Paket', 
                                              `Tanggal Keberangkatan`='$Tanggal_Keberangkatan', 
                                              `Harga Total`='$Harga_Total' 
                                              WHERE id='" . $_GET['id'] . "'";

        if (mysqli_query($conn, $query)) {
            // Pengalihan setelah update
            header('Location: index.php');
            exit();  // Pastikan script berhenti setelah header
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #444;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            background-color: #222;
            padding: 30px;
            border-radius: 8px;
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
        
        <!-- Form untuk Update -->
        <form method="POST" action="edit.php?id=<?php echo $_GET['id'];?>">
            <div class="input-form">
                <label>Nama Pemesan</label>
                <input type="text" name="Nama_Pemesan" value="<?php echo $Nama_Pemesan;?>">
            </div>
            <div class="input-form">
                <label>Jumlah Orang</label>
                <input type="text" name="Jumlah_Orang" value="<?php echo $Jumlah_Orang; ?>">
            </div>
            <div class="input-form">
                <label>Paket</label>
                <select name="Paket">
                    <option value="1" <?php if ($Paket == 1) { echo 'selected';} ?>>Paket Wisata Sehari Penuh</option>
                    <option value="2" <?php if ($Paket == 2) { echo 'selected';} ?>>Paket Wisata Keluarga</option>
                    <option value="3" <?php if ($Paket == 3) { echo 'selected';} ?>>Paket Wisata Khusus Budaya</option> 
                </select>
            </div>
            <div class="input-form">
                <label>Tanggal Keberangkatan</label>
                <input type="date" name="Tanggal_Keberangkatan" value="<?php echo $Tanggal_Keberangkatan; ?>">
            </div>
            <div class="input-form">
                <label>Harga Total</label>
                <select name="Harga_Total">
                    <option value="Rp. 500.000" <?php if ($Harga_Total == "Rp. 500.000") { echo 'selected';} ?>>Rp. 500.000</option>
                    <option value="Rp. 1.000.000" <?php if ($Harga_Total == "Rp. 1.000.000") { echo 'selected';} ?>>Rp. 1.000.000</option>
                    <option value="Rp. 1.500.000" <?php if ($Harga_Total == "Rp. 1.500.000") { echo 'selected';} ?>>Rp. 1.500.000</option>
                    <option value="Rp. 2.000.000" <?php if ($Harga_Total == "Rp. 2.000.000") { echo 'selected';} ?>>Rp. 2.000.000</option>
                    <option value="Rp. 2.500.000" <?php if ($Harga_Total == "Rp. 2.500.000") { echo 'selected';} ?>>Rp. 2.500.000</option>
                    <option value="Rp. 3.000.000" <?php if ($Harga_Total == "Rp. 3.000.000") { echo 'selected';} ?>>Rp. 3.000.000</option>
                    <option value="Rp. 3.500.000" <?php if ($Harga_Total == "Rp. 3.500.000") { echo 'selected';} ?>>Rp. 3.500.000</option>
                    <option value="Rp. 4.000.000" <?php if ($Harga_Total == "Rp. 4.000.000") { echo 'selected';} ?>>Rp. 4.000.000</option>
                    <option value="Rp. 4.500.000" <?php if ($Harga_Total == "Rp. 4.500.000") { echo 'selected';} ?>>Rp. 4.500.000</option>
                    <option value="Rp. 5.000.000" <?php if ($Harga_Total == "Rp. 5.000.000") { echo 'selected';} ?>>Rp. 5.000.000</option>                   
                </select>
            </div>
            <div>
                <input type="submit" name="update" value="UPDATE">
            </div>
        </form>
    </div>
</body>
</html>
