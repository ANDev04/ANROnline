<script>
    $( document ).ready(function(){
        $('.modal').modal();
        <?php
            if(isset($_GET['success'])&&isset($_GET['error'])){
                $success = $_GET['success'];
                $error = $_GET['error'];
                $ikon = "done_all";
                $hasil1 = "Data Berhasil di Import : ".$success;
                $hasil2 = "Data Gagal di Import : ".$error;
        ?>
        $('#conn').modal('open');
        <?php
            }
            if(isset($_GET['messenger'])){
                $messenger = $_GET['messenger'];
                if($messenger == "1"){
                    $ikon = "error";
                    $hasil1 = "Terjadi Kesalahan Saat Mengupload File.";
                    $hasil2 = "";
                }
                else if($messenger == "2"){
                    $ikon = "error";
                    $hasil1 = "Pada Kelas dan Semester ini, Siswa Belum Memiliki Data Nilai.";
                    $hasil2 = "";
                }
        ?>
        $('#conn').modal('open');
        <?php
            }
        ?>
    });
</script>

    <div id="conn" class="modal" style="width: 500px;">
        <div class="modal-content" style="padding: 0;">
            <h4 class="center-align #0d47a1 blue darken-4 white-text" style="padding: 15px;">Konfirmasi</h4>
            <p class="center-align">
                <div class="row">
                    <div class="col s12 center">
                        <i class="large material-icons"><?php echo $ikon; ?></i>
                    </div>
                </div>
            </p>
            <p class="center-align" style="min-height: 40px; padding: 10px; padding-left: 15px;"><?php echo $hasil1; ?><br><?php echo $hasil2; ?></p>
        </div>
        <div class="modal-footer">
            <a href="javascript:window.history.replaceState(null, null, window.location.pathname);" class="modal-action modal-close waves-effect waves-green btn-flat">Oke</a>
        </div>
    </div>

    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container center">
                © 2017 ANDev04
            </div>
        </div>
    </footer>

<script>
    $('.uploadtr').on('click', function(){
        $('.uploadbtn').trigger('click'); 
    });
    
    $(document).ready(function() {
        $("select").select2();
        $('select').material_select();
        $(".button-collapse").sideNav();
        $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrainWidth: true, // Does not change width of dropdown to that of the activator
          hover: false, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left', // Displays dropdown with edge aligned to the left of button
          stopPropagation: false // Stops event propagation
        }
      );
    });
    
	$(window).load(function() {
		$(".se-pre-con").fadeOut("slow");
	});
</script>
</body>
</html>