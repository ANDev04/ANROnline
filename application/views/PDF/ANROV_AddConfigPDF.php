<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Tambah Konfig PDF</h3></blockquote>    
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/save")?>">
                    <table>
                        <tr>
                            <td>Nama Konfigurasi</td>
                            
                            <td><input type="text" name="nama" required/></td>
                        </tr>
                        
                        <tr>
                            <td>Tipe Konfigurasi</td>      
                            <td>
                                <div class="input-field">
                                    <select name="tipe"  style="width:40%">
                                        <option disabled selected>Pilih Tipe</option>
                                        <option value="Header">Header</option>
                                        <option value="Footer">Footer</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea name="isi" id="wysiwyg"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="insert">Submit</button></td>
                        </tr>
                    </table>
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
                width : 1000,
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