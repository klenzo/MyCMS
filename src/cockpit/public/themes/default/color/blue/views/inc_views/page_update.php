<?php

if( isset( $_POST['validate-update'] ) ){


// Title		
	if( isset( $_POST['title'] ) ){
		$title = strip_tags( $_POST['title'] );
	}else{ $title = ''; }

// Content
	if( isset( $_POST['content'] ) ){
		$content = $_POST['content'];
	}else{ $content = ''; }
 
// Statut
	if( isset( $_POST['statut'] ) && in_array($_POST['statut'], [0,1,2]) ){
		$statut = $_POST['statut'];
	}else{ $statut = 2; }
 
// Type
	if( isset( $_POST['type'] ) && in_array($_POST['type'], getTypePage()) ){
		$type = $_POST['type'];
	}else{ $type = getTypePage()[0]; }
 
// Descript
	if( isset( $_POST['descript'] ) ){
		$descript = $_POST['descript'];
	}else{ $descript = ''; }
 
// Keywords
	if( isset( $_POST['keywords'] ) ){
		$keywords = $_POST['keywords'];
	}else{ $keywords = ''; }
 
	$return = $_PAGE->updateWebPage([
			'patitle' => $title,
			'pacontent' => $content,
			'pastatut' => $statut,
			'patype' => $type,
			'padesc' => $descript,
			'pakeys' => $keywords
		], $_SLUG);

	$_SESSION['result'] = $return;

}
	header('location: /pages/edit/'.$_SLUG);