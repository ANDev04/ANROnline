
<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Kelas")?>">Data Mata Pelajaran</a>
                    <a class="breadcrumb" href="javascript:history.back()"><?php echo $Nama_Mapel; ?></a>
                    <a class="breadcrumb" href="#">Tambah Guru Mengajar</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Mata Pelajaran <?php echo $Nama_Mapel ?></h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="centered">
                    <thead>
                        <tr>
                            <th>NIP/NUPTK</th>
                            <th>Nama Guru</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $banyak = 0;
                    foreach($resource->result() as $res){
                        $cek=$this->ANRO_Model->read("anr_guru_mapel",array("anr_guru_mapel.Kode_Mapel"=>$Kode_Mapel,"anr_guru_mapel.ID_Guru"=>$res->ID_Guru))->num_rows();
                        if($cek==0){
                ?>  
                    <tr>
                        <td><?php echo $res->NIP."/".$res->NUPTK ?></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Profile/".$res->ID_Guru ?>"><?php echo $res->Nama_Guru ?></a></td>
                        <?php 
                            if($res->Jenis_Kelamin=="L"){
                                $jk="Laki - Laki";
                            }
                            else{
                                $jk="Perempuan";
                            }
                        ?>
                        <td><?php echo $jk?></td>
                        <td><button class="btn" name="Tambah" id="tambah" value="<?php echo $res->ID_Guru ?>"><i class=material-icons>add</i></button></td>
                        <?php }else{ $banyak++; } ?>
                    </tr>
                <?php 
                    }
                    if($banyak == $resource->num_rows()){
                ?>
                        <td colspan="4">Tidak Ada Data Untuk dimasukan.</td>
                <?php
                    }
                ?>
                    </tbody>          
                </table>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $('button[name="Tambah"]').on('click', function(){
        $.ajax({
            type : 'POST', 
            url  : '<?php echo site_url('ANROC_GuruMapel/tambah/'.$Kode_Mapel); ?>', 
            data : {
                id_guru : $(this).val()
            },
            success : function(notif){
                location.reload()
                Materialize.toast(notif, 4000)
            }
        }); 
    });
</script>