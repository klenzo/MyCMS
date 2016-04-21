<?php

	$_USER = new User();

	if( !$_USER->getInfo('validUser') ){
		$_PAGE->modifyClass(['filePage' => 'login']);
	}