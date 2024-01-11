<?php 


// ======================en tete tableau de missions de l'interprete; id="tb_missions_interprete"
$column_to_display = array(
"0"=>"ID",
"1"=>"Date_Mission",
"2"=>"Date_enregistrement",
"3"=>"Debut",
"4"=>"Fin",
"5"=> "Structure_Demandeur",
"6"=> "Personne_Demandeur",
"7"=>"Langues", 
"8"=>"Interprete",
"9"=>"Type_prestation",
"10"=>"Statut_avancement",
"11"=>"Duree_Heure",
"12"=>"Duree_Minute",
"13"=> "Num_Devis"
);
?>


<div class=""><h6>Barre d'outils table de réservation</h6></div>

<table id="tb_missions_interprete" class="display" style="width:100%">
        <thead>
            <tr>
			
			<?php
			foreach ($column_to_display as $key=>$value)  // value sont les valeurs, et key les index 0,1,2 qui pourrait etre aussi des strings
			{
			echo '<th>';
			echo $column_to_display[$key];
			echo '</th>';
			}
              ?>
			  
            </tr>
        </thead>
       
    </table>


<!-- <a class="btn btn-success" style="float:left;margin-right:20px;" href="https://codepen.io/collection/XKgNLN/" target="_blank">Other examples on Codepen</a> -->
<!-- 
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th style="text-align:center;width:100px;">Add row 
			<button type="button" data-func="dt-add" class="btn btn-success btn-xs dt-add">
					<i class="fa fa-plus" aria-hidden="true"></i>
			</button>
			</th>
			<th>Order</th>
			<th>Description</th>
			<th>Deadline</th>
			<th>Status</th>
			<th>Amount</th>
			
		</tr>
	</thead>
	<tbody>
		<tr>
	<td>
	
	<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
	 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                                          
				
			</td>
			<td>1</td>
			<td>Alphabet puzzle</td>
			<td>2016/01/15</td>
			<td>Done</td>
			<td>1000</td>
			
		</tr>
		<tr>
		
	<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>2</td>
			<td>Layout for poster</td>
			<td>2016/01/31</td>
			<td>Planned</td>
			<td>1834</td>
			
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>3</td>
			<td>Image creation</td>
			<td>2016/01/23</td>
			<td>To Do</td>
			<td>1500</td>
			
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>4</td>
			<td>Create font</td>
			<td>2016/02/26</td>
			<td>Done</td>
			<td>1200</td>
			
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
		
		
			<td>5</td>
			<td>Sticker production</td>
			<td>2016/02/18</td>
			<td>Planned</td>
			<td>2100</td>
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>6</td>
			<td>Glossy poster</td>
			<td>2016/03/17</td>
			<td>To Do</td>
			<td>899</td>
			
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>7</td>
			<td>Beer label</td>
			<td>2016/05/28</td>
			<td>Confirmed</td>
			<td>2499</td>
			
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>8</td>
			<td>Shop sign</td>
			<td>2016/04/19</td>
			<td>Offer</td>
			<td>1099</td>
			
		</tr>
		<tr>
		<td>
				<button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button>
			 <button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
			</td>
			<td>9</td>
			<td>X-Mas decoration</td>
			<td>2016/10/31</td>
			<td>Confirmed</td>
			<td>1750</td>
			
		</tr>
		
		
		
	</tbody>
</table>
-->

<!-- Modal -->
<!-- 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Row information</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

-->

