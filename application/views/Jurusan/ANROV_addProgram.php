<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Tambah Data Program</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form action="<?php echo base_url("ANROC_Program/save") ?>" method="post">
                    <table>
                        <tr>
                            <td>Program Keahlian</td>
                            <td><input type="text" name="program_keahlian"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="insert">Tambah Data</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>