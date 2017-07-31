<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Register Akun</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Register Akun</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
            <form action="daftar" method="post">
                <div class="row">
                    <div class="col l2 s3" style="padding-top:20.5px;">Nama</div>
                    <div class="col l10 s9">
                        <input type="text" name="nama" placeholder="Masukan Nama Lengkap">
                    </div>
                    <div class="col l2 s3" style="padding-top:25.5px;">Username</div>
                    <div class="input-field col l10 s9">
                        <input type="text" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="col l2 s3" style="padding-top:20.5px;">E-mail</div>
                    <div class="col l10 s9">
                        <input type="email" name="email" placeholder="Masukan E-mail">
                    </div>
                    <div class="col l2 s3" style="padding-top:20.5px;">Password</div>
                    <div class="col l5 s4">
                        <input type="password" name="password" placeholder="Masukan Password">
                    </div>
                    <div class="col l5 s5">
                        <input type="password" placeholder="Masukan Konfirmasi Password">
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
<script>
    $(function(){
        $("#datepicker").datepicker({ dateFormat: 'dd/mm/yy' });
    });
</script>