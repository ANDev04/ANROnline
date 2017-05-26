<body>
    <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Nilai/save") ?>">
        <input type="hidden" name="id_nilai" value="<?php echo $resource['ID_NILAI']?>">
        <table>
            <tr>
                <td>Nama Siswa</td>
                <td>:</td>
                <td>
                    <input type="text" name="siswa" value="<?php echo $siswa['NIS']."/".$siswa['NISN']." - ".$siswa['Nama_Siswa'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Nama Mata Pelajaran</td>
                <td>:</td>
                <td>
                    <input type="text" name="mapel" value="<?php echo $mapel['Nama_Mapel']; ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Jenis Nilai</td>
                <td>:</td>
                <td>
                    <input type="text" name="jenis_nilai" value="<?php echo $resource['Jenis_Nilai'] ?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td>
                    <input type="text" name="kelas" value="<?php echo $kelas['Tingkat_Kelas']."-".$kelas['Nama_Kelas']." (".$kelas['Tahun_Masuk']."/".$kelas['Tahun_Keluar'].")"?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Nilai</td>
                <td>:</td>
                <td>
                    <input type="number" name="nilai" min="0" max="100" value="<?php echo $resource['Nilai'] ?>" required>
                </td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>:</td>
                <td>
                    <?php 
                        if($resource['Semester'] == "Ganjil"){
                            echo "<input type='radio' name='semester' value='Ganjil' id='ganjil' checked><label for='ganjil'>Ganjil</label>";
                            echo "<input type='radio' name='semester' value='Genap' id='genap'><label for='genap'>Genap</label>";
                        } 
                        else if($resource['Semester'] == "Genap"){
                            echo "<input type='radio' name='semester' value='Ganjil' id='ganjil' checked><label for='ganjil'>Ganjil</label>";
                            echo "<input type='radio' name='semester' value='Genap' checked id='genap'><label for='genap'>Genap</label>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="update">Submit</button></td>
            </tr>
        </table>
    </form>