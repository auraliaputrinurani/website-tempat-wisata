<?php
    include ('config.php');

    $result = mysqli_query($conn, 'DELETE FROM `paket wisata` WHERE id="'. $_GET['id'] .'"');

    header('Location: index.php');
?>