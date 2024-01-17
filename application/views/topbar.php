<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white" style="border-bottom: 5px solid #E85B0C;"">
            <a href=" <?= base_url('Dashboard'); ?>"><img src="assets/img/icon/icontarka1.png" height="55px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class=" navbar-nav navbar-menu">
                    <li></li>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Dashboard') !== false) ? 'active' : ''; ?>" href="<?= base_url('Dashboard'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'Dashboard') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">Home</button></a></li>
                    <li> <a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Saran') !== false) ? 'active' : ''; ?>" href="<?= base_url('Saran'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'Saran') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">Saran</button></a></li>
                    <?php if ($_SESSION['role_id'] == 1) : ?>
                        <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Masukan') !== false) ? 'active' : ''; ?>" href="<?= base_url('Masukan'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'Masukan') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">Masukan</button></a></li>
                    <?php endif; ?>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Kontak') !== false) ? 'active' : ''; ?>" href="<?= base_url('Kontak'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'Kontak') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">Struktural</button></a></li>
                    <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Berita') !== false) ? 'active' : ''; ?>" href="<?= base_url('Berita'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'Berita') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">Tentang</button></a></li>
                    <?php if ($_SESSION['role_id'] == 1) : ?>
                        <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Masukan') !== false) ? 'active' : ''; ?>" href="<?= base_url('UserAdmin'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'UserAdmin') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">User</button></a></li>
                    <?php endif; ?>
                    <?php if ($_SESSION['role_id'] == 1) : ?>
                        <li><a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Masukan') !== false) ? 'active' : ''; ?>" href="<?= base_url('UserAdmin'); ?>"> <button type="button" class="btn btn-outline-dark <?= (strpos($_SERVER['PHP_SELF'], 'UserAdmin') !== false) ? 'active' : ''; ?>" style="font-family: 'Poppins',sans-serif;">Admin</button></a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <label>Hallo selamat datang,</label>
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: #4682A9; font-family: 'Alata',sans-serif;"><?= $useradmin['username']; ?></span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->

        <style>
            .navbar-menu {}

            .btn-outline-success:hover,
            .btn-outline-success:focus,
            .btn-outline-success.active {

                color: white;
            }
        </style>