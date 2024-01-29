<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-md-12">
    <div class="card card-outline">
        <div class="invoice col-sm-12 p-3 mb-3">
            <!--title row-->

            <div id="div1">
                <div class="row">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td width=200>
                                    <img src="<?= base_url() ?>/gambar/mesjid1.jpg" width="100" alt="">
                                </td>

                                <td width=580>
                                    <center>
                                        <p>
                                        <h4>
                                            MESJID Raya Sumatra Barat
                                        </p>
                                        <p>
                                        <h5>Jl.Raya Sumatra Barat
                                        </h5>
                                        </p>
                                    </center>
                                </td>
                                <td width=200></td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    <!-- /.co -->
                </div>


                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <tr role="row">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Kas keluar</th>
                                    <th>jenis kas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                $semua = 0;
                                foreach ($data as $val) {
                                    $s = $val['kas_keluar'];
                                    $semua = $s + $semua;
                                    $no++; ?>
                                    <tr role="row" class="odd">
                                        <td><?= $no; ?></td>
                                        <td><?= $val['tanggal'] ?></td>
                                        <td><?= $val['ket'] ?></td>
                                        <td><?= $val['kas_keluar'] ?></td>
                                        <td><?= $val['jenis_kas'] ?></td>
                                    </tr>

                                <?php } ?>
                                <tr>
                                    <td colspan="3"> Total PEMASUKAN</td>
                                    <td><?= $semua ?></td>
                                </tr>
                            </tbody>

                        </table>
                        <br><br><br><br>
                        padang, <?= date('d / M / y') ?>
                        <br><br><br>
                        Ketua<br>
                        ANGGI MAIZA PUTRA
                    </div>
                </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                    <button onclick="printContent('div1')" class="btn btn-primary"><i class="fa fa-print"></i>Print</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printContent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorepage;

    }
</script>
<?= $this->endSection('') ?>



