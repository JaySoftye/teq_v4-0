<?php
/**
 * Teq_v4.0 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Teq_v4.0
 */

if ( ! function_exists( 'teq_v4_0_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function teq_v4_0_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Teq_v4.0, use a find and replace
		 * to change 'teq_v4-0' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'teq_v4-0', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );


		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'teq_v4-0' ),
		) );
		// Discard native classes for nav menu items, Keep ID
		add_filter('nav_menu_css_class', 'discard_menu_classes', 10, 2);
			function discard_menu_classes($classes, $item) {
    		return (array)get_post_meta( $item->ID, '_menu_item_classes', true );
			}
		// Replace class attribute with ng-controller for CLICK function
		add_filter( 'wp_nav_menu', 'wp_nav_menu_replace_title' );
			function wp_nav_menu_replace_title( $menu ){
    		return $menu = str_replace('class="has-submenu"', 'ng-controller="dropdownCtrl"', $menu );
			}
		// If menu item has class attribute value, Add Angular function for the menu item
		add_filter( 'nav_menu_link_attributes', function ( $atts, $item, $args ) {
		   if ( 'has-submenu' === $item -> classes[0] ) {
		    $atts['ng-class'] = '{"active": isActive}';
				$atts['ng-click'] = 'activeButton()';
			}
		    return $atts;
			}, 10, 3 );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'teq_v4_0_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'teq_v4_0_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function teq_v4_0_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'teq_v4_0_content_width', 640 );
}
add_action( 'after_setup_theme', 'teq_v4_0_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function teq_v4_0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'teq_v4-0' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'teq_v4-0' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'teq_v4_0_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function teq_v4_0_scripts() {
	wp_deregister_script( 'roboto' );
	wp_enqueue_style( 'roboto', 'https://use.typekit.net/pih4zrr.css');

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);

	wp_deregister_script( 'teq_v4-0-style' );
	wp_deregister_script( 'teq_v4-0-framework-css-source' );
	wp_deregister_script( 'teq_v4-0-shared_styles' );
	wp_deregister_script( 'teq_v4-0-layout_styles' );
	wp_deregister_script( 'teq_v4-0-mobile_styles' );
	wp_enqueue_style( 'teq_v4-0-style', get_stylesheet_uri() );
	wp_enqueue_style( 'teq_v4-0-framework-css-source', get_template_directory_uri() . '/inc/css/framework-css-source.css');
	wp_enqueue_style( 'teq_v4-0-shared_styles', get_template_directory_uri() . '/inc/css/teq-4-0-shared_styles.css');
	wp_enqueue_style( 'teq_v4-0-layout_styles', get_template_directory_uri() . '/inc/css/teq-4-0-layout_styles.css');
	wp_enqueue_style( 'teq_v4-0-mobile_styles', get_template_directory_uri() . '/inc/css/teq-4-0-mobile_styles.css');

	wp_deregister_script( 'angular' );
	wp_deregister_script( 'angular_animate' );
	wp_deregister_script( 'ngSanitize' );
	wp_enqueue_script( 'angular', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js', '', '1.6.9', true );
	wp_enqueue_script( 'angular_animate', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-animate.js', '', '1.6.9', true );
	wp_enqueue_script( 'ngSanitize', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-sanitize.js', '', '1.6.9', true );

	wp_deregister_script( 'app-js' );
	wp_enqueue_script( 'app-js', get_template_directory_uri() . '/js/app.js', '', '', true );

	wp_deregister_script( 'ajax-script' );
	wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/ajax-script.js', '', '', true );

	wp_enqueue_script( 'teq_v4-0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// AJAX SCRIPT FOR TEQ TALK BLOG
	if ( is_page_template( array( 'template-pages/teqtalk.php', 'template-pages/teqtalkV2.php' ))) {

		wp_enqueue_script( 'my_ajax_script', get_template_directory_uri(). '/js/load-more-posts.js', array( 'jquery' ), '0.1.0', true );
		wp_localize_script( 'my_ajax_script', 'my_ajax_url', admin_url( 'admin-ajax.php' ) );

		wp_deregister_script( 'load-more-posts' );
		wp_enqueue_script( 'load-more-posts', get_template_directory_uri() . '/js/load-more-posts.js', '', '', true );
	}

	// VERSION_1 STYLESHEET AND JAVASCRIPT FUNCTIONS FOR CREATE YOUR SOLUTION
	if ( is_page_template( array( 'template-pages/createyoursolution.php', 'template-pages/createyoursolutionResult.php', 'template-pages/createyoursolutionquoterequest.php' ))) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-create_your_solution_stylesheet.css' );

		wp_deregister_script( 'create-js-functions' );
		wp_enqueue_script( 'create-js-functions', get_template_directory_uri() . '/js/create-functions.js', '', '', true );
	}

	// VERSION_2 STYLESHEET AND JAVASCRIPT FUNCTIONS FOR CREATE YOUR SOLUTION
	if ( is_page_template( array( 'template-pages/createyoursolution_2.php', 'template-pages/createyoursolution_results_2.php', 'template-pages/createyoursolution_results_quote_2.php', 'template-pages/test.php' ))) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-create_your_solution_stylesheet_2.css' );

		wp_deregister_script( 'create-js-functions' );
		wp_enqueue_script( 'create-js-functions', get_template_directory_uri() . '/js/create-functions_2.js', '', '', true );
	}

	// VERSION_3 STYLESHEET AND JAVASCRIPT FUNCTIONS FOR CREATE YOUR SOLUTION
	if ( is_page_template( array( 'template-pages/createyoursolution_3.php', 'template-pages/createyoursolution_3_selections.php', 'template-pages/createyoursolution_3_prelim.php', 'template-pages/createyoursolution_3_results.php', 'template-pages/createyoursolution_3_results_quote.php' ))) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-create_your_solution_stylesheet_3.css' );

		wp_deregister_script( 'create-js-functions' );
		wp_enqueue_script( 'create-js-functions', get_template_directory_uri() . '/js/create-functions_3.js', '', '', true );
		wp_deregister_script( 'rest-api-js-response' );
		wp_enqueue_script( 'rest-api-js-response', get_template_directory_uri(). '/js/my-ajax-script_3.js', array(), '1.0', true );
	}

	// VERSION_4 STYLESHEET AND JAVASCRIPT FUNCTIONS FOR CREATE YOUR SOLUTION
	if ( is_page_template( array( 'template-pages/createyoursolution_4.php', 'template-pages/createyoursolution_4_selections.php', 'template-pages/createyoursolution_4_prelim.php', 'template-pages/createyoursolution_4_results.php', 'template-pages/createyoursolution_4_results_quote.php' ))) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-create_your_solution_stylesheet_4.css' );

		wp_deregister_script( 'create-js-functions' );
		wp_enqueue_script( 'create-js-functions', get_template_directory_uri() . '/js/create-functions_4.js', '', '', true );
		wp_deregister_script( 'rest-api-js-response' );
		wp_enqueue_script( 'rest-api-js-response', get_template_directory_uri(). '/js/my-ajax-script_4.js', array(), '1.0', true );
	}

	// STYLESHEET AND JAVASCRIPT FUNCTIONS FOR EVOLVE
	if ( is_page_template( array( 'template-pages/evolve.php' ) ) ) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-evolve_stylesheet.css' );

		wp_deregister_script( 'evolve-js-functions' );
		wp_enqueue_script( 'evolve-js-functions', get_template_directory_uri() . '/js/evolve-functions.js', '', '', true );
	}

	// Additional CSS for Specific Channel Partners
	if ( is_page_template( array( 'template-pages/nycdoe.php', 'template-pages/cdwgstemproducts.php', 'template-pages/cdwgprofessionaldevelopmentproducts.php', 'template-pages/landingpageadditionalstyling.php') ) ) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-additional_stylesheet.css' );
	}

	// Additional CSS for SPECIFIC CUSTOM POST TYPES
	if ( is_singular( array( 'product-and-service', 'nedm-surveys', 'pathways') ) ) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/teq-4-0-additional_stylesheet.css' );
	}

	// LEGACY CSS for BOOTSTRAP THEME
	if ( is_page_template( array( 'template-pages/Legacy-Boostrap_Page-Template.php') ) ) {
		wp_enqueue_style( 'teq-4-0-additional_stylesheet', get_template_directory_uri() . '/inc/css/legacy_boostrap-teq-theme.css' );
	}

}
add_action( 'wp_enqueue_scripts', 'teq_v4_0_scripts' );

/**
 * Login Page Edits.
 *
 */

function my_login_logo() { ?>
  <style type="text/css">
		body.login {
			background-color: rgb(227,237,247);
		}
    #login h1 a, .login h1 a {
      background-image: url('<?php echo get_template_directory_uri();?>/inc/images/teq-brand-logo.svg');
    }
  </style>
<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Stop WordPress from adding <p> tags
	remove_filter( ‘the_content’, ‘wpautop’ );
	remove_filter( ‘the_excerpt’, ‘wpautop’ );

// CHECK IF CONTENT IS EmptyIterator
function empty_content($str) {
  return trim(str_replace('&nbsp;','',strip_tags($str))) == '';
}

// get permalink by title
function get_page_permalink_from_name($page_name) {
    global $post;
    global $wpdb;
    $pageid_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_title = '" . $page_name . "' LIMIT 0, 1");
 return get_permalink($pageid_name);
}


// GET THE FIRST IMAGE ELEMENT WITHIN THE CONTENT OF POST
// DECLARE GLOBAL TERM TO BE USED WITHIN LOOP
// GET ALL CONTENT AND 'output' ALL IMAGES TAGS
// GET THE FIRST ITEM IN THE 'output'
function get_content_first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  	$output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  	$first_img = $matches[1][0];
  		return $first_img;
}


// ADD VISIT COUNTER TO POSTS
// CREATE META DATA FIELD 'my_post_viewed' LINKED TO THE POST ID
// BY DEFAULT 'my_post_view' SET TO 1, WILL INCREASE BASED UPON VIEWS
function count_post_visits() {
	if( is_single() ) {
		global $post;
			$views = get_post_meta( $post->ID, 'my_post_viewed', true );

			if( $views == '' ) {
				update_post_meta( $post->ID, 'my_post_viewed', '1' );
      } else {
        $views_no = intval( $views );
        update_post_meta( $post->ID, 'my_post_viewed', ++$views_no );
      }
   }
}
add_action( 'wp_head', 'count_post_visits' );


/**
 * CUSTOM META BOXES FOR PAGE ONLY
 * FIELDS FOR SUB HEADERS, PD AND PATHWAY
 */
function custom_add_meta_box() {
	add_meta_box(
		'custom-meta',
		__( 'Additional Fields', 'text-domain' ),
		'custom_meta_html',
		'page', //Post Type
		'normal', //Location
		'high' //Priority
	);
}
add_action( 'add_meta_boxes', 'custom_add_meta_box', 1 );

// ADD CUSTOM BOX
function custom_meta_html( $post) {
	wp_nonce_field( '_custom_meta_nonce', 'custom_meta_nonce' ); ?>
		<p class="wp-block-html">
			<label for="sub_header_meta_content"><?php _e( 'Sub Header Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="sub_header_meta_content" id="sub_header_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width: 100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'sub_header_meta_content' ); ?></textarea>
		</p>
		<br />
		<hr />
		<br />
		<p class="wp-block-html">
			<label for="header_info_meta_content"><?php _e( 'Header Info Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="header_info_meta_content" id="header_info_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width: 100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'header_info_meta_content' ); ?></textarea>
		</p>
		<br />
		<hr />
		<br />
		<p class="wp-block-html">
			<label for="pd_meta_content"><?php _e( 'Online OTIS PD Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="pd_meta_content" id="pd_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width: 100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'pd_meta_content' ); ?></textarea>
		</p>
		<br />
		<hr />
		<br />
		<p class="wp-block-html">
			<label for="pathway_meta_content"><?php _e( 'iBlock Pathway Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="pathway_meta_content" id="pathway_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width: 100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'pathway_meta_content' ); ?></textarea>
		</p>
		<br />
		<br />
		<br />
		<p class="wp-block-html">
			<label for="tabs_meta_content"><?php _e( 'Page Tabs Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="tabs_meta_content" id="tabs_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width: 100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'tabs_meta_content' ); ?></textarea>
		</p>
		<br />
		<br />
		<br />
	<?php } //endfunction

// CALLBACK TO RETRIVE VALUE
function custom_get_meta( $value ) {
	global $post;
	$field = get_post_meta( $post->ID, $value, true );
		if ( ! empty( $field ) ) {
			return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
		} else {
			return false;
		}
}

// SAVE META VALUE IF PERMISSIONS PASS
function custom_meta_save( $post_id ) {

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( ! isset( $_POST['custom_meta_nonce'] ) || ! wp_verify_nonce( $_POST['custom_meta_nonce'], '_custom_meta_nonce' ) ) return;
			if ( ! current_user_can( 'edit_post', $post_id ) ) return;

	if ( isset( $_POST['sub_header_meta_content'] ) )
		update_post_meta( $post_id, 'sub_header_meta_content', esc_textarea( $_POST['sub_header_meta_content'] ) );

	if ( isset( $_POST['header_info_meta_content'] ) )
		update_post_meta( $post_id, 'header_info_meta_content', esc_textarea( $_POST['header_info_meta_content'] ) );

	if ( isset( $_POST['pd_meta_content'] ) )
		update_post_meta( $post_id, 'pd_meta_content', esc_textarea( $_POST['pd_meta_content'] ) );

	if ( isset( $_POST['pathway_meta_content'] ) )
		update_post_meta( $post_id, 'pathway_meta_content', esc_textarea( $_POST['pathway_meta_content'] ) );

	if ( isset( $_POST['tabs_meta_content'] ) )
		update_post_meta( $post_id, 'tabs_meta_content', esc_textarea( $_POST['tabs_meta_content'] ) );
}
add_action( 'save_post', 'custom_meta_save' );


/*
* Creating a function to create our Custom Post Types
*/

function custom_post_type_product_and_service() {
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Product-and-Service', 'Post Type General Name', 'teq_v4-0' ),
		'singular_name'       => _x( 'Product-and-Service', 'Post Type Singular Name', 'teq_v4-0' ),
		'menu_name'           => __( 'Products and Services', 'teq_v4-0' ),
		'parent_item_colon'   => __( 'Parent Product-and-Service', 'teq_v4-0' ),
		'all_items'           => __( 'All Product-and-Service', 'teq_v4-0' ),
		'view_item'           => __( 'View Product-and-Service', 'teq_v4-0' ),
		'add_new_item'        => __( 'Add New Product-and-Service', 'teq_v4-0' ),
		'add_new'             => __( 'Add New', 'teq_v4-0' ),
		'edit_item'           => __( 'Edit Product-and-Service', 'teq_v4-0' ),
		'update_item'         => __( 'Update Product-and-Service', 'teq_v4-0' ),
		'search_items'        => __( 'Search Product-and-Service', 'teq_v4-0' ),
		'not_found'           => __( 'Not Found', 'teq_v4-0' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'teq_v4-0' ),
	);
// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'Product-and-Service', 'teq_v4-0' ),
		'description'         => __( 'Product-and-Service', 'teq_v4-0' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
    'menu_icon'           => 'dashicons-cart',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
    'taxonomies'          => array('category', 'topic')
	);
	// Registering your Custom Post Type
	register_post_type( 'Product-and-Service', $args );
}

function custom_post_type_nedm_survey() {
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'NEDM-Survey', 'Post Type General Name', 'teq_v4-0' ),
		'singular_name'       => _x( 'NEDM-Survey', 'Post Type Singular Name', 'teq_v4-0' ),
		'menu_name'           => __( 'NEDM Survey', 'teq_v4-0' ),
		'parent_item_colon'   => __( 'Parent NEDM-Survey', 'teq_v4-0' ),
		'all_items'           => __( 'All NEDM-Surveys', 'teq_v4-0' ),
		'view_item'           => __( 'View NEDM-Survey', 'teq_v4-0' ),
		'add_new_item'        => __( 'Add New NEDM-Survey', 'teq_v4-0' ),
		'add_new'             => __( 'Add New', 'teq_v4-0' ),
		'edit_item'           => __( 'Edit NEDM-Survey', 'teq_v4-0' ),
		'update_item'         => __( 'Update NEDM-Survey', 'teq_v4-0' ),
		'search_items'        => __( 'Search NEDM-Survey', 'teq_v4-0' ),
		'not_found'           => __( 'Not Found', 'teq_v4-0' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'teq_v4-0' ),
	);
// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'NEDM-Surveys', 'teq_v4-0' ),
		'description'         => __( 'NEDM-Surveys', 'teq_v4-0' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'custom-fields', 'revisions' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
    'menu_icon'           => 'dashicons-beer',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post'
	);
	// Registering your Custom Post Type
	register_post_type( 'NEDM-Surveys', $args );
}

function custom_post_type_pathway() {
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Pathway', 'Post Type General Name', 'teq_v4-0' ),
		'singular_name'       => _x( 'Pathway', 'Post Type Singular Name', 'teq_v4-0' ),
		'menu_name'           => __( 'Pathways', 'teq_v4-0' ),
		'parent_item_colon'   => __( 'Parent Pathway', 'teq_v4-0' ),
		'all_items'           => __( 'All Pathways', 'teq_v4-0' ),
		'view_item'           => __( 'View Pathway', 'teq_v4-0' ),
		'add_new_item'        => __( 'Add New Pathway', 'teq_v4-0' ),
		'add_new'             => __( 'Add New', 'teq_v4-0' ),
		'edit_item'           => __( 'Edit Pathway', 'teq_v4-0' ),
		'update_item'         => __( 'Update Pathway', 'teq_v4-0' ),
		'search_items'        => __( 'Search Pathway', 'teq_v4-0' ),
		'not_found'           => __( 'Not Found', 'teq_v4-0' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'teq_v4-0' ),
	);
// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'Pathways', 'teq_v4-0' ),
		'description'         => __( 'Pathways', 'teq_v4-0' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', 'revisions' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/
		'hierarchical'        => false,
		'public'              => false,
		'show_in_rest'       => true,
    'rest_base'          => 'pathways',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 7,
    'menu_icon'           => 'dashicons-welcome-learn-more',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
    'taxonomies'          => array('category', 'topic', 'product')
	);
	// Registering your Custom Post Type
	register_post_type( 'Pathways', $args );
}

function custom_post_type_solution_set() {
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Custom-Solution', 'Post Type General Name', 'teq_v4-0' ),
			'singular_name'       => _x( 'Custom-Solution', 'Post Type Singular Name', 'teq_v4-0' ),
			'menu_name'           => __( 'Custom Solutions', 'teq_v4-0' ),
			'parent_item_colon'   => __( 'Parent Custom-Solution', 'teq_v4-0' ),
			'all_items'           => __( 'All Custom-Solutions', 'teq_v4-0' ),
			'view_item'           => __( 'View Custom-Solution', 'teq_v4-0' ),
			'add_new_item'        => __( 'Add New Custom-Solution', 'teq_v4-0' ),
			'add_new'             => __( 'Add New', 'teq_v4-0' ),
			'edit_item'           => __( 'Edit Custom-Solution', 'teq_v4-0' ),
			'update_item'         => __( 'Update Custom-Solution', 'teq_v4-0' ),
			'search_items'        => __( 'Search Custom-Solution', 'teq_v4-0' ),
			'not_found'           => __( 'Not Found', 'teq_v4-0' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'teq_v4-0' ),
		);
	// Set other options for Custom Post Type
		$args = array(
			'label'               => __( 'Custom-Solutions', 'teq_v4-0' ),
			'description'         => __( 'Custom-Solutions', 'teq_v4-0' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'revisions' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/
			'hierarchical'        => false,
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 6,
	    'menu_icon'           => 'dashicons-portfolio',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post'
		);
		// Registering your Custom Post Type
		register_post_type( 'Custom-Solutions', $args );
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/
add_action( 'init', 'custom_post_type_product_and_service', 0 );
add_action( 'init', 'custom_post_type_pathway', 0 );
add_action( 'init', 'custom_post_type_nedm_survey', 0 );
add_action( 'init', 'custom_post_type_solution_set', 0 );

// FUNCTION AND ACTION TO SORT CUSTOM POST TYPES 'PRODUCT AND SERVICE' OR 'PATHWAY' BY TITLE
function alpha_order_classes( $query ) {
  if ( $query->is_post_type_archive('product-and-service' or 'pathway') && $query->is_main_query() ) {
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'alpha_order_classes' );



/* add action for email notification
* anytime a CPT NEDM Survey is published or changed
*/
add_action( 'transition_post_status', 'send_mails_on_nedm_publish', 10, 3 );

function send_mails_on_nedm_publish( $new_status, $old_status, $post ) {
  if ( 'publish' !== $new_status or 'publish' === $old_status or 'nedm-surveys' !== get_post_type( $post ) )

    return;
      $to = 'InfrastructureTeam@teq.com, jay@teq.com';
      $headers = 'CC: paulprincipato@teq.com';
      $body = sprintf( 'Hey there is a new entry!' . "\n\n");
      $body .= sprintf( 'See <%s>', get_permalink( $post ));

    wp_mail( $to, 'New Network-Enabled Device Management Survey', $body, $headers );
}
/* add action for email notification
* anytime a CPT Custom Solution is published or changed
*/
add_action( 'transition_post_status', 'send_mails_on_custom_solution_publish', 10, 3 );

function send_mails_on_custom_solution_publish( $new_status, $old_status, $post ) {
  if ( 'publish' !== $new_status or 'publish' === $old_status or 'custom-solutions' !== get_post_type( $post ) )

    return;
      $to = 'jay@teq.com';
      $headers = 'CC: paulprincipato@teq.com';
      $body = sprintf( 'Hey there a new Custom Solution was created!' . "\n\n");
      $body .= sprintf( 'See <%s>', get_permalink( $post ));

    wp_mail( $to, 'Created Solution Quote Request from Teq', $body, $headers );
}



/* CUSTOM TAXONOMY CREATED FOR PRODUCT AND SERVICE CUSTOM POST TYPE
* hook into the init action and call create_book_taxonomies when it fires
*/
add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );
//create a custom taxonomies for your custom post types
function create_topics_hierarchical_taxonomy() {
// Add new taxonomies, make it hierarchical like categories
//first do the translations part for GUI
  $labels = array(
    'name' => _x( 'Topics', 'taxonomy general name' ),
    'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Topics' ),
    'all_items' => __( 'All Topics' ),
    'parent_item' => __( 'Parent Topic' ),
    'parent_item_colon' => __( 'Parent Topic:' ),
    'edit_item' => __( 'Edit Topic' ),
    'update_item' => __( 'Update Topic' ),
    'add_new_item' => __( 'Add New Topic' ),
    'new_item_name' => __( 'New Topic Name' ),
    'menu_name' => __( 'Topics' ),
  );
// Now register the taxonomy
  register_taxonomy('topics',array('product-and-service', 'pathways'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'topic' ),
  ));
	$labels = array(
    'name' => _x( 'Grades', 'taxonomy general name' ),
    'singular_name' => _x( 'Grade', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Grades' ),
    'all_items' => __( 'All Grades' ),
    'parent_item' => __( 'Parent Grade' ),
    'parent_item_colon' => __( 'Parent Grade:' ),
    'edit_item' => __( 'Edit Grade' ),
    'update_item' => __( 'Update Grade' ),
    'add_new_item' => __( 'Add New Grade' ),
    'new_item_name' => __( 'New Grade Name' ),
    'menu_name' => __( 'Grades' ),
  );
// Now register the taxonomy
  register_taxonomy('grades',array('product-and-service', 'pathways'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'grade' ),
  ));
	$labels = array(
    'name' => _x( 'Proficiency', 'taxonomy general name' ),
    'singular_name' => _x( 'Proficiency', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Proficiency' ),
    'all_items' => __( 'All Proficiency' ),
    'parent_item' => __( 'Parent Proficiency' ),
    'parent_item_colon' => __( 'Parent Proficiency:' ),
    'edit_item' => __( 'Edit Proficiency' ),
    'update_item' => __( 'Update Proficiency' ),
    'add_new_item' => __( 'Add New Proficiency' ),
    'new_item_name' => __( 'New Proficiency Name' ),
    'menu_name' => __( 'Proficiency' ),
  );
// Now register the taxonomy
  register_taxonomy('proficiency',array('product-and-service', 'pathways'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'proficiency' ),
  ));
	$labels = array(
    'name' => _x( 'Curriculum', 'taxonomy general name' ),
    'singular_name' => _x( 'Curriculum', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Curriculum' ),
    'all_items' => __( 'All Curriculum' ),
    'parent_item' => __( 'Parent Curriculum' ),
    'parent_item_colon' => __( 'Parent Curriculum:' ),
    'edit_item' => __( 'Edit Curriculum' ),
    'update_item' => __( 'Update Curriculum' ),
    'add_new_item' => __( 'Add New Curriculum' ),
    'new_item_name' => __( 'New Curriculum Name' ),
    'menu_name' => __( 'Curriculum' ),
  );
// Now register the taxonomy
  register_taxonomy('curriculum',array('product-and-service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'curriculum' ),
  ));
	$labels = array(
    'name' => _x( 'Environment', 'taxonomy general name' ),
    'singular_name' => _x( 'Environment', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Environment' ),
    'all_items' => __( 'All Environment' ),
    'parent_item' => __( 'Parent Environment' ),
    'parent_item_colon' => __( 'Parent Environment:' ),
    'edit_item' => __( 'Edit Environment' ),
    'update_item' => __( 'Update Environment' ),
    'add_new_item' => __( 'Add New Environment' ),
    'new_item_name' => __( 'New Environment' ),
    'menu_name' => __( 'Environment' ),
  );
// Now register the taxonomy
  register_taxonomy('environment',array('product-and-service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'environment' ),
  ));
}

/* CUSTOM TAXONOMY CREATED FOR PATHWAY CUSTOM POST TYPE
* hook into the init action and call create_book_taxonomies when it fires
*/
add_action( 'init', 'create_product_hierarchical_taxonomy', 0 );
//create a custom taxonomy name it topics for your posts
function create_product_hierarchical_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  $labels = array(
    'name' => _x( 'Products', 'taxonomy general name' ),
    'singular_name' => _x( 'Product', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Productss' ),
    'all_items' => __( 'All Products' ),
    'parent_item' => __( 'Parent Product' ),
    'parent_item_colon' => __( 'Parent Product:' ),
    'edit_item' => __( 'Edit Product' ),
    'update_item' => __( 'Update Product' ),
    'add_new_item' => __( 'Add New Product' ),
    'new_item_name' => __( 'New Product Name' ),
    'menu_name' => __( 'Products' ),
  );
// Now register the taxonomy
  register_taxonomy('products',array('pathways'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'product' ),
  ));
}

/**
 * CUSTOM META BOXES FOR PRODUCT AND SERVICE CUSTOM POST TYPE ONLY
 * CUSTOM URL, FAMIS NUMBERS, EDC NUMBERS
 */
function custom_product_service_add_meta_box() {
	add_meta_box(
		'custom-meta',
		__( 'Additional Fields', 'text-domain' ),
		'custom_product_service_meta_html',
		'product-and-service', //Post Type
		'side', //Location
		'low' //Priority
	);
}
add_action( 'add_meta_boxes', 'custom_product_service_add_meta_box', 1 );

// ADD CUSTOM BOX
function custom_product_service_meta_html( $post) {
	wp_nonce_field( '_custom_meta_nonce', 'custom_meta_nonce' ); ?>
		<p class="wp-block-html">
			<label for="custom_url_meta_content"><?php _e( 'Custom URL', 'text-domain' ); ?></label>
			<br>
			<input name="custom_url_meta_content" id="custom_url_meta_content" type="text" size="20" class="block-editor-plain-text" placeholder="URL Link" aria-label="HTML" style="overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2); width: 100%" value="<?php echo custom_get_meta( 'custom_url_meta_content' ); ?>">
		</p>
		<br />
		<p class="wp-block-html">
			<label for="additional_info_meta_content"><?php _e( 'Additional Info Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="additional_info_meta_content" id="additional_info_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="6" style="overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2); width: 100%"><?php echo custom_get_meta( 'additional_info_meta_content' ); ?></textarea>
		</p>
		<br />
		<p class="wp-block-html">
			<label for="famis_meta_content"><?php _e( 'FAMIS Numbers', 'text-domain' ); ?></label>
			<br>
			<textarea name="famis_meta_content" id="famis_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="3" style="overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2); width: 100%"><?php echo custom_get_meta( 'famis_meta_content' ); ?></textarea>
		</p>
		<br />
		<p class="wp-block-html">
			<label for="edc_meta_content"><?php _e( 'EDC Numbers Content', 'text-domain' ); ?></label>
			<br>
			<textarea name="edc_meta_content" id="edc_meta_content" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="3" style="overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2); width: 100%"><?php echo custom_get_meta( 'edc_meta_content' ); ?></textarea>
		</p>
		<p class="wp-block-html">
			<label for="custom_image_meta_content"><?php _e( 'Custom Image', 'text-domain' ); ?></label>
			<br>
			<input name="custom_image_meta_content" id="custom_image_meta_content" type="text" size="20" class="block-editor-plain-text" placeholder="IMAGE Link" aria-label="HTML" style="overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2); width: 100%" value="<?php echo custom_get_meta( 'custom_image_meta_content' ); ?>">
		</p>
	<?php } //endfunction

	// CALLBACK TO RETRIVE VALUE
	function custom_product_service_get_meta( $value ) {
		global $post;
		$field = get_post_meta( $post->ID, $value, true );
			if ( ! empty( $field ) ) {
				return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
			} else {
				return false;
			}
	}

	// SAVE META VALUE IF PERMISSIONS PASS
	function custom_product_service_meta_save( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
			if ( ! isset( $_POST['custom_meta_nonce'] ) || ! wp_verify_nonce( $_POST['custom_meta_nonce'], '_custom_meta_nonce' ) ) return;
				if ( ! current_user_can( 'edit_post', $post_id ) ) return;

		if ( isset( $_POST['custom_url_meta_content'] ) )
			update_post_meta( $post_id, 'custom_url_meta_content', esc_textarea( $_POST['custom_url_meta_content'] ) );

		if ( isset( $_POST['additional_info_meta_content'] ) )
			update_post_meta( $post_id, 'additional_info_meta_content', esc_textarea( $_POST['additional_info_meta_content'] ) );

		if ( isset( $_POST['famis_meta_content'] ) )
			update_post_meta( $post_id, 'famis_meta_content', esc_textarea( $_POST['famis_meta_content'] ) );

		if ( isset( $_POST['edc_meta_content'] ) )
			update_post_meta( $post_id, 'edc_meta_content', esc_textarea( $_POST['edc_meta_content'] ) );

		if ( isset( $_POST['custom_image_meta_content'] ) )
			update_post_meta( $post_id, 'custom_image_meta_content', esc_textarea( $_POST['custom_image_meta_content'] ) );

	}
	add_action( 'save_post', 'custom_product_service_meta_save' );

	/**
	 * CUSTOM META BOXES FOR PATHWAYS CUSTOM POST TYPE ONLY
	 * CUSTOM PD COURSE FOR PATHWAY
	 */
	function custom_pathway_add_meta_box() {
		add_meta_box(
			'custom-meta',
			__( 'iBlock Information', 'text-domain' ),
			'custom_pathway_meta_html',
			'pathways', //Post Type
			'normal', //Location
			'low' //Priority
		);
	}
	add_action( 'add_meta_boxes', 'custom_pathway_add_meta_box', 1 );

	// ADD CUSTOM BOX
	function custom_pathway_meta_html( $post) {
		wp_nonce_field( '_custom_meta_nonce', 'custom_meta_nonce' ); ?>
		<p class="wp-block-html">
			<label for="iblock_focus_meta_html"><?php _e( 'Focus Description', 'text-domain' ); ?></label>
			<br>
			<textarea name="iblock_focus_meta_html" id="iblock_focus_meta_html" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width:100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'iblock_focus_meta_html' ); ?></textarea>
		</p>
		<br />
		<p class="wp-block-html">
			<label for="iblock_focus_stats_html"><?php _e( 'Primary and Secondary Focus', 'text-domain' ); ?></label>
			<br>
			<textarea name="iblock_focus_stats_html" id="iblock_focus_stats_html" class="block-editor-plain-text" placeholder="Write HTML…" aria-label="HTML" rows="12" style="width:100%; overflow-y: scroll; overflow-wrap: break-word; box-shadow: 0 3px 5px rgba(0,0,0,.2);"><?php echo custom_get_meta( 'iblock_focus_stats_html' ); ?></textarea>
		</p>
		<br />
		<?php } //endfunction

		// CALLBACK TO RETRIVE VALUE
		function custom_pathway_get_meta( $value ) {
			global $post;
			$field = get_post_meta( $post->ID, $value, true );
				if ( ! empty( $field ) ) {
					return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
				} else {
					return false;
				}
		}

		// SAVE META VALUE IF PERMISSIONS PASS
		function custom_pathway_meta_save( $post_id ) {

			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
				if ( ! isset( $_POST['custom_meta_nonce'] ) || ! wp_verify_nonce( $_POST['custom_meta_nonce'], '_custom_meta_nonce' ) ) return;
					if ( ! current_user_can( 'edit_post', $post_id ) ) return;

					if ( isset( $_POST['iblock_focus_meta_html'] ) )
						update_post_meta( $post_id, 'iblock_focus_meta_html', esc_textarea( $_POST['iblock_focus_meta_html'] ) );

					if ( isset( $_POST['iblock_focus_stats_html'] ) )
						update_post_meta( $post_id, 'iblock_focus_stats_html', esc_textarea( $_POST['iblock_focus_stats_html'] ) );
		}
		add_action( 'save_post', 'custom_pathway_meta_save' );

	/**
		* ADD CUSTOM META FIELD TO REST API RESPONSE
		* REGISTER REST FIELD IN URL
		* META FIELD 'iBlock_focus_meta_html' INCLUDED IN REST API return
		* /wp-json/wp/v2/pathways/'postID'
		*/
		add_action( 'rest_api_init', function () {
			register_rest_field( 'pathways', 'iblock_focus_meta_html', array(
				'get_callback' => function( $post_arr ) {
					return get_post_meta( $post_arr['id'], 'iblock_focus_meta_html', true );
				},
		   ) );
		});
	/**
		* ADD FEATURED IMAGE TO REST API RESPONSE
		* REGISTER REST FIELD IN URL
		* GET FEATURED-IMAGE FROM the OBJECTY data
		* set as 'img_url' data field in response
		* /wp-json/wp/v2/pathways/'postID'
		*/
		add_action('rest_api_init', 'register_rest_images' );
			function register_rest_images() {
				register_rest_field( array('pathways'), 'img_url', array (
					'get_callback'    => 'get_rest_featured_image',
          'update_callback' => null,
          'schema'          => null,
        ) );
			}
			function get_rest_featured_image( $object, $field_name, $request ) {
    		if( $object['featured_media'] ) {
        	$img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
        	return $img[0];
    		}
    		return false;
			}



	/**
		* ADD EXTRA USER FIELDS FOR PROFILE INFO
		* WILL USE AUTHOR INFO FOR PD BIOS
		*/

		add_action( 'show_user_profile', 'extra_user_profile_fields' );
		add_action( 'edit_user_profile', 'extra_user_profile_fields' );

		function extra_user_profile_fields( $user ) { ?>

			<h3><?php _e("Extra profile information", "blank"); ?></h3>
  		<table class="form-table">
    		<tr>
      		<th><label for="certification"><?php _e("certification"); ?></label></th>
      		<td>
        		<input type="text" name="certification" id="certification" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'certification', $user->ID ) ); ?>" /><br />
        		<span class="description"><?php _e("Please enter your certification."); ?></span>
      		</td>
    		</tr>
    		<tr>
      		<th><label for="background"><?php _e("background"); ?></label></th>
      			<td>
        			<input type="text" name="background" id="background" class="regular-text" value="<?php echo esc_attr( get_the_author_meta( 'background', $user->ID ) ); ?>" /><br />
        			<span class="description"><?php _e("Please enter your background"); ?></span>
      			</td>
    			</tr>
  		</table>
		<?php }
			// SAVE THE UPDATED META INFO THE USER

			add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
			add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
				function save_extra_user_profile_fields( $user_id ) {
  				$saved = false;
  					if ( current_user_can( 'edit_user', $user_id ) ) {
    					update_user_meta( $user_id, 'certification', $_POST['certification'] );
    					update_user_meta( $user_id, 'background', $_POST['background'] );
    						$saved = true;
  					}
  				return true;
				}

	/**
		* DISABLE ALL AUTHOR QUERIES
		* IF URL IS SPECIFIED FOR AUTHOR; e.g. teq.com/author/jaysoftye/
		* IDENTIFY AUTHOR QUERY AND REDIRECT (301) TO HOME
		*/

		function wp_redirect_if_author_query() {
			$is_author_set = get_query_var( 'author', '' );
				if ( $is_author_set != '' && !is_admin()) {
					 wp_redirect( home_url(), 301 );
				 	exit;
				}
	  }
	  add_action( 'template_redirect', 'wp_redirect_if_author_query' );


	/**
		* ADD PARENT PAGE SLUG TO THE BODY CLASS
		* GRAB THE PAGE ID FROM CURRENT item
		* SET CLASS NAME VARIABLE WITH THE PARENT OF CURRENT ID
		*/

		function wpc_body_class_section($classes) {
			global $wpdb, $post;
				if (is_page()) {
					if ($post->post_parent) {
						$parent  = end(get_post_ancestors($current_page_id));
				  } else {
						$parent = $post->ID;
				  }
				  	$post_data = get_post($parent, ARRAY_A);
				    $classes[] = $post_data['post_name'];
				 }
			return $classes;
		}
		add_filter('body_class','wpc_body_class_section');

	/**
		* ADD FEATURED IMAGE TO RSS FEED
		* GRAB FEATURED IMAGE OF POST
		* /category/news/feed/
		*/

		function add_rss_item_image() { global $post;
			if(has_post_thumbnail($post->ID))
		   	{
		    	$thumbnail = get_the_post_thumbnail_url($post->ID);
		       echo"\t<image>{$thumbnail}</image>\n";
		    }
		}
		add_action('rss2_item', 'add_rss_item_image');
		add_action('rss_item', 'add_rss_item_image');


	/**
		* REGISTERING PARAMETERS AS SEPARATE ARGUMENTS
		* CUSTOM SEARCH PARAMETERS FOR PRODUCT AND SERVICES CUSTOM POST TYPE
		* ALLOW FOR SEARCH PARAMETERS IN URL QUERIES
		*/
		add_action('init','wpse_register_product_param');
		function wpse_register_product_param() {
    	global $wp;
    		$wp->add_query_var('selectedProductType');
		}
		add_action('init','wpse_register_grade_param');
		function wpse_register_grade_param() {
    	global $wp;
    		$wp->add_query_var('selectedGradeLevel');
		}
		add_action('init','wpse_register_subject_param');
		function wpse_register_subject_param() {
    	global $wp;
    		$wp->add_query_var('selectedStemSubjectMatter');
		}
		add_action('init','wpse_register_techlevel_param');
		function wpse_register_techlevel_param() {
    	global $wp;
    		$wp->add_query_var('selectedtechnologyProficiencyLevel');
		}
		add_action('init','wpse_register_environment_param');
		function wpse_register_environment_param() {
    	global $wp;
    		$wp->add_query_var('selectedEducationalEnvironment');
		}


	/**
		* AJAX FORM AND SCRIPT
		* Enqueue ajax admin and javascript file for use in function
		*/
		function my_ajax_filter_search_scripts() {
		  wp_enqueue_script( 'my_ajax_filter_search', get_template_directory_uri(). '/js/my-ajax-script_2.js', array(), '1.0', true );
		  wp_localize_script( 'my_ajax_filter_search', 'ajax_url', admin_url('admin-ajax.php') );
		}
	/**
		* AJAX FORM SHORTCODE FOR USE IN TEMPLATE FILES
		* FORM FIELDS FOR NAME AND EMAIL
		* HIDDEN TEXT FIELDS FOR 'Grade Band', 'STEM Focus', 'General Education Category'
		* RADIO FIELDS VALUES CAPTURED AND SENT TO HIDDEN TEXT FIELDS
		*/
		function my_ajax_filter_search_shortcode() {
		  my_ajax_filter_search_scripts();
		    ob_start();
		?>
		  <form id="my_ajax_filter_search_form" name="my_ajax_filter_search_form" method="get" action="">
			<div class="ui">
				<div class="field has-addons">
					<div class="control input-control is-expanded">
						<input required class="is-fullwidth ui rounded outer dark input school-name {{my_ajax_filter_search_form.schoolName.$valid}}" type="text" name="schoolName" ng-model="schoolName" placeholder="Please enter your name, school name, or district">
					</div>
					<div class="control input-control is-expanded">
						<input required class="is-fullwidth ui rounded outer dark input school-email {{my_ajax_filter_search_form.schoolEmail.$valid}}" type="email" name="schoolEmail" ng-model="schoolEmail" placeholder="Please enter an email">
					</div>
				</div>
	      <input type="hidden" name="gradeLevelValue" id="gradeLevelValue" ng-value="gradeLevelValue">
				<input type="hidden" name="stemFocusValue" id="stemFocusValue" ng-value="stemFocusValue">
				<input type="hidden" name="generalEdValue" id="generalEdValue" ng-value="generalEdValue">
			</div>
			</form>

		  <?php
		    return ob_get_clean();
		}
		add_shortcode ('my_ajax_filter_search', 'my_ajax_filter_search_shortcode');
	/**
		* AJAX CALLBACK FOR SEARCH PARAMETERS
		* ENABLE FUNCTION LOGGED AND NONLOGGED IN USERS
		* CHECK SUBMISSION FOR Input fields: gradeLevelValue, stemFocusValue, generalEdValue
		* IF INPUT FIELD VALUE EXIST, Capture value and use in Wordpress Array IN LOOP
		* CAPTURE META AND POST DATA AS JSON DATA AND STORE IN result $array
		* LOOP THROUGH RESULTS in javascript loop
		*/
		add_action('wp_ajax_my_ajax_filter_search', 'my_ajax_filter_search_callback');
		add_action('wp_ajax_nopriv_my_ajax_filter_search', 'my_ajax_filter_search_callback');

		function my_ajax_filter_search_callback() {

			header("Content-Type: application/json");

				$tax_query = array();

			if(isset($_GET['gradeLevelValue'])) {
				$gradeLevelValue = sanitize_text_field( $_GET['gradeLevelValue'] );
				$tax_query[] = array(
					'taxonomy' => 'grades',
	        'field' => 'slug',
					'compare' => '=',
	        'terms' => $gradeLevelValue
				);
	    }
			if(isset($_GET['stemFocusValue'])) {
        $stemFocusValue = sanitize_text_field( $_GET['stemFocusValue'] );
        $tax_query[] = array(
          'taxonomy' => 'category',
          'field' => 'slug',
					'compare' => '=',
          'terms' => $stemFocusValue
        );
    	}
			if(isset($_GET['generalEdValue'])) {
        $generalEdValue = sanitize_text_field( $_GET['generalEdValue'] );
        $tax_query[] = array(
          'taxonomy' => 'topics',
          'field' => 'slug',
					'compare' => '=',
          'terms' => $generalEdValue
        );
    	}
    	$args = array(
        'post_type' => 'Product-and-Service',
				'category_name' => 'Teq Product',
        'posts_per_page' => -1,
        'tax_query' => $tax_query
    	);

				$search_query = new WP_Query( $args );

		  if ( $search_query->have_posts() ) {
				$result = array();

				while ( $search_query->have_posts() ) {
					$search_query->the_post();

						$proficienciesSlugArray = array();
						$proficienciesNameArray = array();
						$proficiencyTerms = get_the_terms( $post->ID, 'proficiency' );
							foreach ($proficiencyTerms as $proficiencyTerm) {
								$proficienciesSlugArray[] = $proficiencyTerm -> slug . ' ';
								$proficienciesNameArray[] = $proficiencyTerm -> name . ' ';
							}
						$environmentsSlugArray = array();
						$environmentsNameArray = array();
						$environmentTerms = get_the_terms( $post->ID, 'environment' );
							foreach ($environmentTerms as $environmentTerm) {
								$environmentsSlugArray[] = $environmentTerm -> slug . ' ';
								$environmentsNameArray[] = $environmentTerm -> name . ' ';
							}

						$result[] = array(
							"id" => get_the_ID(),
		          "title" => get_the_title(),
							"excerpt" => get_the_excerpt(),
							"permalink" => get_permalink(),
							"poster" => wp_get_attachment_url(get_post_thumbnail_id($post_id, 'full') ),
							"proficiencies" => $proficienciesSlugArray,
							"proficiency" => $proficienciesNameArray,
							"environments" => $environmentsSlugArray,
							"environment" => $environmentsNameArray,
		        );
				}
		    wp_reset_query();
		    	echo json_encode($result); exit;

		  } else {
				// no posts found
		  }
		wp_die();
		}


	/**
		* AJAX CALLBACK FOR QUERYING ADDITIONAL POSTS
		*
		*
		*
		*/
		function get_ajax_posts() {
    	$args = array(
        'post_status' => array('publish'),
				'category_name' => 'news',
        'posts_per_page' => 12,
        'order' => 'DESC',
				'offset' => 13
    	);

			// The Query
    	$ajaxposts = new WP_Query( $args );

    	$response = '';

    	// The Query
    	if ( $ajaxposts->have_posts() ) {
        while ( $ajaxposts->have_posts() ) {
          $ajaxposts->the_post();
          $response .= get_template_part('template-parts/content-single-post');
        }
    	} else {
        $response .= get_template_part('template-parts/content-none');
    	}

    		echo $response;
    	exit; // leave ajax call
		}

		// Fire AJAX action for both logged in and non-logged in users
		add_action('wp_ajax_get_ajax_posts', 'get_ajax_posts');
		add_action('wp_ajax_nopriv_get_ajax_posts', 'get_ajax_posts');
