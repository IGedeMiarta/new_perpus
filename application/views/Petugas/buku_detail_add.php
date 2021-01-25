<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Detail Buku</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Tambah Detail Buku</li>
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
                <div class="card-header text-center">
                    <h4>Tambah Detail <b><?= $buku['judul'] ?></b></h4>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url() . 'petugas/buku_detail_aksi'; ?>">
                        <div class="form-group">
                            <label for="cari">Kode Buku</label>
                            <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $buku['kd_buku'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="cari">Kode Detail Buku</label>
                            <input type="text" class="form-control" id="id_detail" name="id_detail" value="<?= $id_detail ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="judul">Rak Buku</label>
                            <select name="rak" class="form-control" id="">
                                <option value="">--pilih</option>
                                <?php foreach ($rak as $r) : ?>
                                    <option value="<?= $r->id_rak ?>"><?= $r->nama_rak . ' || ' . $r->detail ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>




            <!-- end -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->