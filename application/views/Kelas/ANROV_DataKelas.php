<?php
    $kuota = 0;
    foreach($resource as $res){
        $Kode_Kelas = $res->Kode_Kelas;
        $kuota = $res->Kuota;
        $nama_kelas = $res->Tingkat_Kelas.'-'.$res->Nama_Kelas." (".$res->Tahun_Masuk."/".$res->Tahun_Keluar.")";
    } 
?>
<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Kelas")?>">Data Kelas</a>
                    <a class="breadcrumb" href="#"><?php echo $nama_kelas; ?></a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote>
                    <h4><?php echo $nama_kelas; ?></h4>
                </blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="centered">
                    <thead>
                        <tr>
                            <th>NIS/NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                      
                    </thead>
                    <tbody>
                <?php
                    if($siswa->num_rows()==0){
                ?>
                    <td colspan="5">Tidak Ada Data Untuk ditampilkan</td>
                <?php
                    }
                    $banyak = 0;
                    foreach($siswa->result() as $res){
                ?>
                    <tr>
                        <td><?php echo $res->NIS."/".$res->NISN ?></td>
                        <td><a href="<?php echo base_url()."ANROC_Siswa/Profile/".$res->ID_SISWA ?>"><?php echo $res->Nama_Siswa ?></a></td>
                        <?php 
                            if($res->Jenis_Kelamin=="L"){
                                $jk="Laki - Laki";
                            }
                            else{
                                $jk="Perempuan";
                            }
                        ?>
                        <td><?php echo $jk?></td>
                        <td><button class="btn" name="hapus" id="hapus" value="<?php echo $res->ID_SISWA ?>"><i class="material-icons">delete</i></button></td>
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
                <a class="btn-floating btn-large waves-effect waves-light red <?php if($banyak >= $kuota){echo "disabled";} ?>" href="<?php echo base_url("ANROC_SiswaKelas/create/".$res->Kode_Kelas) ?>"><i class="material-icons right">add</i></a>
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
            url  : '<?php echo site_url('ANROC_SiswaKelas/hapus/'.$Kode_Kelas); ?>', 
            data : {
                ID_Siswa : $(this).val()
            },
            success : function(notif){
                location.reload()
                Materialize.toast(notif, 4000)
            }
        }); 
    }
});
</script>