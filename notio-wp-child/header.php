<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i" rel="stylesheet">
	<?php wp_site_icon(); ?>
	<?php
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<!-- Start Loader -->
<div class="pace"></div>
<!-- End Loader -->
<div id="wrapper" class="open">

	<!-- Start Mobile Menu -->
	<?php get_template_part( 'inc/templates/header/mobile_menu'); ?>
	<!-- End Mobile Menu -->

	<div class="concept-header">
		<div class="concept-header__main">
			<a href="<?php echo get_home_url(); ?>">
				<div class="concept-header__main__logo"></div>
			</a>
			<div class="concept-header__main__social-media__container">
				<a href="https://vimeo.com/concept360">
					<div class="concept-header__main__social-media concept-header__main__social-media--vimeo">
						
					</div>
				</a>
				<a href="https://www.facebook.com/concept360ch">
					<div class="concept-header__main__social-media concept-header__main__social-media--facebook">
						
					</div>
				</a>
				<a href="https://www.instagram.com/concept360.ch">
					<div class="concept-header__main__social-media concept-header__main__social-media--instagram">
						
					</div>
				</a>
				<a href="mailto:info@concept360.ch">
					<div class="concept-header__main__social-media concept-header__main__social-media--mail">
						
					</div>
				</a>
			</div>
		</div>
		<nav class="concept-header__project-category__container">
			<ul>
				<li><a href="<?php echo get_permalink(686) ?>"><?php echo get_the_title(686) ?></a></li>
				<li><a href="<?php echo get_permalink(684) ?>"><?php echo get_the_title(684) ?></a></li>
				<li><a href="<?php echo get_permalink(702) ?>"><?php echo get_the_title(702) ?></a></li>
				<li><a href="<?php echo get_permalink(704) ?>"><?php echo get_the_title(704) ?></a></li>
				<li>Suchfunktion</li>
			</ul>
		</nav>
	</div>

	

	<div role="main" class="main">

