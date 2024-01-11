<?php
$donnees_en_reponse = $_GET["donnees"];

include('formulaire_reservation.php');


print_r($donnees_en_reponse);
/*
$json_data= array
("data" => $donnees_en_reponse);
echo json_encode($json_data); // données retournées par le server apres la requete ajax
*/
?>