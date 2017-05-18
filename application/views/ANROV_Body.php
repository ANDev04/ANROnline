<body>
    <table>
        <?php if($table == "ANR_Mapel"){ $kolom = 6;?>
        <tr>
            <th>Kode Mata Pelajaran</th>
            <th>Nama Mata Pelajaran</th>
            <th>KKM</th>
            <th>Guru</th>
            <th colspan="2">Aksi</th>
        </tr>
        <tr>
            <?php foreach($resource as $res){?>
            <td><?php echo $res->Kode_Mapel?></td>
            <td><?php echo $res->Nama_Mapel?></td>
            <td><?php echo $res->KKM ?></td>
            <td><?php echo $res->Guru ?></td>
            <td><a href="ANR_Mapel/edit/<?php echo $res->Kode_Mapel; ?>">Edit Data</a></td>
            <td><a href="ANR_CRUD/delete/ANR_Mapel/Kode_Mapel/<?php echo $res->Kode_Mapel; ?>">Hapus Data</a></td>
            <?php } ?>
        </tr>
        <tr>
            <td colspan="<?php echo $kolom?>"><a href="ANR_Mapel/create">Add Data</a></td>
        </tr>
        <?php }?>
    </table>