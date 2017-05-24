<body>
    <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Mapel/save") ?>">
        <input type="hidden" name="kode_mapel" value="<?php echo $resource['Kode_Mapel']?>">
        <table>
            <tr>
                <td>Kode Mata Pelajaran</td>
                <td>:</td>
                <td><input type="text" name="kode_mapel" value="<?php echo $resource['Kode_Mapel']?>" disabled></td>
            </tr>
            <tr>
                <td>Nama Mata Pelajaran</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $resource['Nama_Mapel']?>"></td>
            </tr>
            <tr>
                <td>KKM</td>
                <td>:</td>
                <td><input type="number" name="kkm" min="0" max="100" value="<?php echo $resource['KKM']?>"></td>
            </tr>
            <tr>
                <td>Guru</td>
                <td>:</td>
                <td>
                    <select name="guru">
                        <option value="" disabled selected>Pilih Guru</option>
                        <?php foreach($guru as $res){ if($resource['Guru'] == $res->ID_Guru){?>
                        <option value="<?php echo $res->ID_Guru ?>" selected><?php echo $res->NIP." / ".$res->NUPTK." - ".$res->Nama_Guru ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $res->ID_Guru ?>"><?php echo $res->NIP." / ".$res->NUPTK." - ".$res->Nama_Guru ?></option>
                        <?php } } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="update">Submit</button></td>
            </tr>
        </table>
    </form>