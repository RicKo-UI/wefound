<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style-user.css">
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <div class="card px-3 py-3" style="width: 32rem;">
                        <form action="tambahproses.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" id="namaBarang" name="nama_barang" placeholder="Masukan Nama Barang">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Terminal Ditemukan</label>
                                <select class="form-select" aria-label="Default select example" name="id_terminal">
                                    <option selected>--Pilih Terminal--</option>
                                    <?php
                                    include "../../connection/config.php";
                                    $query = mysqli_query($conn, "SELECT * FROM terminal") or die(mysqli_error($conn));
                                    while ($data = mysqli_fetch_array($query)) {
                                        echo "<option value=$data[id_terminal]> $data[nama_terminal] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" placeholder="Masukan Deskripsi Barang"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" id="" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Gambar</label>
                                <input class="form-control" type="file" name="gambar" id="formFile">
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>