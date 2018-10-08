<?php function thb_instagram( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_instagram', $atts );
  extract( $atts );
    
 	$out ='';
	ob_start();
	
	$username = ot_get_option('instagram_username');
	$access_token = ot_get_option('instagram_accesstoken');
	$transient = 'thb-instagram-media-'.$access_token.'-'.$number;
	if (false === ($instagram = get_transient($transient)) && $username && $access_token) {
		$response = wp_remote_get( 'https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token.'&count='.$number.'', array( 'sslverify' => false ) );
		if ( is_wp_error( $response ) ) {
			echo $error_string = $response->get_error_message();
			return;
		}
		$body = json_decode( wp_remote_retrieve_body( $response ) );
		if (isset($body->meta->error_message)) {
			echo esc_html($body->meta->error_message);
			return;
		}
		$instagram = array();
		foreach ( $body->data as $item ) {
			$instagram[] = array(
				'link'          => $item->link,
				'image_url'     => $item->images->standard_resolution->url
			);
		}
		$instagram = serialize( $instagram );
		set_transient($transient, $instagram, HOUR_IN_SECONDS);
	}
	$instagram = unserialize( $instagram );
	
	$class = $padding == true ? 'margin' : 'no-padding';
	?>
		<div class="row <?php echo esc_attr($class); ?> instagram-row">
			<?php
				if (!$access_token) {
					esc_html_e('Please fill out Instagram Settings inside Appearance > Theme Options', 'notio');
				} else if ($instagram) {
					foreach ($instagram as $item) {
						echo '<div class="small-6 '.esc_attr($columns).' columns"><figure style="background-image:url('. esc_url($item['image_url']) .')">';
						if ($link == 'true') {
						echo '<a href="'. esc_url($item['link']) .'" target="_blank"></a>';
						}
						echo '</figure></div>';
					}
				} 
			?>
		</div>
	<?php
	
	$out = ob_get_clean();
	   
	return $out;
}
thb_add_short('thb_instagram', 'thb_instagram');