<main id="isi">
    <div class="container">
    
        <div class="row">
            <div class="z-depth-3 col s12">
                <blockquote><?php echo $Nama_Kelas ?></blockquote>
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
                            <th>Kelas</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach($resource as $res){
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
                            $cek=$this->ANRO_Model->read("anr_siswa_kelas",array("anr_siswa_kelas.Kode_Kelas"=>$Kode_Kelas,"anr_siswa_kelas.ID_Siswa"=>$res->ID_SISWA))->num_rows();
                        ?>
                        <td><?php echo $jk?></td>
                        <td><?php echo $res->Kelas?></td>
                        <?php if($cek==0){?>
                        <td><button class="btn" name="Tambah" id="tambah" value="<?php echo $res->ID_SISWA ?>"><i class=material-icons>add</i></button></td>
                        <?php }else{?>
                        <td><button class="btn" name="Hapus" id="hapus" value="<?php echo $res->ID_SISWA ?>"><i class="material-icons">delete</i></button></td>
                        <?php }?>   
                    </tr>
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
					url  : '<?php echo site_url('ANROC_SiswaKelas/tambah/'.$Kode_Kelas); ?>', 
					data : {
						ID_Siswa : $("#tambah").val()
					},
                    success : function(notif){
                        location.reload()
                        Materialize.toast(notif, 4000)
					}
				}); 
			});
        $('button[name="Hapus"]').on('click', function(){
				$.ajax({
					type : 'POST', 
					url  : '<?php echo site_url('ANROC_SiswaKelas/hapus/'.$Kode_Kelas); ?>', 
					data : {
						ID_Siswa : $("#hapus").val()
					},
                    success : function(notif){
                        location.reload()
                        Materialize.toast(notif, 4000)
					}
				}); 
			});
</script>