<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Siswa")?>">Data Siswa</a>
                    <a class="breadcrumb" href="#">Tambah Data Siswa</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Siswa</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
            <form onsubmit="return validasi(this, 'siswa')" action="<?php echo base_url()."ANROC_Siswa/Save" ?>" method="post">
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">NIS Siswa</div>
                    <div class="col l10 s9">
                        <input type="number" name="NIS">
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">NISN Siswa</div>
                    <div class="col l10 s9">
                        <input type="number" name="NISN">
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">Nama Siswa</div>
                    <div class="col l10 s9">
                        <input type="text" name="Nama_Siswa">
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3">Jenis Kelamin</div>
                    <div class="col l10 s9">
                        <input type="radio" name="Jenis_Kelamin"  value="L" id="jk1" >
                        <label for="jk1">Laki-Laki</label>
                        <input type="radio" name="Jenis_Kelamin" value="P" id="jk2" >
                        <label for="jk2">Perempuan</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">Tempat Lahir</div>
                    <div class="col l10 s9">
                        <input type="text" name="Tempat_Lahir">
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">Tanggal Lahir</div>
                    <div class="col l10 s9">
                        <input type="date" name="Tanggal_Lahir" >
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:10.5px;">Agama Siswa</div>
                    <div class="col l10 s9">
                        <select name="Agama" >
                            <option value="Pilih" disabled selected>Pilih Agama</option>
                            <option>Islam</option>
                            <option>Kristen Katholik</option>
                            <option>Kristen Protestan</option>
                            <option>Hindu</option>
                            <option>Buddha</option>
                            <option>Atheis</option>
                            <option>DLL</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:10.5px;">Kelas Siswa</div>
                    <div class="col l10 s9">
                        <select name="Kelas" >
                          <option value="Pilih" disabled selected>Tingkat Kelas</option>
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">No. Telepon</div>
                    <div class="col l10 s9">
                        <input type="number" name="No_Telp">
                    </div>
                </div>
                <div class="row">
                    <div class="col l2 s3">Status</div>
                    <div class="col l10 s9">
                        <input type="radio" name="Status" checked value="Aktif" id="aktif">
                        <label for="aktif">Aktif</label>
                        <input type="radio" name="Status" value="Tidak Aktif" id="tidak_aktif">
                        <label for="tidak_aktif">Tidak Aktif</label>
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
    <script>
     $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 34 // Creates a dropdown of 15 years to control year
      });
    </script>