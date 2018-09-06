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
         <div class="post-details">
                    <?php 
               
                          business_champ_post_single_title();
                   
                    ?>
                    
                        <?php if( business_champ_single_feat_image() ):?>
                            <div class="business-champ-image-wrapper">
                        
                            <?php the_post_thumbnail(); ?>
                        
                        </div>
                    <?php endif; ?>
                    
            
                    
        <div class="post-detail">
           <?php the_content(); ?>
        </div>
    </div>
</div> 
</div>