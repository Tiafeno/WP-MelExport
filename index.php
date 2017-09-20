<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Tiafeno
 * @subpackage WP-MelExport
 * @since 1.0
 * @version 1.0
 */
 get_header(); ?>
 
 <section id="primary" class="uk-section uk-section-large uk-padding-small">
    <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/page/content', 'small' );
    endwhile; // End of the loop.
    ?>
 </section><!-- #primary -->
 
 <?php get_footer();
 