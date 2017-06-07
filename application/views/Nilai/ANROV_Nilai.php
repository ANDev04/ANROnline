<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Data Nilai</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                 <table class="responsive-table bordered">
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Jenis Nilai</th>
                        <th>Nilai</th>
                        <th>Kelas</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php foreach($resource as $res){?>
                    <tr>
                        <td><?php echo $res->NIS."/".$res->NISN." - ".$res->Nama_Siswa ?></td>
                        <td><?php echo $res->Nama_Mapel ?></td>
                        <td><?php echo $res->Jenis_Nilai ?></td>
                        <td><?php echo $res->Nilai ?></td>
                        <td><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas." (".$res->Tahun_Masuk."/".$res->Tahun_Keluar.")" ?></td>
                        <td><a href="<?php echo base_url("ANROC_Nilai/edit/".$res->ID_NILAI) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Nilai/delete/".$res->ID_NILAI) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_nilai">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Nilai/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>