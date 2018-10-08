<?php 
function thb_get_portfolio_size($style = 'style1', $i = 0, $columnWidth = false) {
	$size = '';
	if ($style == 'style1') {
		switch($i) {
			case 1:
			case 6:
				$size = 'small-12 large-6 padding-1';
				break;
			case 2:
			case 3:
				$size = 'small-12 large-6 padding-half';
				break;
			default:
				$size = 'small-12 large-3 padding-1';
				break;
		}
	} else if ($style == 'style2') {
		switch($i) {
			case 2:
			case 7:
				$size = 'small-12 large-3 padding-2';
				break;
			default:
				$size = 'small-12 large-3 padding-1';
				break;
		}	
	} else if ($style == 'style3') {
		switch($i) {
			case 1:
				$size = 'small-12 large-8 padding-1 small';
				break;
			default:
				$size = 'small-12 large-4 padding-1 small';
				break;
			case 3:
				$size = 'small-12 large-4 padding-2 small';
				break;
			case 6:
				$size = 'small-12 large-8 padding-half small';
				break;
		}
	} else if ($style == 'style4') {
		switch($i) {
			case 1:
				$size = 'small-12 large-6 padding-1';
				break;
			case 2:
			case 3:
				$size = 'small-12 large-6 padding-half';
				break;
			default:
				$size = 'small-12 large-4 padding-1';
				break;
		}
	}
	return $size;
}
function thb_get_grid_size($style = 'style1') {
	$columnWidth = '';
	if ($style == 'style1') {
		$columnWidth = '.large-3.padding-1';
	} else if ($style == 'style2') {
		$columnWidth = '.large-3.padding-1';
	} else if ($style == 'style3') {
		$columnWidth = '.large-4.padding-1';
	} else if ($style == 'style4') {
		$columnWidth = '.large-4.padding-1';
	}
	return $columnWidth;
}
/* Portfolio Attributes */
function thb_portfolio_attributes($style) {
	$id = get_the_ID();
	$attributes = get_post_meta($id, 'attributes', true);
	?>
	<?php if (!empty($attributes)) { ?>
		<div class="portfolio-attributes <?php if(isset($style)) { echo esc_attr($style); } ?>">
			<?php if (!empty($attributes)) { ?>
				<?php foreach ($attributes as $more ) { ?>
					<div class="attribute">
						<h6><?php echo esc_attr($more['title']); ?></h6> 
						<?php if ($more['client_custom_link'] !=='') { ?>
							<a href="<?php echo esc_url($more['client_custom_link']); ?>" target="_blank">
						<?php } ?>
						<?php echo $more['client_custom_value']; ?>
						<?php if ($more['client_custom_link'] !=='') { ?>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	<?php
	}
}
add_action( 'thb_portfolio_attributes', 'thb_portfolio_attributes', 3, 3 );
/* Filters */
function thb_portfolio_categories($categories, $id, $style, $portfolio_id_array = false) {
	
	if (!empty($categories) || $categories) { 
		$portfolio_id_array = $portfolio_id_array ? $portfolio_id_array : array();
	?>
	<?php if ($style === 'style2') { ?>
		<div class="small-12 columns thb-portfolio-filter-stamp">
	<?php } ?>
	<nav class="thb-portfolio-filter <?php echo esc_attr($style); ?> <?php if ($style === 'style1') { ?>thb-fixed<?php } ?>" id="thb-filter-<?php echo esc_attr($id); ?>">
		<?php if ($style === 'style1') { ?>
			<h6 class="thb-toggle"><?php esc_html_e('Filters', 'notio'); ?></h6>
		<?php } else if ($style === 'style3') { ?>
			<div class="thb-toggle"><?php get_template_part( 'assets/svg/basic_mixer2.svg' ); ?></div>
		<?php } ?>
		<ul class="filters">
			<li><a href="#" data-filter="*" class="active" data-count="<?php echo count($portfolio_id_array); ?>"><?php esc_html_e('All', 'notio'); ?></a></li>
			<?php 
				 foreach ($categories as $cat) {
				 	$term = get_term($cat);
		
				 	$args = array(
				 		'include' => implode(",", $portfolio_id_array),
				 		'post_type' => 'portfolio',
				 		'tax_query' => array(
				 				array(
				 					'taxonomy' => 'project-category',
				 					'field' => 'slug',
				 					'terms' => array($term->slug),
				 					'operator' => 'IN'
				 				)
				 			)
				 	);
				 	$posts = get_posts($args);
				 	echo '<li><a href="#" data-filter=".thb-cat-' . $term->slug . '" data-count="'.count($posts).'">' . $term->name . '</a></li>';
				 }
			?>
			<?php if ($style === 'style3') { ?>
				<li class="close"><?php esc_html_e('Close', 'notio'); ?> <?php get_template_part( 'assets/svg/arrows_remove.svg' ); ?></li>
			<?php } ?>
		</ul>
	</nav>
	<?php if ($style === 'style2') { ?>
		</div>
	<?php } ?>
	<?php }
}
add_action( 'thb-render-filter', 'thb_portfolio_categories', 1, 4 );