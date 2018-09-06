<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Champ
 */

get_header(); 

$sidebar = business_champ_post_archive_sidebar_pos();

if( ! $sidebar ){
  $row =  'aGrid';
}else if($sidebar=='left'){
  $row = 'col_2-30-70';
}else{
  $row = 'col_2-70-30';
}
?>

<?php get_template_part( 'template-parts/banner' );?>

    <section id="postList" class="bc-site-blog-list all-article-wrap post-<?php echo business_champ_blog_layout()?>-view ">
    	<div class="<?php echo business_champ_site_container();?> business-champ-content-wrapper">
 

    		<div class="<?php echo esc_attr($row);?>">  
            
              
              <?php if( $sidebar == 'left' ):  get_sidebar();  endif; ?>        
                
    			<div class="cols">

                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="archive-description">', '</div>' );
                ?> 
                
    				
    				 <?php 
    				 if ( have_posts() ) :
	    				 /* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content-'.business_champ_blog_layout(), get_post_format() );

						endwhile;

                         do_action('business_champ_posts_navigation'); 
						
					else :

					get_template_part( 'template-parts/content', 'none' );

					endif; ?>
    				 
    			
    			</div>
                <?php if( $sidebar == 'right' ):  get_sidebar();  endif; ?>   
    		</div>
    	</div>
    </section>
<?php

get_footer();
