 </div> <!-- /container -->
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="vendor\twbs\bootstrap\js\tests\vendor\jquery.min.js"></script>
    <script>
		$(document).ready(function(){
		    $('#submitBtn').click(function() {
		    	console.log($('#img'));
		       /* when the button in the form, display the entered values in the modal */
		       $('#description_modal').text($('#description').val());
		       $('#img_modal').text($('#img').val());
		   });
		    
			$('#submit').click(function(){
			    $('#formfield').submit();
			});
		});
	</script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="vendor\twbs\bootstrap\dist\js\bootstrap.min.js"></script>
  </body>
</html>