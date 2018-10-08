<?php function thb_share( $atts, $content = null ) {
 $atts = vc_map_get_attributes( 'thb_share', $atts );
 extract( $atts );
 ob_start();
 $sharing_type_override = array();
 if ($facebook) {
 	array_push($sharing_type_override, 'facebook');
 }
 if ($twitter) {
 	array_push($sharing_type_override, 'twitter');
 }
 if ($pinterest) {
 	array_push($sharing_type_override, 'pinterest');
 }
 do_action( 'thb_social_article_detail', $sharing_type_override, $text);
 
 $out = ob_get_clean();
 return $out;
}
thb_add_short('thb_share', 'thb_share');