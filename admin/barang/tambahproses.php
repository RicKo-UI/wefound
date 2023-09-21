<?php
    include "../../connection/config.php";

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
            $query = "INSERT INTO barang (nama_barang, id_terminal, deskripsi, tanggal, gambar) 
            VALUES ('$nama_barang', '$id_terminal', '$deskripsi', '$tanggal', '$nama_gambar_baru')";

            $result = mysqli_query($conn, $query);

            header("location:index.php");
        }
        else{
            $query = "INSERT INTO barang (nama_barang, id_terminal, deskripsi, tanggal, gambar) 
            VALUES ('$nama_barang', '$id_terminal', '$deskripsi', '$tanggal', 'null')";

            $result = mysqli_query($conn, $query);

            header("location:tambah.php");
        }
    }
?>