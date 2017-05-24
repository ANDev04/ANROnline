<body>
    <table>
        <tr>
            <th>Kode Kelas</th>
            <th>Kelas</th>
            <th>Kuota</th>
            <th>Tahun Ajar</th>
            <th colspan="2">Aksi</th>
        </tr>
    <?php
        foreach($resource->result() as $res){
            $kelas=explode("-",$res->Nama_Kelas);
            $where=array(
                'nama_kelas'=>$kelas[0]
            );
            $jumlah=$this->ANRO_Model->search("ANR_Kelas",$where)->num_rows();
            
    ?>
        <tr>
            <td><?php echo $res->Kode_Kelas ?></td>
        <?php if($jumlah==1){ ?>
            <td><?php echo $res->Tingkat_Kelas."-".$kelas[0] ?></td>
        <?php }else{ ?>
            <td><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas ?></td>
        <?php } ?>
            <td><?php echo $res->Kuota ?></td>
            <td><?php echo $res->Tahun_Masuk."/".$res->Tahun_Keluar ?></td>
            <td><a href="Edit/<?php echo $res->Kode_Kelas ?>">Edit</a></td>
            <td><a href="Hapus/<?php echo $res->Kode_Kelas ?>">Hapus</a></td>
        </tr>
    <?php 
        }
    ?>
        <tr>
           <td colspan="3"><a href="<?php echo base_url()."ANROC_Exel/import/anr_kelas" ?>">Import Data</a></td>
            <td colspan="3"><a href="ANROC_Kelas/create">Tambah Data</a></td>
            
        </tr>
    </table>
