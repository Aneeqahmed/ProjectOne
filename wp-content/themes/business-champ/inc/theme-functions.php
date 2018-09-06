<?php

if( ! function_exists( 'business_champ_banner_image' ) ):

	function business_champ_banner_image(){
		?>
		<section id="staticBanner" class="bc-site-static-banner front-page header_height">
			<?php if( esc_attr( get_theme_mod('header_image') ) ){
				the_header_image_tag();
				?>
				<?php }else{?>
				<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/slider1.jpg');?>">
				<?php } ?>
				<?php if( ! esc_attr( get_theme_mod('hide_overlay') ) ):?>
					<div class="banner-overlay">
					</div>
				<?php endif; ?>
			</section>
			<?php
	} 

endif;



if( ! function_exists( 'business_champ_banner_video' ) ):
	function business_champ_banner_video(){
?>
		<section id="staticBanner" class="bc-site-static-banner front-page video-banner">
			<?php if( esc_attr ( get_theme_mod('external_header_video') ) ){?>
			<?php 
			echo wp_oembed_get( esc_attr( get_theme_mod('external_header_video') ) , array( 'banner' => 1 ) );
			?>

			<?php }else{?>

			<?php if(get_header_video_url()){?>
			<video controls='false' autoplay muted loop>
				<source src="<?php echo  esc_url(get_header_video_url());?>" type="video/mp4">
					<?php esc_html_e('Your browser does not support the video tag.' , 'business-champ')?>
				</video>

				<?php }else{ ?>

				<p class="alert alert-danger">
					<?php esc_html_e('Please upload banner video. Go to: Customize > Banner Setting > Add Media' , 'business-champ' );?>
				</p>
				<?php } ?>

				<?php } ?>

				<?php if( ! esc_attr( get_theme_mod('hide_overlay') ) ):?>
					<div class="banner-overlay"></div>
				<?php endif; ?>
			</section>
		<?php
		}

endif;





if( ! function_exists('business_champ_post_single_title') ):

	function business_champ_post_single_title(){
		?>
		<div class="business-champ-flex-wrap caption">

			<div class="article-wrap onDetails">

				<h1 class="post-title">
					<?php the_title(); ?>
				</h1>

				

					<?php business_champ_posted_on(); ?>

				

				<?php business_champ_categories(); ?>

				<?php business_champ_comment_count(); ?>



			</div>

		</div>
		<?php
	}

endif;

if( ! function_exists('business_champ_dynamic_css') ):
function business_champ_dynamic_css(){
	ob_start();
	?>
	<style>
		.header_height{ height:<?php echo business_champ_header_height();?>;}
		<?php 
		if( business_champ_hide_overlay() ):
		?>
		.slides li:before{ display:none;}
		<?php endif; ?>
		
		
	



	</style>
	<?php 
	echo ob_get_clean();
}

endif;
add_action( 'wp_head' , 'business_champ_dynamic_css' , 55 );


