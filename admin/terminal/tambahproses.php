<?php
    include "../../connection/config.php";

    $nama_terminal = $_POST['nama_terminal'];

    $query = "INSERT INTO terminal (nama_terminal) 
    VALUES ('$nama_terminal')";

    $result = mysqli_query($conn, $query);

    header("location:index.php");
?>