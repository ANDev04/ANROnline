<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="#">Dashboard</a>
                </nav>                   
            </div>
        </div>
            <div class="row z-depth-2">
                <div class="col s12">
                    <blockquote><h3>Dashboard</h3></blockquote>
                    <hr>
                </div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content center-align indigo lighten-3">
                            <h1 class="blue-text"><?php echo $siswa ?></h1>
                            <p>Data Siswa</p>
                        </div>
                        <div class="card-action indigo lighten-2">
                            <a class="white-text" href="<?php echo base_url("ANROC_Siswa") ?>">Lihat Data Siswa</a>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content center-align green lighten-3">
                            <h1 class="green-text"><?php echo $pelajaran ?></h1>
                            <p>Data Pelajaran</p>
                        </div>
                        <div class="card-action green lighten-2">
                            <a class="white-text" href="<?php echo base_url("ANROC_Mapel") ?>">Lihat Data Pelajaran</a>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content center-align orange lighten-3">
                            <h1 class="orange-text"><?php echo $guru ?></h1>
                            <p>Data Guru</p>
                        </div>
                        <div class="card-action orange lighten-2">
                            <a class="white-text" href="<?php echo base_url("ANROC_Guru") ?>">Lihat Data Guru</a>
                        </div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="card">
                        <div class="card-content center-align purple lighten-3">
                            <h1 class="purple-text"><?php echo $kelas ?></h1>
                            <p>Data Kelas</p>
                        </div>
                        <div class="card-action purple lighten-2">
                            <a class="white-text" href="<?php echo base_url("ANROC_Kelas") ?>">Lihat Data Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>