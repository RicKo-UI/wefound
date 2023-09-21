<?php

if(isset($_POST['submit'])){
    $id_barang = $_POST['id_barang'];
    $alamat = $_POST['alamat'];
    $metode = $_POST['metode'];

    include '../connection/config.php';

    $query = mysqli_query($conn, "INSERT INTO pengiriman (id_barang, alamat, metode) 
    VALUES ('$id_barang', '$alamat', '$metode')");

    if($query){
        $update = mysqli_query($conn, "UPDATE barang SET statuss = 'telah diambil' WHERE id_barang='$id_barang'");

        header("location:list-barang.php");
    }
    else{
        echo "Error";
        header("location:list-barang.php");
    }
}
?>