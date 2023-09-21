<?php

include "../../connection/config.php";

$d = $_GET['id'];
session_start();

//syntaks sql untuk menghapus data
$delete = mysqli_query($conn, "DELETE FROM barang WHERE id_barang=".$d);

$_SESSION["sukses"] = 'Data Berhasil Dihapus';

//berhasil larikan ke index.php
header('Location: index.php');

?>