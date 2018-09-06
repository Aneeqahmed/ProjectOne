<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Business_Champ
 */

get_header(); 
$sidebar = business_champ_post_single_sidebar_pos();


if( ! $sidebar ){
  $row =  'aGrid';
}else if($sidebar=='left'){
  $row = 'col_2-30-70';
}else{
  $row = 'col_2-70-30';
}

?>
<?php get_template_part( 'template-parts/banner' );?>

<section id="postSingle" class="business-champ-single">
    <div class="<?php echo business_champ_site_container();?> business-champ-content-wrapper">
        <div class="<?php echo esc_attr($row);?>">
          
          <?php if( $sidebar == 'left' ):  get_sidebar();  endif; ?>     

            <div class="cols" >

                <div class="post-details">


                    <?php
                    while ( have_posts() ) : the_post();

                    get_template_part( 'template-parts/content', 'single' );
                    
                    if( 'post' == get_post_type() ):
                        
                        business_champ_author(); 
                    
                    endif;

                    the_post_navigation( array( 'screen_reader_text' => '','prev_text'=> __('Previous' , 'business-champ') , 'next_text'=>__('Next' , 'business-champ' )) );

                  
                    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

endwhile; // End of the loop.
?>




</div>

</div> 
  <?php if( $sidebar == 'right' ):  get_sidebar();  endif; ?>     
</div>
</div>
</section>

<?php

get_footer();