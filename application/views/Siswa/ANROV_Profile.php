<body>
    <table>
        <?php foreach($resource as $res){ ?>
        <tr>
            <td>Nama Siswa</td>
            <td><?php echo $res->Nama_Siswa ?></td>
        </tr>
        <tr>
            <td>NIS/NISN</td>
            <td><?php echo $res->NIS.'/'.$res->NISN ?></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><?php echo $res->Tingkat_Kelas.'-'.$res->Nama_Kelas ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <?php
                if($res->Jenis_Kelamin=="L"){
                    $jk="Laki-Laki";
                }else{
                    $jk="Perempuan";
                }
            ?>
            <td><?php echo $jk ?></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td><?php echo $res->Tempat_Lahir.', '.date("d F Y", strtotime($res->Tanggal_Lahir)) ?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td><?php echo $res->Agama ?></td>
        </tr>
        <tr>
            <td>No Telpon</td>
            <td><?php echo $res->No_Telp ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $res->Alamat ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo $res->Status ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><a href="<?php echo base_url()."ANROC_Siswa" ?>"><button>Kembali    </button></a></td>
        </tr>
    </table>
