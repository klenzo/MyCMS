<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $_PAGE->getInfo('titlePage'); ?></title>
    <?= get_head(['descPage', 'keyPage', 'generator', 'author'], 1); ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/themes/<?= $_PAGE->getInfo('template') ?>/assets/css/style.css">
</head>
<body>
