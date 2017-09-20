<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <section id="primary">
 *
 * @package Tiafeno
 * @subpackage WP-MelExport
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=450, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>

    <style type="text/css">
      header .el-title {
        color: white;
        font-size: 60px;
        font-family: 'Libre Barcode 39 Text', cursive;
      }
      .uk-navbar-nav > li.uk-active > a, .uk-navbar-nav > li > a:hover  {
        border-top: 4px solid #fff;
        -webkit-transition: 0.5s ease-in-out;
        transition: 0.5s ease-in-out;
      }
      .uk-navbar-nav > li > a:hover {
        border-top: 4px solid #a5a2a2;
      }
      .uk-navbar-nav > li > a {
        -webkit-transition: 0.5s ease-in-out;
        transition: 0.5s ease-in-out;
      }
    </style>

  </head>
  <body <?php body_class(); ?>>
    <header class="header-wrapper">

      <header class="header-top-justify">
        <div class="uk-section uk-section-transparent uk-margin-remove uk-padding-remove section-menu" uk-sticky>
          <div class="uk-container uk-container-small uk-padding-remove-left">
            <?php get_template_part( 'template-parts/header/header', 'top' ); ?>
          </div>
        </div>
      </header>

      <header class="header-branding uk-inline">
        <?php get_template_part( 'template-parts/header/header', 'branding' ); ?>
        <?php if (has_nav_menu( 'social' )) : ?>
          <?php
            wp_nav_menu( array(
              'menu_class' => 'uk-margin-auto-left uk-margin-auto-right uk-padding-remove uk-inline',
              'container_class' => '',
              'theme_location' => 'social',
              'container_class' => 'el-social uk-margin-small',
              'walker' => new Social_Walker()
            ) );
          ?>
        <?php endif; ?> <!-- .social-navigation -->
      </header>
    </header>