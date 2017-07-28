<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_PDF")?>">Cetak PDF</a>
                    <a class="breadcrumb" href="#">Konfigurasi PDF</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Konfigurasi PDF</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="bordered highlight centered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Pratinjau</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $banyak = 0; foreach($resource as $r){ ?>
                        <tr>
                            <td><?php echo $r->ID_Config ?></td>
                            <td><?php echo $r->Nama ?></td>
                            <td><?php echo $r->Tipe ?></td>
                            <td><button class="btn" type="button" name="preview" data-target="preview" value="<?php echo $r->ID_Config ?>"><i class="material-icons">search</i></button></td>
                            <td><a href="<?php echo base_url("ANROC_PDF/edit/".$r->ID_Config); ?>"><i class="material-icons">edit</i></a></td>
                            <td><a href="<?php echo base_url("ANROC_PDF/delete/".$r->ID_Config); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Konfigurasi?')"><i class="material-icons">delete</i></a></td>
                        </tr>
                    <?php $banyak++; } if($banyak==0){echo '<td colspan="9">Tidak Ada Data Untuk ditampilkan</td>';} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_config">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_PDF/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
    <div class="modal" id="preview">
        
    </div>
</main>
<script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
        $('button[name="preview"]').on('click', function(){
				$.ajax({
					type : 'POST', 
					url  : '<?php echo site_url('ANROC_PDF/preview/'); ?>', 
					data : {
						kode : $(this).val()
					},
                    success : function(html){
                       $('#preview').html(html);
					}
				}); 
			});
</script>