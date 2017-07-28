<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Data Guru</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Guru</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form autocomplete="off" action="<?php echo base_url("ANROC_Guru/") ?>" method="get">
                <div class="row">
                    <div class="col l5 s12">
                        <div class="input-field">
                          <input id="search" type="search" name="key" value="<?php echo $this->input->get('key') ?>">
                          <label class="label-icon" for="search">Cari</label>
                          <i class="material-icons" onclick="$('#search').val('')">close</i>
                        </div>
                    </div>
                    <div class="col l2 s6" style="padding-top:20.5px;">
                        <select name="status" id="status_guru">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="col l3 s6" style="padding-top:20.5px;">
                        <select name="jk" id="jenis_kelamin">
                            <option value="">Semua Jenis Kelamin</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
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
                            <th>NIP/NUPTK</th>
                            <th>Nama Guru</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php $banyak = 0; foreach($resource as $res){ ?>
                    <tr>
                        <td><?php echo $res->NIP."/".$res->NUPTK ?></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Profile/".$res->ID_Guru ?>"><?php echo $res->Nama_Guru ?></a></td>
                        <?php 
                            if($res->Jenis_Kelamin=="L"){
                                $jk="Laki - Laki";
                            }
                            else{
                                $jk="Perempuan";
                            }
                        ?>
                        <td><?php echo $jk?></td>
                        <td><?php echo $res->Status ?></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Edit/".$res->ID_Guru ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url()."ANROC_Guru/Hapus/".$res->ID_Guru ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php $banyak++; } if($banyak==0){echo '<td colspan="9">Tidak Ada Data Untuk ditampilkan</td>';} ?>
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
                    <input type="hidden" name="table" value="anr_guru">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Guru/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
<?php if(isset($_GET['success'])&&isset($_GET['error'])){ ?>
    counter(1, '<?php echo base_url("ANROC_Guru")?>');
<?php } ?>
$('select').ready(function(){
    var status = '<?php echo $this->input->get('status') ?>';
    if(status !=""){
        $('select[name="status"]').val(status);
    }
    var jk = '<?php echo $this->input->get('jk') ?>';
    if(jk != ""){
        $('select[name="jk"]').val(jk);
    }
})
</script>