<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <?php include_once("analyticstracking.php") ?>
    <title><?php wp_title(); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


    <div id="wrap" class="">
        <nav>
            <?php wp_nav_menu( array(
					'menu_class' => 'topmenu', //Fügt eine Klasse zum Menü hinzu
					'container_id' => 'navwrap', //Legt ID von dem Container fest, der das komplette Menü umgibt
					)
					); ?>
        </nav>