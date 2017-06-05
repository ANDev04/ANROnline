<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Data Paket Keahlian</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <table class="responsive-table bordered">
                    <tr>
                        <th>No</th>
                        <th>Program Keahlian</th>
                        <th>Paket Keahlian</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php 
                        $i=1;
                        foreach($resource as $res){ 
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $res->program_keahlian ?></td>
                        <td><?php echo $res->paket_keahlian ?></td>
                        <td><a href="<?php echo base_url("ANROC_Paket/edit/".$res->id_paket_keahlian) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Paket/hapus/".$res->id_paket_keahlian) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                    <?php $i++;} ?>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url()."ANROC_Exel/import/anr_paket_keahlian" ?>"><i class="material-icons right">open_in_browser</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Paket/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>