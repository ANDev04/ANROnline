<body>
    <table>
        <tr>
            <th>No</th>
            <th>Program Keahlian</th>
            <th>Paket Keahlian</th>
            <th>Aksi</th>
        </tr>
        <?php 
            $i=1;
            foreach($resource as $res){ 
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $res->program_keahlian ?></td>
            <td><?php echo $res->paket_keahlian ?></td>
            <td><a href="<?php echo base_url("ANROC_Paket/edit/".$res->id_paket_keahlian) ?>">Edit</a></td>
            <td><a href="<?php echo base_url("ANROC_Paket/hapus/".$res->id_paket_keahlian) ?>">Hapus</a></td>
        </tr>
        <?php $i++;} ?>
        <tr>
            <td><a href="<?php echo base_url("ANROC_Paket/create/") ?>">Tambah Data</a></td>
        </tr>
    
    </table>