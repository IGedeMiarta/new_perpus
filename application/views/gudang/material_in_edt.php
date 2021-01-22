     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Edit Bahan Masuk</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('gudang') ?>">Home</a></li>
                             <li class="breadcrumb-item"><a href="<?= base_url('gudang/material_in') ?>">Bahan Masuk</a></li>
                             <li class="breadcrumb-item active">Edit Bahan Masuk</li>
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
                     <form method="POST" action="<?= base_url('gudang/material_update/') . $edit['kd_masuk'] ?>">

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="material">
                                     <option value="<?= $edit['kd_material'] ?>" selected><?= $edit['nama'] ?></option>
                                     <?php foreach ($material as $mtrl) { ?>
                                         <option value="<?= $mtrl->kd_material; ?>"><?= $mtrl->nama; ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Kemasan</label>
                             <div class="col-sm-10">
                                 <select name="kemasan" id="" class="form-control">
                                     <option value="<?= $edit['kemasan'] ?>"><?= $edit['kemasan'] ?> gram</option>
                                     <option value="100">100 gram</option>
                                     <option value="150">150 gram</option>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama Supplier</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="supplier">
                                     <option value="<?= $edit['id_sup'] ?>" selected><?= $edit['nama_sup'] ?></option>
                                     <?php foreach ($supplier as $s) { ?>
                                         <option value="<?= $s->id_sup; ?>"><?= $s->nama_sup; ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>

                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah Masuk</label>
                             <div class="col-sm-10">
                                 <input type="number" class="form-control" class="form-control" name="masuk" value="<?= $edit['jumlah'] ?>">
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