<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package outcomes-first-group
 */
$analytical_javascript = get_field('analytical_javascript', 'analytics');

?>

<footer class="site-footer">

</footer>

<div class="site-footer-bottom-spacer"></div>

<script>
	function analyticalScripts() {
		<?php echo $analytical_javascript; ?>
	}
</script>

<?php wp_footer(); ?>

</body>
</html>
