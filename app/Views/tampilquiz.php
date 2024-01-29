
<center>
    <h2>Tampil Data Penjualan Sepeda</h2>
    <hr>
    <table border="1">
        <tr>
            <td>Kode Sepeda</td>
            <td>Jenis</td>
            <td>Harga Semua</td>
            <td>Jumlah Beli</td>
            <td>Harga Satuan</td>
        </tr>
        <?php
        foreach ($sepedaok as $data): 
        ?>
        <tr>
            <td><?= $data['kodesepeda'] ?></td>
            <td><?= $data['jenis'] ?></td>
            <td><?= $data['hargasemua'] ?></td>
            <td><?= $data['jumlahbeli'] ?></td>
            <td><?= $data['hargasatuan']?></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
</center>
