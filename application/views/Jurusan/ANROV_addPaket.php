<main>
    <div class="container">
        <div class="row">
           <div class="col s12 z-depth-3">
                <blockquote><h3>Tambah Data Paket</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form onsubmit="return validasi(this, 'paket')" action="<?php echo base_url("ANROC_Paket/save") ?>" method="post">
                    <table>
                        <tr>
                            <td>Program Keahlian</td>
                            <td>
                                <select name="id_program_keahlian">
                                    <option value="Pilih" disabled selected>Pilih Program Keahlian</option>
                                    <?php foreach($resource as $res){ ?>
                                    <option value="<?php echo $res->id_program_keahlian ?>"><?php echo $res->program_keahlian ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Paket Keahlian</td>
                            <td><input type="text" name="paket_keahlian"></td>
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