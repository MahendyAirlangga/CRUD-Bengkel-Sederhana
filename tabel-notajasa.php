<?php

require_once 'notajasa.php';

$notajasa = new notajasa;

// Delete calon_konsumen
if(isset($_POST['delete'])){
    $id_nota_jasa = $_POST['id_nota_jasa'];

    $notajasa->delete($id_nota_jasa);

    header("Location: tabel-notajasa.php");
}

// Update calon_konsumen
if(isset($_POST['update'])){
    //id_calon_konsumen,id_negara,nama_calon_konsumen,email_calon_konsumen,tgl_penawaran_terakhir
    $id_nota_jasa = $_POST['id_nota_jasa'];
    $tgl_nota_jasa = $_POST['tgl_nota_jasa'];

    $notajasa->update($id_nota_jasa,$tgl_nota_jasa);
    
    header("Location: tabel-notajasa.php");
}

// Tambah calon_konsumen
if(isset($_POST['add'])){
    //id_calon_konsumen,id_negara,nama_calon_konsumen,email_calon_konsumen,tgl_penawaran_terakhir
    $id_nota_jasa = $_POST['id_nota_jasa'];
    $tgl_nota_jasa = $_POST['tgl_nota_jasa'];

    $notajasa->store($id_nota_jasa,$tgl_nota_jasa);
    
    header("Location: tabel-notajasa.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Berkela'j</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="app">
    <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="mt-2 ms-1">Bengkel Berkela'j</a>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu" id="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item">
                            <a href="index.php" class='sidebar-link'>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="tabel-jasabengkel.php" class='sidebar-link'>
                                <span>Jasa Bengkel</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <a href="tabel-pemilik.php" class='sidebar-link'>
                                <span>Pemilik</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item active">
                            <a href="tabel-notajasa.php" class='sidebar-link'>
                                <span>Nota Jasa</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="tabel-detailnotajasabengkel.php" class='sidebar-link'>
                                <span>Detail Nota Jasa Bengkel</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <!-- Main -->
        <div id="main">
            <header class="mb-3">
                <a href="" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tabel Nota Jasa</h3>
                            <button type="button" class="btn btn-info mb-3 mt-4 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#tambah">
                                <span class="bi bi-plus-square me-2" style="padding-top: 2px;"></span>Tambah Nota Jasa
                            </button>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Nota Jasa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-borderless">
                                <!-- id_calon_konsumen,id_negara,nama_calon_konsumen,email_calon_konsumen,tgl_penawaran_terakhir -->
                                <thead>
                                    <tr>
                                        <th scope="col">ID NOTA JASA</th>
                                        <th scope="col">TGL NOTA JASA</th>
                                        <th scope="col" class="text-center">UBAH / HAPUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($notajasa->show() as $nj) : ?>
                                        <tr>
                                            <td scope="col"><?= $nj['id_nota_jasa'] ?></td>
                                            <td scope="col"><?= $nj['tgl_nota_jasa'] ?></td>
                                            <td class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary me-1 d-flex" data-bs-toggle="modal" data-bs-target="#update<?=$nj['id_nota_jasa']?>">
                                                   <li class="bi bi-pencil-square me-1" style="list-style-type: none; padding-top: 6px"></li>
                                                   <div style="padding-top: 4px">Ubah</div>
                                            </button>
                                            <button type="button" class="btn btn-danger d-flex" data-bs-toggle="modal" data-bs-target="#delete<?=$nj['id_nota_jasa']?>">
                                                   <li class="bi bi-trash me-1" style="list-style-type: none; padding-top: 6px"></li>
                                                   <div style="padding-top: 4px">Hapus</div>
                                            </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Modal Delete-->
    <?php foreach ($notajasa->show() as $value){
        echo'
            <div id="delete'.$value['id_nota_jasa'].'" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-end">
                                <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="mt-1">
                                <h4>Yakin untuk menghapus?</h4>	
                                <p>Apakah benar anda ingin menghapus '.$value['id_nota_jasa'].'?</p>
                            </div>
                            <div class="d-flex flex-row-reverse mt-3">
                                <form action="" method="post">
                                    <input type="hidden" name="id_nota_jasa" value="'.$value['id_nota_jasa'].'" class="form-control col-6">
                                    <button class="btn btn-danger" type="submit" name="delete">Hapus</button>
                                </form>
                                <button class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }?>

    <!-- Modal Update-->
    <?php foreach ($notajasa->show() as $value) : ?>
        <div class="modal fade bd-example-modal-lg" id="update<?=$value['id_nota_jasa']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Nota Jasa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_nota_jasa" value="<?= $value['id_nota_jasa'] ?>" class="form-control col-6">

                            <label for="tgl_nota_jasa">Pilih Tanggal</label>
                            <input type="date" class="form-control w-25" value="<?= $value['tgl_nota_jasa'] ?>" name="tgl_nota_jasa" required>

                            <div class="submit mt-4">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        Simpan
                                    </button>
                            </div>
                            </form>

                        </div>
                    </div>
            </div>
    </div>
    <?php endforeach; ?>

    <!-- Modal Tambah -->
    <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Nota Jasa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <label for="nama_calon_konsumen" class="form-label">ID Nota Jasa</label>
                                    <input type="text" name="id_nota_jasa" class="form-control">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="tgl_penawaran_terakhir" class="form-label w-25">Tanggal Nota Jasa</label>
                                    <input type="date" name="tgl_nota_jasa" class="form-control">
                                </div>

                                <div class="submit mt-4">
                                    <button type="submit" name="add" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
            </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>