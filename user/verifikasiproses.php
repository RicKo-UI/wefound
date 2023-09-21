<?php
    include "../connection/config.php";

    $nama_pemilik = $_POST['nama_pemilik'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $no_wa = $_POST['no_wa'];

    if($gambar != ""){
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
            $query = "INSERT INTO verifikasi (nama_pemilik, deskripsi, gambar, no_wa) 
            VALUES ('$nama_pemilik', '$deskripsi', '$nama_gambar_baru', '$no_wa')";

            $result = mysqli_query($conn, $query);

            header("location:list-barang.php");
        }
        else{
            $query = "INSERT INTO verifikasi (nama_pemilik, deskripsi, gambar, no_wa) 
            VALUES ('$nama_pemilik', '$deskripsi', 'null', '$no_wa)";

            $result = mysqli_query($conn, $query);

            header("location:verifikasi.php");
        }
    }
?>