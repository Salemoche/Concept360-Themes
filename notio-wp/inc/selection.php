<?php function thb_selection() {
	$id = get_queried_object_id();
	ob_start();
?>
/* Typography */
<?php if ($primary_type = ot_get_option('primary_type')) { ?>
h1,h2,h3,h4,h5,h6,
blockquote p,
.thb-portfolio-filter .filters,
.thb-portfolio .type-portfolio.hover-style5 .thb-categories {
	<?php thb_typeecho($primary_type, false, 'Work Sans'); ?>		
}
<?php } ?>
<?php if ($secondary_type = ot_get_option('secondary_type')) { ?>
body {
	<?php thb_typeecho($secondary_type, false, 'Karla'); ?>		
}
<?php } ?>
<?php if ($h1_type = ot_get_option('h1_type')) { ?>
h1,
.h1 {
	<?php thb_typeecho($h1_type); ?>		
}
<?php } ?>
<?php if ($h2_type = ot_get_option('h2_type')) { ?>
h2 {
	<?php thb_typeecho($h2_type); ?>		
}
<?php } ?>
<?php if ($h3_type = ot_get_option('h3_type')) { ?>
h3 {
	<?php thb_typeecho($h3_type); ?>		
}
<?php } ?>
<?php if ($h4_type = ot_get_option('h4_type')) { ?>
h4 {
	<?php thb_typeecho($h4_type); ?>		
}
<?php } ?>
<?php if ($h5_type = ot_get_option('h5_type')) { ?>
h5 {
	<?php thb_typeecho($h5_type); ?>		
}
<?php } ?>
<?php if ($h6_type = ot_get_option('h6_type')) { ?>
h6 {
	<?php thb_typeecho($h6_type); ?>		
}
<?php } ?>
<?php if ($body_type = ot_get_option('body_type')) { ?>
body p {
	<?php thb_typeecho($body_type); ?>		
}
<?php } ?>
<?php if ($footer_type = ot_get_option('footer_type')) { ?>
.footer p,
.footer .widget p, 
.footer .widget ul li {
	<?php thb_typeecho($footer_type); ?>		
}
<?php } ?>
<?php if ($fullmenu_type = ot_get_option('fullmenu_type')) { ?>
#full-menu .sf-menu > li > a {
	<?php thb_typeecho($fullmenu_type); ?>		
}
<?php } ?>
<?php if ($submenu_type = ot_get_option('submenu_type')) { ?>
#full-menu .sub-menu li a {
	<?php thb_typeecho($submenu_type); ?>		
}
<?php } ?>
<?php if ($button_type = ot_get_option('button_type')) { ?>
input[type="submit"],
.button,
.btn {
	<?php thb_typeecho($button_type); ?>		
}
<?php } ?>
<?php if ($menu_type = ot_get_option('menu_type')) { ?>
.mobile-menu a {
	<?php thb_typeecho($menu_type); ?>		
}
<?php } ?>

<?php if ($footer_widget_title_type = ot_get_option('footer_widget_title_type')) { ?>
.footer .widget h6 {
	<?php thb_typeecho($footer_widget_title_type); ?>		
}
<?php } ?>

/* Header */
<?php if ($logo_height = ot_get_option('logo_height')) { ?>
.header .logolink .logoimg {
	max-height: <?php thb_measurementecho($logo_height); ?>;	
}
<?php } ?>

<?php if ($logo_mobile_height = ot_get_option('logo_mobile_height')) { ?>
@media screen and (max-width: 40.0625em) {
	.header .logolink .logoimg {
		max-height: <?php thb_measurementecho($logo_mobile_height); ?>;	
	}
}
<?php } ?>
<?php if ($header_height = ot_get_option('header_height')) { ?>
.header {
	height: <?php thb_measurementecho($header_height); ?>;	
}
.header-margin, #searchpopup, #mobile-menu, #side-cart, #wrapper [role="main"], .pace, .share_container {
  margin-top: <?php thb_measurementecho($header_height); ?>;
}
<?php } ?>

<?php if ($header_mobile_height = ot_get_option('header_mobile_height')) { ?>
@media screen and (max-width: 40.0625em) {
	.header {
		height: <?php thb_measurementecho($header_mobile_height); ?>;	
	}
	.header-margin, #searchpopup, #mobile-menu, #side-cart, #wrapper [role="main"], .pace, .share_container {
	  margin-top: <?php thb_measurementecho($header_mobile_height); ?>;
	}
}
<?php } ?>
<?php if ($menu_margin = ot_get_option('menu_margin')) { ?>
#full-menu .sf-menu>li+li {
	margin-left: <?php thb_measurementecho($menu_margin); ?>	
}
#full-menu {
  margin-right: <?php thb_measurementecho($menu_margin); ?>	
}
<?php } ?>
/* Colors */
<?php if ($accent_color = ot_get_option('accent_color')) { ?>
	.underline-link:after, .products .product .product_after_title .button:after, .wpb_text_column a:after, .widget.widget_price_filter .price_slider .ui-slider-handle, .btn.style5, .button.style5, input[type=submit].style5, .btn.style6, .button.style6, input[type=submit].style6, .btn.accent, .btn#place_order, .btn.checkout-button, .button.accent, .button#place_order, .button.checkout-button, input[type=submit].accent, input[type=submit]#place_order, input[type=submit].checkout-button,.products .product .product_after_title .button:after, .woocommerce-tabs .tabs li a:after, .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a, .thb-client-row.has-border.thb-opacity.with-accent .thb-client:hover, .product-page .product-information .single_add_to_cart_button:hover {
		border-color: <?php echo esc_attr($accent_color); ?>;	
	}
	.woocommerce-MyAccount-navigation ul li:hover + li a, .woocommerce-MyAccount-navigation ul li.is-active + li a {
		border-top-color: <?php echo esc_attr($accent_color); ?>;
	}
	a:hover, #full-menu .sf-menu > li.current-menu-item > a, #full-menu .sf-menu > li.sfHover > a, #full-menu .sf-menu > li > a:hover, .header_full_menu_submenu_color_style2 #full-menu .sub-menu a:hover, #full-menu .sub-menu li a:hover, .footer.style1 .social-links a.email:hover, .post .post-title a:hover, .widget.widget_recent_entries ul li .url, .widget.widget_recent_comments ul li .url, .widget.woocommerce.widget_layered_nav ul li .count, .widget.widget_price_filter .price_slider_amount .button, .widget.widget_price_filter .price_slider_amount .button:hover, .pagination .page-numbers.current, .btn.style3:before, .button.style3:before, input[type=submit].style3:before, .btn.style5:hover, .button.style5:hover, input[type=submit].style5:hover, .mobile-menu > li.current-menu-item > a, .mobile-menu > li.sfHover > a, .mobile-menu > li > a:hover, .mobile-menu > li > a.active, .mobile-menu .sub-menu li a:hover, .authorpage .author-content .square-icon:hover, .authorpage .author-content .square-icon.email:hover, #comments .commentlist .comment .reply, #comments .commentlist .comment .reply a, .thb-portfolio-filter.style1 .filters li a:hover, .thb-portfolio-filter.style1 .filters li a.active, .products .product .product_after_title .button, .product-page .product-information .price,.product-page .product-information .reset_variations, .product-page .product-information .product_meta > span a, .woocommerce-tabs .tabs li a:hover, .woocommerce-tabs .tabs li.active a, .woocommerce-info a:not(.button), .email:hover, .thb-iconbox.type3 > span, .thb_twitter_container.style1 .thb_tweet a,
	.columns.thb-light-column .btn-text.style3:hover, 
	.columns.thb-light-column .btn-text.style4:hover  {
		color: <?php echo esc_attr($accent_color); ?>;	
	}
	.post.blog-style7 .post-gallery, .widget.widget_price_filter .price_slider .ui-slider-range, .btn.style5, .button.style5, input[type=submit].style5, .btn.style6, .button.style6, input[type=submit].style6, .btn.accent, .btn#place_order, .btn.checkout-button, .button.accent, .button#place_order, .button.checkout-button, input[type=submit].accent, input[type=submit]#place_order, input[type=submit].checkout-button, .content404 figure, .style2 .mobile-menu > li > a:before, .thb-portfolio.thb-text-style2 .type-portfolio:hover, .thb-portfolio-filter.style2 .filters li a:before, .woocommerce-MyAccount-navigation ul li:hover a, .woocommerce-MyAccount-navigation ul li.is-active a, .email.boxed-icon:hover, .email.boxed-icon.fill, .email.boxed-icon.white-fill:hover, .thb-iconbox.type2 > span, .thb-client-row.thb-opacity.with-accent .thb-client:hover, .product-page .product-information .single_add_to_cart_button:hover, .btn.style3:before, .button.style3:before, input[type=submit].style3:before, .btn-text.style3 .circle-btn {
		background-color: <?php echo esc_attr($accent_color); ?>;	
	}
	.mobile-menu li.menu-item-has-children > a:hover .menu_icon,
	.btn-text.style4 .arrow svg:first-child {
		fill: <?php echo esc_attr($accent_color); ?>;	
	}
	.thb-counter figure svg path,
	.thb-counter figure svg circle,
	.thb-counter figure svg rect,
	.thb-counter figure svg ellipse {
		stroke: <?php echo esc_attr($accent_color); ?>;		
	}
	.button.checkout-button:hover,
	input[type=submit]#place_order:hover,
	.btn.accent:hover,
	.btn.style6:hover, .button.style6:hover, input[type=submit].style6:hover {
		background-color: <?php echo thb_adjustColorLightenDarken($accent_color, 10); ?>;
		border-color: <?php echo thb_adjustColorLightenDarken($accent_color, 10); ?>;
	}
<?php } ?>

<?php if ($fullmenu_color = ot_get_option('fullmenu_color')) { ?>
<?php thb_linkcolorecho($fullmenu_color, '#full-menu .sf-menu > li >'); ?>
<?php } ?>

<?php if ($submenu_color = ot_get_option('submenu_color')) { ?>
<?php thb_linkcolorecho($submenu_color, '#full-menu .sub-menu li'); ?>
<?php } ?>

<?php if ($mobilemenu_color = ot_get_option('mobilemenu_color')) { ?>
<?php thb_linkcolorecho($mobilemenu_color, '.mobile-menu > li > '); ?>
<?php } ?>

<?php if ($mobilesubmenu_color = ot_get_option('mobilesubmenu_color')) { ?>
<?php thb_linkcolorecho($mobilesubmenu_color, '.mobile-menu .sub-menu li '); ?>
<?php } ?>


/* Backgrounds */
<?php if ($preloader_bg = ot_get_option('preloader_bg')) { ?>
.pace {
	<?php thb_bgecho($preloader_bg); ?>;
}
<?php } ?>
<?php if ($header_bg = ot_get_option('header_bg')) { ?>
.header {
	<?php thb_bgecho($header_bg); ?>;
}
<?php } ?>

<?php if ($bar_bg = ot_get_option('bar_bg')) { ?>
.bar-side {
	<?php thb_bgecho($bar_bg); ?>;
}
<?php } ?>

<?php if ($nav_bg = ot_get_option('nav_bg')) { ?>
.portfolio_nav {
	<?php thb_bgecho($nav_bg); ?>;
}
<?php } ?>

<?php if ($footer_bg = ot_get_option('footer_bg')) { ?>
.footer {
	<?php thb_bgecho($footer_bg); ?>;
}
<?php } ?>
<?php if ($subfooter_bg = ot_get_option('subfooter_bg')) { ?>
.subfooter {
	<?php thb_bgecho($subfooter_bg); ?>;
}
<?php } ?>

/* Page Settings */
<?php
	$page_bg = get_post_meta($id, 'page_bg', true);
	if ($page_bg !== '') {
	?>
		body.page-id-<?php echo esc_attr($id); ?> #wrapper [role="main"] {
			<?php thb_bgecho($page_bg); ?>;
		}
	<?php	
	}
?>

/* Portfolio Settings */
<?php
	$args = array(
		'posts_per_page' => -1, 
		'post_type'=>'portfolio', 
		'no_found_rows' => true
	);

	$posts = new WP_Query( $args );
	
	if ($posts->have_posts()) :  while ($posts->have_posts()) : $posts->the_post();
		$thb_id = get_the_ID();
		$main_color = get_post_meta($thb_id, 'main_color', true);
		$page_bg = get_post_meta($thb_id, 'page_bg', true);
		
		if ($main_color !== '') {
		?>
			.thb-portfolio .post-<?php echo esc_attr($thb_id); ?>.type-portfolio.portfolio-style1:not(.hover-style6) .portfolio-link,
			.thb-portfolio .post-<?php echo esc_attr($thb_id); ?>.type-portfolio.portfolio-text-style-2:hover,
			#qp-portfolio-<?php echo esc_attr($thb_id); ?>:hover .qp-content,
			.thb-portfolio .post-<?php echo esc_attr($thb_id); ?>.type-portfolio.portfolio-style2.style2-hover-style2 .thb-placeholder.second {
				background: <?php echo esc_attr($main_color); ?>;	
			}
			
			/* Hover Style 7 */
			.thb-portfolio .post-<?php echo esc_attr($thb_id); ?>.type-portfolio.portfolio-style1.hover-style7 .portfolio-link {
				background: transparent;	
			}
			.thb-portfolio .post-<?php echo esc_attr($thb_id); ?>.type-portfolio.portfolio-style1.hover-style7 .thb-placeholder:before {
				background: <?php echo esc_attr($main_color); ?>;	
			}
		<?php
		}
		if ($page_bg !== '') {
		?>
			body.postid-<?php echo esc_attr($thb_id); ?> #wrapper [role="main"] {
				<?php thb_bgecho($page_bg); ?>;
			}
		<?php	
		}
	endwhile; else : endif;
	wp_reset_postdata();
?>

/* Footer */
<?php if ($footer_padding = ot_get_option('footer_padding')) { ?>
.footer.style2 {
	<?php thb_spacingecho($footer_padding, false, 'padding'); ?>
}
<?php } ?>
/* Extra CSS */
<?php 
echo ot_get_option('extra_css');
?>
<?php 
	$out = ob_get_clean();
	// Remove comments
	$out = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $out);
	// Remove space after colons
	$out = str_replace(': ', ':', $out);
	// Remove whitespace
	$out = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $out);
	
	return $out;
}