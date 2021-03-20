     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Rak Buku</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('petugas') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Rak</li>
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
                     <?php echo $this->session->flashdata('messege'); ?>
                     <a href="<?= base_url('petugas/donatur_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>
                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No </th>
                                 <th scope="col">Nama </th>
                                 <th scope="col">Keterangan</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($rak as $p) { ?>
                                 <tr>
                                     <td width="10px"><?= $no++ ?></td>
                                     <td><?= $p->nama_rak ?></td>
                                     <td><?= $p->detail ?></td>
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