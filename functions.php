<?php 
function register_cybergis_cert_menu() {
	register_nav_menu('cybergis-cert-main-menu',__( 'Main Menu' ));
	}
add_action( 'init', 'register_cybergis_cert_menu' );

add_theme_support( 'editor-styles' );

// =========================================================================
// BOOTSTRAP CSS
// =========================================================================
function enqueue_bootstrap_styles(){ 
    wp_enqueue_style('bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap_css', './style.css');
}
add_action( 'wp_enqueue_style', 'enqueue_bootstrap_styles' );

function wpdocs_theme_add_editor_styles() {
    add_editor_style( array(
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css'
    ) );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
// =========================================================================
// BOOTSTRAP JAVASCRIPT
// =========================================================================
function enqueue_bootstrap_scripts() {  
    // wp_enqueue_script( 'bootstrap_jquery', '//code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.3.1', true );
    wp_enqueue_script( 'bootstrap_popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', array(), '2.10.2', true );
    wp_enqueue_script( 'bootstrap_javascript', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array(), '5.1.3', true );
    wp_enqueue_script( 'font-awesome-5', 'https://kit.fontawesome.com/7f22b2ac6e.js', array(), '4.3.1', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_bootstrap_scripts' );

function add_style_attributes( $html, $handle ) {
    if ( 'bootstrap-css' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM' crossorigin='anonymous'", $html );
    }
    return $html;
}
add_filter( 'script_loader_tag', 'add_style_attributes', 10, 2 );

function add_script_attributes( $html, $handle ) {
    if ( 'font-awesome-5' === $handle ) {
        return str_replace( "media='all'", "media='all' crossorigin='anonymous'", $html );
    }
    if ( 'bootstrap_popper' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p' crossorigin='anonymous'", $html );
    }
    if ( 'bootstrap_javascript' === $handle ) {
        return str_replace( "media='all'", "media='all' integrity='sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF'  crossorigin='anonymous'", $html );
    }
    return $html;
}
add_filter( 'script_loader_tag', 'add_script_attributes', 10, 2 );



//Home page hero section Block
function cybergis_cert_hero_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'cybergis-hero-section',
			'title'				=> __('CyberGIS Cert Hero'),
			'description'		=> __('A custom block for hero section for CyberGIS Certificate program'),
			'render_template'	=> 'template-parts/blocks/hero-section/block-hero-section.php',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/hero-section/block-hero-section.css',
		));
	}
}
add_action('acf/init', 'cybergis_cert_hero_block');

//Home page reasons section Block
function cybergis_cert_reasons_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'cybergis-reasons-section',
			'title'				=> __('CyberGIS Cert Reasons'),
			'description'		=> __('A custom block for reasons section for CyberGIS Certificate program'),
			'render_template'	=> 'template-parts/blocks/reasons-section/block-reasons-section.php',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/reasons-section/block-reasons-section.css',
		));
	}
}
add_action('acf/init', 'cybergis_cert_reasons_block');

//Home page programs section Block
function cybergis_cert_programs_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'cybergis-programs-section',
			'title'				=> __('Programs Section'),
			'description'		=> __('A custom block for programs section for CyberGIS Certificate program'),
			'render_template'	=> 'template-parts/blocks/programs-section/block-programs-section.php',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/programs-section/block-programs-section.css',
		));
	}
}
add_action('acf/init', 'cybergis_cert_programs_block'); 

//Page header section
function cybergis_cert_page_header_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'cybergis-page-header-section',
			'title'				=> __('Page Header Section'),
			'description'		=> __('A custom block for page header section for CyberGIS Certificate program'),
			'render_template'	=> 'template-parts/blocks/page-header-section/block-page-header-section.php',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/page-header-section/block-page-header-section.css',
		));
	}
}
add_action('acf/init', 'cybergis_cert_page_header_block'); 

//programs section - curriculum page
function cybergis_cert_curriculum_programs_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'cybergis-curriculum-programs-section',
			'title'				=> __('Curriculum Programs Section'),
			'description'		=> __('A custom block for curriculum programs section for CyberGIS Certificate program'),
			'render_template'	=> 'template-parts/blocks/curriculum-programs-section/block-curriculum-programs-section.php',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/curriculum-programs-section/block-curriculum-programs-section.css',
		));
	}
}
add_action('acf/init', 'cybergis_cert_curriculum_programs_block'); 

//programs section - curriculum page
function cybergis_cert_course_list_block() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'cybergis-curriculum-course-list-section',
			'title'				=> __('Curriculum Course List Section'),
			'description'		=> __('A custom block for curriculum programs section for CyberGIS Certificate program'),
			'render_template'	=> 'template-parts/blocks/curriculum-course-list-section/block-curriculum-course-list-section.php',
			'category'			=> 'layout',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'hero' ),
            'enqueue_style'     => get_stylesheet_directory_uri() . '/template-parts/blocks/curriculum-course-list-section/curriculum-course-list-section.css',
		));
	}
}
add_action('acf/init', 'cybergis_cert_course_list_block'); 