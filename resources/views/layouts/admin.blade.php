<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?> | DATSTRA</title>

    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">

    <!--css-->
    <link rel="stylesheet" href="style.css">

    <!--js-->
    <script src="script.js" defer></script>


    <!-- icon -->
    <link rel="icon" href="logo_bps.png" type="image/x-icon">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->

    <!-- //cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    //cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')

    <!--aside bar-->
    <nav class="navbar">
        <div class="navbar-container">
            <!--logo div-->
            <div class="navbar-logo-div">
                <a class="navbar-logo-link" href="#">
                    <div class="identity">
                        <img src="logo_bps.png" alt="" width="30">
                        <h3 class="navbar-logo-text">DATSTRABANTUL</h3>
                    </div>
                </a>
                <button class="navbar-toggler"><i class='fas fa-solid fa-bars'></i></button>
            </div>

            <!--item list-->
            <ul class="menu-list">
                <div class="fungsi">
                    <div class="fungsi-item">
                        <i class="fa-solid fa-house"></i>
                        <h4>ADMIN</h4>
                    </div>
                </div>
                <li class="menu-item <?php echo ($data['active'] == 'home' ? 'active' : ''); ?>">
                    <a class="menu-link" href="/">
                        <i class="fas fa-solid fa-table"></i>
                        <span class="menu-link-text">KEMBALI KE DASHBOARD</span>
                    </a>
                </li>
                <div class="fungsi sosial">
                    <div class="fungsi-item">
                        <i class="fa-solid fa-people-group"></i>
                        <h4>Sosial</h4>
                    </div>
                </div>
                <li class="menu-item <?php echo ($data['active'] == 'kependudukan' ? 'active' : ''); ?>">
                    <a class="menu-link" href="/admin/kependudukan">
                        <i class="fa-solid fa-people-roof"></i>
                        <span class="menu-link-text">Kependudukan</span>

                    </a>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'ketenagakerjaan' ? 'active' : ''); ?>">
                    <a class="menu-link" class="menu-link" href="/admin/ketenagakerjaan">
                        <i class="fa-solid fa-briefcase"></i>
                        <span class="menu-link-text">Ketenagakerjaan</span>
                    </a>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'ipm' ? 'active' : ''); ?>">
                    <a class="menu-link" href="/admin/ipm">
                        <i class="fa-solid fa-hand-holding-droplet"></i>
                        <span class="menu-link-text">IPM</span>
                    </a>
                </li>
                </a>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'ketimpangan' ? 'active' : ''); ?>">
                    <a class="menu-link" class="menu-link" href="/admin/ketimpangan">
                        <i class="fa-solid fa-money-bill-wheat"></i>
                        <span class="menu-link-text">Ketimpangan</span>
                    </a>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'kemiskinan' ? 'active' : ''); ?>">
                    <a class="menu-link" class="menu-link" href="/admin/kemiskinan">
                        <i class="fa-solid fa-hands-praying"></i>
                        <span class="menu-link-text">Kemiskinan</span>
                    </a>
                </li>

                <div class="fungsi ekonomi">
                    <div class="fungsi-item">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        <h4>Ekonomi</h4>
                    </div>
                </div>
                <li class="menu-item">
                    <a class="menu-link" href="/admin/pdrb">
                        <i class="fa-solid fa-rupiah-sign"></i>
                        <span class="menu-link-text">PDRB</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/admin/harga">
                        <i class="fa-solid fa-coins"></i>
                        <span class="menu-link-text">Harga</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="/admin/penerimaan">
                        <i class="fa-solid fa-coins"></i>
                        <span class="menu-link-text">Penerimaan Daerah</span>
                    </a>
                </li>
            </ul>
        </div>

        <!--div user info-->
        <div class="user-container">
            <div class="user-info">
                <i class="fas fa-solid fa-user-secret"></i>
                <div class="user-details">
                    <h3 class="user-name">Eleanor Pena</h3>
                    <p class="user-occupation">Veterinary</p>
                </div>
            </div>
            <a class="logout-btn" href="#">
                <i class="fas fa-sharp fa-regular fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </nav>

    <!--dashboard-->
    <main class="dashboard">
        <h1 class="section-heading">DATA <?php echo $data['title'] ?></h1>
        <div class="wrapper">
            <h2 class="small-heading">KABUPATEN BANTUL</H2>
        </div>
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        let table = new DataTable('#myTable');
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>