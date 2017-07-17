<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Kelas")?>">Data Kelas</a>
                    <a class="breadcrumb" href="#">Edit Data Kelas</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Kelas</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'kelas')" action="<?php echo base_url("ANROC_Kelas/save") ?>" method="post">
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
                                <div class="input-field col s12">
                                    <select id="tingkat_kelas" name="tingkat_kelas" required>
                                        <option disabled selected>Pilih Tingkat Kelas</option>
                                        <option value="X" <?php echo $x ?>>X</option>
                                        <option value="XI" <?php echo $xi ?>>XI</option>
                                        <option value="XII" <?php echo $xii ?>>XII</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>
                                <div class="input-field col s6">
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
                                </div>
                                <div class="input-field col s6">
                                    <input type="number" name="nomer" min="1" max="100" value="<?php echo $kelas[1] ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kuota Kelas</td>
                            <td><div class="input-field col s12"><input type="number" value="<?php echo $res->Kuota ?>" name="kuota" min='1' max='50'></div></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td>
                            <td>
                                <div class="input-field col s5">
                                    <input type="number" name="tahun_masuk" value="<?php echo $res->Tahun_Masuk ?>">
                                </div>
                                <div class="input-field col s2 center-align">s/d</div> 
                                <div class="input-field col s5">
                                    <input type="number" name="tahun_keluar" value="<?php echo $res->Tahun_Keluar ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="update">Submit</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>
    <script>
        function angkatan(){
            document.getElementById("tahun_keluar").value = parseInt(document.getElementById("tahun_masuk").value)+1;
        }
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
                        var current=$('input[name="current"]').val();
                        if(parseInt(add)!=nomer){
                            if(nomer!=current){
                                Materialize.toast("Kelas Sudah Ada", 4000);
                                $('input[name="nomer"]').val(current); 
                                
                            }
                        }
					}
				}); 
			});
    </script>
    </form>