<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan")?>">Data Jurusan</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan/Paket_Keahlian"); ?>">Data Paket Keahlian</a>
                    <a class="breadcrumb" href="#">Edit Data Paket Keahlian</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Paket Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form onsubmit="return validasi(this, 'paket')" action="<?php echo base_url("ANROC_Paket/save") ?>" method="post">
                    <?php foreach($resource as $res){?>
                    <input type="hidden" name="id_paket_keahlian" value="<?php echo $res->id_paket_keahlian ?>">
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:10.5px;">Program Keahlian</div>
                        <div class="col l9 s9">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20.5px;">Paket Keahlian</div>
                        <div class="col l9 s9">
                            <td><input type="text" name="paket_keahlian" value="<?php echo $res->paket_keahlian ?>"></td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align"><button class="btn" type="submit" name="type" value="update"><i class="material-icons left">edit</i>Update</button></div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</main>