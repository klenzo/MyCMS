<?php
if( $_CONECT ){
	header('location: /');
}else{	
	if( isset( $_POST['identifiant'] ) && !empty( $_POST['identifiant'] ) && isset( $_POST['password'] ) && !empty( $_POST['password'] ) ){
		$_USER->LoginMe($_POST['identifiant'], $_POST['password']);

		if( $_USER->getInfo('conect') ){
			header('location: /');
		}else{
			$error = $_USER->getInfo('error');
		}
	}
}