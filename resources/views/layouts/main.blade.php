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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- //cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <!--aside bar-->
    <nav class="navbar active">
        <div class="navbar-container">
            <!--logo div-->
            <div class="navbar-logo-div">
                <a class="navbar-logo-link" href="/">
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
                        <h4>DASHBOARD</h4>
                    </div>
                </div>
                <li class="menu-item <?php echo ($data['active'] == 'home' ? 'active' : ''); ?>">
                    @if (!session('user'))
                    <a class="menu-link" href="{{ route('login') }}">
                        <i class="fas fa-solid fa-table"></i>
                        <span class="menu-link-text">Masuk Ke Admin</span>
                    </a>
                    @else
                    <div class="menu-link">
                        <i class="fas fa-solid fa-table"></i>
                        <span class="menu-link-text">Selamat datang {{ session('user')->name }}</span>
                    </div>
                    @endif
                </li>
                <div class="fungsi sosial">
                    <div class="fungsi-item">
                        <i class="fa-solid fa-people-group"></i>
                        <h4>Sosial</h4>
                    </div>
                </div>
                <li class="menu-item <?php echo ($data['active'] == 'kependudukan' ? 'active' : ''); ?>">
                    <div class="menu-wide kependudukan">
                        <div class="menu-link">
                            <i class="fa-solid fa-people-roof"></i>
                            <span class="menu-link-text">Kependudukan</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <ul class="submenu-list kependudukan">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-kependudukan">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-kependudukan">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'ketenagakerjaan' ? 'active' : ''); ?>">
                    <div class="menu-wide ketenagakerjaan">
                        <div class="menu-link">
                            <i class="fa-solid fa-briefcase"></i>
                            <span class="menu-link-text">Ketenagakerjaan</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list ketenagakerjaan">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-ketenagakerjaan">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-ketenagakerjaan">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'ipm' ? 'active' : ''); ?>">
                    <div class="menu-wide ipm">
                        <div class="menu-link">
                            <i class="fa-solid fa-hand-holding-droplet"></i>
                            <span class="menu-link-text">IPM</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list ipm">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-ipm">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-ipm">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'ketimpangan' ? 'active' : ''); ?>">
                    <div class="menu-wide ketimpangan">
                        <div class="menu-link">
                            <i class="fa-solid fa-money-bill-wheat"></i>
                            <span class="menu-link-text">Ketimpangan</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list ketimpangan">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-ketimpangan">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-ketimpangan">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item <?php echo ($data['active'] == 'kemiskinan' ? 'active' : ''); ?>">
                    <div class="menu-wide kemiskinan">
                        <div class="menu-link">
                            <i class="fa-solid fa-hands-praying"></i>
                            <span class="menu-link-text">Kemiskinan</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list kemiskinan">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-kemiskinan">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-kemiskinan">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <div class="fungsi ekonomi">
                    <div class="fungsi-item">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        <h4>Ekonomi</h4>
                    </div>
                </div>
                <li class="menu-item">
                    <div class="menu-wide pdrb">
                        <div class="menu-link">
                            <i class="fa-solid fa-rupiah-sign"></i>
                            <span class="menu-link-text">PDRB</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list pdrb">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-pdrb">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-pdrb">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <div class="menu-wide penerimaan">
                        <div class="menu-link">
                            <i class="fa-solid fa-money-bill-1"></i>
                            <span class="menu-link-text">Penerimaan Daerah</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list penerimaan">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-penerimaan">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-penerimaan">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <div class="menu-wide produksi">
                        <div class="menu-link">
                            <i class="fa-solid fa-bowl-rice"></i>
                            <span class="menu-link-text">Produksi</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list produksi">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-produksi">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-produksi">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <div class="menu-wide inflasi">
                        <div class="menu-link">
                            <i class="fa-solid fa-money-bill-trend-up"></i> 
                            <span class="menu-link-text">Inflasi</span>
                        </div>
                        <i class="fa-solid fa-chevron-right"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                    <!-- arrow -->
                    <!-- submenu -->
                    <ul class="submenu-list inflasi">
                        <li class="submenu-item">
                            <a class="submenu-link" href="/dashboard-inflasi">
                                <i class="fa-solid fa-chart-line"></i>
                                <span class="submenu-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="submenu-item">
                            <a class="submenu-link" href="/tabulasi-inflasi">
                                <i class="fa-solid fa-table-list"></i>
                                <span class="submenu-link-text">Tabulasi</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <!--div user info-->
        <div class="user-container">
            <div class="user-info">
                <i class="fas fa-solid fa-user"></i>
                <div class="user-details">
                    @if (session('user'))
                    <h3 class="user-name">{{ session('user')->name }}</h3>
                    @else
                    <h3 class="user-name">Guest</h3>
                    @endif
                </div>
            </div>
            @if (session('user'))
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sharp fa-regular fa-arrow-right-from-bracket"> Logout</i>
                </button>
            </form>
            @endif
        </div>

    </nav>

    <!--dashboard-->
    <main class="dashboard">
        <!-- <h1 class="section-heading">DATA <?php echo $data['title'] ?></h1>
        <div class="wrapper">
            <h2 class="small-heading">KABUPATEN BANTUL</H2>
        </div> -->
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('.tabel').DataTable();

            // Add event listener to the select input for tahun filter
            $('#tahun-filter').on('change', function() {
                var tahun = $(this).val();

                // Use DataTables search API to filter by tahun
                table
                    .columns(1) // Assuming "tahun" is the second column (index 1)
                    .search(tahun)
                    .draw();
            });

            var table2 = $('.tabel2').DataTable();
            $('#tahun-filter2').on('change', function() {
                var tahun = $(this).val();

                // Use DataTables search API to filter by tahun
                table2
                    .columns(1) // Assuming "tahun" is the second column (index 1)
                    .search(tahun)
                    .draw();
            });
        });
    </script>

</body>

</html>