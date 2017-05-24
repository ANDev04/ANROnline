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
                    <input type="radio" name="Jenis_Kelamin"  value="L" id="jk1">
                    <label for="jk1">Laki-Laki</label>
                    <input type="radio" name="Jenis_Kelamin" value="P" id="jk2">
                    <label for="jk2">Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="Tempat_Lahir"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" name="Tanggal_Lahir" class="datepicker"></td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>
                    <select name="Agama" class="browser-default">
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
                    <select name="Kelas" class="browser-default">
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
                    <input type="radio" name="Status" checked value="Aktif" id="aktif">
                    <label for="aktif">Aktif</label>
                    <input type="radio" name="Status" value="Tidak Aktif" id="tidak_aktif">
                    <label for="tidak_aktif">Tidak Aktif</label>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    </form>
    <script>
     $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 34 // Creates a dropdown of 15 years to control year
      });
    </script>