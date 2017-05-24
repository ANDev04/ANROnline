<body>
    <form autocomplete="off" method="post" action="save" enctype="multipart/form-data">
        <input type="hidden" name="table" value="<?php echo $table?>">
        <input type="file" name="file"/>
        <button type="submit" name="type" value="insert">Submit</button>
    </form>