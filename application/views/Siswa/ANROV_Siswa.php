<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Data Siswa</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <table class="responsive-table bordered">
                    <thead>
                        <tr>
                            <th>NIS/NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach($resource as $res){
                ?>
                        <tr>
                            <td><?php echo $res->NIS."/".$res->NISN ?></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Profile/".$res->ID_SISWA ?>"><?php echo $res->Nama_Siswa ?></a></td>
                            <?php 
                                if($res->Jenis_Kelamin=="L"){
                                    $jk="Laki - Laki";
                                }
                                else{
                                    $jk="Perempuan";
                                }
                            ?>
                            <td><?php echo $jk?></td>
                            <td><?php echo $res->Kelas ?></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Edit/".$res->ID_SISWA ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Hapus/".$res->ID_SISWA ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                        </tr>
                <?php 
                    }
                ?>
                        <tr>
                            <td colspan="6" class="center-align">Tidak Ada Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url()."ANROC_Exel/import/anr_siswa" ?>"><i class="material-icons right">open_in_browser</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Siswa/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
