<body>
    <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/PDF") ?>">
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>
                    <select name="nis">
                        <option value="Pilih" disabled selected>Pilih Siswa</option>
                        <?php foreach($siswa as $b){?>
                        <option value="<?php echo $b->ID_SISWA ?>"><?php echo $b->NIS."/".$b->NISN." | ".$b->Nama_Siswa ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <select name="kode_kelas">
                        <option value="Pilih" disabled selected>Pilih Kelas</option>
                        <?php foreach($kelas as $b){?>
                        <option value="<?php echo $b->Kode_Kelas ?>"><?php echo $b->Tingkat_Kelas."-".$b->Nama_Kelas." (".$b->Tahun_Masuk."/".$b->Tahun_Keluar.")" ?></option>
                        <?php } ?>
                    </select>
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
                <td>Header</td>
                <td>:</td>
                <td>
                    <select name="header">
                        <option name="Pilih" disabled selected>Pilih Configurasi Header</option>
                        <?php foreach($header as $b){?>
                        <option value="<?php echo $b->ID_Config ?>"><?php echo $b->ID_Config." - ".$b->Nama ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Footer</td>
                <td>:</td>
                <td>
                    <select name="footer">
                        <option name="Pilih" disabled selected>Pilih Configurasi Footer</option>
                        <?php foreach($footer as $b){?>
                        <option value="<?php echo $b->ID_Config ?>"><?php echo $b->ID_Config." - ".$b->Nama ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="type">Submit</button></td>
            </tr>
        </table>
    </form>
    <a href="<?php echo base_url("ANROC_PDF/config") ?>">Configurasi PDF</a><br>