<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Data Akun</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Akun</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <table class="bordered highlight centered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php $banyak = 0; foreach($resource as $res){ ?>
                    <tr>
                        <td><?php echo $res->nama ?></td>
                        <td><?php echo $res->username ?></td>
                        <td><?php echo $res->email ?></td>
                        <td><a href="<?php echo base_url()."ANROC_Auth/Hapus/".$res->id_auth ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                <?php $banyak++; } if($banyak==0){echo '<td colspan="9">Tidak Ada Data Untuk ditampilkan</td>';} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Auth/register") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>