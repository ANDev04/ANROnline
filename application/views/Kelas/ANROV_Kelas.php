<main>
    <div class="container">
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Kelas</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
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
                      <tr>
                            <td colspan="6" class="center-align">Tidak Ada Data</td>
                        </tr>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_kelas">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Kelas/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
    <?php if(isset($_GET['success'])&&isset($_GET['error'])){ ?>
    counter(1, '<?php echo base_url("ANROC_Kelas")?>');
    <?php } ?>
</script>