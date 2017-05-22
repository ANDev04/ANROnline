<body>
    <form action="../save" method="post">
        <table>
            <?php 
                foreach($resource->result() as $res)
                    $kelas=explode("-",$res->Nama_Kelas);
                    $x="";
                    $xi="";
                    $xii="";
                    $selected="";
                    if($res->Tingkat_Kelas=="X"){
                        $x="selected";
                        $jurusan = $paket;
                        $nama="program_keahlian";
                    }else if($res->Tingkat_Kelas=="XI"){
                        $xi="selected";
                        $nama="paket_keahlian";
                        $jurusan = $program;
                    }else if($res->Tingkat_Kelas=="XII"){
                        $xii="selected";
                        $nama="paket_keahlian";
                    }

            ?>
            <input type="hidden" name="kode_kelas" value="<?php echo $res->Kode_Kelas ?>">
            <input type="hidden" name="current" value="<?php echo $kelas[1] ?>">
            <tr>
                <td>Tingkat Kelas</td>
                <td>
                    <select id="tingkat_kelas" name="tingkat_kelas" required>
                        <option disabled selected>Pilih Tingkat Kelas</option>
                        <option value="X" <?php echo $x ?>>X</option>
                        <option value="XI" <?php echo $xi ?>>XI</option>
                        <option value="XII" <?php echo $xii ?>>XII</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>
                    <select id="jurusan" name="jurusan">
                        <option>Pilih Jurusan</option>
                        <?php foreach($jurusan as $jur){ 
                            if($nama=="program_keahlian"){
                                if($jur->program_keahlian==$kelas[0]){
                                    $selected = "selected";
                                }
                                else{
                                    $selected = "";
                                }
                        ?>
                        <option value="<?php echo $jur->program_keahlian ?>" <?php echo $selected ?>><?php echo $jur->program_keahlian ?></option>
                        <?php }else{
                        ?>
                        <option value="<?php echo $jur->paket_keahlian ?>" <?php echo $selected ?>><?php echo $jur->paket_keahlian ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="number" name="nomer" min="1" max="100" value="<?php echo $kelas[1] ?>">
                </td>
            </tr>
            <tr>
                <td>Kuota Kelas</td>
                <td><input type="number" value="<?php echo $res->Kuota ?>" name="kuota" min='1' max='50'></td>
            </tr>
            <tr>
                <td>Tahun Ajaran</td>
                <td><input type="number" name="tahun_masuk" value="<?php echo $res->Tahun_Masuk ?>"> / <input type="number" name="tahun_keluar" value="<?php echo $res->Tahun_Keluar ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="update">Submit</button></td>
            </tr>
        </table>
    <script src="<?php echo base_url()."assets/js/jquery-3.1.1.min.js" ?>"></script>
    <script>
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
                        var current=$('input[name="current"]').val();
                        if(parseInt(add)!=nomer){
                            if(nomer!=current){
                                alert("Kelas Sudah Ada");
                                $('input[name="nomer"]').val(current); 
                                
                            }
                        }
					}
				}); 
			});
    </script>
    </form>