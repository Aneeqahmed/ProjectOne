<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Business_Champ
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_champ_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'business_champ_body_classes' );

function business_champ_sanitize_pagination($content) {
    // Remove h2 tag
    $content = preg_replace('#<h2.*?>(.*?)<\/h2>#si', '', $content);
    return $content;
}
 
add_action('navigation_markup_template', 'business_champ_sanitize_pagination');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function business_champ_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'business_champ_pingback_header' );



if( ! function_exists('business_champ_oembed_result') ):

function business_champ_oembed_result( $html, $url, $args = NULL ) {

   if( isset( $args['banner'] ) == 1 ){
         
      $html =  preg_replace('/width="\d+"/i', '' , $html );
      $html =  preg_replace('/height="\d+"/i', '' , $html );
      return str_replace("?feature=oembed", "?feature=oembed&autoplay=1&controls=0&loop=1&rel=0&showinfo=0&mute=1", $html);
  
   }else if( isset($args['width'] ) ){

      $html =  preg_replace('/width="\d+"/i', 'width="'.$args['width'].'"' , $html );
      $html =  preg_replace('/height="\d+"/i', 'height="'.$args['height'].'" style="width:'.$args['width'].'px;height:'.$args['height'].'px;" ' , $html );
      return $html;

   }else{
    
       return $html;

   }
}

endif;
add_filter('oembed_result','business_champ_oembed_result', 10, 3);




if( ! function_exists('business_champ_url_to_id' ) ):

  function business_champ_url_to_id( $attachment_url ){
    global $wpdb;
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $attachment_url )); 
    if( isset( $attachment[0] ) ){

      return $attachment[0]; 
    }
    return false;
  }

endif;
add_filter( 'business_champ_url_to_id' , 'business_champ_url_to_id' , 10 , 1 );


if( ! function_exists( 'business_champ_id_to_cropped_url' ) ):

  function business_champ_id_to_cropped_url( $attachment_id, $size ){

    $thumb = wp_get_attachment_image_src( $attachment_id, $size );
    if( isset( $thumb[0] ) ){
      return  $thumb[0];
    }
   return false;

  }
endif;
add_filter( 'business_champ_id_to_cropped_url' , 'business_champ_id_to_cropped_url' , 10 , 2 );


if ( ! function_exists( 'business_champ_posts_navigation' ) ) :

  /**
   * Posts navigation.
   *
   * @since 1.0.0
   */
  function business_champ_posts_navigation() {
    
    the_posts_pagination( array(
                            'mid_size' => 2,
                            'prev_text' => __( '<span aria-hidden="true"> << </span>', 'business-champ' ),
                            'next_text' => __( '<span aria-hidden="true"> >> </span>', 'business-champ' ),
                            'screen_reader_text' => '&nbsp;'
                        ) ); 
  }
endif;
add_action( 'business_champ_posts_navigation' , 'business_champ_posts_navigation' );






if( ! function_exists( 'business_champ_wp_title') ):
  function business_champ_wp_title( $title, $sep ) {
    if ( is_feed() ) {
      return $title;
    }

    global $page, $paged;

    // Add the blog name
    $title .= get_bloginfo( 'name', 'display' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title .= " $sep $site_description";
    }

    // Add a page number if necessary:
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
      $title .= " $sep " . sprintf( __( 'Page %s', 'business-champ' ), max( $paged, $page ) );
    }

    return $title;
  }

endif;
add_filter( 'wp_title', 'business_champ_wp_title', 10, 2 );




if( ! function_exists( 'business_champ_archive_title') ):

function business_champ_archive_title( $title ){

      if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title =  get_the_author() ;

        } elseif( is_date() ){
           $title = single_month_title( ' ' , false );
           $title = implode( ', ', explode( ' ' , trim( $title ) ) );
        }

    return $title;

}

endif;
add_filter( 'get_the_archive_title', 'business_champ_archive_title' ,  10 ,1 ); 


if ( ! function_exists( 'business_champ_sidebars' ) ):

  /**
   * Returns array of registered sidebars
   */
  function business_champ_sidebars() {
       global $wp_registered_sidebars;
       $arr = array();
       if( !empty( $wp_registered_sidebars ) && is_array($wp_registered_sidebars) ){
        foreach(  $wp_registered_sidebars as $sidebar ):
          $arr[$sidebar['id']] = $sidebar['name'];
        endforeach;
       }
    return $arr;      
  }
  
endif;
add_action('widgets_init','business_champ_sidebars' , 99);


if ( ! function_exists( 'business_champ_recommend_plugin' ) ):

function business_champ_recommend_plugin() {

  
    /**
     * Array of plugin arrays. Required keys are name and slug.
     */
    $plugins = 
        array(
        
            array(
               
                'name'               => esc_html__('Elementor','business-champ'),
                'slug'               => 'elementor',
                'required'           =>  false,
            ),
            
           
    );

    $config = array(
        'id'           => 'business-champ',        // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );

}

endif;
add_action( 'tgmpa_register', 'business_champ_recommend_plugin' );


