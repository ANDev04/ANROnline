<body>
    <form action="<?php echo base_url("ANROC_Program/save") ?>" method="post">
        <table>
            <?php foreach($resource as $res){ ?>
            <input type="hidden" name='id_program_keahlian' value="<?php echo $res->id_program_keahlian ?>">
            <tr>
                <td>Program Keahlian</td>
                <td><input type="text" name="program_keahlian" value="<?php echo $res->program_keahlian ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="update">Tambah Data</button></td>
            </tr>
            <?php } ?>
        </table>
    </form>