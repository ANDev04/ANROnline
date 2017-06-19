<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan")?>">Data Jurusan</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan/Program_Keahlian")?>">Data Program Keahlian</a>
                    <a class="breadcrumb" href="#">Edit Data Program Keahlian</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Program Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form onsubmit="return validasi(this, 'program')" action="<?php echo base_url("ANROC_Program/save") ?>" method="post">
                    <table>
                        <?php foreach($resource as $res){ ?>
                        <input type="hidden" name='id_program_keahlian' value="<?php echo $res->id_program_keahlian ?>">
                        <tr>
                            <td>Nama Program Keahlian</td>
                            <td><input type="text" name="program_keahlian" value="<?php echo $res->program_keahlian ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="update">Submit</button></td>
                        </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
         </div>
    </div>
</main>