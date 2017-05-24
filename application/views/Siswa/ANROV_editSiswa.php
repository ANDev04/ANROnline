<body>
    <form action="<?php echo base_url()."ANROC_Siswa/Save" ?>" method="post">
        <table>
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
                    <input type="radio" name="Jenis_Kelamin" value="L" <?php echo $L ?>>Laki-Laki
                    <input type="radio" name="Jenis_Kelamin" value="P" <?php echo $P ?>>Perempuan
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
                    <select name="Kelas">
                <?php foreach($kelas as $kel){ ?>
                        <option value="<?php echo $kel->Kode_Kelas ?>"><?php echo $kel->Tingkat_Kelas."-".$kel->Nama_Kelas ?></option>
                <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>No Telpon</td>
                <td><input type="number" name="No_Telp" value="<?php echo $res->No_Telp ?>"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="Alamat"><?php echo $res->Alamat ?></textarea></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input type="radio" name="Status" <?php echo $aktif ?> value="Aktif">Aktif
                    <input type="radio" name="Status" <?php echo $tidak_aktif?> value="Tidak Aktif">Tidak Aktif
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="update">Submit</button></td>
            </tr>
            <?php } ?>
        </table>
    
    </form>
    <script src="<?php echo base_url()."assets/js/jquery-3.1.1.min.js" ?>"></script>