<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Business_Champ
 */


?>
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-wrap'); ?>>

    <div class="article-wrap business-champ-flex-wrap">
        
            <?php if( business_champ_feat_image() ):?>
                <div class="article-img-wrap">

                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail('business-champ-img-525-350'); ?></a>

                </div>
            <?php endif; ?>
                    
        <div class="post-summary <?php if( ! business_champ_feat_image()) echo 'full-width';?>">
            
            <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

            <?php business_champ_categories(); ?> 

            <?php business_champ_comment_count(); ?>

            <?php the_excerpt(); ?>

            <div class="bc-post-footer clearfix">

                <div class="bc-post-footer-left">

                <?php business_champ_author();?>  
                                             
                 <?php business_champ_posted_on(); ?>
                </div>
                <div class="bc-post-footer-right">
                    <a href="<?php the_permalink();?>" class="custom-btn light-grey-btn"><?php esc_html_e('Details' , 'business-champ' );?></a>
                </div>
            </div>
        </div>
    </div>
</div>          
