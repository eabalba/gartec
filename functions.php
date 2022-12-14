<?php 

/* TITLE TAG */
add_theme_support( 'title-tag' );
if ( ! function_exists( 'hsd_render_title_tag' ) ) {
	function hsd_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'hsd_render_title' );
}

/* THUMBNAIL SUPPORT */
add_theme_support( 'post-thumbnails' );
add_image_size( 'extra-large', 1800, 9999, false );
add_image_size( 'portrait', 400, 560, true );
add_image_size( 'landscape', 560, 400, true );
add_image_size( 'large-thumb', 300, 300, true );

/* ADD CLASS TO GRAVITY FORMS BUTTON */
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button($button, $form) {
    return '<input type="submit" class="button btn btn-primary" id="gform_submit_button_' . $form['id'] . '" value="' . $form['button']['text'] . '">';
}

/* SHORTCODES */
function lead_function( $atts, $content = null ) {
    return '<p class="lead">' . $content . '</p>';
}

add_shortcode('lead', 'lead_function');

function cta_function( $atts, $content = null ) {
    return '<p class="cta">' . $content . '</p>';
}

add_shortcode('cta', 'cta_function');

/**********************************************************/
/* ENQUEUE SCRIPTS
/**********************************************************/

function hsd_scripts() {
    // css
    wp_enqueue_style( 'gfonts',  get_template_directory_uri() . '/assets/fonts/style.css');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'icons', get_template_directory_uri() . '/assets/fonts/icons.css' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.min.css' );
    wp_enqueue_style( 'shop',  get_template_directory_uri() . '/shop-style.css');
      wp_enqueue_style( 'gutenberg', get_template_directory_uri() . '/assets/css/gutenberg-b9.css' );
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );
    // js
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '5.0.0', true );
    wp_enqueue_script( 'fitvids-js', get_template_directory_uri() . '/assets/js/jquery.fitvids.min.js', array(), '1.2.0', true );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.9.0', true );
    wp_enqueue_script( 'scripts-js', get_template_directory_uri() . '/scripts.js', array(), '1.0', true );
}
add_action('wp_enqueue_scripts', 'hsd_scripts');
    
/**********************************************************/
/* THEME OPTIONS
/**********************************************************/

function hsd_customize_register( $wp_customize ) {

    // Logo
    
    $wp_customize->add_setting( 'hsd_logo' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'hsd_logo', array(
      'label' => __( 'Logo', 'hsd' ),
      'section' => 'hsd_logo_section',
      'settings' => 'hsd_logo',
    )));

    $wp_customize->add_setting( 'hsd_footer_logo' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'hsd_footer_logo', array(
      'label' => __( 'Footer Logo', 'hsd' ),
      'section' => 'hsd_logo_section',
      'settings' => 'hsd_footer_logo',
    )));
    
    $wp_customize->add_section( 'hsd_logo_section' , array(
      'title' => __( 'Logo', 'hsd' )
    ) );   
    
    // Contact details
    
    $wp_customize->add_setting('hsd_contact_phone', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_contact_phone', array(
		'settings' => 'hsd_contact_phone',
		'label' => 'Phone',
		'section' => 'hsd_contact_section',
		'type' => 'input',
	   ) );
    
    $wp_customize->add_setting('hsd_contact_email', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_contact_email', array(
      'label' => 'Email',
      'section' => 'hsd_contact_section',
      'settings' => 'hsd_contact_email',
      'type' => 'input',
    ));

    $wp_customize->add_setting('hsd_contact_fax', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_contact_fax', array(
      'label' => 'Fax',
      'section' => 'hsd_contact_section',
      'settings' => 'hsd_contact_fax',
      'type' => 'input',
    ));

    $wp_customize->add_setting('hsd_contact_address', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_contact_address', array(
      'label' => 'Address',
      'section' => 'hsd_contact_section',
      'settings' => 'hsd_contact_address',
      'type' => 'textarea',
    ));

    $wp_customize->add_setting('hsd_contact_opening', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_contact_opening', array(
      'label' => 'Opening Hours',
      'section' => 'hsd_contact_section',
      'settings' => 'hsd_contact_opening',
      'type' => 'textarea',
    ));
    
    $wp_customize->add_section('hsd_contact_section' , array(
      'title' => __('Contact Details', 'hsd'),
    ));
    
   	// Social

	$wp_customize->add_setting('hsd_social_twitter', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_social_twitter', array(
		'settings' => 'hsd_social_twitter',
		'label' => 'Twitter',
		'section' => 'hsd_social_section',
		'type' => 'input',
	) );

	$wp_customize->add_setting('hsd_social_facebook', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_social_facebook', array(
		'settings' => 'hsd_social_facebook',
		'label' => 'Facebook',
		'section' => 'hsd_social_section',
		'type' => 'input',
	) );

	$wp_customize->add_setting('hsd_social_youtube', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_social_youtube', array(
		'settings' => 'hsd_social_youtube',
		'label' => 'Youtube',
		'section' => 'hsd_social_section',
		'type' => 'input',
	) );

	$wp_customize->add_setting('hsd_social_instagram', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_social_instagram', array(
		'settings' => 'hsd_social_instagram',
		'label' => 'Instagram',
		'section' => 'hsd_social_section',
		'type' => 'input',
	) );

	$wp_customize->add_setting('hsd_social_linkedin', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_social_linkedin', array(
		'settings' => 'hsd_social_linkedin',
		'label' => 'Linkedin',
		'section' => 'hsd_social_section',
		'type' => 'input',
	) );
    
    $wp_customize->add_section('hsd_social_section' , array(
      'title' => __('Social', 'hsd'),
    ));

    // Case Studies

  $wp_customize->add_setting('hsd_casestudies_text', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_casestudies_text', array(
    'settings' => 'hsd_casestudies_text',
    'label' => 'Case studies text',
    'section' => 'hsd_casestudies_section',
    'type' => 'textarea',
  ) );

    $wp_customize->add_setting( 'hsd_casestudies_img' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'hsd_casestudies_img', array(
      'label' => __( 'Case studies image', 'hsd' ),
      'section' => 'hsd_casestudies_section',
      'settings' => 'hsd_casestudies_img',
    )));

    $wp_customize->add_section('hsd_casestudies_section' , array(
      'title' => __('Case Studies', 'hsd'),
    ));

    // Blog

  $wp_customize->add_setting('hsd_blog_text', 'sanitize_callback' == 'esc_url_raw');
    
    $wp_customize->add_control( 'hsd_blog_text', array(
    'settings' => 'hsd_blog_text',
    'label' => 'Blog text',
    'section' => 'hsd_blog_section',
    'type' => 'textarea',
  ) );

    $wp_customize->add_setting( 'hsd_blog_img' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'hsd_blog_img', array(
      'label' => __( 'Blog image', 'hsd' ),
      'section' => 'hsd_blog_section',
      'settings' => 'hsd_blog_img',
    )));

    $wp_customize->add_section('hsd_blog_section' , array(
      'title' => __('Blog', 'hsd'),
    ));

}
add_action( 'customize_register', 'hsd_customize_register' );

/**********************************************************/
/* CASE STUDIES CUSTOM POST TYPE
/**********************************************************/

function hsd_casestudies() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'hsd' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'hsd' ),
		'menu_name'             => __( 'Case Studies', 'hsd' ),
		'name_admin_bar'        => __( 'Case Studies', 'hsd' ),
		'archives'              => __( 'Item Archives', 'hsd' ),
		'attributes'            => __( 'Item Attributes', 'hsd' ),
		'parent_item_colon'     => __( 'Parent Item:', 'hsd' ),
		'all_items'             => __( 'All Items', 'hsd' ),
		'add_new_item'          => __( 'Add New Item', 'hsd' ),
		'add_new'               => __( 'Add New', 'hsd' ),
		'new_item'              => __( 'New Item', 'hsd' ),
		'edit_item'             => __( 'Edit Item', 'hsd' ),
		'update_item'           => __( 'Update Item', 'hsd' ),
		'view_item'             => __( 'View Item', 'hsd' ),
		'view_items'            => __( 'View Items', 'hsd' ),
		'search_items'          => __( 'Search Item', 'hsd' ),
		'not_found'             => __( 'Not found', 'hsd' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hsd' ),
		'featured_image'        => __( 'Featured Image', 'hsd' ),
		'set_featured_image'    => __( 'Set featured image', 'hsd' ),
		'remove_featured_image' => __( 'Remove featured image', 'hsd' ),
		'use_featured_image'    => __( 'Use as featured image', 'hsd' ),
		'insert_into_item'      => __( 'Insert into item', 'hsd' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'hsd' ),
		'items_list'            => __( 'Items list', 'hsd' ),
		'items_list_navigation' => __( 'Items list navigation', 'hsd' ),
		'filter_items_list'     => __( 'Filter items list', 'hsd' ),
	);
	$args = array(
		'label'                 => __( 'Case Study', 'hsd' ),
		'description'           => __( 'Post Type Description', 'hsd' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'   			=> 'dashicons-clipboard',
		'capability_type'       => 'page',
		'rewrite' => array( 
    		'with_front'    => false 
		)	
	);
	register_post_type( 'case-studies', $args );

}
add_action( 'init', 'hsd_casestudies', 0 );

/**********************************************************/
/* PROJECTS CUSTOM POST TYPE
/**********************************************************/

function hsd_projects() {

  $labels = array(
    'name'                  => _x( 'Projects', 'Post Type General Name', 'hsd' ),
    'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'hsd' ),
    'menu_name'             => __( 'Projects', 'hsd' ),
    'name_admin_bar'        => __( 'Projects', 'hsd' ),
    'archives'              => __( 'Item Archives', 'hsd' ),
    'attributes'            => __( 'Item Attributes', 'hsd' ),
    'parent_item_colon'     => __( 'Parent Item:', 'hsd' ),
    'all_items'             => __( 'All Items', 'hsd' ),
    'add_new_item'          => __( 'Add New Item', 'hsd' ),
    'add_new'               => __( 'Add New', 'hsd' ),
    'new_item'              => __( 'New Item', 'hsd' ),
    'edit_item'             => __( 'Edit Item', 'hsd' ),
    'update_item'           => __( 'Update Item', 'hsd' ),
    'view_item'             => __( 'View Item', 'hsd' ),
    'view_items'            => __( 'View Items', 'hsd' ),
    'search_items'          => __( 'Search Item', 'hsd' ),
    'not_found'             => __( 'Not found', 'hsd' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'hsd' ),
    'featured_image'        => __( 'Featured Image', 'hsd' ),
    'set_featured_image'    => __( 'Set featured image', 'hsd' ),
    'remove_featured_image' => __( 'Remove featured image', 'hsd' ),
    'use_featured_image'    => __( 'Use as featured image', 'hsd' ),
    'insert_into_item'      => __( 'Insert into item', 'hsd' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'hsd' ),
    'items_list'            => __( 'Items list', 'hsd' ),
    'items_list_navigation' => __( 'Items list navigation', 'hsd' ),
    'filter_items_list'     => __( 'Filter items list', 'hsd' ),
  );
  $args = array(
    'label'                 => __( 'Project', 'hsd' ),
    'description'           => __( 'Post Type Description', 'hsd' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor', 'thumbnail' ),
    'hierarchical'          => true,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'menu_icon'             => 'dashicons-clipboard',
    'capability_type'       => 'post',
	  'rewrite' => array( 
		  'with_front'    => false 
	  )	
  );
  register_post_type( 'projects', $args );

}
add_action( 'init', 'hsd_projects', 0 );

// Project Section Taxonomy
function hsd_project_section() {

  $labels = array(
    'name'                       => _x( 'Project Sections', 'Taxonomy General Name', 'hsd' ),
    'singular_name'              => _x( 'Project Section', 'Taxonomy Singular Name', 'hsd' ),
    'menu_name'                  => __( 'Project Sections', 'hsd' ),
    'all_items'                  => __( 'All Items', 'hsd' ),
    'parent_item'                => __( 'Parent Item', 'hsd' ),
    'parent_item_colon'          => __( 'Parent Item:', 'hsd' ),
    'new_item_name'              => __( 'New Item Name', 'hsd' ),
    'add_new_item'               => __( 'Add New Item', 'hsd' ),
    'edit_item'                  => __( 'Edit Item', 'hsd' ),
    'update_item'                => __( 'Update Item', 'hsd' ),
    'view_item'                  => __( 'View Item', 'hsd' ),
    'separate_items_with_commas' => __( 'Separate items with commas', 'hsd' ),
    'add_or_remove_items'        => __( 'Add or remove items', 'hsd' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'hsd' ),
    'popular_items'              => __( 'Popular Items', 'hsd' ),
    'search_items'               => __( 'Search Items', 'hsd' ),
    'not_found'                  => __( 'Not Found', 'hsd' ),
    'no_terms'                   => __( 'No items', 'hsd' ),
    'items_list'                 => __( 'Items list', 'hsd' ),
    'items_list_navigation'      => __( 'Items list navigation', 'hsd' ),
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
	  'rewrite' => array( 
    		'with_front'    => false 
		)	
  );
  register_taxonomy( 'project_section', array( 'projects' ), $args );

}
//add_action( 'init', 'hsd_project_section', 0 );

/**********************************************************/
/* TESTIMONIALS CUSTOM POST TYPE
/**********************************************************/

function hsd_testimonials() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'hsd' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'hsd' ),
		'menu_name'             => __( 'Testimonials', 'hsd' ),
		'name_admin_bar'        => __( 'Testimonial', 'hsd' ),
		'archives'              => __( 'Item Archives', 'hsd' ),
		'attributes'            => __( 'Item Attributes', 'hsd' ),
		'parent_item_colon'     => __( 'Parent Item:', 'hsd' ),
		'all_items'             => __( 'All Items', 'hsd' ),
		'add_new_item'          => __( 'Add New Item', 'hsd' ),
		'add_new'               => __( 'Add New', 'hsd' ),
		'new_item'              => __( 'New Item', 'hsd' ),
		'edit_item'             => __( 'Edit Item', 'hsd' ),
		'update_item'           => __( 'Update Item', 'hsd' ),
		'view_item'             => __( 'View Item', 'hsd' ),
		'view_items'            => __( 'View Items', 'hsd' ),
		'search_items'          => __( 'Search Item', 'hsd' ),
		'not_found'             => __( 'Not found', 'hsd' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'hsd' ),
		'featured_image'        => __( 'Featured Image', 'hsd' ),
		'set_featured_image'    => __( 'Set featured image', 'hsd' ),
		'remove_featured_image' => __( 'Remove featured image', 'hsd' ),
		'use_featured_image'    => __( 'Use as featured image', 'hsd' ),
		'insert_into_item'      => __( 'Insert into item', 'hsd' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'hsd' ),
		'items_list'            => __( 'Items list', 'hsd' ),
		'items_list_navigation' => __( 'Items list navigation', 'hsd' ),
		'filter_items_list'     => __( 'Filter items list', 'hsd' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'hsd' ),
		'description'           => __( 'Post Type Description', 'hsd' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'menu_icon'   			=> 'dashicons-star-filled',
		'capability_type'       => 'page',
		'rewrite' => array( 
    		'with_front'    => false 
		)	
	);
	register_post_type( 'testimonials', $args );

}
add_action( 'init', 'hsd_testimonials', 0 );


/**********************************************************/
/* REMOVE [...] FROM EXCERPT
/**********************************************************/

function hsd_excerpt_more($more) {
    global $post;
    return '...';
    }
    add_filter('excerpt_more', 'hsd_excerpt_more');

    add_filter( 'excerpt_length', function($length) {
    return 18;
} );

/**********************************************************/
/* SIDEBARS
/**********************************************************/

add_action( 'widgets_init', 'hsd_sidebar' );
function hsd_sidebar() {

  $my_sidebars = array(
    array(
      'name'          => 'Footer 1',
      'id'            => 'footer',
      'description'   => '',
    ),
    array(
      'name'          => 'Footer 2',
      'id'            => 'footer2',
      'description'   => '',
    ),
    array(
      'name'          => 'Footer 3',
      'id'            => 'footer3',
      'description'   => '',
    ),
    array(
      'name'          => 'Footer 4',
      'id'            => 'footer4',
      'description'   => '',
    )
  );

  $defaults = array(
    'name'          => 'Sidebar',
    'id'            => 'sidebar',
    'description'   => '',
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  );

  foreach( $my_sidebars as $sidebar ) {
    $args = wp_parse_args( $sidebar, $defaults );
    register_sidebar( $args );
  }

}

/**********************************************************/
/* MENUS
/**********************************************************/

register_nav_menus(array(
    'main' => 'Main Menu'
));

// Walker

if ( ! class_exists( 'WP_Bootstrap_Navwalker' ) ) {
    /**
     * WP_Bootstrap_Navwalker class.
     *
     * @extends Walker_Nav_Menu
     */
    class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {

        /**
         * Starts the list before the elements are added.
         *
         * @since WP 3.0.0
         *
         * @see Walker_Nav_Menu::start_lvl()
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         */
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = str_repeat( $t, $depth );
            // Default class to add to the file.
            $classes = array( 'dropdown-menu' );
            /**
             * Filters the CSS class(es) applied to a menu list element.
             *
             * @since WP 4.8.0
             *
             * @param array    $classes The CSS classes that are applied to the menu `<ul>` element.
             * @param stdClass $args    An object of `wp_nav_menu()` arguments.
             * @param int      $depth   Depth of menu item. Used for padding.
             */
            $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            /**
             * The `.dropdown-menu` container needs to have a labelledby
             * attribute which points to it's trigger link.
             *
             * Form a string for the labelledby attribute from the the latest
             * link with an id that was added to the $output.
             */
            $labelledby = '';
            // find all links with an id in the output.
            preg_match_all( '/(<a.*?id=\"|\')(.*?)\"|\'.*?>/im', $output, $matches );
            // with pointer at end of array check if we got an ID match.
            if ( end( $matches[2] ) ) {
                // build a string to use as aria-labelledby.
                $labelledby = 'aria-labelledby="' . end( $matches[2] ) . '"';
            }
            $output .= "{$n}{$indent}<ul$class_names $labelledby role=\"menu\">{$n}";
        }

        /**
         * Starts the element output.
         *
         * @since WP 3.0.0
         * @since WP 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
         *
         * @see Walker_Nav_Menu::start_el()
         *
         * @param string   $output Used to append additional content (passed by reference).
         * @param WP_Post  $item   Menu item data object.
         * @param int      $depth  Depth of menu item. Used for padding.
         * @param stdClass $args   An object of wp_nav_menu() arguments.
         * @param int      $id     Current item ID.
         */
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
                $t = '';
                $n = '';
            } else {
                $t = "\t";
                $n = "\n";
            }
            $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            // Initialize some holder variables to store specially handled item
            // wrappers and icons.
            $linkmod_classes = array();
            $icon_classes    = array();

            /**
             * Get an updated $classes array without linkmod or icon classes.
             *
             * NOTE: linkmod and icon class arrays are passed by reference and
             * are maybe modified before being used later in this function.
             */
            $classes = self::seporate_linkmods_and_icons_from_classes( $classes, $linkmod_classes, $icon_classes, $depth );

            // Join any icon classes plucked from $classes into a string.
            $icon_class_string = join( ' ', $icon_classes );

            /**
             * Filters the arguments for a single nav menu item.
             *
             *  WP 4.4.0
             *
             * @param stdClass $args  An object of wp_nav_menu() arguments.
             * @param WP_Post  $item  Menu item data object.
             * @param int      $depth Depth of menu item. Used for padding.
             */
            $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

            // Add .dropdown or .active classes where they are needed.
            if ( isset( $args->has_children ) && $args->has_children ) {
                $classes[] = 'dropdown';
            }
            if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current-menu-parent', $classes, true ) ) {
                $classes[] = 'active';
            }

            // Add some additional default classes to the item.
            $classes[] = 'menu-item-' . $item->ID;
            $classes[] = 'nav-item';

            // Allow filtering the classes.
            $classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

            // Form a string of classes in format: class="class_names".
            $class_names = join( ' ', $classes );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

            /**
             * Filters the ID applied to a menu item's list item element.
             *
             * @since WP 3.0.1
             * @since WP 4.1.0 The `$depth` parameter was added.
             *
             * @param string   $menu_id The ID that is applied to the menu item's `<li>` element.
             * @param WP_Post  $item    The current menu item.
             * @param stdClass $args    An object of wp_nav_menu() arguments.
             * @param int      $depth   Depth of menu item. Used for padding.
             */
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

            $output .= $indent . '<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"' . $id . $class_names . '>';

            // initialize array for holding the $atts for the link item.
            $atts = array();

            // Set title from item to the $atts array - if title is empty then
            // default to item title.
            if ( empty( $item->attr_title ) ) {
                $atts['title'] = ! empty( $item->title ) ? strip_tags( $item->title ) : '';
            } else {
                $atts['title'] = $item->attr_title;
            }

            $atts['target'] = ! empty( $item->target ) ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
            // If item has_children add atts to <a>.
            if ( isset( $args->has_children ) && $args->has_children && 0 === $depth && $args->depth > 1 ) {
                $atts['href']          = $item->url;
                $atts['data-toggle']   = 'dropdown';
                $atts['aria-haspopup'] = 'true';
                $atts['aria-expanded'] = 'false';
                $atts['class']         = 'dropdown-toggle nav-link';
                $atts['id']            = 'menu-item-dropdown-' . $item->ID;
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '#';
                // Items in dropdowns use .dropdown-item instead of .nav-link.
                if ( $depth > 0 ) {
                    $atts['class'] = 'dropdown-item';
                } else {
                    $atts['class'] = 'nav-link';
                }
            }

            // update atts of this item based on any custom linkmod classes.
            $atts = self::update_atts_for_linkmod_type( $atts, $linkmod_classes );
            // Allow filtering of the $atts array before using it.
            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

            // Build a string of html containing all the atts for the item.
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            /**
             * Set a typeflag to easily test if this is a linkmod or not.
             */
            $linkmod_type = self::get_linkmod_type( $linkmod_classes );

            /**
             * START appending the internal item contents to the output.
             */
            $item_output = isset( $args->before ) ? $args->before : '';
            /**
             * This is the start of the internal nav item. Depending on what
             * kind of linkmod we have we may need different wrapper elements.
             */
            if ( '' !== $linkmod_type ) {
                // is linkmod, output the required element opener.
                $item_output .= self::linkmod_element_open( $linkmod_type, $attributes );
            } else {
                // With no link mod type set this must be a standard <a> tag.
                $item_output .= '<a' . $attributes . '>';
            }

            /**
             * Initiate empty icon var, then if we have a string containing any
             * icon classes form the icon markup with an <i> element. This is
             * output inside of the item before the $title (the link text).
             */
            $icon_html = '';
            if ( ! empty( $icon_class_string ) ) {
                // append an <i> with the icon classes to what is output before links.
                $icon_html = '<i class="' . esc_attr( $icon_class_string ) . '" aria-hidden="true"></i> ';
            }

            /** This filter is documented in wp-includes/post-template.php */
            $title = apply_filters( 'the_title', $item->title, $item->ID );

            /**
             * Filters a menu item's title.
             *
             * @since WP 4.4.0
             *
             * @param string   $title The menu item's title.
             * @param WP_Post  $item  The current menu item.
             * @param stdClass $args  An object of wp_nav_menu() arguments.
             * @param int      $depth Depth of menu item. Used for padding.
             */
            $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

            /**
             * If the .sr-only class was set apply to the nav items text only.
             */
            if ( in_array( 'sr-only', $linkmod_classes, true ) ) {
                $title         = self::wrap_for_screen_reader( $title );
                $keys_to_unset = array_keys( $linkmod_classes, 'sr-only' );
                foreach ( $keys_to_unset as $k ) {
                    unset( $linkmod_classes[ $k ] );
                }
            }

            // Put the item contents into $output.
            $item_output .= isset( $args->link_before ) ? $args->link_before . $icon_html . $title . $args->link_after : '';
            /**
             * This is the end of the internal nav item. We need to close the
             * correct element depending on the type of link or link mod.
             */
            if ( '' !== $linkmod_type ) {
                // is linkmod, output the required element opener.
                $item_output .= self::linkmod_element_close( $linkmod_type, $attributes );
            } else {
                // With no link mod type set this must be a standard <a> tag.
                $item_output .= '</a>';
            }

            $item_output .= isset( $args->after ) ? $args->after : '';

            /**
             * END appending the internal item contents to the output.
             */
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

        }

        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth. It is possible to set the
         * max depth to include all depths, see walk() method.
         *
         * This method should not be called directly, use the walk() method instead.
         *
         * @since WP 2.5.0
         *
         * @see Walker::start_lvl()
         *
         * @param object $element           Data object.
         * @param array  $children_elements List of elements to continue traversing (passed by reference).
         * @param int    $max_depth         Max depth to traverse.
         * @param int    $depth             Depth of current element.
         * @param array  $args              An array of arguments.
         * @param string $output            Used to append additional content (passed by reference).
         */
        public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
            if ( ! $element ) {
                return; }
            $id_field = $this->db_fields['id'];
            // Display this element.
            if ( is_object( $args[0] ) ) {
                $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] ); }
            parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
        }

        /**
         * Menu Fallback
         * =============
         * If this function is assigned to the wp_nav_menu's fallback_cb variable
         * and a menu has not been assigned to the theme location in the WordPress
         * menu manager the function with display nothing to a non-logged in user,
         * and will add a link to the WordPress menu manager if logged in as an admin.
         *
         * @param array $args passed from the wp_nav_menu function.
         */
        public static function fallback( $args ) {
            if ( current_user_can( 'edit_theme_options' ) ) {

                /* Get Arguments. */
                $container       = $args['container'];
                $container_id    = $args['container_id'];
                $container_class = $args['container_class'];
                $menu_class      = $args['menu_class'];
                $menu_id         = $args['menu_id'];

                // initialize var to store fallback html.
                $fallback_output = '';

                if ( $container ) {
                    $fallback_output .= '<' . esc_attr( $container );
                    if ( $container_id ) {
                        $fallback_output .= ' id="' . esc_attr( $container_id ) . '"';
                    }
                    if ( $container_class ) {
                        $fallback_output .= ' class="' . esc_attr( $container_class ) . '"';
                    }
                    $fallback_output .= '>';
                }
                $fallback_output .= '<ul';
                if ( $menu_id ) {
                    $fallback_output .= ' id="' . esc_attr( $menu_id ) . '"'; }
                if ( $menu_class ) {
                    $fallback_output .= ' class="' . esc_attr( $menu_class ) . '"'; }
                $fallback_output .= '>';
                $fallback_output .= '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '" title="' . esc_attr__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '">' . esc_html__( 'Add a menu', 'wp-bootstrap-navwalker' ) . '</a></li>';
                $fallback_output .= '</ul>';
                if ( $container ) {
                    $fallback_output .= '</' . esc_attr( $container ) . '>';
                }

                // if $args has 'echo' key and it's true echo, otherwise return.
                if ( array_key_exists( 'echo', $args ) && $args['echo'] ) {
                    echo $fallback_output; // WPCS: XSS OK.
                } else {
                    return $fallback_output;
                }
            }
        }

        /**
         * Find any custom linkmod or icon classes and store in their holder
         * arrays then remove them from the main classes array.
         *
         * Supported linkmods: .disabled, .dropdown-header, .dropdown-divider, .sr-only
         * Supported iconsets: Font Awesome 4/5, Glypicons
         *
         * NOTE: This accepts the linkmod and icon arrays by reference.
         *
         * @since 4.0.0
         *
         * @param array   $classes         an array of classes currently assigned to the item.
         * @param array   $linkmod_classes an array to hold linkmod classes.
         * @param array   $icon_classes    an array to hold icon classes.
         * @param integer $depth           an integer holding current depth level.
         *
         * @return array  $classes         a maybe modified array of classnames.
         */
        private function seporate_linkmods_and_icons_from_classes( $classes, &$linkmod_classes, &$icon_classes, $depth ) {
            // Loop through $classes array to find linkmod or icon classes.
            foreach ( $classes as $key => $class ) {
                // If any special classes are found, store the class in it's
                // holder array and and unset the item from $classes.
                if ( preg_match( '/^disabled|^sr-only/i', $class ) ) {
                    // Test for .disabled or .sr-only classes.
                    $linkmod_classes[] = $class;
                    unset( $classes[ $key ] );
                } elseif ( preg_match( '/^dropdown-header|^dropdown-divider|^dropdown-item-text/i', $class ) && $depth > 0 ) {
                    // Test for .dropdown-header or .dropdown-divider and a
                    // depth greater than 0 - IE inside a dropdown.
                    $linkmod_classes[] = $class;
                    unset( $classes[ $key ] );
                } elseif ( preg_match( '/^fa-(\S*)?|^fa(s|r|l|b)?(\s?)?$/i', $class ) ) {
                    // Font Awesome.
                    $icon_classes[] = $class;
                    unset( $classes[ $key ] );
                } elseif ( preg_match( '/^glyphicon-(\S*)?|^glyphicon(\s?)$/i', $class ) ) {
                    // Glyphicons.
                    $icon_classes[] = $class;
                    unset( $classes[ $key ] );
                }
            }

            return $classes;
        }

        /**
         * Return a string containing a linkmod type and update $atts array
         * accordingly depending on the decided.
         *
         * @since 4.0.0
         *
         * @param array $linkmod_classes array of any link modifier classes.
         *
         * @return string                empty for default, a linkmod type string otherwise.
         */
        private function get_linkmod_type( $linkmod_classes = array() ) {
            $linkmod_type = '';
            // Loop through array of linkmod classes to handle their $atts.
            if ( ! empty( $linkmod_classes ) ) {
                foreach ( $linkmod_classes as $link_class ) {
                    if ( ! empty( $link_class ) ) {

                        // check for special class types and set a flag for them.
                        if ( 'dropdown-header' === $link_class ) {
                            $linkmod_type = 'dropdown-header';
                        } elseif ( 'dropdown-divider' === $link_class ) {
                            $linkmod_type = 'dropdown-divider';
                        } elseif ( 'dropdown-item-text' === $link_class ) {
                            $linkmod_type = 'dropdown-item-text';
                        }
                    }
                }
            }
            return $linkmod_type;
        }

        /**
         * Update the attributes of a nav item depending on the limkmod classes.
         *
         * @since 4.0.0
         *
         * @param array $atts            array of atts for the current link in nav item.
         * @param array $linkmod_classes an array of classes that modify link or nav item behaviors or displays.
         *
         * @return array                 maybe updated array of attributes for item.
         */
        private function update_atts_for_linkmod_type( $atts = array(), $linkmod_classes = array() ) {
            if ( ! empty( $linkmod_classes ) ) {
                foreach ( $linkmod_classes as $link_class ) {
                    if ( ! empty( $link_class ) ) {
                        // update $atts with a space and the extra classname...
                        // so long as it's not a sr-only class.
                        if ( 'sr-only' !== $link_class ) {
                            $atts['class'] .= ' ' . esc_attr( $link_class );
                        }
                        // check for special class types we need additional handling for.
                        if ( 'disabled' === $link_class ) {
                            // Convert link to '#' and unset open targets.
                            $atts['href'] = '#';
                            unset( $atts['target'] );
                        } elseif ( 'dropdown-header' === $link_class || 'dropdown-divider' === $link_class || 'dropdown-item-text' === $link_class ) {
                            // Store a type flag and unset href and target.
                            unset( $atts['href'] );
                            unset( $atts['target'] );
                        }
                    }
                }
            }
            return $atts;
        }

        /**
         * Wraps the passed text in a screen reader only class.
         *
         * @since 4.0.0
         *
         * @param string $text the string of text to be wrapped in a screen reader class.
         * @return string      the string wrapped in a span with the class.
         */
        private function wrap_for_screen_reader( $text = '' ) {
            if ( $text ) {
                $text = '<span class="sr-only">' . $text . '</span>';
            }
            return $text;
        }

        /**
         * Returns the correct opening element and attributes for a linkmod.
         *
         * @since 4.0.0
         *
         * @param string $linkmod_type a sting containing a linkmod type flag.
         * @param string $attributes   a string of attributes to add to the element.
         *
         * @return string              a string with the openign tag for the element with attribibutes added.
         */
        private function linkmod_element_open( $linkmod_type, $attributes = '' ) {
            $output = '';
            if ( 'dropdown-item-text' === $linkmod_type ) {
                $output .= '<span class="dropdown-item-text"' . $attributes . '>';
            } elseif ( 'dropdown-header' === $linkmod_type ) {
                // For a header use a span with the .h6 class instead of a real
                // header tag so that it doesn't confuse screen readers.
                $output .= '<span class="dropdown-header h6"' . $attributes . '>';
            } elseif ( 'dropdown-divider' === $linkmod_type ) {
                // this is a divider.
                $output .= '<div class="dropdown-divider"' . $attributes . '>';
            }
            return $output;
        }

        /**
         * Return the correct closing tag for the linkmod element.
         *
         * @since 4.0.0
         *
         * @param string $linkmod_type a string containing a special linkmod type.
         *
         * @return string              a string with the closing tag for this linkmod type.
         */
        private function linkmod_element_close( $linkmod_type ) {
            $output = '';
            if ( 'dropdown-header' === $linkmod_type || 'dropdown-item-text' === $linkmod_type ) {
                // For a header use a span with the .h6 class instead of a real
                // header tag so that it doesn't confuse screen readers.
                $output .= '</span>';
            } elseif ( 'dropdown-divider' === $linkmod_type ) {
                // this is a divider.
                $output .= '</div>';
            }
            return $output;
        }
    }
}

/* Declare WooCommerce support */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}

include('functions-gutenberg.php');