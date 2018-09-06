<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Champ
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>


<body <?php body_class( business_champ_body_site_layout() ); ?> data-container="<?php echo business_champ_site_container();?>">
<?php if(is_home() || is_front_page()): ?>
<?php endif;?>



<div class="bc-body-wrapp <?php echo business_champ_header_type();?>">

    <!--Header Component-->
    <header id="siteHeader" class="business-champ-header <?php  business_champ_header_class(); ?>">

        <div class="<?php echo business_champ_site_container();?>">
            <div class=" bc-flex-center full-width">
                <div class="bc-logo-part">
                    <div class="bc-logo-wrapper">
                        <?php
                        the_custom_logo();
                        if( display_header_text() ):
                        ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php 
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html($description); ?></p>
                            <?php
                            endif; 
                        endif; 
                        ?>
                    </div>
                </div>
                <div class="bc-menu-part text-align-right">
                               <!--Mobile view ham menu-->
                <div class="mobile-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <!--Ends-->
                    <nav class="menu-main">
                    <?php 
                                wp_nav_menu( array(
                                    'theme_location' => 'primary-menu',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'     => 'floted-li clearfix d-i-b',
                                     'walker'        => '',
                                    'fallback_cb'    => 'wp_page_menu',
                                ) );

                    ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

	
