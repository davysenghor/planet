<?php
	session_start();
if(isset($_SESSION['is_modif_ok']) and $_SESSION['is_modif_ok'])
{
echo'
<span class="" id="id_mypopup">L\'enregistrement s\'est effectué avec succès </span>';

}
?>