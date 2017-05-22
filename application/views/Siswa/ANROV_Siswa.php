<body>
    <table>
        <tr>
            <th>NIS/NISN</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Kelas</th>
        </tr>
    <?php
        foreach($resource as $res){
    ?>
        <tr>
            <td><?php echo $res->nis."/".$res->nisn ?></td>
            <td><?php echo $res->Nama_Siswa ?></td>
            <?php 
                if($res->jenis_kelamin=="L"){
                    $jk="Laki - Laki";
                }
                else{
                    $jk="Perempuan";
                }
            ?>
            <td><?php echo $jk?></td>
            <td><?php echo $res->tingkat_kelas."-".$res->jurusan ?></td>
        </tr>
    <?php 
        }
    ?>
    </table>
