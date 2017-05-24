<body>
    <form autocomplete="off" method="post" action="save">
        <input type="hidden" name="kode_mapel" value="<?php echo $kode ?>">
        <table>
            <tr>
                <td>Kode Mata Pelajaran</td>
                <td>:</td>
                <td><input type="text" name="kode_mapel" value="<?php echo $kode ?>" disabled></td>
            </tr>
            <tr>
                <td>Nama Mata Pelajaran</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>KKM</td>
                <td>:</td>
                <td><input type="number" name="kkm" min="0" max="100"></td>
            </tr>
            <tr>
                <td>Guru</td>
                <td>:</td>
                <td>
                    <select name="guru">
                        <option value="" disabled selected>Pilih Guru</option>
                        <?php foreach($resource as $res){?>
                        <option value="<?php echo $res->ID_Guru ?>"><?php echo $res->NIP." / ".$res->NUPTK." ".$res->Nama_Guru ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    </form>