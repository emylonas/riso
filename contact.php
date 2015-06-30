<?php
session_start();
$_SESSION['colid'] = 38;
include('dependencies/functions.php');
getHeader('','Contact Us');
?>
		<div class="container">
		 <div class="row">
			<div class="span8 offset2">
				<h1>Contact Us</h1>
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="span4 offset2">
				<p><a href="http://www.brown.edu/Departments/Italian_Studies/" target="_blank">Brown University Italian Studies Department</a></p>
				<a href="http://library.brown.edu/cds/" target="_blank"><p>Brown University Center for Digital Scholarship</p><br><br><br><img style="padding-left:25%;" src="img/cds-logo-100X110.png"><br>
					</a>
					
			</div>
			<div class="span4">
				<p class="lead">Box A<br>Brown University Library
				Providence, RI 02912<br>
				<abbr>P</abbr>: (401) 863-2817<br><br>
				<a href="mailto:cds_info@brown.edu">cds_info@brown.edu</a></p>
			</div>		
		</div>
		<br><br>
		</div>
		<?footer()?>
	</body>
</html>