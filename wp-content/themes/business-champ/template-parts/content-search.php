<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Champ
 */

?>

<div  id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>

    <div class="article-wrap business-champ-flex-wrap">
        
            <?php if( has_post_thumbnail() ):?>

                <div class="article-img-wrap">

                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('business-champ-img-525-350'); ?></a>
                </div>
            <?php endif; ?>
                    
        <div class="post-summary">

            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            
            <?php business_champ_categories(); ?>     
          
            <?php 
			the_excerpt();
           ?>
            <a href="<?php the_permalink();?>" class="custom-btn light-grey-btn"><?php esc_html_e('Details' , 'business-champ' );?></a>
        </div>
    </div>
</div>

