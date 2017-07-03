<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan")?>">Data Jurusan</a>
                    <a class="breadcrumb" href="#">Data Program Keahlian</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Program Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="responsive-table bordered">
                    <tr>
                       <form action="<?php echo base_url("ANROC_Jurusan/Program_Keahlian") ?>" method="get">
                            <th colspan="2">
                               <div class="input-field" >
                                  <input id="search" type="search" name="key" value="<?php echo $this->input->get('key') ?>">
                                  <label class="label-icon" for="search">Cari</label>
                                  <i class="material-icons" onclick="$('#search').val('')">close</i>
                                </div>
                            </th>   
                            <th colspan="2"><button type="submit" class="btn">Cari</button></th>
                        </form>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Program Keahlian</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php 
                        $i=1;
                        foreach($resource as $res){ 
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $res->program_keahlian ?></td>
                        <td><a href="<?php echo base_url("ANROC_Program/edit/".$res->id_program_keahlian) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Program/hapus/".$res->id_program_keahlian) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                    <?php $i++;} ?>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_program_keahlian">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Program/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>