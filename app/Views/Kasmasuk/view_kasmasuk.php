<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <ul class="list-inline float-left mb-0">
                            <h4 class="mt-e header-title">Data kas masuk</h4>
                        </ul>
                        <ul class="list-inline float-right mb-0">
                            <!-- Jam -->
                            <h6>
                                <?php
                                date_default_timezone_set("Asia/Bangkok");
                                ?>

                                <script type="text/javascript">
                                    function date_time(id) {
                                        date = new Date;
                                        year = date.getFullYear();
                                        month = date.getMonth();
                                        months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                        d = date.getDate();
                                        day = date.getDay();
                                        days = new Array('Minggu', 'Senen', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
                                        h = date.getHours();
                                        if (h < 10) {
                                            h = "0" + h;
                                        }
                                        m = date.getMinutes();
                                        if (m < 10) {
                                            m = "0" + m;
                                        }
                                        s = date.getSeconds();
                                        if (s < 10) {
                                            s = "0" + s;
                                        }
                                        result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
                                        document.getElementById(id).innerHTML = result;
                                        setTimeout('date_time("' + id + '");', '1000');
                                        return true;
                                    }
                                </script>

                                <span id="date_time"></span>
                                <script type="text/javascript">
                                    window.onload = date_time('date_time');
                                </script>
                                <!-- Batas jam -->
                            </h6>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-warning" data-target="#addModal" data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-dark " id="datakasmasuk">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Nama Donatur</th>
                                                <th>Keterangan</th>
                                                <th>Kas Masuk </th>
                                                <th>Jenis Kas</th>
                                                
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $total = 0; ?>
                                            <?php $no = 0;
                                            foreach ($kasmasuk as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['tanggal'] ?></td>
                                                    <td><?= $val['nama'] ?></td>
                                                    <td><?= $val['ket'] ?></td>
                                                    <td><?= $val['kas_masuk'] ?></td>
                                                    <?php $total +=$val['kas_masuk']?>
                                                    <td><?= $val['jenis_kas'] ?></td>
                                                    




                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn-edit" data-tanggal="<?= $val['tanggal']; ?>" data-ket="<?= $val['ket']; ?>" data-kas_masuk="<?= $val['kas_masuk']; ?>" data-jenis_kas="<?= $val['jenis_kas'];  ?>">
                                                            <i class=" fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-tanggal="<?= $val['tanggal']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tr>
                                            <th colspan="4">Total kas masuk</th>
                                            <th colspan="5"><?=$total?></th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<form action="/kasmasuk/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pengurus</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Yakin Menghapus Data Ini? </h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/kasmasuk/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Pengurus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control id" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <label><b>Ket</b></label>
                        <input type="text" class="form-control ket" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label><b>kas_masuk</b></label>
                        <input type="text" class="form-control kas_masuk" name="kas_masuk">
                    </div>
                    <div class="col-md-12">
                        <label><b>jenis_kas</b></label>
                        <select name="jenis_kas" class="form-control jenis_kas">
                                <option value="">Pilih </option>
                                <option value="anakyatim">anak yatim</option>
                                <option value="TPQ">TPQ</option>
                                <option value="sosial">sosial</option>
                                <option value="mesjid">mesjid</option>
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Tambah -->
<form action="/kasmasuk/save" method="post">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('error'); ?>
            <button type="button" id="addmodal" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Donatur</label>
                                    <button type="button" data-toggle="modal" data-target="#modal_donatur" class="btn btn-xs btn-warning"> Donatur</button>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" name="iddonatur" readonly id="iddonatur" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Donatur</label>
                                    <input type="text" readonly id="nama" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-12">
                        <label><b>keterangan</b></label>
                        <input type="text" class="form-control" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label><b>kas_masuk</b></label>
                        <input type="text" class="form-control" name="kas_masuk">
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label><b>jenis kas</b></label>
                            <select name="jenis_kas" class="form-control jenis_kas">
                                <option value="">Pilih </option>
                                <option value="anakyatim">anak yatim</option>
                                <option value="TPQ">TPQ</option>
                                <option value="sosial">sosial</option>
                                <option value="masjid">mesjid</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
</form>
<!-- Modal Donatur -->
<div class="modal fade" id="modal_donatur">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Donatur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-stripped">
                    <thread>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Donatur</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_donatur as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->iddonatur ?></td>
                                <td><?= $d->nama ?></td>
                                <td><?= $d->nohp ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_donatur('<?= $d->iddonatur ?>','<?= $d->nama ?>')">
                                        Pilih</button>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<script>
    //script delete
    $('.btn-delete').on('click', function() {
        const id = $(this).data('tanggal');
        $('.id').val(id);
        $('#deleteModal').modal('show');
    });
    //script datatable
    $(document).ready(function() {
        $('#datakasmasuk').DataTable();
    });

    $('.btn-edit').on('click', function() {
        const id = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kas_masuk = $(this).data('kas_masuk');
        const jenis_kas = $(this).data('jenis_kas');

        $('.id').val(id);
        $('.ket').val(ket);
        $('.kas_masuk').val(kas_masuk);
        $('.jenis_kas').val(jenis_kas).trigger('change');
        $('#updateModal').modal('show');
    });
    function pilih_donatur(id, nama) {
        $('#iddonatur').val(id);
        $('#nama').val(nama);
        $('#modal_donatur').modal().hide();
    }
</script>
<?= $this->endSection('') ?>