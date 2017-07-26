<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Nilai")?>">Data Nilai</a>
                    <a class="breadcrumb" href="#">Tambah Data Nilai</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Nilai</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'nilai')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_Nilai/save") ?>">
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20px;">Nama Siswa</div>
                        <div class="input-field col l9 s9">
                            <select name="siswa">
                                <option value="Pilih" disabled selected>Pilih Siswa</option>
                                <?php foreach($siswa as $res){?>
                                <option value="<?php echo $res->ID_SISWA ?>"><?php echo $res->NIS." / ".$res->NISN." ".$res->Nama_Siswa ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20px;">Nama Mata Pelajaran</div>
                        <div class="input-field col l9 s9">
                            <select name="mapel">
                                <option value="Pilih" disabled selected>Pilih Mata Pelajaran</option>
                                <?php foreach($mapel as $res){?>
                                <option value="<?php echo $res->Kode_Mapel ?>"><?php echo $res->Nama_Mapel ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20px;">Jenis Nilai</div>
                        <div class="input-field col l9 s9">
                            <select name="jenis_nilai">
                                <option value="Pilih" disabled selected>Pilih Jenis Nilai</option>
                                <option value="Harian">Harian</option>
                                <option value="Ujian Tengah Semester">Ujian Tengah Semester</option>
                                <option value="Ujian Akhir Semester">Ujian Akhir Semester</option>
                                <option value="Praktek">Praktek</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20px;">Kelas Siswa</div>
                        <div class="input-field col l9 s9">
                            <select name="kelas">
                                <option value="Pilih" disabled selected>Pilih Kelas</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20px;">Nilai Siswa</div>
                        <div class="input-field col l9 s9">
                            <input type="number" name="nilai" min="0" max="100">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3">Semester</div>
                        <div class="col l9 s9">
                            <input type="radio" name="semester" id="ganjil" value="Ganjil">
                            <label for="ganjil">Ganjil</label>
                            <input type="radio" name="semester" id="genap" value="Genap">
                            <label for="genap">Genap</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align"><button class="btn" type="submit" name="type" value="insert"><i class="material-icons left">input</i>Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<script>
            $('select[name="siswa"]').on('change', function(){
				$.ajax({
					type : 'POST', 
					url  : '<?php echo site_url('ANROC_Nilai/Cari_Kelas'); ?>', 
					data : {
						ID_Siswa : $(this).val()
					}, 
					success : function(option){
				        $('select[name="kelas"]').html(option); 
                        $('select[name="kelas"]').material_select();
                        
					}
				}); 
			});
</script>
