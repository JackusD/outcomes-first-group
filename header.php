<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the head and main site header sections
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package outcomes-first-group
 */
?>

<?php
$head_html = get_field('head_html', 'analytics');

$logo = get_theme_mod('custom_logo');

$cookies_text = get_field('cookies_text', 'cookies_notice');
$cookies_preferences_text = get_field('cookies_preferences_text', 'cookies_notice');
 
$cookies_page = get_field('cookies_page', 'page_endpoints');

$disable_cookies_notice = get_field('disable_cookies_notice', get_the_ID());
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<!-- Default favicons (fallback) -->
	<link rel="icon" type="image/x-icon" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light.ico">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light-16x16.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light-96x96.png">
	
	<!-- Light mode favicons -->
	<link rel="icon" type="image/x-icon" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light.ico" media="(prefers-color-scheme: light)">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light-16x16.png" media="(prefers-color-scheme: light)">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light-32x32.png" media="(prefers-color-scheme: light)">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-light-96x96.png" media="(prefers-color-scheme: light)">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/apple-touch-icon-light.png" media="(prefers-color-scheme: light)">
	
	<!-- Dark mode favicons -->
	<link rel="icon" type="image/x-icon" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-dark.ico" media="(prefers-color-scheme: dark)">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-dark-16x16.png" media="(prefers-color-scheme: dark)">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-dark-32x32.png" media="(prefers-color-scheme: dark)">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-dark-96x96.png" media="(prefers-color-scheme: dark)">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/apple-touch-icon-dark.png" media="(prefers-color-scheme: dark)">
	
	<!-- SVG favicons with embedded CSS -->
	<link rel="icon" type="image/svg+xml" href="<?php echo OUTCOMES_FIRST_GROUP_FAVICONS_DIR_URI; ?>/favicon-adaptive.svg">

	<?php echo $head_html; ?>
</head>

<?php
$contact_page = get_field('contact_page', 'page_endpoints');

$body_classes = [];
if (!isset($_COOKIE['cookies-necessary']) || !$_COOKIE['cookies-necessary']) array_push($body_classes, 'cookies-notice-visible');
?>

<body <?php body_class($body_classes); ?>>

<a class="skip-link screen-reader-text" href="#site-main"><?php esc_html_e('Skip to content', 'outcomes-first-group'); ?></a>

<?php if (!$disable_cookies_notice) : ?>
	<div class="cookies-notice cookies-notice--hide fixed-el">
		<div class="cookies-notice__inner background-color-white">
			<div class="cookies-notice__content container container--lg container--container-padding">
				<div class="cookies-notice__column-container column-container column-container--align-end">
					<div class="column">
						<?php echo $cookies_text; ?>
					</div>

					<div class="cookies-notice__btns column">
						<?php
						get_template_part('template-parts/button/template', null, [
							'background_classes' => 'background-orange',
							'type'               => 'button',
							'label'              => __('Accept', 'outcomes-first-group'),
							'attrs'   => [
								'class' => 'cookies-notice__accept-all-btn',
							],
						]);
						?>

						<?php
						get_template_part('template-parts/button/template', null, [
							'type'    => 'button',
							'label'   => __('Reject', 'outcomes-first-group'),
							'attrs'   => [
								'class' => 'cookies-notice__reject-all-btn button--outline',
							],
						]);
						?>

						<?php
						get_template_part('template-parts/button/template', null, [
							'type'    => 'button',
							'label'   => __('Manage', 'outcomes-first-group'),
							'attrs'   => [
								'class'             => 'modal-open button--outline',
								'data-modal-target' => 'cookies-notice-options',
								'aria-controls'     => 'cookies-notice-options',
								'aria-expanded'     => 'false',
							]
						]);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="cookies-notice-options"
		class="cookies-notice-options modal"
		role="dialog"
		aria-modal="true">

		<button class="modal__close-bg-btn modal-close"
			type="button"
			data-modal-target="cookies-notice-options"
			aria-controls="cookies-notice-options"
			aria-expanded="false">

			<?php _e('Close', 'outcomes-first-group'); ?>
		</button>

		<div class="cookies-notice-options__inner modal__inner">
			<button class="modal__close-bg-btn modal-close"
				type="button"
				data-modal-target="cookies-notice-options"
				aria-controls="cookies-notice-options"
				aria-expanded="false">

				<?php _e('Close', 'outcomes-first-group'); ?>
			</button>

			<div class="cookies-notice-options__content modal__content background-color-white">
				<button class="cookies-notice-options__close-btn modal__close-btn modal-close"
					type="button"
					data-modal-target="cookies-notice-options"
					aria-controls="cookies-notice-options"
					aria-expanded="false">

					<div class="screen-reader-text">
						<?php _e('Close', 'outcomes-first-group'); ?>
					</div>
				</button>
				
				<form class="cookies-notice__form">
					<?php echo $cookies_preferences_text; ?>

					<div class="toggle-wrap">
						<div>
							<label class="toggle">
								<?php _e('Strictly necessary cookies', 'outcomes-first-group'); ?>

								<input type="checkbox"
									name="necessary-cookies"
									disabled=""
									checked>

								<div></div>
								<div></div>
							</label>
						</div>

						<div>
							<h3 class="font-size-16">
								<?php _e('Strictly necessary cookies', 'outcomes-first-group'); ?>
							</h3>
							
							<div>
								<p><?php _e('These cookies are essential to the operation of this website and help provide basic functionality such as navigation and language support.', 'outcomes-first-group'); ?></p>
							</div>
						</div>
					</div>

					<div class="toggle-wrap">
						<div>
							<label class="toggle">
								<?php _e('Analytical cookies', 'outcomes-first-group'); ?>

								<input type="checkbox"
									name="analytical-cookies"
									<?php if (isset($_COOKIE['cookies-analytical']) && $_COOKIE['cookies-analytical']) echo 'checked'; ?>>

								<div></div>
								<div></div>
							</label>
						</div>
						
						<div>
							<h3 class="font-size-16">
								<?php _e('Analytical cookies', 'outcomes-first-group'); ?>
							</h3>

							<div>
								<p><?php _e('These cookies help us improve the performance of this website by giving us anonymised information about how you interact with it.', 'outcomes-first-group'); ?></p>
							</div>
						</div>
					</div>

					<?php
					get_template_part('template-parts/btn/template', null, [
						'type'  => 'submit',
						'label' => __('Save preferences', 'outcomes-first-group'),
					]);
					?>
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>

<header class="site-header">
	<div class="site-header__inner container--container-padding">
		<div class="column-container column-container--align-center column-container--justify-space-between">
			<div class="site-header__logo column">
				
			</div>

			<?php if (has_nav_menu('site-menu')) : ?>
				<div class="site-header__menu-btn-column column">
					<nav class="site-header__menu">
						<?php
						wp_nav_menu([
							'container'       => 'div',
							'container_id'    => 'site-menu-menu',
							'container_class' => 'site-menu-menu',
							'menu_class'      => 'site-menu-menu__inner site-menu',
							'theme_location'  => 'site-menu',
							'walker'          => new Main_Menu_Walker(),
						]);
						?>

						<?php if ($contact_page) : ?>
							<div class="site-menu__contact-btn">
								<?php
								get_template_part('template-parts/button/template', null, [
									'url'    => get_the_permalink($contact_page),
									'label'  => __('Contact', 'outcomes-first-group'),
								]);
								?>
							</div>
						<?php endif; ?>
					</nav>

					<button class="site-header__menu-btn modal-open modal-close"
						aria-controls="site-menu-modal"
						aria-expanded="false"
						data-modal-target="site-menu-modal">

						<div class="screen-reader-text">
							<?php _e('Open Menu', 'outcomes-first-group'); ?>
						</div>

						<div class="site-header__menu-btn-icon">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</button>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php if (has_nav_menu('site-menu')) : ?>
		<div id="site-menu-modal"
			class="site-menu-modal modal modal-resize"
			role="dialog"
			aria-modal="true"
			data-modal-btns=".site-header__menu-btn, .site-menu-modal__menu-btn"
			data-modal-max-width="1024">

			<div class="site-menu-modal__inner modal__inner">
				<div class="site-header__inner container--container-padding">
					<div class="column-container column-container--align-center column-container--justify-space-between">
						<div class="site-header__logo column">
							
						</div>

						<?php if (has_nav_menu('site-menu')) : ?>
							<div class="site-header__menu-btn-column column">
								<button class="site-header__menu-btn modal-open modal-close"
									aria-controls="site-menu-modal"
									aria-expanded="false"
									data-modal-target="site-menu-modal">

									<div class="screen-reader-text">
										<?php _e('Open Menu', 'outcomes-first-group'); ?>
									</div>

									<div class="site-header__menu-btn-icon">
										<div></div>
										<div></div>
										<div></div>
									</div>
								</button>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<nav class="site-menu-modal__menu modal__content container--container-padding">
					<?php if (has_nav_menu('site-menu')) : ?>
						<?php
						wp_nav_menu([
							'container'       => 'div',
							'container_id'    => 'site-menu-modal-menu',
							'container_class' => 'site-menu-modal-menu',
							'menu_class'      => 'site-menu-modal-menu__inner site-menu',
							'theme_location'  => 'site-menu',
							'walker'          => new Main_Menu_Walker(),
						]);
						?>
					<?php endif; ?>

					<?php if ($contact_page) : ?>
						<div class="site-menu-modal__contact-btn">
							<?php
							get_template_part('template-parts/button/template', null, [
								'url'    => get_the_permalink($contact_page),
								'label'  => __('Contact', 'outcomes-first-group'),
							]);
							?>
						</div>
					<?php endif; ?>
				</nav>
			</div>
		</div>
	<?php endif; ?>
</header>
