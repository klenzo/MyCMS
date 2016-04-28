<?php
	$arr_action = array('add', 'role');

	if( isset( $_GET['action'] ) && in_array($_GET['action'], $arr_action) ){
		$action = strip_tags( str_replace(['"', "'", '--', '#'], '', $_GET['action']) );

		$modifyClass["varPage['action']"] = $action;
	}else{
		$modifyClass["varPage['action']"] = 'see-all';
	}

$_PAGE->modifyClass($modifyClass);
