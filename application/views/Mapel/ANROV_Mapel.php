<body>
    <table>
        <tr>
            <th>Kode Mata Pelajaran</th>
            <th>Nama Mata Pelajaran</th>
            <th>KKM</th>
            <th>Guru</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php foreach($resource as $res){?>
        <tr>
            <td><?php echo $res->Kode_Mapel?></td>
            <td><?php echo $res->Nama_Mapel?></td>
            <td><?php echo $res->KKM ?></td>
            <td><?php echo $res->Guru ?></td>
            <td><a href="<?php echo base_url("ANROC_Mapel/edit/".$res->Kode_Mapel) ?>">Edit Data</a></td>
            <td><a href="<?php echo base_url("ANROC_Mapel/delete/".$res->Kode_Mapel) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Data</a></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="3"><a href="<?php echo base_url()."ANROC_Exel/import/anr_mapel" ?>">Import Data</a></td>
            <td colspan="3"><a href="<?php echo base_url("ANROC_Mapel/create") ?>">Add Data</a></td>
        </tr>
    </table>