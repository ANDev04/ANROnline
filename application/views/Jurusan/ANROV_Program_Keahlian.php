<main>
    <div class="container">
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Program Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="responsive-table bordered">
                    <tr>
                        <th>No</th>
                        <th>Program Keahlian</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php 
                        $i=1;
                        foreach($resource as $res){ 
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $res->program_keahlian ?></td>
                        <td><a href="<?php echo base_url("ANROC_Program/edit/".$res->id_program_keahlian) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Program/hapus/".$res->id_program_keahlian) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                    <?php $i++;} ?>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_program_keahlian">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Program/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
    <?php if(isset($_GET['success'])&&isset($_GET['error'])){ ?>
    counter(1, '<?php echo base_url("ANROC_Jurusan/Program_Keahlian")?>');
    <?php } ?>
</script>