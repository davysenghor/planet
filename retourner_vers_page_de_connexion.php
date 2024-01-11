	<?php
	if(!isset($_SESSION['pseudo']))
	{
		
		$delai=0;
		$url_modif = 'index.php';
 
		header("Refresh:$delai; url=$url_modif");
		exit();
	}
	?>