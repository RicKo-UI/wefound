<?php
    include "../../connection/config.php";

    $id = $_POST['id'];
    $nama_terminal = $_POST['nama_terminal'];

    $query = "UPDATE terminal SET nama_terminal = '$nama_terminal' WHERE id_terminal = '$id'";

    $result = mysqli_query($conn, $query);

    header("location:index.php");
?>