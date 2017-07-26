<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Siswa")?>">Data Siswa</a>
                    <a class="breadcrumb" href="#">Profil Siswa</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Profil Siswa</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="bordered">
                    <?php foreach($resource as $res){ ?>
                    <tr>
                        <td>Nama Siswa</td>
                        <td><?php echo $res->Nama_Siswa ?></td>
                    </tr>
                    <tr>
                        <td>NIS/NISN</td>
                        <td><?php echo $res->NIS.'/'.$res->NISN ?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>
                            <ul class="collection">
                                <li class="collection-item">
                                <?php $banyak=0; foreach($kelas as $kel){ ?>
                                    <a href="<?php echo base_url("ANROC_Kelas/Kelas/".$kel->Kode_Kelas) ?>"><?php echo $kel->Tingkat_Kelas.'-'.$kel->Nama_Kelas." (".$kel->Tahun_Masuk."/".$kel->Tahun_Keluar.")" ?></a>
                                <?php $banyak++; } if($banyak == 0){ echo "Belum Pernah Masuk Kelas Manapun."; } ?>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <?php
                            if($res->Jenis_Kelamin=="L"){
                                $jk="Laki-Laki";
                            }else{
                                $jk="Perempuan";
                            }
                        ?>
                        <td><?php echo $jk ?></td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td><?php echo $res->Tempat_Lahir.', '.date('d F Y', strtotime($res->Tanggal_Lahir)) ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td><?php echo $res->Agama ?></td>
                    </tr>
                    <tr>
                        <td>No Telpon</td>
                        <td><?php echo $res->No_Telp ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $res->Alamat ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?php echo $res->Status ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Siswa/Edit/".$ID_Siswa) ?>"><i class="material-icons">edit</i></a>
            </div>
        </div>
    </div>
</main>