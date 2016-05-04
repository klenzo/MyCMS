<?php	
	if( getPage("varPage['action']") == 'see-all' ){
?>

<span class="supl info"><i class="fa fa-info-circle iconSupl"></i><?= SUPL_USERS; ?></span>

<div class="myTable-warp"><table id="myTable-s6Mii" class="myTable">
  <tr class="titleTable">
    <th class="myTable-031e">Nom - Prénom</th>
    <th class="myTable-baqh">Pseudo</th>
    <th class="myTable-baqh">Adresse mail</th>
    <th class="myTable-baqh">Rang</th>
    <th class="myTable-baqh">Actions</th>
  </tr>
<?php 
	
	$users = $_USER->getUsers();
	if( empty( $users ) ){
		echo '<tr><td colspan="5" id="no_users_info">'. NO_USERS .'</td></tr>';		
	}else{
		$id = 0;
		foreach ($users as $key => $res) {
?>
			<tr class="tr-<?= $id; ?>" title="<?= REGISTERED_THE .' : '. date(getConfig('format_date'), $res->ucreat); ?>">
				<td class="myTable-yw4l"><?= strtoupper( $res->uname ).' '. ucfirst( $res->ufname ); ?></td>
				<td class="myTable-baqh"><?= $res->upseudo; ?></td>
				<td class="myTable-baqh"><?= strtolower( $res->umail ); ?></td>
				<td class="myTable-baqh"><?= ucfirst( constant($res->urang) ); ?></td>
				<td class="myTable-baqh">
					<a href="/users/update/<?= strtolower( $res->upseudo ); ?>" class="fa fa-pencil color-blue iconAction"></a>
					<a href="/users/delete/<?= strtolower( $res->upseudo ); ?>" class="fa fa-trash color-red iconAction"></a>
				</td>
			</tr>
<?php 
			if($id == 1){ $id = 0; }else{ $id = 1; }
		}
	} 
?>
</table></div>
<?php
	}
