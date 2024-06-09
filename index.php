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
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
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

                        <li class="sidebar-item active">
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
        
    </div>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>
</html>