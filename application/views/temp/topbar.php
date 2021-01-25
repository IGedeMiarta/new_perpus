<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->

    <!-- Notifications Dropdown Menu -->
    <!-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">1 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>

                    </div>
                </li> -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user "> Petugas
                <!-- <?php if ($this->session->userdata('side') == 'admin') {
                            echo ' ADMINISTRATOR';
                        } else {
                            echo ' Bag. Gudang';
                        } ?> -->
                <i class="fas fa-angle-down ml-2"></i>
            </i>

        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="#" class="dropdown-item">
                <i class="fas fa-user mr-4"></i>User
            </a>
            <a href="<?= base_url('login/logout') ?>" class="dropdown-item">
                <i class="fas fa-sign-out-alt mr-4"></i>Logout
            </a>

        </div>
    </li>
</ul>
</nav>
<!-- /.navbar -->