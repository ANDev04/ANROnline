<main>
    <table class="table">
        <tr>
            <th>NIS/NISN</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
            <th colspan="2">Aksi</th>
        </tr>
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
            <td><?php echo $res->Tingkat_Kelas.'-'.$res->Nama_Kelas ?></td>
            <td><a href="<?php echo base_url()."ANROC_Siswa/Edit/".$res->ID_SISWA ?>">Edit</a></td>
            <td><a href="<?php echo base_url()."ANROC_Siswa/Hapus/".$res->ID_SISWA ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a></td>
        </tr>
    <?php 
        }
    ?>
        <tr>
           <td colspan="3"><a href="<?php echo base_url()."ANROC_Exel/import/anr_siswa" ?>">Import Data</a></td>
           <td colspan="3"><a href="<?php echo base_url()."ANROC_Siswa/create/" ?>">Tambah Data</a></td>
        </tr>
    </table>
</main>
