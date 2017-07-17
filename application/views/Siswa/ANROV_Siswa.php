<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Data Siswa</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Siswa</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form autocomplete="off" action="<?php echo base_url("ANROC_Siswa/") ?>" method="get">
                <div class="row">
                    <div class="col l3 s12">
                        <div class="input-field">
                            <input id="search" type="search" name="key" value="<?php echo $this->input->get('key') ?>">
                            <label class="label-icon" for="search">Cari</label>
                            <i class="material-icons" onclick="$('#search').val('')">close</i>
                        </div>
                    </div>
                    <div class="col l2 s4" style="padding-top:20.5px;">
                        <select name="status_siswa" id="status_siswa">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <input type="hidden" name="status" value="<?php echo $this->input->get('status') ?>">
                    </div>
                    <div class="col l3 s4" style="padding-top:20.5px;">
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">Semua Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        <input type="hidden" name="jk" value="<?php echo $this->input->get('jk') ?>">
                    </div>
                    <div class="col l2 s4" style="padding-top:20.5px;">
                        <select name="tingkat_kelas" id="tingkat_kelas">
                            <option value="">Semua Tingkat</option>
                            <option value="X">Tingkat X</option>
                            <option value="XI">Tingkat XI</option>
                            <option value="XII">Tingkat XII</option>
                        </select>
                        <input type=hidden name="kelas" value="<?php echo $this->input->get('kelas') ?>">
                    </div>
                    <div class="col l2 s12" style="padding-top:25px;">
                        <button type="submit" class="btn" style=" width:100%;">Cari</button>
                    </div>
                </div>
                </form>
                <hr>
            </div>
            <div class="col s12">
                <table class="responsive-table bordered highlight centered">
                    <thead>
                        <tr>
                            <th>NIS/NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach($resource as $res){
                ?>
                        <tr>
                            <td><?php echo $res->NIS."/".$res->NISN ?></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Profile/".$res->ID_SISWA ?>"><?php echo $res->Nama_Siswa ?></a></td>
                            <?php 
                                if($res->Jenis_Kelamin=="L"){
                                    $jk="Laki - Laki";
                                }
                                else{
                                    $jk="Perempuan";
                                }
                            ?>
                            <td><?php echo $jk?></td>
                            <td><?php echo $res->Kelas ?></td>
                            <td><?php echo $res->Status ?></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Edit/".$res->ID_SISWA ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Hapus/".$res->ID_SISWA ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                        </tr>
                <?php
                    }
                ?>
                    </tbody>
                </table>
                <div class="col s12 center">
                    <?php echo $this->pagination->create_links() ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_siswa">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Siswa/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>

<script>
$('button[type="submit"]').on('click', function(){
    var selected_value = $("#tingkat_kelas").val();
    $("input[name='kelas']").val(selected_value);
    var selected_status = $("#status_siswa").val();
    $("input[name='status']").val(selected_status);
    var selected_jk = $("#jenis_kelamin").val();
    $("input[name='jk']").val(selected_jk);
});
$('select').ready(function(){
    var isi = '<?php echo $this->input->get('kelas')?>';
    if(isi !=""){
        $('select[name="tingkat_kelas"]').val(isi);
    } 
    var status = '<?php echo $this->input->get('status') ?>';
    if(status !=""){
        $('select[name="status_siswa"]').val(status);
    }
    var jk = '<?php echo $this->input->get('jk') ?>';
    if(jk != ""){
        $('select[name="jenis_kelamin"]').val(jk);
    }
})

</script>