     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Bahan Keluar</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('gudang') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Bahan Keluar</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <?php echo $this->session->flashdata('messege'); ?>
             <!-- Default box -->
             <div class="card">
                 <div class="card-header badge badge-dark">
                     <h5 class="text-dark">Tambah Material Keluar</h5>
                 </div>
                 <div class="card-body">
                     <form method="POST" action="<?= base_url('gudang/material_out_act') ?>">
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Nama Material</label>
                             <div class="col-sm-10">
                                 <select class="form-control" name="material" id="material" onchange="autofill()">
                                     <option selected>-- Pilih</option>
                                     <?php foreach ($material as $mtrl) { ?>
                                         <option value="<?= $mtrl->kd_material; ?>"><?= $mtrl->bentuk . ' - ' . $mtrl->nama; ?></option>
                                     <?php } ?>
                                 </select>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Tersedia /pcs</label>
                             <div class="col-sm-10">
                                 <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Material Tersedia / gram" readonly>
                             </div>
                         </div>
                         <div class="form-group row">
                             <label for="example-text-input" class="col-sm-2 col-form-label">Jumlah Keluar</label>
                             <div class="col-sm-10">
                                 <input type="number" class="form-control" placeholder="jumlah keluar /pcs" name="keluar">
                                 <?= form_error('keluar', '<small class="text-danger pl-3">', '</small>');  ?>
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
             <div class="card">
                 <div class="card-header badge badge-warning">
                     <h5>Data Material Keluar</h5>
                 </div>
                 <div class="card-body">
                     <!-- <a href="<?= base_url('gudang/material_out_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a> -->
                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Nama Material </th>
                                 <th scope="col">Tanggal Keluar</th>
                                 <th class="text-center" scope="col">
                                     Jumlah Kirim
                                 </th>
                                 <th scope="col">Opsi</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($masuk as $mtrl) { ?>
                                 <tr>
                                     <th width="10px" scope="row"><?= $no++ ?></th>

                                     <td><?= $mtrl->nama ?></td>
                                     <td><?= date("d M Y", strtotime($mtrl->waktu)) ?></td>
                                     <td class="text-center"><?= $mtrl->jumlah ?> gram</td>
                                     <td width=150px>
                                         <a href="<?= base_url('gudang/material_out_edt/') . $mtrl->kd_keluar ?>" class="badge badge-warning"><i class="fas fa-edit"></i> Edit</a>
                                         <a href="<?= base_url('gudang/material_out_del/') . $mtrl->kd_keluar ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>

                                     </td>
                                 </tr>
                             <?php } ?>
                         </tbody>
                     </table>
                 </div>
             </div>
             <!-- /.card -->

         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->