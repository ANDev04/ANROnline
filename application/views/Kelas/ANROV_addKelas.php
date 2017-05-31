<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Tambah Kelas</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form onsubmit="return validasi(this, 'kelas')" action="<?php echo base_url("ANROC_Kelas/save") ?>" method="post">
                    <table>
                        <tr>
                            <td>Tingkat Kelas</td>
                            <td>
                                <div class="input-field col s12">
                                    <select id="tingkat_kelas" name="tingkat_kelas">
                                        <option value="Pilih" disabled selected>Pilih Tingkat Kelas</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>
                                 <div class="input-field col s6">
                                    <select id="jurusan" name="jurusan">
                                        <option value="Pilih">Pilih Jurusan</option>
                                    </select>
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" name="nomer" min="1" max="100" placeholder="Isi Nomor Kelas">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kuota Kelas</td>
                            <td> <div class="input-field col s12"><input type="number" placeholder="isi kuota kelas" name="kuota" min='1' max='50'></div></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>
                                <div class="input-field col s5"><input type="number" name="tahun_masuk" value="2017"></div> 
                                <div class="input-field col s2 center-align">s/d</div>
                                <div class="input-field col s5"><input type="number" name="tahun_keluar" value="2018"></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button type="submit" name="type" value="insert" class="btn">Submit</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>
    <script type="text/javascript">
			$('select[name="tingkat_kelas"]').on('change', function(){
				$.ajax({
					type : 'POST', 
					url  : '<?php echo site_url('ANROC_Kelas/Jurusan'); ?>', 
					data : {
						tingkat_kelas : $(this).val()
					}, 
					success : function(option){
				        $('select[name="jurusan"]').html(option); 
                        $('select[name="jurusan"]').material_select();
                        
					}
				}); 
			});
           $('input[name="nomer"]').on('change', function(){
				$.ajax({
					type : 'POST', 
					url  : '<?php echo site_url('ANROC_Kelas/Cek_Kelas'); ?>', 
					data : {
						nomer : $(this).val(),
                        tingkat_kelas : $('#tingkat_kelas').val(),
                        jurusan : $('#jurusan').val()
					}, 
					success : function(add){
                        var nomer=$('input[name="nomer"]').val();
                        if(parseInt(add)!=nomer){
                            Materialize.toast("Kelas Sudah Ada", 4000);
                        }
                        $total = parseInt(add);
						$('input[name="nomer"]').val($total); 
					}
				}); 
			});
</script>