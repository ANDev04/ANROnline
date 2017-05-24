<body>
    <table>
        <tr>
            <th>No</th>
            <th>Program Keahlian</th>
            <th>Aksi</th>
        </tr>
        <?php 
            $i=1;
            foreach($resource as $res){ 
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $res->program_keahlian ?></td>
            <td><a href="<?php echo base_url("ANROC_Program/edit/".$res->id_program_keahlian) ?>">Edit</a></td>
            <td><a href="<?php echo base_url("ANROC_Program/hapus/".$res->id_program_keahlian) ?>">Hapus</a></td>
        </tr>
        <?php $i++;} ?>
        <tr>
            <td><a href="<?php echo base_url("ANROC_Program/create/") ?>">Tambah Data</a></td>
        </tr>
    
    </table>