function validasi(form, jenis){
    var numbers=/^[0-9]+$/;
    if(jenis == "siswa"){
        if(form.NIS.value == ""){
            Materialize.toast("NIS Belum Terisi!", 4000);
            form.NIS.focus();
            return(false);
        }
        if(form.NIS.value.length != 9){
            Materialize.toast("NIS Harus Berjumlah 9 Digit!", 4000);
            form.NIS.focus();
            return(false);
        }
        if(form.NISN.value == ""){
            Materialize.toast("NISN Belum Terisi!", 4000);
            form.NISN.focus();
            return(false);
        }
        if(form.NISN.value.length != 10){
            Materialize.toast("NISN Harus Berjumlah 10 Digit!", 4000);
            form.NISN.focus();
            return(false);
        }
        if(form.Nama_Siswa.value == ""){
            Materialize.toast("Nama Siswa Belum Terisi!", 4000);
            form.Nama_Siswa.focus();
            return(false);
        }
        if(form.Jenis_Kelamin.value == ""){
            Materialize.toast("Anda Belum Memilih Jenis Kelamin!", 4000);
            return(false);
        }
        if(form.Tempat_Lahir.value == ""){
            Materialize.toast("Tempat Lahir Belum Terisi!", 4000);
            form.Tempat_Lahir.focus();
            return(false);
        }
        if(form.Tanggal_Lahir.value == ""){
            Materialize.toast("Tanggal Lahir Belum Terisi!", 4000);
            form.Tanggal_Lahir.focus();
            return(false);
        }
        if(form.Agama.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Agama!", 4000);
            return(false);
        }
        if(form.Kelas.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih kelas!", 4000);
            return(false);
        }
        if(form.No_Telp.value == ""){
            Materialize.toast("No. Telepon Belum Terisi!", 4000);
            form.No_Telp.focus();
            return(false);
        }
        if(form.Alamat.value == ""){
            Materialize.toast("Alamat Belum Terisi!", 4000);
            form.Alamat.focus();
            return(false);
        }
    }
    else if(jenis == "guru"){
        if(form.NIP.value == ""){
            Materialize.toast("NIP Belum Terisi!", 4000);
            form.NIP.focus();
            return(false);
        }
        if(form.NIP.value.length != 9){
            Materialize.toast("NIP Harus Berjumlah 9 Digit!", 4000);
            form.NIP.focus();
            return(false);
        }
        if(form.NUPTK.value == ""){
            Materialize.toast("NUPTK Belum Terisi!", 4000);
            form.NUPTK.focus();
            return(false);
        }
        if(form.NUPTK.value.length != 10){
            Materialize.toast("NUPTK Harus Berjumlah 10 Digit!", 4000);
            form.NUPTK.focus();
            return(false);
        }
        if(form.Nama_Guru.value == ""){
            Materialize.toast("Nama Guru Belum Terisi!", 4000);
            form.Nama_Guru.focus();
            return(false);
        }
        if(form.Jenis_Kelamin.value == ""){
            Materialize.toast("Anda Belum Memilih Jenis Kelamin!", 4000);
            return(false);
        }
    }
    else if(jenis == "kelas"){
        if(form.tingkat_kelas.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Tingkat Kelas!", 4000);
            return(false);
        }
        if(form.jurusan.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Jurusan!", 4000);
            return(false);
        }
        if(form.nomer.value == ""){
            Materialize.toast("Nomer Kelas Belum Terisi!", 4000);
            form.nomer.focus();
            return(false);
        }
        if(form.kuota.value == ""){
            Materialize.toast("Kuota Belum Terisi!", 4000);
            form.kuota.focus();
            return(false);
        }
        if(form.tahun_masuk.value == ""){
            Materialize.toast("Tahun Masuk Belum Terisi!", 4000);
            form.tahun_masuk.focus();
            return(false);
        }
        if(form.tahun_keluar.value == ""){
            Materialize.toast("Tahun Keluar Belum Terisi!", 4000);
            form.tahun_keluar.focus();
            return(false);
        }
    }
    else if(jenis == "paket"){
        if(form.id_program_keahlian.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Program Keahlian!", 4000);
            return(false);
        }
        if(form.paket_keahlian.value == ""){
            Materialize.toast("Paket Keahlian Belum Terisi!", 4000);
            form.paket_keahlian.focus();
            return(false);
        }
    }
    else if(jenis == "mapel"){
        if(form.nama.value == ""){
            Materialize.toast("Nama Mata Pelajaran Belum Terisi!", 4000);
            form.nama.focus();
            return(false);
        }
        if(form.kkm.value == ""){
            Materialize.toast("KKM Belum Terisi!", 4000);
            form.kkm.focus();
            return(false);
        }
        if(form.guru.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Guru!", 4000);
            return(false);
        }
    }
    else if(jenis == "nilai"){
        if(form.siswa.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Siswa!", 4000);
            return(false);
        }
        if(form.mapel.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Mata Pelajaran!", 4000);
            return(false);
        }
        if(form.jenis_nilai.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Jenis Nilai!", 4000);
            return(false);
        }
        if(form.kelas.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Kelas!", 4000);
            return(false);
        }
        if(form.nilai.value == ""){
            Materialize.toast("NIlai Belum Terisi!", 4000);
            form.nilai.focus();
            return(false);
        }
        if(form.semester.value == ""){
            Materialize.toast("Anda Belum Memilih Semester!", 4000);
            return(false);
        }
    }
    else if(jenis == "edit_nilai"){
        if(form.nilai.value == ""){
            Materialize.toast("NIlai Belum Terisi!", 4000);
            form.nilai.focus();
            return(false);
        }
    }
    else if(jenis == "PDF"){
        if(form.id_siswa.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Siswa!", 4000);
            return(false);
        }
        if(form.kode_kelas.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Kelas!", 4000);
            return(false);
        }
        if(form.semester.value == ""){
            Materialize.toast("Anda Belum Memilih Semester!", 4000);
            return(false);
        }
        if(form.header.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Header!", 4000);
            return(false);
        }
        if(form.footer.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Footer!", 4000);
            return(false);
        }
    }
    else if(jenis == "Config"){
        if(form.nama.value == ""){
            Materialize.toast("Nama Konfigurasi Belum Terisi!", 4000);
            form.nama.focus();
            return(false);
        }
        if(form.tipe.value == "Pilih"){
            Materialize.toast("Anda Belum Memilih Tipe Konfigurasi!", 4000);
            return(false);
        }
        if(form.isi.value == ""){
            Materialize.toast("Isi Konfigurasi Belum Terisi!", 4000);
            form.isi.focus();
            return(false);
        }
    }
    else if(jenis == "auth_c"){
        if(form.con_password_lama.value == ""){
            Materialize.toast("Password Lama Belum Terisi!", 4000);
            form.con_password_lama.focus();
            return(false);
        }
        if(form.password.value == ""){
            Materialize.toast("Password Belum Terisi!", 4000);
            form.password.focus();
            return(false);
        }
        if(form.con_password.value == ""){
            Materialize.toast("Konfirmasi Password Belum Terisi!", 4000);
            form.con_password.focus();
            return(false);
        }
        if(form.con_password_lama.value != form.password_lama.value){
            Materialize.toast("Password Lama Salah!", 4000);
            form.con_password_lama.focus();
            return(false);
        }
        if(form.password.value != form.con_password.value){
            Materialize.toast("Password Tidak Sama!", 4000);
            form.con_password.focus();
            return(false);
        }
    }
    else if(jenis == "auth"){
        if(form.nama.value == ""){
            Materialize.toast("Nama Belum Terisi!", 4000);
            form.nama.focus();
            return(false);
        }
        if(form.username.value == ""){
            Materialize.toast("Username Belum Terisi!", 4000);
            form.username.focus();
            return(false);
        }
        if(form.email.value == ""){
            Materialize.toast("E-mail Belum Terisi!", 4000);
            form.email.focus();
            return(false);
        }
        if(form.password.value == ""){
            Materialize.toast("Password Belum Terisi!", 4000);
            form.password.focus();
            return(false);
        }
        if(form.con_password.value == ""){
            Materialize.toast("Konfirmasi Password Belum Terisi!", 4000);
            form.con_password.focus();
            return(false);
        }
        if(form.password.value != form.con_password.value){
            Materialize.toast("Password Tidak Sama!", 4000);
            form.con_password.focus();
            return(false);
        }
    }
    return (true);  
}