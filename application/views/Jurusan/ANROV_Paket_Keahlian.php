<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan")?>">Data Jurusan</a>
                    <a class="breadcrumb" href="#">Data Paket Keahlian</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Paket Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form autocomplete="off" action="<?php echo base_url("ANROC_Jurusan/Paket_Keahlian") ?>" method="get">
                <div class="row">
                    <div class="col l6 s12">
                        <div class="input-field">
                            <input id="search" type="search" name="key" value="<?php echo $this->input->get('key') ?>">
                            <label class="label-icon" for="search">Cari</label>
                            <i class="material-icons" onclick="$('#search').val('')">close</i>
                        </div>
                    </div>
                    <div class="col l4 s12" style="padding-top:20.5px;">
                        <select name="program_keahlian" id="program_keahlian">
                            <option value="">Semua Program Keahlian</option>
                            <?php foreach($jurusan as $program){ ?>
                                <option value="<?php echo $program->id_program_keahlian ?>"><?php echo $program->program_keahlian ?></option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="program" value="<?php echo $this->input->get('status') ?>">
                    </div>
                    <div class="col l2 s12" style="padding-top:25px;">
                        <button type="submit" class="btn" style=" width:100%;">Cari</button>
                    </div>
                </div>
                </form>
                <hr>
            </div>
            <div class="col s12">
                <table class="bordered highlight centered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Program Keahlian</th>
                            <th>Paket Keahlian</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i=1;
                        foreach($resource as $res){ 
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $res->program_keahlian ?></td>
                            <td><?php echo $res->paket_keahlian ?></td>
                            <td><a href="<?php echo base_url("ANROC_Paket/edit/".$res->id_paket_keahlian) ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url("ANROC_Paket/hapus/".$res->id_paket_keahlian) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                        </tr>
                    <?php $i++;} if($i==1){echo '<td colspan="9">Tidak Ada Data Untuk ditampilkan</td>';} ?>
                    </tbody>
                </table>
                </div>
            </div>
         <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_paket_keahlian">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Paket/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
$('button[type="submit"]').on('click', function(){
    var selected_status = $("#program_keahlian").val();
    $("input[name='program']").val(selected_status);
});
$('select').ready(function(){
    var isi = '<?php echo $this->input->get('program')?>';
    if(isi !=""){
        $('select[name="program_keahlian"]').val(isi);
    }
})
</script>