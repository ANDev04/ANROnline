<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Import Excel</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3 center">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="<?php echo $table?>">
                    <input type="file" name="file"/>
                    <button class="btn" type="submit" name="type" value="insert">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</main>
