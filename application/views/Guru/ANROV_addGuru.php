<body>
    <form action="<?php echo base_url()."ANROC_Guru/Save" ?>" method="post">
        <table>
            <tr>
                <td>Masukkan NIP</td>
                <td><input type="number" name="NIP" min="9"></td>
            </tr>
            <tr>
                <td>Masukkan NUPTK</td>
                <td><input type="number" name="NUPTK" min="9"></td>
            </tr>
            <tr>
                <td>Masukkan Nama Guru</td>
                <td><input type="text" name="Nama_Guru"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" name="Jenis_Kelamin"  value="L" id="jk1">
                    <label for="jk1">Laki-Laki</label>
                    <input type="radio" name="Jenis_Kelamin" value="P" id="jk2">
                    <label for="jk2">Perempuan</label>
                </td>
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
                <td><button type="submit" name="type" value="insert">Submit</button></td>
            </tr>
        </table>
    </form>
    <script>
     $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 34 // Creates a dropdown of 15 years to control year
      });
    </script>