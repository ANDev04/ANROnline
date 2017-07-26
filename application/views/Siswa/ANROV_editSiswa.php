<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Siswa")?>">Data Siswa</a>
                    <a class="breadcrumb" href="#">Edit Data Siswa</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Siswa</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'siswa')" action="<?php echo base_url()."ANROC_Siswa/Save" ?>" method="post">
                    <?php foreach($resource as $res){ 
                                $islam="";
                                $kristen_katholik="";
                                $kristen_protestan="";
                                $hindu="";
                                $buddha="";
                                $atheis="";
                                $dll="";
                                $aktif="";
                                $tidak_aktif="";
                                $x="";
                                $xi="";
                                $xii="";
                                if($res->Agama=="Islam"){
                                    $islam="selected";
                                }else if($res->Agama=="Kristen Katholik"){
                                    $kristen_katholik="selected";
                                }else if($res->Agama=="Kristen Protestan"){
                                    $kristen_protestan="selected";
                                }else if($res->Agama=="Hindu"){
                                    $hindu="selected";
                                }else if($res->Agama=="Buddha"){
                                    $buddha="selected";
                                }else if($res->Agama=="Atheis"){
                                    $atheis="selected";
                                }else if($res->Agama=="DLL"){
                                    $dll="selected";
                                }
                                if($res->Status=="Aktif"){
                                    $aktif="checked";
                                }else{
                                    $tidak_aktif="checked";
                                }
                                if($res->Kelas=="X"){
                                    $x="selected";
                                }else if($res->Kelas=="XI"){
                                    $xi="selected";
                                }else{
                                    $xii="selected";
                                }

                    ?>
                    <input type="hidden" name="id_siswa" value="<?php echo $res->ID_SISWA ?>">
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:25.5px;">NIS Siswa</div>
                        <div class="input-field col l10 s9">
                            <input type="number" name="NIS" value="<?php echo $res->NIS ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:20.5px;">NISN Siswa</div>
                        <div class="col l10 s9">
                            <input type="number" name="NISN" value="<?php echo $res->NISN ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:20.5px;">Nama Siswa</div>
                        <div class="col l10 s9">
                            <input type="text" name="Nama_Siswa" value="<?php echo $res->Nama_Siswa ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3">Jenis Kelamin</div>
                        <div class="col l10 s9">
                            <?php 
                                if($res->Jenis_Kelamin=="L"){
                                    $L="checked";
                                    $P="";
                                }else{
                                    $L="";
                                    $P="checked";
                                }

                            ?>
                            <input type="radio" name="Jenis_Kelamin" value="L" <?php echo $L ?> id="L"><label for="L">Laki-Laki</label>
                            <input type="radio" name="Jenis_Kelamin" value="P" <?php echo $P ?> id="P"><label for="P">Perempuan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:20.5px;">Tempat Lahir</div>
                        <div class="col l10 s9">
                            <input type="text" name="Tempat_Lahir" value="<?php echo $res->Tempat_Lahir ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:20.5px;">Tanggal Lahir</div>
                        <div class="col l10 s9">
                            <input type="date" name="Tanggal_Lahir" value="<?php echo $res->Tanggal_Lahir ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:10.5px;">Agama Siswa</div>
                        <div class="col l10 s9">
                            <select name="Agama">
                                <option>Islam</option>
                                <option>Kristen Katholik</option>
                                <option>Kristen Protestan</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                                <option>Atheis</option>
                                <option>DLL</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:22.5px;">Kelas Siswa</div>
                        <div class="input-field col l10 s9">
                            <select name="Kelas">
                              <option value="X" <?php echo $x ?>>X</option>
                              <option value="XI" <?php echo $xi ?>>XI</option>
                              <option value="XII" <?php echo $xii ?>>XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:20.5px;">No. Telepon</div>
                        <div class="col l10 s9">
                            <input type="number" name="No_Telp" value="<?php echo $res->No_Telp ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3" style="padding-top:20.5px;">Alamat</div>
                        <div class="col l10 s9">
                            <textarea name="Alamat" class="materialize-textarea"><?php echo $res->Alamat ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l2 s3">Status</div>
                        <div class="col l10 s9">
                            <input type="radio" name="Status" value="Aktif" id="aktif" <?php echo $aktif ?>>
                            <label for="aktif">Aktif</label>
                            <input type="radio" name="Status" value="Tidak Aktif" id="tidak_aktif" <?php echo $tidak_aktif ?>>
                            <label for="tidak_aktif">Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align"><button class="btn" type="submit" name="type" value="update"><i class="material-icons left">edit</i>Update</button></div>
                    </div>
                    <?php } ?>  
                </form>
            </div>
        </div>
    </div>
</main>