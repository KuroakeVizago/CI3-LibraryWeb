<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="shared/css/style.css"></head>
<body>
    <div class="container">
        <h1 class="my-4">Daftar Barang</h1>
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>ID Barang</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori Barang</th>
                    <th>Deskripsi Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok Barang</th>
                    <th>Supplier Barang</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $item): ?>
                <tr>
                    <td><?php echo $item['id_barang']; ?></td>
                    <td><?php echo $item['kode_barang']; ?></td>
                    <td><?php echo $item['nama_barang']; ?></td>
                    <td><?php echo $item['kategori_barang']; ?></td>
                    <td><?php echo $item['deskripsi_barang']; ?></td>
                    <td><?php echo $item['harga_beli']; ?></td>
                    <td><?php echo $item['harga_jual']; ?></td>
                    <td><?php echo $item['stok_barang']; ?></td>
                    <td><?php echo $item['supplier_barang']; ?></td>
                    <td><?php echo $item['tanggal_masuk']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
	<script src="../../../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
