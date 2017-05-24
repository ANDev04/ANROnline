<body>
    <table>
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
            <td><a href="<?php echo base_url()."ANROC_Guru/Edit/".$res->ID_Guru ?>">Edit</a></td>
            <td><a href="<?php echo base_url()."ANROC_Guru/Hapus/".$res->ID_Guru ?>">Hapus</a></td>
        </tr>
    <?php 
        }
    ?>
        <tr>
           <td colspan="6"><a href="<?php echo base_url()."ANROC_Guru/create/" ?>">Tambah Data</a></td>
        </tr>
    </table>
