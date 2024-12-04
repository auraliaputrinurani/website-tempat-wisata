<?php
    include ('config.php');
    $result = mysqli_query($conn, "SELECT * FROM `paket wisata` ORDER BY `Tanggal Keberangkatan` ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>koeneksi services</title>
    <style>
        body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
        text-align: center;
        }

        h1 {
            margin-top: 20px;
            font-size: 28px;
            color: #FFA500;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 70%;
            background-color: #fff;
            color: #000;
            border: 1px solid #ddd;
        }

        th {
            background-color: #FFA500;
            color: #000;
            padding: 10px;
        }

        td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #fdf5e6; /* putih tulang */
        }

        tr:nth-child(odd) {
            background-color: #fff; /* putih */
        }

        tr:hover {
            background-color: #f1f1f1; /* hover effect */
        }

        a {
            text-decoration: none;
            color: #FFA500;
            font-weight: bold;
        }

        a:hover {
            color: #ff4500;
            margin: 0 15px;
        }

        .add-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #FFA500;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-link:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>
    <h1>PESANAN PAKET WISATA</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Jumlah Orang</th>
            <th>Paket</th>
            <th>Tanggal Keberangkatan</th>
            <th>Harga Total</th>
            <th>aksi</th>

        </tr>
        
        <?php
            while($row = mysqli_fetch_array($result)) {
                if ($row['Paket'] == 1) {
                    $Paket = 'Paket Wisata Sehari Penuh';
                } elseif ($row['Paket'] == 2) {
                    $Paket = 'Paket Wisata Keluarga';
                } else {
                    $Paket = 'Paket Wisata Khusus Budaya';
                }

                echo '
                    <tr>
                        <td>' . $row['ID'] . '</td>
                        <td>' . $row['Nama Pemesan'] . '</td>
                        <td>' . $row['Jumlah Orang'] . '</td>
                        <td>' . $row['Paket'] . '</td>
                        <td>' . $row['Tanggal Keberangkatan'] . '</td>
                        <td>' . $row['Harga Total'] . '</td>
                        <td>
                            <a href="edit.php?id=' . $row['ID'] .'">Edit</a>
                            <a href="delete.php?id=' . $row['ID'] .'">Hapus</a>
                        </td>
                    </tr>
                ';
            }
        ?>
    
    </table>
    <div style="display: flex; justify-content: space-between; margin: 0 200px;">
        <a href="Services.html">Kembali</a>
        <a href="add.php">Tambahkan Pesanan</a>
    </div>
</body>
</html>