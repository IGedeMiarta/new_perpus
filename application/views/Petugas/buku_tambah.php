<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Home</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'petugas/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active">Tambah Buku</li>
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
                    <h4>Tambah Buku Baru</h4>
                </div>
                <div class="card-body">
                    <a href="<?php echo base_url() . 'petugas/buku' ?>" class='btn btn-sm btn-light btn-outline-dark pull-right'><i class="fa fa-arrow-left"></i> Kembali</a>
                    <br />
                    <br />
                    <form method="post" action="<?php echo base_url() . 'petugas/buku_add'; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cari">Kode Buku</label>
                            <input type="text" class="form-control" id="id_buku" name="id_buku" value="BK<?php echo sprintf("%04s", $id_buku) ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="judul">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukkan judul buku" required="required">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="tahun">Tahun Terbit</label>
                            <select class="form-control" name="tahun" required="required">
                                <option value="">- Pilih tahun</option>
                                <?php for ($tahun = date('Y'); $tahun >= 2010; $tahun--) { ?>
                                    <option value="<?php echo $tahun; ?>"><?php echo $tahun; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="penerbit">Penulis Buku</label>
                            <input type="text" class="form-control" name="penulis" placeholder="Masukkan nama penulis" required="required" ">
                        </div>
                        <div class=" form-group">
                            <label class="font-weight-bold" for="penerbit">penerbit Buku</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukkan nama penerbit" required="required" ">
                        </div>
                        <div class=" form-group">
                            <label class="font-weight-bold" for="penerbit">Kategori</label>
                            <select name="kategori" id="" class="form-control">
                                <option value="">--Pilih</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
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