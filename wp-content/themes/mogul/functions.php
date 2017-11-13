<?php
if (function_exists('add_theme_support')) {
	add_theme_support('menus');
	add_theme_support( 'post-thumbnails' );
}

function enqueue_styles() {
	wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
	
	wp_register_style('font-style3', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css');
	wp_enqueue_style('font-style3');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
	wp_enqueue_script('jqeury','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function my_connection() {
    p2p_register_connection_type( array(
        'name' => 'posts_review',
        'from' => 'reviews_collection', 
        'to' => 'portfolio_gallery' 
    ) );
	p2p_register_connection_type( array(
        'name' => 'posts_review',
        'from' => 'reviews_collection', 
        'to' => 'services_gallery' 
    ) );
}
add_action( 'p2p_init', 'my_connection' );

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// Регистрация пользовательского типа записи Продукция
if (!function_exists('my_custom_post_types')):
    function my_custom_post_types() {
        register_post_type('Products', array (
            'label' => 'Products',
            'public'=> true,
            'publicly_queryable' => true,
            'menu_position' => null,
            'show ui' => true,
            'menu_icon'           => 'dashicons-wordpress-alt',
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'query_var' => true,
            'supports' => array (
                'title',
                'editor',
                'custom-fields',)
        ));
    }
add_action('init', 'my_custom_post_types');
endif;

//making the meta box (Note: meta box != custom meta field)
function wpse_add_custom_meta_box_2() {
   add_meta_box(
       'custom_meta_box-2',       // $id
       'Price',                  // $title
       'show_custom_meta_box_2',  // $callback
       'products',                 // $page
       'normal',                  // $context
       'high'                     // $priority
   );
   
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_2');


function show_custom_meta_box_2() {
    global $post;
    // Use nonce for verification to secure data sending
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
    ?>
    <!-- my custom value input -->
    <input type="number" name="wpse_value" value="">
    <?php
}

function wpse_save_meta_fields( $post_id ) {

  // verify nonce
  if (!isset($_POST['wpse_our_nonce']) || !wp_verify_nonce($_POST['wpse_our_nonce'], basename(__FILE__)))
      return 'nonce not verified';

  // check autosave
  if ( wp_is_post_autosave( $post_id ) )
      return 'autosave';

  //check post revision
  if ( wp_is_post_revision( $post_id ) )
      return 'revision';

  // check permissions
  if ( 'project' == $_POST['post_type'] ) {
      if ( ! current_user_can( 'edit_page', $post_id ) )
          return 'cannot edit page';
      } elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
          return 'cannot edit post';
  }

  //so our basic checking is done, now we can grab what we've passed from our newly created form
  $wpse_value = $_POST['wpse_value'];

  //simply we have to save the data now
  global $wpdb;

  $table = $wpdb->base_prefix . 'project_bids_mitglied';

  $wpdb->insert(
            $table,
            array(
                'col_post_id' => $post_id, //as we are having it by default with this function
                'col_value'   => intval( $wpse_value ) //assuming we are passing numerical value
              ),
            array(
                '%d', //%s - string, %d - integer, %f - float
                '%d', //%s - string, %d - integer, %f - float
              )
          );

}
add_action( 'save_post', 'wpse_save_meta_fields' );
add_action( 'new_to_publish', 'wpse_save_meta_fields' );

	class Product {
	public $price = '0';
	public $is_in_stock='false';
	public $gallery='false';
	/* copy from Wp_post
	/**
	 * Post ID.
	 *
	 * @var int
	 */
	public $ID;
	
	/**
	 * ID of post author.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @var string
	 */
	public $post_author = 0;

	/**
	 * The post's local publication time.
	 *
	 * @var string
	 */
	public $post_date = '0000-00-00 00:00:00';

	/**
	 * The post's GMT publication time.
	 *
	 * @var string
	 */
	public $post_date_gmt = '0000-00-00 00:00:00';

	/**
	 * The post's content.
	 *
	 * @var string
	 */
	public $post_content = '';

	/**
	 * The post's title.
	 *
	 * @var string
	 */
	public $post_title = '';

	/**
	 * The post's excerpt.
	 *
	 * @var string
	 */
	public $post_excerpt = '';

	/**
	 * The post's status.
	 *
	 * @var string
	 */
	public $post_status = 'publish';

	/**
	 * Whether comments are allowed.
	 *
	 * @var string
	 */
	public $comment_status = 'open';

	/**
	 * Whether pings are allowed.
	 *
	 * @var string
	 */
	public $ping_status = 'open';

	/**
	 * The post's password in plain text.
	 *
	 * @var string
	 */
	public $post_password = '';

	/**
	 * The post's slug.
	 *
	 * @var string
	 */
	public $post_name = '';

	/**
	 * URLs queued to be pinged.
	 *
	 * @var string
	 */
	public $to_ping = '';

	/**
	 * URLs that have been pinged.
	 *
	 * @var string
	 */
	public $pinged = '';

	/**
	 * The post's local modified time.
	 *
	 * @var string
	 */
	public $post_modified = '0000-00-00 00:00:00';

	/**
	 * The post's GMT modified time.
	 *
	 * @var string
	 */
	public $post_modified_gmt = '0000-00-00 00:00:00';

	/**
	 * A utility DB field for post content.
	 *
	 *
	 * @var string
	 */
	public $post_content_filtered = '';

	/**
	 * ID of a post's parent post.
	 *
	 * @var int
	 */
	public $post_parent = 0;

	/**
	 * The unique identifier for a post, not necessarily a URL, used as the feed GUID.
	 *
	 * @var string
	 */
	public $guid = '';

	/**
	 * A field used for ordering posts.
	 *
	 * @var int
	 */
	public $menu_order = 0;

	/**
	 * The post's type, like post or page.
	 *
	 * @var string
	 */
	public $post_type = 'post';

	/**
	 * An attachment's mime type.
	 *
	 * @var string
	 */
	public $post_mime_type = '';

	/**
	 * Cached comment count.
	 *
	 * A numeric string, for compatibility reasons.
	 *
	 * @var string
	 */
	public $comment_count = 0;

	/**
	 * Stores the post object's sanitization level.
	 *
	 * Does not correspond to a DB field.
	 *
	 * @var string
	 */
	public $filter;

	/**
	 * Retrieve WP_Post instance.
	 *
	 * @static
	 * @access public
	 *
	 * @global wpdb $wpdb WordPress database abstraction object.
	 *
	 * @param int $post_id Post ID.
	 * @return WP_Post|false Post object, false otherwise.
	 */
	public static function get_instance( $post_id ) {
		global $wpdb;

		$post_id = (int) $post_id;
		if ( ! $post_id ) {
			return false;
		}

		$_post = wp_cache_get( $post_id, 'posts' );

		if ( ! $_post ) {
			$_post = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE ID = %d LIMIT 1", $post_id ) );

			if ( ! $_post )
				return false;

			$_post = sanitize_post( $_post, 'raw' );
			wp_cache_add( $_post->ID, $_post, 'posts' );
		} elseif ( empty( $_post->filter ) ) {
			$_post = sanitize_post( $_post, 'raw' );
		}

		return new WP_Post( $_post );
	}

	/**
	 * Constructor.
	 *
	 * @param WP_Post|object $post Post object.
	 */
	public function __construct( $post ) {
		foreach ( get_object_vars( $post ) as $key => $value )
			$this->$key = $value;
	}

	/**
	 * Isset-er.
	 *
	 * @param string $key Property to check if set.
	 * @return bool
	 */
	public function __isset( $key ) {
		if ( 'ancestors' == $key )
			return true;

		if ( 'page_template' == $key )
			return true;

		if ( 'post_category' == $key )
		   return true;

		if ( 'tags_input' == $key )
		   return true;

		return metadata_exists( 'post', $this->ID, $key );
	}

	/**
	 * Getter.
	 *
	 * @param string $key Key to get.
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( 'page_template' == $key && $this->__isset( $key ) ) {
			return get_post_meta( $this->ID, '_wp_page_template', true );
		}

		if ( 'post_category' == $key ) {
			if ( is_object_in_taxonomy( $this->post_type, 'category' ) )
				$terms = get_the_terms( $this, 'category' );

			if ( empty( $terms ) )
				return array();

			return wp_list_pluck( $terms, 'term_id' );
		}

		if ( 'tags_input' == $key ) {
			if ( is_object_in_taxonomy( $this->post_type, 'post_tag' ) )
				$terms = get_the_terms( $this, 'post_tag' );

			if ( empty( $terms ) )
				return array();

			return wp_list_pluck( $terms, 'name' );
		}

		// Rest of the values need filtering.
		if ( 'ancestors' == $key )
			$value = get_post_ancestors( $this );
		else
			$value = get_post_meta( $this->ID, $key, true );

		if ( $this->filter )
			$value = sanitize_post_field( $key, $value, $this->ID, $this->filter );

		return $value;
	}

	/**
	 * {@Missing Summary}
	 *
	 * @param string $filter Filter.
	 * @return self|array|bool|object|WP_Post
	 */
	public function filter( $filter ) {
		if ( $this->filter == $filter )
			return $this;

		if ( $filter == 'raw' )
			return self::get_instance( $this->ID );

		return sanitize_post( $this, $filter );
	}

	/**
	 * Convert object to array.
	 *
	 * @return array Object as array.
	 */
	public function to_array() {
		$post = get_object_vars( $this );

		foreach ( array( 'ancestors', 'page_template', 'post_category', 'tags_input' ) as $key ) {
			if ( $this->__isset( $key ) )
				$post[ $key ] = $this->__get( $key );
		}

		return $post;
	}
}

$post = new stdClass();
$post->ID = '333';
$post->post_content = 'text-content-here';
$post->post_title = 'post title';
$post->price = '603';
$post->is_in_stock='true';
$post->gallery='true';
$product = new Product($post);
/*
echo ($product->post_content.'<br>');
echo ($product->ID.'<br>');
echo ($product->post_title.'<br>');

echo ($product->price.'<br>');
echo ($product->is_in_stock.'<br>');
echo ($product->gallery.'<br>');
*/
?>
