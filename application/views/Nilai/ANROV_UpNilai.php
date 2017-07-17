<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Nilai")?>">Data Nilai</a>
                    <a class="breadcrumb" href="#">Edit Data Nilai</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Nilai</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'edit_nilai')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_Nilai/save") ?>">
                    <input type="hidden" name="id_nilai" value="<?php echo $resource['ID_NILAI']?>">
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:10.5px;">Nama Siswa</div>
                        <div class="col l9 s9">
                            <input type="text" name="siswa" value="<?php echo $siswa['NIS']."/".$siswa['NISN']." - ".$siswa['Nama_Siswa'] ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:10.5px;">Nama Mata Pelajaran</div>
                        <div class="col l9 s9">
                            <input type="text" name="mapel" value="<?php echo $mapel['Nama_Mapel']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:10.5px;">Jenis Nilai</div>
                        <div class="col l9 s9">
                            <input type="text" name="jenis_nilai" value="<?php echo $resource['Jenis_Nilai'] ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:10.5px;">Kelas Siswa</div>
                        <div class="col l9 s9">
                            <input type="text" name="kelas" value="<?php echo $resource['Tingkat_Kelas']."-".$resource['Nama_Kelas']." (".$resource['Tahun_Masuk']."/".$resource['Tahun_Keluar'].")"?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20.5px;">Nilai Siswa</div>
                        <div class="col l9 s9">
                            <input type="number" name="nilai" min="0" max="100" value="<?php echo $resource['Nilai'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3">Semester</div>
                        <div class="col l9 s9">
                            <?php 
                                if($resource['Semester'] == "Ganjil"){
                                    echo "<input type='radio' name='semester' value='Ganjil' id='ganjil' checked><label for='ganjil'>Ganjil</label>";
                                    echo "<input type='radio' name='semester' value='Genap' id='genap'><label for='genap'>Genap</label>";
                                } 
                                else if($resource['Semester'] == "Genap"){
                                    echo "<input type='radio' name='semester' value='Ganjil' id='ganjil' checked><label for='ganjil'>Ganjil</label>";
                                    echo "<input type='radio' name='semester' value='Genap' checked id='genap'><label for='genap'>Genap</label>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align"><button class="btn" type="submit" name="type" value="update"><i class="material-icons left">edit</i>Update</button></div>
                    </div>
                </form>
            
            </div>
        </div>
    </div>
    
</main>