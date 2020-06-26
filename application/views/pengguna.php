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
                                            <th>ID Jabatan</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>No HP.</th>
                                            <th>tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($allData as $data) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $data['id_jabatan']; ?></td>
                                                <td><?= $data['username']; ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['nomor_hp']; ?></td>
                                                <td><?= $data['tanggal']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>pengguna/detail/<?= $data['id_pengguna']; ?>" class="btn btn-success">Ubah</a>
                                                    <a href="<?= base_url(); ?>pengguna/delete/<?= $data['id_pengguna']; ?>" class="btn btn-danger">Hapus</a>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url(); ?>pengguna/tambah" method="post">
                        <div class="form-group">
                            <label for="id_jabatan">ID Jabatan</label>
                            <select name="id_jabatan" class="form-control" id="id_jabatan">
                                <option value="1">Pemilik</option>
                                <option value="2">Kasir</option>
                                <option value="3">Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Nama pengguna">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" placeholder="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama pengguna">
                        </div>
                        <div class="form-group">
                            <label for="nomer_hp">Nomer HP</label>
                            <input type="number" name="nomor_hp" class="form-control" id="nomer_hp" placeholder="No HP. pengguna">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
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