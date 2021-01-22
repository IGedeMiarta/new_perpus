     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Pegawai</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('owner') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('owner/pegawai') ?>">Pegawai</a></li>
                             <li class="breadcrumb-item active">Edit Pegawai</li>
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
                     <form method="POST" action="<?= base_url('owner/pegawai_edt_act/') . $pegawai['id_pegawai'] ?>">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $pegawai['nama'] ?>">
                                 <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="jenkel">
                                     <option selected value="<?= $pegawai['jenkel'] ?>"><?php if ($pegawai['jenkel'] == 'L') {
                                                                                            echo 'Laki-Laki';
                                                                                        } else {
                                                                                            echo 'perempuan';
                                                                                        }
                                                                                        ?></option>
                                     <option value="L">Laki-Laki</option>
                                     <option value="P">Perempuan</option>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                             <div class="col-sm-10">
                                 <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Tanggal Lahir" value="<?= $pegawai['tgl_lahir'] ?>">
                                 <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nomer Hp</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor Hp" value="<?= $pegawai['no_hp'] ?>">
                                 <?= form_error('hp', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat lengkap" value="<?= $pegawai['alamat'] ?>">
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