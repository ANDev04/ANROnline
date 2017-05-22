<body>
    <form autocomplete="off" method="post" action="save">
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>
                    <select name="siswa">
                        <option value="" disabled selected>Pilih Siswa</option>
                        <?php foreach($siswa as $res){?>
                        <option value="<?php echo $res->ID_SISWA ?>"><?php echo $res->NIS." / ".$res->NISN." ".$res->Nama_Siswa ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Mata Pelajaran</td>
                <td>:</td>
                <td>
                    <select name="mapel">
                        <option value="" disabled selected>Pilih Mata Pelajaran</option>
                        <?php foreach($mapel as $res){?>
                        <option value="<?php echo $res->Kode_Mapel ?>"><?php echo $res->Nama_Mapel ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jenis Nilai</td>
                <td>:</td>
                <td>
                    <select name="jenis_nilai">
                        <option value="" disabled selected>Pilih Jenis Nilai</option>
                        <option value="Harian">Harian</option>
                        <option value="Ujian Tengah Semester">Ujian Tengah Semester</option>
                        <option value="Ujian Akhir Semester">Ujian Akhir Semester</option>
                        <option value="Praktek">Praktek</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="kelas">
                        <option value="" disabled selected>Pilih Kelas</option>
                        <?php foreach($kelas as $res){?>
                        <option value="<?php echo $res->Kode_Kelas ?>"><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas." (".$res->Tahun_Masuk."/".$res->Tahun_Keluar.")" ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td>:</td>
                <td>
                    <input type="number" name="nilai" min="0" max="100" required>
                </td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td>
                    <input type="radio" name="semester" value="Ganjil">Ganjil
                    <input type="radio" name="semester" value="Genap">Genap
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    </form>