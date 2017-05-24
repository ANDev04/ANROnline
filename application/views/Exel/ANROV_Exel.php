<body>
    <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
        <input type="hidden" name="table" value="<?php echo $table?>">
        <input type="file" name="file"/>
        <button type="submit" name="type" value="insert">Submit</button>
    </form>