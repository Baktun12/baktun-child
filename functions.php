<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
	
}
function enqueue_scripts(){
	wp_enqueue_script('jqueryjs', get_stylesheet_directory_uri() . '/js/jquery.js', array('jquery'), false, false);
	wp_enqueue_script('turnminjs', get_stylesheet_directory_uri() . '/js/turn.min.js', array('jquery'), false, false);
	wp_enqueue_script('swiperjs', get_stylesheet_directory_uri() . '/js/swiper.min.js', array('jquery'), false, true);
	wp_enqueue_style( 'swipercss', get_stylesheet_directory_uri() . '/css/swiper.min.css',null, false, 'all');
	wp_enqueue_script('scriptjs', get_stylesheet_directory_uri() . '/js/script.js', array('jquery','swiperjs'), false, false);

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