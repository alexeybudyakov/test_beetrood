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

/*class Product extends WP_Post{
	
}
*/
?>
