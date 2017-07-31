<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Data Nilai</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Nilai</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form autocomplete="off" action="<?php echo base_url("ANROC_Nilai/") ?>" method="get">
                <div class="row">
                    <div class="col l5 s12">
                        <div class="input-field">
                          <input id="search" type="search" name="key" value="<?php echo $this->input->get('key') ?>">
                          <label class="label-icon" for="search">Cari</label>
                          <i class="material-icons" onclick="$('#search').val('')">close</i>
                        </div>
                    </div>
                    <div class="col l2 s6" style="padding-top:20.5px;">
                        <select name="semester" id="semester">
                            <option value="">Semua Semester</option>
                            <option value="Ganjil">Ganjil</option>
                            <option value="Genap">Genap</option>
                        </select>
                    </div>
                    <div class="col l3 s6" style="padding-top:20.5px;">
                        <select name="jenis_nilai" id="jenis_nilai">
                            <option value="">Semua Jenis Nilai</option>
                            <option value="Harian">Harian</option>
                            <option value="Ujian Tengah Semester">Ujian Tengah Semester</option>
                            <option value="Ujian Akhir Semester">Ujian Akhir Semester</option>
                            <option value="Praktek">Praktek</option>
                        </select>
                    </div>
                    <div class="col l2 s12" style="padding-top:25px;">
                        <button type="submit" class="btn" style=" width:100%;">Cari</button>
                    </div>
                </div>
                </form>
                <hr>
            </div>
            <div class="col s12">
                <table class="bordered highlight centered">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Nama Mata Pelajaran</th>
                            <th>Jenis Nilai</th>
                            <th>Nilai</th>
                            <th>Semester</th>
                            <th>Kelas</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $banyak = 0 ;foreach($resource as $res){?>
                        <tr>
                            <td><a href="<?php echo base_url("ANROC_Siswa/Profile/".$res->ID_SISWA) ?>"><?php echo $res->NIS."/".$res->NISN." - ".$res->Nama_Siswa ?></a></td>
                            <td><?php echo $res->Nama_Mapel ?></td>
                            <td><?php echo $res->Jenis_Nilai ?></td>
                            <td><?php echo $res->Nilai ?></td>
                            <td><?php echo $res->Semester ?></td>
                            <td><a href="<?php echo base_url("ANROC_Kelas/Kelas/".$res->Kode_Kelas) ?>"><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas." (".$res->Tahun_Masuk."/".$res->Tahun_Keluar.")" ?></a></td>
                            <td><a href="<?php echo base_url("ANROC_Nilai/edit/".$res->ID_NILAI) ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url("ANROC_Nilai/delete/".$res->ID_NILAI) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                        </tr>
                    <?php $banyak++; } if($banyak==0){echo '<td colspan="9">Tidak Ada Data Untuk ditampilkan</td>';} ?>
                    </tbody>
                </table>
                 <div class="col s12 center">
                    <?php echo $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_nilai">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Nilai/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
$('select').ready(function(){
    var isi = '<?php echo $this->input->get('semester')?>';
    if(isi !=""){
        $('select[name="semester"]').val(isi);
    } 
    var jenis = '<?php echo $this->input->get('jenis_nilai') ?>';
    if(jenis !=""){
        $('select[name="jenis_nilai"]').val(jenis);
    }
});
</script>