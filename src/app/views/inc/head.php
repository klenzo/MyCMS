<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $_PAGE->getInfo('titlePage'); ?></title>
	<?php
		if(!empty( $_PAGE->getInfo('descPage') )){
			echo '<meta name="description" content="'. $_PAGE->getInfo('descPage') .'">';
		}
		if(!empty( $_PAGE->getInfo('keyPage') )){
			echo '<meta name="keywords" content="'. $_PAGE->getInfo('keyPage') .'" />';
		}
	?>
	<meta name="generator" content="<?= $_PAGE->getInfo('nameProject'); ?> (1.0)" />
	<meta name="author" content="K-lenzo" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
