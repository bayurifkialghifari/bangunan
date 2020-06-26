<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Toko Bangunan | Dashboard
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
                                <h4 class="card-title">Form Ubah</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url(); ?>barang/ubah/<?= $dataID['kode_produk']; ?>" method="post">
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori</label>
                                        <select name="id_kategori" class="form-control" id="id_kategori">
                                            <option value="">--Kategori</option>
                                            <?php foreach($kategori as $k) : ?>
                                                <?php if($k['id_kategori'] == $dataID['id_kategori']) : ?>
                                                    <option selected="" value="<?= $k['id_kategori'] ?>"><?= $k['nama'] ?></option>
                                                <?php else: ?>
                                                    <option value="<?= $k['id_kategori'] ?>"><?= $k['nama'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input value="<?= $dataID['nama']; ?>" type="text" name="nama" class="form-control" id="nama" placeholder="Nama pengguna">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <textarea placeholder="keterangan" class="form-control" name="keterangan" id="keterangan"><?= $dataID['keterangan']; ?></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="harga_beli">Harga Beli</label>
                                                <input value="<?= $dataID['harga_beli']; ?>" type="text" placeholder="Harga Beli" class="form-control" name="harga_beli" id="harga_beli">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="harga_jual">Harga Jual</label>
                                                <input value="<?= $dataID['harga_jual']; ?>" type="text" placeholder="Harga Jual" class="form-control" name="harga_jual" id="harga_jual">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input value="<?= $dataID['stok']; ?>" type="text" name="stok" class="form-control" id="stok" placeholder="Stok">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">
                                        Submit
                                    </button>
                                </form>
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
</body>

</html>