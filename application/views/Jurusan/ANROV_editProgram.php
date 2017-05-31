<main>
     <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Edit Data Program</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form onsubmit="return validasi(this, 'program')" action="<?php echo base_url("ANROC_Program/save") ?>" method="post">
                    <table>
                        <?php foreach($resource as $res){ ?>
                        <input type="hidden" name='id_program_keahlian' value="<?php echo $res->id_program_keahlian ?>">
                        <tr>
                            <td>Program Keahlian</td>
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