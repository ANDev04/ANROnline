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
            <td><a href="ANROC_Mapel/edit/<?php echo $res->Kode_Mapel; ?>">Edit Data</a></td>
            <td><a href="ANROC_Mapel/delete/<?php echo $res->Kode_Mapel; ?>">Hapus Data</a></td>
        </tr>
        <?php } ?>
        <tr>
            <td><a href="ANROC_Mapel/create">Add Data</a></td>
        </tr>
    </table>