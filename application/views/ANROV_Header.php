<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
        <link href="<?php echo base_url("assets/css/materialize.min.css") ?>" rel=stylesheet>
        <script src="<?php echo base_url("assets/js/materialize.min.js") ?>"></script>
    </head>
    <body>
        <header>
            <nav class="blue lighten-3">
                <div class="nav-wrapper">
                    <a href="<?php echo base_url() ?>" class="brand-logo">Logo</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="<?php echo base_url("ANROC_Siswa") ?>">Data Siswa</a></li>
                        <li><a href="<?php echo base_url("ANROC_Kelas") ?>">Data Kelas</a></li>
                        <li><a href="<?php echo base_url("ANROC_Guru") ?>">Data Guru</a></li>
                        <li><a href="<?php echo base_url("ANROC_Jurusan") ?>">Data Jurusan</a></li>
                        <li><a href="<?php echo base_url("ANROC_Mapel") ?>">Data Mata Pelajaran</a></li>
                        <li><a href="<?php echo base_url("ANROC_Nilai") ?>">Data Nilai</a></li>
                        <li><a href="<?php echo base_url("ANROC_PDF") ?>">Cetak PDF</a></li>
                    </ul>
                </div>
            </nav>
        </header>