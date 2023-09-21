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

<body>

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
            <?php
            include '../connection/config.php';
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM barang INNER JOIN terminal ON barang.id_terminal = terminal.id_terminal WHERE statuss = 'tersedia'");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <div class="col-sm-12 col-md-6">
                    <a href="" class="text-decoration-none link" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $d['id_barang']; ?>">
                        <div class="card px-2 py-3 mb-4 shadows" style="border: none;">
                            <div class="d-flex align-items-center">
                                <div class="flex-sm-shrink-0">
                                    <img src="../admin/barang/gambar/<?php echo $d['gambar']; ?>" class="img-fluid mx-3 images" style="width: 128px; height:8rem;" alt="...">
                                </div>
                                <div class="flex-sm-grow-1 ms-5">
                                    <div class="fw-semibold fs-5 my-1 paragraf">
                                        <?php echo $d['nama_barang']; ?>
                                    </div>
                                    <div class="badge text-wrap py-2 px-2 my-1 fs-6">
                                        Terminal <?php echo $d['nama_terminal']; ?>
                                    </div>
                                    <div class="my-1 tes">
                                        <?php echo $d['deskripsi']; ?>
                                    </div>
                                    <div class="mt-2 fs-6 date">
                                        <i class="bi bi-calendar-day"> </i> <?php echo $d['tanggal']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $d['id_barang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card px-2 py-3" style="border: none;">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-sm-shrink-0">
                                                <img src="../admin/barang/gambar/<?php echo $d['gambar']; ?>" class="img-fluid mx-3 images" style="width: 128px; height:8rem;" alt="...">
                                            </div>
                                            <div class="flex-sm-grow-1 ms-5">
                                                <div class="fw-semibold fs-5 my-1 paragraf">
                                                    <?php echo $d['nama_barang']; ?>
                                                </div>
                                                <div class="badge text-wrap py-2 px-2 my-1 fs-6">
                                                    Terminal <?php echo $d['nama_terminal']; ?>
                                                </div>
                                                <div class="my-1 tes">
                                                    <?php echo $d['deskripsi']; ?>
                                                </div>
                                                <div class="mt-2 fs-6 date">
                                                    <i class="bi bi-calendar-day"></i> <?php echo $d['tanggal']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 justify-content-center my-3">
                                        <a href="verifikasi.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-primary">Verifikasi</a>
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-dismiss="modal">Onsite</a>
                                        <a href="pengiriman.php?id=<?php echo $d['id_barang']; ?>" class="btn btn-primary">Delivery</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background-color:#8CC63f;">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul class="list mb-5">
                            <li class="list-group-item mb-3 text-light"><i class="bi bi-whatsapp me-2"></i>Whatsapp</li>
                            <li class="list-group-item mb-3 text-light"><i class="bi bi-instagram me-2"></i>Instagram</li>
                            <li class="list-group-item mb-3 text-light"><i class="bi bi-twitter me-2"></i>Twitter</li>
                            <li class="list-group-item mb-3 text-light"><i class="bi bi-facebook me-2"></i>Facebook</li>
                            <li class="list-group-item mb-3 text-light"><i class="bi bi-envelope me-2"></i>E-mail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>