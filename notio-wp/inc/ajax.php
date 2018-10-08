<?php function thb_blog_posts() {
	$page = $_POST['page']; 
	$ppp = get_option('posts_per_page');
	$thb_i = $_POST['thb_i'];
	$blog_style = ot_get_option('blog_style', 'style3');
	
	$args = array(
		'posts_per_page'	 => $ppp,
		'paged' => $page,
		'post_status' => 'publish'
	);

	$more_query = new WP_Query( $args );
		
	if ($more_query->have_posts()) :  while ($more_query->have_posts()) : $more_query->the_post(); 
		$thb_i++;
		set_query_var( 'thb_i', $thb_i );
		get_template_part( 'inc/templates/blogbit/'.$blog_style); 
	endwhile; else : endif;
	wp_die();
}
add_action("wp_ajax_nopriv_thb_blog_ajax", "thb_blog_posts");
add_action("wp_ajax_thb_blog_ajax", "thb_blog_posts");

function thb_load_more() {
	$i = $_POST['i'];
	$columns = $_POST['columns'];
	$aspect = $_POST['aspect'];
	$style = $_POST['style'];
	$masonry_layout = $_POST['layout'];
	$loop = $_POST['loop'];
	$page = $_POST['page'];
	$hover_style = $_POST['hover_style'];
	$title_position = $_POST['title_position'];
	$loop .= '|paged:'.$page;

	$source_data = VcLoopSettings::parseData( $loop );
	$query_builder = new ThbLoopQueryBuilder( $source_data );
	$posts = $query_builder->build();
	$posts = $posts[1];
	
	if ($posts->have_posts()) :  while ($posts->have_posts()) : $posts->the_post(); 
		$i++;
		$columns = $aspect ? $columns : $columns. ' padding-1';
		$size = ($style === 'style1' && $masonry_layout) ? thb_get_portfolio_size($masonry_layout, $i, 0) : $columns;
		set_query_var( 'thb_masonry', $aspect );
		set_query_var( 'thb_size', $size );
		set_query_var( 'thb_hover_style', $hover_style );
		set_query_var( 'thb_title_position', $title_position );
		get_template_part( 'inc/templates/portfolio/'.$style );
	endwhile; else : endif;
	wp_die();
}
add_action("wp_ajax_nopriv_thb_ajax", "thb_load_more");
add_action("wp_ajax_thb_ajax", "thb_load_more");