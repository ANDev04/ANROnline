<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Guru")?>">Data Guru</a>
                    <a class="breadcrumb" href="#">Profil Guru</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Profil Guru</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="bordered">
                    <?php foreach($resource as $res){
                        $ID_Guru = $res->ID_Guru;
                    ?>
                    <tr>
                        <td>Nama Guru</td>
                        <td><?php echo $res->Nama_Guru ?></td>
                    </tr>
                    <tr>
                        <td>NIP/NUPTK</td>
                        <td><?php echo $res->NIP.'/'.$res->NUPTK ?></td>
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
                        <td>Mengajar</td>
                        <td>
                            <ul class="collection">
                                <li class="collection-item">
                            <?php $banyak = 0; foreach($mapel as $pel){ ?>
                                <?php echo $pel->Nama_Mapel ?>
                            <?php $banyak++; } if($banyak==0){echo 'Belum Mengajar Pelajaran Apapun.';} ?>
                                </li>
                            </ul>
                        </td>
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
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Guru/Edit/".$ID_Guru) ?>"><i class="material-icons">edit</i></a>
            </div>
        </div>
    </div>
</main>
