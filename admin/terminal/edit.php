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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <div class="card px-3 py-3" style="width: 32rem;">
                        <?php
                        include "../../connection/config.php";
                        $sql = mysqli_query($conn, "SELECT * FROM terminal WHERE id_terminal='$_GET[id]'");
                        $data = mysqli_fetch_array($sql);
                        ?>
                            <form action="editproses.php" method="post" enctype="multipart/form-data">
                                <input name="id" value="<?php echo $data['id_terminal']; ?>" hidden />
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Terminal</label>
                                    <input type="text" class="form-control" id="namaTerminal" name="nama_terminal" value="<?php echo $data['nama_terminal']; ?>" placeholder="Masukan Nama Terminal">
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