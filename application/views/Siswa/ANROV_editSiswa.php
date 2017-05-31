<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Edit Data Siswa</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form onsubmit="return validasi(this, 'siswa')" action="<?php echo base_url()."ANROC_Siswa/Save" ?>" method="post">
                    <table class="table table-responsive">
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
                        <tr>
                            <td>NIS</td>
                            <td><input type="number" name="NIS" min="9" value="<?php echo $res->NIS ?>"></td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td><input type="number" name="NISN" min="9" value="<?php echo $res->NISN ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td><input type="text" name="Nama_Siswa" value="<?php echo $res->Nama_Siswa ?>"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
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
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td><input type="text" name="Tempat_Lahir" value="<?php echo $res->Tempat_Lahir ?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td><input type="date" name="Tanggal_Lahir" value="<?php echo $res->Tanggal_Lahir ?>"></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>
                                <select name="Agama">
                                    <option>Islam</option>
                                    <option>Kristen Katholik</option>
                                    <option>Kristen Protestan</option>
                                    <option>Hindu</option>
                                    <option>Buddha</option>
                                    <option>Atheis</option>
                                    <option>DLL</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>
                                <div class="input-field">
                                    <select name="Kelas">
                                      <option value="X" <?php echo $x ?>>X</option>
                                      <option value="XI" <?php echo $xi ?>>XI</option>
                                      <option value="XII" <?php echo $xii ?>>XII</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td><input type="number" name="No_Telp" value="<?php echo $res->No_Telp ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><textarea name="Alamat" class="materialize-textarea"><?php echo $res->Alamat ?></textarea></td>
                        </tr>
                       <tr>
                        <td>Status</td>
                        <td>
                            <input type="radio" name="Status" value="Aktif" id="aktif" <?php echo $aktif ?>>
                            <label for="aktif">Aktif</label>
                            <input type="radio" name="Status" value="Tidak Aktif" id="tidak_aktif" <?php echo $tidak_aktif ?>>
                            <label for="tidak_aktif">Tidak Aktif</label>
                        </td>
                        </tr>
                        <tr>
                            <td class="right-align" colspan="2"><button class="btn" type="submit" name="type" value="update">Submit</button></td>
                        </tr>
                        <?php } ?>
                    </table>    
                </form>
            </div>
        </div>
    </div>
</main>