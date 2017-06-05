<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Data Kelas</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                 <table class="responsive-table bordered">
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
                        $jumlah=$this->ANRO_Model->read("ANR_Kelas",$where)->num_rows();

                ?>
                    <tr>
                        <td><?php echo $res->Kode_Kelas ?></td>
                    <?php if($jumlah==1){ ?>
                        <td><?php echo $res->Tingkat_Kelas."-".$kelas[0] ?></td>
                    <?php }else{ ?>
                        <td><a href="<?php echo base_url("ANROC_Kelas/Kelas/".$res->Kode_Kelas) ?>"><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas ?></a></td>
                    <?php } ?>
                        <td><?php echo $res->Kuota ?></td>
                        <td><?php echo $res->Tahun_Masuk."/".$res->Tahun_Keluar ?></td>
                        <td><a href="<?php echo base_url("ANROC_Kelas/edit/".$res->Kode_Kelas) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Kelas/Hapus/".$res->Kode_Kelas) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php 
                    }
                ?>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url()."ANROC_Exel/import/anr_kelas" ?>"><i class="material-icons right">open_in_browser</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Kelas/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>