<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Data Siswa</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <table class="responsive-table bordered">
                    <thead>
                        <tr>
                            <th>NIS/NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <?php
                                $key="";
                                $kelas="";
                                $x="";
                                $xi="";
                                $xii="";
                                if(isset($_GET['key'])){
                                    $key=$_GET['key'];
                                }
                                if(isset($_GET['kelas'])){
                                    $kelas=$_GET['kelas'];
                                    if($kelas=="X"){
                                        $x="selected";
                                    }else if($kelas=="XI"){
                                        $xi=="selected";
                                    }else if($kelas=="XII"){
                                        $xii=="selected";
                                    }
                                }
                               
                            ?>
                            <form action="<?=base_url()?>ANROC_Siswa/cari" method="get">
                                <th><input type="text" value="<?php echo $key ?>" name="key"></th>
                                <input type="text" id="kelas" name="kelas" value=""<?php echo $kelas ?>"">
                                <th>
                                   <select id="kls" onchange="kelas()">
                                       <option value="" selected>Pilih Tingkat Kelas</option>
                                       <option value="X" <?php echo $x?>>X</option>
                                       <option value="XI" <?php echo $xi ?>>XI</option>
                                       <option value="XII" <?php echo $xii ?>>XII</option>
                                    </select>                                   
                                </th>
                                <th><button type="submit">Go</button></th>
                            </form>
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
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Edit/".$res->ID_SISWA ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url()."ANROC_Siswa/Hapus/".$res->ID_SISWA ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                        </tr>
                <?php 
                    }
                ?>
                        <tr>
                            <td colspan="6" class="center-align">Tidak Ada Data</td>
                        </tr>
                    </tbody>
                    <tfooter>
                        <tr><td><?php echo $this->pagination->create_links(); ?></td></tr>
                    </tfooter>
                </table>
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
    function kelas(){
        var selectnya = document.getElementById("kls");
        var kelas=selectnya.options[selectnya.selectedIndex].value;
        document.getElementById("kelas").value=kelas;
    }
    <?php if(isset($_GET['success'])&&isset($_GET['error'])){ ?>
    counter(1, '<?php echo base_url("ANROC_Siswa")?>');
    <?php } ?>
</script>