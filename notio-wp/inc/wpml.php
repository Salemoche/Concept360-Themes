<?php

/* Custom Language Switcher */
function thb_language_switcher() {
	$theme_host = 'newnotio.fuelthemes.net';
	$thb_ls = ot_get_option('menu_ls', 'on');
	if ($thb_ls !== 'off') {
		if ( function_exists('icl_get_languages') || $_SERVER['HTTP_HOST'] === $theme_host || function_exists('icl_get_languages')) {
			$permalink = get_permalink();
		?>
			<div class="select-wrapper">
				<?php
					if ($_SERVER['HTTP_HOST'] === $theme_host) {
						$languages = array(
							"en" => array(
								"code" => "en",
								"active" => 1,
								"url" => $permalink,
								"native_name" => "English"
							),
							"fr" => array(
								"code" => "fr",
								"active" => 0,
								"url" => $permalink,
								"native_name" => "Français"
							),
							"de" => array(
								"code" => "de",
								"active" => 0,
								"url" => $permalink,
								"native_name" => "Deutsch"
							)
						);
					} else if (function_exists('icl_get_languages')) {
						$languages = icl_get_languages('skip_missing=0');
					} else if (function_exists('pll_the_languages')) {
						$languages = pll_the_languages(array('raw'=>1));	
					}
					
				?>
				<select id="thb_language_selector">
				<?php
					if(1 < count($languages)){
						foreach($languages as $l){
							if (!function_exists('pll_the_languages')) {
								$selected = $l['active'] ? ' selected' : '';
								echo '<option value="'.esc_attr($l['url']).'" '.esc_attr($selected).'>'.esc_attr($l['native_name']).'</option>';
							} else {
								$selected = $l['current_lang'] ? ' selected' : '';
								echo '<option value="'.esc_attr($l['url']).'" '.esc_attr($selected).'>'.esc_attr($l['name']).'</option>';
							}
						}
					} else {
						echo '<option value="">'.esc_html__('Please Add Languages', 'notio').'</option>';	
					}
				?>
				</select>
			</div>
		<?php 
		}
	}
}
add_action( 'thb_language_switcher', 'thb_language_switcher' );

function thb_language_switcher_text() {

	if ( function_exists('icl_get_languages')) {
	?>
			<?php
				$languages = icl_get_languages('skip_missing=0');
				if(1 < count($languages)){
					$out = '';
					foreach($languages as $l){
						$selected = $l['active'] ? ' class="active"' : '';
						$out .= '<h6><a href="'.$l['url'].'"'.$selected.'>'.$l['native_name'].'</a></h6> / ';
					}
					echo substr($out, 0, -2);
				} else {
					_e('Add Languages', 'notio');	
				}
			?>
	<?php 
	}
}
add_action( 'thb_language_switcher_text', 'thb_language_switcher_text',3 );