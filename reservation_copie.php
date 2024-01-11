<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contacts Interprétes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css"   href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css"  href="css/style_personnalise_side_bar.css">
	
  <link rel="stylesheet" type="text/css"   href=" https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">
	
	<!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">	-->
	 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->
  
    <link rel="icon" href="favicon.ico">	
	
	 <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	

  </head>
  <body>
  
  

<?php
	session_start();
	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================


echo '<div class="wrapper">';
include('navigation_side_bar.php');

//<!-- Page Content  -->
echo'<div id="content">';
include('navigation_horizontale_bar.php');

//<!-- contenu table  -->
echo'<div id="id_table_reservation">';
include('exple_html_datatable.php');
echo'</div>'; // <!-- fin div  contenu table -->;

echo'</div>';//<!-- fin div page conteent -->
echo'</div>';//<!-- fin wrapper -->;	
?>			
			
<?php
//$lignes_resultats->closeCursor(); // Termine le traitement de la requête
?>


 <!-- jQuery CDN - (=without AJAX) -->
   
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	


 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
 <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

<script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<!-- <script type="text/javascript" src="DataTables/datatables.js"></script> -->

	<!--  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>  -->
	
	<script type="text/javascript">
    $(document).ready(function () {
		 var selected = [];
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title = "Réservation interprétariat";
	// DataTable initialisation
	$("#example").DataTable({
		"processing": true,
        "serverSide": true,
		 "columnDefs": [{
                            // The `data` parameter refers to the data for the cell (defined by the
                            // `data` option, which defaults to the column being worked with, in
                            // this case `data: 0`.
                            "render": function (data, type, row) {
                                return '<a href="comments.php?id=' + row[0] + '">' + row[1] + '</a>';
                            },
                            "targets": 1
                        },
                        {"visible": false, "targets": [0]}
                    ],
        "ajax": {
            "url": "recup_donnees_clients.php",
            "type": "POST"
				},
				   "columns":
		 [
            { "data": "Nom" },
            { "data": "Prenom" },
            { "data": "Langues_parlees" },
            { "data": "Numero" },
            { "data": "date_de_modif" }
		]  /*,*/
				
		/* "rowCallback": function( row, data ) {
            if ( $.inArray(data.DT_RowId, selected) !== -1 ) {
                $(row).addClass('selected');
            }
        },
		*/
	
/*	"dom": '<"dt-buttons"Bf><"clear">lirtp',
		columnDefs: [{ orderable: false, targets: 5 }],
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		]
		*/
       
	});
	
	

/*

//selection de lignes
$('#example tbody').on('click', 'tr', function () {
        var id = this.id;
        var index = $.inArray(id, selected);
 
        if ( index === -1 ) {
            selected.push( id );
        } else {
            selected.splice( index, 1 );
        }
 
        $(this).toggleClass('selected');
    } );


	//Add row button
	$(".dt-add").each(function () {
		$(this).on("click", function (evt) {
			//Create some data and insert it
			var rowData = [];
			var table = $("#example").DataTable();
			//Store next row number in array
			var info = table.page.info();
			rowData.push(info.recordsTotal + 1);
			//Some description
			rowData.push("New Order");
			//Random date
			var date1 = new Date(2016, 01, 01);
			var date2 = new Date(2018, 12, 31);
			var rndDate = new Date(+date1 + Math.random() * (date2 - date1)); //.toLocaleDateString();
			rowData.push(
				rndDate.getFullYear() +
					"/" +
					(rndDate.getMonth() + 1) +
					"/" +
					rndDate.getDate()
			);
			//Status column
			rowData.push("NEW");
			//Amount column
			rowData.push(Math.floor(Math.random() * 2000) + 1);
			//Inserting the buttons ???
			rowData.push(
				'<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button type="button" class="btn btn-danger btn-xs dt-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>'
			);
			//Looping over columns is possible
			//var colCount = table.columns()[0].length;
			//for(var i=0; i < colCount; i++){			}

			//INSERT THE ROW
			table.row.add(rowData).draw(false);
			//REMOVE EDIT AND DELETE EVENTS FROM ALL BUTTONS
			$(".dt-edit").off("click");
			$(".dt-delete").off("click");
			//CREATE NEW CLICK EVENTS
			$(".dt-edit").each(function () {
				$(this).on("click", function (evt) {
					$this = $(this);
					var dtRow = $this.parents("tr");
					$("div.modal-body").innerHTML = "";
					$("div.modal-body").append("Row index: " + dtRow[0].rowIndex + "<br/>");
					$("div.modal-body").append(
						"Number of columns: " + dtRow[0].cells.length + "<br/>"
					);
					for (var i = 0; i < dtRow[0].cells.length; i++) {
						$("div.modal-body").append(
							"Cell (column, row) " +
								dtRow[0].cells[i]._DT_CellIndex.column +
								", " +
								dtRow[0].cells[i]._DT_CellIndex.row +
								" => innerHTML : " +
								dtRow[0].cells[i].innerHTML +
								"<br/>"
						);
					}
					$("#myModal").modal("show");
				});
			});
			$(".dt-delete").each(function () {
				$(this).on("click", function (evt) {
					$this = $(this);
					var dtRow = $this.parents("tr");
					if (confirm("Are you sure to delete this row?")) {
						var table = $("#example").DataTable();
						table
							.row(dtRow[0].rowIndex - 1)
							.remove()
							.draw(false);
					}
				});
			});
		});
	});
	//Edit row buttons
	$(".dt-edit").each(function () {
		$(this).on("click", function (evt) {
			$this = $(this);
			var dtRow = $this.parents("tr");
			$("div.modal-body").innerHTML = "";
			$("div.modal-body").append("Row index: " + dtRow[0].rowIndex + "<br/>");
			$("div.modal-body").append(
				"Number of columns: " + dtRow[0].cells.length + "<br/>"
			);
			for (var i = 0; i < dtRow[0].cells.length; i++) {
				$("div.modal-body").append(
					"Cell (column, row) " +
						dtRow[0].cells[i]._DT_CellIndex.column +
						", " +
						dtRow[0].cells[i]._DT_CellIndex.row +
						" => innerHTML : " +
						dtRow[0].cells[i].innerHTML +
						"<br/>"
				);
			}
			$("#myModal").modal("show");
		});
	});
	//Delete buttons
	$(".dt-delete").each(function () {
		$(this).on("click", function (evt) {
			$this = $(this);
			var dtRow = $this.parents("tr");
			if (confirm("Are you sure to delete this row?")) {
				var table = $("#example").DataTable();
				table
					.row(dtRow[0].rowIndex - 1)
					.remove()
					.draw(false);
			}
		});
	});
	$("#myModal").on("hidden.bs.modal", function (evt) {
		$(".modal .modal-body").empty();
	});
	
	*/
});

	
	
	
	
	/*
 * TO DEBUG DATA TABLES USE THIS FUNCTION BELLOW
 */
/*
           (function () {
           var url = '//debug.datatables.net/bookmarklet/DT_Debug.js';
           if (typeof DT_Debug != 'undefined') {
             if (DT_Debug.instance !== null) {
                   DT_Debug.close();
               } else {
               new DT_Debug();
               }
           } else {
               var n = document.createElement('script');
               n.setAttribute('language', 'JavaScript');
               n.setAttribute('src', url + '?rand=' + new Date().getTime());
               document.body.appendChild(n);
               }
           }
           )(); 
		   */

    </script>
	
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
<!--	<script src="jvscript_exple_datable.js"></script> -->
  </body>
</html>
