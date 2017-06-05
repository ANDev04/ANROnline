<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Tambah Data Siswa</h3></blockquote>
            </div>    
        </div>
    <div class="row">
        <div class="col s12 z-depth-3">
            <form onsubmit="return validasi(this, 'siswa')" action="<?php echo base_url()."ANROC_Siswa/Save" ?>" method="post">
                <table>
                    <tr>
                        <td>Masukkan NIS</td>
                        <td><input type="number" name="NIS"></td>
                    </tr>
                    <tr>
                        <td>Masukkan NISN</td>
                        <td><input type="number" name="NISN"></td>
                    </tr>
                    <tr>
                        <td>Masukkan Nama Siswa</td>
                        <td><input type="text" name="Nama_Siswa" ></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>
                            <input type="radio" name="Jenis_Kelamin"  value="L" id="jk1" >
                            <label for="jk1">Laki-Laki</label>
                            <input type="radio" name="Jenis_Kelamin" value="P" id="jk2" >
                            <label for="jk2">Perempuan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td><input type="text" name="Tempat_Lahir" ></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td><input type="date" name="Tanggal_Lahir" ></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>
                            <div class="input-field">
                                <select name="Kelas" >
                                  <option value="Pilih" disabled selected>Tingkat Kelas</option>
                                  <option value="X">X</option>
                                  <option value="XI">XI</option>
                                  <option value="XII">XII</option>
                                </select>
                          </div>
                        </td>
                    </tr>
                    <tr>
                        <td>No Telpon</td>
                        <td><input type="number" name="No_Telp"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><textarea name="Alamat" class="materialize-textarea"></textarea></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <input type="radio" name="Status" checked value="Aktif" id="aktif">
                            <label for="aktif">Aktif</label>
                            <input type="radio" name="Status" value="Tidak Aktif" id="tidak_aktif">
                            <label for="tidak_aktif">Tidak Aktif</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="insert">Submit</button></td>
                    </tr>
                </table>
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