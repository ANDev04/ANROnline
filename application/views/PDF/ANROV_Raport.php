<html>
    <head>
        <title>Raport Siswa <?php echo $siswa['Nama_Siswa']?></title>
        <script src="<?php echo base_url("assets/js/jquery.min.js") ?>"></script>
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
                    if($r->Nama_Mapel != $temp){
            ?>
            
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $r->Nama_Mapel; ?></td>
                <td class="angka"><?php echo $r->KKM; ?></td>
                <td class="angka harian<?php echo $i ?>"></td>
                <td class="angka uts<?php echo $i ?>"></td>
                <td class="angka uas<?php echo $i ?>"></td>
                <td></td>
                <td class="angka praktek<?php echo $i ?>"></td>
                <td></td>
            </tr>
            <?php 
                        $i++;
                        $temp = $r->Nama_Mapel;
                    }
                }
            ?>
        </table>
        <footer><?php echo $footer['Isi'] ?></footer>
    </body>
</html>

<!--<script>
    $(document).ready(function(){
        $.ajax({
            type : 'POST', 
            url  : '<?php echo site_url('ANROC_PDF/Cari_Nilai'); ?>', 
            data : {
                Siswa : '<?php echo $r->Siswa; ?>',
                Kelas : '<?php echo $r->Kelas; ?>',
                Mapel : '<?php echo $r->Mapel; ?>',
                Harian : 'Harian',
                UTS : 'Ujian Tengah Semester',
                UAS : 'Ujian Akhir Semester',
                Praktek : 'Praktek',
                Semester : '<?php echo $r->Semester; ?>'
            },
            success : function(notif){
                var nilai = notif.split(",")
                $(".harian<?php echo $i ?>").html(nilai[0])
                $(".uts<?php echo $i ?>").html(nilai[1])
                $(".uas<?php echo $i ?>").html(nilai[2])
                $(".praktek<?php echo $i ?>").html(nilai[3])
            }
        }); 
    });
</script>-->