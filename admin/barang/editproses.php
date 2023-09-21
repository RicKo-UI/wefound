<?php
    include "../../connection/config.php";

    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $id_terminal = $_POST['id_terminal'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $gambar = $_FILES['gambar']['name'];

    if($gambar != ""){
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;
    
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
    
            $query = "UPDATE barang SET nama_barang = '$nama_barang', id_terminal = '$id_terminal', 
            deskripsi = '$deskripsi', tanggal = '$tanggal', gambar = '$nama_gambar_baru' WHERE id_barang = '$id'";
        
            $result = mysqli_query($conn, $query);
        
            header("location:index.php");
        }
        else{
            $query = "UPDATE barang SET nama_barang = '$nama_barang', id_terminal = '$id_terminal', 
            deskripsi = '$deskripsi', tanggal = '$tanggal' WHERE id_barang = '$id'";

            $result = mysqli_query($conn, $query);

            header("location:index.php");
        }
    }
    else{
        $query = "UPDATE barang SET nama_barang = '$nama_barang', id_terminal = '$id_terminal', 
        deskripsi = '$deskripsi', tanggal = '$tanggal' WHERE id_barang = '$id'";

        $result = mysqli_query($conn, $query);

        header("location:index.php");
    }
?>