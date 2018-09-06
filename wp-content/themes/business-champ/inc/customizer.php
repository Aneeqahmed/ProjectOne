<?php
/**
 * Business Champ Theme Customizer
 *
 * @package Business_Champ
 */

/**
 * Load Update to Pro section
 */
 require get_template_directory() . '/inc/upgrade/class-customize.php';


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function business_champ_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';

	
	$wp_customize->get_section( 'title_tagline' )->title = __('Site name, tagline and logo', 'business-champ');
	$wp_customize->get_section( 'header_image' )->title = __('Add media' , 'business-champ');
	$wp_customize->get_section( 'title_tagline' )->priority = '5';
	$wp_customize->get_section( 'header_image' )->panel = 'business_champ_banner_panel';
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'business_champ_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'business_champ_customize_partial_blogdescription',
		) );
	}

	 class BC_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3>
            <?php echo esc_html( $this->label ); ?>
            </h3>
        <?php
        }
    } 

   
    
     $wp_customize->add_section( 'theme_detail', array(
            'title'    => __( 'About Theme', 'business-champ' ),
            'priority' => 1
        ) );
    
        
        $wp_customize->add_setting( 'upgrade_text', array(
            'default' => '',
            'sanitize_callback' => '__return_false'
        ) );
        
        $wp_customize->add_control( new Business_Champ_cstmz_Static_Text_Control( $wp_customize, 'upgrade_text', array(
            'section'     => 'theme_detail',
            'label'       => __( 'Upgrade to PRO', 'business-champ' ),
            'description' => array('')
        ) ) );




    require_once trailingslashit( get_template_directory() ) . '/inc/sanitize.php';

       // layout area
    $wp_customize->add_panel( 'business_champ_site_layout_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Layout Options', 'business-champ'),
    ) );

    // layout type
    $wp_customize->add_section(
        'business_champ_layout_type',
        array(
            'title'         => __('Layout type', 'business-champ'),
            'priority'      => 10,
            'panel'         => 'business_champ_site_layout_panel', 
        )
    );

    $wp_customize->add_setting(
        'site_layout_type',
        array(
            'default'           => 'full-width-layout',
            'sanitize_callback' => 'business_champ_sanitize_site_layout',
        )
    );

    $wp_customize->add_control(
        'site_layout_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site layout', 'business-champ'),
            'section'     => 'business_champ_layout_type',
            'description' => __('Select the layout type for your website', 'business-champ'),
            'choices' => array(
                'full-width-layout'    => __('Full Width', 'business-champ'),
                'box-layout'          => __('Boxed', 'business-champ'),
               
            ),
        )
    );

    /**
   * Banner type settings 
   */   

    // banner area
        $wp_customize->add_panel( 'business_champ_banner_panel', array(
            'priority'       => 10,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __('Banner Options', 'business-champ'),
        ) );

    // banner type
    $wp_customize->add_section(
        'business_champ_banner_panel',
        array(
            'title'         => __('Banner type', 'business-champ'),
            'priority'      => 10,
            'panel'         => 'business_champ_banner_panel', 
        )
    );

    // front page banner type
    $wp_customize->add_setting(
        'front_banner_type',
        array(
            'default'           => 'image-banner',
            'sanitize_callback' => 'business_champ_sanitize_banner_type',
        )
    );

    $wp_customize->add_control(
        'front_banner_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page banner type', 'business-champ'),
            'section'     => 'business_champ_banner_panel',
            'description' => __('Select the banner type for your front page', 'business-champ'),
            'choices' => array(               
                'image-banner'     => __('Image banner', 'business-champ'),
                'video-banner'=> __('Video banner', 'business-champ'),
                'no-banner'   => __('No banner (only menu)', 'business-champ')
            ),
        )
    );

    // inner page banner type
    $wp_customize->add_setting(
        'site_banner_type',
        array(
            'default'           => 'image-banner',
            'sanitize_callback' => 'business_champ_sanitize_banner_type',
        )
    );

    $wp_customize->add_control(
        'site_banner_type',
        array(
            'type'        => 'radio',
            'label'       => __('Inner page banner type', 'business-champ'),
            'section'     => 'business_champ_banner_panel',
            'description' => __('Select the banner type for all inner pages except the front page', 'business-champ'),
            'choices' => array(              
                'image-banner'     => __('Image banner', 'business-champ'),
                'video-banner'=> __('Video banner', 'business-champ'),
                'no-banner'   => __('No banner (only menu)', 'business-champ')
            ),
        )
    );    



/**
 * Header Setting 
 */

    // inner page image banner height
    $wp_customize->add_setting(
        'header_height',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '300',
        )       
    );

    $wp_customize->add_control( 'header_height', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'header_image',
        'label'       => __('Banner image height [default: 300px]', 'business-champ'),
        'input_attrs' => array(
            'min'   => 250,
            'max'   => 600,
            'step'  => 5,
        ),
    ) );

    // banner overlay
    $wp_customize->add_setting(
        'hide_overlay',
        array(
            'sanitize_callback' => 'business_champ_sanitize_checkbox',
        )       
    );

    $wp_customize->add_control(
        'hide_overlay',
        array(
            'type'      => 'checkbox',
            'label'     => __('Disable the overlay?', 'business-champ'),
            'section'   => 'header_image',
            'priority'  => 12,
        )
    );  

        // footer area
    $wp_customize->add_section(
        'business_champ_footer',
        array(
            'title'         => __('Footer Options', 'business-champ'),
            'priority'      => 18,
        )
    );

    
    // footer copyright text
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => __('Copyright Themeglory. All rights reserved.','business-champ'),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'footer_copyright',
        array(
            'type'        => 'text',
            'label'       => __('Footer copyright', 'business-champ'),
            'section'     => 'business_champ_footer',
            'description' => __('Enter copyright text', 'business-champ'),
        )
    );

    // sidebar area
 $wp_customize->add_panel( 'business_champ_sidebar_panel', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Sidebar Options', 'business-champ'),
    ) );



    // post sidebar position
    $wp_customize->add_section(
        'business_champ_sidebar_panel',
        array(
            'title'         => __('Post sidebar', 'business-champ'),
            'priority'      => 10,
            'panel'         => 'business_champ_sidebar_panel', 
        )
    );

    // post archive sidebar position
    $wp_customize->add_setting(
        'post_arhive_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'business_champ_sanitize_sidebar',
        )
    );

    $wp_customize->add_control(
        'post_arhive_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Post archive sidebar position', 'business-champ'),
            'section'     => 'business_champ_sidebar_panel',
            'description' => __('Select the sidebar position for post index/archive templates', 'business-champ'),
            'choices' => array(
                'none'    => __('No sidebar', 'business-champ'),
                'right'     => __('Right sidebar', 'business-champ'),
                'left'=> __('Left sidebar', 'business-champ')
            ),
        )
    );

    // post single sidebar posistion
    $wp_customize->add_setting(
        'post_single_sidebar_type',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'business_champ_sanitize_sidebar',
        )
    );

    $wp_customize->add_control(
        'post_single_sidebar_type',
        array(
            'type'        => 'radio',
            'label'       => __('Post single sidebar position', 'business-champ'),
            'section'     => 'business_champ_sidebar_panel',
            'description' => __('Select the sidebar position for post single templates', 'business-champ'),
            'choices' => array(
                'none'    => __('No sidebar', 'business-champ'),
                'right'     => __('Right sidebar', 'business-champ'),
                'left'=> __('Left sidebar', 'business-champ')
            ),
        )
    );

    // post sidebar id
    $wp_customize->add_setting(
        'post_sidebar_id',
        array(
            'default'           => 'sidebar-1',
            'sanitize_callback' => 'business_champ_sanitize_sidebar_id',
        )
    );

    $wp_customize->add_control(
        'post_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'business-champ'),
            'section'     => 'business_champ_sidebar_panel',
            'description' => __('Select sidebar for post archive/single pages. Will ignored if No sidebar is checked above', 'business-champ'),
            'choices' => business_champ_sidebars(),
        )
    );


    // page sidebar position
    $wp_customize->add_section(
        'business_champ_page_sidebar_panel',
        array(
            'title'         => __('Page sidebar', 'business-champ'),
            'priority'      => 10,
            'panel'         => 'business_champ_sidebar_panel', 
        )
    );

    $wp_customize->add_setting(
        'page_sidebar_pos',
        array(
            'default'           => 'right',
            'sanitize_callback' => 'business_champ_sanitize_sidebar',
        )
    );

    $wp_customize->add_control(
        'page_sidebar_pos',
        array(
            'type'        => 'radio',
            'label'       => __('Page sidebar position', 'business-champ'),
            'section'     => 'business_champ_page_sidebar_panel',
            'description' => __('Select the sidebar position for pages', 'business-champ'),
            'choices' => array(
                'none'    => __('No sidebar', 'business-champ'),
                'right'     => __('Right sidebar', 'business-champ'),
                'left'=> __('Left sidebar', 'business-champ')
            ),
        )
    );

    // page sidebar id
    $wp_customize->add_setting(
        'page_sidebar_id',
        array(
            'default'           => 'sidebar-1',
            'sanitize_callback' => 'business_champ_sanitize_sidebar_id',
        )
    );
    $wp_customize->add_control(
        'page_sidebar_id',
        array(
            'type'        => 'radio',
            'label'       => __('Select sidebar', 'business-champ'),
            'section'     => 'business_champ_page_sidebar_panel',
            'description' => __('Select sidebar for pages. Will ignored if No sidebar is checked above', 'business-champ'),
            'choices' => business_champ_sidebars(),
        )
    );



}
add_action( 'customize_register', 'business_champ_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function business_champ_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function business_champ_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_champ_customize_preview_js() {
	wp_enqueue_script( 'business-champ-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_champ_customize_preview_js' );


