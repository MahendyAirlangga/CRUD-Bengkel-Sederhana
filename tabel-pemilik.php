<?php

require_once 'pemilik.php';

$pemilik = new pemilik;

// Delete pemilik
if(isset($_POST['delete'])){
    $id_pemilik = $_POST['id_pemilik'];

    $pemilik->delete($id_pemilik);

    header("Location: tabel-pemilik.php");
}

// Update pembayaran
if(isset($_POST['update'])){
    // id_pembayaran, id_pemesanan, tgl_pembayaran, jenis_pembayaran, status_pembayaran, total_pembayaran
    $id_pemilik = $_POST['id_pemilik'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat_pemilik = $_POST['alamat_pemilik'];
    $telp_pemilik = $_POST['telp_pemilik'];

    $pemilik->update($id_pemilik, $nama_pemilik, $alamat_pemilik, $telp_pemilik);
    
    header("Location: tabel-pemilik.php");
}

// Tambah pembayaran
if(isset($_POST['add'])){
    // id_pembayaran, id_pemesanan, tgl_pembayaran, jenis_pembayaran, status_pembayaran, total_pembayaran
    $id_pemilik = $_POST['id_pemilik'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat_pemilik = $_POST['alamat_pemilik'];
    $telp_pemilik = $_POST['telp_pemilik'];

    $pemilik->store($id_pemilik, $nama_pemilik, $alamat_pemilik, $telp_pemilik);
    
    header("Location: tabel-pemilik.php");
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
<div id="sidebar" class="active">
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

                        <li class="sidebar-item active">
                            <a href="tabel-pemilik.php" class='sidebar-link'>
                                <span>Pemilik</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
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
                            <h3>Tabel Pemilik</h3>
                            <button type="button" class="btn btn-info mb-3 mt-4 d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#tambah">
                                <span class="bi bi-plus-square me-2" style="padding-top: 2px;"></span>Tambah Pemilik
                            </button>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tabel Pemilik</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-borderless" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID PEMILIK</th>
                                        <th scope="col">NAMA PEMILIK</th>
                                        <th scope="col">ALAMAT PEMILIK</th>
                                        <th scope="col">TELP PEMILIK</th>
                                        <th scope="col" class="text-center">UBAH / HAPUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pemilik->show() as $pem) : ?>
                                        <tr>
                                            <td scope="col"><?= $pem['id_pemilik'] ?></td>
                                            <td scope="col"><?= $pem['nama_pemilik'] ?></td>
                                            <td scope="col"><?= $pem['alamat_pemilik'] ?></td>
                                            <td scope="col"><?= $pem['telp_pemilik'] ?></td>
                                            <td class="d-flex justify-content-center">
                                               <button type="button" class="btn btn-primary me-1 d-flex" data-bs-toggle="modal" data-bs-target="#update<?=$pem['id_pemilik']?>">
                                                   <li class="bi bi-pencil-square me-1" style="list-style-type: none; padding-top: 6px"></li>
                                                   <div style="padding-top: 4px">Ubah</div>
                                               </button>
                                               <button type="button" class="btn btn-danger d-flex" data-bs-toggle="modal" data-bs-target="#delete<?=$pem['id_pemilik']?>">
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

    <!-- modal tambah -->
    <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemilik</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <label for="nama_calon_konsumen" class="form-label">ID Pemilik</label>
                                    <input type="text" name="id_pemilik" class="form-control">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="nama_calon_konsumen" class="form-label">Nama Pemilik</label>
                                    <input type="text" name="nama_pemilik" class="form-control">
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="stok_barang" class="form-label">Alamat Pemilik</label>
                                    <input type="text" name="alamat_pemilik" class="form-control">
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="tgl_penawaran_terakhir" class="form-label">Telp Pemilik</label>
                                    <input type="text" name="telp_pemilik" class="form-control">
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

    <!-- Modal Delete-->
    <?php foreach ($pemilik->show() as $pem){
        echo'
            <div id="delete'.$pem['id_pemilik'].'" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-end">
                                <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="mt-1">
                                <h4>Yakin untuk menghapus?</h4>	
                                <p>Apakah benar anda ingin menghapus '.$pem['nama_pemilik'].'?</p>
                            </div>
                            <div class="d-flex flex-row-reverse mt-3">
                                <form action="" method="post">
                                    <input type="hidden" name="id_pemilik" value="'.$pem['id_pemilik'].'" class="form-control col-6">
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
        <?php foreach ($pemilik->show() as $pem){
        echo '
            <div class="modal fade bd-example-modal-lg" id="update'.$pem['id_pemilik'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Calon Konsumen</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="" method="post">
                                <input type="hidden" name="id_pemilik" value="'.$pem['id_pemilik'].'" class="form-control col-6">

                                <div class="mb-3 mt-3">
                                    <label for="nama_pemilik" class="form-label">Nama Calon Konsumen</label>
                                    <input type="text" name="nama_pemilik" value="'.$pem['nama_pemilik'].'" class="form-control">
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="alamat_pemilik" class="form-label">Email Calon Konsumen</label>
                                    <input type="text" name="alamat_pemilik" value="'.$pem['alamat_pemilik'].'" class="form-control">
                                </div>
                                
                                <div class="mb-3 mt-3">
                                    <label for="telp_pemilik" class="form-label">Tanggal Penawaran Terakhir</label>
                                    <input type="text" name="telp_pemilik" value="'.$pem['telp_pemilik'].'" class="form-control">
                                </div>

                                <div class="submit mt-4">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>';
    }?>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>
</html>