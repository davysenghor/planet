<?php

//fetch.php

// ================= connexion à la base de données
	include('connexion_base_donnees.php');
try
{	
$column = array("id", "first_name", "last_name", "gender");

$query = "SELECT * FROM tbl_sample ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE first_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR last_name LIKE "%'.$_POST["search"]["value"].'%" 
 OR gender LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connexion_bd->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connexion_bd->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['id'];
 $sub_array[] = $row['first_name'];
 $sub_array[] = $row['last_name'];
 $sub_array[] = $row['gender'];
 $data[] = $sub_array;
}

function count_all_data($connexion_bd)
{
 $query = "SELECT * FROM tbl_sample";
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connexion_bd),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output);
}
catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
