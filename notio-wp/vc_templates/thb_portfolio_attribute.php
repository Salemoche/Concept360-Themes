<?php function thb_portfolio_attribute( $atts, $content = null ) {
  $atts = vc_map_get_attributes( 'thb_portfolio_attribute', $atts );
  extract( $atts );
    
 	$out ='';
	ob_start();

		do_action( 'thb_portfolio_attributes', $style); 

	$out = ob_get_clean();
	return $out;
}
thb_add_short('thb_portfolio_attribute', 'thb_portfolio_attribute');