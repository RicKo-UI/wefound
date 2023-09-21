<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style-user.css">
</head>

<body style="background-color:#4788D7; color:#fff;">
    <nav class="navbar sticky-top navbar-dark navbar-expand-lg" style="background-color: #4D9EDF;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../assets/images/AP_logo.png" alt="" class="logo"><img src="../assets/images/we-found-logo.png" alt="" class="logo1"></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start text-light w-75" style="background-color: #AFD183;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house-door me-2"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-telephone me-2"></i>Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row">
            <div class="col-sm-12">
                <a href="list-barang.php" class="text-white"><i class="bi bi-arrow-left"></i></a>
                <?php
                    include "../connection/config.php";
                    $id = $_GET['id'];
                    $sql = mysqli_query($conn, "SELECT * FROM barang where id_barang='$id'");
                    $data = mysqli_fetch_array($sql);
                ?>
                <form action="transaksikirim.php" method="POST" class="mt-3">
                    <input name="id_barang" value="<?php echo $data['id_barang']; ?>" hidden />
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Metode Pembayaran</label>
                        <select class="form-select" aria-label="Default select example" name="metode">
                            <option selected>Pilih Metode Pembayaran</option>
                            <option value="COD">COD</option>
                            <option value="BCA">BCA</option>
                            <option value="Dana">Dana</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label my-3">Ringkasan Pesanan</label>
                        <div class="d-flex justify-content-between">
                            <p>Biaya Pengiriman</p>
                            <p>Rp 34.000</p>
                        </div>
                    </div>

                    <div class="row fixed-bottom mb-3 mx-md-3 px-md-5">
                        <hr>
                        <div class="col-sm-12 col-md-6">
                            <div class="d-flex justify-content-between">
                                <p>Biaya Pengiriman</p>
                                <p>Rp 34.000</p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="d-grid gap-2">
                                <button type="submit" name="submit" class="btn btn-light mx-2">Delivery</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>