<!DOCTYPE html>
<html>
    <head>
        <title> <?php echo $pageTitle ?> </title>
        <!-- Bootstrap Stylesheet -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/bootstrap-theme.css">
        <link rel="stylesheet" href="CSS/bootstrap-theme.min.css">

        <!-- Custom Stylesheet -->
        <link rel="stylesheet" href="CSS/Navbar.css">
        <link rel="stylesheet" href="CSS/Footer.css">
        <link rel="stylesheet" href="CSS/Event.css">
        <link rel="stylesheet" href="CSS/Jumbotron.css">
    </head>
    <body style="background-color:#e6eff2">
    <?php
        include_once 'Menu.php';
    ?>
    <div class="container" style="background-color:#D0D3D4; border-color:#D0D3D4;">
<?php
include_once 'Jumbotron.php';
?>