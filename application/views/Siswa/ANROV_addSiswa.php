<body>
    <form action="<?php echo base_url()."ANROC_Siswa/Save" ?>" method="post">
        <table>
            <tr>
                <td>Masukkan NIS</td>
                <td><input type="number" name="NIS" min="9"></td>
            </tr>
            <tr>
                <td>Masukkan NISN</td>
                <td><input type="number" name="NISN" min="9"></td>
            </tr>
            <tr>
                <td>Masukkan Nama Siswa</td>
                <td><input type="text" name="Nama_Siswa"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="Jenis_Kelamin" value="L">Laki-Laki
                    <input type="radio" name="Jenis_Kelamin" value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="Tempat_Lahir"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="Tanggal_Lahir"></td>
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
                <?php foreach($resource as $res){ ?>
                        <option value="<?php echo $res->Kode_Kelas ?>"><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas ?></option>
                <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>No Telpon</td>
                <td><input type="number" name="No_Telp"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><textarea name="Alamat"></textarea></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <input type="radio" name="Status" checked value="Aktif">Aktif
                    <input type="radio" name="Status" value="Tidak Aktif">Tidak Aktif
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    </form>