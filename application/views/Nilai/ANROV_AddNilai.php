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
                    <table>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>
                                <select name="siswa">
                                    <option value="Pilih" disabled selected>Pilih Siswa</option>
                                    <?php foreach($siswa as $res){?>
                                    <option value="<?php echo $res->ID_SISWA ?>"><?php echo $res->NIS." / ".$res->NISN." ".$res->Nama_Siswa ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Mata Pelajaran</td>
                            <td>
                                <select name="mapel">
                                    <option value="Pilih" disabled selected>Pilih Mata Pelajaran</option>
                                    <?php foreach($mapel as $res){?>
                                    <option value="<?php echo $res->Kode_Mapel ?>"><?php echo $res->Nama_Mapel ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Nilai</td>
                            <td>
                                <select name="jenis_nilai">
                                    <option value="Pilih" disabled selected>Pilih Jenis Nilai</option>
                                    <option value="Harian">Harian</option>
                                    <option value="Ujian Tengah Semester">Ujian Tengah Semester</option>
                                    <option value="Ujian Akhir Semester">Ujian Akhir Semester</option>
                                    <option value="Praktek">Praktek</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                           
                            <td>
                                <select name="kelas">
                                    <option value="Pilih" disabled selected>Pilih Kelas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td>
                                <input type="number" name="nilai" min="0" max="100">
                            </td>
                        </tr>
                        <tr>
                            <td>Semester</td>   
                            <td>
                                <input type="radio" name="semester" id="ganjil" value="Ganjil">
                                <label for="ganjil">Ganjil</label>
                                <input type="radio" name="semester" id="genap" value="Genap">
                                <label for="genap">Genap</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="insert">Submit</button></td>
                        </tr>
                    </table>
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
