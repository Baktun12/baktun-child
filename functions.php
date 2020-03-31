<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	
}
function enqueue_scripts(){
	wp_enqueue_script('jqueryjs', get_stylesheet_directory_uri() . '/js/jquery.js', array('jquery'), false, false);
	wp_enqueue_script('turnminjs', get_stylesheet_directory_uri() . '/js/turn.min.js', array('jquery'), false, false);
	wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/js/swiper.min.js', array('jquery'), false, true);
	wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/css/swiper.min.css',null, false, 'all');
	wp_enqueue_script('modal', get_stylesheet_directory_uri() . '/js/modal.min.js', array('jquery'), false, true);
	wp_enqueue_style( 'modal', get_stylesheet_directory_uri() . '/css/modal.min.css',null, false, 'all');
	wp_enqueue_script('scriptjs', get_stylesheet_directory_uri() . '/js/script.js', array('jquery','swiper'), false, false);

}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

# set up paths to .po and .mo translation files
add_action( 'after_setup_theme', 'translation_setup' );
function translation_setup(){
  load_child_theme_textdomain( 'baktun-text', get_stylesheet_directory() . '/languages' );
}

# add admin menu item for life link feed. 
add_action( 'admin_menu', 'extra_post_info_menu' );
function extra_post_info_menu(){    
	$page_title = 'Live Stream Link Page';
	$menu_title = 'Live Link';   
	$capability = 'manage_options';   
	$menu_slug  = 'live-link-settings';   
	$function   = 'live_stream_link_settings';   
	$icon_url   = 'dashicons-admin-site-alt3';   
	$position   = 2;    
	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position ); 
} 

# add markup for the admin live feed link 
if( !function_exists("live_stream_link_settings") ) { 
	function live_stream_link_settings(){
			?> <h1>Live Stream Settings</h1>   
				<form method="post" action="options.php">     
				<?php settings_fields( 'live-stream-settings' ); ?>     
				<?php do_settings_sections( 'live-stream-settings' ); ?>     
				<table class="form-table">       
					<tr valign="top">       
					<th scope="row">Live Stream Link:</th>      
					<td><input type="text" name="live-stream-link" value="<?php echo get_option( 'live-stream-link' ); ?>"/></td>
					</tr>     
				</table>     
				<?php submit_button(); ?>   
				</form>  
				<?php 
	} 
}
# save live fead link to the database
add_action( 'admin_init', 'update_live_stream_link_settings' ); 
if( !function_exists("update_live_stream_link_settings") ) { 
	function update_live_stream_link_settings() {  
		$args = array(
			'type' => 'string', 
			'description' => 'saves the live stream uri',
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest' => true,
            'default' => NULL,
            ); 
		register_setting( 'live-stream-settings', 'live-stream-link',  $args ); 
	} 
}

# set background featured image TODO
function baktun_get_card_link( $id ){
	$type = get_post_type( $id );
	if ( $type == 'tribe_events' ) {
		return get_site_url() . '/wp-json/tribe/events/v1/events/' . $id;
	} else if ( $type == 'post' ){
		return get_site_url() . '/wp-json/wp/v2/posts/' . $id;
	} else {
		return '#';
	}

}

#add home page with id 43
function programmatically_create_post() {

	// Initialize the page ID to -1. This indicates no action has been taken.
	$post_id = -1;

	// Setup the author, slug, and title for the post
	$author_id = 1;
	$slug = 'home';
	$title = 'Home';
	$home_id = 50; // we want the home to be 50

	// If the page doesn't already exist, then create it
	if( !get_post_status( $home_id ) ) {

		// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'import_id'         =>  $home_id,
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	$author_id,
				'post_name'		=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'		=>	'page',

			)
		);

	// Otherwise, we'll stop
	} else {

    		// Arbitrarily use -2 to indicate that the page with the title already exists
    		$post_id = -2;

	} // end if

} // end programmatically_create_post
add_filter( 'after_setup_theme', 'programmatically_create_post' );