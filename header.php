<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Solstralens-forskola
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var hour = new Date().getHours();
            var header = document.querySelector('.site-header');

            if (hour >= 6 && hour < 12) {
                // Morning: 6 AM to 12 PM
                header.style.background = 'linear-gradient(to top right, #FFDAB9, #87CEEB)';
            } else if (hour >= 12 && hour < 18) {
                // Afternoon: 12 PM to 6 PM
                header.style.background = 'linear-gradient(to bottom, #FFFF99, #87CEEB)';
            } else if (hour >= 18 && hour < 24) {
                // Evening: 6 PM to 12 AM
                header.style.background = 'linear-gradient(to bottom right, #191970, #FFA07A)';
            } else {
                // Night: 12 AM to 6 AM
                header.style.background = 'linear-gradient(to top right, #000000, #191970)';
            }
        });
    </script>


</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'solstralens-forskola'); ?></a>

        <header id="masthead" class="site-header">
            <div id="stickman"></div>
            <div class="site-branding">
                <?php
                // the_custom_logo();

                $solstralens_forskola_description = get_bloginfo('description', 'display');
                if ($solstralens_forskola_description || is_customize_preview()) :
                ?>
                    <p class="site-description"><?php echo $solstralens_forskola_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                                ?></p>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation left-nav">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'solstralens-forskola'); ?></button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'left-menu',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->

            <div id="logo">
                <?php
                the_custom_logo();
                ?>
            </div>

            <nav class="main-navigation right-nav">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'menu-2',
                        'menu_id'        => 'right-menu',
                    )
                );
                ?>
            </nav>
        </header><!-- #masthead -->