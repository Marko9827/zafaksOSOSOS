<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="E-student, platforma za studente">
    <meta name="author" content="Marko Nikolić">
    <link rel="icon" href="<?php echo URL; ?>/assets/img/logo.svg">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>/assets/css/import.css" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />



    <?php
    if (loged()) {

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    ?>
        <meta name="robots" content="noindex, nofollow">
        <meta name="googlebot" content="noindex">
        <link href="<?php echo URL; ?>/assets/css/loged.css" rel="stylesheet">
    <?php } ?>
</head>