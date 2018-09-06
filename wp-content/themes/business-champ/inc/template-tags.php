<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Business_Champ
 */

if( ! function_exists( 'business_champ_get_font' ) ){

	function business_champ_get_font(){

			$font =  'https://fonts.googleapis.com/css?family=Libre+Franklin:100,200,300,400,500,600,700,800,900';

			return esc_url($font);		
	}

}


if( ! function_exists( 'business_champ_blog_layout' ) ){

	function business_champ_blog_layout(){
		
			$layout = 'list';
			return esc_attr($layout) ;
		
	}

}



if ( ! function_exists( 'business_champ_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function business_champ_posted_on() {
		$time_string = '<div class="article-date mr-t-5" datetime="%1$s">
							<i class="fas fa-calendar-alt"></i>
									<span class="month">%2$s</span>
                                   <span class="date">%3$s</span>
                                   <span class="year">%4$s</span>
                                  </div>';
		

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('M') ),
			esc_html( get_the_date('d') ),
			esc_html( get_the_date('Y') )
			
		);

		
			
			echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
	
	}
endif;


if ( ! function_exists( 'business_champ_author' ) ) :
	/**
	 * Prints HTML with meta information for the current  author.
	 */
	function business_champ_author() {
      $author_string = '<div class="article-author-info business-champ-flex-wrap">
     						 <span class="img">%1$s</span>
                                    <span class="infos">
		                                <span class="author-name">%2$s</span>		                                
                            		</span>
                                </div>';
		echo  sprintf( $author_string , get_avatar( get_the_author_meta( 'ID' ) , 30 ) , '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>');
					
	}

endif;


if ( ! function_exists( 'business_champ_categories' ) ) :
	/**
	 * Prints HTML with meta information for the current  categories.
	 */
	function business_champ_categories() {
      $category_string = '<div class="tags">
	                        <i class="fa fa-tags"></i>
	                        %1$s
                    	</div>';
		$categories = get_the_category();
		$cats = array();

		if( !empty ( $categories ) ){

			foreach( $categories as $cat ):

				$cats[] = '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';

			endforeach;
		}

		if( $cats ){

			echo sprintf( $category_string , implode( ' ' , $cats ) );
		}
					
	}
	
endif;


if ( ! function_exists( 'business_champ_comment_count' ) ) :
	/**
	 *  Prints no. of comments of current post
	 */
	function business_champ_comment_count() {
      $info_string = '<div class="comments">
                                  <a href="%1$s">  <i class="fa fa-comment"></i><span>%2$s '.__( 'Comments' , 'business-champ' ).'</span></a>
                                </div>';
                                
		echo sprintf( $info_string , get_permalink().'#comments' , wp_count_comments( get_the_ID())->approved );
		
					
	}
	
endif;






if ( ! function_exists( 'business_champ_header_type' ) ) :
	/**
	 *  Returns header type
	 */
	function business_champ_header_type() {
		
		if( is_front_page() || is_home()){
			
			return  esc_attr ( get_theme_mod('front_header_type') ). ' ' .esc_attr ( get_theme_mod('front_banner_type') );

		}else{

			return  esc_attr(get_theme_mod('site_header_type')).' '.esc_attr ( get_theme_mod('site_banner_type') );
		}		

}

endif;



if ( ! function_exists( 'business_champ_header_height' ) ) :
	/**
	 *  Returns header height for image banner
	 */
	function business_champ_header_height() {
		
		
		$height = esc_attr( get_theme_mod('header_height') ) ;
		if( $height ){

			return $height.'px';
		}
		$height = '300px';

		return esc_attr($height);	

}
endif;



if ( ! function_exists( 'business_champ_hide_overlay' ) ) :
	/**
	 *  Returns banner overlay
	 */
	function business_champ_hide_overlay() {
		
		$hide = esc_attr( get_theme_mod('hide_overlay') ) ;
		if( $hide ){

			return true;
		}
		return false;

}

endif;



if( !function_exists( 'business_champ_feat_image')):
	/**
	 *  Returns boolean
	 */
 function business_champ_feat_image(){ 

   		return true; 	
 }

endif;



if( !function_exists( 'business_champ_single_feat_image')):
	/**
	 *  Returns boolean
	 */
 function business_champ_single_feat_image(){	

   		return true; 	
 }

endif;



if ( ! function_exists( 'business_champ_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function business_champ_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'business-champ' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'business-champ' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'business-champ' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'business-champ' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'business-champ' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'business-champ' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}

endif;



/************ customizer options **************/
// layout settings
if( ! function_exists( 'business_champ_body_site_layout' ) ):
	/**
	 *  Returns site layout
	 */
	function business_champ_body_site_layout(){
		
		$bg_color =  esc_attr( get_theme_mod('background_color') );

		$layout = esc_attr( get_theme_mod('site_layout_type') );

		if( ! $layout ){

			$layout = 'full-width-layout';
		}

		if( $bg_color ){

			$layout .= ' hasbody_bg';
		}

		

		return  esc_attr($layout);
	}

endif;



// container class
if( ! function_exists( 'business_champ_site_container' ) ):
	/**
	 *  Returns header container class
	 */
	function business_champ_site_container(){		

		$layout = 'container-large';
		return esc_attr($layout);
	}

endif;


// header class
if ( ! function_exists( 'business_champ_header_class' ) ) :
	/**
	 *  Returns header class
	 */
	function business_champ_header_class() {
		
		$layout_type =  esc_attr( get_theme_mod('site_layout_type') );
		
		if( ! $layout_type ){

			$layout_type = 'full-width-layout';
			$layout_type = esc_attr($layout_type);
		}		

			
}

endif;



// front page banner type
if( !function_exists( 'business_champ_front_banner_type' ) ):
	/**
	 *  Returns front page banner type
	 */
	function business_champ_front_banner_type(){		

		$banner = esc_attr( get_theme_mod('front_banner_type') );
		if( $banner ){

			return $banner;
		}
		$banner = "image-banner";

		return esc_attr($banner);
	}
endif;


// inner page banner type
if( !function_exists( 'business_champ_site_banner_type' ) ):
	/**
	 *  Returns inner page banner type
	 */
	function business_champ_site_banner_type(){		

		$banner = esc_attr( get_theme_mod('site_banner_type') ); 
		if( $banner ){

			return $banner;
		}
		$banner = "image-banner";

		return esc_attr($banner);
	}

endif;





// post archive sidebar position ( left/right/none )
if( !function_exists( 'business_champ_post_archive_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for posts archive
	 */
	function business_champ_post_archive_sidebar_pos( ){

		$pos = esc_attr( get_theme_mod(  'post_arhive_sidebar_pos' ) );
		if( ! $pos ){

			$right = 'right';

			return esc_attr($right);

		}else if( $pos == 'none' ){

			return false;

		}else{

			return $pos;
		}
	}

endif;


// post single sidebar position  ( left/right/none )
if( ! function_exists( 'business_champ_post_single_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for posts single
	 */
	function business_champ_post_single_sidebar_pos(){

		$pos = esc_attr( get_theme_mod(  'post_single_sidebar_type' ) );
		if( ! $pos ){

			$right = 'right';

			return esc_attr($right);

		}else if( $pos == 'none' ){

			return false;

		}else{

			return $pos;
		}
	}

endif;


// page sidebar position  ( left/right/none )
if( ! function_exists( 'business_champ_page_sidebar_pos' ) ):
	/**
	 *  Returns sidebar position for page
	 */
	function business_champ_page_sidebar_pos( ){
        
        $pos = get_post_meta( get_the_ID() , 'business-champ-sidebar-pos' , true );
        if( $pos == 'none' ){

        	return false;

        }else if ( ! $pos ){

        	$pos = esc_attr( get_theme_mod(  'page_sidebar_pos' ) );
			if( ! $pos ){

				$right = 'right';

				return esc_attr($right);

			}else if( $pos == 'none' ){

				return false;

			}else{

				return $pos;
			}

        }else{

        	return $pos;
        }
		
	}

endif;





// current sidebar id
if( ! function_exists( 'business_champ_get_sidebar_id' ) ):
	/**
	 *  Returns sidebar id for page/posts archive/single
	 */
	function business_champ_get_sidebar_id(){

		$post_type = get_post_type();
		$sid_c = 'sidebar-1';

		 if( 'post' == $post_type ){

			$sid =  esc_attr( get_theme_mod( 'post_sidebar_id' ) );
			if( $sid ){

				$sid_c = $sid;
			}

		}else if( 'page' == $post_type  ){
			
			$sid_pos = get_post_meta( get_the_ID() , 'page_sidebar_pos' , true );
				
			if ( $sid_pos == 'none' ){

				return false;

			}else if ( ! $sid_pos ){

				$sid = esc_attr( get_theme_mod( 'page_sidebar_id' ) );
				if( $sid ){

					$sid_c = $sid;
				}

			}else{

				$sid = get_post_meta( get_the_ID() , 'business-champ-sidebar-id' , true );
				if( $sid ){

					$sid_c = $sid;
				}

			}	

		}
		return $sid_c;
	}

endif;



// footer copyright text
if( !function_exists( 'business_champ_copyright_text' ) ):
	/**
	 *  Returns copyright text
	 */
	function business_champ_copyright_text(){

		$text = esc_attr( get_theme_mod( 'footer_copyright' ) );
		if( $text ){

			return $text;
		}
		return  esc_html( 'Copyright Themeglory. All rights reserved.' , 'business-champ');
		
	}

endif;
