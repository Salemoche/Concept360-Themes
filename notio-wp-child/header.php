<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,400i,700,700i,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:800,900" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
			<div class="concept-header__main__social-media__container social-media__container">
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
			<?php $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];?>
			
			<ul <?php  echo strpos($url, '?s=') ? 'class="concept-header__project-category__list--search"' : '';?>>

				<?php if (!strpos($url, '?s=')) : ?>

					<li class="concept-header__list-item  <?php  echo strpos($url, 'highlights') ? 'menu-active' : ''; ?>"><a href="<?php echo get_permalink(686) ?>"><?php echo esc_html_e('Highlights', 'c360'); ?></a></li>
					<li class="concept-header__list-item <?php  if (strpos($url, 'corporate') || has_category('Corporate')) { echo 'menu-active'; }?>"><a href="<?php echo get_permalink(684) ?>" ><?php echo esc_html_e('Corporate', 'c360'); ?></a></li>
					<li class="concept-header__list-item <?php  if (strpos($url, 'journalism') || has_category('Journalismus') || has_category('Journalism')) { echo 'menu-active'; }?>"><a href="<?php echo get_permalink(702) ?>" ><?php echo esc_html_e('Journalismus', 'c360'); ?></a></li>
					<li class="concept-header__list-item <?php  if (strpos($url, 'insights') || has_category('Insight')) { echo 'menu-active'; }?>"><!--<a href="<?php echo get_permalink(704) ?>" >--><?php echo esc_html_e('Insights', 'c360'); ?><!--</a>--></li>
					<!-- <li class="concept-header__project-category__search">
						<form action="POST">
							<input type="text" placeholder="Suchbegriff hier eingeben">
							<input class="concept-header__project-category__search__icon" type='submit'></input>
						</form>
					</li> -->

				<?php else: ?>
				<a href="javascript:history.go(-1)"><li class="concept-header__project-category__back"></li></a>
				<?php

					$searchQuery = str_word_count(get_search_query(),1) ;

					foreach ($searchQuery as $tag) {
						
						echo '<li class="tag">' . $tag . ' </li>';
					}
				
				//endif;
				?>
				<?php endif; ?>
				<li><?php get_search_query(); ?></li>
			</ul>
			<ul class="concept-header__all-tags" >
				<li class="concept-header__all-tags__back"></li>
				<?php
					$allTags = get_tags();

					foreach ($allTags as $tag) {
											
						if (tag_description($tag)) {
							echo '<a href="' . get_home_url() . '/?s='. $tag->name . '" style="order: 1' /*. tag_description($tag)*/ . ';"><li class="tag">' . $tag->name . ' </li></a>';					
						}
					
					}
				?>
			</ul>
			<div class="concept-header__project-category__expand"></div>
			<div class="concept-header__project-category__search-form"><?php get_search_form(); ?></div>
		</nav>
	</div>

	<?php get_template_part( 'inc/templates/header/'.ot_get_option('header_style', 'style1') ); ?>
	

	<div role="main" class="main">

