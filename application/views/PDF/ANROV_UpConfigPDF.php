<body>
    <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_PDF/save")?>">
        <input type="hidden" name="id" value="<?php echo $resource['ID_Config'] ?>">
        <table>
            <tr>
                <td>Nama Konfigurasi</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $resource['Nama'] ?>" disabled/></td>
            </tr>
            <tr>
                <td>Tipe Konfigurasi</td>
                <td>:</td>
                <td><input type="text" name="tipe" value="<?php echo $resource['Tipe'] ?>" disabled></td>
            </tr>
            <tr>
                <td>Isi Konfigurasi</td>
                <td>:</td>
                <td><textarea name="isi" id="wysiwyg"><?php echo $resource['Isi'] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="type" value="update">Submit</button></td>
            </tr>
        </table>
    </form>
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