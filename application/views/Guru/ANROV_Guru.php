<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Data Guru</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <table class="responsive-table bordered">
                    <tr>
                        <th>NIP/NUPTK</th>
                        <th>Nama Guru</th>
                        <th>Jenis Kelamin</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                <?php
                    foreach($resource as $res){
                ?>
                    <tr>
                        <td><?php echo $res->NIP."/".$res->NUPTK ?></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Profile/".$res->ID_Guru ?>"><?php echo $res->Nama_Guru ?></a></td>
                        <?php 
                            if($res->Jenis_Kelamin=="L"){
                                $jk="Laki - Laki";
                            }
                            else{
                                $jk="Perempuan";
                            }
                        ?>
                        <td><?php echo $jk?></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Edit/".$res->ID_Guru ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Hapus/".$res->ID_Guru ?>"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php 
                    }
                ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url()."ANROC_Exel/import/anr_guru" ?>"><i class="material-icons right">open_in_browser</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Guru/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>