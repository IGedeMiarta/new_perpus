     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1> Anggota Baru</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('owner') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('owner/anggota') ?>">anggota</a></li>
                             <li class="breadcrumb-item active">Daftar</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">

             <!-- Default box -->
             <div class="card">
                 <div class="card-body">
                     <form method="POST" action="<?= base_url('petugas/anggota_act') ?>">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Induk</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="nis" placeholder="Nomer Induk" value="<?= set_value('nis'); ?>">
                                 <?= form_error('nis', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="jenkel">
                                     <option selected>-- Pilih</option>
                                     <option value="L">Laki-Laki</option>
                                     <option va lue="P">Perempuan</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= set_value('hp'); ?>">
                                 <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                             <div class="col-sm-10">
                                 <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" value="<?= set_value('alamat'); ?>"></textarea>
                                 <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
                             <div class="col-sm-10">
                                 <select name="status" class="form-control" id="">
                                     <option value="1">Non Aktif</option>
                                     <option value="2" selected>Aktif</option>
                                     <option value="3">Alumni</option>
                                 </select>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-2">
                             </div>
                             <div class="col-sm-10">
                                 <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                             </div>
                         </div>
                     </form>
                 </div>

             </div>
             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->