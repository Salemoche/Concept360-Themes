<?php 
/*
Element Description: WK Video Preview
*/

// Element Class 
class wkVideoPreview extends WPBakeryShortCode {
     
    // Element Init
    function __construct() {
        add_action( 'init', array( $this, 'wk_video_preview_mapping' ) );
        add_shortcode( 'wk_video_preview', array( $this, 'wk_video_preview_html' ) );
    }
     
    // Element Mapping
    public function wk_video_preview_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('WK Video Preview', 'wk-domain'),
                'base' => 'wk_video_preview',
                'description' => __('Webkönig Video Preview', 'wk-domain'), 
                'category' => __('Content', 'wk-domain'),   
                'icon' => get_stylesheet_directory().'/assets/logo.png',            
                'params' => array(   
                         
                    array(
                        'type' => 'textfield',
                        'class' => 'wk-title-class',
                        'heading' => __( 'Video Link', 'wk-domain' ),
                        'param_name' => 'wk_video_link',
                        'value' => __( '', 'wk-domain' ),
                        'description' => __( 'Link aus der Mediatheke', 'wk-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),  
                     
                    array(
                        'type' => 'textfield',
                        'class' => 'wk-link-class',
                        'heading' => __( 'Link', 'wk-domain' ),
                        'param_name' => 'wk_href_link',
                        'value' => __( '', 'wk-domain' ),
                        'description' => __( 'Seite auf die das Video verlinken soll.', 'wk-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
					
					array(
                        'type' => 'textfield',
                        'class' => 'wk-title-class',
                        'heading' => __( 'Title', 'wk-domain' ),
                        'param_name' => 'wk_title',
                        'value' => __( '', 'wk-domain' ),
                        'description' => __( 'Falls ein Titel über dem Video erscheinen soll.', 'wk-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),   
					
					array(
                        'type' => 'textfield',
                        'class' => 'wk-text-class',
                        'heading' => __( 'Text', 'wk-domain' ),
                        'param_name' => 'wk_text',
                        'value' => __( '', 'wk-domain' ),
                        'description' => __( 'Falls ein Text über dem Video erscheinen soll.', 'wk-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
					
					array(
                        'type' => 'dropdown',
                        'class' => 'wk-color-class',
                        'heading' => __( 'Farbe des Textes', 'wk-domain' ),
                        'param_name' => 'wk_text_color',
                        'value' => array(
							__( 'Weiss', 'wk-domain' ) => 'white',
							__( 'Schwarz', 'wk-domain' ) => 'black'
						  ),
                        'description' => __( 'Text Farbe.', 'wk-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'General',
                    ),
                        
                ),
            )
        );                                
        
    }
     
     
    // Element HTML
    public function wk_video_preview_html( $atts ) {
         
        $atts = vc_map_get_attributes( 'wk_video_preview', $atts );
	  	extract( $atts );
		
        // Fill $html var with data
        $out ='';
		ob_start();
		?>
		<div class="thb-portfolio thb_margins">
			<div class="type-portfolio wk-videoWrapper">
				<?php if($wk_href_link !== ""){ ?>
					<a href="<?php echo $wk_href_link;?>">
				<?php } if($wk_title !== "" || $wk_text !== ""){?>
						<div class="wk-textOverVideoPreview">
				<?php }if($wk_title !== ""){?>
						<h4 style="color:<?php echo $wk_text_color?>;"><?php echo $wk_title ?></h4>
				<?php } if($wk_text !== ""){ ?>
						<p style="color:<?php echo $wk_text_color?>;"><?php echo $wk_text ?></p>
				<?php } ?>
				<?php if($wk_title !== "" || $wk_text !== ""){?>
						</div>
				<?php } ?>
						<video class="wk-videoPreview" src="<?php echo $wk_video_link; ?>" loop></video>
				<?php if($wk_href_link !== ""){ ?>
					</a>
				<?php } ?>
			</div>
		</div>
		<?php
		$out = ob_get_contents();
		if (ob_get_contents()) ob_end_clean();
		return $out;
         
    }
     
} // End Element Class
 
 
// Element Class Init
new wkVideoPreview();