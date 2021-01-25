     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Anggota</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('petugas') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Anggota</li>
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
                     <!-- <a href="<?= base_url('petugas/anggota_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a> -->
                     <table id="example1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>

                                 <th scope="col">NIS</th>
                                 <th scope="col">Nama </th>
                                 <th scope="col">Jenis Kelamin</th>
                                 <th scope="col">Alamat</th>
                                 <th scope="col">No HP</th>
                                 <th scope="col">Status</th>
                                 <th scope="col">Opsi</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($anggota as $p) { ?>
                                 <tr>
                                     <td><?= $p->nis ?></td>
                                     <td><?= $p->nama ?></td>
                                     <td><?php
                                            if ($p->jenis_kel == 'L') {
                                                echo "Laki-Laki";
                                            } else {
                                                echo "Perempuan";
                                            }
                                            ?></td>
                                     <td><?= $p->alamat ?></td>
                                     <td><?= $p->no_hp ?></td>
                                     <td><?= $p->status_anggota ?></td>

                                     <td>
                                         <div class="btn-group ">
                                             <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <strong>Opsi</strong>
                                             </button>
                                             <div class="dropdown-menu">
                                                 <a class="dropdown-item" href="<?= base_url('petugas/cetak_kartu/' . $p->id_anggota) ?>" class="badge badge-warning pull-right"><i class="fas fa-id-card text-right"></i> Cetak</a>
                                                 <a class="dropdown-item" href="<?= base_url('petugas/anggota_edt/' . $p->id_anggota) ?>" class="badge badge-warning pull-right"><i class="fas fa-edit text-right"></i> Edit</a>
                                                 <a class="dropdown-item" href="<?= base_url('petugas/anggota_del/' . $p->id_anggota) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="badge badge-danger pull-right"><i class="fas fa-trash text-right"></i> Hapus</a>
                                             </div>
                                         </div>
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