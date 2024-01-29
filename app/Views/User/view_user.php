<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>

<?= $this->section('isi') ?>

<head>
    <!-- DataTables -->
    <link href="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <script src="<?= base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>
<div class="col-sm-12">
    <div class="page-content-wrapper">


        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h4 class="mt-e header-title">Data User</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-success" data-target="#addModal"
                                data-toggle="modal">Tambah Data</button>
                        </div>
                        <br>
                        <div id="datatable_wrapper" class="dataTables repper container-fluid dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm table-dark " id="datapengurus">
                                        <thead>
                                            <tr role="row">
                                                <th>NO</th>
                                                <th>ID</th>
                                                <th>Nama USER</th>
                                                <th>EMAIL</th>
                                                <th>LEVEL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no = 0;
                                            foreach ($user as $val) {
                                                if ($val['level'] == '1') {
                                                    $role = 'Admin';
                                                } else if ($val['level'] == 2) {
                                                    $role = 'Donatur';
                                                } else if ($val['level'] == 3) {
                                                    $role = 'Bendahara';
                                                } else if ($val['level'] == 4) {
                                                    $role = 'Pimpinan';
                                                }
                                                $no++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><?= $val['id_user'] ?></td>
                                                    <td><?= $val['nama_user'] ?></td>
                                                    <td><?= $val['email'] ?></td>

                                                    <td><?= $role ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm btn-edit" data-id_user="<?= $val['id_user']; ?>" data-nama_user="<?= $val['nama_user']; ?>" data-email="<?= $val['email']; ?>" data-password="<?= $val['password']; ?>" data-level="<?= $val['level']; ?>">
                                                            <i class=" fa fa-tags"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-warning btn-sm btn-delete" data-id_user="<?= $val['id_user']; ?>">
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

<form action="/user/delete" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus USER</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Apakah Yakin Menghapus Data Ini? </h3>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Form Edit -->
<form action="/user/update" method="post">
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button> 
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control id" name="id">
                    </div>
                    <div class="col-md-12">
                        <label><b>Nama User</b></label>
                        <input type="text" class="form-control namauser" name="nama">
                    </div>
                    <div class="col-md-12">
                        <label><b>EMAIL</b></label>
                        <input type="text" class="form-control email" name="email">
                    </div>
                    <div class="col-md-12">
                        <label><b>PASSWORD</b></label>
                        <input type="password" class="form-control password" name="password">
                    </div>
                    <div class="col-md-12">
                        <label><b>LEVEL</b></label>
                        <input type="text" class="form-control level" name="level">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Form Tambah -->

<form action="/user/save" method="post">
<?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show"role="alert">
            <h4>Periksa Entrian Form</h4>
    </hr />
    <?php echo session()->getFlashdata('error'); ?>
    <button type="button" id="addModal"class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
    </button>
        </div>
        <?php endif; ?>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">USER</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id_user" placeholder= id_user>
                    </div>
                    <div class="col-md-12">
                        <label>Nama USER</label>
                        <input type="text" class="form-control" name="nama_user" placeholder=nama_user>
                    </div>
                    <div class="col-md-12">
                        <label>EMAIL</label>
                        <input type="text" class="form-control" name="email" placeholder=email>
                    </div>
                    <div class="col-md-12">
                        <label>PASSWORD</label>
                        <input type="password" class="form-control" name="password"placeholder=password>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label><b>Level</b></label>
                            <select name="level" class="form-control">
                                <option value="">Pilih Hak Akses</option>
                                <option value="1">Admin</option>
                                <option value="2">Donatur</option>
                                <option value="3">Bendahara</option>
                                <option value="4">Pimpinan</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
//script delete
$('.btn-delete').on('click', function() {
    const id = $(this).data('id_user');
    $('.id').val(id);
    $('#deleteModal').modal('show');
});

$('.btn-edit').on('click', function() {
    const id = $(this).data('id_user');
        const namauser = $(this).data('namauser');
        const email = $(this).data('email');
        const password = $(this).data('password');
        const level = $(this).data('level');

        $('.id').val(id);
        $('.namauser').val(namauser);
        $('.email').val(email);
        $('.password').val(password);
        $('.level').val(level).trigger('change');
        $('#updateModal').modal('show');
});

$(document).ready(function() {
    $('#datauser').DataTable();
});
</script>
<?= $this->endSection('') ?>