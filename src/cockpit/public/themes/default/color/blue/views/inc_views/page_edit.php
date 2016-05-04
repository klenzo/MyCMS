<?php $myPage = getWebPage($_SLUG); ?>
<span class="supl info"><i class="fa fa-info-circle iconSupl"></i><?= SUPL_PAGES_EDIT .' <a href="'. SITE_ROOT .'/'. $myPage->paslug .'" target="_blank" class="link_supl">'. $myPage->paname .'</a>'; ?></span>

<?php 
	if(isset($_NOTIF)){
		if($_NOTIF){ $msg_notif = MODIF_SUCCESS; $type_notif = 'success'; }else{ $msg_notif = MODIF_ERROR; $type_notif = 'error'; }
		echo '<p class="notif notif-'. $type_notif .'">'. $msg_notif .'</p>';
	}
		// echo '<p class="notif notif-success">'. MODIF_ERROR .'</p>';
?>

<form action="/pages/update/<?= $myPage->paslug; ?>" class="form-ajax" method="POST">
	<div class="bloc-inPage col-8 sm-12">
		<div class="left-inPage">
			<div class="group-txt">
				<input type="text" name="title" id="titlePage" value="<?= $myPage->patitle; ?>" placeholder="<?= PAGE_EDIT_TITLE; ?>">
			</div>
			<div class="group-txt">
				<textarea name="content" class="myTinyMCE" id="contentPage"><?= $myPage->pacontent; ?></textarea>
			</div>
		</div>
	</div>
	<div class="bloc-inPage col-4 sm-12">
		<div class="right-inPage">
			<div class="group-form group-txt">
				<textarea name="descript" id="descriptPage" placeholder="<?= PAGE_EDIT_DESCRIPT; ?>" class="col-12"><?= $myPage->padesc; ?></textarea>
			</div>
			<div class="group-form group-txt">
				<textarea name="keywords" id="keywordsPage" placeholder="<?= PAGE_EDIT_KEYWORDS; ?>" class="col-12"><?= $myPage->pakeys; ?></textarea>
			</div>
			
	<span class="separator"></span>
			
			<div class="group-form group-select">
				<label for="selectPage" class="col-3 float-left"><?= ucfirst( TXT_STATUT ); ?></label>
				<select name="statut" id="selectStatutPage" class="col-9 float-left">
					<option value="1" <?php if( $myPage->pastatut == 'STATUT_ACTIF' ){ echo "selected"; } ?>><?= ucfirst( STATUT_ACTIF ); ?></option>
					<option value="0" <?php if( $myPage->pastatut == 'STATUT_INACTIF' ){ echo "selected"; } ?>><?= ucfirst( STATUT_INACTIF ); ?></option>
					<option value="2" <?php if( $myPage->pastatut == 'STATUT_DRAFT' ){ echo "selected"; } ?>><?= ucfirst( STATUT_DRAFT ); ?></option>
				</select>	
			</div>
			<div class="group-form group-select">
				<label for="selectPage" class="col-3 float-left"><?= ucfirst( TXT_TYPE ); ?></label>
				<select name="type" class="selectTypePage col-9 float-left">
				<?php
					$types = getTypePage();
					$result = '';
					foreach ($types as $key => $value) {
						if( $myPage->patype == $value ){ $selected = 'selected'; }else{ $selected = ''; }
						$result .= '<option value="'.$value.'" '. $selected .'>'. $value .'</option>';
					}
					echo $result;
				?>
				</select>
			</div>

			<button type="submit" class="btn btn-danger btn-validate"><?= BTN_UPDATE; ?></button>
		</div>
	</div>
</form>