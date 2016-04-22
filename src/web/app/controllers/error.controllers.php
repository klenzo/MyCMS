<?php
	switch ( $_PAGE->errorCode ) {
		default:
			$pageTitle = 'Erreur 404 !';
			$pageDesc = 'Erreur 404, page non trouvé.';
			$pageKey = "";
			$pageH1 = 'Erreur 404 !';
			$pageParag = "La page demandé n'existe pas ou plus.";
			break;
	}


$_PAGE->modifyClass( [
		'titlePage' => $pageTitle,
		'descPage' => $pageDesc,
		'pageH1' => $pageH1,
		'pageParag' => $pageParag
	] );