<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Champ
 */

?>  
   </div>    
     <div class="bc-bottom-section">
            <div class="container-large">
            <?php echo business_champ_copyright_text();?>  
            <span>  |  </span>     
            <?php  echo sprintf( esc_html__( 'Powered by  %s', 'business-champ' ), '<a target="_blank" rel="designer" href="https://themeglory.com/">' . esc_html__( 'Themeglory', 'business-champ' ) . '</a>' ); ?> 
        </div>    
    </div>
    <!--Ends-->
      
<?php wp_footer(); ?>

</body>
</html>



