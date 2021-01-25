     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Dashboard</h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="<?php if ($this->session->userdata('side') == 'admin') {
                                                                        echo base_url('owner');
                                                                    } else {
                                                                        echo base_url('gudang');
                                                                    }
                                                                    ?>">Home</a></li>
                             <li class="breadcrumb-item active">Dashboard</li>
                         </ol>
                     </div>
                 </div>
             </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
             <div class="content">
                 <div class="container-fluid">
                     <!-- start -->
                     <div class="jumbotron text-center">
                         <div class="col-sm-8 mx-auto">
                             <h1>Selamat datang!</h1>
                             <p><?= $teks ?></b>.</p>
                             <p>
                                 Anda telah login sebagai <b><?php echo $role ?></b>
                             </p>

                         </div>
                     </div>
                     <!-- Small boxes (Stat box) -->

                     <!-- /.row -->
                     <!-- Main row -->





                     <!-- end -->
                 </div><!-- /.container-fluid -->
             </div>
         </section>
         <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->