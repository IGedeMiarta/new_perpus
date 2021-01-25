<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kartu Anggota</title>
</head>

<body>

    <style type="text/css">
        .card {
            border: 1px solid #000;
            width: 350px;
        }

        .card-header {
            border-bottom: 1px solid #000;
            text-align: center;
            font-weight: bold;
            padding: 10px;

        }

        .card-body {
            padding: 20px;
        }

        img {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }

        table {
            font-size: 12px;
        }
    </style>

    <div class="card">
        <table class="table table-borderless table-condensed table-hover card-header" width="100%">
            <td width="20%" align="right"><img src="<?= base_url('assets/logo/logo.jpeg') ?>" width="70%"></td>
            <td width="80%" align="center">KARTU ANGGOTA PERPUSTAKAAN<br>
                SMK MUHAMMADIYAH MLATI SLEMAN
            </td>
        </table>
        <!-- date("d M Y", strtotime($mtrl->waktu)) -->
        <div class="card-body">
            <div class="container">
                <table class="table table-borderless table-sm fs-2">
                    <tr>
                        <td rowspan="5" valign="top"><img src="<?= base_url('assets/image/user.png') ?>" width="80px">
                            <font size="1" face="times new roman"> <br>Sleman, <?php echo date('d M Y'); ?>
                                <br><br>
                                <!-- <?php echo $this->session->userdata('nama'); ?> -->
                        </td>
                        <td></td>
                        <td width="14%"><b>NIS</b></td>
                        <td width="2%"><b>:</b></td>
                        <td><b><?php echo $anggota['nis'] ?></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td> Nama</td>
                        <td>:</td>
                        <td><?php echo $anggota['nama'] ?></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td> Kelas</td>
                        <td>:</td>
                        <td><?php if ($anggota['jenis_kel'] == 'L') {
                                echo 'Laki-laki';
                            } else {
                                echo 'Perempuan';
                            } ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left" valign="top"> Alamat</td>
                        <td align="left" valign="top">:</td>
                        <td align="justufy" valign="top"><?php echo $anggota['alamat'] ?><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="left" valign="top"> No Hp</td>
                        <td align="left" valign="top">:</td>
                        <td align="justufy" valign="top"><?php echo $anggota['no_hp'] ?><br></td>
                    </tr>

                </table>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>