<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Kelas")?>">Data Kelas</a>
                    <a class="breadcrumb" href="#">Tambah Data Kelas</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Kelas</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
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
                                    <input type="number" id="nomer" name="nomer" min="1" max="100" placeholder="Isi Nomor Kelas">
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
                                <div class="input-field col s5"><input id="tahun_masuk" type="number" name="tahun_masuk" value="2017" onchange="angkatan()"></div> 
                                <div class="input-field col s2 center-align">s/d</div>
                                <div class="input-field col s5"><input id="tahun_keluar" type="number" name="tahun_keluar" value="2018" readonly></div>
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
    $('input[type="number"]').on('change', function(){
        if(document.getElementById("tingkat_kelas").value != "Pilih"){
            if(document.getElementById("jurusan").value != "Pilih"){
                if(document.getElementById("nomer").value != ""){
                    $.ajax({
                        type : 'POST', 
                        url  : '<?php echo site_url('ANROC_Kelas/Cek_Kelas'); ?>', 
                        data : {
                            nomer : $('#nomer').val(),
                            tingkat_kelas : $('#tingkat_kelas').val(),
                            jurusan : $('#jurusan').val(),
                            tahun_masuk : $('#tahun_masuk').val(),
                            tahun_keluar : $('#tahun_keluar').val()
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
                }
                else{
                    Materialize.toast("Pilih Nomer Kelas Terlebih Dahulu!", 4000);
                    $('input[name="nomer"]').val("");
                }
            }
            else{
                Materialize.toast("Pilih Jurusan Terlebih Dahulu!", 4000);
                $('input[name="nomer"]').val("");
            }
        }
        else{
            Materialize.toast("Pilih Tingkat Kelas Terlebih Dahulu!", 4000);
            $('input[name="nomer"]').val("");
        }
    });
</script>