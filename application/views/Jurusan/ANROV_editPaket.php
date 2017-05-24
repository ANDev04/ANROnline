<body>
    <form action="<?php echo base_url("ANROC_Paket/save") ?>" method="post">
        <table>
            <?php foreach($resource as $res){?>
            <input type="hidden" name="id_paket_keahlian" value="<?php echo $res->id_paket_keahlian ?>">
            <tr>
                <td>Program Keahlian</td>
                <td>
                    <select name="id_program_keahlian">
                        <?php foreach($program as $prog){ 
                            if($res->id_program_keahlian==$prog->id_program_keahlian){
                        ?>
                        <option value="<?php echo $prog->id_program_keahlian ?>" selected><?php echo $prog->program_keahlian ?></option>
                            
                        <?php }else{
                        ?>
                        <option value="<?php echo $prog->id_program_keahlian ?>"><?php echo $prog->program_keahlian ?></option>
                        <?php
                            } ?>          
                            
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Paket Keahlian</td>
                <td><input type="text" name="paket_keahlian" value="<?php echo $res->paket_keahlian ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="update">Update Data</button></td>
            </tr>
            <?php } ?>
        </table>
    </form>