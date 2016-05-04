<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= ucfirst(constant(getPage('titlePage'))); ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<?= getCSS(); ?>
</head>
<body>

<?php 
	if( $_CONECT ){
?>
<div class="warp <?= getPage('filePage'); ?>">
	<?php include_once 'aside.php'; ?>
	<section class="section col-10 float-left">
		<div class="topSection">
			<span href="" class="fa fa-bars iconTopSection toggleAside"></span>
			<div href="" class="iconTopSection float-right"><i class="fa fa-ellipsis-v"></i>
				<ul class="dropDown-topSection">
					<li><a href="<?= SITE_ROOT; ?>" target="_blank"><i class="fa fa-eye"></i> <?= SEE_SITE; ?></a></li>
					<li><a href="/logout"><i class="fa fa-power-off"></i> <?= LOGOUT; ?></a></li>
				</ul>
			</div>
		</div>
<?php
	}
?>