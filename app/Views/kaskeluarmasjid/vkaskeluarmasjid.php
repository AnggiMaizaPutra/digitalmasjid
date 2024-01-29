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
                            <h4 class="mt-e header-title">Data Kas Keluar Masjid</h4>
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
                            <button type="button" class="btn btn-sm btn-danger" data-target="#addModal" data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-success " id="datakaskeluar">
                                        <thead>
                                            <tr role="row">
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Kas Keluar </th>
                                                <th>Jenis Kas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            ?>
                                            <?php $no = 0;
                                            foreach ($kaskeluarmasjid as $val) {
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['tanggal'] ?></td>
                                                    <td><?= $val['ket'] ?></td>
                                                    <td><?= $val['kas_keluar'] ?></td>
                                                    <td><?= $val['jenis_kas'] ?></td>


                                                    <td>
                                                        <button type="button" class="btn btn-warning btn-sm btn-edit" data-id="<?= $val['id_kas_masjid']; ?>" data-tanggal="<?= $val['tanggal']; ?>" data-ket="<?= $val['ket']; ?>" data-kas_keluar="<?= $val['kas_keluar']; ?>" data-jenis_kas="<?= $val['jenis_kas'];  ?>">
                                                            <i class=" fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id_kas_masjid="<?= $val['id_kas_masjid']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
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
<form action="/kaskeluarmasjid/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kas Keluar</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <h5>Apakah Yakin Menghapus Data Ini? </h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-success">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/kaskeluarmasjid/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data Kas Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control id" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <label><b>Keterangan</b></label>
                        <input type="text" class="form-control ket" name="ket">
                    </div>
                    <div class="col-md-12">
                        <label><b>Kas Keluar</b></label>
                        <input type="text" class="form-control kas_keluar" name="kas_keluar">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jenis Kas</b></label>
                        <select name="jenis_kas" class="form-control jenis">
                            <option value="">Pilih </option>
                            <option value="Anak Yatim">Anak Yatim</option>
                            <option value="TPQ">TPQ</option>
                            <option value="Sosial">Sosial</option>
                            <option value="Masjid">Masjid</option>
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
<form action="/kaskeluarmasjid/save" method="post">
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
                    <h5 class="modal-title" id="exampleModalLabel">Kas Keluar Masjid</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>

                Sisa Kas: <?= $masjid[0]->totalsemua ?? 0; ?>

                <div class="modal-body">
                    <div class="col-md-12">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal">
                    </div>
                    <div class="col-md-12">
                        <label><b>Keterangan</b></label>
                        <input type="text" class="form-control" name="ketmasuk">
                    </div>
                    <div class="col-md-12">
                        <label><b>Jumlah</b></label>
                        <input type="text" class="form-control" name="jumlah">
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Agenda </label>
                                    <button type="button" data-toggle="modal" data-target="#modal_agenda" class="btn btn-xs btn-primary">Agenda</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>ID Agenda</label>
                                    <input type="text" name="id_agenda" readonly id="id_agenda" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Agenda</label>
                                    <input type="text" readonly id="nama_kegiatan" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Agenda -->
<div class="modal fade" id="modal_agenda">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Agenda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama Agenda</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Jenis Kegiatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($data_agenda as $d) :
                            $no++; ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?= $d->id_agenda ?></td>
                                <td><?= $d->nama_kegiatan ?></td>
                                <td><?= $d->tanggal ?></td>
                                <td><?= $d->jam ?></td>
                                <td><?= $d->jeniskegiatan ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="return pilih_agenda('<?= $d->id_agenda ?>','<?= $d->nama_kegiatan ?>')">
                                        Pilih
                                    </button>
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
        $('#datakaskeluar').DataTable();
    });

    $('.btn-edit').on('click', function() {
        const id = $(this).data('tanggal');
        const ket = $(this).data('ket');
        const kas_keluar = $(this).data('kas_keluar');
        const jenis_kas = $(this).data('jenis_kas');

        $('.id').val(id);
        $('.ket').val(ket);
        $('.kas_keluar').val(kas_keluar);
        $('.jenis').val(jenis_kas).trigger('change');
        $('#updateModal').modal('show');
    });

    function pilih_agenda(id, nama) {
        $('#id_agenda').val(id);
        $('#nama_kegiatan').val(nama);
        $('#modal_agenda').modal().hide();
        // $('#modal_agenda.close').click()
    }
</script>
<?= $this->endSection('') ?>