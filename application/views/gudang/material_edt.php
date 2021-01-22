     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Material</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('gudang') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Edit Material</li>
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

                     <form method="POST" action="<?= base_url('gudang/material_edt_act/' . $edit['kd_material']) ?>">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                             <div class="col-sm-10">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Nama Material" value="<?= $edit['nama'] ?>">
                                 <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Varian</label>
                             <div class="col-sm-10">
                                 <?php
                                    $style = 'class="form-control input-sm"';
                                    echo form_dropdown('varian', $varian, $edit['varian'], $style);
                                    ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Tipe</label>
                             <div class="col-sm-10">
                                 <?php
                                    $style = 'class="form-control input-sm"';
                                    echo form_dropdown('tipe', $tipe, $edit['tipe'], $style);
                                    ?>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Bentuk Kopi</label>
                             <div class="col-sm-10">
                                 <?php
                                    $style = 'class="form-control input-sm"';
                                    echo form_dropdown('bentuk', $bentuk, $edit['tipe'], $style);
                                    ?>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-sm-2">

                             </div>
                             <div class="col-sm-10">
                                 <button type="submit" class="btn btn-primary mt-2">Simpan</button>
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