<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package outcomes-first-group
 */

get_header(); ?>

<main id="site-main" 
    class="site-main" 
    tabindex="-1">
    
	<div class="container container-padding">
		<header class="page-header">
			<h1 class="page-title"><?php
				printf(esc_html__('Search Results for: %s', 'outcomes-first-group'), '<span>' . get_search_query() . '</span>');
			?></h1>
		</header>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

		<?php endif; ?>
		
	</div>
</main>

<?php
get_footer();
