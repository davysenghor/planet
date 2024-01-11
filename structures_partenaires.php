
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Réservations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css"   href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css"  href="css/style_personnalise_side_bar.css">

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 


    <link rel="icon" href="favicon.ico">	
	
	
	
	
	<!-- 
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
	 -->
	
	
	 <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	
	
	<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->

  
    <script src="popper_min_js.js"></script>
  <script src="jquery_3_6_0.min.js"></script>
  
  <script src="js/bootstrap/bootstrap.min.js"></script>

 <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script src="jquery-tabledit.js"></script>
<script src="./repeater.js" type="text/javascript"></script>

  </head>
  <body>
  
  

<?php
	session_start();
	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================

$interface ='structure';
include('navigation_horizontale_bar.php');

// <!-- debut reservation -->
echo '<div class="container-fluid  ml-2" id ="form_reservation">';

echo '<div id ="message_succes" class="alert alert-success alert-dismissible fade" role="alert">
<strong>Succès! </strong> "La reservation a bien été enregistrée"
  <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
include('form_reserv_avec_repeteur_structure.php');
echo '</div>'; 

echo'<div class="container-fluid">';

//echo '<div id ="message_succes" class="alert alert-success" role="alert"><strong>Liste</strong> Réservations</div>';



//<!-- Page Content  -->
echo'<div class="container-fluid" id="content">';



//<!--fin reservation  -->


//<!-- contenu table  -->
echo'<div class="container-fluid" id="id_table_reservation">';
/*
echo '<div class="row">';
echo '<div class="col-lg-2">
		<button class="btn btn-primary" id="ajouter_ligne" type="submit">Button</button>
	 </div>';
echo'</div>',
*/

include('table_html_structure.php');

echo'</div>';
//<!-- fin div  contenu table -->;

echo'</div>';//<!-- fin div page conteent -->
echo'</div>';//<!-- fin wrapper -->;	
?>			
			

  
   
<script type="text/javascript" language="javascript" >


$(document).ready(function(){

 var bouton_dataTable =  ["colvis","csvHtml5","excelHtml5","pdfHtml5","print"];

// affichage table 
 var dataTable = $('#example_structure').DataTable({
"dom": '<"dt-buttons"Bf>p<"clear">lirstp',
 columnDefs: [
      // { targets: [13], visible: false},
        { targets: '_all', visible: true}
    ],
"buttons": bouton_dataTable,
  "processing" : true,
  "serverSide" : true,
  "colReorder" : true,
  "order" : [],
  "ajax" : {
  url:"fetch_structure.php",
   type:"POST"
  },
 });


/*  fonctions personnelles          */ 
function val_date_defaut()
{
 ladate=new Date();
 	var ladate = ladate.toISOString().substring(0,10)
	var dateControl = $('input[type=date]');
	dateControl.attr('value',ladate);
};


/* lQuery.ajax  - ajax fonction de jquey */	

 /* $.ajax.done  ( fonction done de ajax)*/


function enregistrement_structure() {

	
var msg = "La réservation a bien été faite";
var les_items_parents = $(this).parents('.items');
var inputs = les_items_parents.find('input,select,textarea');
var inputs_saisies = [];

inputs.each(function (index, el) {
	
	inputs_saisies[index] = el.value;
	//alert(inputs_saisies[0]);
})

$.ajax({
  method: "POST",
  url: "enregistrement_structure.php",
  //Donnees envoyees par la methode Post
  
  data: {	NOM_STRUCTURE :inputs_saisies[0],
			EMAIL_STRUCTURE: inputs_saisies[1], 
			TELEPHONE_STRUCTURE: inputs_saisies[2]
			}
}) // fin fonction ajax de jQuery
.done(function( les_prints_de_enreg_reserv ) {
   //alert( " " + les_prints_de_enreg_reserv );
  
   $('#message_succes').addClass('show');
   
   
   $('#example_structure').DataTable().ajax.reload();
  }); // fin méthode done de ajax

}; // fin fonction enregistrement_reservation
 /* Create Repeater */
 $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });

// iniatilisation date  
val_date_defaut();		
/* recuperer le point d'entrer pour déclencher les enregistrement de reservation  */


var save_Button =  $('.items').find('button[data-name=save_button]');
//
	save_Button.on('click',enregistrement_structure);



	
 $('#example_structure').on('draw.dt', function(){
/* 
documentation sur le plugin Tabledit de jquery :

Tabledit is a small jQuery plugin that provides AJAX-enabled in-place editing for your table cells. The plugin has the ability to transform tables cells into input fields or select dropdowns with custom trigger events, to give the visitors a quick way to change cell values ​​directly.

https://www.jqueryscript.net/table/Creating-A-Live-Editable-Table-with-jQuery-Tabledit.html
	 
*/  $('#example_structure').Tabledit({
   url:'action_structure.php',
   dataType:'json',
   
   columns:{
    identifier : [0, 'ID'],
    editable:[[1, 'NOM'],[2, 'EMAIL'],[3, 'TELEPHONE']] // colonnes éditables
   },
   

// class for form inputs

inputClass:'form-control input-sm',

 

// // class for toolbar

toolbarClass:'btn-toolbar',

// class for buttons group

groupClass:'btn-group btn-group-sm',

 

// class for row when ajax request fails

dangerClass:'danger',

 

// class for row when save changes

warningClass:'warning',

 

// class for row when is removed

mutedClass:'text-muted',

 

// trigger to change for edit mode.

// e.g. 'dblclick'

eventType:'click',

 

// change the name of attribute in td element for the row identifier

rowIdentifier:'id',

 

// activate focus on first input of a row when click in save button

autoFocus:true,

 

// hide the column that has the identifier

//hideIdentifier:true,






 // activate edit button instead of spreadsheet style

editButton:true,

 

// activate delete button

deleteButton:true,

 

// activate save button when click on edit button

saveButton:true,

 

// activate restore button to undo delete action

restoreButton:true,

 

// custom action buttons

buttons: {

  edit: {

    class:'btn btn-sm btn-default',

    html:'<i class="fas fa-pencil-alt"></i>',

    action:'edit'

  },

  delete: {

    class:'btn btn-sm btn-default',

    html:'<i class="fas fa-trash-alt"></i>',

    action:'delete'

  },

  save: {

    class:'btn btn-sm btn-success',

    html:'Save'

  },

  restore: {

    class:'btn btn-sm btn-warning',

    html:'Restore',

    action:'restore'

  },

  confirm: {
 class:'btn btn-sm btn-danger',

    html:'Confirm'

  }

},

// executed after draw the structure

onDraw:function() {return; },

 

// executed when the ajax request is completed


 // onSuccess(data, textStatus, jqXHR)


    onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#example_structure').DataTable().ajax.reload();
    }
   },

// executed when occurred an error on ajax request

// onFail(jqXHR, textStatus, errorThrown)

onFail:function() {return; },

 

// executed whenever there is an ajax request

onAlways:function() {return; },

 

// executed before the ajax request

// onAjax(action, serialize)

onAjax:function() {return; },


// affectation valeurs par defaut 

	
	

	


	
	
 }); // fin $('#example').Tabledit
  
  
  
  
 }); // fin on draw 
  




//$(window).on('load', val_date_defaut) 




});


//save_Button.addEventlistener("click",enregistrement_reservation());

</script>

