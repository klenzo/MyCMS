<span class="supl info"><i class="fa fa-info-circle iconSupl"></i><?= SUPL_PAGES; ?></span>

<div class="myTable-warp"><table id="myTable-s6Mii" class="myTable">
  <tr class="titleTable">
    <th class="myTable-031e">Nom</th>
    <th class="myTable-baqh">Type</th>
    <th class="myTable-baqh">Statut</th>
    <th class="myTable-baqh">Date</th>
    <th class="myTable-baqh">Actions</th>
  </tr>
<?php 
	
	$pages = getWebPage();
	if( empty( $pages ) ){
		echo '<tr><td colspan="5" id="no_users_info">'. NO_PAGES .'</td></tr>';		
	}else{
		$id = 0;
		foreach ($pages as $key => $res) {
?>
			<tr class="tr-<?= $id; ?>" title="<?= $res->paslug; ?>">
				<td class="myTable-yw4l"><?= $res->paname; ?></td>
				<td class="myTable-baqh"><?= $res->patype; ?></td>
				<td class="myTable-baqh color-<?= $res->statColor; ?>"><?= ucfirst( constant($res->pastatut) ); ?></td>
				<td class="myTable-baqh"><?= date(getConfig('format_date'), $res->patime); ?></td>
				<td class="myTable-baqh">
					<a href="/pages/edit/<?= $res->paslug; ?>" class="fa fa-pencil color-blue iconAction"></a>
					<a href="/pages/delete/<?= $res->paslug; ?>" class="fa fa-trash color-red iconAction"></a>
				</td>
			</tr>
<?php 
			if($id == 1){ $id = 0; }else{ $id = 1; }
		}
	} 
?>
</table></div>