<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <img src="<?= base_url('assets/logo/logo-white.png') ?>" class="ml-5 mt-2" alt="AdminLTE Logo" width="100px" style="opacity: .8">
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
                    <li class="nav-header">HOME</li>
                    <li class="nav-item">
                        <a href="<?= base_url('owner') ?>" class="nav-link">
                            <i class="nav-icon fas fa-home mr-4"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('owner/pegawai') ?>" class="nav-link">
                            <i class="nav-icon fas fa-users mr-4"></i>
                            <p>
                                Pegawai
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('owner/supplier') ?>" class="nav-link">
                            <i class="nav-icon fas fa-store mr-4"></i>
                            <p>
                                Supplier
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('owner/material') ?>" class="nav-link">
                            <i class="nav-icon fas fa-archive mr-4"></i>
                            <p>
                                Bahan Baku
                            </p>
                        </a>
                    </li>
                    <li class="nav-header ">LAPORAN</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard mr-4"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('ups') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('ups') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('ups') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Laporan</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                <?php } else if ($this->session->userdata('side') == 'gudang') { ?>
                    <li class="nav-header">HOME</li>
                    <li class="nav-item">
                        <a href="<?= base_url('gudang') ?>" class="nav-link">
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
                                Bahan Baku
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('gudang/material') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Stok Bahan</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('gudang/material_in') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Bahan Masuk</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('gudang/material_out') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Bahan Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header ">LAPORAN</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard mr-4"></i>
                            <p>
                                Laporan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('gudang/lap_material') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Lap. Bahan Masuk</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('gudang/lap_material_out') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon mr-4"></i>
                                    <p>Lap. Bahan Keluar</p>
                                </a>
                            </li>
                        </ul>

                    </li>

                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>