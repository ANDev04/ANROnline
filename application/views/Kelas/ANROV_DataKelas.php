<main>
    <div class="container">
        <div class="row">
            <div class="z-depth-3 col s12">
                <blockquote>
                    <h4>
                    <?php
                        $kuota = 0;
                        foreach($resource as $res){
                            $Kode_Kelas = $res->Kode_Kelas;
                            $kuota = $res->Kuota;
                            echo $res->Tingkat_Kelas.'-'.$res->Nama_Kelas." (".$res->Tahun_Masuk."/".$res->Tahun_Keluar.")";
                        } 
                    ?>
                    </h4>
                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="z-depth-3 col s12">
                <table class="responsive-table centered">
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
                    <input type="hidden" id="id_siswa" value="<?php echo $res->ID_SISWA ?>">
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
                        <td><a href="#"><i class="material-icons" id="hapus">delete</i></a></td>
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
                <a class="btn-floating btn-large waves-effect waves-light red "><i class="material-icons right">open_in_browser</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red <?php if($banyak >= $kuota){echo "disabled";} ?>" href="<?php echo base_url("ANROC_SiswaKelas/create/".$res->Kode_Kelas) ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
$('#hapus').on('click', function(){
				$.ajax({
					type : 'POST', 
					url  : '<?php echo site_url('ANROC_SiswaKelas/hapus/'.$Kode_Kelas); ?>', 
					data : {
						ID_Siswa : $("#id_siswa").val()
					},
                    success : function(notif){
                        location.reload()
                        Materialize.toast(notif, 4000)
					}
				}); 
			});
</script>