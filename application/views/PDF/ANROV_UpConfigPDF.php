<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_PDF")?>">Cetak PDF</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_PDF/config")?>">Konfigurasi PDF</a>
                    <a class="breadcrumb" href="#">Edit Konfigurasi PDF</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Konfigurasi PDF</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'Config')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/save")?>">
                    <input type="hidden" name="id" value="<?php echo $resource['ID_Config'] ?>">
                    <div class="row">
                        <div class="col s2" style="padding-top:30.5px;">Nama Konfigurasi</div>
                        <div class="input-field col s10">
                            <input type="text" name="nama" value="<?php echo $resource['Nama'] ?>"//>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s2" style="padding-top:10.5px;">Tipe Konfigurasi</div>
                        <div class="col s10">
                            <select name="tipe">
                                <option value="Pilih" disabled selected>Pilih Tipe</option>
                                <?php if($resource['Tipe'] == "Header"){?>
                                <option value="Header" selected>Header</option>
                                <option value="Footer">Footer</option>
                                <?php } ?>
                                <?php if($resource['Tipe'] == "Footer"){?>
                                <option value="Header">Header</option>
                                <option value="Footer" selected>Footer</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <td colspan="2"><textarea name="isi" id="wysiwyg"><?php echo $resource['Isi']?></textarea></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col s12 right-align">
                            <button class="btn" type="submit" name="type" value="update"><i class="material-icons left">edit</i>Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
    <script src='<?php echo base_url()?>assets/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            tinymce.init({
                selector: "textarea",
                theme : "modern",
                height : 200,
                plugins: [
                  'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                  'searchreplace wordcount visualblocks visualchars code fullscreen',
                  'insertdatetime media nonbreaking save table contextmenu directionality',
                  'emoticons template paste textcolor colorpicker textpattern imagetools codesample jbimages'
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link jbimages",
                relative_urls: false,
                remove_script_host: false
            });
        });
    </script>