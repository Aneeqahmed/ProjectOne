<?php 
/**
 * Sanitize functions 
 * @package     Business_Champ
 * @link        http://themeglory.com/
 * since        1.0.0
 * Author:      Themeglory
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
  
  /**
 *sanitization 
 */
    // banner type
    function business_champ_sanitize_banner_type( $input ) {

        $valid = array(
                    'image-banner'     => __('Image banner', 'business-champ'),
                    'video-banner'=> __('Video banner', 'business-champ'),
                    'no-banner'   => __('No banner (only menu)', 'business-champ')
        );
     
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }



    // checkboxes
    function business_champ_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {

            return 1;

        } else {

            return '';
        }
    }

    // footer widget areas
    function business_champ_sanitize_footer_widget( $input ) {
        $valid = array(
            '1'     => __('One', 'business-champ'),
            '2'     => __('Two', 'business-champ'),
            '3'     => __('Three', 'business-champ'),
            '4'     => __('Four', 'business-champ')
        );
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }

     //site layout
    function business_champ_sanitize_site_layout( $input ) {
        $valid = array(
            'full-width-layout'    => __('Full Width', 'business-champ'),
                    'box-layout'     => __('Boxed', 'business-champ'),                   
        );
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {
            
            return '';
        }
    }


// sidebar position
    function business_champ_sanitize_sidebar( $input ) {
        $valid = array(
                    'none'    => __('No sidebar', 'business-champ'),
                    'right'     => __('Right sidebar', 'business-champ'),
                    'left'=> __('Left sidebar', 'business-champ')
        );
     
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }

    // sidebar id
    function business_champ_sanitize_sidebar_id( $input ) {
        $valid = business_champ_sidebars();
     
        if ( array_key_exists( $input, $valid ) ) {

            return $input;

        } else {

            return '';
        }
    }
