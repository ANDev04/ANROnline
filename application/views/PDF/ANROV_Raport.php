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
                    $nilai = explode(", ", $r->Nilai_Siswa);
                    $banyak = count($nilai);
            ?>
            
            <tr>
                <td class="angka"><?php echo $i ?></td>
                <td><?php echo $r->Nama_Mapel; ?></td>
                <td class="angka"><?php echo $r->KKM; ?></td>
                <td class="angka harian<?php echo $i ?>"><?php if($banyak > 0){echo $nilai[0]; $banyak--;} ?></td>
                <td class="angka uts<?php echo $i ?>"><?php if($banyak > 0){echo $nilai[1]; $banyak--;} ?></td>
                <td class="angka uas<?php echo $i ?>"><?php if($banyak > 0){echo $nilai[2]; $banyak--;} ?></td>
                <td class="angka"><?php echo ($nilai[0]+$nilai[1]+$nilai[2])/3; ?></td>
                <td class="angka praktek<?php echo $i ?>"><?php if($banyak > 0){echo $nilai[3]; $banyak--;} ?></td>
                <td><?php echo parLulus(($nilai[0]+$nilai[1]+$nilai[2])/3, $r->KKM, count($nilai)); ?></td>
            </tr>
            <?php 
                    $i++;
                }
            ?>
        </table>
        <footer><?php echo $footer['Isi'] ?></footer>
    </body>
    <?php
        function parLulus($nilai, $kkm, $par){
            if($nilai >= $kkm && $par == 4){
                return "Lulus";
            }
            else{
                return "Tidak Lulus";
            }
        }
    ?>
</html>