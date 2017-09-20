<?php
/**
 * The template for displaying search
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