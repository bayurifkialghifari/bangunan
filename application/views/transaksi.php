<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Toko Bangunan | <?= $title; ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files ASD-->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <?php $this->load->view('layout/sidebar'); ?>
        <div class="main-panel" style="height: 100vh;">
            <!-- Navbar -->
            <?php $this->load->view('layout/navbar') ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <div class="card">
                            <div class="card-header">

                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                    Tambah
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead class="text-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Kasir</th>
                                            <th>Produk</th>
                                            <th>Harga Produk</th>
                                            <th>Dibeli</th>
                                            <th>Total Harga</th>
                                            <th>Di bayar</th>
                                            <th>Sisa</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($allData as $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['kode_transaksi']; ?></td>
                                                <td><?= $data['kasir']; ?></td>
                                                <td><?= $data['produk']; ?></td>
                                                <td><?= number_format($data['harga']); ?></td>
                                                <td><?= number_format($data['qty']); ?></td>
                                                <td><?= number_format($data['total']); ?></td>
                                                <td><?= number_format($data['dibayar']); ?></td>
                                                <td><?= number_format($data['sisa']); ?></td>
                                                <td><?= $data['status']; ?></td>
                                                <td><?= $data['tanggal']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>transaksi/detail/<?= $data['id']; ?>" class="btn btn-success">Detail</a>
                                                    <a href="<?= base_url(); ?>transaksi/delete/<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('layout/footer') ?>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url(); ?>transaksi/tambah" method="post">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="produk">Produk</label>
                            <select name="produk" class="form-control" id="produk" required="">
                                <option value="">--Produk--</option>
                                <?php foreach($produk as $p) : ?>
                                    <option value="<?= $p['kode_produk'] ?>|<?= $p['harga_jual'] ?>"><?= $p['nama'] ?> - Rp <?= $p['harga_jual'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dibeli">Dibeli</label>
                            <input type="number" name="dibeli" class="form-control" id="dibeli" placeholder="Produk Dibeli" required="">
                        </div>
                        <div class="form-group">
                            <label for="total">Total Harga</label>
                            <input type="text" placeholder="Total harga" class="form-control" name="total" id="total" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="dibayar">Dibayar</label>
                            <input type="number" name="dibayar" class="form-control" id="dibayar" placeholder="Dibayar" required="">
                        </div>
                        <div class="form-group">
                            <label for="sisa">Sisa</label>
                            <input type="text" name="sisa" class="form-control" id="sisa" placeholder="Sisa" readonly="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url(); ?>assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/core/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="<?= base_url(); ?>tps://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="<?= base_url(); ?>assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url(); ?>assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= base_url(); ?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/demo/demo.js"></script>

    <script type="text/javascript">
        $(() =>
        {
            $('#dibeli').keydown(() =>
            {
                let produk = $('#produk').val()
                let dibeli = $('#dibeli').val()
                let total

                produk = produk.split('|')[1]

                total = Number(produk) * Number(dibeli)

                $('#total').val(total)
            })

            $('#dibayar').on('change', () =>
            {
                let dibayar = $('#dibayar').val()
                let total = $('#total').val()
                let sisa = Number(total) - Number(dibayar)

                if(sisa < 0)
                {
                    sisa = 0
                }

                $('#sisa').val(sisa)
            })
        })
    </script>
</body>

</html>