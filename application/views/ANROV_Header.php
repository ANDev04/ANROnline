<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title ?></title>
        <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/materialize.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/select2.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/validasi.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/jquery-ui.js") ?>"></script>
        <link href="<?php echo base_url("assets/css/materialize.min.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/select2-materialize.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/style.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/materialize-icon.css") ?>" rel=stylesheet>
        <link href="<?php echo base_url("assets/css/jquery-ui.css") ?>" rel=stylesheet>
        <style>
            .no-js #loader { display: none;  }
            .js #loader { display: block; position: absolute; left: 100px; top: 0; }
            .se-pre-con {
                position: fixed;
                left: 0px;
                top: 0px;
                width: 100%;
                height: 100%;
                z-index: 9999;
                background: url(<?php echo base_url("assets/images/Preloader_7.gif") ?>) center no-repeat white;
            }
        </style>    
    </head>
    <body>
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="<?php echo base_url() ?>" class="brand-logo"><i class="material-icons">book</i>ANROnline</a>
                    <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="<?php echo base_url("ANROC_Siswa") ?>">Data Siswa</a></li>
                        <li><a href="<?php echo base_url("ANROC_Kelas") ?>">Data Kelas</a></li>
                        <li><a href="<?php echo base_url("ANROC_Guru") ?>">Data Guru</a></li>
                        <li><a href="<?php echo base_url("ANROC_Jurusan") ?>">Data Jurusan</a></li>
                        <li><a href="<?php echo base_url("ANROC_Mapel") ?>">Data Mata Pelajaran</a></li>
                        <li><a href="<?php echo base_url("ANROC_Nilai") ?>">Data Nilai</a></li>
                        <li><a href="<?php echo base_url("ANROC_PDF") ?>">Cetak PDF</a></li>
                    </ul>
                    <ul id="nav-mobile" class="side-nav">
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
         <div class="se-pre-con"></div>