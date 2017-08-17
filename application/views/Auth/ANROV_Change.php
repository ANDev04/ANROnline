<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Ubah Password</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Ubah Password</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
            <form  onsubmit="return validasi(this, 'auth_c')" action="<?php echo base_url("ANROC_Auth/Ganti"); ?>" method="post">
                <div class="row">
                    <input type="hidden" name="password_lama" value="">
                    <?php 
                        if(empty($email)){
                    ?>
                    <div class="col l2 s3" style="padding-top:20.5px;">Password Lama</div>
                    <div class="col l10 s9">
                        <input type="password" name="con_password_lama" placeholder="Masukan Password">
                    </div>
                    <?php
                        }
                    ?>
                    <div class="col l2 s3" style="padding-top:20.5px;">Password Baru</div>
                    <div class="col l5 s4">
                        <input type="password" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="col l5 s5">
                        <input type="password" name="con_password" placeholder="Masukan Konfirmasi Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 right-align"><button class="btn" type="submit" name="type" value="insert"><i class="material-icons left">input</i>Submit</button></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</main>