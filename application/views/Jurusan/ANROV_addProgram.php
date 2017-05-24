<body>
    <form action="<?php echo base_url("ANROC_Program/save") ?>" method="post">
        <table>
            <tr>
                <td>Program Keahlian</td>
                <td><input type="text" name="program_keahlian"></td>
            </tr>
            <tr>
                <td><button type="submit" name="type" value="insert">Tambah Data</button></td>
            </tr>
        </table>
    </form>