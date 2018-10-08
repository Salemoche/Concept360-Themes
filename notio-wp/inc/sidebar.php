<?php
function thb_register_sidebars() {

	if ( thb_wc_supported() ) {
		register_sidebar(array('name' => esc_html__('Shop Sidebar', 'notio'), 'id' => 'shop', 'description' => esc_html__('Sidebar for the Shop page', 'notio'), 'before_widget' => '<div id="%1$s" class="widget woo cf %2$s">', 'after_widget' => '</div></div>', 'before_title' => '<h6>', 'after_title' => '</h6><div class="widget_content">'));
	}
	register_sidebar(array('name' => 'Footer Column 1', 'id' => 'footer1', 'description' => 'Footer - First column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));

	register_sidebar(array('name' => 'Footer Column 2', 'id' => 'footer2', 'description' => 'Footer - Second column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));

	register_sidebar(array('name' => 'Footer Column 3', 'id' => 'footer3', 'description' => 'Footer - Third column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));

	register_sidebar(array('name' => 'Footer Column 4', 'id' => 'footer4', 'description' => 'Footer - Forth column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => 'Footer Column 5', 'id' => 'footer5', 'description' => 'Footer - Fifth column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
	
	register_sidebar(array('name' => 'Footer Column 6', 'id' => 'footer6', 'description' => 'Footer - Sixth column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h6>', 'after_title' => '</h6>'));
}
add_action( 'widgets_init', 'thb_register_sidebars' );