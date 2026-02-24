<?php
/**
 * The template for displaying archive pages
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
		<header class="page-header">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header>

		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('template-parts/content', get_post_format()); ?>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>
	<?php endif; ?>

	<?php if (!have_posts()) : ?>
		<?php get_template_part('template-parts/content', 'none'); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
