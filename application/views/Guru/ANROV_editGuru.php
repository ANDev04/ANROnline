<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Guru")?>">Data Guru</a>
                    <a class="breadcrumb" href="#">Edit Data Guru</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Guru</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form onsubmit="return validasi(this, 'guru')" action="<?php echo base_url()."ANROC_Guru/Save" ?>" method="post">
                    <table>
                        <?php foreach($resource as $res){ 
                            if($res->Jenis_Kelamin=="L"){
                                $l="checked";
                                $p="";
                            }else{
                                $p="checked";
                                $l="";
                            }
                        ?>
                        <input type="hidden" name="id_guru" value="<?php echo $res->ID_Guru ?>">
                        <tr>
                            <td>NIP</td>
                            <td><input type="number" name="NIP" min="9" value="<?php echo $res->NIP ?>"></td>
                        </tr>
                        <tr>
                            <td>NUPTK</td>
                            <td><input type="number" name="NUPTK" min="9" value="<?php echo $res->NUPTK ?>"></td>
                        </tr>
                        <tr>
                            <td>Nama Guru</td>
                            <td><input type="text" name="Nama_Guru" value="<?php echo $res->Nama_Guru ?>"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <input type="radio" name="Jenis_Kelamin"  value="L" id="jk1" <?php echo $l ?>>
                                <label for="jk1">Laki-Laki</label>
                                <input type="radio" name="Jenis_Kelamin" value="P" id="jk2" <?php echo $p ?>>
                                <label for="jk2">Perempuan</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input type="radio" name="Status" checked value="Aktif" id="aktif">
                                <label for="aktif">Aktif</label>
                                <input type="radio" name="Status" value="Tidak Aktif" id="tidak_aktif">
                                <label for="tidak_aktif">Tidak Aktif</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="update">Submit</button></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>
    <script>
     $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 34 // Creates a dropdown of 15 years to control year
      });
    </script>