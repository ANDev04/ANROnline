<body>
    <table>
        <?php foreach($resource as $res){ ?>
        <tr>
            <td>Nama Guru</td>
            <td><?php echo $res->Nama_Guru ?></td>
        </tr>
        <tr>
            <td>NIP/NUPTK</td>
            <td><?php echo $res->NIP.'/'.$res->NUPTK ?></td>
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
            <td>Status</td>
            <td><?php echo $res->Status ?></td>
        </tr>
        <?php } ?>
        <tr>
            <td><a href="<?php echo base_url()."ANROC_Guru" ?>"><button>Kembali    </button></a></td>
        </tr>
    </table>
