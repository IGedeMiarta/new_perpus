<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        All rights reserved.
    </div>
    <strong>Copyright &copy; 2020 </strong> Gudang Kopi Gayo
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('vendor/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('vendor/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('vendor/AdminLTE/') ?>dist/js/demo.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<script type="text/javascript">
    function autofill() {
        var material = $("#material").val();
        $.ajax({
            url: "<?= base_url('gudang/cari') ?>",
            data: 'material=' + material,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('jumlah').value = val.jumlah;
                });
            }
        });
    }
</script>

<script type="text/javascript">
    function fill1() {
        var produk = $("#produk1").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga1').value = val.harga;
                });
            }
        });
    }
</script>
<script type="text/javascript">
    function fill2() {
        var produk = $("#produk2").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga2').value = val.harga;
                });
            }
        });
    }
</script>
<script type="text/javascript">
    function fill3() {
        var produk = $("#produk3").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga3').value = val.harga;
                });
            }
        });
    }
</script>
<script type="text/javascript">
    function fill4() {
        var produk = $("#produk4").val();
        $.ajax({
            url: "<?= base_url('kasir/cari') ?>",
            data: 'produk=' + produk,
            success: function(data) {
                var hasil = JSON.parse(data);
                $.each(hasil, function(key, val) {
                    document.getElementById('harga4').value = val.harga;
                });
            }
        });
    }
</script>


<script>
    $(document).ready(function() {
        for (B = 1; B <= 1; B++) {
            Barisbaru();
        }
        $('#BarisBaru').click(function(e) {
            e.preventDefault();
            Barisbaru();
        });
        $("tableLoop tbody").find('input[type=text]').filter(':visible:first').focus
    });

    function Barisbaru() {
        $(document).ready(function() {
            $("[data-toogle='tooltip'").tooltip();
        })
        var Nomor = $("#tableLoop tbody tr").length + 1;
        var Baris = '<tr>';
        Baris += '<td class="text-center">' + Nomor + '</td>';
        Baris += '<td>';
        Baris += '<input type="text" name="produk[]"  class="form-control" placeholder="Nama Produk" required="">';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="text" name="harga[]" class="form-control" placeholder="Harga" required="">';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah Beli" required="">';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<a class="btn btn-sm btn-danger text-center" id="hapusBaris" data-toggle="tooltip" title="Hapus Baris"><i class="fa fa-times text-white"></i></a>';
        Baris += '</td>';
        Baris += '</tr>';

        $("#tableLoop tbody").append(Baris);
        $("#tableLoop tbody tr").each(function() {
            $(this).find('td:nth-child(2) input').focus();
        });

    }
    $(document).on('click', '#hapusBaris', function(e) {
        e.preventDefault();
        var Nomor = 1;
        $(this).parent().parent().remove();
        $('tableLoop tbody tr').each(function() {
            $(this).find('td:nth-child(1)').html(Nomor);
            Nomor++;
        });
    });
</script>

</body>

</html>