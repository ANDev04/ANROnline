<body>
    <table>
        <tr>
            <th>Nama Siswa</th>
            <th>Nama Mata Pelajaran</th>
            <th>Jenis Nilai</th>
            <th>Nilai</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php foreach($resource as $res){?>
        <tr>
            <td><?php echo $res->NIS."/".$res->NISN." - ".$res->Nama_Siswa ?></td>
            <td><?php echo $res->Nama_Mapel ?></td>
            <td><?php echo $res->Jenis_Nilai ?></td>
            <td><?php echo $res->Nilai ?></td>
            <td><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas." (".$res->Tahun_Masuk."/".$res->Tahun_Keluar.")" ?></td>
            <td><?php echo $res->Semester ?></td>
            <td><a href="ANROC_Nilai/edit/<?php echo $res->ID_NILAI; ?>">Edit Data</a></td>
            <td><a href="ANROC_Nilai/delete/<?php echo $res->ID_NILAI; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus Data</a></td>
        </tr>
        <?php } ?>
        <tr>
            <td><a href="ANROC_Nilai/create">Add Data</a></td>
        </tr>
    </table>