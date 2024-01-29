<?= $this->extend('layout/main') ?>

<?= $this->section('menu') ?>

<li>
    <a href="index.html" class="waves-effect">



        <?php if (session()->get('level') == 1) { ?>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Admin </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="<?= site_url('pengurus') ?>"><i class="fas fa-walking"></i> Pengurus</a></li></i>
        <li><a href="<?= site_url('user') ?>"><i class="fas fa-walking"></i> User</a></li></i>
        <li><a href="<?= site_url('agenda') ?>"><i class="fas fa-walking"></i> Agenda</a></li></i>
    </ul>
</li>
<?php } ?>

<?php if (session()->get('level') == 2) { ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Pengurus </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="<?= site_url('pengurus') ?>"><i class="fas fa-walking"></i> Pengurus</a></li></i>

        </ul>
    </li>
<?php } ?>

<?php if (session()->get('level') == 3) { ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Donatur </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
        <li><a href="<?= site_url('kasmasuk') ?>"><i class="fas fa-walking"></i> kas masuk</a></li></i>
            <li><a href="advanced-highlight.html">Upload Bukti</a></li>


        </ul>
    </li>
<?php } ?>

<?php if (session()->get('level') == 4) { ?>
    <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Pimpinan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
            <li><a href="advanced-highlight.html">Laporan Donatur</a></li>
            <li><a href="<?= site_url('kasmasuk/laporankasmasuk') ?>"><i class="fas fa-walking"></i> Kas Masuk</a></li></i>
            <li><a href="<?= site_url('kasmasuk/laporanperperiode') ?>"><i class="fas fa-walking"></i> Laporan Per Periode</a></li></i>
            <li><a href="<?= site_url('kasmasuk/laporanperperiodeperjenis') ?>"><i class="fas fa-walking"></i> Laporan Per Periode Jenis</a></li></i>
            <li><a href="<?= site_url('kaskeluar/laporankaskeluar') ?>"><i class="fas fa-walking"></i> Kas Keluar</a></li></i>
            <li><a href="<?= site_url('kaskeluar/laporanperperiode') ?>"><i class="fas fa-walking"></i> Laporan Per Periode</a></li></i>
            <li><a href="<?= site_url('kaskeluar/laporanperperiodeperjenis') ?>"><i class="fas fa-walking"></i> Laporan Per Periode Jenis</a></li></i>
        

        </ul>
    </li>
<?php } ?>
<?= $this->endSection('') ?>