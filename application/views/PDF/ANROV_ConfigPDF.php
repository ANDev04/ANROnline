<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Konfigurasi PDF</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <table class="responsive-table bordered">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                        <th>Pratinjau</th>
                        <th colspan="2">Aksi</th>
                    </tr>

                    <?php foreach($resource as $r){ ?>
                    <tr>
                        <td><?php echo $r->ID_Config ?></td>
                        <td><?php echo $r->Nama ?></td>
                        <td><?php echo $r->Tipe ?></td>
                        <td><button class="btn" type="button" name="preview" data-target="preview" value="<?php echo $r->ID_Config ?>"><i class="material-icons">search</i></button></td>
                        <td><a href="<?php echo base_url("ANROC_PDF/edit/".$r->ID_Config); ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_PDF/delete/".$r->ID_Config); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Konfigurasi?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url()."ANROC_Exel/import/anr_config" ?>"><i class="material-icons right">open_in_browser</i></a>
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