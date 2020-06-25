<!-- JavaScript -->
	<script>
		// Loading Page
		var myVar;
		function myFunction() {
		myVar = setTimeout(showPage, 500);
		}
		function showPage() {
		document.getElementById("loader").style.display = "none";
		document.getElementById("myDiv").style.display = "block";
		}
	</script>
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/bootstrap.js"></script>
  </body>
</html>