<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Detail Buku</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- start -->
            <div class="card">

                <div class="card-header">

                    <div class="card">
                        <div class="card-header" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= base_url('assets/image/book.png') ?>" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body bg-transparent">
                                        <table>
                                            <tr>
                                                <td></td>
                                                <td> <b>Kode</b></td>
                                                <td width="5%"></td>
                                                <td>:</td>
                                                <td><b><?= $buku['kd_buku'] ?></b></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Judul</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $buku['judul'] ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Tahun Terbit</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $buku['th_terbit'] ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Penulis</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $buku['nama_pengarang'] ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td> Penerbit</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $buku['nama_penerbit']  ?></td>
                                            </tr>

                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo base_url() . 'petugas/buku_detail_add/' . $buku['id'] ?>" class='btn btn-sm btn-success pull-right'><i class="fa fa-plus"></i> Detail Buku</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-datatable">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>

                                    <th>Kode</th>
                                    <th>Judul Buku</th>
                                    <th>Tahun Terbit</th>
                                    <th>Rak Buku</th>
                                    <th>Status</th>
                                    <th width="10%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail as $d) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d->kd_detail; ?></td>
                                        <td><?php echo $d->judul; ?></td>
                                        <td><?php echo $d->th_terbit; ?></td>
                                        <td><?php echo '<b>[ ' . $d->nama_rak . ' ] </b>' . $d->detail ?></td>
                                        <td>
                                            <?php
                                            if ($d->status_buku == "1") {
                                                echo "<span class='badge badge-success'>Tersedia</span>";
                                            } else {
                                                echo "<span class='badge badge-warning'>Sedang Dipinjam</span>";
                                            }
                                            ?>
                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <strong>Opsi</strong>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="<?php echo base_url() . 'petugas/buku_detail_edit/' . $d->kd_detail; ?>"><i class="far fa-fw fa-edit"></i> Edit</a>
                                                    <a class="dropdown-item" href="<?php echo base_url() . 'petugas/buku_detail_hapus/' . $d->kd_detail; ?>" onclick="return confirm('Yakin Hapus Buku ?')"><i class="fas fa-fw fa-trash-alt"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    // }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->