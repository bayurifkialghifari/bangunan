<!DOCTYPE html>
<html><head>
  <title>Data Produk</title>
</head><body>
<style type="text/css">
  table
  {
    border-collapse: collapse;
  }
</style>
<h3>DATA PRODUK</h3>
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Id Kategori</th>
            <th>Nama</th>
            <th>Keterangan</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($records as $data) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['kategori']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['keterangan']; ?></td>
                <td><?= number_format($data['harga_beli']); ?></td>
                <td><?= number_format($data['harga_jual']); ?></td>
                <td><?= number_format($data['stok']); ?></td>
                <td><?= $data['tanggal']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body></html>