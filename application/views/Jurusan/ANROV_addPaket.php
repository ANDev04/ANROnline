<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan")?>">Data Jurusan</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan/Paket_Keahlian"); ?>">Data Paket Keahlian</a>
                    <a class="breadcrumb" href="#">Tambah Data Paket Keahlian</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Paket Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
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