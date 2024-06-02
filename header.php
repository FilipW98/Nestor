<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('-'); ?></title>
    <meta name="description" content="<?php bloginfo('description');?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#7A0825">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <?php get_template_part('/template-parts/components/header-desktop') ?>
        <?php get_template_part('/template-parts/components/header-mobile') ?>
    </header>