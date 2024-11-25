<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>datapengguna.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                Pengguna
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="<?= $main_url ?>datakendaraan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-car"></i></div>
                                Kendaraan
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>datapenyewa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-person"></i></div>
                                Penyewa
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>datatransaksi.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
                                Transaksi
                            </a>
                            <hr class="mb-0">
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= "Admin"?>
                    </div>
                </nav>
            </div>