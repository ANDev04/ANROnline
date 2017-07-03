<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Data Kelas</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Kelas</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                 <table class="responsive-table bordered">
                    <tr>
                       <form action="<?php echo base_url("ANROC_Kelas/") ?>" method="get">
                            <th>
                               <div class="input-field">
                                  <input id="search" type="search" name="key" value="<?php echo $this->input->get('key') ?>">
                                  <label class="label-icon" for="search">Cari</label>
                                  <i class="material-icons" onclick="$('#search').val('')">close</i>
                                </div>
                            </th>
                            <th colspan="2">
                                <select name="tingkat_kelas" id="tingkat_kelas">
                                    <option value="">Semua Tingkat</option>
                                    <option value="X">Tingkat X</option>
                                    <option value="XI">Tingkat XI</option>
                                    <option value="XII">Tingkat XII</option>
                                </select>
                                <input type=hidden name="kelas" value="<?php echo $this->input->get('kelas') ?>">
                            </th>
                           <th colspan="2">
                                <select name="tahun_ajaran" id="tahun_ajaran">
                                    <option value="">Semua Angkatan</option>
                                    <?php 
                                    foreach($tahun_ajaran->result() as $TA){
                                    ?>
                                    <option value="<?php echo $TA->Tahun_Masuk."/".$TA->Tahun_Keluar ?>"><?php echo $TA->Tahun_Masuk."/".$TA->Tahun_Keluar ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                               <input type="hidden" name="tahun_ajar" value="<?php echo $this->input->get("tahun_ajar") ?>">
                           </th>
                            <th><button type="submit" class="btn">Cari</button></th>
                        </form>
                    </tr>
                    <tr>
                        <th>Kode Kelas</th>
                        <th>Kelas</th>
                        <th>Kuota</th>
                        <th>Tahun Ajar</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                <?php
                    foreach($resource->result() as $res){
                        $kelas=explode("-",$res->Nama_Kelas);
                        $where=array(
                            'nama_kelas'=>$kelas[0]
                        );
                        $jumlah=$this->ANRO_Model->read("ANR_Kelas",$where)->num_rows();

                ?>
                    <tr>
                        <td><?php echo $res->Kode_Kelas ?></td>
                    <?php if($jumlah==1){ ?>
                        <td><?php echo $res->Tingkat_Kelas."-".$kelas[0] ?></td>
                    <?php }else{ ?>
                        <td><a href="<?php echo base_url("ANROC_Kelas/Kelas/".$res->Kode_Kelas) ?>"><?php echo $res->Tingkat_Kelas."-".$res->Nama_Kelas ?></a></td>
                    <?php } ?>
                        <td><?php echo $res->Kuota ?></td>
                        <td><?php echo $res->Tahun_Masuk."/".$res->Tahun_Keluar ?></td>
                        <td><a href="<?php echo base_url("ANROC_Kelas/edit/".$res->Kode_Kelas) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Kelas/Hapus/".$res->Kode_Kelas) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php 
                    }
                ?>
                    <tr>
                        <td><?php echo $this->pagination->create_links() ?></td>
                    </tr>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_kelas">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Kelas/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
    <?php if(isset($_GET['success'])&&isset($_GET['error'])){ ?>
    counter(1, '<?php echo base_url("ANROC_Kelas")?>');
    <?php } ?>
$('button[type="submit"]').on('click', function(){
    var selected_value = $("#tingkat_kelas").val();
    $("input[name='kelas']").val(selected_value);
    var selected_ajar = $("#tahun_ajaran").val();
    $("input[name='tahun_ajar']").val(selected_ajar);
});
$('select').ready(function(){
    var isi = '<?php echo $this->input->get('kelas')?>';
    if(isi !=""){
        $('select[name="tingkat_kelas"]').val(isi);
    } 
    var ajar = '<?php echo $this->input->get('tahun_ajar') ?>';
    if(ajar !=""){
        $('select[name="tahun_ajaran"]').val(ajar);
    }
});
</script>
