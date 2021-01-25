     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1> Tambah Donatur</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('owner') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('owner/donatur') ?>">Donatur</a></li>
                             <li class="breadcrumb-item active">Tambah</li>
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
                     <form method="POST" action="<?= base_url('petugas/donatur_update/') . $dd['id_donatur'] ?>">

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="nama" placeholder="Nama Lengkap" value="<?= $dd['nama_donatur']; ?>">
                                 <?= form_error('nama', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="jenkel">
                                     <option value="<?= $dd['jenkel']; ?>" selected><?php if ($dd['nama'] = 'L') {
                                                                                        echo "Laki-Laki";
                                                                                    } else {
                                                                                        echo "Perempuan";
                                                                                    }; ?></option>
                                     <option value="L">Laki-Laki</option>
                                     <option va lue="P">Perempuan</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= $dd['no_hp'] ?>">
                                 <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                             <div class="col-sm-10">
                                 <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap"><?= $dd['alamat']; ?></textarea>
                                 <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>');  ?>
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