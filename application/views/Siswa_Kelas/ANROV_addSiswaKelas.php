
<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Kelas")?>">Data Kelas</a>
                    <a class="breadcrumb" href="javascript:history.back()"><?php echo $Nama_Kelas; ?></a>
                    <a class="breadcrumb" href="#">Tambah Siswa ke Kelas</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3><?php echo $Nama_Kelas ?></h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
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
                          $cek=$this->ANRO_Model->read("anr_siswa_kelas",array("anr_siswa_kelas.Kode_Kelas"=>$Kode_Kelas,"anr_siswa_kelas.ID_Siswa"=>$res->ID_SISWA))->num_rows();
                        if($cek==0){
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
                        <td><?php echo $res->Kelas?></td>
                       
                        <td><button class="btn" name="Tambah" id="tambah" value="<?php echo $res->ID_SISWA ?>"><i class=material-icons>add</i></button></td>
                        <?php } ?>
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
						ID_Siswa : $(this).val()
					},
                    success : function(notif){
                        location.reload()
                        Materialize.toast(notif, 4000)
					}
				}); 
			});
</script>