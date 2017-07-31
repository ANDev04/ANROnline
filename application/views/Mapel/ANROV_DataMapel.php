<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Mapel")?>">Data Mata Pelajaran</a>
                    <a class="breadcrumb" href="#"><?php echo $resource['Nama_Mapel']; ?></a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote>
                    <h4>Mata Pelajaran <?php echo $resource['Nama_Mapel']; ?></h4>
                </blockquote>
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
                    if($guru->num_rows()==0){
                ?>
                    <td colspan="4">Tidak Ada Data Untuk ditampilkan</td>
                <?php
                    }
                    $banyak = 0;
                    foreach($guru->result() as $res){
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
                        <td><button class="btn" name="hapus" id="hapus" value="<?php echo $res->ID_Guru ?>"><i class="material-icons">delete</i></button></td>
                    </tr>
                <?php 
                        $banyak++;
                    }
                ?>
                  </tbody>          
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red" href="<?php echo base_url("ANROC_GuruMapel/create/".$resource['Kode_Mapel']) ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main> 
<script>
$('button[name="hapus"]').on('click', function(){
    var cek = confirm('Apakah Anda yakin ingin menghapus data?');
    if(cek == true){
        $.ajax({
            type : 'POST', 
            url  : '<?php echo site_url('ANROC_GuruMapel/hapus/'.$resource['Kode_Mapel']); ?>', 
            data : {
                id_guru : $(this).val()
            },
            success : function(notif){
                location.reload()
                Materialize.toast(notif, 4000)
            }
        }); 
    }
});
</script>