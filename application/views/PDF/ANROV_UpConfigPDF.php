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
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src='<?php echo base_url()?>assets/js/tinymce/tinymce.min.js'></script>
    <script type="text/javascript">
        $(document).ready(function() {
            tinymce.init({
                selector: "textarea",
                plugins: [
                    "advlist autolink lists link image charmap print preview anchor",
                    "searchreplace visualblocks code fullscreen",
                    "insertdatetime media table contextmenu paste jbimages"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
                relative_urls: false
            });
        });
    </script>