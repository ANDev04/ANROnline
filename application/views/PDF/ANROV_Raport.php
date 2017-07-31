<html>
    <head>
        <title>Raport Siswa <?php echo $siswa['Nama_Siswa']?></title>
        <style>
            table{
                width: 100%;
            }
            .main-table table, .main-table tr, .main-table th, .main-table td,{
                border: 1px solid black;
            }
            .main-table{
                border-collapse: collapse;
            }
            .main-table th, .main-table td,{
                padding: 6px;
            }
            .angka{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <header><?php echo $header['Isi'] ?></header>
        <table>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>Nama Siswa</td><td> : </td><td><?php echo $siswa['Nama_Siswa'] ?></td>
                        </tr>    
                        <tr>
                            <td>NIS/NISN</td><td>:</td><td><?php echo $siswa['NIS']."/".$siswa['NISN']; ?></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>Kelas</td><td>:</td><td><?php echo $kelas['Tingkat_Kelas']."-".$kelas['Nama_Kelas']." / ".$semester ?></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran</td><td>:</td><td><?php echo  $kelas['Tahun_Masuk']."/".$kelas['Tahun_Keluar'] ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table><br>
        <table class="main-table">
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Mata Pelajaran</th>
                <th rowspan="2">KKM</th>
                <th colspan="4">Nilai</th>
                <th rowspan="2">Praktek</th>
                <th rowspan="2">Ket</th>
            </tr>
            <tr>
                <th>Harian</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Akhir</th>
            </tr>
            <?php
                $i = 1;
                $temp = "";
                foreach($nilai as $r){
                    if($r->Kode_Mapel != $temp){
                        $sort = sortNilai($r->Kode_Mapel, $nilai_siswa);
                        $nilai = explode(", ", $sort);
                        $banyak = count($nilai);
            ?>
            
            <tr>
                <td class="angka"><?php echo $i ?></td>
                <td><?php echo $r->Nama_Mapel; ?></td>
                <td class="angka"><?php echo $r->KKM; ?></td>
                <td class="angka harian<?php echo $i ?>"><?php if($banyak > 0 && $nilai[0] != "0"){echo $harian=$nilai[0]; $banyak--;}else{$harian=0;} ?></td>
                <td class="angka uts<?php echo $i ?>"><?php if($banyak > 0 && $nilai[1] != "0"){echo $uts=$nilai[1]; $banyak--;}else{$uts=0;} ?></td>
                <td class="angka uas<?php echo $i ?>"><?php if($banyak > 0 && $nilai[2] != "0"){echo $uas=$nilai[2]; $banyak--;}else{$uas=0;} ?></td>
                <td class="angka"><?php echo round(($harian*0.4)+($uts*0.3)+($uas*0.3)); ?></td>
                <td class="angka praktek<?php echo $i ?>"><?php if($banyak > 0 && $nilai[3] != "0"){echo $pra=$nilai[3]; $banyak--;}else{$pra=0;} ?></td>
                <td><?php echo parLulus(($harian*0.4)+($uts*0.3)+($uas*0.3), $r->KKM, count($nilai), $pra); ?></td>
            </tr>
            <?php 
                        $temp = $r->Kode_Mapel;
                        $i++;
                    }
                }
            ?>
        </table>
        <footer><?php echo $footer['Isi'] ?></footer>
    </body>
    <?php
        function parLulus($nilai, $kkm, $par, $pra){
            if($nilai >= $kkm && $pra >= $kkm && $par == 4){
                return "Lulus";
            }
            else{
                return "Tidak Lulus";
            }
        }
        function sortNilai($mapel, $nilai_siswa){
            $mp = explode(", ", $nilai_siswa['Mapel']);
            $nilai = explode(", ", $nilai_siswa['Nilai_Siswa']);
            $jenis = explode(", ", $nilai_siswa['Jenis_Nilai']);
            $harian = "0"; $uts = "0"; $uas = "0"; $pra = "0"; $i = 0;
            foreach($mp as $m){
                if($m == $mapel){
                    if($jenis[$i] == "Harian"){
                        $harian = $nilai[$i];
                    }
                    else if($jenis[$i] == "Ujian Tengah Semester"){
                        $uts = $nilai[$i];
                    }
                    else if($jenis[$i] == "Ujian Akhir Semester"){
                        $uas = $nilai[$i];
                    }
                    else if($jenis[$i] == "Praktek"){
                        $pra = $nilai[$i];
                    }
                }
                $i++;
            }
            return $harian.", ".$uts.", ".$uas.", ".$pra;
        }
    ?>
</html>