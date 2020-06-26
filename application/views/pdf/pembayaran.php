<!DOCTYPE html>
<html><head>
  <title>Data Pembayaran</title>
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
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($records as $data) : ?>
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
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body></html>