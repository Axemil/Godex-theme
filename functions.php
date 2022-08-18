<?php
/**
 * godex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package godex
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'godex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function godex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on godex, use a find and replace
		 * to change 'godex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'godex', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'godex' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'godex_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;

add_action( 'after_setup_theme', 'godex_setup' );

add_action('init', 'update_all_templates_to_new');
function update_all_templates_to_new()
{
    $args = array(
        'posts_per_page'   => -1,
        'post_type'        => 'post',
        'suppress_filters' => true 
    );
    $posts_array = get_posts( $args );
    foreach($posts_array as $post_array)
    {
		if(!get_post_meta( $post_array->ID, "wpb_post_views_count",false )){
			update_post_meta($post_array->ID, "wpb_post_views_count", "0");
		}
    }
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function godex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'godex_content_width', 640 );
}
add_action( 'after_setup_theme', 'godex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function godex_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'godex' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'godex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'godex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function godex_scripts() {
	wp_enqueue_style( 'godex-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'godex-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'godex_scripts' );

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

require_once __DIR__ .'/Kama_Contents.php';

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function breadcrumbs($separator = ' » ', $home = 'Главная') {

	$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
	$base_url = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
	$breadcrumbs = array("<a href=\"$base_url\">$home</a>");

	$last = end( array_keys($path) );

	foreach( $path as $x => $crumb ){
		$title = ucwords(str_replace(array('.php', '_'), Array('', ' '), $crumb));
		if( $x != $last ){
			$breadcrumbs[] = '<a href="'.$base_url.$crumb.'">'.$title.'</a>';
		}
		else {
			$breadcrumbs[] = '<span class="lastCrumb">'.$title.'</span>';
		}
	}

	return implode( $separator, $breadcrumbs );
}

function estimated_reading_time($idPost = null){
	$post = get_post($idPost);
	$postcnt = strip_tags( $post->post_content );
	$words = count(preg_split('/\s+/', $postcnt));
	$minutes = floor( $words / 250 );
	$seconds = floor( $words % 250 / ( 250 / 60 ) );
	if (1 <= $minutes){$estimated_time = $minutes . ' minute read';}
	else{$estimated_time = $seconds . ' sec. read';}
	echo $estimated_time;
}

function estimated_reading_time_alt($idPost = null){
	$post = get_post($idPost);
	$postcnt = strip_tags( $post->post_content );
	$words = count(preg_split('/\s+/', $postcnt));
	$minutes = floor( $words / 250 );
	$seconds = floor( $words % 250 / ( 250 / 60 ) );
	if (1 <= $minutes){$estimated_time = $minutes . ' minute read';}
	else{$estimated_time = $seconds . ' sec. read';}
	return $estimated_time;
}

add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {

	$form = '
	<form role="search" method="get" id="searchform" action="' . home_url() . '" >
		<label class="screen-reader-text" for="s">Запрос для поиска:</label>
		<input type="text" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
		<input type="submit" id="searchsubmit" value=" " />
		<svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<circle r="8" transform="matrix(-1 0 0 1 13 8.5)" stroke="white"/>
			<path d="M6.5 13.5L0.5 19.5" stroke="white"/>
		</svg>
	</form>';

	return $form;
}

function SearchFilter($query) {
	if ($query->is_search) {
	  $query->set('post_type', 'post');
	}
	return $query;
  }
  add_filter('pre_get_posts','SearchFilter');

function wpschool_noindex_paged() {
	global $paged;
	global $wp;
    if ( is_paged() && $paged <= 1){
        ?>
            <meta name="robots" content="noindex, follow">
        <?php
    } else if(is_paged() && $paged >= 2) {
		?>
			<meta name="robots" content="index, follow">
		<?php
	}
}

// добавляет новую крон задачу
add_action( 'admin_head', 'my_activation' );
function my_activation() {
  if( ! wp_next_scheduled( 'my_hourly_event' ) ) {
    wp_schedule_event( time(), 'hourly', 'my_hourly_event');
  }
}

// добавляем функцию к указанному хуку
add_action( 'my_hourly_event', 'do_this_hourly' );
function do_this_hourly(){
	$posts = get_posts( array(
		'category_name'    => "price-predictions",
	) );
	$time = current_time('mysql');
	foreach ( $posts as $my_post ):

		$my_post['post_date'] = $time;
		$my_post['post_date_gmt'] = get_gmt_from_date( $time );
		$my_post['post_modified'] = $time;
		$my_post['post_modified_gmt'] = get_gmt_from_date( $time );
	
		wp_update_post( $my_post );
	
	endforeach;
}

add_action( 'wp_head', 'wpschool_noindex_paged', 2 );
function autoblank($text) {
		preg_match('/((http|https):\/\/localhost:8888\/godexNewBase\/|(https|http):\/\/godex.io\/blog)/', $text, $matches);
		// if(sizeof($matches) != 0){
		// 	$return = 
		// }
		// else{
		// 	$return = str_replace('<a', '<a', $text);
		// }
		$return = str_replace('<a', '<a target="_blank" rel=”nofollow,noopener”', $text);
		return $return;
}
add_filter('the_content', 'autoblank');

// function title_filter( $where, &$wp_query ){
//     global $wpdb;
//     if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
//         $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
//     }
//     return $where;
// }

require_once get_stylesheet_directory() . '/better-comments.php';

add_filter( 'get_comment_date', 'wpse_comment_date_18350375' );    
function wpse_comment_date_18350375( $date ) {
  $date = date("m.d.y");   
  return $date;
}

remove_filter('template_redirect','redirect_canonical');

// add_action('init','redirect_to_change_avatar');

// function redirect_to_change_avatar() {
// 	global $wp;
// 	$current_url = home_url(add_query_arg(array(), $wp->request));
//     if ( $current_url == "https://godex.io/blog/crypto-talks/best-crypto-exchanges-without-limits-in-2020" ) {
//         wp_redirect('https://godex.io/blog/crypto-currencies/best-crypto-exchanges-without-limits-in-2020');
//         exit;
//     }
// }

add_action( 'template_redirect', 'se219663_template_redirect' );

function se219663_template_redirect()
{
  global $wp_rewrite;

  if ( is_search() && ! empty ( $_GET['s'] )  )
  {
    $s         = get_query_var( 's' ); // or get_query_var( 's' )
    $location  = '/';
    $location .= trailingslashit( $wp_rewrite->search_base );
    $location .= user_trailingslashit( urlencode( $s ) );
    $location  = home_url( $location );
    wp_safe_redirect( $location, 301 );
    exit;
  }

  if(is_author()){
	wp_safe_redirect( home_url() . "/404", 404 );
  }

  if(is_404()){
	global $wp;
	$url = home_url( $wp->request );
	preg_match('/((https|http):\/\/godex.io\/blog)\/([-\w]+)\/([-\w]+)(\s|\/|)/', $url, $matches);
	wp_safe_redirect( home_url() . "/" . $matches[4], 301 );
  }
}

add_filter( 'navigation_markup_template',  'my_posts_pagination', 10, 2 );
function my_posts_pagination($template, $class){
    global $wp_query;
    
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? (int) get_query_var( 'paged' ) : 1;
    $first = $last = '';
    
    if($current == 1)
        $first = '<span class="prev inactive"></span>';
    
    if($current == $total)
        $last = '<span class="next inactive"></span>';
    
    $template = '
    <nav class="navigation %1$s" role="navigation" aria-label="%4$s">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">
        '.$first.'
        %3$s
        '.$last.'
        </div>
    </nav>';
    return $template;
}

function __search_by_title_only( $search, &$wp_query )
{
    global $wpdb;
    if(empty($search)) {
        return $search; // skip processing - no search term in query
    }
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';
    $search =
    $searchand = '';
    foreach ((array)$q['search_terms'] as $term) {
        $term = esc_sql($wpdb->esc_like($term));
        $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
        $searchand = ' AND ';
    }
    if (!empty($search)) {
        $search = " AND ({$search}) ";
        if (!is_user_logged_in())
            $search .= " AND ($wpdb->posts.post_password = '') ";
    }
    return $search;
}
add_filter('posts_search', '__search_by_title_only', 500, 2);

function title_filter( $where, &$wp_query ){
    global $wpdb;
    if ( $search_term = $wp_query->get( 'search_prod_title' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql( like_escape( $search_term ) ) . '%\'';
    }
    return $where;
}

function get_kama_contents( & $post = false ){

	if( ! $post ) $post = $GLOBALS['post'];

	if( is_string( $post ) ){
		$post_content = & $post;
	}
	else {
		$post_content = & $post->post_content;
	}

	$toc = new \Kama\WP\Kama_Contents( [
		'selectors' => [ 'h2', 'h3' ],
		'min_found' => 1,
		'margin'    => 0,
		'to_menu'   => false,
		'title'     => false,
	] );

	$contents = $toc->make_contents( $post_content );

	// чтобы правильно работала the_content() которая работает на основе get_the_content()
	global $pages;
	if( $pages && count($pages) == 1 ){
		$pages[0] = $post_content;
	}

	return $contents;
}

// function auto_id_headings( $content ) {

// 	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
// 		if ( ! stripos( $matches[0], 'id=' ) ) :
// 			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $matches[3] . $matches[4];
// 		endif;
// 		return $matches[0];
// 	}, $content );

//     return $content;

// }
// add_filter( 'the_content', 'auto_id_headings' );