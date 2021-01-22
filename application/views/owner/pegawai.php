     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Pegawai</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?= base_url('owner') ?>">Home</a></li>
                             <li class="breadcrumb-item active">Pegawai</li>
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
                     <a href="<?= base_url('owner/pegawai_add') ?>" class="btn btn-success mb-3"><i class="dripicons-plus"></i> Tambah</a>

                     <!-- <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle mb-3" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="dripicons-plus mr-1"></i> Tambah
                    </button>
                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-animated">
                        <a class="dropdown-item" href="<?= base_url('owner/pegawai_add') ?>">Tambah Pegawai</a>
                        <a class="dropdown-item" href="<?= base_url('owner/regist') ?>">Tambah User</a>
                    </div>
                </div> -->


                     <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                         <thead>
                             <tr>
                                 <th scope="col">No</th>
                                 <th scope="col">Nama </th>
                                 <th scope="col">Jenis Kelamin</th>
                                 <th scope="col">Tgl Lahir</th>
                                 <th scope="col">Nomor Hp</th>
                                 <th scope="col">Alamat</th>
                                 <th scope="col">Role</th>
                                 <th scope="col">Akun</th>
                                 <th scope="col">Option</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php
                                $no = 1;
                                foreach ($pegawai as $p) { ?>
                                 <tr>
                                     <th width="10px" scope="row"><?= $no++ ?></th>
                                     <td><?= $p->nama ?></td>
                                     <td><?php
                                            if ($p->jenkel == 'L') {
                                                echo "Laki-Laki";
                                            } else {
                                                echo "Perempuan";
                                            }
                                            ?></td>
                                     <td><?= $p->tgl_lahir ?></td>
                                     <td><?= $p->no_hp ?></td>
                                     <td><?= $p->alamat ?></td>
                                     <td><?php
                                            if ($p->role == 2) {
                                                echo " Gudang";
                                            }
                                            ?></td>
                                     <td class="text-center">
                                         <?php if ($p->user == 'null') { ?>
                                             <a href="<?= base_url('owner/regist/' . $p->id_pegawai) ?>" class="badge badge-success"><i class="dripicons-document-edit"></i> Buat</a>
                                         <?php } else {
                                                echo "-";
                                            } ?>
                                     </td>
                                     <td>
                                         <a href="<?= base_url('owner/pegawai_edt/' . $p->id_pegawai) ?>" class="badge badge-warning pull-right"><i class="dripicons-document-edit"></i> Edit</a>
                                         <a href="<?= base_url('owner/pegawai_del/' . $p->id_pegawai) ?>" onclick="return confirm('Yakin Ingin Hapus?')" class="badge badge-danger pull-right"><i class="dripicons-trash"></i> Hapus</a>
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