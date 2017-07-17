<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Mapel")?>">Data Mata Pelajaran</a>
                    <a class="breadcrumb" href="#">Tambah Data Mata Pelajaran</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Mata Pelajaran</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'mapel')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_Mapel/save") ?>">
                    <input type="hidden" name="kode_mapel" value="<?php echo $kode ?>">
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20.5px;">Kode Mata Pelajaran</div>
                        <div class="col l9 s9">
                            <td><input type="text" name="kode_mapel" value="<?php echo $kode ?>" disabled></td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20.5px;">Nama Mata Pelajaran</div>
                        <div class="col l9 s9">
                            <td><input type="text" name="nama"></td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s3" style="padding-top:20.5px;">KKM</div>
                        <div class="col l9 s9">
                            <td><input type="number" name="kkm" min="0" max="100"></td>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 right-align"><button class="btn" type="submit" name="type" value="insert"><i class="material-icons left">input</i>Submit</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>