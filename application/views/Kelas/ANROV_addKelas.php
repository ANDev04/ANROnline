<body>
    <form action="save" method="post">
        <table>
            <tr>
                <td>Tingkat Kelas</td>
                <td>
                    <select id="tingkat_kelas" name="tingkat_kelas" required>
                        <option disabled selected>Pilih Tingkat Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <select id="jurusan" name="jurusan">
                        <option>Pilih Jurusan</option>
                    </select>
                    <input type="number" name="nomer" min="1" max="100">
                </td>
            </tr>
            <tr>
                <td>Kuota Kelas</td>
                <td><input type="number" placeholder="isi kuota kelas" name="kuota" min='1' max='50'></td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input type="number" name="tahun_masuk" value="2017"> / <input type="number" name="tahun_keluar" value="2018"></td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    
    </form>
    <script src="<?php echo base_url()."assets/js/jquery-3.1.1.min.js" ?>"></script>
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
                            alert("Kelas Sudah Ada");
                        }
                        $total = parseInt(add);
						$('input[name="nomer"]').val($total); 
					}
				}); 
			});
</script>