<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <img src="<?= base_url('assets/logo/logo-white.png') ?>" class="ml-5 mt-2" alt="AdminLTE Logo" width="100px" style="opacity: .8"> -->
    <h2 class="text-light ml-2">Perpustakaan</h2>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-n2 pb-3 mb-3 d-flex">
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if ($this->session->userdata('side') == 'admin') { ?>

                <?php }  ?>

                <li class="nav-header">HOME</li>
                <li class="nav-item">
                    <a href="<?= base_url('petugas') ?>" class="nav-link">
                        <i class="nav-icon fas fa-home mr-4"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-archive mr-4"></i>
                        <p>
                            Management Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/buku') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Buku</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/buku') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Pengarang</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/buku') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Penerbit</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/rak') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Rak</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user mr-4"></i>
                        <p>
                            Data Anggota
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/anggota_add') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Pendaftaran</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/anggota') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Cetak Kartu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user mr-4"></i>
                        <p>
                            Data Donatur
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Donasi</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('petugas/donatur') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon mr-4"></i>
                                <p>Donatur</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>