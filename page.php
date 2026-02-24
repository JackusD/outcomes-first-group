<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package outcomes-first-group
 */

get_header(); ?>

<main id="site-main" 
    class="site-main" 
    tabindex="-1">
    
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="container container--container-padding">
                <?php get_template_part('template-parts/page-nav/template'); ?>
        
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php
get_footer();
