<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Isi</th>
            <th colspan="2">Aksi</th>
        </tr>

        <?php foreach($resource as $r){ ?>
        <tr>
            <td><?php echo $r->ID_Config ?></td>
            <td><?php echo $r->Nama ?></td>
            <td><?php echo $r->Tipe ?></td>
            <td><?php echo $r->Isi ?></td>
            <td><a href="<?php echo base_url("ANROC_PDF/edit/".$r->ID_Config); ?>">Edit Data</a></td>
            <td><a href="<?php echo base_url("ANROC_PDF/delete/".$r->ID_Config); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Konfigurasi?')">Hapus Data</a></td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="3"><a href="ANROC_PDF/create">Tambah Konfigurasi</a><br></td>
        </tr>
    </table>