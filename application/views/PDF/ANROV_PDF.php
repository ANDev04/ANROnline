<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Cetak PDF</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Cetak PDF</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                 <form onsubmit="return validasi(this, 'PDF')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/PDF") ?>">
                    <div class="row">
                        <div class="col s2" style="padding-top:21.5px;">Nama Siswa</div>
                        <div class="input-field col s10">
                            <select name="id_siswa">
                                <option value="Pilih" disabled selected>Pilih Siswa</option>
                                <?php foreach($siswa as $b){?>
                                <option value="<?php echo $b->ID_SISWA ?>"><?php echo $b->NIS."/".$b->NISN." | ".$b->Nama_Siswa ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2" style="padding-top:21.5px;">Kelas</div>
                        <div class="input-field col s10">
                            <select name="kode_kelas">
                                <option value="Pilih" disabled selected>Pilih Kelas</option>
                                <?php foreach($kelas as $b){?>
                                <option value="<?php echo $b->Kode_Kelas ?>"><?php echo $b->Tingkat_Kelas."-".$b->Nama_Kelas." (".$b->Tahun_Masuk."/".$b->Tahun_Keluar.")" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2">Semester</div>
                        <div class="col s10">
                            <input type="radio" name="semester" value="Ganjil" id="ganjil">
                            <label for="ganjil">Ganjil</label>
                            <input type="radio" name="semester" value="Genap" id="genap">
                            <label for="genap">Genap</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2" style="padding-top:21.5px;">Header</div> 
                        <div class="input-field col s10">
                            <select name="header">
                                <option value="Pilih" disabled selected>Pilih Configurasi Header</option>
                                <?php foreach($header as $b){?>
                                <option value="<?php echo $b->ID_Config ?>"><?php echo $b->ID_Config." - ".$b->Nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2" style="padding-top:21.5px;">Footer</div> 
                        <div class="input-field col s10">
                            <select name="footer">
                                <option value="Pilih" disabled selected>Pilih Configurasi Footer</option>
                                <?php foreach($footer as $b){?>
                                <option value="<?php echo $b->ID_Config ?>"><?php echo $b->ID_Config." - ".$b->Nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top:15px;">
                        <div class="input-field col s6 left-align">
                            <a class="btn waves-effect waves-light" href="<?php echo base_url("ANROC_PDF/config") ?>"><i class="material-icons left">settings</i>Konfigurasi</a>
                        </div>
                        <div class="col s6 right-align">
                            <button class="btn" type="submit" name="type"><i class="material-icons left">print</i>Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</main>
<script>
$('select[name="id_siswa"]').on('change', function(){
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
