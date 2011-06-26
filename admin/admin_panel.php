<?php

/**
 * @see http://codex.wordpress.org/Navigation_Menus
 */
function register_theme_menus() {
	register_nav_menus ( array (
		'main-menu' => __( 'Main menu' )
	));
}

add_action( 'init', 'register_theme_menus' );


/**
 * Create custom admin page menu
 * @see http://codex.wordpress.org/Creating_Options_Pages
 */
add_action( 'admin_menu', 'mb_create_menu' );

/**
 * 	Create a new top-level admin menu
 */
function mb_create_menu() {
	/**
	 * @param page_title		The text to be displayed in the title tags of the page when the menu is selected
	 * @param menu_title	The text to be used for the menu
	 * @param capability		The capability required for this menu to be displayed to the user.
	 * @param menu_slug	The slug name to refer to this menu by (should be unique for this menu)
	 * @param function		The function to be called to output the content for this page.
	*/	
	add_menu_page(
		'Microblog Settings', /* page_title */
		'Microblog', /* menu_title */
		'administrator', /* capability */
		'microblog', /* menu_slug */
		'mb_settings_page', /* function */
		admin_url( '/images/generic.png', __FILE__) /* icon_url */
	);

	add_submenu_page(
		'microblog',
		'About Microblog',
		'About',
		'administrator',
		'microblog-about',
		'mb_about_page'
	);

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


//register our settings
function register_mysettings() {
	register_setting( 'mb-settings-group', 'new_option_name' );
	register_setting( 'mb-settings-group', 'some_other_option' );
	register_setting( 'mb-settings-group', 'option_etc' );
}

function mb_settings_page() {
?>
<div class="wrap">
	<?php screen_icon( 'options-general' ); ?>
	<h2><?php _e( 'Microblog' ) ?></h2>
	
	<form method="post" action="options.php">
	    <?php settings_fields( 'mb-settings-group' ); ?>
	    <table class="form-table">
	        <tr valign="top">
	        	<th scope="row">New Option Name</th>
	        	<td><input type="text" name="new_option_name" value="<?php echo get_option( 'new_option_name' ); ?>" /></td>
	        </tr>
	         
	        <tr valign="top">
	        	<th scope="row">Some Other Option</th>
	        	<td><input type="text" name="some_other_option" value="<?php echo get_option( 'some_other_option' ); ?>" /></td>
	        </tr>
	        
	        <tr valign="top">
	        	<th scope="row">Options, Etc.</th>
	        	<td><input type="text" name="option_etc" value="<?php echo get_option( 'option_etc' ); ?>" /></td>
	        </tr>
	    </table>
	    
	    <p class="submit">
	    	<input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>" />
	    </p>
	
	</form>
</div>
<?php
}


/**
 * @since version 0.0.1
 */
function mb_about_page( ) {
?>
<div class="wrap">
	<?php screen_icon( 'options-general' ); ?>
	<h2><?php _e( 'About Microblog' ); ?></h2>
</div>
<?php
}
