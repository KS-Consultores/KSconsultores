<?php 
/* Theme Functionality */

function ks_consultores_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'ks_consultores' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ks_consultores', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'ks_consultores' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 250, 250, true); // Unlimited height, soft crop

	add_image_size( 'slide', 2000, 9999, false );
	add_image_size( 'slide-thumb', 147, 99, false);


}


add_action( 'after_setup_theme', 'ks_consultores_setup' );

add_filter('widget_text', 'do_shortcode');



function ks_consultores_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'ks_consultores' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'ks_consultores' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueue scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function ks_consultores_styles() {
	global $wp_styles;
	// Loads our main stylesheet.
	wp_enqueue_style( 'ks_consultores-style', get_stylesheet_uri() );
	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'ks_consultores-template', get_template_directory_uri() . '/assets/css/theme-style.css', '', '20121010' );

	wp_enqueue_style( 'ks_consultores-ie', get_template_directory_uri() . '/assets/css/ie.css', '', '20121010' );



	$wp_styles->add_data( 'ks_consultores-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'ks_consultores_styles',10 );

function ks_consultores_theme_style() {

	wp_enqueue_style( 'ks_consultores-theme', get_template_directory_uri() . '/assets/css/style.css', '', '20121010' );

}
add_action( 'wp_enqueue_scripts', 'ks_consultores_theme_style',15 );

function ks_consultores_scripts() {

	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.

		wp_enqueue_script('jquery');

		//wp_enqueue_script( 'ks_consultores-bts', get_template_directory_uri() . '/assets/js/bootstrap.min.js', '', '', true );
		wp_enqueue_script( 'ks_consultores-script', get_template_directory_uri() . '/assets/js/script.js', '', '', true );
		if(is_front_page()):
		wp_enqueue_script( 'ks_consultores-loader', get_template_directory_uri() . '/assets/js/pathloader.js', '', '', true );
		endif; 


	


}

add_action( 'wp_enqueue_scripts', 'ks_consultores_scripts' );



function ks_consultores_register_sidebars(){

	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/

	
		$args = array(
			'name'          => __( 'Común Sidebar', 'ks_consultores' ),
			'id'            => 'sidebar-default',
			'description'   => '',
			'class'         => 'widget',
			'before_widget' => '<div class="widget-area widget-menu-area">',
			'after_widget'  => '</div><hr/>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
		);

		register_sidebar( $args );

	
		register_sidebar( $args );
	
}

add_action('init', 'ks_consultores_register_sidebars');

if ( ! function_exists( 'ks_consultores_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own ks_consultores_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function ks_consultores_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'ks_consultores' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Editar)', 'ks_consultores' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment entry">
			<header class="col-md-4">
			<figure class="comment-meta comment-author vcard avatar">
				<?php
					echo get_avatar( $comment, 110 );
					
				?>
			</figure><!-- .comment-meta -->
			
				<?php 
				printf( '<h3 class="title"><b class="fn">%1$s</b> %2$s</h3>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'ks_consultores' ) . '</span>' : ''
					);

					?>

			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Tu comentario está pendiente de moderación.', 'ks_consultores' ); ?></p>
			<?php endif; ?>

			<div class="col-md-8">
				<?php printf( '<div class="clear"></div><a href="%1$s"><small datetime="%2$s">%3$s</small></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'ks_consultores' ), get_comment_date(), get_comment_time() )
					);
					?>
					<div class="clear"></div>
					<?php
				 comment_text(); ?>
				<?php edit_comment_link( __( 'Editar', 'ks_consultores' ), '<a class="edit-link">', '</a>' ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Responder', 'ks_consultores' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
			<div class="clear"></div>
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;


if ( ! function_exists( 'ks_consultores_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own ks_consultores_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function ks_consultores_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'ks_consultores' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'ks_consultores' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'Ver todas las publicaciones de %s', 'ks_consultores' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'Esta entrada fue publicada en %1$s y etiquetada como %2$s el %3$s<span class="by-author"> por %4$s</span>.', 'ks_consultores' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'Esta entrada fue publicada en %1$s en %3$s<span class="by-author"> por %4$s</span>.', 'ks_consultores' );
	} else {
		$utility_text = __( 'Esta entrada fue publicada en %3$s<span class="by-author"> por %4$s</span>.', 'ks_consultores' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;



add_theme_support( 'html5', array( 'search-form' ) );


function get_social_links(){


	$facebook = get_field('facebook', 'options');
	$twitter  = get_field('twitter', 'options');
	$gplus  = get_field('gplus', 'options');


	$html = '<ul class="social-links">';
	if($facebook) $html .= '<li><a href="'.esc_url_raw($facebook).'" class="icon-facebook" target="_blank"></a></li>';
	if($twitter)  $html .= '<li><a href="'.esc_url_raw($twitter).'" class="icon-twitter" target="_blank"></a></li>';
	$html .= '</ul>';

	return $html;


}


add_shortcode('social-icons', 'get_social_links' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'KS Settings',
		'menu_title' 	=> 'KS Settings',
		'menu_slug' 	=> 'theme-ks_consultores-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
	
}


function register_post_types() {

	$labels = array(
		'name'                => _x( 'Servicios', 'Post Type General Name', 'ks_consultores' ),
		'singular_name'       => _x( 'Servicio', 'Post Type Singular Name', 'ks_consultores' ),
		'menu_name'           => __( 'Servicios', 'ks_consultores' ),
		'name_admin_bar'      => __( 'Servicios', 'ks_consultores' ),
		'parent_item_colon'   => __( 'Parent Item:', 'ks_consultores' ),
		'all_items'           => __( 'Todos', 'ks_consultores' ),
		'add_new_item'        => __( 'Agregar Nuevo', 'ks_consultores' ),
		'add_new'             => __( 'Agregar Nuevo', 'ks_consultores' ),
		'new_item'            => __( 'Nuevo Servicio', 'ks_consultores' ),
		'edit_item'           => __( 'Editar Servicio', 'ks_consultores' ),
		'update_item'         => __( 'Actualizar Item', 'ks_consultores' ),
		'view_item'           => __( 'Ver Item', 'ks_consultores' ),
		'search_items'        => __( 'Buscar Servicios', 'ks_consultores' ),
		'not_found'           => __( 'No se encontro resultados', 'ks_consultores' ),
		'not_found_in_trash'  => __( 'No se encontro en la basura', 'ks_consultores' ),
	);
	$args = array(
		'label'               => __( 'Servicio', 'ks_consultores' ),
		'description'         => __( 'Servicios', 'ks_consultores' ),
		'labels'              => $labels,
		
		'supports'            => array( 'title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-universal-access-alt',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		
	);
//	register_post_type( 'Servicio', $args );




	$labels = array(
		'name'                => _x( 'Testimonios', 'Post Type General Name', 'ks_consultores' ),
		'singular_name'       => _x( 'Testimonio', 'Post Type Singular Name', 'ks_consultores' ),
		'menu_name'           => __( 'Testimonios', 'ks_consultores' ),
		'name_admin_bar'      => __( 'Testimonios', 'ks_consultores' ),
		'parent_item_colon'   => __( 'Parent Testimonio:', 'ks_consultores' ),
		'all_items'           => __( 'Todos', 'ks_consultores' ),
		'add_new_item'        => __( 'Agregar Nuevo', 'ks_consultores' ),
		'add_new'             => __( 'Agregar Nuevo', 'ks_consultores' ),
		'new_item'            => __( 'Nuevo Testimonio', 'ks_consultores' ),
		'edit_item'           => __( 'Editar Testimonio', 'ks_consultores' ),
		'update_item'         => __( 'Actualizar Testimonio', 'ks_consultores' ),
		'view_item'           => __( 'Ver Testimonio', 'ks_consultores' ),
		'search_items'        => __( 'Buscar Testimonios', 'ks_consultores' ),
		'not_found'           => __( 'No se encontro resultados', 'ks_consultores' ),
		'not_found_in_trash'  => __( 'No se encontro en la basura', 'ks_consultores' ),
	);
	$args = array(
		'label'               => __( 'Testimonio', 'ks_consultores' ),
		'description'         => __( 'Testimonios', 'ks_consultores' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'custom-fields', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-testimonial',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'Testimonio', $args );

}

// Hook into the 'init' action
//add_action( 'init', 'register_post_types', 0 );



function get_post_id( $slug, $post_type ) {

	

   $post = get_page_by_path($slug,OBJECT,$post_type);

   // $query->the_post();

    return $post->ID;
}

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   * 
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }

  /** 
   * We construct the pagination arguments to enter into our paginate_links
   * function. 
   */

   if ( !$current_page = get_query_var('paged') ) $current_page = 1;
 $base = get_pagenum_link(1) . '%_%';
 if ( is_home() ) {
 $format = '?paged=%#%';
 } else if ( !get_option('permalink_structure') ) {
 $format = '&paged=%#%';
 } else {
 $format = 'page/%#%/';
 $paraUrl = explode('?', get_pagenum_link(1) );
 $base = trailingslashit( $paraUrl[0] ) . '%_%';
 if( count($paraUrl) > 1 ) {
 $base .= '?';
 foreach ($paraUrl as $key => $value) {
 if( $key == 0 ) continue;
 if( $key > 1 ) $base .= '&';
 $base .= $value;
 }
 }
 }
  $pagination_args = array(
    'base'            => $base,
    'format'          =>  $format,
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'array',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $pages = paginate_links( $pagination_args );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="pagination-wrap"><ul class="pagination">';
        foreach ( $pages as $page ) {
                echo "<li>$page</li>";
        }
       echo '</ul></div>';
 
  }


}


add_filter( 'show_admin_bar', '__return_false' );



/**
 * Remove the slug from published post permalinks.
 */
function custom_remove_cpt_slug( $post_link, $post, $leavename ) {

    if ( 'servicio' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }

    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );

    return $post_link;
}
//add_filter( 'post_type_link', 'custom_remove_cpt_slug', 10, 3 );


/**
 * Some hackery to have WordPress match postname to any of our public post types
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * Typically core only accounts for posts and pages where the slug is /post-name/
 */
function custom_parse_request_tricksy( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'servicio', 'page' ) );
    }
}
//add_action( 'pre_get_posts', 'custom_parse_request_tricksy' );


// Function that will return our Wordpress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
} 	
//Create the shortcode
add_shortcode("listmenu", "list_menu");
function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );



function my_acf_format_value_for_api($value, $post_id, $field){
	return str_replace( ']]>', ']]>', apply_filters( 'the_content', $value) );
}
function my_on_init(){
	if(!is_admin()){
		add_filter('acf/format_value_for_api/type=wysiwyg', 'my_acf_format_value_for_api', 10, 3);
	}
}
add_action('init', 'my_on_init');

class My_Sub_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
  function end_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
}



require_once('inc/bs_grid.php' );
require_once('inc/bs_tabs.php' );
require_once('inc/bs_collapse.php' );
require_once('inc/bs_alert.php' );
require_once('inc/bs_buttons.php' );

class BootstrapShortcodes{

    public $shortcodes = array(
        'grid',
        'tabs',
        'collapse',
        'alerts',
        'buttons',
    );

    public function __construct() {
        add_action( 'init', array( &$this, 'init' ) );
        add_action( 'init', array( &$this, 'add_options_defaults' ) );

    }

    function init() {
        $options = get_option( 'bs_options' );
        if( !is_admin() ) {
                wp_enqueue_style( 'bs_shortcodes', get_template_directory_uri(). '/css/shortcodes.css' );
	            wp_enqueue_script('bs_init', get_template_directory_uri().'/js/init.js' , array('bs_bootstrap'));
        } else {
            wp_enqueue_style( 'bs_admin_style', get_template_directory_uri(). '/css/admin.css' );
        }
        if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
            return;
        }
        if ( get_user_option( 'rich_editing' ) == 'true' ) {
            add_filter( 'mce_external_plugins', array( &$this, 'regplugins' ) );
            add_filter( 'mce_buttons_3', array( &$this, 'regbtns' ) );
        }
    }

    function regbtns( $buttons ) {
        $options = get_option( 'bs_options' );
        foreach ( $this->shortcodes as &$shortcode ) {
            if ( isset( $options[ 'chk_default_options_' . $shortcode ] ) ) {
                array_push( $buttons, 'bs_' . $shortcode );
            }
        }
        return $buttons;
    }

    function regplugins( $plgs) {
        foreach ( $this->shortcodes as &$shortcode ) {
            $plgs[ 'bs_' . $shortcode ] = get_template_directory_uri(). '/js/plugins/' . $shortcode . '.js';
        }
        return $plgs;
    }


    function add_options_defaults() {
            $arr = array(
                'chk_default_options_grid'      => '1',
                'chk_default_options_tabs'      => '1',
                'chk_default_options_collapse'  => '1',
                'chk_default_options_alerts'    => '1',
                'chk_default_options_buttons'   => '1',
            );
            update_option( 'bs_options', $arr );
    }

    function register_settings() {
        register_setting( 'bs_plugin_options', 'bs_options' );
    }

    function dw_render_form() {
        ?>
        <div class="wrap">
            <div class="icon32" id="icon-options-general"><br></div>
            <h2>Bootstrap Shortcodes Options</h2>
            <form method="post" action="options.php">
                <?php settings_fields( 'bs_plugin_options' ); ?>
                <?php $options = get_option( 'bs_options'); ?>
                <table class="form-table">

                    <tr><td colspan="2"><div style="margin-top:10px;"></div></td></tr>

                    <tr valign="top" style="border-top:#dddddd 1px solid;">
                        <th scope="row">Twitter Bootstrap CSS</th>
                        <td>
                            <label><input name="bs_options[chk_default_options_css]" type="checkbox" value="1" <?php if ( isset( $options[ 'chk_default_options_css' ] ) ) { checked( '1', $options[ 'chk_default_options_css' ] ); } ?> /> Load Twitter Bootstrap css file</label><br /><span style="color:#666666;margin-left:2px;">Uncheck this if you already include Bootstrap css on your template</span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Twitter Bootstrap JS</th>
                        <td>
                            <label><input name="bs_options[chk_default_options_js]" type="checkbox" value="1" <?php if ( isset( $options[ 'chk_default_options_js' ] ) ) { checked( '1', $options[ 'chk_default_options_js' ] ); } ?> /> Load Twitter Bootstrap javascript file</label><br /><span style="color:#666666;margin-left:2px;">Uncheck this if you already include Bootstrap javascript on your template</span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Twitter Bootstrap Shortcodes</th>
                        <td>

                            <?php foreach ( $this->shortcodes as &$shortcode ): ?>
                            <label>
                                <input
                                    name="bs_options[chk_default_options_<?php echo $shortcode; ?>]"
                                    type="checkbox"
                                    value=1
                                    <?php if ( isset( $options[ 'chk_default_options_' . $shortcode ] ) ) { checked( '1', $options[ 'chk_default_options_' . $shortcode ] ); } ?>
                                /> <?php echo $shortcode; ?>
                            </label>
                            <br />
                            <?php endforeach; ?>

                            <span style="color:#666666;margin-left:2px;">Uncheck to remove button from TinyMCE editor</span>
                        </td>
                    </tr>
                </table>
                <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
                </p>
            </form>

        </div><?php
    }
}

$bscodes = new BootstrapShortcodes();

add_filter( 'post_thumbnail_html', 'add_image_responsive_class', 10 );
add_filter( 'the_content', 'add_image_responsive_class', 10 );
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}



function tinymce_remove_root_block_tag( $init ) {
    $init['forced_root_block'] = false; 
    return $init;
}
add_filter( 'tiny_mce_before_init', 'tinymce_remove_root_block_tag' );



add_filter( 'wpseo_pre_analysis_post_content', 'filter_yoasts_wpse_119879', 10, 2 );

function filter_yoasts_wpse_119879( $content, $post )
{

}

function my_mce4_options($init) {
  $default_colours = '"000000", "Black",
                      "993300", "Burnt orange",
                      "333300", "Dark olive",
                      "003300", "Dark green",
                      "003366", "Dark azure",
                      "000080", "Navy Blue",
                      "333399", "Indigo",
                      "333333", "Very dark gray",
                      "800000", "Maroon",
                      "FF6600", "Orange",
                      "808000", "Olive",
                      "008000", "Green",
                      "008080", "Teal",
                      "0000FF", "Blue",
                      "666699", "Grayish blue",
                      "808080", "Gray",
                      "FF0000", "Red",
                      "FF9900", "Amber",
                      "99CC00", "Yellow green",
                      "339966", "Sea green",
                      "33CCCC", "Turquoise",
                      "3366FF", "Royal blue",
                      "800080", "Purple",
                      "999999", "Medium gray",
                      "FF00FF", "Magenta",
                      "FFCC00", "Gold",
                      "FFFF00", "Yellow",
                      "00FF00", "Lime",
                      "00FFFF", "Aqua",
                      "00CCFF", "Sky blue",
                      "993366", "Red violet",
                      "FFFFFF", "White",
                      "FF99CC", "Pink",
                      "FFCC99", "Peach",
                      "FFFF99", "Light yellow",
                      "CCFFCC", "Pale green",
                      "CCFFFF", "Pale cyan",
                      "99CCFF", "Light sky blue",
                      "CC99FF", "Plum"';

  $custom_colours =  '"008ca4", "KS Green",
                      "002f73", "KS Blue"';

  // build colour grid default+custom colors
  $init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

  // enable 6th row for custom colours in grid
  $init['textcolor_rows'] = 6;

  return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

function add_posts_ajax_request() {
    if ( isset($_REQUEST) ) {
		

		$ini_post = ($_REQUEST['page_actual'] -1 ) * $_REQUEST['post_per_page'];

		if(isset($_REQUEST['post_category']) && $_REQUEST['post_category']!='') {
    	$args = array( 'post_type' => $_REQUEST['post_type'], 'posts_per_page'=> $_REQUEST['post_per_page'], 'category'=> $_REQUEST['post_category'], 'offset' => $ini_post); 

		} else {
    	$args = array( 'post_type' => $_REQUEST['post_type'], 'posts_per_page'=> $_REQUEST['post_per_page'], 'offset' => $ini_post); 

		}


    	$posts = get_posts($args);
		$resultado = '';
		foreach($posts as $post){
			$resultado.='<div class="grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
							<article id="post-'.get_the_ID().'">';
						if ( has_post_thumbnail($post->ID) && ! post_password_required($post->ID) && ! is_attachment($post->ID) ) :
							$resultado.='<div class="entry-thumbnail">'.get_the_post_thumbnail($post->ID,'full').'</div>';
						endif; 
						$resultado.='<div class="date">'.get_the_date('F j, Y', $post->ID).'</div>
									<h3 class="entry-title"><a href="'.get_the_permalink($post->ID).'" rel="bookmark">'.get_the_title($post->ID).'</a></h3>';
									$content = do_shortcode($post->post_content);
									$content = apply_filters('the_content', $content);
									$content = str_replace(']]>', ']]>', $content); 
									$content = wp_trim_words($content,20);
						$resultado.='<p>'.$content.'<span class="text-align-right"> <a href="'.esc_url( get_permalink($post->ID) ).'">leer más <i class="fa fa-angle-right"></i> </a></span></p>';
						$resultado.='</article></div>';
		}
        echo $resultado;
    }
   die();
}
 
add_action( 'wp_ajax_add_posts_ajax_request', 'add_posts_ajax_request' );
// para peticiones de usuarios que no están logueados
add_action('wp_ajax_nopriv_add_posts_ajax_request', 'add_posts_ajax_request');