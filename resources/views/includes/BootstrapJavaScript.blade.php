 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>

    	

	    // success or errors messages
		  var msgS = '{{Session::get("success")}}';
		  var msgE = '{{Session::get("error")}}';
		  var existerror = '{{\Session::has("error")}}';
		  var existsuccess = '{{\Session::has("success")}}';
		  if(existsuccess){
		    alert(msgS);
		  }else if(existerror)
		  {
		  	alert(msgE)
		  }
		</script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-3.2.1.min.js"></script>