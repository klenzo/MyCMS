<?php
	$arr_action = array('see-all', 'add', 'edit', 'delete', 'update');

	if( isset( $_GET['action'] ) && in_array($_GET['action'], $arr_action) ){
		$action = strip_tags( str_replace(['"', "'", '--', '#'], '', $_GET['action']) );

		$modifyClass["varPage['action']"] = $action;
	}else{
		$modifyClass["varPage['action']"] = 'see-all';
	}

$_PAGE->modifyClass($modifyClass);

	if( isset( $_GET['slug'] ) && !empty($_GET['slug']) ){
		$_SLUG = strip_tags( str_replace(['"', "'", '--', '#'], '', $_GET['slug']) );
	}else{
		$_SLUG = false;
	}

