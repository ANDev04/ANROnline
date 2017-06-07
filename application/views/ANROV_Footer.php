<footer class="page-footer">
  <div class="footer-copyright">
    <div class="container">
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
    });
</script>
<script>
	$(window).load(function() {
		$(".se-pre-con").fadeOut(5000);
	});
</script>
</body>
</html>