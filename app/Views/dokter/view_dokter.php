<?=$this->extend('Layout/main')?>
<?=$this->extend('Layout/menu')?>
<?=$this->section('isi')?>

<head>
     <!-- DataTables -->
     <link href="<?=base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=base_url() ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Required datatable js -->
        <script src="<?=base_url() ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
</head>

<div class="container">
<div class="col-sm-12">
<div class=card m-b-60">
<div class="card-body">
<p class="card-text">

<h3>Data Dokter</h3>

<button  type="button" class="btn btn-sm btn-primary"data-target="#addModal" data-toggle="modal">Tambah</button></button>

        <table class="table table-sm table-striped" id="datadokter">
        
    <thead>
    <th>NO</th>
        <th>ID DOKTER</th>
        <th>NAMA DOKTER</th>
        <th>NO HP</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php $no=0; foreach ($dokter as $row) : $no++ ?>

        <tr> 
            <td> <?= $no; ?> </td>
            <td> <?= $row['id_dokter']; ?> </td>
            <td> <?= $row['nama_dokter']; ?> </td>
            <td> <?= $row['nohp_dokter']; ?> </td>
            <td> 
                <button type="button" class="btn btn-info btn-sm">
                    <i class="fa fa-tags"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                    </button>
            </td>
        </tr>
     <?php endforeach ;?>
    </tbody>
   
</p>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
    $('#datadokter').DataTable();
    } );
</script>



<?=$this->endsection('')?>
