<?php	
	if( getPage("varPage['action']") == 'add' ){
		require_once 'inc_views/page_add.php';
	}elseif (  getPage("varPage['action']") == 'edit' && $_SLUG ) {
		require_once 'inc_views/page_edit.php';
	}elseif (  getPage("varPage['action']") == 'update' && $_SLUG ) {
		require_once 'inc_views/page_update.php';
	}elseif (  getPage("varPage['action']") == 'delete' && $_SLUG ) {
		require_once 'inc_views/page_delete.php';
	}else {
		require_once 'inc_views/page_see-all.php';
	}