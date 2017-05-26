<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>PDF</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                 <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/PDF") ?>">
                    <table>
                        <tr>
                            <td>Nama Siswa</td>
                            
                            <td>
                                <select name="nis">
                                    <option value="Pilih" disabled selected>Pilih Siswa</option>
                                    <?php foreach($siswa as $b){?>
                                    <option value="<?php echo $b->ID_SISWA ?>"><?php echo $b->NIS."/".$b->NISN." | ".$b->Nama_Siswa ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            
                            <td>
                                <select name="kode_kelas">
                                    <option value="Pilih" disabled selected>Pilih Kelas</option>
                                    <?php foreach($kelas as $b){?>
                                    <option value="<?php echo $b->Kode_Kelas ?>"><?php echo $b->Tingkat_Kelas."-".$b->Nama_Kelas." (".$b->Tahun_Masuk."/".$b->Tahun_Keluar.")" ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                            
                            <td>
                                <input type="radio" name="semester" value="Ganjil" id="ganjil">
                                <label for="ganjil">Ganjil</label>
                                <input type="radio" name="semester" value="Genap" id="genap">
                                <label for="genap">Genap</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Header</td>
                            
                            <td>
                                <select name="header">
                                    <option name="Pilih" disabled selected>Pilih Configurasi Header</option>
                                    <?php foreach($header as $b){?>
                                    <option value="<?php echo $b->ID_Config ?>"><?php echo $b->ID_Config." - ".$b->Nama ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Footer</td>
                            
                            <td>
                                <select name="footer">
                                    <option name="Pilih" disabled selected>Pilih Configurasi Footer</option>
                                    <?php foreach($footer as $b){?>
                                    <option value="<?php echo $b->ID_Config ?>"><?php echo $b->ID_Config." - ".$b->Nama ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="left-align"><a class="btn waves-effect waves-light" href="<?php echo base_url("ANROC_PDF/config") ?>"><i class="material-icons left">settings</i>Konfigurasi</a></td>
                            <td class="right-align"><button class="btn" type="submit" name="type">Submit</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
   
</main>
<script>
$('select[name="nis"]').on('change', function(){
    $.ajax({
        type : 'POST', 
        url  : '<?php echo site_url('ANROC_Nilai/Cari_Kelas'); ?>', 
        data : {
            ID_Siswa : $(this).val()
        }, 
        success : function(option){
            $('select[name="kode_kelas"]').html(option); 
            $('select[name="kode_kelas"]').material_select();

        }
    }); 
});
</script>