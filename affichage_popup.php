<?php
	session_start();
if(isset($_SESSION['is_modif_ok']) and $_SESSION['is_modif_ok'])
{
echo'
<h6 class=" text-center text-white mt-2" id="id_mypopup">La modification s\'est effectuée avec succès </h6>';

}
?>