<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Toko Bangunan | Detail Transaksi
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
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
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Form Detail Transaksi</h4>
                            </div>
                            <div class="card-body">
                                <?php foreach($allData as $r) : ?>
                                <form action="<?= base_url(); ?>transaksi/ubah/<?= $r['id'] ?>" method="post">
                                    <div class="form-group">
                                        <label for="produk">Produk</label>
                                        <input type="hidden" value="<?= $r['harga'] ?>" name="produk" class="form-control" id="produk" placeholder="Produk" readonly="" required="">
                                        <input type="text" value="<?= $r['produk'] ?>" name="nproduk" class="form-control" id="nproduk" placeholder="Produk" readonly="" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="dibeli">Dibeli</label>
                                        <input type="number" readonly="" value="<?= $r['qty'] ?>" name="dibeli" class="form-control" id="dibeli" placeholder="Produk Dibeli" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Total Harga</label>
                                        <input type="text" value="<?= $r['total'] ?>" placeholder="Total harga" class="form-control" name="total" id="total" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="sisa">Sisa</label>
                                        <input type="text" value="<?= $r['sisa'] ?>" name="sisa" class="form-control" id="sisa" placeholder="Sisa" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="dibayar">Dibayar</label>
                                        <input type="number" value="" name="dibayar" class="form-control" id="dibayar" placeholder="Dibayar" required="">
                                    </div>
                                    <button type="submit" <?= ($r['status'] == 'Lunas') ? 'disabled' : '' ?> class="btn btn-primary float-right">
                                        Submit
                                    </button>
                                </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('layout/footer') ?>
        </div>
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
            $('#dibeli').on('change', () =>
            {
                let produk = $('#produk').val()
                let dibeli = $('#dibeli').val()
                let total

                total = Number(produk) * Number(dibeli)

                $('#total').val(total)
            })

            $('#dibayar').on('change', () =>
            {
                let dibayar = $('#dibayar').val()
                let total = $('#sisa').val()
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