<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Tambah Nilai</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Nilai/save") ?>">
                    <table>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>
                                <select name="siswa">
                                    <option value="" disabled selected>Pilih Siswa</option>
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
                                    <option value="" disabled selected>Pilih Mata Pelajaran</option>
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
                                    <option value="" disabled selected>Pilih Jenis Nilai</option>
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
                                    <option value="" disabled selected>Pilih Kelas</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                            <td>
                                <input type="number" name="nilai" min="0" max="100" required>
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
