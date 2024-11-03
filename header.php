<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
 

</head>
<body <?php body_class(); ?>>
<header>
    <div class="site-title">
        <h1><?php bloginfo('name'); ?></h1>
    </div>
    <nav class="main-navigation">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container' => false,
            'menu_class' => 'nav-menu',
        ));
        ?>
    </nav>
</header>
